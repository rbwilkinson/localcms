<div class="row">    

    <div id="footer" class="columns large-12">

        <?php
        $site_options = $helper->site_options($DB->read('options'));
        $facebook = $site_options->facebook;
        $instagram = $site_options->instagram;
        $pinterest = $site_options->pinterest;
        ?>
        <div style='width: 30%;margin: 0px auto; text-align: center;'>
            <?php if ($facebook != NULL) { ?> 
                <div style='text-align: center;' class='socbut'><a href='<?php echo $facebook; ?>' target="_blank"><img src='images/fb72.png' height='30' /></a></div>
            <?php } ?>

            <?php if ($instagram != NULL) { ?> 
                <div style='text-align: center;' class='socbut'><a href='<?php echo $instagram; ?>' target="_blank"><img src='images/instagram.png' width="30" /></a></div>
            <?php } ?>

            <?php if ($pinterest != NULL) { ?> 
                <div style='text-align: center;' class='socbut'><a href='<?php echo $pinterest; ?>' target="_blank"><img src='images/pinterest.png' width='30' /></a></div>
                    <?php } ?>
        </div>
        <br /><br />

        Copyright &copy; <script type="text/javascript">
            document.write(new Date().getFullYear());</script>, 

        <?php
        echo $site_options->name;
        ?> 

        <?php //if(isset($_SESSION['user'])){  ?>
<?php //}   ?>
    </div>

</div>  
</div>  

<script src="js/vendor/instantclick.min.js" data-no-instant></script>         
<script src="js/plugins.js" defer></script>
<script data-no-instant>InstantClick.init();</script>
<script>
    window.addEventListener('load', function() {
    FastClick.attach(document.body);
    }, false);</script>

<?php if ($site_options->analytics_code != '') { ?>
    <script>
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', '<?php echo $site_options->analytics_code; ?>']);
        _gaq.push(['_trackPageview']);
        (function() {
        var ga = document.createElement(‘script’); ga.type = ‘text / javascript’; ga.async = true;
        ga.src = (‘https:’ == document.location.protocol ? ‘https://ssl’ : ‘http://www’) + ‘.google-analytics.com/ga.js’;
                var s = document.getElementsByTagName(‘script’)[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>
<?php } ?>
</body>
</html>
<?php
if ($is_cached)
    $helper->end_cache($page);?>