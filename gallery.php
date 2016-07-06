<?php
error_reporting(E_ALL);
require('localcms/loader.php');
$page = 'gallery';

// Set caching
if ($is_cached) {
    $helper->set_cache($page, $cachetime);
}

// Grab the data from the database
$site_options = $helper->site_options($DB->read('options'));
$pics = $DB->read('gallery', 'src');
?>

<?php include('partials/header.php'); ?>

<div class="container">

    <div class="hero menu-hero clearfix">
        <div class="row">
            <div class="columns large-9">
                <h3><a href="./" title="Return to homepage" data-instant><?php echo $site_options->name; ?></a></h3>  
            </div>

            <div class="columns large-3">
                <a href="./" class="menu" data-instant>Return Home</a>
            </div>

            <div class="clear"></div>
        </div>
    </div>

    <div class="row">
        <h2><?php echo $site_options->name; ?> Gallery</h2>
        <div id="gallery">
            <section id="pics">                
                <?php
                if (count($pics) > 0) { 
                    foreach ($pics as $pic) {
                        ?>      
                <a href="#" data-featherlight="images/gallery/<?php echo $pic->src;?>"><img src="images/gallery/<?php echo $pic->src; ?>" alt="<?php echo $pic->title; ?>" class='col-md-4'>              
                        <?php
                    }
                }
                ?>
            </section>
        </div><!-- /gallery --->
    </div>
</div>

<script src="http://cdn.rawgit.com/noelboss/featherlight/1.4.1/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>

<?php include('partials/footer.php'); ?>
