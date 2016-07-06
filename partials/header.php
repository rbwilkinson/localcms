<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->  <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="shortcut icon" sizes="32x32" href="images/favicon.png"> 

        <title><?php
            if ($page != 'index') {
                echo ucfirst($page) . ' - ';
            } echo $site_options->name;
            ?></title>
        <meta name="description" content="<?php echo $site_options->description; ?>">

        <link href="less/styles.css" rel="stylesheet" media="screen, print">
        <link href="css/style.css" rel="stylesheet" media="screen, print" />
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,300italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic' rel='stylesheet' type='text/css' />
        <link href="http://cdn.rawgit.com/noelboss/featherlight/1.4.1/release/featherlight.min.css" type="text/css" rel="stylesheet" />

       

        <!-- jQuery -->
        <script src="bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap JS -->
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- C3, D3 - Charting Libraries -->
        <script src="bower_components/c3/c3.min.js"></script>
        <script src="bower_components/d3/d3.min.js"></script>

        <!-- Datatables, jQuery Grid Component -->
        <!-- Note: jquery.dataTables.js must occur in the html source before patternfly*.js.-->
        <script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="bower_components/datatables-colvis/js/dataTables.colVis.js"></script>
        <script src="bower_components/datatables-colreorder/js/dataTables.colReorder.js"></script>

        <!-- PatternFly Custom Componets -  Sidebar, Popovers and Datatables Customizations -->
        <!-- Note: jquery.dataTables.js must occur in the html source before patternfly*.js.-->
        <script src="bower_components/patternfly/dist/js/patternfly.min.js"></script>

        <!-- Bootstrap Combobox -->
        <script src="bower_components/bootstrap-combobox/js/bootstrap-combobox.js"></script>

        <!-- Bootstrap Date Picker -->
        <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

        <!-- Bootstrap Date Time Picker - requires Moment -->
        <script src="bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

        <!-- Bootstrap Select -->
        <script src="bower_components/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

        <!-- Bootstrap Switch -->
        <script src="bower_components/bootstrap-switch/dist/js/bootstrap-switch.min.js"></script>

        <!-- Bootstrap Touchspin -->
        <script src="bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>

        <!-- Bootstrap Tree View -->
        <script src="bower_components/bootstrap-treeview/dist/bootstrap-treeview.min.js"></script>

        <!-- Google Code Prettify - Syntax highlighting of code snippets -->
        <script src="bower_components/google-code-prettify/bin/prettify.min.js"></script>

        <!-- MatchHeight - Used to make sure dashboard cards are the same height -->
        <script src="bower_components/matchHeight/jquery.matchHeight-min.js"></script>

        <!-- Moment - required by Bootstrap Date Time Picker -->
        <script src="bower_components/moment/min/moment.min.js"></script>

        <!-- Angular Application? You May Want to Consider Pulling Angular-PatternFly And Angular-UI Bootstrap instead of bootstrap.js -->
        <!-- See https://github.com/patternfly/angular-patternfly for more information -->

         <script src='http://responsiveslides.com/responsiveslides.min.js?v=1.6'></script>
        
        <script>
            $(function () {

                // Slideshow 1
                $("#slides1").responsiveSlides({
                    auto: true,
                    pagination: true,
                    nav: true,
                    fade: 500,
                    pause: true,
                });

            });
        </script>

 <!-- Piwik -->
        <script type="text/javascript">
            var _paq = _paq || [];
            _paq.push(['trackPageView']);
            _paq.push(['enableLinkTracking']);
            (function () {
                var u = "//www.caffegelato.co/data/";
                _paq.push(['setTrackerUrl', u + 'piwik.php']);
                _paq.push(['setSiteId', 1]);
                var d = document, g = d.createElement('script'), s = d.getElementsByTagName('script')[0];
                g.type = 'text/javascript';
                g.async = true;
                g.defer = true;
                g.src = u + 'piwik.js';
                s.parentNode.insertBefore(g, s);
            })();
        </script>
    <noscript><p><img src="//www.caffegelato.co/data/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
    <!-- End Piwik Code -->

        
    </head>

    <body>
