<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-11 col-xs-10">
                        <h4 class="nav_top_align"><i class="fa fa-file-movie-o"></i>&nbsp;&nbsp;<?php echo $menu[2];?></h4>
                    </div>
                    <div class="col-sm-1 col-xs-2 text-right">
                        <a href="<?php echo base_url('admin/main/videoList?lang='.$head_lang); ?>">
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

                    <div class="col-sm-2 col-xs-6" style="padding: 0">
                            <span style="line-height: 35px"> <?php echo $video_count;?>:&nbsp;<?php if ($totals) echo $totals; else echo "0";?></span>
                        </div>
                        <div class="col-sm-2 col-xs-6">
                            <select class="select-lg select-company form-control" id="company_selection" onchange="searchVideoList()">
                                <option value="0" selected="selected"><?php echo $search[3]; ?></option>
                                <?php foreach ($company_list as $item) {
                                    if ($company_data != null && $item['company_id'] == $company_data['company_id']) {?>
                                        <option value="<?php echo $item['company_id']; ?>" selected="selected"><?php echo $item['company_name']; ?></option>
                                    <?php }else{?>
                                        <option value="<?php echo $item['company_id']; ?>"><?php echo $item['company_name']; ?></option>
                                    <?php }
                                }?>
                            </select>
                        </div>
                        <div class="col-sm-3 col-xs-12">
                            <div id="reportrange" class="form-control" style="cursor: pointer; padding: 5px 10px; border: 1px solid #eff2f7; width: 100%; align-content: center; height: 42px;">
                                <i class="ri-calendar-2-line"></i>&nbsp;
                                <span></span> <i class="ri-arrow-down-s-fill"></i>
                            </div>
                           <input type="hidden" name="start" id="start" value="<?php echo isset($_GET['start']) ? $_GET['start']: ''; ?>">
                           <input type="hidden" name="end" id="end" value="<?php echo isset($_GET['end']) ? $_GET['end']: ''; ?>">
                        </div>
                        <div class="col-sm-3 col-xs-12">
                            <div class="input-group">
                                <input class="form-control " type="search" id="searchtxt"
                                       onkeypress="searchVideoKeypress(event);"
                                       value="<?php if (isset($search_key)) echo $search_key; else echo '';?>"
                                       placeholder="<?php echo $search[1];?>">
                            
                            </div>
                        </div>

                </div>
                <div class="m-t-30">
                    <?php $this->load->view('admin/video/video_list_ajax'); ?>
                    <div class="row align-items-center mt-4 pt-2 gy-2 text-center text-sm-start">
                        <?php include_once "pagination.php"; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--add new customer modal-->
<div class="custom_modal" id="new_customer_modal">
    <form id="new_customer" action="<?php echo base_url('admin/main/customerAdd?lang='. $head_lang)?>" method="post">
        <div class="card">
            <div class="card-header">
				<span type="button" class="close" style="float: right;" data-dismiss="modal">&times;</span>
                <span id="modal_title" style="font-size: 24px;color: #43425D;"><?php echo $modal_head[1];?></span>
            </div>
            <div class="card-block">
                <div class="container" style="padding: 0 10% 20px">
                      <div class="row m-t-30">
                        <div class="col-sm-3 col-xs-3">
                            <span class="span_txt"><?php echo $video_table[2];?>:</span>
                        </div>
                        <div class="col-sm-8 col-xs-8">
                             <select class="select-lg form-control" name="customer_company_id" id="customer_company_id">
                                <option value="0" selected="selected"><?php echo $search[3]; ?></option>
                                <?php foreach ($company_list as $item) {
                                    if ($item['company_id'] == $company_data['company_id']) {?>
                                        <option value="<?php echo $item['company_id']; ?>" selected="selected"><?php echo $item['company_name']; ?></option>
                                    <?php }else{?>
                                        <option value="<?php echo $item['company_id']; ?>"><?php echo $item['company_name']; ?></option>
                                    <?php }
                                }?>
                            </select>
                        </div>
                        <div class="col-sm-1 col-xs-1">
                            <span style="color:red; margin-left: -20px;">*</span>
                        </div>
                    </div>
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
                        <div class="col-sm-3"></div>
                        <div class="col-sm-4">
                            <input type="button" value="<?php echo $video_table[17];?>" class="btn btn-primary" style="width: 150px" onclick="add_customer();">
                        </div>
                        <div class="col-sm-4">
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
    $('#all_video').addClass('active');
    $('#video_menu').removeClass('collapsed');

    $("#sidebarVideo").addClass('show');
});

