<?php
if ($_SESSION['user'] = true) {
    $photos = $DB->read('gallery', 'title');
    $slides = $DB->read('slides', 'title');
    ?>

    <body id="edit">

        <?php
        $active = 'gallery';
        include('partials/nav.php');
        ?>

        <div id="content">
            <p style="color: 007777;"><b><h2>Gallery Management</h2></b></p>
            <div class="alert <?php echo $_SESSION['alertType']; ?>"><?php echo $_SESSION['message']; ?></div>
            <?php
            if (count($photos) > 0) {
                foreach ($photos as $photo) {
                    ?>      
                     <div class="photo column-3 left">
                        <div class="img left"><img src="../images/gallery/<?php echo $photo->src; ?>" width="150"></div>
                        <strong><?php echo $photo->title; ?></strong>  
                        <br /><br />
                        <form method="post" action="controllers/gallery.php" class="delete-image">
                            <br />
                            <input type="hidden" name="id" value="<?php echo $photo->id; ?>">
                            <input type="hidden" name="src" value="<?php echo $photo->src; ?>">
                            <input type="hidden" name="action" value="delete" ><br />
                            <input type="submit" name="submit" value="Delete" class="delete">
                        </form>
                    </div>
                <?php } ?>          
                <?php
            } else {
                echo '<tr><td colspan="7"><em>No menu images yet.</em> <a href="#" data-reveal-id="add-image" class="button green">Add one</a></td></tr>';
            }
            ?>
            <div class="clear"></div>
            <p><a href="#" data-reveal-id="add-image" class="button green">Upload a Gallery Image</a></p>
            <hr />
            
            
            <div id="add-image" class="reveal-modal">
                <form method="post" action="controllers/gallery.php" enctype="multipart/form-data">
                    <h3>Upload a New Image</h3>
                    <p><label>Select a image to upload</label> 
                        <input type="file" name="imgfile">
                    </p>              
                    <p><label>Give it a title</label>
                        <input type="title" name="title" placeholder="A nice picture"></p>
                    <input type="hidden" name="action" value="add" />
                    <br />
                    <p><input type="submit" name="submit" class="button green" value="Add Image"></p>
                </form>
                <a class="close-reveal-modal">&#215;</a>  
            </div>
  
            <p style="color: 007777;"><b><h2>Slideshow Management</h2></b></p>

            <?php
            if (count($slides) > 0) {
                foreach ($slides as $slide) {
                    ?>      
                    <div class="photo column-3 left">
                        <div class="img left"><img src="../images/slideshow/<?php echo $slide->src; ?>" width="150"></div>
                        <strong><?php echo $slide->title; ?></strong>  
                        <br /><br />
                        <form method="post" action="controllers/gallery.php" class="delete-image">
                            <br />
                            <input type="hidden" name="id" value="<?php echo $slide->id; ?>">
                            <input type="hidden" name="src" value="<?php echo $slide->src; ?>">
                            <input type="hidden" name="action" value="delete-slide" ><br />
                            <input type="submit" name="submit" value="Delete" class="delete">
                        </form>
                    </div>
                <?php } ?>          
                <?php
            } else {
                echo '<tr><td colspan="7"><em>No menu images yet.</em> <a href="#" data-reveal-id="add-image" class="button green">Add one</a></td></tr>';
            }
            ?>
            <div class="clear"></div>
            <p>
                <a href="#" data-reveal-id="add-slide" class="button green">Upload a Slide Image</a>
            </p>

            <div id="add-slide" class="reveal-modal">
                <form method="post" action="controllers/gallery.php" enctype="multipart/form-data">
                    <h3>Upload a Slide Image</h3>
                    <p><label>Select a image to upload</label> 
                        <input type="file" name="slidefile">
                    </p>              
                    <p><label>Place some text describing image</label>
                        <input type="title" name="title" placeholder="This ia a very nice picture"></p>
                    <input type="hidden" name="action" value="add-slide" />
                    <p><br><input type="submit" name="submit" class="button green" value="Add Slide"></p>
                </form>
                <a class="close-reveal-modal">&#215;</a>  
            </div>
        </div><!--- content --->

        <?php include('partials/footer.php'); ?>

        <?php
    } else {
        header('Location: /login.php');
    }
    ?> 


