<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-11 col-xs-10">
                        <h4 class="nav_top_align"><i class="fa fa-file-movie-o"></i>&nbsp;&nbsp;<?php echo $menu[3];?></h4>
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
                        <button class="btn btn-primary" style="float: left" onclick="addNewDevice()">
                            <i class="fa fa-plus-square">&nbsp;&nbsp;&nbsp;</i><?php echo $device_add;?>
                        </button>
                    </div>
                    
                    <div class="col-sm-2 col-xs-6">
                        <span style="line-height: 35px"> <?php echo $device_count;?> :&nbsp;<?php if ($totals) echo $totals; else echo "0";?></span>
                    </div>

                    <div class="col-sm-2 col-xs-12">
                        <select class="select-lg form-control select-company" id="company_selection" style="margin-left: 10px;" onchange="searchDeviceList()">
                            <?php if ($company_data == null) { ?>
                                <option value="0" selected="selected"><?php echo $search[3]; ?></option>
                                <?php foreach ($company_list as $item) { ?>
                                    <option value="<?php echo $item['company_id']; ?>"><?php echo $item['company_name']; ?></option>
                                <?php }
                            } else {?>
                                <option value="<?php echo $company_data['company_id']; ?>"
                                        selected="selected"><?php echo $company_data['company_name']; ?></option>
                                <?php foreach ($company_list as $item) {
                                    if ($item['company_id'] != $company_data['company_id']) {
                                        ?>
                                        <option value="<?php echo $item['company_id']; ?>"><?php echo $item['company_name']; ?></option>
                                    <?php }
                                }
                            }?>
                        </select>
                    </div>
                    
                    <div class="col-sm-3 col-xs-12">
                        
                        <select class="select-lg form-control select-status" onchange="searchDeviceList();">
                            <?php
                            $device_is_allow = isset($device_is_allow)? $device_is_allow: 1;
                            $verify_arr = array(
                                0=> $status[2],
                                1=>$status[1],
                                2=>$status[0]
                            );
                            for($idx = sizeof($verify_arr) - 1; $idx >= 0; $idx--){
                                if($device_is_allow == $idx)
                                    echo '<option value="'.$idx.'" selected="selected">'.$verify_arr[$idx].'</option>';
                                else
                                    echo '<option value="'.$idx.'">'.$verify_arr[$idx].'</option>';
                            }?>
                        </select>
                            
                            
                       
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <input class="form-control" placeholder="<?php echo $search[2];?>" aria-label="Search" id="searchtxt" onkeypress="searchDeviceKeypress(event);" type="search" value="<?=isset($search_key)? $search_key:''?>">
                    </div>
                </div>
                <div class="m-t-30">
                    <div class="table-responsive table-card">
                        <table class="table table-centered align-middle table-nowrap mb-0 table-hover">
		                    <thead class="table-light">
                                <tr>
                                    <th width="5%"><?php echo $back_device_table[0];?></th>
                                    <th width="15%"><?php echo $back_device_table[1];?></th>
                                    <th width="15%"><?php echo $back_device_table[11];?></th>
                                    <th width="10%"><?php echo $back_device_table[2];?></th>
                                    <th width="10%"><?php echo $back_device_table[3];?></th>
                                    <th width="20%"><?php echo $back_device_table[4];?></th>
                                    <th nowrap width="5%"><?php echo $back_device_table[5];?></th>
                                    <th width="15%"><?php echo $back_device_table[6];?></th>
                                    <th width="5%"><?php echo $back_device_table[7];?></th>
                                    <th width="15%"><?php echo $back_device_table[8];?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $idx = 1;
                                foreach($device_list as $item){
                                $misverify = 0;
                                if($item['device_is_allow'] == 0) $misverify = 1;?>
                                <tr>
                                <td><?php echo $idx++;?></td>
                                    <td nowrap><?php echo $item['deviceid'];?></td>
                                    <td nowrap><?php echo $item['device_password'];?></td>
                                    <td nowrap><?php echo $item['device_name'];?></td>
                                    <td nowrap><?php echo $item['company_name'];?></td>
                                    <td nowrap><?php echo $item['device_serial_number'];?></td>
                                    <td nowrap><?php echo $item['device_login_num'];?></td>
                                    <td nowrap><?php echo date('d.m.Y H:i:s', strtotime($item['device_registered_at']));?></td>
                                    <td nowrap><?php echo $verify_arr[$item['device_is_allow']];?></td>
                                    <td nowrap>
                                        <a href="#" class="" onclick="editDevice(this, <?php echo $item['device_id'];?>);"><?php echo $back_device_table[9];?>&nbsp;</a>
                                        <label class="stick">|&nbsp;</label>
                                        <a href="" data-toggle="modal" onclick="enableDeviceShow(this, <?php echo $item['device_id'];?>);"><?=$verify_arr[$misverify];?></a>
                                        <label class="stick">&nbsp;|</label>
                                        <a href="" data-toggle="modal" onclick="deleteDeviceData(this, <?php echo $item['device_id'];?>);">&nbsp;<?php echo $back_device_table[10];?></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                    <div class="row align-items-center mt-4 pt-2 gy-2 text-center text-sm-start">
                        <?php include_once "pagination.php"; ?>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
var cur_page   = parseInt(<?=$curpage;?>);
var total_pages = parseInt(<?=$total_pages;?>);
$(document).ready(function() {
    $('#menu li').removeClass('active');
    $('#device_menu').addClass('active');
    $("#device").addClass('active');

    $('#device_menu').removeClass('collapsed');

    $("#sidebarDevice").addClass('show');
});

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

    var status = $('.select-status').val();
    var search_key = $('#searchtxt').val();

    location.href = _server_url + 'amdin/main/deviceList?status='
        + status + '&search_key=' + search_key + '&pageNum='+ cur_page +'&lang=' + lang_status;
}

