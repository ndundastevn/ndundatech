<div class="nk-header nk-header-fixed is-light">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger d-xl-none ml-n1">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
            </div>
            <div class="nk-header-brand d-xl-none">
                <a href="dashboard" class="logo-link">
                    <img class="logo-light logo-img" src="../public/images/merged_logos.png" srcset="../public/images/merged_logos.png 2x" alt="logo">
                    <img class="logo-dark logo-img" src="../public/images/merged_logos.png" srcset="../public/images/merged_logos.png 2x" alt="logo-dark">
                </a>
            </div><!-- .nk-header-brand -->
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    <em class="icon ni ni-user-alt"></em>
                                </div>
                                <div class="user-info d-none d-md-block">
                                    <div class="user-status"><?php echo $_SESSION['user_access_level']; ?></div>
                                    <div class="user-name dropdown-indicator"><?php echo $_SESSION['user_names']; ?></div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar">
                                        <span><?php echo substr($_SESSION['user_names'], 0, 2); ?></span>
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text"><?php echo $_SESSION['user_names']; ?></span>
                                        <span class="sub-text"><?php echo $_SESSION['user_email']; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="profile_settings"><em class="icon ni ni-account-setting-alt"></em><span>Profile Settings</span></a></li>
                                </ul>
                                <ul class="link-list">
                                    <li><a data-toggle="modal" href="#end_session"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </li><!-- .dropdown -->
                </ul><!-- .nk-quick-nav -->
            </div><!-- .nk-header-tools -->
        </div><!-- .nk-header-wrap -->
    </div><!-- .container-fliud -->
</div>