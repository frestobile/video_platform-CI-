<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=APP_NAME;?></title>
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noodp,nodir,noydir">
    
    <link rel="shortcut icon" href="<?=base_url();?>assets/images/favicon.ico">
    <!-- global styles-->
    <link type="text/css" rel="stylesheet" href="../../public/css/components.css"/>
    <link type="text/css" rel="stylesheet" href="../../public/css/custom.css"/>
    <!--    <link type="text/css" rel="stylesheet" href="../../public/css/layouts.css" />-->
    <link type="text/css" rel="stylesheet" href="../../public/vendors/ionicons/css/ionicons.min.css" />
    <!-- end of global styles-->
    <script type="text/javascript" src="../../public/js/jquery.min.js"></script>
    <script src="../../public/js/components.js"></script>
    <script src="../../public/js/custom.js"></script>
    <script src="../../public/js/fixed_menu.js"></script>
    <script type="text/javascript" src="../../public/js/sweetalert.min.js"></script>
    <!-- JWPlayer JS -->
    <!-- <script src="https://cdn.jwplayer.com/libraries/bL8rDEl6.js"></script> -->
    <link href="https://vjs.zencdn.net/7.19.2/video-js.css" rel="stylesheet" type="text/css" />

</head>
<body class="fixedMenu_header">
<?php
if($company_data['company_image']) $image = "../../uploads/company_img/".$company_data['company_image'];
else $image = "../../assets/images/viserv_logo.png";
?>
<div class="preloader">
    <div class="preloader_img" style="width: 300px; height: 300px; position: absolute; left: 48%; top: 48%; background-position: center; z-index: 999999">
        <img src="../../public/img/loading.gif" style=" width: 40px;" alt="loading...">
    </div>
</div>
<div id="top" class="fixed">
  <nav class="navbar navbar-static-top">
    <div class="container-fluid m-0">
      <div class="topnav dropdown-menu-right float-right">
        <div class="btn-group">
        </div>
      </div>
    </div>
  </nav>
</div>
<div class="bg-dark view_page" id="wrap" style="padding-bottom: 40px">
    <div style="margin-top: 20px;">
        <!-- <input type="hidden" id="media_id" value="<?php echo $video_data['video_url'];?>"> -->
        <input type="hidden" id="video_id" value="<?php echo $video_data['video_id'];?>">
        <div class="container">
            <div class="card ">
                <div class="card-header bg-white">
                    <?php echo str_replace('%s', $video_data['video_case_number'], $preview[0]) ;?>
                </div>
                <div class="row padding15" style="min-height: 440px">
                    <div class="col-md-7 col-xs-12">
                        <div id="video-data">
                            <video id="custom_player" class="video-js vjs-big-play-centered vjs-default-skin" controls preload="auto" data-setup='{ "aspectRatio":"1280:720", "playbackRates": [1, 1.5, 2] }' >
                                <source src="<?php echo base_url();?>uploads/videos/<?php echo $video_data['video_url'];?>" type="video/mp4" />
                            </video>
                        </div>
                    </div>
                    
                    <div class="col-md-5 col-xs-12">
                        <table class="table table-bordered page_preview">
                            <tbody>
                                <tr>
                                  <td colspan="2" style="text-align: center;">
                                      <img src="<?php echo $image;?>" class="admin_img2 avatar-img" alt="avatar">
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
                                
                                    echo date('d.m.Y', strtotime($video_data['video_sent_time']));
                                
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
<footer>
    <div class="footer">
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <div style="float: right">Copyright © <?php echo date("Y");?> VISERV.EU</div>
            </div>
            <div class="col-md-2 col-xs-12">
                <u style="float: right; cursor: pointer;" onclick="removeData();">Eemalda andmed</u>
            </div>
        </div>

<!--        <div class="container">Copyright © --><?php //echo date("Y");?><!-- VIService.eu -->
<!--            <div class="container" onclick="removeData()"></div>-->
<!--        </div>-->
    </div>
</footer>

    <script type="text/javascript"> 
        var _server_url = 'https://'+location.host+'/';
        // window.onload = function exampleFunction() { 
        //     var video_key = $("#media_id").val();

        //     jwplayer('video-data').setup({
        //         playlist: [{
        //             image:"https://content.jwplatform.com/thumbs/" + video_key + "-1920.jpg",
        //             sources: [{
        //                 file:"https://cdn.jwplayer.com/videos/" + video_key + "-ONDbyjfZ.mp4",
        //                 label: "720p",
        //                 "default": "true"
        //             }],
        //             tracks: [{
        //                 file: "https://cdn.jwplayer.com/strips/" + video_key + "-120.vtt",
        //                 kind: "thumbnails"
        //             }]
        //         }]
        //     }); 
        // } 

        function removeData() {
            var video_id = $('#video_id').val();

            swal({
                    title: "<?php echo $warning;?>",
                    text: "<?php echo $alert_content[20];?>",
                    icon: "warning",
                    buttons: ["<?php echo $determine[0];?>", "<?php echo $determine[1];?>"]
                    
                }).then(function(t) {
                    if (t) {
                        $(".preloader").show();
                        $(".preloader img").show();
                        return $.post(_server_url + 'backend/remove_data', {'video_id': video_id},
                            function (data) {
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
                                        window.location.href = "https://viservice.eu/";
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
<script src="https://vjs.zencdn.net/7.19.2/video.min.js">
    const player = videojs('custom_player', {
        autoplay: true,
        controls: true,
        fluid: true
    });
</script>
</body>
</html>

