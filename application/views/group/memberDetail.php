
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div>
            <h3 class="page-title"> Groups> Group info</h3>
<!--            <div style="width: 100%;"></div>-->
            <button class="btn blue btn-outline" style="display: block; position: absolute; top: 90px; right: 30px;" onclick="pageMove('/group/index')">
                <img class="" src="<?SERVER_ADDRESS?>/include/img/back_image.png" style="margin-right: 5px; width: 18px;"> Back
            </button>
        </div>
        <hr>
        <div class="info-container">
            <div class="info-left">
                <img src="<?=$groupInfo['photo_url']?>" class="img-responsive" alt="">
            </div>
            <div class="info-middle">
                <div>
                    <label class="info-title">Group name</label>
                    <span class="info-content"><?=$groupInfo['name']?></span>
                </div>
                <div>
                    <label class="info-title">Super Admin name</label>
                    <span class="info-content"><?=$groupInfo['admin_name']?></span>
                </div>
                <div>
                    <label class="info-title">Register date</label>
                    <span class="info-content"><?=$groupInfo['register_datetime']?></span>
                </div>
            </div>
        </div>
        <hr>
        <div class="profile">
            <div class="tabbable-line tabbable-full-width">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab_1_1" data-toggle="tab"> Members </a>
                    </li>
                    <li>
                        <a href="#tab_1_3" data-toggle="tab"> Contributions </a>
                    </li>
                    <li>
                        <a href="#tab_1_6" data-toggle="tab"> Savings </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1_1">
                        <div>
                            <label style="margin-left: 20px;">Total member count: </label>
                            <span><?=$groupInfo['member_count']?></span>
                        </div>

                        <?foreach ($groupMemberList as $key => $value){?>
                            <div class="info-container">
                                <div class="info-number">
                                    <span><?=$key + 1?></span>
                                </div>
                                <div class="info-left">
                                    <img src="<?SERVER_ADDRESS?>/<?=$value['photo_url']?>" class="img-responsive" alt="">
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
                                        <label class="info-title">Role</label>
                                        <?if ($value['role'] = 1) {?>
                                            <span class="info-content">Admin</span>
                                        <?}
                                        else{?><span class="info-content">Member</span> <?
                                        }?>
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
                    <!--tab_1_2-->
                    <div class="tab-pane" id="tab_1_3">
                        <div class="info-container-primary">
                            <div class="info-middle">
                                <div>
                                    <label class="info-title">Next member</label>
                                    <span class="info-content"><?=$contributionInfo['receiver_name']?></span>
                                </div>
                                <div>
                                    <label class="info-title">Receive date</label>
                                    <span class="info-content"><?=$contributionInfo['receive_date']?></span>
                                </div>
                            </div>

                            <div class="info-right">
                                <div>
                                    <label class="info-title">Amount per once</label>
                                    <span class="info-content"><?=$contributionInfo['once_amount']?></span>
                                </div>
                                <div>
                                    <label class="info-title">Applied contribution</label>
                                    <span class="info-content"><?=$contributionInfo['applied_count']?></span>
                                </div>
                            </div>
                        </div>
                        <div class="info-container">
                            <div class="info-number">
                                <span>1</span>
                            </div>
                            <div class="info-left">
                                <img src="<?SERVER_ADDRESS ?>/include/assets/pages/media/profile/profile_user.jpg" class="img-responsive" alt="">
                            </div>
                            <div class="info-middle">
                                <div>
                                    <label class="info-title">User name</label>
                                    <span class="info-content">Terry</span>
                                </div>
                                <div>
                                    <label class="info-title">Received</label>
                                    <span class="info-content">Yes</span>
                                </div>
                                <div>
                                    <label class="info-title">Applied</label>
                                    <span class="info-content">Yes</span>
                                </div>
                            </div>

                            <div class="info-right">
                                <div>
                                    <label class="info-title">Received Date</label>
                                    <span class="info-content">10/22/2019</span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--end tab-pane-->
                    <div class="tab-pane" id="tab_1_6">
                        <div>
                            <label style="margin-left: 20px;">Total goal count: </label>
                            <span><?=$savingInfo?></span>
                        </div>

                        <?foreach ($savingList as $key => $value){?>
                            <div class="info-container">
                                <div class="info-number">
                                    <span>1</span>
                                </div>
                                <div class="info-left">
                                    <img src="<?SERVER_ADDRESS ?>/include/assets/pages/media/profile/profile_user.jpg" class="img-responsive" alt="">
                                </div>
                                <div class="info-middle">
                                    <div>
                                        <label class="info-title">Goal name</label>
                                        <span class="info-content"><?=$value['goal_name']?></span>
                                    </div>
                                    <div>
                                        <label class="info-title">Goal amount</label>
                                        <span class="info-content"><?=$value['goal_amount']?> GBP</span>
                                    </div>
                                    <div>
                                        <label class="info-title">Current amount</label>
                                        <?if ($value['current_amount']) {?>
                                            <span class="info-content"><?=$value['current_amount']?> GBP</span>
                                        <?}
                                        else{?> <span class="info-content">0 GBP</span><?
                                        }?>
                                    </div>
                                </div>

                                <div class="info-right">
                                    <div>
                                        <label class="info-title">Register date</label>
                                        <span class="info-content"><?=$value['update_datetime']?></span>
                                    </div>

                                </div>
                            </div>

                        <? } ?>
                    </div>
                    <!--end tab-pane-->
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