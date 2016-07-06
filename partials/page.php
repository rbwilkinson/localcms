<div class="container">
    <?php
    $navtype = $DB->readSingle('selections', 'nav_type', 1);
    $navtype = $navtype->nav_type;
    $headerbgcol = $DB->readSingle('selections', 'headerbgcol', 1);
    $hbgcol = $headerbgcol->headerbgcol;
    $navbgcol = $DB->readSingle('selections', 'navbgcol', 1);
    $navbgcol = $navbgcol->navbgcol;
    $site_options = $helper->site_options($DB->read('options'));
    $facebook = $site_options->facebook;
    $slides = $DB->read('slides', 'src');
    ?>

    <!--- Upper bar --->
    <?php if ($navtype == 1) { ?>
        <div class="navbar" style="background-color: <?php echo $navbgcol; ?>;">
            <style>
                .navlist a{
                    color: <?php echo $cocol; ?>;
                }
                .navlist a:hover{
                    color: <?php echo $col; ?>
                }
            </style>
            <ul class="navlist" style="background-color: <?php echo $navbgcol; ?>;">
                <?php
                if (file_exists('appdata/menu.pdf') OR ( $menu != NULL)) {
                    ?>
                    <li><a href="menu.php">Menu</a> </li>
                <?php } ?>
                <li><a href="<?php echo $helper->map_address($site_options->address); ?>" title="View on Google Maps">Map</a> </li>

                <?php
                $files = (array_filter(glob('images/gallery/*'), 'is_file'));
                if (count($files) > 0) {
                    ?> 
                    <li><a href="gallery.php">Gallery</a> </li>
                <?php } ?>
            </ul>
        </div>

        <div class="hero clearfix" style="background-color: <?php echo $hbgcol; ?>;">
            <div class="row">
                <div class="columns large-12">
                    <h1 class="conamecol"><!--<img src="images/logo-light.png" width="160"><br>--> <a href="./" title="Return to homepage" data-instant style='color: <?php echo $cocol; ?>'><?php echo $site_options->name; ?></a></h1>  
                </div> 
                <div class="columns large-4 small-6 hours bgcol1">
                    <?php if ($facebook != NULL) { ?> 
                        <div style='text-align: center;' class='socbut'><a href='<?php echo $facebook; ?>' target="_blank"><img src='images/fb-f72.png' height='30' /></a></div>
                    <?php } ?>
                </div>
                <div class="columns large-3 bgcol3" style='background-color: <?php echo $col; ?>'>
                    <?php
                    $logo = "images/uploads/logo.png";
                    if (file_exists($logo)) {
                        ?>
                        <img src="<?php echo $logo; ?>" width='125' />
                    <?php } ?>
                </div>
            </div>

        <?php } ?>
    </div>
    <div class="clear"></div>
</div>
<?php if ($navtype == 1) { ?>

    <div class="row">
        <div style="float: left; width: 50%;">
        <h3>Open Hours</h3>
        <?php echo nl2br($site_options->hours); ?><br>
        <?php echo $helper->format_days($site_options->days); ?>
        <small><?php
            if ($site_options->days_closed != '') {
                echo '<br>Closed ' . $helper->format_closed_days($site_options->days_closed);
            }
            ?></small>
        </div>
        <div style="float: left; width: 40%;">
                <h3>Address</h3>
                <?php echo nl2br($site_options->address); ?><br>
                <a href="<?php echo $helper->map_address($site_options->address); ?>" title="View on Google Maps" target="_blank">View on map</a> 
        </div>
    </div>      
<?php } ?>

