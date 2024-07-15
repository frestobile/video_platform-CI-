<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-11 col-xs-10">
                        <h4 class="nav_top_align"><i class="bi bi-camera-reels"></i>&nbsp;&nbsp;<?php echo $head_name;?></h4>
                    </div>
                    
                    <div class="col-sm-1 col-sm-1 col-md-1 col-xs-3 text-right">
                        <a href="#" onclick="page_refresh();">
                            <i class="ri-refresh-line fs-22"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-2 col-xs-6">
                        <button class="btn btn-primary" onclick="addNewCustomer()"><?php echo $new_btn;?></button>
                    </div>
                </div>
                <div class="m-t-10" id="updated_list"></div>

            </div>
            
        </div>
    </div>
</div>

<!--add new customer modal-->
<div class="custom_modal" id="new_customer_modal">
    <form id="new_customer" action="<?php echo base_url('manager/customerAdd?lang='. $head_lang)?>" method="post">
        <div class="card">
            <div class="card-header">
				<span type="button" class="close" style="float: right;" data-dismiss="modal">&times;</span>
                <span id="modal_title" style="font-size: 24px;color: #43425D;"><?php echo $modal_head[1];?></span>
            </div>
            <div class="card-block">
                <div class="container" style="padding: 0 10% 20px">

                    <div class="row m-t-30">
                        <div class="col-sm-3 col-xs-3">
                            <span class="span_txt"><?php echo $video_table[1];?>:</span>
                        </div>
                        <div class="col-sm-8 col-xs-8">
                            <input class="dataSectionC" id="new_client_car" name="car" type="text" required>
                            <span class="error-msg error_case"><?php echo $error_case;?></span>
                        </div>
                        <div class="col-sm-1 col-xs-1">
                            <span style="color:red; margin-left: -20px;">*</span>
                        </div>
                    </div>

                    <div class="row m-t-15">
                        <div class="col-sm-3 col-xs-3">
                            <span class="span_txt" style="text-align: right;"><?php echo $video_table[16];?>:</span>
                        </div>
                        <div class="col-sm-8 col-xs-8">
                            <input class="dataSectionC" id="new_client_phone" name="phone" type="tel" required>
                        </div>
                        <div class="col-sm-1 col-xs-1">
                            <span style="color:red; margin-left: -20px;">*</span>
                        </div>
                    </div>

                    <div class="row m-t-15">
                        <div class="col-sm-3 col-xs-3">
                            <span class="span_txt"><?php echo $video_table[4];?>:</span>
                        </div>
                        <div class="col-sm-8 col-xs-8">
                            <input class="dataSectionC" id="new_client_email" name="email" type="email">
                        </div>
                    </div>

                    <div class="row m-t-15">
                        <div class="col-sm-3 col-xs-3">
                            <span class="span_txt"><?php echo $video_table[3];?>:</span>
                        </div>
                        <div class="col-sm-8 col-xs-8">
                            <input class="dataSectionC" id="new_client_name" name="name" type="text">
                        </div>
                    </div>


                    <div class="row m-t-15">
                        <div class="col-sm-3 col-xs-3">
                            <span class="span_txt"><?php echo $video_table[2];?>:</span>
                        </div>
                        <div class="col-sm-8 col-xs-8">
                            <input class="dataSectionC" id="new_client_company" name="company" type="text">
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-footer m-b-20" style="border-radius: 0 0 15px 15px;border-top: 0;">
                <div class="container" style="padding: 0 10% 20px">
                    <div class="row">
                        <div class="col-sm-3 hidden-xs"></div>
                        <div class="col-sm-4 col-xs-6">
                            <input type="button" value="<?php echo $video_table[17];?>" class="btn btn-primary" style="width: 150px" onclick="add_customer();">
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <input type="button" value="<?php echo $video_table[19];?>" class="btn btn-dark" style="width: 150px" onclick="close_view_modal();">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="modal_back" id="modal_back" style="display: none;"></div>
<script type="text/javascript" src="<?=base_url();?>assets/libs/moment.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/libs/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/libs/daterangepicker/daterangepicker.css" />

<script type="text/javascript">

var cur_page = parseInt(<?php echo $curpage;?>);
var total_pages = parseInt(<?php echo $total_pages;?>);

