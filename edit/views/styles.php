
<?php
if ($_SESSION['user'] = true) {
    $bgphoto = '../images/header-bg.png';
    $bgname = 'header-bg.png';
    $logobgcol = $DB->readSingle('selections', 'logobgcol', 1);
    $headerbgcol = $DB->readSingle('selections', 'headerbgcol', 1);
    $navbgcol = $DB->readSingle('selections', 'navbgcol', 1);
    $navbgcol = $navbgcol->navbgcol;
    $conamecol = $DB->readSingle('selections', 'conamecol', 1);
    $navtype = $DB->readSingle('selections', 'nav_type', 1);
    $navtype = $navtype->nav_type;
    
    $titled = $DB->readSingle('custom', 'title', 1);
    $titled = $titled->title;

    $content = $DB->readSingle('custom', 'content', 1);
    $content = $content->content;
    ?>

    <body id="edit">

        <?php
        $active = 'styles';
        include('partials/nav.php');
        ?>

        <div id="content">
            <div id="header">
                <h3>Edit Header </h3>
                <div class="clear"></div> 
            </div>

            <div class="alert <?php echo $_SESSION['alertType']; ?>"><?php echo $_SESSION['message']; ?></div>
            <h5>Navigation Type </h5>
            <?php echo $customised; ?>
            <div id="select-navtype" class="navig">
                <form method="post" action="controllers/styles.php" class="navtype">
                    <h5>Select Page Type</h5>
                    <select name="navtype" id="dropdown"> 
                        <option value=''>Select...</option>
                        <option value='1' <?php
                        if ($navtype == 1) {
                            echo 'selected';
                        }
                        ?>>Upper Bar</option>
                        <option value='2' <?php
                        if ($navtype == 2) {
                            echo 'selected';
                        }
                        ?>>Lower Bar</option>
                        <option value='3' <?php
                        if ($navtype == 3) {
                            echo 'selected';
                        }
                        ?>>Links in header</option>
                        <option value='4' <?php
                        if ($navtype == 4) {
                            echo 'selected';
                        }
                        ?>>Slideshow</option>
                        <option value='5' <?php
                        if ($navtype == 5) {
                            echo 'selected';
                        }
                        ?>>Custom</option>
                    </select>

                    <input type="hidden" name="bgaction" value="update-navtype">   
                    <button type="submit" class="btn btn-primary btn-lg" tabindex="4">Update</button>
                </form>
            </div>

            <?php
            if ($navtype == 5) {
                $val = 'block';
            } else {
                $val = 'none';
            }
            ?>

            <div id='frontpage' style="display: <?php echo $val; ?>;">
                <form method="post" action="controllers/styles.php" class="navtype">
                    <textarea class="prodev" name="prodev" ><?php echo $content; ?></textarea>
                    <input type="hidden" name="bgaction" value="prodev">  
                    <button type="submit" class="btn btn-primary btn-lg" tabindex="4">Submit</button>
                </form>
            </div>


            <?php
            echo '<h5>Background Image</h5>';

            if (file_exists($bgphoto)) {
                echo '<hr />';

                echo "The file $bgname exists";
                ?>      
                <div class="column-6 photo">
                    <div class="img left"><img src="../images/header-bg.png" width="300"></div>                
                    <form method="post" action="controllers/styles.php" class="delete-image">
                        <input type="hidden" name="bgaction" value="delete" >
                        <input type="submit" name="submit" value="Delete" class="delete">
                    </form>
                    <div class="clear"></div>
                </div>
    <?php } else { ?>
                <div class="clear"></div>
                <p><a href="#" data-reveal-id="add-bgimage" class="button green">Upload a New Image</a></p>
                <br> 

                <div id="add-bgimage" class="reveal-modal">
                    <form method="post" action="controllers/styles.php" enctype="multipart/form-data">
                        <h3>Upload a New Image</h3>
                        250K max. file size<br />
                        Recommended 800px width.<br />
                        <p><label>Select a image to upload</label> 
                            <input type="file" name="imgfile">
                        </p>              
                        <input type="hidden" name="bgaction" value="bgadd">
                        <p><br><input type="submit" name="submit" class="button green" value="Add Image"></p>
                    </form>
                    <a class="close-reveal-modal">&#215;</a>  
                </div>


    <?php } ?>

            <div>
                <hr />
                <h3>Menu Background Colour</h3>
                Type in a color name or use hex colour codes.<br />
                Get help <a href="http://www.color-hex.com/" target="_blank">here.</a>
                <br />
                <br />

                <div class="clear"></div> 
                <?php if ($navbgcol == NULL) {
                    ?>
                    <form method="post" action="controllers/styles.php">
                        <input type="text" name="navbgcol" value="" placeholder="yellow or #00b159">
                        <input type="hidden" name="bgaction" value="add-navbgcol">   
                        <div class="clear"></div><br>
                        <p><input type="submit" name="submit" value="Add Menu Background Colour" class="button green"></p>
                    </form>
                    <?php
                } elseif ($navbgcol != NULL) {
                    echo "<div style='width:60px; height:15px;background-color:" . $navbgcol . ";'></div> is current menu background colour.";
                    ?>
                    <form method="post" action="controllers/styles.php">
                        <input type="text" name="navbgcol" class='styles' value="<?php echo $navbgcol; ?>" placeholder="yellow or #00b159">
                        <input type="hidden" name="bgaction" value="update-navbgcol">   

                        <div class="clear"></div><br>
                        <p><input type="submit" name="submit" value="Update Menu Background Colour" class="button green"></p>
                    </form>      
    <?php } ?>
            </div>   


            <div>
                <hr />
                <h3>Edit Header Background Colour</h3>
                Type in a color name or use hex colour codes.<br />
                Get help <a href="http://www.color-hex.com/" target="_blank">here.</a>
                <br />
                <br />

                <div class="clear"></div> 
                <?php if ($headerbgcol == NULL) {
                    ?>
                    <form method="post" action="controllers/styles.php">
                        <input type="text" name="headerbgcol" value="" placeholder="yellow or #00b159">
                        <input type="hidden" name="bgaction" value="add-headerbgcol">   
                        <div class="clear"></div><br>
                        <p><input type="submit" name="submit" value="Add Header Background Colour" class="button green"></p>
                    </form>
                    <?php
                } elseif ($headerbgcol != NULL) {
                    $hbgcol = $headerbgcol->headerbgcol;
                    echo "<div style='width:60px; height:15px;background-color:" . $hbgcol . ";'></div> is current  background colour.";
                    ?>
                    <form method="post" action="controllers/styles.php">
                        <input type="text" name="headerbgcol" class='styles' value="<?php echo $hbgcol; ?>" placeholder="yellow or #00b159">
                        <input type="hidden" name="bgaction" value="update-headerbgcol">   

                        <div class="clear"></div><br>
                        <p><input type="submit" name="submit" value="Update Background Colour" class="button green"></p>
                    </form>      
    <?php } ?>
            </div>


            <div>
                <hr />
                <h3>Edit Logo Background Colour</h3>
                Type in a color name or use hex colour codes.<br />
                Get help <a href="http://www.color-hex.com/" target="_blank">here.</a>
                <br />
                <br />

                <div class="clear"></div> 
                <?php if ($logobgcol == NULL) {
                    ?>
                    <form method="post" action="controllers/styles.php">
                        <input type="text" name="logobgcol" value="" placeholder="yellow or #00b159">
                        <input type="hidden" name="bgaction" value="add-logobgcol">   
                        <div class="clear"></div><br>
                        <p><input type="submit" name="submit" value="Add Background Colour" class="button green"></p>
                    </form>
                    <?php
                } elseif ($logobgcol != NULL) {
                    $col = $logobgcol->logobgcol;
                    echo "<div style='width:60px; height:15px;background-color:" . $col . ";'></div> is current Logo background colour.";
                    ?>
                    <form method="post" action="controllers/styles.php">
                        <input type="text" name="logobgcol" class='styles' value="<?php echo $col; ?>" placeholder="yellow or #00b159">
                        <input type="hidden" name="bgaction" value="update-logobgcol">   

                        <div class="clear"></div><br>
                        <p><input type="submit" name="submit" value="Update Background Colour" class="button green"></p>
                    </form>      
    <?php } ?>
            </div>
            <div>
                <hr />
                <h3>Company Name Colour</h3>
                <div class="clear"></div> 
                <?php if ($conamecol == NULL) {
                    ?>
                    <form method="post" action="controllers/styles.php">
                        <input type="text" name="conamecol" class='styles' value="" placeholder="grey or #333">
                        <input type="hidden" name="bgaction" value="add-conamecol">   
                        <div class="clear"></div><br>
                        <p><input type="submit" name="submit" value="Set Colour" class="button green"></p>
                    </form>
                    <?php
                } elseif ($conamecol != NULL) {
                    $cocol = $conamecol->conamecol;
                    echo "<div style='width:60px; height:15px;background-color:" . $cocol . ";'></div> is current Name colour.";
                    ?>
                    <form method="post" action="controllers/styles.php">
                        <input type="text" name="conamecol" class='styles' value="<?php echo $cocol; ?>" placeholder="grey or #333">
                        <input type="hidden" name="bgaction" value="update-conamecol">   

                        <div class="clear"></div><br>
                        <p><input type="submit" name="submit" value="Update Name Colour" class="button green"></p>
                    </form>
    <?php } ?>
            </div>
        </div>

        <?php include('partials/footer.php'); ?>

        <?php
    } else {
        header('Location: /login.php');
    }
    ?> 
