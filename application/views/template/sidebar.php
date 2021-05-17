<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item start <? if ($this->router->fetch_class() == 'Dashboard') { ?>active<? } ?>" style="margin-top: 14px;">
                <a href="/dashboard/index" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
<!--                    <span class="arrow open"></span>-->
                </a>
            </li>

            <li class="nav-item <? if ($this->router->fetch_class() == 'User') { ?>active<? } ?>">
                <a href="/user/index" class="nav-link nav-toggle">
                    <i class="icon-user"></i>
                    <span class="title">Users</span>
                    <span class="selected"></span>
                    <!--                    <span class="arrow open"></span>-->
                </a>
            </li>

            <li class="nav-item <? if ($this->router->fetch_class() == 'Group') { ?>active<? } ?>">
                <a href="/group/index" class="nav-link nav-toggle">
                    <i class="icon-users"></i>
                    <span class="title">Groups</span>
                    <span class="selected"></span>
                    <!--                    <span class="arrow open"></span>-->
                </a>
            </li>

            <li class="nav-item <? if ($this->router->fetch_class() == 'Goal') { ?>active<? } ?>">
                <a href="/goal/index" class="nav-link nav-toggle">
                    <i class="icon-bulb"></i>
                    <span class="title">Goals</span>
                    <span class="selected"></span>
                    <!--                    <span class="arrow open"></span>-->
                </a>
            </li>

            <li class="nav-item <? if ($this->router->fetch_class() == 'History') { ?>active open<? } ?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-speedometer"></i>
                    <span class="title">Histories</span>
                    <span class="selected"></span>
                    <span <? if ($this->router->fetch_class() == 'History') { ?>class="arrow open"<? } else { ?>class="arrow"<? } ?>></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <? if ($this->router->fetch_class() == 'History' && $this->router->fetch_method() == 'contribution') { ?>active open<? } ?>">
                        <a href="/history/contribution" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Contributions</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item <? if ($this->router->fetch_class() == 'History' && $this->router->fetch_method() == 'saving') { ?>active open<? } ?>">
                        <a href="/history/saving" class="nav-link ">
                            <i class="icon-wallet"></i>
                            <span class="title">Savings</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item <? if ($this->router->fetch_class() == 'History' && $this->router->fetch_method() == 'private') { ?>active open<? } ?>">
                        <a href="/history/privatesent" class="nav-link ">
                            <i class="icon-graph"></i>
                            <span class="title">Private Sents</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item <? if ($this->router->fetch_class() == 'History' && $this->router->fetch_method() == 'donation') { ?>active open<? } ?>">
                        <a href="/history/donation" class="nav-link ">
                            <i class="icon-support"></i>
                            <span class="title">Donations</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item <? if ($this->router->fetch_class() == 'Feed') { ?>active<? } ?>">
                <a href="/feed/index" class="nav-link nav-toggle">
                    <i class="icon-picture"></i>
                    <span class="title">News Feeds</span>
                    <span class="selected"></span>
                    <!--                    <span class="arrow open"></span>-->
                </a>
            </li>

            <li class="nav-item <? if ($this->router->fetch_class() == 'Notification') { ?>active open<? } ?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-speech"></i>
                    <span class="title">Notifications</span>
                    <span class="selected"></span>
                    <span <? if ($this->router->fetch_class() == 'Notification') { ?>class="arrow open"<? } else { ?>class="arrow"<? } ?>></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <? if ($this->router->fetch_class() == 'Notification' && $this->router->fetch_method() == 'push') { ?>active open<? } ?>">
                        <a href="/notification/push" class="nav-link ">
                            <i class="icon-fire"></i>
                            <span class="title">Push</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item <? if ($this->router->fetch_class() == 'Notification' && $this->router->fetch_method() == 'user') { ?>active open<? } ?>">
                        <a href="/notification/user" class="nav-link ">
                            <i class="icon-user"></i>
                            <span class="title">Users</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item <? if ($this->router->fetch_class() == 'Notification' && $this->router->fetch_method() == 'group') { ?>active open<? } ?>">
                        <a href="/notification/group" class="nav-link ">
                            <i class="icon-users"></i>
                            <span class="title">Groups</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item <? if ($this->router->fetch_class() == 'Notification' && $this->router->fetch_method() == 'contribution') { ?>active open<? } ?>">
                        <a href="/notification/contribution" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Contributions</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item <? if ($this->router->fetch_class() == 'Notification' && $this->router->fetch_method() == 'goal') { ?>active open<? } ?>">
                        <a href="/notification/goal" class="nav-link ">
                            <i class="icon-bulb"></i>
                            <span class="title">Goals</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item <? if ($this->router->fetch_class() == 'Notification' && $this->router->fetch_method() == 'privatesent') { ?>active open<? } ?>">
                        <a href="/notification/privatesent" class="nav-link ">
                            <i class="icon-graph"></i>
                            <span class="title">Privates</span>
                            <span class="selected"></span>
                        </a>
                    </li>

                    <li class="nav-item <? if ($this->router->fetch_class() == 'Notification' && $this->router->fetch_method() == 'donation') { ?>active open<? } ?>">
                        <a href="/notification/donation" class="nav-link ">
                            <i class="icon-support"></i>
                            <span class="title">Donations</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item <? if ($this->router->fetch_class() == 'Advertisement') { ?>active<? } ?>">
                <a href="/advertisement/index" class="nav-link nav-toggle">
                    <i class="icon-badge"></i>
                    <span class="title">Advertisements</span>
                    <span class="selected"></span>
                    <!--                    <span class="arrow open"></span>-->
                </a>
            </li>

            <li class="nav-item <? if ($this->router->fetch_class() == 'Admin') { ?>active<? } ?>">
                <a href="/admin/index" class="nav-link nav-toggle">
                    <i class="fa fa-user-md"></i>
                    <span class="title">Admins</span>
                    <span class="selected"></span>
                    <!--                    <span class="arrow open"></span>-->
                </a>
            </li>

            <li class="nav-item <? if ($this->router->fetch_class() == 'Setting') { ?>active open<? } ?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">Settings</span>
                    <span class="selected"></span>
                    <span <?if ($this->router->fetch_class() == "Setting") {?> class="arrow open"<? } else {?>class = "arrow"<?} ?>></span>
                    <!--                    <span class="arrow open"></span>-->
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <? if ($this->router->fetch_class() == 'Setting' && $this->router->fetch_method() == 'edit') { ?>active open<? } ?>">
                        <a href="/setting/edit" class="nav-link ">
                            <i class="icon-pencil"></i>
                            <span class="title">Edit Account</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item <? if ($this->router->fetch_class() == 'Setting' && $this->router->fetch_method() == 'donation') { ?>active open<? } ?>">
                        <a href="/setting/donation" class="nav-link ">
                            <i class="icon-support"></i>
                            <span class="title">Donation List</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item <? if ($this->router->fetch_class() == 'Setting' && $this->router->fetch_method() == 'help') { ?>active open<? } ?>">
                        <a href="/setting/help" class="nav-link ">
                            <i class="icon-info"></i>
                            <span class="title">Help Content</span>
                            <span class="selected"></span>
                        </a>
                    </li>

                </ul>
            </li>

        </ul>
    </div>
</div>
