
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div>
            <h3 class="page-title"> Users> Personal info</h3>
<!--            <div style="width: 100%;"></div>-->
            <button class="btn blue btn-outline" style="display: block; position: absolute; top: 90px; right: 30px;" onclick="pageMove('/user/index')">
                <img class="" src="<?SERVER_ADDRESS?>/include/img/back_image.png" style="margin-right: 5px; width: 18px;"> Back
            </button>
        </div>
        <hr>
        <div class="info-container">
            <div class="info-left">
<!--                <img src="--><?//SERVER_ADDRESS ?><!--/include/assets/pages/media/profile/profile_user.jpg" class="img-responsive" alt="">-->
                <img src="<?=$userData['photo_url']?>" class="img-responsive" alt="">
            </div>
            <div class="info-middle">
                <div>
                    <label class="info-title">User name</label>
                    <span class="info-content"><?=$userData['name']?></span>
                </div>
                <div>
                    <label class="info-title">Date of birth</label>
                    <span class="info-content"><?=$userData['birthday']?></span>
                </div>
                <div>
                    <label class="info-title">Pay account</label>
                    <span class="info-content"><?=$userData['paypal_email']?></span>
                </div>
                <div>
                    <label class="info-title">Register date</label>
                    <span class="info-content"><?=$userData['register_datetime']?></span>
                </div>
            </div>

            <div class="info-right">
                <div>
                    <label class="info-title">Email</label>
                    <span class="info-content"><?=$userData['email']?></span>
                </div>
                <div>
                    <label class="info-title">Phone number</label>
                    <span class="info-content"><?=$userData['phone_number']?></span>
                </div>
                <div>
                    <label class="info-title">Nation</label>
                    <span class="info-content"><?=$userData['nation_name']?></span>
                </div>
                <div>
                    <label class="info-title">Total donation amount</label>
                    <span class="info-content"><?=$userDonation['donation_amount']?></span>
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