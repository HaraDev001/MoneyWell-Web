<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">

        <h3 class="page-title"> Settings Edit account
        </h3>

        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase"> Managed Setting Table</span>
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
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                        <span></span>
                                    </label>
                                </th>
                                <th> Name </th>
                                <th> Super admin name </th>
                                <th> Member count </th>
                                <th> Contribution </th>
                                <th> Goal count </th>
                                <th> Actions </th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr class="odd gradeX">
                                <td>
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="checkboxes" value="1" />
                                        <span></span>
                                    </label>
                                </td>
                                <td>
                                    Group 01
                                </td>
                                <td>
                                    John Terry
                                </td>
                                <td>
                                    10
                                </td>
                                <td>
                                    On
                                </td>
                                <td class="center"> 5 </td>
                                <td>
                                    <button class="btn btn-outline btn-circle btn-sm blue"><i class="fa fa-archive"></i> Status</button>
                                    <button class="btn btn-outline btn-circle btn-sm purple" onclick="pageMove('setting/editDetail')"><i class="fa fa-edit"></i> Detail</button>
                                    <button class="btn btn-outline btn-circle dark btn-sm black"><i class="fa fa-trash-o"></i> Delete</button>
                                </td>
                            </tr>

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