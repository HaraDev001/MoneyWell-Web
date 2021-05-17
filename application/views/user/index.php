
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
<!--                    <span>User</span>-->
<!--                </li>-->
<!--            </ul>-->
<!---->
<!--        </div>-->
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Users
<!--            <small>Management</small>-->
        </h3>

        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase"> Managed User Table</span>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <button id="sample_editable_1_new" class="btn sbold green"> Add New
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th> Username </th>
                                <th> PayPal Account </th>
                                <th> Email </th>
                                <th> Actions </th>
                            </tr>
                            </thead>

                            <tbody>
                            <?foreach ($userList as $key => $value){?>
                            <tr class="odd gradeX">
                                <td><?=$key + 1?></td>
                                <td><?=$value['name'] ?></td>
                                <td><?=$value['paypal_email']?></td>
                                <td><?=$value['email']?></td>
<!--                                <td style="text-align: center; white-space: nowrap;">-->
                                <td style="">
                                    <button class="btn btn-outline btn-circle btn-sm blue"><i class="fa fa-archive"></i> Edit</button>
                                    <button class="btn btn-outline btn-circle btn-sm purple" onclick="pageMove('/user/userDetail?userId=<?=$value['id']?>')"><i class="fa fa-edit"></i> Detail</button>
                                    <button class="btn btn-outline btn-circle dark btn-sm black" onclick="bootbox.confirm(g_confirmDeleteMsg, function(result) {
                                       if (result) {
                                            disableBar('<?=$value['id'] ?>');
                                            return false;
                                       }
                                    })"><i class="fa fa-trash-o"></i> Delete</button>
                                </td>
                            <? } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>

    </div>
</div>

<style>
    table.dataTable.no-footer {
        border-bottom: none;
    }
</style>

<script type="text/javascript">
    $(document).ready(function () {
        // $('#sample_1').dataTable();
        // initializeTables();
        // initializeDates();
    });

    var searchKey = 's_user_name';

    function search() {
        initializeTables();
    }

    function disableUser(id) {
        var url = "/user/disableUser";
        var postdata = {};
        postdata['userId'] = id;

        sendAjax(url, postdata, function(data){
            if(data) {
                if (data === '0' || data === 0)
                {
                    alert(g_operateFail)
                }
                else if (data === '1' || data === 1)
                {
                    bootbox.alert(g_operateSuccess, function () {
                        pageMove('/user/index');
                    });
                }
            }
        }, 'json');
    }

    function restoreUser(id) {
        var url = "/user/restoreUser";
        var postdata = {};
        postdata['userId'] = id;

        sendAjax(url, postdata, function(data){
            if(data) {
                if (data === '0' || data === 0)
                {
                    alert(g_operateFail)
                }
                else if (data === '1' || data === 1)
                {
                    bootbox.alert(g_operateSuccess, function () {
                        pageMove('/user/index');
                    });
                }
            }
        }, 'json');
    }

    function initializeTables() {
        var postdata = {};

        // add search data into postdata
        for (var i = 0; i < searchKeyArray.length; i++)
            postdata[searchKeyArray[i]] = $('#'+searchKeyArray[i]).val();

            $('#sample_1').dataTable(
                {
                    "processing": true,
                    "serverSide": true,
                    "bDestroy": true,
                    "ajax": {
                        'url': "/user/server_processing",
                        'data': postdata
                    }
                }
            );

            // var filterObj = document.getElementById('dataTables-example' + (i + 1) + '_filter');
            // if (filterObj)
            //     filterObj.children[0].hidden = true;

    }

    function initializeDates() {
        for (var i = 0; i < 11; i++)
        {
            $('#startdate' + (i + 1)).datepicker({
                format: "yyyy-mm-dd",
                language: "zh-CN",
                autoclose: true,
                clearBtn : true,
                todayHighlight: true,
                todayBtn: 'linked'
            });

            $('#enddate' + (i + 1)).datepicker({
                format: "yyyy-mm-dd",
                language: "zh-CN",
                autoclose: true,
                clearBtn : true,
                todayHighlight: true,
                todayBtn: 'linked'
            });
        }
    }

    function disableBar(id) {
        var url = "/user/disableUser";
        var postdata = {};
        postdata['barId'] = id;

        sendAjax(url, postdata, function(data){
            if(data) {
                if (data === '0' || data === 0)
                {
                    alert(g_operateFail)
                }
                else if (data === '1' || data === 1)
                {
                    bootbox.alert(g_operateSuccess, function () {
                        pageMove('/user/index');
                    });
                }
            }
        }, 'json');
    }

</script>