<div class="row">
        <div class="col">

        <div class="h-100">
            <div class="row">
                <div class="col-xl-3">
                    <div class="row">
                        <div class="col-xl-12 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="flex-grow-1">
                                            <p class="text-uppercase fw-medium text-muted text-truncate fs-13"><?php echo $menu[2];?></p>
                                            <h4 class="fs-22 fw-semibold mb-3"><span class="counter-value" data-target="<?php echo $video_counts != null ? $video_counts : 0;?>">0</span></h4>
                                            <!-- <div class="d-flex align-items-center gap-2"> -->
                                                <!-- <h5 class="text-success fs-12 mb-0">
                                                    <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +18.30 %
                                                </h5>
                                                <p class="text-muted mb-0">than last week</p> -->
                                            <!-- </div> -->
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-success-subtle rounded fs-3">
                                                <i class="bi bi-camera-reels text-warning"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                                <div class="animation-effect-6 text-success opacity-25 fs-18">
                                    <i class="bi bi-currency-dollar"></i>
                                </div>
                                <div class="animation-effect-4 text-success opacity-25 fs-18">
                                    <i class="bi bi-currency-pound"></i>
                                </div>
                                <div class="animation-effect-3 text-success opacity-25 fs-18">
                                    <i class="bi bi-currency-euro"></i>
                                </div>
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xl-12 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        
                                        <div class="flex-grow-1">
                                            <p class="text-uppercase fw-medium text-muted text-truncate fs-13"><?php echo $menu[7];?></p>
                                            <h4 class="fs-22 fw-semibold mb-3"><span class="counter-value" data-target="<?php echo $waiting_video_counts != null ? $waiting_video_counts : 0;?>">0</span></h4>
                                            <!-- <div class="d-flex align-items-center justify-content-end gap-2">
                                                <h5 class="text-danger fs-12 mb-0">
                                                    <i class="ri-arrow-right-down-line fs-13 align-middle"></i> -2.74 %
                                                </h5>
                                                <p class="text-muted mb-0">than last week</p>
                                            </div> -->
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-info-subtle rounded fs-3">
                                                <i class="mdi mdi-loading mdi-spin text-info"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                                <div class="animation-effect-6 text-info opacity-25 left fs-18">
                                    <i class="bi bi-handbag"></i>
                                </div>
                                <div class="animation-effect-4 text-info opacity-25 left fs-18">
                                    <i class="bi bi-shop"></i>
                                </div>
                                <div class="animation-effect-3 text-info opacity-25 left fs-18">
                                    <i class="bi bi-bag-check"></i>
                                </div>
                            </div><!-- end card -->
                        </div><!-- end col -->
                    
                        <div class="col-xl-12 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="flex-grow-1">
                                            <p class="text-uppercase fw-medium text-muted text-truncate fs-13"><?php echo $menu[3];?></p>
                                            <h4 class="fs-22 fw-semibold mb-3"><span class="counter-value" data-target="<?php echo $device_counts != null ? $device_counts : 0;?>">0</span> </h4>
                                            <!-- <div class="d-flex align-items-center gap-2">
                                                <h5 class="text-success fs-12 mb-0">
                                                    <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +29.08 %
                                                </h5>
                                                <p class="text-muted mb-0">than last week</p>
                                            </div> -->
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-warning-subtle rounded fs-3">
                                                <i class="bi bi-device-ssd text-warning"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                                <div class="animation-effect-6 text-warning opacity-25 fs-18">
                                    <i class="bi bi-person"></i>
                                </div>
                                <div class="animation-effect-4 text-warning opacity-25 fs-18">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                                <div class="animation-effect-3 text-warning opacity-25 fs-18">
                                    <i class="bi bi-people"></i>
                                </div>
                            </div><!-- end card -->
                        </div><!-- end col -->
                    </div> <!-- end row-->
                </div>
                <div class="col-xl-9">
                    <div class="card">
                        <div class="card-header border-0 align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1"><?php echo $statistics;?></h4>
                            
                        </div><!-- end card header -->

                        <div class="card-body p-0 pb-2">
                            <div class="table-responsive">
                                <table class="table table-centered align-middle table-nowrap mb-0 table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <!-- <th scope="col" id="year_val"><?php echo date("Y");?></th> -->
                                            <th scope="col"><?php echo $result['company_name'];?></th>
                                            <th scope="col"><a href="javascript:void(0);" onclick="get_video_by_month(1);"><?php echo $months[0];?></a></th>
                                            <th scope="col"><a href="javascript:void(0);" onclick="get_video_by_month(2);"><?php echo $months[1];?></a></th>
                                            <th scope="col"><a href="javascript:void(0);" onclick="get_video_by_month(3);"><?php echo $months[2];?></a></th>
                                            <th scope="col"><a href="javascript:void(0);" onclick="get_video_by_month(4);"><?php echo $months[3];?></a></th>
                                            <th scope="col"><a href="javascript:void(0);" onclick="get_video_by_month(5);"><?php echo $months[4];?></a></th>
                                            <th scope="col"><a href="javascript:void(0);" onclick="get_video_by_month(6);"><?php echo $months[5];?></a></th>
                                            <th scope="col"><a href="javascript:void(0);" onclick="get_video_by_month(7);"><?php echo $months[6];?></a></th>
                                            <th scope="col"><a href="javascript:void(0);" onclick="get_video_by_month(8);"><?php echo $months[7];?></a></th>
                                            <th scope="col"><a href="javascript:void(0);" onclick="get_video_by_month(9);"><?php echo $months[8];?></a></th>
                                            <th scope="col"><a href="javascript:void(0);" onclick="get_video_by_month(10);"><?php echo $months[9];?></a></th>
                                            <th scope="col"><a href="javascript:void(0);" onclick="get_video_by_month(11);"><?php echo $months[10];?></a></th>
                                            <th scope="col"><a href="javascript:void(0);" onclick="get_video_by_month(12);"><?php echo $months[11];?></a></th>
                                            <th scope="col"><?php echo $months[12];?></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php for ($i = 0; $i < count($details_Y_ct); $i++) { ?>
                                            <tr>
                                                <td scope="col" id="year_val<?php echo $i;?>"><?php echo $details_Y_ct[$i]['year'];?></td>
                                                <?php
                                                    $total_counts = 0;
                                                    for ($j = 1; $j < 13; $j++) {
                                                        $flag = false;
                                                        $counts = 0;
                                                        
                                                        for ($q = 0; $q < count($details); $q++) {
                                                            if($details_Y_ct[$i]['year'] == $details[$q]['year']){
                                                                if ($details[$q]['month'] == $j) {
                                                                    $flag = true;
                                                                    $counts = $details[$q]['counts'];
                                                                    $total_counts += $counts;

                                                                } else {
                                                                    $flag = false;
                                                                }

                                                        }
                                                    }
                                                        
                                                ?>
                                                <td scope="col" onclick="calendar_view(<?php echo $details_Y_ct[$i]['year'];?>, <?php echo $j; ?>,<?php echo $counts; ?>);" style="cursor: pointer; color: #438eff;"><?php echo $counts; ?></td>
                                                <?php
                                                    }
                                                ?>
                                                <td scope="col"><?php echo $total_counts;?></td>
                                            
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>    
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div>

            <div class="row" style="display: none;" id="video-table">
                <div class="col-lg-12">
                    <div class="card" >
                        <div class="card-header" ><h4 class="card-title mb-0 flex-grow-1"><?php echo $menu[2];?> <span id="search_status"></span></h4></div>
                        <div class="card-body" >
                            <div id="all_video_list"></div>
                        </div>
                        
                    </div>
                </div>
            </div> 
            
        </div> 

    </div> 
</div>

<div class="custom_modal" id="calendar_modal">
    <div class="card">
        <div class="card-header">
            <span type="button" class="close" style="float: right" data-dismiss="modal">&times;</span>
            <span id="calendar_modal_title" style="font-size: 24px;color: #43425D;"></span>&nbsp;&nbsp;<span id="company_name"></span>
        </div>
        <div class="card-block">
            <div class="row" id="month_data" style="margin-top: 10px;"></div>
        </div>
        <div class="card-footer" style="border-radius: 0 0 15px 15px;border-top: 0;"></div>
    </div>
</div>

<div class="modal_back" id="modal_back" style="display: none;"></div>

<script type="text/javascript">
var video_id;
$(document).ready(function() {
    $('#menu li').removeClass('active');
    $('#dashboard_menu').addClass('active');
});

function previewVideo(obj, idx) {
    video_id = idx;
    $('#modal_back').css('display', 'block');
    $('#preview_modal').css('display', 'block');

    // var videoID = $("#video_serial"+idx).html();
    var tech_name = $("#tech_name"+idx).html();
    var customer_name = $("#customer_name"+idx).html();
    var customer_email = $("#customer_email"+idx).html();
    var customer_company = $("#video_company"+idx).html();
    var car_number = $("#video_car"+idx).html();
    var upload_time = $("#upload_time"+idx).html();
    var video_url = '../uploads/videos/' + (document.getElementById("video_url"+idx)).innerHTML.trim();
    var created_time = $("#created_time" + idx).val();

    // document.getElementById("video_serial").innerHTML=videoID;
    document.getElementById("tech_name").innerHTML=tech_name;
    document.getElementById("customer_name").innerHTML=customer_name;
    document.getElementById("customer_email").innerHTML=customer_email;
    document.getElementById("video_company").innerHTML=customer_company;
    document.getElementById("video_car").innerHTML=car_number;
    document.getElementById("upload_time").innerHTML=upload_time;
    document.getElementById("created_time").innerHTML=created_time;
    var vid = document.getElementById("video_source");
    vid.src = video_url
}

function leapYear(year){
    return ((year % 4 === 0) && (year % 100 !== 0)) || (year % 400 === 0);
}

function calendar_view(val, idx, total) {
    var day;
    var title;
    // var td = ((document.getElementById("year_val")).innerHTML).trim();
    var year = parseInt(val);
    if (idx === 1){
        day = 32;
        title = "January";
    } else if (idx === 2) {
        if (leapYear(year) === false) {
            day = 29;
        } else {
            day = 30;
        }
        title = "February";
    } else if (idx === 3) {
        day = 32;
        title = "March";
    } else if (idx === 4) {
        day = 31;
        title = "April";
    } else if (idx === 5) {
        day = 32;
        title = "May";
    } else if (idx === 6) {
        day = 31;
        title = "June";
    } else if (idx === 7) {
        day = 32;
        title = "July";
    } else if (idx === 8) {
        day = 32;
        title = "August";
    } else if (idx === 9) {
        day = 31;
        title = "September";
    } else if (idx === 10) {
        day = 32;
        title = "October";
    } else if (idx === 11) {
        day = 31;
        title = "November";
    } else {
        day = 32;
        title = "December";
    }
	$(".preloader").show();
	$(".preloader img").show();
    $.post(_server_url + 'manager/getDatabymonth', {
        'company_id': company_id,
        'year' : year,
        'month' : idx,
    },
    function (data){
		$(".preloader").hide();
		$(".preloader img").hide();
        var result = JSON.parse(data);
        if (result['status'] === "OK") {
            var data = result['month_data'];
            var modal = "";
            for (var i = 1; i < day; i++) {
                var counts = 0;
                var flag = false;
                for (var j = 0; j < data.length; j++){
                    var item = data[j];
                    if (item['day'] == i) {
                        flag = true;
                        counts = item['counts'];
                    } else {
                        flag = false;
                    }
                    var month = item['month'];
		            if (month < 10){
		              month = "0" +month;
		            }
                }

                if (i < 10){
                    i = "0" +i;
                }
               
                modal += '<div class="col-sm-2 col-xs-2" style="padding:5px 2%; text-align: center;">';
                modal += '<span style="font-size: 15px; font-weight: bold">' +
                    i + ': <a href="javascript:void(0);" onclick="get_video_by_date(\''+item['year']+'-'+month+'-'+i+'\');"><span style="font-size: 15px; color: blue;">' + counts + '</span></a>';
                modal += '</div>';
            }
            $('#month_data').html(modal);
            document.getElementById('calendar_modal_title').innerHTML = title + ' <span class="text-muted">('+ total +')</span>';
            $('#modal_back').css('display', 'block');
            $('#calendar_modal').css('display', 'block');
        } else {
            Swal.fire({
                title: "<?php echo $warning;?>",
                text: "<?php echo $no_data[1];?>",
                icon: "warning",
            });
        }
    });
}

function get_video_by_date(date){
	$(".preloader").show();
	$(".preloader img").show();
	$.ajax({
		type:"get",
		url:_server_url + 'manager/get_video_by_date',
		data:{'company_id': company_id,'date':date},
		dataType:"json",
		success:function(resp){
			close_view_modal();
			$(".preloader").hide();
			$(".preloader img").hide();
            $('#search_status').html("by Date");
            $('#video-table').show();
			$("#all_video_list").html(resp.content);

            $('#all_video_list table').DataTable({
                "bFilter":false,
                "bInfo": false,
                "bLengthChange" : false,
                "pageLength": 10,
                 "aaSorting": [],
                  "aoColumnDefs": [
                    { "bSortable": false, "aTargets": [ 0, 1, 2, 3,4,5,6,7,8 ] }, 
                    { "bSearchable": false, "aTargets": [ 0, 1, 2, 3,4,5,6,7,8  ] }
                ],
                "language": {
                    "paginate": {
                        "previous": '<i class="mdi mdi-chevron-double-left"></i>',
                        "next": '<i class="mdi mdi-chevron-double-right"></i>'
                    }
                },
                "fnDrawCallback": function(oSettings) {
                    if ($('#DataTables_Table_0 tr').length < 21) {
                        $('.dataTables_paginate').hide();
                    }
                }
            });
		}
	})
}

function get_video_by_month(month){
    $(".preloader").show();
    $(".preloader img").show();
    $("#all_video_list").html("");
    $.ajax({
        type:"get",
        url:_server_url + 'manager/get_video_by_month',
        data:{'company_id': company_id,'month':month},
        dataType:"json",
        success:function(resp){
            $(".preloader").hide();
            $(".preloader img").hide();
            if(resp.total_count > 0){
                $('#search_status').html("by Month");
                $('#video-table').show();
                $("#all_video_list").html(resp.content);
                $('#all_video_list table').DataTable({
                    "bFilter":false,
                    "bInfo": false,
                    "bLengthChange" : false,
                    "pageLength": 10,
                     "aaSorting": [],
                      "aoColumnDefs": [
                        { "bSortable": false, "aTargets": [ 0, 1, 2, 3,4,5,6,7,8 ] }, 
                        { "bSearchable": false, "aTargets": [ 0, 1, 2, 3,4,5,6,7,8  ] }
                    ],
                    "language": {
                        "paginate": {
                          "previous": '<i class="mdi mdi-chevron-double-left"></i>',
                          "next": '<i class="mdi mdi-chevron-double-right"></i>'
                        }
                      },
                     
                     "fnDrawCallback": function(oSettings) {
                        if ($('#DataTables_Table_0 tr').length < 21) {
                            $('.dataTables_paginate').hide();
                        }
                    }
                });
            }else{
                 Swal.fire({
                    title: "<?php echo $warning;?>",
                    text: "<?php echo $no_data[1];?>",
                    icon: "warning",
                    
                    customClass: {
                        confirmButton: "btn btn-primary w-xs me-2 mt-2",
                        
                    },
                    confirmButtonText: "<?php echo $determine[1];?>",

                });
            }
        }
    })
}

</script>