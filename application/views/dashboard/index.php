<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
<!--        <div class="page-bar">-->
<!--            <ul class="page-breadcrumb">-->
<!--                <li>-->
<!--                    <a href="/dashboard/index">Home</a>-->
<!--                    <i class="fa fa-circle"></i>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <span>Dashboard</span>-->
<!--                </li>-->
<!--            </ul>-->
<!---->
<!--        </div>-->
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Dashboard
            <small>dashboard & statistics</small>
        </h3>

        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                    <div class="visual">
                        <i class="fa fa-comments"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" >0</span>
                        </div>
                        <div class="desc"> User </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                    <div class="visual">
                        <i class="fa fa-bar-chart-o"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" >0</span> </div>
                        <div class="desc"> Group </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                    <div class="visual">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" >0</span>
                        </div>
                        <div class="desc"> Transaction money </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                    <div class="visual">
                        <i class="fa fa-globe"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" >0</span> </div>
                        <div class="desc"> Advertisement </div>
                    </div>
                </a>
            </div>
        </div>

        <div style="min-height: 700px;">
            <? for ($i = 0; $i < 4; $i++) { ?>
            <div class="col-md-6 col-sm-6">
                <!-- BEGIN PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-share font-red-sunglo hide"></i>
                            <span class="caption-subject font-dark bold uppercase"><? if ($i == 0) { ?>User logs<? } else if ($i == 1) { ?>Group logs<? } else if ($i == 2) { ?>Transaction logs<? } else { ?>Notification logs<? } ?></span>
                            <span class="caption-helper">monthly stats...</span>
                        </div>
                        <div class="actions">
                            <div class="btn-group">
                                <a href="" class="btn dark btn-outline btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Filter Range
                                    <span class="fa fa-angle-down"> </span>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a onclick="filter('2017');"> 2017
                                            <span class="label label-sm label-default"> past </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a onclick="filter('2018');"> 2018
                                            <span class="label label-sm label-default"> past </span>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a onclick="filter('2019');"> 2019
                                            <span class="label label-sm label-success"> current </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a onclick="filter('2020');"> 2020
                                            <span class="label label-sm label-warning"> upcoming </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="site_activities_loading<?=$i ?>">
                            <img src="<?=ASSETS_DIR ?>/global/img/loading.gif" alt="loading" /> </div>
                        <div id="site_activities_content<?=$i ?>" class="display-none">
                            <div id="site_activities<?=$i ?>" style="height: 228px;"> </div>
                        </div>
                    </div>
                </div>
                <!-- END PORTLET-->
            </div>
            <? } ?>
        </div>
    </div>
</div>

<input type="hidden" id="year" name="year" value="0"/>

<script>
    var data1 = [];
    initialize()
    function initialize() {
        data1[0] = [];
        <? foreach ($barOwnerGraphData as $key => $value) { ?>
        var item = [<?=$value['m'] ?>, <?=$value['ownerCount'] ?>];
        data1[0].push(item);
        <? } ?>

        data1[1] = [];
        <? foreach ($barGraphData as $key => $value) { ?>
            var item = [<?=$value['m'] ?>, <?=$value['barCount'] ?>];
            data1[1].push(item);
        <? } ?>

        data1[2] = [];
        <? foreach ($subscripedGraphData as $key => $value) { ?>
        var item = [<?=$value['m'] ?>, <?=$value['barCount'] ?>];
        data1[2].push(item);
        <? } ?>

        data1[3] = [];
        <? foreach ($canceledGraphData as $key => $value) { ?>
        var item = [<?=$value['m'] ?>, <?=$value['barCount'] ?>];
        data1[3].push(item);
        <? } ?>
    }

    function filter(year) {
        // var url = "/dashboard/getGraphData";
        // var postdata = {};
        // postdata['status'] = status;
        // postdata['year'] = year;
        //
        // sendAjax(url, postdata, function(data){
        //     if(data) {
        //         if (data === '0' || data === 0)
        //         {
        //             alert(g_operateFail)
        //         }
        //         else if (data === '1' || data === 1)
        //         {
        //             data1[status] = [];
        //             Dashboard();
        //         }
        //         else
        //         {
        //             data1[status] = [];
        //
        //             for (var i = 0; i < data.length; i++)
        //             {
        //                 var item = [data[i]['m'], data[i]['barCount']];
        //                 data1[status].push(item);
        //             }
        //
        //             Dashboard();
        //         }
        //     }
        // }, 'json');
        document.getElementById('year').value = year;
        pageMove('/dashboard/index');
    }
</script>
