<?php

session_start();
require('../../localcms/settings.php');
require('../../localcms/db.php');

$action = $_POST['action'];
$newfilename = 'menu.pdf';

if ($_SESSION['user'] == true) {
    try {
        if ($action == 'addmenu') {

            $target_dir = $menu_path;
            $target_file = $target_dir . basename($_FILES["menufile"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
            if (isset($_POST["submit"])) {
                $mime = "application/pdf; charset=binary";
                exec("file -bi " . $_FILES["menufile"]["tmp_name"], $out);
                if ($out[0] != $mime) {
                    echo "File is not a PDF.";
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
            if ($_FILES["menufile"]["size"] > 250000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
// Allow certain file formats
            if ($imageFileType != "pdf") {
                echo "Sorry, only PDF files allowed";
                $uploadOk = 0;
            }
// Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
            } else {

                if (move_uploaded_file($_FILES["menufile"]["tmp_name"], $target_dir . $newfilename)) {
                    echo "The file " . $newfilename . " has been uploaded.";
                    $pdf_file = $menu_path . $newfilename;
                    $save_to = $menu_path .'menu.jpg';
                    
                    $img = new imagick($pdf_file);
                    $img->setImageFormat('jpg');
                    $img->writeImage($save_to);
                    
                    header('Location: ../menus.php');
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
                header('Location: ../menus.php');
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
            unlink($menu_path . $newfilename);
        }

        $DB->flush_cache();
        header('Location: ../menus.php');
    } catch (PDOException $e) {
        print 'Exception : ' . $e->getMessage();
    }
} else {
    header('Location: ../login.php');
}   

