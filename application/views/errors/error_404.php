<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo APP_NAME;?> 404 Page Not Found</title>
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../../public/img/favicon.ico"/>
    <!-- global styles-->
    <link type="text/css" rel="stylesheet" href="../../public/css/components.css"/>
    <link type="text/css" rel="stylesheet" href="../../public/css/custom.css"/>
    <!--    <link type="text/css" rel="stylesheet" href="../../public/css/layouts.css" />-->
    <link type="text/css" rel="stylesheet" href="../../public/vendors/ionicons/css/ionicons.min.css" />
    <script type="text/javascript" src="../../public/js/jquery.min.js"></script>
    <!-- end of global styles-->
</head>
<body class="fixedMenu_header">
<?php $image = "../../public/img/logo.png";?>
<div class="preloader">
    <div class="preloader_img" style="width: 300px;
      height: 300px;
      position: absolute;
      left: 48%;
      top: 48%;
      background-position: center;
    z-index: 999999">
        <img src="../../public/img/loading.gif" style=" width: 40px;" alt="loading...">
    </div>
</div>
<div class="bg-dark" id="wrap">
    <div id="top"  class="fixed">
        <!-- .navbar -->
        <nav class="navbar navbar-static-top" style="padding: 10px 0; height: 60px;">
            <div class="container">
                <a class="navbar-brand float-left text-center" href="#" style="padding-top: 10px;">
                    <h4 class="text-white"><img src="<?php echo $image;?>" class="admin_img2 avatar-img" alt="avatar"></h4>
                </a>
                <div class="topnav dropdown-menu-right float-right">
                    <div class="btn-group" style="margin-left: 20px;">
                        <div class="user-settings no-bg">
                            <div class="no-bg">
                                <?php
                                if(isset($company_data) && !empty($company_data['company_image'])) {?>
                                    <?php $image = "../../uploads/company_img/".$company_data['company_image']; ?>
                                    <img src="<?php echo $image;?>" class="admin_img2 avatar-img" alt="avatar">
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </nav>
        <!-- /.navbar -->
    </div>
    <!-- /#top -->
    <div style="margin-top: 55px;">
        <!-- /#content -->
        <div class="container">
            <div class="card m-t-25">
                <div class="card-header bg-white">
                    Video Preview
                </div>
                <div class="row padding15" >
                    <div class="col-sm-7">
                        <video loop controls="controls" style="width: 100%; height: 350px;">
                            <source src="" type="video/mp4">
                        </video>
                    </div>
                    <div class="col-sm-5 col-xs-12" style="padding-top: 25px;">
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-xl-4">
                                <span><?php echo $preview[1];?> :</span>
                            </div>
                            <div class="col-xl-8">

                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-xl-4">
                                <span><?php echo $preview[2];?> :</span>
                            </div>
                            <div class="col-xl-8">

                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-xl-4">
                                <span><?php echo $preview[3];?> :</span>
                            </div>
                            <div class="col-xl-8">

                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-xl-4">
                                <span><?php echo $preview[4];?> :</span>
                            </div>
                            <div class="col-xl-8">

                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-xl-4">
                                <span><?php echo $preview[5];?> :</span>
                            </div>
                            <div class="col-xl-8">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--wrapper-->
</div>

<footer>
    <div class="footer">
        <div class="container">
            <strong>Copyright © <?php echo date("Y");?> VISERV.EU
            </strong>
            &nbsp;&nbsp;All rights reserved.
        </div>
    </div>
</footer>
<script type="text/javascript" src="../../public/js/components.js"></script>
<script type="text/javascript" src="../../public/js/custom.js"></script>
<!-- end of global scripts-->
<script type="text/javascript" src="../../public/js/fixed_menu.js"></script>
<script type="text/javascript" src="../../public/js/sweetalert.min.js"></script>
<script type="text/javascript">
var _server_url = 'http://'+location.host+'/';
$(document).ready(function() {
    swal({
        title: "404 NOT FOUND!",
        text: "We can't find the video for you.  Please check the video ID again.",
        icon: "error",
    })
    .then(function(value) {
        if (value) {
            location.href =_server_url;
        }
    }).done();
});
</script>
</body>
</html>