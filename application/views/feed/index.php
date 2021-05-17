
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">

        <h3 class="page-title"> Feeds
        </h3>

        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase"> This part will be implemented in the second version</span>
                        </div>
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