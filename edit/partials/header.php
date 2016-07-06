<?php
require('../localcms/loader.php');

session_start();

$title = $DB->readSingle('options', 'content', 1);

if (!$_SESSION['alertType']) {
    $_SESSION['alertType'] = '';
}
if (!$_SESSION['message']) {
    $_SESSION['message'] = '';
}
?>
<!doctype html>
<html lang="en" <?php
if (!isset($_SESSION['user'])) {
    echo 'id="login"';
}
?>>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="shortcut icon" sizes="32x32" href="../images/favicon.png">  
        <title>Editing <?php echo $title->content; ?></title>
        <link rel="stylesheet" type="text/css" href="../css/editor/editor.css"></link>
        <link href="../less/styles.css" rel="stylesheet" media="screen, print">
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href="http://cdn.rawgit.com/noelboss/featherlight/1.4.1/release/featherlight.min.css" type="text/css" rel="stylesheet" />
        <script src='//cdn.tinymce.com/4/tinymce.min.js'></script>

        <script>
            tinymce.init({
                selector: '.prodev',
                plugins: 'textcolor image imagetools paste colorpicker textpattern media advlist autolink link image lists charmap print preview',
                toolbar: "forecolor backcolor media image paste",
                menubar: "insert",
                media_live_embeds: true
            });
        </script>

        <!-- jQuery -->
        <script src="../bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap JS -->
        <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- C3, D3 - Charting Libraries -->
        <script src="../bower_components/c3/c3.min.js"></script>
        <script src="../bower_components/d3/d3.min.js"></script>

        <!-- Datatables, jQuery Grid Component -->
        <!-- Note: jquery.dataTables.js must occur in the html source before patternfly*.js.-->
        <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="../bower_components/datatables-colvis/js/dataTables.colVis.js"></script>
        <script src="../bower_components/datatables-colreorder/js/dataTables.colReorder.js"></script>

        <!-- PatternFly Custom Componets -  Sidebar, Popovers and Datatables Customizations -->
        <!-- Note: jquery.dataTables.js must occur in the html source before patternfly*.js.-->
        <script src="../bower_components/patternfly/dist/js/patternfly.min.js"></script>

        <!-- Bootstrap Combobox -->
        <script src="../bower_components/bootstrap-combobox/js/bootstrap-combobox.js"></script>

        <!-- Bootstrap Date Picker -->
        <script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

        <!-- Bootstrap Date Time Picker - requires Moment -->
        <script src="../bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

        <!-- Bootstrap Select -->
        <script src="../bower_components/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

        <!-- Bootstrap Switch -->
        <script src="../bower_components/bootstrap-switch/dist/js/bootstrap-switch.min.js"></script>

        <!-- Bootstrap Touchspin -->
        <script src="../bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>

        <!-- Bootstrap Tree View -->
        <script src="../bower_components/bootstrap-treeview/dist/bootstrap-treeview.min.js"></script>

        <!-- Google Code Prettify - Syntax highlighting of code snippets -->
        <script src="../bower_components/google-code-prettify/bin/prettify.min.js"></script>

        <!-- MatchHeight - Used to make sure dashboard cards are the same height -->
        <script src="../bower_components/matchHeight/jquery.matchHeight-min.js"></script>

        <!-- Moment - required by Bootstrap Date Time Picker -->
        <script src="../bower_components/moment/min/moment.min.js"></script>

        <!-- Angular Application? You May Want to Consider Pulling Angular-PatternFly And Angular-UI Bootstrap instead of bootstrap.js -->
        <!-- See https://github.com/patternfly/angular-patternfly for more information -->



        <script>
            $(document).ready(function () {
                $('#dropdown').on('change', function () {
                    if (this.value == '5')
                    {
                        $("#frontpage").show();
                    } else if (this.value == '4')
                    {
                        $("#frontpage").hide();
                    } else if (this.value == '3')
                    {
                        $("#frontpage").hide();
                    } else if (this.value == '2')
                    {
                        $("#frontpage").hide();
                    } else if (this.value == '1')
                    {
                        $("#frontpage").hide();
                    } else if (this.value == '0')
                    {
                        $("#frontpage").hide();
                    }
                });
            });
        </script>

    </head>