<!--- Lower Bar --->
<?php if ($navtype == 2) { ?>
    <div class="hero clearfix" style="background-color: <?php echo $hbgcol; ?>;">
        <div class="row">
            <div class="columns large-12">
                <h1 class="conamecol"><!--<img src="images/logo-light.png" width="160"><br>--> <a href="./" title="Return to homepage" data-instant style='color: <?php echo $cocol; ?>'><?php echo $site_options->name; ?></a></h1>  
            </div> 

            <div class="columns large-3 bgcol3" style='background-color: <?php echo $col; ?>'>
                <?php
                $logo = "images/uploads/logo.png";
                if (file_exists($logo)) {
                    ?>
                    <img src="<?php echo $logo; ?>" width='125' />
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</div>
<div class="clear"></div>
</div>
<?php if ($navtype == 2) { ?>
    <div class="navbar" style="background-color: <?php echo $navbgcol; ?>;">
        <style>
            .navlist a{
                color: <?php echo $cocol; ?>;
            }
            .navlist a:hover{
                color: <?php echo $col; ?>
            }
        </style>
        <ul class="navlist" style="background-color: <?php echo $navbgcol; ?>";>
        <?php
        if (file_exists('appdata/menu.pdf') OR ( $menu != NULL)) {
            ?>
                <li><a href="menu.php">Menu</a> </li>
            <?php } ?>
            <li><a href="<?php echo $helper->map_address($site_options->address); ?>" title="View on Google Maps">Map</a> </li>

            <?php
            $files = (array_filter(glob('images/gallery/*'), 'is_file'));
            if (count($files) > 0) {
                ?> 
                <li><a href="gallery.php">Gallery</a> </li>
            <?php } ?>
        </ul>
    </div>


    <div class="row">
        <div style="float: left; width: 50%;">
        <h3>Open Hours</h3>
        <?php echo nl2br($site_options->hours); ?><br>
        <?php echo $helper->format_days($site_options->days); ?>
        <small><?php
            if ($site_options->days_closed != '') {
                echo '<br>Closed ' . $helper->format_closed_days($site_options->days_closed);
            }
            ?></small>
        </div>
        <div style="float: left; width: 40%;">
                <h3>Address</h3>
                <?php echo nl2br($site_options->address); ?><br>
                <a href="<?php echo $helper->map_address($site_options->address); ?>" title="View on Google Maps" target="_blank">View on map</a> 
        </div>
    </div>      
<?php } ?>
<!--- Links in header -->
<?php if ($navtype == 3) { ?>
    <div class="hero clearfix" style="<?php echo $hbgcol; ?>">
        <div class="row">
            <div class="columns large-5 small-6 large-12">
          <h1 class="conamecol"><!--<img src="images/logo-light.png" width="160"><br>--> <a href="./" title="Return to homepage" data-instant style='color: <?php echo $cocol; ?>'><?php echo $site_options->name; ?></a></h1>  
            </div> 
            <div class="columns large-4 small-6 hours bgcol1">
                <h3>Open Hours</h3>
                <?php echo nl2br($site_options->hours); ?><br>
                <?php echo $helper->format_days($site_options->days); ?>
                <small><?php
                    if ($site_options->days_closed != '') {
                        echo '<br>Closed ' . $helper->format_closed_days($site_options->days_closed);
                    }
                    ?></small>
            </div>          

            <div class="columns large-5 small-6 location">
                <h3>Address</h3>
                <?php echo nl2br($site_options->address); ?><br>
                <a href="<?php echo $helper->map_address($site_options->address); ?>" title="View on Google Maps" target="_blank">View on map</a> 
            </div> 

            <div class="columns large-3 bgcol3" style='background-color: <?php echo $col; ?>'>
                <?php
                $logo = "images/uploads/logo.png";
                if (file_exists($logo)) {
                    ?>
                    <img src="<?php echo $logo; ?>" width='125' />
                <?php } ?>

                <a href="menu.php" class="menu" data-instant>Menu</a> 
                <?php
                $files = (array_filter(glob('images/gallery/*'), 'is_file'));
                if (count($files) > 0) {
                    ?> 
                    <a href="gallery.php" class="menu" data-instant>Gallery</a> 
                <?php } ?>
            </div>  
        </div>
    <?php } ?>
</div>

</div>
<div class="clear"></div>
</div>

<?php if ($navtype == 4) { ?>
    <div class="navbar" style="background-color: <?php echo $navbgcol; ?>;">
        <style>
            .navlist a{
                color: <?php echo $cocol; ?>;
            }
            .navlist a:hover{
                color: <?php echo $col; ?>
            }
        </style>
        <ul class="navlist" style="background-color: <?php echo $navbgcol; ?>" >
            <?php
            if (file_exists('appdata/menu.pdf') OR ( $menu != NULL)) {
                ?>
                <li><a href="menu.php">Menu</a> </li>
            <?php } ?>
            <li><a href="<?php echo $helper->map_address($site_options->address); ?>" title="View on Google Maps">Map</a> </li>

            <?php
            $files = (array_filter(glob('images/gallery/*'), 'is_file'));
            if (count($files) > 0) {
                ?> 
                <li><a href="gallery.php">Gallery</a> </li>
            <?php } ?>
        </ul>
    </div>

    <div class="row">
        <style>
            /*! http://responsiveslides.com v1.54 by @viljamis */
            #wrapper {
                margin: auto;
                width: 100%;
                margin-bottom: 50px;
            }

            .rslides {
                position: relative;
                list-style: none;
                overflow: hidden;
                width: 100%;
                padding: 0;
                margin: 0;
            }

            .rslides li {
                -webkit-backface-visibility: hidden;
                position: absolute;
                display: none;
                width: 100%;
                left: 0;
                top: 0;
            }

            .rslides li:first-child {
                position: relative;
                display: block;
                float: left;
            }

            .rslides img {
                display: block;
                height: auto;
                float: left;
                width: 100%;
                border: 0;
            }

            .rslides_container {
                margin-bottom: 50px;
                position: relative;
                float: left;
                width: 100%;
            }

            .rslides1_nav {
                position: absolute;
                -webkit-tap-highlight-color: rgba(0,0,0,0);
                top: 50%;
                left: 0;
                z-index: 99;
                opacity: 0.7;
                text-indent: -9999px;
                overflow: hidden;
                text-decoration: none;
                height: 61px;
                width: 38px;
                background: transparent url("images/themes.gif") no-repeat left top;
                margin-top: -45px;
            }

            .rslides1_nav:active {
                opacity: 1.0;
            }

            .rslides1_nav.next {
                left: auto;
                background-position: right top;
                right: 0;
            }

            .rslides2_nav {
                position: absolute;
                -webkit-tap-highlight-color: rgba(0,0,0,0);
                top: 0;
                left: 0;
                display: block;
                background: #fff; /* Fix for IE6-9 */
                opacity: 0;
                filter: alpha(opacity=1);
                width: 48%;
                text-indent: -9999px;
                overflow: hidden;
                height: 91%;
            }

            .rslides2_nav.next {
                left: auto;
                right: 0;
            }

            .rslides3_nav {
                position: absolute;
                -webkit-tap-highlight-color: rgba(0,0,0,0);                opacity: 0.6;

                text-indent: -9999px;
                overflow: hidden;
                top: 0;
                bottom: 0;
                left: 0;
                background: #000 url("images/themes.gif") no-repeat left 50%;
                width: 38px;
            }

            .rslides3_nav:active {
                opacity: 1.0;
            }

            .rslides3_nav.next {
                left: auto;
                background-position: right 50%;
                right: 0;
            }

            .rslides1_nav:focus,
            .rslides2_nav:focus,
            .rslides3_nav:focus {
                outline: none;
            }

            .rslides_tabs {
                margin-top: 10px;
                text-align: center;
            }

            .rslides_tabs li {
                display: inline;
                float: none;
                _float: left;
                *float: left;
                margin-right: 5px;
            }

            .rslides_tabs a {
                text-indent: -9999px;
                overflow: hidden;
                -webkit-border-radius: 15px;
                -moz-border-radius: 15px;
                border-radius: 15px;
                background: #ccc;
                background: rgba(0,0,0, .2);
                display: inline-block;
                _display: block;
                *display: block;
                -webkit-box-shadow: inset 0 0 2px 0 rgba(0,0,0,.3);
                -moz-box-shadow: inset 0 0 2px 0 rgba(0,0,0,.3);
                box-shadow: inset 0 0 2px 0 rgba(0,0,0,.3);
                width: 9px;
                height: 9px;
            }

            .rslides_tabs .rslides_here a {
                background: #222;
                background: rgba(0,0,0, .8);
            }

            .caption {
                position: absolute;
                display: block;
                bottom: 0;
                left: 0;
                right: 0;
                padding: 15px;
                text-align: center;
                background: #000;
                background: rgba(0,0,0, .8);
                color: #fff;
            }
        </style>
        <div id="wrapper">
            <div class="rslides_container">
                <ul id="slides1" class="rslides">

                    <?php foreach ($slides as $slide) { ?>
                        <li>
                            <img src="images/slideshow/<?php echo $slide->src; ?>"/>
                            <p class="caption"><?php echo $slide->title; ?></p>
                        </li>
                    <?php } ?>
                </ul>
            </div>

            <div class="columns large-12 bgcol3" style='background-color: <?php echo $col; ?>'>
               
                <?php include 'custom/index.php';?>
            <?php } ?>
        </div>
    </div>
</div>
</div>

<!-- Custom --->
<?php
if ($navtype == 5) {
    include 'custom/index.php';
}
?>      

<div class="row">
    <div class="content">
        <?php
        if (count($contents) > 0) {
            foreach ($contents as $content) {
                ?>
                <div class="columns large-12">
                    <h3><?php echo $content->title; ?></h3>
                    <p><?php echo $helper->cleanContent($content->content); ?></p> 
                </div> 
            <?php } ?>          
<?php } ?>


        <?php /* if (count($images) > 0) {  
          foreach($images as $image) { ?>
          <div class="image columns large-6">
          <img src="images/uploads/<?php echo $image->src; ?>" title="<?php echo $image->title; ?>">
          </div>
          <?php } ?>
          <?php } */ ?> 

        <div class="clear"></div>
        <br>

        <div class="columns large-5 large-centered medium-centered contact">
            <h3><?php
                if ($helper->is_open($site_options->days)) {
                    echo 'Yes, we\'re open today.';
                } else {
                    echo 'Sorry, we\'re not open today.';
                }
                ?></h3>
            Contact us by phone: <?php echo $site_options->phone; ?> 
            <br>or email: <a href="mailto:<?php echo $helper->safeEmail($site_options->email); ?>"><?php echo $helper->safeEmail($site_options->email); ?></a>
        </div>
    </div>  
</div>  


