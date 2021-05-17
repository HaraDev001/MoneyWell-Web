
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div>
            <h3 class="page-title"> History> Donations> Detail</h3>
            <!--            <div style="width: 100%;"></div>-->
            <button class="btn blue btn-outline" style="display: block; position: absolute; top: 90px; right: 30px;" onclick="pageMove('/history/donation')">
                <img class="" src="<?SERVER_ADDRESS?>/include/img/back_image.png" style="margin-right: 5px; width: 18px;"> Back
            </button>
        </div>
        <hr>
        <div class="info-top-pack">
            <div class="top-pack-left">
                <div class="pack-title">
                    <h4>Personal info</h4>
                </div>
                <hr>
                <div class="info-container">
                    <div class="info-left">
                        <img src="<?=$donationDetail['user_photo']?>" class="img-responsive" alt="">
                    </div>
                    <div class="pack-middle">
                        <div>
                            <label class="info-title">User name</label>
                            <span class="info-content"><?=$donationDetail['user_name']?></span>
                        </div>
                        <div>
                            <label class="info-title">Email</label>
                            <span class="info-content"><?=$donationDetail['user_email']?></span>
                        </div>
                        <div>
                            <label class="info-title">Total donation amount</label>
                            <span class="info-content"><?=$donationDetail['total_amount']?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="top-pack-right">
                <div class="pack-title">
                    <h4>Donation info</h4>
                </div>
                <hr>
                <div class="info-container">
                    <div class="info-left">
                        <img src="<?=$donationDetail['donation_photo']?>" class="img-responsive" alt="">
                    </div>
                    <div class="pack-middle">
                        <div>
                            <label class="info-title">Donation name</label>
                            <span class="info-content"><?=$donationDetail['donation_name']?></span>
                        </div>
                        <div>
                            <label class="info-title">Amount</label>
                            <span class="info-content"><?=$donationDetail['amount']?></span>
                        </div>
                        <div>
                            <label class="info-title">Donated date</label>
                            <span class="info-content"><?=$donationDetail['sent_date']?></span>
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