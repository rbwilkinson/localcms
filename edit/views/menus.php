<?php
if ($_SESSION['user'] == true) {

    //SELECT query to display existing entries
    $categories = $DB->read('categories', 'category_order');
    $items = $DB->read('items', 'item_order');
    $sub_items = $DB->read('subitems', 'title');

    $options = array();

    // Create an array of category titles
    $category_titles = array();
    foreach ($categories as $category) {
        array_push($category_titles, $category->title);
    }


    // Create an array for each category of items
    $menu_items_by_category = array();
    foreach ($items as $item) {
        $parent = $item->category;
        $menu_items_by_category[$parent][] = $item;
    }

    // Re-sort by category
    ksort($menu_items_by_category);


    // Sort $sub_items by parent_id and output $options array
    $sub_items_by_item = array();
    foreach ($sub_items as $sub_item) {
        $parent = $sub_item->parent_id;
        $sub_items_by_item[$parent][] = $sub_item;
    }

    // Add categories to an array so we can reuse it
    $category_select = '';
    $category_list = array();
    foreach ($categories as $key => $category) {
        $category_select .= '<option value="' . $category->id . '">' . $category->title . '</option>';
        $category_list[$key + 1] = $category;
    }
    ?>
    <body id="edit">

        <?php
        $active = 'menus';
        include('partials/nav.php');
        ?>

        <div id="content">
            <div id="header">
                <h1>Downloadable Menu</h1>
                <div class="clear"></div> 
            </div>
            <?php
            $menu = '../appdata/menu.pdf';
            if (file_exists($menu)) {
                echo "A menu is available for users to download.<br />";
                ?>      
                <a href="#" data-featherlight="../appdata/menu.jpg"><img src="../appdata/menu.jpg" width="100" /></a>
                <div>
                    <div>
                        <form method="post" action="controllers/pdfmenu.php" class="delete-image">
                            <input type="hidden" name="action" value="delete" >
                            <input type="submit" name="submit" value="Delete" class="delete">
                        </form>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                <?php } else { ?>
                    <p><a href="#" data-reveal-id="add-image" class="button green">Upload Menu as PDF</a></p>
                    <div id="add-image" class="reveal-modal">
                        <form method="post" action="controllers/pdfmenu.php" enctype="multipart/form-data">
                            <h3>Upload a New Image</h3>
                            250K max. file size<br />
                            <p><label>Select file named menu.pdf</label> 
                                <input type="file" name="menufile" />
                            </p>              
                            <input type="hidden" name="action" value="addmenu" />
                            <p><br><input type="submit" name="submit" class="button green" value="Add Menu"></p>
                        </form>
                        <a class="close-reveal-modal">&#215;</a>  
                    </div>
                <?php } ?>


                <div id="header">
                    <h1>Edit Menus</h1>
                    <div class="clear"></div> 
                </div>

                <div class="alert <?php echo $_SESSION['alertType']; ?>"><?php echo $_SESSION['message']; ?></div>

                <h3>Categories</h3>
                <ul class="clearfix categories">
                    <?php foreach ($category_list as $category) { ?>
                        <li data-id="<?php echo $category->id; ?>"><?php echo $category->title; ?> 
                            <form method="post" action="controllers/categories.php" class="delete-category">
                                <input type="hidden" name="id" value="<?php echo $category->id; ?>" >
                                <input type="hidden" name="action" value="delete" >
                                <input type="submit" name="submit" value="Delete" class="delete">
                            </form>
                        </li>

                    <?php } ?>
                </ul>
                <p><a href="#" data-reveal-id="add-category" class="add-category button green">Add Category</a></p>

                <hr>       

                <h3>Menu Items</h3>
                <?php if (count($category_list) > 0) { ?>      

                    <table class="item-list">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Title</th>
                                <th class="description">Description</th>
                                <th class="price">Price</th>
                                <th class="menu">Menu</th>
                                <th colspan="3">Actions</th>
                            </tr>
                        </thead>

                        <?php
                        if (count($menu_items_by_category) > 0) {
                            foreach ($menu_items_by_category as $key => $menu_items) {
                                ?>
                                <thead class="subheader">
                                    <tr>
                                        <th colspan="9"><?php echo $category_list[$key]->title; ?></th>
                                    </tr>
                                </thead>
                                <tbody class="sliplist">
                                    <?php foreach ($menu_items as $item) { ?>         

                                        <?php printf('<tr class="%s" id="%s" title="Last modified: %s" data-order="%s">', ($item->id % 2) ? 'odd' : 'even', $item->id, date('l jS \of F Y h:i:s A', $item->date_modified), $item->item_order); ?>

                                    <form class="edit-item" method="post" action="controllers/menus.php">
                                        <td class="move-handle2"><input type="text" name="item_order" maxlength="2" class="item-order" value="<?php echo $item->item_order; ?>"></td>
                                        <td><input type="text" name="title" class="title" value="<?php echo $item->title; ?>" placeholder="<?php echo $item->title; ?>"></td>
                                        <td><input type="text" name="description" value="<?php echo $item->description; ?>" placeholder="<?php echo $item->description; ?>"></td>
                                        <td><input type="text" name="price" value="<?php echo $item->price; ?>" placeholder="<?php echo $item->price; ?>"></td>
                                        <td><select name="category">
                                                <?php
                                                foreach ($category_list as $category) {
                                                    if ($category->id == $item->category) {
                                                        echo '<option value="' . $category->id . '" selected = "selected">' . $category->title . '</option>';
                                                    } else {
                                                        echo '<option value="' . $category->id . '">' . $category->title . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td class="actions">
                                            <input type="hidden" name="id" value="<?php echo $item->id; ?>">            
                                            <input type="hidden" name="action" value="update">
                                            <input type="submit" value="Update" class="button blue">            
                                        </td>
                                    </form>
                                    <td class="actions add-option"><a href="#" data-reveal-id="add-subitem" data-parent="<?php echo $item->id; ?>" class="add-subitem">Add Option</a></td>
                                    <td class="actions">
                                        <form method="post" action="controllers/menus.php" class="delete-item">
                                            <input type="hidden" name="id" value="<?php echo $item->id; ?>">
                                            <input type="hidden" name="action" value="delete" >
                                            <input type="submit" name="submit" value="Delete" class="delete">
                                        </form>
                                    </td>

                                    <?php
                                    if (isset($sub_items_by_item[$item->id]) && count($sub_items_by_item[$item->id]) > 0) {
                                        foreach ($sub_items_by_item[$item->id] as $item_option) {
                                            ?>

                            <?php printf('<tr class="options %s" data-parent="%s">', ($item->id % 2) ? 'odd' : 'even', $item->id); ?>
                                            <td></td>
                                            <td></td>
                                            <td><?php echo $item_option->title; ?></td>   
                                            <td><?php echo $item_option->price; ?></td>
                                            <td colspan="2"></td>
                                            <td colspan="3" class="actions">
                                                <form method="post" action="controllers/menus.php" class="delete-option">
                                                    <input type="hidden" name="id" value="<?php echo $item_option->id; ?>">
                                                    <input type="hidden" name="action" value="delete-option" >
                                                    <input type="submit" name="submit" value="Remove option" class="delete">
                                                </form>
                                            </td>
                                            </tr>    
                        <?php } ?>
                                        </tr>

                                    <?php } ?>          
                                <?php } ?>          
                            <?php } ?>          
                            <?php
                        } else {
                            echo '<tr><td colspan="8"><em>No menu items yet.</em> <a href="#" data-reveal-id="add-item">Add one</a></td></tr>';
                        }
                        ?>

                        </tbody>
                    </table>
                    <p><a href="#" data-reveal-id="add-item" class="button green">Add New Item</a></p>
                    <?php
                } else {
                    echo '<em>Add a category first</em>';
                }
                ?> 

                <div id="add-item" class="reveal-modal">
                    <form method="post" action="controllers/menus.php">
                        <h3>Add a New Menu Item</h3>

                        <p>Which menu are you adding to?
                            <select name="category" id="category">
    <?php echo $category_select; ?> 
                            </select>
                        </p>       
                        <p><label>Title</label> <input type="text" name="title" placeholder="Name of dish"></p>
                        <p><label>Description</label> <input type="text" name="description" class="long" placeholder="Brief description"></p>
                        <p><label>Price</label> <input type="text" name="price" class="price"></p>
                        <input type="hidden" name="action" value="add">
                        <p><br><input type="submit" name="submit" value="Add Item" class="button green"></p>
                    </form>
                    <a class="close-reveal-modal">&#215;</a>   
                </div> <!-- End modal -->

                <div id="add-subitem" class="reveal-modal">
                    <form method="post" action="controllers/menus.php">
                        <h3>Add an option to <span></span></h3>
                        <p><label>Title</label> <input type="text" name="title" placeholder="Name of this option"></p>
                        <p><label>Price</label> <input type="text" name="price" class="price"></p>
                        <input type="hidden" name="parent_id" id="parent_id" value="0">
                        <input type="hidden" name="action" value="add-option">
                        <p><br><input type="submit" name="submit" value="Add Option" class="button green"></p>
                    </form>
                    <a class="close-reveal-modal">&#215;</a>   
                </div> <!-- End modal -->        

                <div id="add-category" class="reveal-modal">
                    <form method="post" action="controllers/categories.php">
                        <h3>Add a new category <span></span></h3>
                        <p><label>Title</label> <input type="text" name="title" placeholder="Name of this category"></p>
                        <input type="hidden" name="action" value="add">
                        <p><br><input type="submit" name="submit" value="Add Category" class="button green"></p>
                    </form>
                    <a class="close-reveal-modal">&#215;</a>   
                </div> <!-- End modal -->

            </div>

            <script src="http://code.jquery.com/jquery-latest.js"></script>
            <script src="http://cdn.rawgit.com/noelboss/featherlight/1.4.1/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>


            <?php include('partials/footer.php'); ?>

            <?php
        } else {
            header('Location: /login.php');
        }
        ?> 
