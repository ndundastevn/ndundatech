<div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="dashboard" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img" src="../public/images/merged_logos.png" srcset="../public/images/merged_logos.png 2x" alt="logo">
                <img class="logo-dark logo-img" src="../public/images/merged_logos.png" srcset="../public/images/merged_logos.png 2x" alt="logo-dark">
            </a>
        </div>
        <div class="nk-menu-trigger mr-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <?php if ($_SESSION['user_access_level'] == 'System Administrator') { ?>
                    <ul class="nk-menu">
                        <li class="nk-menu-item">
                            <a href="dashboard" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-grid-add-c"></em></span>
                                <span class="nk-menu-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="enquiries" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-question"></em></span>
                                <span class="nk-menu-text">Enquiries</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-star"></em></span>
                                <span class="nk-menu-text">Reviews</span>
                            </a>
                        </li>
                      
                        <li class="nk-menu-item">
                            <a href="subscriptions" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-check"></em></span>
                                <span class="nk-menu-text">Subscriptions</span>
                            </a>
                        </li>

                        <li class="nk-menu-item has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                <span class="nk-menu-text">System Users</span>
                            </a>
                            <ul class="nk-menu-sub">
                                <li class="nk-menu-item">
                                    <a href="system_users" class="nk-menu-link"><span class="nk-menu-text">Users</span></a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="" class="nk-menu-link"><span class="nk-menu-text">ECDE Teachers</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">Advanced Navigation</h6>
                        </li>
                        
                        <li class="nk-menu-item">
                            <a href="index" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-arrow-left"></em></span>
                                <span class="nk-menu-text">Back to website</span>
                            </a>
                        </li>
                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">System Configurations</h6>
                        </li>
                        <li class="nk-menu-item">
                            <a href="system_api_configs" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-opt"></em></span>
                                <span class="nk-menu-text">API Configurations</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a data-toggle="modal" href="#end_session" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-power"></em></span>
                                <span class="nk-menu-text">Logout</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                    </ul>
                <?php } else if ($_SESSION['user_access_level'] == 'Executive') { ?>
                    <ul class="nk-menu">
                        <li class="nk-menu-item">
                            <a href="dashboard" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-grid-add-c"></em></span>
                                <span class="nk-menu-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="dashboard_level_1_pupils" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-user-list"></em></span>
                                <span class="nk-menu-text">Enrollments</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="dashboard_level_1_teachers" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-account-setting-fill"></em></span>
                                <span class="nk-menu-text">Teachers</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="asset_register" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-reports-alt"></em></span>
                                <span class="nk-menu-text">Asset Register</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a data-toggle="modal" href="#end_session" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-power"></em></span>
                                <span class="nk-menu-text">Logout</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                    </ul>
                <?php } else if ($_SESSION['user_access_level'] == 'ECDE Officer') { ?>
                    <ul class="nk-menu">
                        <li class="nk-menu-item">
                            <a href="dashboard" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-grid-add-c"></em></span>
                                <span class="nk-menu-text">Dashboard</span>
                            </a>
                        </li>
                        <!-- <li class="nk-menu-item">
                        <a href="academic_years" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-calendar-check"></em></span>
                            <span class="nk-menu-text">Academic Years</span>
                        </a>
                        </li> -->
                        <li class="nk-menu-item">
                            <a href="ecde_centers" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-building"></em></span>
                                <span class="nk-menu-text">ECDE Centers</span>
                            </a>
                        </li>
                        <li class="nk-menu-item has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-user-add"></em></span>
                                <span class="nk-menu-text">Enrollments</span>
                            </a>
                            <ul class="nk-menu-sub">
                                <li class="nk-menu-item">
                                    <a href="add_enrollment" class="nk-menu-link"><span class="nk-menu-text">Enroll Pupil</span></a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="enrollments" class="nk-menu-link"><span class="nk-menu-text">Manage Enrollments</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="nk-menu-item has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-opt-dot-alt"></em></span>
                                <span class="nk-menu-text">Assets</span>
                            </a>
                            <ul class="nk-menu-sub">
                                <li class="nk-menu-item">
                                    <a href="asset_categories" class="nk-menu-link"><span class="nk-menu-text">Categories</span></a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="assets" class="nk-menu-link"><span class="nk-menu-text">Manage Assets</span></a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="asset_register" class="nk-menu-link"><span class="nk-menu-text">Assets Register</span></a>
                                </li>
                            </ul>
                        </li>

                        <li class="nk-menu-item">
                            <a data-toggle="modal" href="#end_session" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-power"></em></span>
                                <span class="nk-menu-text">Logout</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                    </ul>
                <?php } ?>
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>