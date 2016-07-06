<?php

require('localcms/loader.php');

$page = 'index';

if ($is_cached)
    $helper->set_cache($page, $cachetime);

$site_options = $helper->site_options($DB->read('options'));
$contents = $DB->read('contents');
$custitle = $DB->readSingle('custom', 'title', 1);
$custcontent = $DB->readSingle('custom', 'content', 1);
$navtype = $DB->read('options', 'nav_type');
$shoptype = $DB->read('options', 'shop_type');
$images = $DB->read('photos');
$logobgcol = $DB->readSingle('selections', 'logobgcol', 1);
$col = $logobgcol->logobgcol;
$navbgcol = $DB->readSingle('selections', 'navbgcol', 1);
$navbgcol = $navbgcol->navbgcol;
$conamecol = $DB->readSingle('selections', 'conamecol', 1);
$cocol = $conamecol->conamecol;
?>

<?php include('partials/header.php'); ?>

<?php include('partials/page.php'); ?>

<?php include('partials/footer.php'); ?>