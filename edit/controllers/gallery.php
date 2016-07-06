<?php

session_start();
require('../../localcms/settings.php');
require('../../localcms/db.php');

$action = $_POST['action'];

if ($_SESSION['user'] == true) {
    try {

        if ($action == 'add') {

             $src = $_FILES["imgfile"]["name"];
            
            $upload = $gallery_path . basename($_FILES["imgfile"]["name"]);
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

            $query = $DB->create('gallery', $data);
            header('Location: ../gallery.php');
        } else if ($action == 'delete') {
            unlink($gallery_path . $_POST['src']);
            $query = $DB->delete('gallery', $_POST['id']);
            
        } elseif ($action == 'add-slide') {

            $src = $_FILES["slidefile"]["name"];

            $slide = $slide_path . basename($_FILES["slidefile"]["name"]);
            if (!move_uploaded_file($_FILES["slidefile"]["tmp_name"], $slide)) {
                die("There was an error uploading the file, please try again!");
            }

            $data = array(
                'title' => $_POST['title'],
                'src' => $src
            );

            $query = $DB->create('slides', $data);
            header('Location: ../gallery.php');
    } else if ($action == 'delete-slide') {
            unlink($slide_path . $_POST['src']);
            $query = $DB->delete('slides', $_POST['id']);
        }

        $DB->flush_cache();
        header('Location: ../gallery.php');
    } catch (PDOException $e) {
        print 'Exception : ' . $e->getMessage();
    }
} else {
    header('Location: ../login.php');
}   
