
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div>
            <h3 class="page-title"> History> Savings> Detail</h3>
<!--            <div style="width: 100%;"></div>-->
            <button class="btn blue btn-outline" style="display: block; position: absolute; top: 90px; right: 30px;" onclick="pageMove('/history/saving')">
                <img class="" src="<?SERVER_ADDRESS?>/include/img/back_image.png" style="margin-right: 5px; width: 18px;"> Back
            </button>
        </div>
        <hr>
        <div class="info-top-pack">
            <div class="top-pack-left">
                <div class="pack-title">
                    <h4>Member info</h4>
                </div>
                <hr>
                <div class="info-container">
                    <div class="info-left">
                        <img src="<?=$savingDetail['user_photo']?>" class="img-responsive" alt="">
                    </div>
                    <div class="pack-middle">
                        <div>
                            <label class="info-title">User name</label>
                            <span class="info-content"><?=$savingDetail['user_name']?></span>
                        </div>
                        <div>
                            <label class="info-title">Email</label>
                            <span class="info-content"><?=$savingDetail['user_email']?></span>
                        </div>
                        <div>
                            <label class="info-title">Phone number</label>
                            <span class="info-content"><?=$savingDetail['phone_number']?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="top-pack-right">
                <div class="pack-title">
                    <h4>Saving info</h4>
                </div>
                <hr>
                <div class="info-container">
                    <div class="info-left">
                        <img src="<?SERVER_ADDRESS ?>/upload/goal/saving.jpeg" class="img-responsive" alt="">
                    </div>
                    <div class="pack-middle">
                        <div>
                            <label class="info-title">Amount</label>
                            <span class="info-content"><?=$savingDetail['save_amount']?></span>
                        </div>
                        <div style="margin-top: 15px;">
                            <label class="info-title">Saved date</label>
                            <span class="info-content"><?=$savingDetail['saved_datetime']?></span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="info-top-pack" style="margin-top: 30px;">
            <div class="top-pack-left">
                <div class="pack-title">
                    <h4>Goal info</h4>
                </div>
                <hr>
                <div class="info-container">
                    <div class="info-left">
                        <img src="<?=$savingDetail['goal_photo']?>" class="img-responsive" alt="">
                    </div>
                    <div class="pack-middle">
                        <div>
                            <label class="info-title">Goal name</label>
                            <span class="info-content"><?=$savingDetail['goal_name']?></span>
                        </div>
                        <div>
                            <label class="info-title">Goal amount</label>
                            <span class="info-content"><?=$savingDetail['goal_amount']?> GBP</span>
                        </div>
                        <div>
                            <label class="info-title">Current amount</label>
                            <span class="info-content"><?=$savingDetail['current_amount']?> GBP</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="top-pack-right">
                <div class="pack-title">
                    <h4>Group info</h4>
                </div>
                <hr>
                <div class="info-container">
                    <div class="info-left">
                        <img src="<?=$savingDetail['group_photo']?>" class="img-responsive" alt="">
                    </div>
                    <div class="pack-middle">
                        <div>
                            <label class="info-title">Group name</label>
                            <span class="info-content"><?=$savingDetail['group_name']?></span>
                        </div>
                        <div style="margin-top: 15px;">
                            <label class="info-title">Super admin name</label>
                            <span class="info-content"><?=$savingDetail['admin_name']?></span>
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