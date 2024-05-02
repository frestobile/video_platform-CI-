<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
    <head>
        <meta charset="utf-8" />
        <title><?=$head_name;?> | <?=APP_ADMIN_NAME;?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Minimal Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?=base_url();?>assets/images/favicon.ico">

        <!-- jsvectormap css -->
        <link href="<?=base_url();?>assets/libs/jsvectormap/css/jsvectormap.min.css?_=<?=time();?>" rel="stylesheet" type="text/css" />

        <!--Swiper slider css-->
        <link href="<?=base_url();?>assets/libs/swiper/swiper-bundle.min.css?_=<?=time();?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/libs/sweetalert2/sweetalert2.min.css?_=<?=time();?>" rel="stylesheet" type="text/css" />
        <!-- Layout config Js -->
        <script src="<?=base_url();?>assets/js/layout.js?_=<?=time();?>"></script>
        <!-- Bootstrap Css -->
        <link href="<?=base_url();?>assets/css/bootstrap.min.css?_=<?=time();?>" rel="stylesheet" type="text/css" />
        
        <!-- Icons Css -->
        <link href="<?=base_url();?>assets/css/icons.min.css?_=<?=time();?>" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?=base_url();?>assets/css/app.min.css?_=<?=time();?>" rel="stylesheet" type="text/css" />
        <!-- custom Css-->
        <link href="<?=base_url();?>assets/css/custom.min.css?_=<?=time();?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/css/style.css?_=<?=time();?>" rel="stylesheet" type="text/css" />
        <!-- <link type="text/css" rel="stylesheet" href="../../public/vendors/ionicons/css/ionicons.min.css?_=<?=time();?>" /> -->

        <!-- JQUERY MIN JS -->
       <script src="<?=base_url();?>assets/libs/jquery/jquery.min.js?_=<?=time();?>"></script>
       <script src="https://cdn.jwplayer.com/libraries/bL8rDEl6.js?_=<?=time();?>"></script>

       <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/libs/dataTables/dataTables.bootstrap.min.css?_=<?=time();?>">
        <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/libs/dataTables/responsive.bootstrap.min.css?_=<?=time();?>">
        <script type="text/javascript" src="<?=base_url();?>assets/libs/dataTables/jquery.dataTables.min.js?_=<?=time();?>"></script>

    </head>

    <style>
        td:first-child, th:first-child {
    padding-left: 16px;
}
    </style>
    <body >
        <div class="preloader">
            <div class="preloader_img" style="width: 300px; height: 300px; position: absolute; left: 48%; top: 48%; background-position: center;z-index: 999999">
                <img src="<?=base_url()?>assets/images/loading.gif" style="width: 50px;" alt="loading...">
            </div>
        </div>
        <!-- Begin page -->
        <div id="layout-wrapper">
            <div class="top-tagbar">
                <div class="w-100">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md-auto col-9">
                            <!-- <div class="text-white-50 fs-13">
                                <i class="bi bi-clock align-middle me-2"></i> <span id="current-time"></span>
                            </div> -->
                        </div>
                        <div class="col-md-auto col-6 d-none d-lg-block">
                            <!-- <div class="d-flex align-items-center justify-content-center gap-3 fs-13 text-white-50">
                                <div>
                                    <i class="bi bi-envelope align-middle me-2"></i> <a href="mailto:<?=$email;?>"><?=$email;?></a>
                                </div>
                                <div>
                                    <i class="bi bi-globe align-middle me-2"></i> <a href="https://viservice.eu">https://viservice.eu</a>
                                </div>
                            </div> -->
                        </div>
                        <div class="col-md-auto col-3">
                            <div class="dropdown topbar-head-dropdown topbar-tag-dropdown justify-content-end">
                                <?php if($head_lang == 'en'){ ?>
                                    <button type="button" class="btn btn-icon btn-topbar rounded-circle text-white-50 fs-13" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="<?=base_url();?>assets/images/flags/us.png" alt="Header Language" height="16" class="rounded-circle me-2"> <span id="lang-name">English</span>
                                    </button>
                                <?php } else { ?>
                                    <button type="button" class="btn btn-icon btn-topbar rounded-circle text-white-50 fs-13" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="<?=base_url();?>assets/images/flags/es.png" alt="Header Language" height="16" class="rounded-circle me-2"> <span id="lang-name">Eesti keel</span>
                                    </button>
                                <?php } ?>
                                <div class="dropdown-menu dropdown-menu-end">

                                    <!-- item-->
                                    <a href="javascript:switch_langugage(0);" class="dropdown-item notify-item language py-2" data-lang="en" title="English">
                                        <img src="<?=base_url();?>assets/images/flags/us.png" alt="user-image" class="me-2 rounded-circle" height="18">
                                        <span class="align-middle">English</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:switch_langugage(1);" class="dropdown-item notify-item language" data-lang="sp" title="Estonia">
                                        <img src="<?=base_url();?>assets/images/flags/es.png" alt="user-image" class="me-2 rounded-circle" height="18">
                                        <span class="align-middle">Eesti keel</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" id="page_name" value="<?php echo $page_name?>">
            <header id="page-topbar">
                <div class="layout-width">
                    <div class="navbar-header">
                        <div class="d-flex">
                            <!-- LOGO -->
                            <div class="navbar-brand-box horizontal-logo">
                                <a href="<?=base_url();?>" class="logo logo-dark">
                                    <span class="logo-sm">
                                        <img src="<?=base_url();?>assets/images/logo-sm.png" alt="" height="50">
                                    </span>
                                    <span class="logo-lg">
                                        <img src="<?=base_url();?>assets/images/viserv_logo.png" alt="" height="70">
                                    </span>
                                </a>

                                <a href="<?=base_url();?>" class="logo logo-light">
                                    <span class="logo-sm">
                                        <img src="<?=base_url();?>assets/images/logo-sm.png" alt="" height="50">
                                    </span>
                                    <span class="logo-lg">
                                        <img src="<?=base_url();?>assets/images/viserv_logo.png" alt="" height="70">
                                    </span>
                                </a>
                            </div>

                            <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                                <span class="hamburger-icon">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </span>
                            </button>

                            <!-- <button type="button" class="btn btn-sm px-3 fs-15 text-reset header-item d-none d-md-block" data-bs-toggle="modal" data-bs-target="#searchModal">
                                <span class="bi bi-search me-2"></span> Search for Viserv..
                            </button> -->
                        </div>

                        <div class="d-flex align-items-center">


                            <!-- <div class="ms-1 header-item d-none d-sm-flex">
                                <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle" data-toggle="fullscreen">
                                    <i class='bi bi-arrows-fullscreen fs-16'></i>
                                </button>
                            </div> -->

                            <div class="dropdown topbar-head-dropdown ms-1 header-item">
                                <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle mode-layout" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bi bi-sun align-middle fs-20"></i>
                                </button>
                                <div class="dropdown-menu p-2 dropdown-menu-end" id="light-dark-mode">
                                    <a href="#!" class="dropdown-item" data-mode="light"><i class="bi bi-sun align-middle me-2"></i> Default (light mode)</a>
                                    <a href="#!" class="dropdown-item" data-mode="dark"><i class="bi bi-moon align-middle me-2"></i> Dark</a>
                                    <a href="#!" class="dropdown-item" data-mode="auto"><i class="bi bi-moon-stars align-middle me-2"></i> Auto (Default)</a>
                                </div>
                            </div>

                            

                            <div class="dropdown ms-sm-3 header-item topbar-user">
                                <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="d-flex align-items-center">
                                        <img class="rounded-circle header-profile-user" src="<?=base_url();?>assets/images/avatar.png" alt="Header Avatar">
                                        <span class="text-start ms-xl-2">
                                            <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"><?php echo $user['admin_username']; ?></span>
                                            <span class="d-none d-xl-block ms-1 fs-13 text-reset user-name-sub-text">System Manager</span>
                                        </span>
                                    </span>
                                </button>
                                <!-- <div class="dropdown-menu dropdown-menu-end">
                                    
                                    <h6 class="dropdown-header">Welcome <?php echo $user['admin_username'];?>!</h6>
                                    <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
                                    <a class="dropdown-item" href="pages-profile-settings.html"><i class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Settings</span></a>
                                    <a class="dropdown-item" href="auth-lockscreen-basic.html"><i class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Lock screen</span></a>
                                    <a class="dropdown-item" href="auth-logout-basic.html"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </header>


            <!-- Modal -->
            <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content rounded">
                        <div class="modal-header p-3">
                            <div class="position-relative w-100">
                                <input type="text" class="form-control form-control-lg border-2" placeholder="Search for hybrix..." autocomplete="off" id="search-options" value="">
                                <span class="bi bi-search search-widget-icon fs-17"></span>
                                <a href="javascript:void(0);" class="search-widget-icon fs-14 link-secondary text-decoration-underline search-widget-icon-close d-none" id="search-close-options">Clear</a>
                            </div>
                        </div>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0 overflow-hidden" id="search-dropdown">

                            <div class="dropdown-head rounded-top">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0 fs-14 text-muted fw-semibold"> RECENT SEARCHES </h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="dropdown-item bg-transparent text-wrap">
                                    <a href="index.html" class="btn btn-soft-secondary btn-sm btn-rounded">how to setup <i class="mdi mdi-magnify ms-1 align-middle"></i></a>
                                    <a href="index.html" class="btn btn-soft-secondary btn-sm btn-rounded">buttons <i class="mdi mdi-magnify ms-1 align-middle"></i></a>
                                </div>
                            </div>

                            <div data-simplebar style="max-height: 300px;" class="pe-2 ps-3 my-3">
                                <div class="list-group list-group-flush">
                                    <div class="notification-group-list">
                                        <h5 class="text-overflow text-muted fs-13 mb-2 mt-3 text-uppercase notification-title">Apps Pages</h5>
                                        <a href="javascript:void(0);" class="list-group-item dropdown-item notify-item"><i class="bi bi-speedometer2 me-2"></i> <span>Analytics Dashboard</span></a>
                                        <a href="javascript:void(0);" class="list-group-item dropdown-item notify-item"><i class="bi bi-filetype-psd me-2"></i> <span>hybrix.psd</span></a>
                                        <a href="javascript:void(0);" class="list-group-item dropdown-item notify-item"><i class="bi bi-ticket-detailed me-2"></i> <span>Support Tickets</span></a>
                                        <a href="javascript:void(0);" class="list-group-item dropdown-item notify-item"><i class="bi bi-file-earmark-zip me-2"></i> <span>hybrix.zip</span></a>
                                    </div>
                        
                                    <div class="notification-group-list">
                                        <h5 class="text-overflow text-muted fs-13 mb-2 mt-3 text-uppercase notification-title">Links</h5>
                                        <a href="javascript:void(0);" class="list-group-item dropdown-item notify-item"><i class="bi bi-link-45deg me-2 align-middle"></i> <span>www.themesbrand.com</span></a>
                                    </div>

                                    <div class="notification-group-list">
                                        <h5 class="text-overflow text-muted fs-13 mb-2 mt-3 text-uppercase notification-title">People</h5>
                                        <a href="javascript:void(0);" class="list-group-item dropdown-item notify-item">
                                            <div class="d-flex align-items-center">
                                                <img src="<?=base_url();?>assets/images/users/avatar-1.jpg" alt="" class="avatar-xs rounded-circle flex-shrink-0 me-2" />
                                                <div>
                                                    <h6 class="mb-0">Ayaan Bowen</h6>
                                                    <span class="fs-13 text-muted">React Developer</span>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="list-group-item dropdown-item notify-item">
                                            <div class="d-flex align-items-center">
                                                <img src="<?=base_url();?>assets/images/users/avatar-7.jpg" alt="" class="avatar-xs rounded-circle flex-shrink-0 me-2" />
                                                <div>
                                                    <h6 class="mb-0">Alexander Kristi</h6>
                                                    <span class="fs-13 text-muted">React Developer</span>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="list-group-item dropdown-item notify-item">
                                            <div class="d-flex align-items-center">
                                                <img src="<?=base_url();?>assets/images/users/avatar-5.jpg" alt="" class="avatar-xs rounded-circle flex-shrink-0 me-2" />
                                                <div>
                                                    <h6 class="mb-0">Alan Carla</h6>
                                                    <span class="fs-13 text-muted">React Developer</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- removeNotificationModal -->
            <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="NotificationModalbtn-close"></button>
                        </div>
                        <div class="modal-body p-md-5">
                            <div class="text-center">
                                <div class="text-danger">
                                    <i class="bi bi-trash display-4"></i>
                                </div>
                                <div class="mt-4 fs-15">
                                    <h4 class="mb-1">Are you sure ?</h4>
                                    <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                                </div>
                            </div>
                            <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete It!</button>
                            </div>
                        </div>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- ========== App Menu ========== -->
            <div class="app-menu navbar-menu">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="<?=base_url();?>" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="<?=base_url();?>assets/images/logo-sm.png" alt="" height="50">
                        </span>
                        <span class="logo-lg">
                            <img src="<?=base_url();?>assets/images/viserv_logo.png" alt="" height="70">
                        </span>
                    </a>
                    <a href="<?=base_url();?>" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="<?=base_url();?>assets/images/logo-sm.png" alt="" height="50">
                        </span>
                        <span class="logo-lg">
                            <img src="<?=base_url();?>assets/images/viserv_logo.png" alt="" height="70">
                        </span>
                    </a>
                    <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                        <i class="ri-record-circle-line"></i>
                    </button>
                </div>

                <div id="scrollbar">
                    <div class="container-fluid">

                        <div id="two-column-menu">
                        </div>
                        <ul class="navbar-nav" id="navbar-nav">
                            <li class="nav-item">
                                <a href="<?php echo base_url('admin/main/index?lang='.$head_lang);?>" id="dashboard_menu" class="nav-link menu-link"> 
                                    <i class="bi bi-speedometer2"></i> 
                                    <span data-key="t-dashboard"><?php echo $menu[0];?></span> 
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?php echo base_url('admin/main/adminList?lang='.$head_lang);?>" id="admin_menu" class="nav-link menu-link"> 
                                    <i class="bi bi-person-circle"></i> 
                                    <span data-key="t-admin"><?php echo $menu[6];?></span> 
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#sidebarCompany" id="company" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCompany">
                                    <i class="bi bi-layers"></i> <span data-key="t-company"><?php echo $menu[1];?></span>
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarCompany">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="<?php echo base_url('admin/main/companyList?lang='.$head_lang);?>" id="company_menu" class="nav-link"> 
                                                <i class="bi bi-hdd-stack"></i> 
                                                <span><?php echo $sub_menu[0];?></span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo base_url('admin/main/addCompany?lang='.$head_lang);?>" id="add_company_menu" class="nav-link"> 
                                                <i class="bi bi-plus-circle"></i> 
                                                <span><?php echo $sub_menu[1];?></span> 
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link menu-link" href="#sidebarVideo" data-bs-toggle="collapse" role="button" aria-expanded="false" id="video_menu" aria-controls="sidebarVideo">
                                    <i class="bi bi-camera-reels"></i> <span data-key="t-video"><?php echo $menu[2];?></span>
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarVideo">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="<?php echo base_url('admin/main/videoList?lang='.$head_lang);?>" id="all_video" class="nav-link"> 
                                                <i class="bi bi-camera2"></i> 
                                                <span><?php echo $sub_menu[5];?></span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo base_url('admin/main/lockedVideos?lang='.$head_lang);?>" id="locked_videos" class="nav-link"> 
                                                <i class="bi bi-camera-video-off"></i> 
                                                <span><?php echo $sub_menu[4];?></span> 
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link menu-link" id="device" href="#sidebarDevice" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDevice">
                                    <i class="bi bi-device-ssd"></i> <span data-key="t-device"><?php echo $menu[3];?></span>
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarDevice">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="<?php echo base_url('admin/main/deviceList?lang='.$head_lang);?>" id="device_menu" class="nav-link"> 
                                                <i class="bi bi-device-hdd"></i> 
                                                <span><?php echo $sub_menu[2];?></span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo base_url('admin/main/addDevice?lang='.$head_lang);?>" id="add_device_menu" class="nav-link"> 
                                                <i class="bi bi-plus-circle"></i> 
                                                <span><?php echo $sub_menu[3];?></span> 
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a id="sms_mail_settings" href="<?php echo base_url('admin/main/sms_mail_settings?lang='.$head_lang);?>" class="nav-link menu-link"> 
                                    <i class="bi bi-speedometer2"></i> 
                                    <span data-key="t-setting"><?php echo $menu[8];?></span> 
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="javascript:void(0);" onclick="logOut();" class="nav-link menu-link"> 
                                    <i class="bi bi-box-arrow-right"></i> 
                                    <span data-key="t-logout"><?php echo $menu[5];?></span> 
                                </a>
                            </li>
                            

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>

                <div class="sidebar-background"></div>
            </div>
            <!-- Left Sidebar End -->
            <!-- Vertical Overlay-->
            <div class="vertical-overlay"></div>
            
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                <input type="hidden" id="lang_status" value="<?php echo $head_lang;?>">
                <div class="page-content">
                    <div class="container-fluid">
                    <script type="text/javascript">
                        var _server_url = '<?php echo base_url();?>';
                        var lang_status = $("#lang_status").val();
                    </script>