function addNewCustomer() {
    $('#modal_back').css('display', 'block');
    $('#new_customer_modal').css('display', 'block');
}

function add_customer() {
    if (validation()) {
        var car_number = $("#new_client_car").val();
        $.post(_server_url + 'admin/main/caseCheck', {
            'car': car_number
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
    var customer_company_id = document.getElementById("customer_company_id").value;
    var name = document.getElementById("new_client_name").value;
    var email = document.getElementById("new_client_email").value;
    var phone = document.getElementById("new_client_phone").value;
    var company = document.getElementById("new_client_company").value;
    var car = document.getElementById("new_client_car").value;
    var emailReg = new RegExp("^([A-Za-z0-9_\\-\\.])+@");
    if (customer_company_id == '' || phone === '' ||  car === '') {
        return false;
    } else {
        return true;
    }
}
function page_change(ptargets){
    if(ptargets == 'first'){
        cur_page = 1;
    }else if(ptargets == 'prev'){
        cur_page --;
        if(cur_page <= 1) cur_page = 1;
    }else if(ptargets == 'next'){
        cur_page ++;
        if(cur_page >= total_pages) cur_page = total_pages;
    }else if(ptargets == 'last'){
        cur_page = total_pages;
    }else {
        cur_page = parseInt(ptargets);
    }

    //var status = $('.select-status').val();
    var status = 3;
    var search_key = $('#searchtxt').val();
    var idx = parseInt($('#company_selection').val());

    //alert(idx); return false;
    var start = $("#start").val();
    var end = $("#end").val();
    var search_url = _server_url + 'admin/main/videoList?lang='+lang_status+'&pageNum='
        + cur_page;
    if (idx) {
        search_url +="&id=" + idx;
    }
    if (search_key) {
        search_url +="&search_key=" + search_key;
    }
    if (start && end) {
        search_url +="&start=" + start+"&end="+end;
    } 

    location.href = search_url;
}

function searchVideoKeypress(evt) {
    if ( evt.which == 13 ) {
        searchVideoList();
    }
}

function searchVideoList() {
    //var status = $('.select-status').val();
    var status = 3;
    var search_key = $('#searchtxt').val();
    var idx = parseInt($('#company_selection').val());
    var start = $("#start").val();
    var end = $("#end").val();
    var search_url = _server_url + 'admin/main/videoList?lang='+lang_status;
    if (idx) {
        search_url +="&id=" + idx;
    }
    if (search_key) {
        search_url +="&search_key=" + search_key;
    }
    if (start && end) {
        search_url +="&start=" + start+"&end="+end;
    } 

    location.href = search_url;
}


function deleteVideodata(obj, idx) {
    Swal.fire({
        title: "<?php echo $warning;?>",
        text: "<?php echo $alert_content[8];?>",
        icon: "warning",
        buttons: ["<?php echo $determine[0];?>", "<?php echo $determine[1];?>"],
    })
    .then(function(value) {
        if (value.isConfirmed) {
            $.post(_server_url + 'admin/data/videoDelete', {'video_id': idx},
            function (data) {
                if(data !== "FAIL") {
                    $(obj).parent('td').parent('tr').remove();
                    select_menu('videoList');
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
            });
        }
    });
}

function linksent_logtable_load(data) {
    $("#linksent_log").html(data);
    $('#linksent_log table').DataTable({
        "bFilter":false,
        "bInfo": false,
        "bLengthChange" : false,
        "pageLength": 7,
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
        }
    });
}

function log_table_load(data) {
    $("#video_log").html(data);
    $('#video_log table').DataTable({
        "bFilter":false,
        "bInfo": false,
        "bLengthChange" : false,
        "pageLength": 7,
        "aaSorting": [],
        "aoColumnDefs": [
            { "bSortable": false, "aTargets": [ 0, 1, 2 ] },
            { "bSearchable": false, "aTargets": [ 0, 1, 2 ] }
        ],
        "language": {
            "paginate": {
                "previous": '<i class="mdi mdi-chevron-double-left"></i>',
                "next": '<i class="mdi mdi-chevron-double-right"></i>'
            }
        },
        "fnDrawCallback": function(oSettings) {
        }
    });
}

if($("#start").val() != ""){
    var start = moment($("#start").val());
    var end = moment($("#end").val());
    var range = "";
}else{
    var start = 0;
    var end = 0;
    var range = "All";
}

function cb(start, end,range) {
    if(range != "All") {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        $("#start").val(start.format('YYYY-MM-DD'));
        $("#end").val(end.format('YYYY-MM-DD'));
    } else {
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

</script>