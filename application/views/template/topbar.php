<div class="page-header navbar">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
<!--            <img src="--><?//=ASSETS_DIR ?><!--/layouts/layout/img/logo_image.png" alt="logo" class="logo-default" style="width: 36px; margin: 5px;"/>-->
            <a href="/dashboard/index">
                <Label style="font-size: 18px; color: #fff; margin-top: 14px;">MONEYWELL</Label>
            </a>

            <!--            <div class="menu-toggler sidebar-toggler">-->
<!--                <span></span>-->
<!--            </div>-->
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
            <span></span>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img alt="" class="img-circle" src="<?=SERVER_ADDRESS ?>/upload/admin/admin1.jpeg" />
                        <span class="username username-hide-on-mobile" style="margin-left: 10px;">Admin</span>
<!--                        <span class="username username-hide-on-mobile"> --><?//=$this->session->adminAccount ?><!-- </span>-->
                        <i class="fa fa-angle-down" style="margin-left: 20px;"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="/setting/edit">
                                <i class="icon-pencil"></i> Edit account </a>
                        </li>
                        <li>
                            <a href="/login/signOut">
                                <i class="icon-key"></i> Sign Out </a>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->