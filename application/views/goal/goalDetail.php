
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div>
            <h3 class="page-title"> Goal> Goal info</h3>
<!--            <div style="width: 100%;"></div>-->
            <button class="btn blue btn-outline" style="display: block; position: absolute; top: 90px; right: 30px;" onclick="pageMove('/goal/index')">
                <img class="" src="<?SERVER_ADDRESS?>/include/img/back_image.png" style="margin-right: 5px; width: 18px;"> Back
            </button>
        </div>
        <hr>
        <div class="info-top-pack">
            <div class="top-pack-left">
                <div class="pack-title">
                    <h4>Goal info</h4>
                </div>
                <hr>
                <div class="info-container">
                    <div class="info-left">
                        <?if ($goalInfo['photo_url']) {?>
                            <img src="<?=$goalInfo['photo_url']?>" class="img-responsive" alt="">
                        <?}
                        else{?>
                            <img src="<?SERVER_ADDRESS ?>/upload/goal/default.jpeg" class="img-responsive" alt="">
                        <?}?>

                    </div>
                    <div class="pack-middle">
                        <div>
                            <label class="info-title">Goal name</label>
                            <span class="info-content"><?=$goalInfo['goal_name']?></span>
                        </div>
                        <div>
                            <label class="info-title">Goal amount</label>
                            <span class="info-content"><?=$goalInfo['goal_amount']?> GBP</span>
                        </div>
                        <div>
                            <label class="info-title">Current amount</label>
                            <?if ($goalInfo['current_amount']) {?>
                                <span class="info-content"><?=$goalInfo['current_amount']?> GBP</span>
                            <?}
                            else{?> <span class="info-content">0 GBP</span><?
                            }?>
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
                        <img src="<?=$goalInfo['group_photo']?>" class="img-responsive" alt="">
                    </div>
                    <div class="pack-middle">
                        <div>
                            <label class="info-title">Group name</label>
                            <span class="info-content"><?=$goalInfo['group_name']?></span>
                        </div>
                        <div style="margin-top: 20px;">
                            <label class="info-title">Super Admin name</label>
                            <span class="info-content"><?=$goalInfo['super_name']?></span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <hr>
        <?foreach ($goalList as $key => $value){?>
            <div class="info-container">
                <div class="info-number">
                    <span><?=$key + 1?></span>
                </div>
                <div class="info-left">
                    <?if ($value['photo_url']) {?>
                        <img src="<?=$value['photo_url']?>" class="img-responsive" alt="">
                    <?}
                    else{?>
                        <img src="<?SERVER_ADDRESS ?>/upload/group/default.jpeg" class="img-responsive" alt=""> <?
                    }?>

                </div>
                <div class="info-middle">
                    <div>
                        <label class="info-title">User name</label>
                        <span class="info-content"><?=$value['name']?></span>
                    </div>
                    <div>
                        <label class="info-title">Date of birth</label>
                        <span class="info-content"><?=$value['birthday']?></span>
                    </div>
                    <div>
                        <label class="info-title">Saving amount</label>
                        <span class="info-content"><?=$value['total_save_amount']?></span>
                    </div>
                </div>

                <div class="info-right">
                    <div>
                        <label class="info-title">Email</label>
                        <span class="info-content"><?=$value['email']?></span>
                    </div>
                    <div>
                        <label class="info-title">Phone number</label>
                        <span class="info-content"><?=$value['phone_number']?></span>
                    </div>
                    <div>
                        <label class="info-title">Nation</label>
                        <span class="info-content"><?=$value['nation_name']?></span>
                    </div>
                </div>
            </div>
        <? } ?>
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