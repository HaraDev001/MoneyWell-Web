<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <title>MoneyWell</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
<!--    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />-->
    <link href="<?=ASSETS_DIR ?>/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=ASSETS_DIR ?>/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=ASSETS_DIR ?>/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=ASSETS_DIR ?>/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?=ASSETS_DIR ?>/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=ASSETS_DIR ?>/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <link href="<?=ASSETS_DIR ?>/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=ASSETS_DIR ?>/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="<?=ASSETS_DIR ?>/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
    <link href="<?=ASSETS_DIR ?>/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="<?=ASSETS_DIR ?>/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="<?=ASSETS_DIR ?>/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
<!--    <link href="--><?//=ASSETS_DIR ?><!--/layouts/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color" />-->
    <link href="<?=ASSETS_DIR ?>/layouts/layout/css/themes/light.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="<?=ASSETS_DIR ?>/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />

    <link href="<?=ASSETS_DIR ?>/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />

    <link href="<?=CSS_DIR ?>/dashboard.css" rel="stylesheet" type="text/css" />
<!--    <link href="--><?//=ASSETS_DIR ?><!--/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />-->

    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" /> </head>

    <!---js--->
    <script src="<?=ASSETS_DIR ?>/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/js.cookie.min.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="<?=ASSETS_DIR ?>/global/plugins/moment.min.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/morris/morris.min.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
<!--    <script src="--><?//=ASSETS_DIR ?><!--/global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>-->
    <script src="<?=ASSETS_DIR ?>/global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/horizontal-timeline/horozontal-timeline.min.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>

    <script src="<?=ASSETS_DIR ?>/global/scripts/app.min.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/pages/scripts/dashboard.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>

    <script src="<?=ASSETS_DIR ?>/global/scripts/datatable.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/pages/scripts/table-datatables-editable.min.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/pages/scripts/ui-bootbox.min.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>


    <script src="<?=ASSETS_DIR ?>/global/scripts/datatable.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
    <script src="<?=ASSETS_DIR ?>/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>

    <script src="<?=JS_DIR ?>/message.js"></script>
    <script src="<?=JS_DIR ?>/common.js"></script>
    <script src="<?=JS_DIR ?>/ajax.js"></script>
    <script src="<?=JS_DIR?>/md5.js"></script>
    <script src="<?=JS_DIR?>/uploadFile.js"></script>
    <script src="<?=JS_DIR ?>/imgchecker.js"></script>
    <!---js--->

    <style type="text/css">
        .page-content {
            /*background-color: #f2f3f8;*/
            background-color: #ffffff;
        }
    </style>

    <?php date_default_timezone_set('Asia/Shanghai'); ?>
</head>

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
<form id="form" name="form" method="post" action="" enctype="multipart/form-data">
    <? $this->load->view('/template/topbar'); ?>
    <div>
        <? $this->load->view('/template/sidebar'); ?>
        <?php echo $content; ?>

    </div>
</form>

<? $this->load->view('/template/dialogCommon'); ?>
</body>
</html>