
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">

        <h3 class="page-title"> Goals
        </h3>

        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase"> Managed Goal Table</span>
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
                                <th>
                                     No
                                </th>
                                <th> Goal name </th>
                                <th> Group name </th>
                                <th> Goal Amount </th>
                                <th> Current amount </th>
                                <th> Actions </th>
                            </tr>
                            </thead>

                            <tbody>
                            <?foreach ($savingList as $key => $value){?>
                            <tr class="odd gradeX">
                                <td><?=$key + 1?></td>
                                <td><?=$value['goal_name'] ?></td>
                                <td><?=$value['goal_name']?></td>
                                <td><?=$value['goal_amount']?></td>
                                <?if ($value['current_amount']) {?>
                                    <td><?=$value['current_amount']?> GBP</td>
                                <?}
                                else{?><td>0 GBP</td> <?
                                }?>
                                <td>
                                    <button class="btn btn-outline btn-circle btn-sm blue"><i class="fa fa-archive"></i> Edit</button>
                                    <button class="btn btn-outline btn-circle btn-sm purple" onclick="pageMove('/goal/goalDetail?goalId=<?=$value['id']?>')"><i class="fa fa-edit"></i> Detail</button>
                                    <button class="btn btn-outline btn-circle dark btn-sm black"><i class="fa fa-trash-o"></i> Delete</button>
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