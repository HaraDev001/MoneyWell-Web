<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">

        <h3 class="page-title"> Notifications> Goals
        </h3>

        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase"> Managed Notification Table</span>
                        </div>
                    </div>

                    <div class="portlet-body">

                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                            <thead>
                            <tr>
                                <th>
                                    No
                                </th>
                                <th> Sender name </th>
                                <th> Group name</th>
                                <th> Title </th>
                                <th> Registered date</th>
                                <th> Actions </th>
                            </tr>
                            </thead>

                            <tbody>
                            <?foreach ($notificationGoalList as $key => $value){?>
                            <tr class="odd gradeX">
                                <td><?=$key + 1?></td>
                                <?if ($value['sender_name']) {?>
                                    <td><?=$value['sender_name']?></td>
                                <?}
                                else{?><td>System</td> <?
                                }?>
                                <td><?=$value['group_name']?></td>
                                <td><?=$value['title']?></td>
                                <td><?=$value['send_date']?></td>
                                <td>
                                    <button class="btn btn-outline btn-circle btn-sm purple" onclick="pageMove('/notification/goalDetail?goalNotificationId=<?=$value['id']?>')"><i class="fa fa-edit"></i> Detail</button>
                                    <button class="btn btn-outline btn-circle dark btn-sm black"><i class="fa fa-trash-o"></i> Delete</button>
                                </td>
                                <? } ?>
<!--                            <tr class="odd gradeX">-->
<!--                                <td>-->
<!--                                    1-->
<!--                                </td>-->
<!--                                <td>Wein Rooney created new group goal UEFA Champion </td>-->
<!--                                <td>-->
<!--                                    10/15/2019-->
<!--                                </td>-->
<!--                                <td>-->
<!--                                    <button class="btn btn-outline btn-circle btn-sm purple" onclick="pageMove('/notification/goalDetail')"><i class="fa fa-edit"></i> Detail</button>-->
<!--                                    <button class="btn btn-outline btn-circle dark btn-sm black"><i class="fa fa-trash-o"></i> Delete</button>-->
<!--                                </td>-->
<!--                            </tr>-->

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
        $('#dataTables-example').dataTable();
    });

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
</script>