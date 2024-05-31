<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=APP_NAME;?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noodp,nodir,noydir">
    <link rel="shortcut icon" href="<?=base_url();?>assets/images/favicon.ico">

    <link href="<?=base_url();?>assets/libs/swiper/swiper-bundle.min.css?_=<?=time();?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url();?>assets/libs/sweetalert2/sweetalert2.min.css?_=<?=time();?>" rel="stylesheet" type="text/css" />
    <script src="<?=base_url();?>assets/js/layout.js?_=<?=time();?>"></script>
    <link href="<?=base_url();?>assets/css/bootstrap.min.css?_=<?=time();?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url();?>assets/css/icons.min.css?_=<?=time();?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url();?>assets/css/app.min.css?_=<?=time();?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url();?>assets/css/custom.min.css?_=<?=time();?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url();?>assets/css/style.css?_=<?=time();?>" rel="stylesheet" type="text/css" />
    <script src="<?=base_url();?>assets/libs/jquery/jquery.min.js?_=<?=time();?>"></script>
    <script src="<?=base_url();?>assets/libs/sweetalert2/sweetalert2.min.js?_=<?php echo time();?>"></script>    

    <link href="<?=base_url();?>assets/libs/videojs/video-js.min.css" rel="stylesheet" />
    <script src="<?=base_url();?>assets/libs/videojs/video.min.js"></script>

    <!-- <script src="<?=base_url();?>assets/libs/videojs/jwplayer.js"></script> -->
</head>
<style>
    .page_content {
        padding: calc(35px + 1.0rem) calc(1.5rem* 0.2) 30px calc(1.5rem* 0.2);
    }
    #video-data {
        background-color: black; 
        display: flex;
        justify-content: center;
        align-items: center;
        border: none;
    }
    .video-js {
        border: none !important;
    }
    video {
        width: 100%;
        height: auto;
        object-fit: cover; 
        border: none;
    }
</style>
<body>
<?php
if($company_data['company_image']) $image = "../../uploads/company_img/".$company_data['company_image'];
else $image = "../../assets/images/viserv_logo.png";
?>
    <div class="preloader">
        <div class="preloader_img" style="width: 300px; height: 300px; position: absolute; left: 48%; top: 48%; background-position: center;z-index: 999999">
            <img src="<?=base_url()?>assets/images/loading.gif" style="width: 50px;" alt="loading...">
        </div>
    </div>
    <div id="layout-wrapper">
        <div class="top-tagbar">
            <div class="w-100">
                <div class="row justify-content-between align-items-center">
                </div>
            </div>
        </div>
        <input type="hidden" value="<?php echo $video_data['video_id'];?>" id="video_id"/>
        <div class="page_content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header" style="padding-left: 30px;">
                                <label style="font-size: 17px; font-weight: 700;"><?php echo str_replace('%s', $video_data['video_case_number'], $preview[0]) ;?></label>
                            </div> 
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-7 col-xs-12 video_window">
                                        <div id="video-data">
                                            <video id="custom_player" 
                                            poster="<?php echo base_url();?>uploads/thumbnails/<?php echo $video_data['video_serial'];?>-1280.jpg"
                                            class="video-js vjs-big-play-centered vjs-theme-city vjs-controls-enabled vjs-workinghover vjs-v8 vjs-user-active  vjs-16-9" controls preload="auto">
                                                <source src="<?php echo base_url();?>uploads/videos/<?php echo $video_data['video_url'];?>" type="video/mp4" />
                                            </video>
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-5 col-xs-12">
                                        <table class="table table-bordered page_preview">
                                            <tbody>
                                                <tr>
                                                <td colspan="2" style="text-align: center;">
                                                    <img src="<?php echo $image;?>" class="admin_img2 avatar-img" alt="logo">
                                                </td>
                                                </tr>
                                            <tr>
                                                <th><?php echo $preview[2];?>:</th>
                                                <td><?php echo $company_data['company_name'];?></td>
                                            </tr>
                                            <tr>
                                                <th><?php echo $preview[3];?>:</th>
                                                <td><a href="mailto:<?php echo $company_data['company_email'];?>"> <?php echo $company_data['company_email'];?></a></td>
                                            </tr>
                                            <tr>
                                                <th><?php echo $preview[4];?>:</th>
                                                <td><a href="tel:<?php echo $company_data['company_phone'];?>"><?php echo $company_data['company_phone'];?></a></td>
                                            </tr>
                                            <tr>
                                                <th><?php echo $preview[5];?>:</th>
                                                <td><?php echo $video_data['video_case_number'];?></td>
                                            </tr>
                                            <tr>
                                                <th><?php echo $preview[6];?>:</th>
                                                <td><?php 
                                                    if ($video_data['video_sent_time'] == null) {
                                                        echo date('d.m.Y', strtotime(date('Y-m-d H:i:s')));
                                                    } else {
                                                        echo date('d.m.Y', strtotime($video_data['video_sent_time']));
                                                    }
                                                    
                                                ?></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <footer class="footer" style="left: 0; background-color: #31404a; height: 75px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <div style="float: right">Copyright © <?php echo date("Y");?> VISERV</div>
                </div>
                <div class="col-md-2 col-xs-12">
                    <u style="float: right; cursor: pointer;" onclick="removeData();">Eemalda andmed</u>
                </div>
            </div>
        </div>
    </footer>
