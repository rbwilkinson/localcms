<?php

session_start();
require('../../localcms/settings.php');
require('../../localcms/db.php');

$action = $_POST['bgaction'];
$newfilename = 'header-bg.png';

if ($_SESSION['user'] == true) {
    try {

        if ($action == 'bgadd') {

            $target_dir = $bgupload_path;
            $target_file = $target_dir . basename($_FILES["imgfile"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
            if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["imgfile"]["tmp_name"]);
                if ($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }

            $consider = $target_file;
            unlink($consider);

            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists. ";
                $uploadOk = 0;
            }
// Check file size
            if ($_FILES["imgfile"]["size"] > 250000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
// Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png") {
                echo "Sorry, only PNG and JPG files allowed";
                $uploadOk = 0;
            }
// Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
            } else {

                if (move_uploaded_file($_FILES["imgfile"]["tmp_name"], $target_dir . $newfilename)) {
                    echo "The file " . $newfilename . " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
                header('Location: ../styles.php');
            }


            //$new_image_name = $upload_path.$_FILES["imgfile"]["name"];

            /*
              if ($width > $height) {
              $ratio = (250/$width);
              $new_width = round($width*$ratio);
              $new_height = round($height*$ratio);
              } else {
              $ratio = (250/$height);
              $new_width = round($width*$ratio);
              $new_height = round($height*$ratio);
              }

              $image_p = imagecreatetruecolor($new_width,$new_height);
              $img_ext = $_FILES['imgfile']['type'];

              if (img_ext == "image/jpg" || img_ext == "image/jpeg") {
              $image = imagecreatefromjpg($image_name);
              } else if ($img_ext == "image/png") {
              $image = imagecreatefrompng($image_name);
              } else if ($img_ext == "image/gif") {
              $image = imagecreatefromgif($image_name);
              } else {
              //die('Not a valid image');
              }

              imagecopyresampled($image_p,$image,0,0,0,0,$new_wi dth,$new_height,$width,$height);
              imagejpeg($image_p,$src,100);
             */
        } else if ($action == 'delete') {
            unlink($bgupload_path . "header-bg.png" );
        }

        if ($action == 'add-logobgcol') {

            $logobgcol = $_POST['logobgcol'];
            $data = array(
                'logobgcol' => $logobgcol);
            $query = $DB->create('selections', $data);
        } elseif ($action == 'update-logobgcol') {
            $date_modified = time();
            $id = 1;
            $logobgcol = $_POST['logobgcol'];
            $data = array(
                'logobgcol' => $logobgcol);
            $query = $DB->update('selections', $data, $id);
        }
        
        if ($action == 'add-headerbgcol') {

            $headerbgcol = $_POST['headerbgcol'];
            $data = array(
                'headerbgcol' => $headerbgcol);
            $query = $DB->create('selections', $data);
        } elseif ($action == 'update-headerbgcol') {
            $date_modified = time();
            $id = 1;
            $headerbgcol = $_POST['headerbgcol'];
            $data = array(
                'headerbgcol' => $headerbgcol);
            $query = $DB->update('selections', $data, $id);
        }
        
         if ($action == 'add-navbgcol') {

            $headerbgcol = $_POST['navbgcol'];
            $data = array(
                'navbgcol' => $navbgcol);
            $query = $DB->create('selections', $data);
        } elseif ($action == 'update-navbgcol') {
            $date_modified = time();
            $id = 1;
            $navbgcol = $_POST['navbgcol'];
            $data = array(
                'navbgcol' => $navbgcol);
            $query = $DB->update('selections', $data, $id);
        }
        
        if ($action == 'add-conamecol') {

            $conamecol = $_POST['conamecol'];
            $data = array(
                'conamecol' => $conamecol);
            $query = $DB->create('selections', $data);
            
        } elseif ($action == 'update-conamecol') {
            
            $date_modified = time();
            $id = 1;
            $conamecol = $_POST['conamecol'];
            $data = array(
                'conamecol' => $conamecol);
            $query = $DB->update('selections', $data, $id);
        } elseif ($action == 'update-navtype') {
            $date_modified = time();
            $id = 1;
            $navtype = $_POST['navtype'];
            $data = array(
                'nav_type' => $navtype);
            $query = $DB->update('selections', $data, $id);
        } elseif ($action == 'prodev') {
            $date_modified = time();
            $id = 1;
            $prodev = $_POST['prodev'];
            $data = array(
                'content' => $prodev);
            $query = $DB->update('custom', $data, $id);
        }
            
        
        $DB->flush_cache();
        header('Location: ../styles.php');
    } catch (PDOException $e) {
        print 'Exception : ' . $e->getMessage();
    }
} else {
    header('Location: ../login.php');
}   