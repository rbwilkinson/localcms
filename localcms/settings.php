<?php

/**
 * Settings
 */

$db_name = 'lcms.sqlite';
define('ABSPATH', str_replace('\\', '/', dirname(__FILE__)) . '/');

date_default_timezone_set('Europe/London');

$upload_path = ABSPATH . "../images/uploads/";
$bgupload_path = ABSPATH . "../images/";
$menu_path = ABSPATH . "../appdata/";
$logoupload_path = ABSPATH . "../images/logo/";
$gallery_path = ABSPATH . "../images/gallery/";
$slide_path = ABSPATH . "../images/slideshow/";

$is_cached = false; // Set to true to enable page caching in HTML
$cachetime = 120; // cache time in seconds 3600 = 1 hour

$currency = '&pound;';