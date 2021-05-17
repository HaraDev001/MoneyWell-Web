
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div>
            <h3 class="page-title"> History> Private Sents> Detail</h3>
            <!--            <div style="width: 100%;"></div>-->
            <button class="btn blue btn-outline" style="display: block; position: absolute; top: 90px; right: 30px;" onclick="pageMove('/history/privatesent')">
                <img class="" src="<?SERVER_ADDRESS?>/include/img/back_image.png" style="margin-right: 5px; width: 18px;"> Back
            </button>
        </div>
        <hr>
        <div class="info-top-pack">
            <div class="top-pack-left">
                <div class="pack-title">
                    <h4>Sent member info</h4>
                </div>
                <hr>
                <div class="info-container">
                    <div class="info-left">
                        <img src="<?=$privateDetail['sender_photo']?>" class="img-responsive" alt="">
                    </div>
                    <div class="pack-middle">
                        <div>
                            <label class="info-title">User name</label>
                            <span class="info-content"><?=$privateDetail['sender_name']?></span>
                        </div>
                        <div>
                            <label class="info-title">Email</label>
                            <span class="info-content"><?=$privateDetail['sender_email']?></span>
                        </div>
                        <div>
                            <label class="info-title">Phone number</label>
                            <span class="info-content"><?=$privateDetail['sender_phone_number']?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="top-pack-right">
                <div class="pack-title">
                    <h4>Received member info</h4>
                </div>
                <hr>
                <div class="info-container">
                    <div class="info-left">
                        <img src="<?=$privateDetail['receiver_photo']?>" class="img-responsive" alt="">
                    </div>
                    <div class="pack-middle">
                        <div>
                            <label class="info-title">User name</label>
                            <span class="info-content"><?=$privateDetail['receiver_name']?></span>
                        </div>
                        <div>
                            <label class="info-title">Email</label>
                            <span class="info-content"><?=$privateDetail['receiver_email']?></span>
                        </div>
                        <div>
                            <label class="info-title">Phone number</label>
                            <span class="info-content"><?=$privateDetail['receiver_phone_number']?></span>
                        </div>
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