
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div>
            <h3 class="page-title"> Notifications> Privates> Detail</h3>
<!--            <div style="width: 100%;"></div>-->
            <button class="btn blue btn-outline" style="display: block; position: absolute; top: 90px; right: 30px;" onclick="pageMove('/notification/privatesent')">
                <img class="" src="<?SERVER_ADDRESS?>/include/img/back_image.png" style="margin-right: 5px; width: 18px;"> Back
            </button>
        </div>
        <hr>
        <div class="info-container">
            <div class="pack-title">
                <h4>Notification info</h4>
            </div>
            <hr>
            <div>
                <label class="info-notification-title">Title</label>
                <span class="" style=""><?=$privateNotificationDetail['title']?></span>
            </div>

            <div class="notification-area">
                <div class="info-left info-notification-title">
                    <label class="info-title">Content</label>
                </div>

                <div class="notification-box">
                    <label class=""><?=$privateNotificationDetail['title']?></label>
                    <div class="">
                        <?if ($privateNotificationDetail['image_url']) {?>
                            <img src="<?=$privateNotificationDetail['image_url']?>" class="img-responsive" alt="">
                        <?}
                        else{?>
                            <img src="<?SERVER_ADDRESS ?>/upload/notification/user/private.png" class="img-responsive" alt=""><?
                        }?>
                    </div>
                    <div class="notification-tip">
                        <span><?=$privateNotificationDetail['content']?></span>
                    </div>
                </div>
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
    // $(document).ready(function () {
    //     $('#dataTables-example').dataTable();
    // });
    //
    // function disableUser(id) {
    //     var url = "/user/disableUser";
    //     var postdata = {};
    //     postdata['userId'] = id;
    //
    //     sendAjax(url, postdata, function(data){
    //         if(data) {
    //             if (data === '0' || data === 0)
    //             {
    //                 alert(g_operateFail)
    //             }
    //             else if (data === '1' || data === 1)
    //             {
    //                 bootbox.alert(g_operateSuccess, function () {
    //                     pageMove('/user/index');
    //                 });
    //             }
    //         }
    //     }, 'json');
    // }
    //
    // function restoreUser(id) {
    //     var url = "/user/restoreUser";
    //     var postdata = {};
    //     postdata['userId'] = id;
    //
    //     sendAjax(url, postdata, function(data){
    //         if(data) {
    //             if (data === '0' || data === 0)
    //             {
    //                 alert(g_operateFail)
    //             }
    //             else if (data === '1' || data === 1)
    //             {
    //                 bootbox.alert(g_operateSuccess, function () {
    //                     pageMove('/user/index');
    //                 });
    //             }
    //         }
    //     }, 'json');
    // }
</script>