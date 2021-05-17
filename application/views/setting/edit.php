<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">

        <h3 class="page-title"> Settings> Edit Account
        </h3>
        <hr>

        <div class="row" style="display: block">
<!--            <div class="col-md-12">-->
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
<!--                <div class="portlet light bordered">-->
<!---->
<!--                </div>-->
<!--                <div class="portlet-title">-->
<!--                    <div class="caption font-dark">-->
<!--                        <i class="icon-settings font-dark"></i>-->
<!--                        <span class="caption-subject bold uppercase"> Managed Setting Table</span>-->
<!--                    </div>-->
<!---->
<!--                </div>-->



                <!-- END EXAMPLE TABLE PORTLET-->
<!--            </div>-->

            <div class="edit-margin" style="width: 20%">

            </div>
            <div class="edit-content">
                <div class="col-md-6 col-md-offset-3">
                    <div class="tab-content">
                        <div id="tab_1-1" class="tab-pane active">
                            <form role="form" action="#">
                                <div class="profile-userpic form-group" >
                                    <label class="control-label">Admin photo</label>
                                    <img src="<?=$adminDetail['photo_url']?>" class="img-responsive" alt="" style="width: 100px ;position: relative; margin: auto;"> </div>
                                <div class="form-group">
                                    <label class="control-label">Admin name</label>
                                    <input type="text" placeholder="<?=$adminDetail['name']?>" class="form-control" /> </div>
                                <div class="form-group">
                                    <label class="control-label">Email</label>
                                    <input type="text" placeholder="<?=$adminDetail['email']?>@mail.com" class="form-control" /> </div>
                                <div class="form-group">
                                    <label class="control-label">Phone Number</label>
                                    <input type="text" placeholder="<?=$adminDetail['phone_number']?>" class="form-control" /> </div>
                                <div class="form-group">
                                    <label class="control-label">Role</label>
                                    <input type="text" placeholder="Admin" class="form-control" /> </div>
                                <div class="form-group">
                                    <label class="control-label">Date of birth</label>
                                    <input type="text" placeholder="<?=$adminDetail['birthday']?>" class="form-control" /> </div>
                                <div class="margiv-top-10">
                                    <a href="javascript:;" class="btn green mt-ladda-btn ladda-button btn-circle btn-outline" style="width: 80px;">Save</a>
<!--                                    <a href="javascript:;" class="btn green-haze btn-outline sbold uppercase" style="border-radius: 10px !important;">Save</a>-->
<!--                                    <a href="javascript:;" class="btn btn-default" style="border-radius: 10px !important;"> Cancel </a>-->
                                    <a href="javascript:;" class="btn btn-default mt-ladda-btn ladda-button btn-outline btn-circle" style="width: 80px;"> Cancel </a>
                                </div>
                            </form>
                        </div>
                        <div id="tab_2-2" class="tab-pane">
                            <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                            </p>
                            <form action="#" role="form">
                                <div class="form-group">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                        <div>
                                                                    <span class="btn default btn-file">
                                                                        <span class="fileinput-new"> Select image </span>
                                                                        <span class="fileinput-exists"> Change </span>
                                                                        <input type="file" name="..."> </span>
                                            <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                        </div>
                                    </div>
                                    <div class="clearfix margin-top-10">
                                        <span class="label label-danger"> NOTE! </span>
                                        <span> Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                                    </div>
                                </div>
                                <div class="margin-top-10">
                                    <a href="javascript:;" class="btn green"> Submit </a>
                                    <a href="javascript:;" class="btn default"> Cancel </a>
                                </div>
                            </form>
                        </div>
                        <div id="tab_3-3" class="tab-pane">
                            <form action="#">
                                <div class="form-group">
                                    <label class="control-label">Current Password</label>
                                    <input type="password" class="form-control" /> </div>
                                <div class="form-group">
                                    <label class="control-label">New Password</label>
                                    <input type="password" class="form-control" /> </div>
                                <div class="form-group">
                                    <label class="control-label">Re-type New Password</label>
                                    <input type="password" class="form-control" /> </div>
                                <div class="margin-top-10">
                                    <a href="javascript:;" class="btn green"> Change Password </a>
                                    <a href="javascript:;" class="btn default"> Cancel </a>
                                </div>
                            </form>
                        </div>
                        <div id="tab_4-4" class="tab-pane">
                            <form action="#">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <td> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus.. </td>
                                        <td>
                                            <div class="mt-radio-inline">
                                                <label class="mt-radio">
                                                    <input type="radio" name="optionsRadios1" value="option1" /> Yes
                                                    <span></span>
                                                </label>
                                                <label class="mt-radio">
                                                    <input type="radio" name="optionsRadios1" value="option2" checked/> No
                                                    <span></span>
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                        <td>
                                            <div class="mt-radio-inline">
                                                <label class="mt-radio">
                                                    <input type="radio" name="optionsRadios21" value="option1" /> Yes
                                                    <span></span>
                                                </label>
                                                <label class="mt-radio">
                                                    <input type="radio" name="optionsRadios21" value="option2" checked/> No
                                                    <span></span>
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                        <td>
                                            <div class="mt-radio-inline">
                                                <label class="mt-radio">
                                                    <input type="radio" name="optionsRadios31" value="option1" /> Yes
                                                    <span></span>
                                                </label>
                                                <label class="mt-radio">
                                                    <input type="radio" name="optionsRadios31" value="option2" checked/> No
                                                    <span></span>
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                        <td>
                                            <div class="mt-radio-inline">
                                                <label class="mt-radio">
                                                    <input type="radio" name="optionsRadios41" value="option1" /> Yes
                                                    <span></span>
                                                </label>
                                                <label class="mt-radio">
                                                    <input type="radio" name="optionsRadios41" value="option2" checked/> No
                                                    <span></span>
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <!--end profile-settings-->
                                <div class="margin-top-10">
                                    <a href="javascript:;" class="btn green"> Save Changes </a>
                                    <a href="javascript:;" class="btn default"> Cancel </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="edit-margin" style="width: 20%;">

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