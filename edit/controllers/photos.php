<?php

session_start();
require('../../localcms/settings.php');
require('../../localcms/db.php');

$action = $_POST['action'];



if ($_SESSION['user'] == true) {
    try {

        if ($action == 'add') {

            $src = $_FILES["imgfile"]["name"];

            $upload = $upload_path . basename($_FILES["imgfile"]["name"]);
            if (!move_uploaded_file($_FILES["imgfile"]["tmp_name"], $upload)) {
                die("There was an error uploading the file, please try again!");
            }
            $image_name = $upload . $src;
            list($width, $height) = getimagesize($image_name);

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

            $data = array(
                'title' => $_POST['title'],
                'src' => $src
            );

            $query = $DB->create('photos', $data);
        } elseif ($action == 'addlogo') {

            $src = $_FILES["logoimgfile"]["name"];

            $logo = 'logo.png';
            $upload = $logoupload_path . $logo;

            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
            if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["logoimgfile"]["tmp_name"]);
                if ($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }

            $consider = $upload;
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


                if (!move_uploaded_file($_FILES["logoimgfile"]["tmp_name"], $upload)) {
                    die("There was an error uploading the file, please try again!");
                }
                $image_name = $upload . $src;
                list($width, $height) = getimagesize($image_name);
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
        } elseif ($action == 'deletelogo') {
            unlink('../../images/logo/logo.png');
        } else if ($action == 'delete') {
            unlink($upload_path . $_POST['src']);
            $query = $DB->delete('photos', $_POST['id']);
        }

        $DB->flush_cache();
        header('Location: ../photos.php');
    } catch (PDOException $e) {
        print 'Exception : ' . $e->getMessage();
    }
} else {
    header('Location: ../login.php');
}   