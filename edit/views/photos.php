
<?php
if ($_SESSION['user'] = true) {
  $photos = $DB->read('photos', 'title'); 

?>
  <body id="edit">

    <?php 
      $active = 'photos';
      include('partials/nav.php'); 
    ?>

    <div id="content">
        
        <div id="header">
            <h3>Photo Management</h3>
            <div class="clear"></div> 
        </div>
        <div class="alert <?php echo $_SESSION['alertType']; ?>"><?php echo $_SESSION['message']; ?></div>

        <?php 
        $logo = '../images/uploads/logo.png';
              if(file_exists($logo)){ ?>
               <form method="post" action="controllers/photos.php" class="delete-image">
              <div class="img left"><img src="../images/uploads/logo.png"></div>                
              <strong><?php echo $photo->title; ?></strong>  
              <input type="hidden" name="id" value="<?php echo $photo->id; ?>">
              <input type="hidden" name="src" value="<?php echo $photo->src; ?>">
              <input type="hidden" name="action" value="deletelogo" ><p />
              <input type="submit" name="submit" value="Delete Logo" class="delete">
            </form>
        <br />
             <?php } else {
         echo '<tr><td colspan="7"><h4>No logo image yet.</h4> <a href="#" data-reveal-id="add-image" class="button green">Add one</a></td></tr>';
         ?>
        <div class="clear"></div>
        <br> 
        <div id="add-image" class="reveal-modal">
            <form method="post" action="controllers/photos.php" enctype="multipart/form-data">
              <h3>Upload a New Image</h3>
              <p><label>Select a image to upload</label> 
                <input type="file" name="logoimgfile">
              </p>              
              <input type="hidden" name="action" value="addlogo">
              <p><br><input type="submit" name="submit" class="button green" value="Add Logo"></p>
            </form>
            <a class="close-reveal-modal">&#215;</a>  
        </div>
    
             <?php }?>
        <br />
        <div style='clear: both; height: 10px;'></div>
        <hr />
        <?php if (count($photos) > 0) {
          foreach($photos as $photo) { ?>      
          <div class="column-3 photo">

            <form method="post" action="controllers/photos.php" class="delete-image">
              <div class="img left"><img src="../images/uploads/<?php echo $photo->src; ?>" width="150"></div>                
              <strong><?php echo $photo->title; ?></strong>  
              <input type="hidden" name="id" value="<?php echo $photo->id; ?>">
              <input type="hidden" name="src" value="<?php echo $photo->src; ?>">
              <input type="hidden" name="action" value="delete" ><br />
              <input type="submit" name="submit" value="Delete" class="delete">
            </form>
            <div class="clear"></div>
          </div>
        <?php } ?>          
        <?php } else {
          echo '<tr><td colspan="7"><em>No menu images yet.</em> <a href="#" data-reveal-id="add-image" class="button green">Add one</a></td></tr>';
        } ?>
        <div class="clear"></div>
        <p><a href="#" data-reveal-id="add-image" class="button green">Upload a New Image</a></p>
        <br> 
      </div>
        <div id="add-image" class="reveal-modal">
            <form method="post" action="controllers/photos.php" enctype="multipart/form-data">
              <h3>Upload a New Image</h3>
              <p><label>Select a image to upload</label> 
                <input type="file" name="imgfile">
              </p>              
              <p><label>Give it a title</label><input type="title" name="title" placeholder="Slide 1"></p>

              <input type="hidden" name="action" value="add">
              <p><br><input type="submit" name="submit" class="button green" value="Add Image"></p>
            </form>
            <a class="close-reveal-modal">&#215;</a>  
        </div>
      </div>
    </div>
    
  <?php include('partials/footer.php'); ?>

<?php } else {
  header('Location: /login.php');
} ?> 