function editDevice(obj, idx) {
    location.href = _server_url + 'admin/main/deviceUpdate?id=' + idx;
}

function enableDeviceShow(obj, idx) {
    var msg, state_val, state_str1, state_str2;
    if($(obj).html() == "<?php echo $status[1];?>") {
        state_str1 = "<?php echo $status[2];?>";
        state_str2 = "<?php echo $status[1];?>";
        state_val = 1;
    }else {
        state_str1 = "<?php echo $status[1];?>";
        state_str2 = "<?php echo $status[2];?>";
        state_val = 0;
    }
    $.post(_server_url + 'admin/data/deviceUpdate', {'device_id': idx, 'device_is_allow': state_val},
    function (data) {
        if(data != 'FIAL'){
            $(obj).html(state_str1);
            $(obj).parent('td').parent('tr').find('td').eq(8).html(state_str2);
        }else{
            
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

function deleteDeviceData(obj, idx) {
    Swal.fire({
        title: "<?php echo $warning;?>",
        text: "<?php echo $alert_content[8];?>",
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
            $.post(_server_url + 'admin/data/deviceDelete', {'device_id': idx},
                function (data) {
                    if(data != "FAIL") {
                        $(obj).parent('td').parent('tr').remove();
                        location.href = _server_url + 'admin/main/deviceList?lang=' + lang_status;
                    }else
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
                });
        } 
    });
}

function searchDeviceKeypress(evt) {
    if ( evt.which == 13 ) {
        searchDeviceList();
    }
}

function searchDeviceList() {
    var status = $('.select-status').val();
    var search_key = $('#searchtxt').val();
    var idx = parseInt($('#company_selection').val());
    if (!idx){
        location.href = _server_url + 'admin/main/deviceList?status='
            + status + '&search_key=' + search_key + '&lang=' + lang_status;
    } else {
        location.href = _server_url + 'admin/main/deviceList?id='+ idx +'&status='
            + status + '&search_key=' + search_key + '&lang=' + lang_status;
    }
}

function addNewDevice() {
    location.href = _server_url + 'admin/main/addDevice?lang=' + lang_status;
}
</script>