$(document).ready(function() {
    $('#menu li').removeClass('active');
    $('#video_menu').addClass('active');
    page_refresh();

});

function addNewCustomer() {
    $('#modal_back').css('display', 'block');
    $('#new_customer_modal').css('display', 'block');
}

function add_customer() {
    if (validation()) {
        
        var car_number = $("#new_client_car").val();
        $.post(_server_url + 'manager/caseCheck', {
            'car': car_number, 
            'company_id': <?php echo $company_id;?>
        },
        function (data) {
            var response = JSON.parse(data);
            if(response.status != "fail") {
                document.getElementById("new_customer").submit();
            } else {
                $('span.error_case').show();
            }
        });
    } else {
        // close_view_modal();
        
        Swal.fire({
			title: "<?php echo $warning;?>",
			text: "<?php echo $alert_content[15];?>",
			icon: "warning",
			customClass: {
				confirmButton: "btn btn-primary w-xs me-2 mt-2",
			},
			buttonsStyling: !1,
			showCloseButton: !0
		});
    }
}

function validation() {
    var name = document.getElementById("new_client_name").value;
    var email = document.getElementById("new_client_email").value;
    var phone = document.getElementById("new_client_phone").value;
    var company = document.getElementById("new_client_company").value;
    var car = document.getElementById("new_client_car").value;
    var emailReg = new RegExp("^([A-Za-z0-9_\\-\\.])+@");
    if ( phone === '' ||  car === '') {
        return false;
    } else {
        return true;
    }
}

$(function () {
    $('.close').on('click', function () {
        //location.href =_server_url + 'manager/go_videos?id='+company_id+'&lang='+lang_status;
        $('#modal_back').css('display','none');
        $('#video_preview').css('display','none');
		$('#new_customer_modal').css('display', 'none');
    })
})

if($("#start").val() != ""){
    var start = moment($("#start").val());
    var end = moment($("#end").val());
    var range = "";
}else{
    var start = 0;
    var end = 0;
    var range = "All";
}

function cb(start, end, range) {
    if(range != "All"){
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        $("#start").val(start.format('YYYY-MM-DD'));
        $("#end").val(end.format('YYYY-MM-DD'));
    }else{
        $('#reportrange span').html("All <?php echo $head_name;?>");
        $("#start").val("");
        $("#end").val("");
    }
}

$('#reportrange').daterangepicker({
    startDate: start,
    endDate: end,
    ranges: {
       'All' : [],
       'Last Week': [moment().subtract(1, 'week'), moment()],
       'Last 1 Month': [moment().subtract(1, 'months'), moment()],
       'Last 6 Months': [moment().subtract(6, 'months'), moment()],
       'Last 1 Year': [moment().subtract(1, 'years'), moment()],
    }
}, cb);
cb(start, end,range);

setInterval(function(){
    if($('.bs-example-modal-xl:visible').length == 0){
        window.location.reload();
    }
},100000);



function linksent_logtable_load(data) {
    $("#linksent_log").html(data);
    $('#linksent_log table').DataTable({
        "bFilter":false,
        "bInfo": false,
        "bLengthChange" : false,
        "pageLength": 5,
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
        }
    });
}


function log_table_load(data) {
    $("#video_log").html(data);
    $('#video_log table').DataTable({
        "bFilter":false,
        "bInfo": false,
        "bLengthChange" : false,
        "pageLength": 5,
        "aaSorting": [],
        "aoColumnDefs": [
            { "bSortable": false, "aTargets": [ 0, 1 ] },
            { "bSearchable": false, "aTargets": [ 0, 1 ] }
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
        }
    });
}

function offer_table_load(data) {
    $("#offer_window").empty();
    $("#offer_window").html(data);
    var table = $('#offer_table table').DataTable({
        "bFilter":false,
        "bInfo": false,
        "bLengthChange" : false,
        "pageLength": 5,
        "aaSorting": [],
        "aoColumnDefs": [
            { "bSortable": false, "aTargets": [ 0, 1, 2, 3, 4 ] },
            { "bSearchable": false, "aTargets": [ 0, 1, 2, 3, 4 ] }
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
        }
    });
}

</script>
<style type="text/css">input[readonly] {background-color: inherit;}</style>