</body>
<script src="<?=base_url();?>assets/libs/videojs/video.min.js">
    const player = videojs('custom_player', {
        autoplay: true,
        controls: true,
        fluid: true
    });
</script>
<script type="text/javascript"> 
    var _server_url = '<?php echo base_url();?>';
    var player = videojs('custom_player', {
      controlBar: {
        pictureInPictureToggle: false
      }
    });
    // window.onload = function exampleFunction() { 
        
    //     jwplayer('video-data').setup({

    //         file: _server_url + "uploads/videos/<?php echo $video_data['video_url'];?>",
    //         image: _server_url + "uploads/thumbnails/<?php echo $video_data['video_serial'];?>.jpg",
    //         width: "100%",
    //         aspectratio: "16:9",
    //         controls: {
    //             pipIcon: false
    //         },
    //     }); 
    // } 

    function removeData() {
        var video_id = $('#video_id').val();

        Swal.fire({
            title: "<?php echo $warning;?>",
            text: "<?php echo $alert_content[20];?>",
            icon: "warning",
            showCancelButton: !0,
            customClass: {
                confirmButton: "btn btn-primary w-xs me-2 mt-2",
                cancelButton: "btn btn-danger w-xs mt-2"
            },
            confirmButtonText: "<?php echo $determine[1];?>",
            cancelButtonText: "<?php echo $determine[0];?>",
            buttonsStyling: !1,
            showCloseButton: !0
            
        }).then(function(t) {
            if (t.isConfirmed) {
                $(".preloader").show();
                $(".preloader img").show();
                $.post(_server_url + 'manager/deleteVideo_from_user', {'video_id': video_id},
                    function (data) {
                        console.log(data);
                        var response = JSON.parse(data);
                        $(".preloader").hide();
                        $(".preloader img").hide();
                        if(response.status === "success") {
                            Swal.fire({
                                    title: "<?php echo $success;?>",
                                    text: "Andmed eemaldatud",
                                    icon: "success",
                                    customClass: {
                                        confirmButton: "btn btn-primary w-xs me-2 mt-2",
                                    },
                                    buttonsStyling: !1,
                                    showCloseButton: !0
                                })
                            .then(function(value) {
                                window.location.href = "https://viserv.eu/";
                            });

                        } else {
                            
                            Swal.fire({
                                    title: "<?php echo $failed;?>",
                                    text: "Proovige hiljem uuesti.",
                                    icon: "warning",
                                    customClass: {
                                        confirmButton: "btn btn-primary w-xs me-2 mt-2",
                                    },
                                    buttonsStyling: !1,
                                    showCloseButton: !0
                                });
                        }
                    }
                ); 
            } 
        });
    }
</script> 

</html>