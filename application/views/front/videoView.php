<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $company_data['company_name'];?>  |  <?php echo $video_data['video_case_number'];?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noodp,nodir,noydir">
    <link rel="shortcut icon" href="<?=base_url();?>uploads/company_img/<?php echo $company_data['favicon'];?>">

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
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/libs/dataTables/dataTables.bootstrap.min.css?_=<?=time();?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/libs/dataTables/responsive.bootstrap.min.css?_=<?=time();?>">
    <script type="text/javascript" src="<?=base_url();?>assets/libs/dataTables/jquery.dataTables.min.js?_=<?=time();?>"></script>

</head>
<style>
    .page_content {
        padding: calc(35px + 1.0rem) calc(1.5rem* 0.2) 30px calc(1.5rem* 0.2);
        margin-bottom: 30px;
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
    .page_preview td, .page_preview th {
        padding: .6rem .6rem;
    }
	.wrapped-text {
      word-wrap: break-word;
      overflow-wrap: break-word;
      white-space: normal;
    }

    table.dataTable td {
      table-layout: fixed;
      word-break: break-word;
    }
	.w-80 {
        font-size:12px;
		width: 50px;
		height: 30px;
		display: inline;
		border-color: #eae8e8;
		pointer-events: none;
	}
	.w-80-non-editable {
        font-size:12px;
		width: 50px;
		height: 30px;
		display: inline;
		border-color: #eae8e8;
		pointer-events: none;
	}
	.w-60 {
		width: 50px;
		height: 30px;
		display: inline;
		background-color:#eff2f7;
		border-color: #b9b9b9;
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
                                <label style="font-size: 17px; font-weight: 700;" id="label_title"><?php echo str_replace('%s', $video_data['video_case_number'], $preview[0]) ;?></label>
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
                                        <?php 
                                        if ($company_data['offer_active'] == "1") {
                                        ?>
                                        <div id="offer_data" style="display: none">
                                            <div id="offer_table">
                                                <div class="table-responsive" style="overflow-x: unset">
                                                    <table class="table table-centered align-middle table-nowrap mb-0 table-hover" id="offer_dt">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th scope="col"><?php echo $video_table[51];?></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tableBody">
                                                            <?php
                                                                $idx = 1;
                                                                foreach($offer_data as $item){  ?>
                                                                    <tr>
                                                                        <td style="border-color:#c9c9c9">						
                                                                            <input type="hidden" class="offer_id" value="<?php echo $item['id'];?>" />
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <p class="editable wrapped-text" data-name="description"><?php echo $item['description']; ?></p>
                                                                                    <input type="text" class="form-control edit-input" style="border-color:rgb(185,185,185)" value="<?php echo $item['description']; ?>">
                                                                                </div>
                                                                            </div>

                                                                            <div>
                                                                                <div style="float: right;" class="row">	
                                                                                    <div class="col-4">
                                                                                        <span style="font-size:12px; font-weight:700"><?php echo $video_table[52];?>:</span>
                                                                                        <input type="number" class="form-control edit-input quantity w-80"value="<?php echo $item['quantity'];?>">
                                                                                    </div>
                                                                                    <div class="col-4">
                                                                                        <span style="font-size:12px; font-weight:700"><?php echo $video_table[53];?>: </span>
                                                                                        <input type="number" class="form-control edit-input price w-80" value="<?php echo $item['price']; ?>">
                                                                                    </div>
                                                                                    <div class="col-4">
                                                                                        <span style="font-size:12px; font-weight:700"><?php echo $video_table[54];?>: </span>
                                                                                        <input type="number" class="form-control edit-input w-80-non-editable" value="<?php echo $item['price'] * $item['quantity']; ?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                    
                                                </div>
                                            </div>

                                            <div class="row" id="offer_board">
                                                    <?php
                                                    $valid_date = isset($video_data['valid_date']) ? date('Y-m-d', strtotime($video_data['valid_date'])) : date('Y-m-d');
                                                    ?>
                                                <div class="col-sm-5">
                                                    
                                                    <div><strong><?php echo $video_table[47];?> : </strong><span id="created_time"><?php echo $valid_date;?></span></div>
                                        
                    
                                                    <div class="m-t-10">
                                                        <button class="btn btn-primary" onclick="getBack();"><?php echo $video_table[29];?></button>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3"></div>
                                                <div class="col-sm-4">
                                                    <?php
                                                    $sum = 0;
                                                    foreach ($offer_data as $item) {
                                                        $sum += $item['price'] * $item['quantity'];
                                                    }
                                                    ?>
                                                    <table class="table table-bordered">
                                                        <tbody style="background-color: #eff2f7; border-color: #fff;">
                                                            <tr>
                                                                <th><?php echo $video_table[54];?>:</th>
                                                                <td><span id="sum_price"><?php echo $sum;?> &euro;</span></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo $video_table[55];?> 22% :</th>
                                                                <td><span id="vat_fee"><?php echo $sum * 0.22;?> &euro;</span></td>
                                                            </tr>
                                                            <tr>
                                                                <th><?php echo $video_table[56];?>:</th>
                                                                <td><span id="total_price"><?php echo $sum * (1+0.22);?> &euro;</span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }?>
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
                                                    if ($video_data['video_sent_time'] == null) {
                                                        echo date('d.m.Y', strtotime(date('Y-m-d H:i:s')));
                                                    } else {
                                                        echo date('d.m.Y', strtotime($video_data['video_sent_time']));
                                                    }
                                                    
                                                ?></td>
                                            </tr>
                                            <?php
                                             if ($company_data['offer_active'] == "1") {
                                                $total_price = 0;
                                                foreach ($offer_data as $item) {
                                                    $total_price += $item['quantity'] * $item['price'];
                                                }
                                            ?>
                                            <tr>
                                                <th><?php echo $preview[8];?>:</th>
                                                <td>
                                                    <span style="color: red; font-weight: 600;"><?php echo $total_price * (1 + 0.22);?> &euro;</span>&nbsp;&nbsp;&nbsp;
                                                    <button class="btn btn-primary btn-sm" onClick="view_offer();"><?php echo $preview[9];?></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th><?php echo $preview[10];?>:</th>
                                                <td>
                                                    <?php if($video_data['status'] == 1) {?>
                                                    <button class="btn btn-success btn-sm" id="accept_btn" onClick="accept_offer();">
                                                        <?php echo $preview[11];?>
                                                    </button>
                                                    <?php } else {?>
                                                        <button class="btn btn-success btn-sm" disabled><?php echo $video_data['accept_time'];?></button>
                                                    <?php }?>
                                                </td>
                                            </tr>
                                            <?php } ?>
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
                    <u style="float: right; cursor: pointer;" onclick="removeData();"><?php echo $preview[7];?></u>
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

    var video_id = $('#video_id').val();

    function removeData() {
        

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

    function accept_offer() {
        Swal.fire({
            title: "<?php echo $warning;?>",
            text: "<?php echo $alert_content[26];?>",
            icon: "warning",
            showCancelButton: !0,
            customClass: {
                confirmButton: "btn btn-primary w-xs me-2 mt-2",
                cancelButton: "btn btn-danger w-xs mt-2"
            },
            confirmButtonText: "<?php echo $alert_content[27];?>",
            cancelButtonText: "<?php echo $alert_content[28];?>",
            buttonsStyling: !1,
            showCloseButton: !0
            
        }).then(function(t) {
            if (t.isConfirmed) {
                $(".preloader").show();
                $(".preloader img").show();
                $.post(_server_url + 'manager/accept_offer', {'video_id': video_id},
                    function (data) {

                        var response = JSON.parse(data);
                        $(".preloader").hide();
                        $(".preloader img").hide();
                        if(response.status === "success") {

                           $('#accept_btn').text(response.time);
                           document.getElementById('accept_btn').setAttribute('disabled', true);

                        } else {
                            
                            Swal.fire({
                                    title: "<?php echo $failed;?>",
                                    text: "<?php echo $alert_content[6];?>",
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

    function view_offer() {
        $('#video-data').css('display', 'none');
        $('#offer_data').css('display', 'block');
        $('#label_title').text('<?php echo $preview[8]." : ".$video_data['video_case_number'];?>');
    }

    function getBack() {
        $('#video-data').css('display', 'block');
        $('#offer_data').css('display', 'none');
        $('#label_title').text('<?php echo str_replace('%s', $video_data['video_case_number'], $preview[0]) ;?>');
    }

    $(document).ready(function() {
        let table = $('#offer_table table').DataTable({
            "bFilter":false,
            "bInfo": false,
            "bLengthChange" : false,
            "pageLength": 10,
            "aaSorting": [],
            "aoColumnDefs": [
                { "bSortable": false, "aTargets": [ 0, 1, 2, 3 ] },
                { "bSearchable": false, "aTargets": [ 0, 1, 2, 3 ] }
            ],
            "language": {
                "paginate": {
                    "previous": '<i class="mdi mdi-chevron-double-left"></i>',
                    "next": '<i class="mdi mdi-chevron-double-right"></i>'
                }
            },
            "fnDrawCallback": function(oSettings) {
                // if ($('#DataTables_Table_0 tr').length < 11) {
                //     $('.dataTables_paginate').hide();
                // } else if ($('#DataTables_Table_0 tr').length < 11)
            },
            "statedSaveParams": function(settings, data) {
                localStorage.setItem('datatable-state', JSON.stringify(data));
            },
            "stateLoadParams": function(settings, data) {
                if (initialState) {
                    // Load saved state
                    return initialState;
                }
            }
        });
    });
</script> 

</html>