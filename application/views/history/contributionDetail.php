
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div>
            <h3 class="page-title"> History> Contributions> Detail</h3>
<!--            <div style="width: 100%;"></div>-->
            <button class="btn blue btn-outline" style="display: block; position: absolute; top: 90px; right: 30px;" onclick="pageMove('/history/contribution')">
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
                        <img src="<?=$contributionDetail['sender_photo_url']?>" class="img-responsive" alt="">
                    </div>
                    <div class="pack-middle">
                        <div>
                            <label class="info-title">User name</label>
                            <span class="info-content"><?=$contributionDetail['sender_name']?></span>
                        </div>
                        <div>
                            <label class="info-title">Email</label>
                            <span class="info-content"><?=$contributionDetail['sender_email']?></span>
                        </div>
                        <div>
                            <label class="info-title">Phone number</label>
                            <span class="info-content"><?=$contributionDetail['sender_phone_number']?></span>
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
                        <img src="<?=$contributionDetail['receiver_photo_url']?>" class="img-responsive" alt="">
                    </div>
                    <div class="pack-middle">
                        <div>
                            <label class="info-title">User name</label>
                            <span class="info-content"><?=$contributionDetail['receiver_name']?></span>
                        </div>
                        <div>
                            <label class="info-title">Email</label>
                            <span class="info-content"><?=$contributionDetail['receiver_email']?></span>
                        </div>
                        <div>
                            <label class="info-title">Phone number</label>
                            <span class="info-content"><?=$contributionDetail['receiver_phone_number']?></span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="info-top-pack" style="margin-top: 30px;">
            <div class="top-pack-left">
                <div class="pack-title">
                    <h4>Group info</h4>
                </div>
                <hr>
                <div class="info-container">
                    <div class="info-left">
                        <img src="<?=$contributionDetail['group_photo']?>" class="img-responsive" alt="">
                    </div>
                    <div class="pack-middle">
                        <div>
                            <label class="info-title">Group name</label>
                            <span class="info-content"><?=$contributionDetail['group_name']?></span>
                        </div>
                        <div style="margin-top: 15px;">
                            <label class="info-title">Super admin name</label>
                            <span class="info-content"><?=$contributionDetail['admin_name']?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="top-pack-right">
                <div class="pack-title">
                    <h4>Contribution info</h4>
                </div>
                <hr>
                <div class="info-container">
                    <div class="info-left">
                        <img src="<?=$contributionDetail['contribution_image_url']?>" class="img-responsive" alt="">
                    </div>
                    <div class="pack-middle">
                        <div>
                            <label class="info-title">Amount</label>
                            <span class="info-content"><?=$contributionDetail['amount']?></span>
                        </div>
                        <div style="margin-top: 15px;">
                            <label class="info-title">Sent date</label>
                            <span class="info-content"><?=$contributionDetail['applied_datetime']?></span>
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