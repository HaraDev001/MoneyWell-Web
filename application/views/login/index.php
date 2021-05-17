<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>Money Well</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
<!--    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />-->
    <link href="<?=ASSETS_DIR ?>/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=ASSETS_DIR ?>/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=ASSETS_DIR ?>/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=ASSETS_DIR ?>/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?=ASSETS_DIR ?>/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=ASSETS_DIR ?>/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="<?=ASSETS_DIR ?>/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="<?=ASSETS_DIR ?>/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="<?=ASSETS_DIR ?>/pages/css/login-2.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" />
    <!-- END PAGE LEVEL STYLES -->
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo" >
<!--    <a href="index.html">-->
        <img src="<?=SERVER_ADDRESS ?>/include/img/logo_image.png" style="height: 80px; margin-left: 70px;" alt="" /> </a>
        <Label style="font-size: 20px; color: #000; font-weight: 100; margin-left: 10px;">MONEYWELL</Label>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" action="" method="post" id="mainFrm">
        <div class="alert alert-danger display-hide" style="background-color: white; border-color: #c5bec5; border-radius: 5px !important;" id="error_div">
            <button class="close" data-close="alert"></button>
            <span id="error" style="color: #544c4c;"> Enter any username and password. </span>
        </div>
        <div class="form-title">
            <img src="<?=SERVER_ADDRESS ?>/include/img/key.png" style="height: 70px;" align="middle">
        </div>
        <div class="form-title">
            <span class="form-title">Sign in to MoneyWell backend</span>
<!--            <span class="form-subtitle">Sign in to MoneyWell Backend</span>-->
        </div>

        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Email</label>
            <label class="login-tip">Email</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="" name="username" id="userId" onkeypress="hideErrorNotice();" /> </div>
        <div class="form-group" style="margin-top: 25px;">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <label class="login-tip">Password</label>
            <label class="login-tip forgot" onclick="pageMove('/login/forgotPassword')">Forgot password?</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="" name="password" id="pwd" onkeypress="hideErrorNotice();" /> </div>
        <div class="form-actions">
            <button type="submit" class="btn green btn-block uppercase" onclick="tryLogin('userId', 'pwd', '/login/tryLogin'); return false;">SIGN IN</button>
        </div>
    </form>
</div>

<!-- PAGE LEVEL SCRIPTS -->
<script src="<?=ASSETS_DIR ?>/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?=ASSETS_DIR ?>/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=ASSETS_DIR ?>/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="<?=ASSETS_DIR ?>/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?=ASSETS_DIR ?>/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?=ASSETS_DIR ?>/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?=ASSETS_DIR ?>/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?=ASSETS_DIR ?>/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?=ASSETS_DIR ?>/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
<script src="<?=ASSETS_DIR ?>/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?=ASSETS_DIR ?>/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?=ASSETS_DIR ?>/pages/scripts/login.min.js" type="text/javascript"></script>

<script src="<?=JS_DIR ?>/common.js"></script>
<script src="<?=JS_DIR ?>/message.js"></script>
<script src="<?=JS_DIR?>/ajax.js"></script>
<script src="<?=JS_DIR?>/md5.js"></script>
<!--END PAGE LEVEL SCRIPTS -->
<script type="text/javascript">
    function tryLogin(userId, pwd, url)
    {
        if (!isEmptyErrorNotice(userId, g_emptyUserIdMsg) && !isEmptyErrorNotice(pwd, g_emptyPasswordMsg)) {
            if (!isIncludeSpaceCharacter(userId, g_notInputSpace) && !isIncludeSpaceCharacter(pwd, g_notInputSpace)) {
                var postdata = {};
                postdata['userId'] = document.getElementById(userId).value;
                // postdata['pwd'] = hex_md5(document.getElementById(pwd).value);
                postdata['pwd'] = document.getElementById(pwd).value;

                sendAjax(url, postdata, function (data) {
                    if (data != null) {
                        if (data == 0)
                        {
                            //showAlertDialog(g_notInputSpace);
                            document.getElementById('error_div').className = "alert alert-danger";
                            document.getElementById('error').innerHTML = g_notInputSpace;
                        }
                        if (data == 1)
                        {
                            document.getElementById('error_div').className = "alert alert-danger display-hide";
                            pageMove('/dashboard/index');
                        }
                        if (data == 2)
                        {
                            //showAlertDialog(g_loginErrorMsg);
                            document.getElementById('error_div').className = "alert alert-danger";
                            document.getElementById('error').innerHTML = g_loginErrorMsg;
                        }
                    }
                }, 'json');


                // if (document.getElementById(userId).value == "admin" && document.getElementById(pwd).value == "admin"){
                //     pageMove('/dashboard/index');
                // }
                // else{
                //
                // }
            }
        }
    }

    function hideErrorNotice()
    {
        document.getElementById('error_div').className = "alert alert-danger display-hide";
    }

    function pageMove(url) {
        var obj = document.getElementById('mainFrm');
        obj.action = url;
        obj.submit();
    }
</script>
</body>
<!-- END BODY -->
</html>
