<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-11 col-xs-10">
                        <h4 class="nav_top_align"><i class="fa fa-file-movie-o"></i>&nbsp;&nbsp;<?php echo $device_title;?></h4>
                    </div>
                </div>
            </div>
            <input type="hidden" id="device_id"  value="<?php if(isset($device_data['device_id'])) echo $device_data['device_id']; else echo '';?>">
            <div class="card-body">
                <form id="form_profile">
                    <div class="form-group row">
                        <div class="col-lg-3  text-lg-right">
                            <label class="col-form-label"><?php echo $devices[0]?> </label>
                        </div>
                        <div class="col-lg-6">
                            <input class="form-control" id="device_name"
                                    value="<?php if(isset($device_data['device_name'])) echo $device_data['device_name']; else echo '';?>"
                                    placeholder="<?php echo $error_device[0];?>" type="text">
                        </div>
                        <div class="col-lg-4 push-xl-3">
                            <span class="error-msg error-device"><?php echo $error_device[0];?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-3 text-lg-right">
                            <label class="col-form-label"><?php echo $devices[1]?> </label>
                        </div>
                        <div class="col-lg-6">
                            <input class="form-control" id="device-id"
                                    value="<?php if(isset($device_data['deviceid'])) echo $device_data['deviceid']; else echo '';?>"
                                    placeholder="<?php echo $error_device[1];?>" type="text">
                        </div>
                        <input type="hidden" id="compare_id" value="<?php if(isset($device_data['deviceid'])) echo $device_data['deviceid']; else echo '';?>">
                        <div class="col-lg-4 push-xl-3">
                            <span class="error-msg error-id"><?php echo $error_device[1];?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-3 text-lg-right">
                            <label class="col-form-label"><?php echo $devices[2]?></label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" value="<?php if(isset($device_data['device_password'])) echo $device_data['device_password']; else echo '';?>" id="device_password" placeholder="<?php echo $error_device[2];?>">
                        </div>
                        <div class="col-lg-4 push-xl-3">
                            <span class="error-msg error-pass"><?php echo $error_device[2];?></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-3 text-lg-right">
                            <label class="col-form-label"><?php echo $devices[3]?> </label>
                        </div>
                        <div class="col-lg-6">
                            <input class="form-control" type="text" id="device_serial"
                                    value="<?php if(isset($device_data['device_serial_number'])) echo $device_data['device_serial_number']; else echo '';?>"
                                    placeholder="<?php echo $error_device[3];?>">
                        </div>
                        <div class="col-lg-4 push-xl-3">
                            <span class="error-msg error-serial"><?php echo $error_device[3];?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-3 text-lg-right">
                            <label class="col-form-label"><?php echo $devices[4]?> </label>
                        </div>
                        <div class="col-lg-6">
                            <select class="select-lg form-control select-company" id="company_select">
                                <?php if ($device_data == null) { ?>
                                    <option value="0" selected="selected"><?php echo $search[3];?></option>
                                    <?php foreach ($company_list as $item) { ?>
                                        <option value=" <?php echo $item['company_id'];?>"><?php echo $item['company_name'];?></option>
                                        <?php
                                    }
                                } else { ?>
                                    <option value="<?php echo $device_data['device_company_id']; ?>"
                                            selected="selected"><?php echo $device_data['company_name']; ?></option>
                                    <?php foreach ($company_list as $item) {
                                        if ($item['company_id'] != $device_data['device_company_id']) { ?>
                                            <option value="<?php echo $item['company_id']; ?>"><?php echo $item['company_name']; ?></option>
                                            <?php
                                        }
                                    }
                                }?>
                            </select>
                        </div>
                        <div class="col-lg-4 push-xl-3">
                            <span class="error-msg error-select"><?php echo $error_device[4];?></span>
                        </div>
                    </div>

                    <div class="form-actions form-group row" style="margin-top: 40px;">
                        <div class="col-lg-3 hidden-xs text-lg-right"></div>
                        <div class="col-lg-3 col-xs-6">
                            <input type="button" value="<?php echo $devices[6]?>" class="btn btn-primary" onclick="deviceAdd();" style="width: 100%">
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <input type="button" value="<?php echo $devices[5]?>" class="btn btn-dark" onclick="deviceListRedirect();" style="width: 100%">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#menu li').removeClass('active');
    $('#add_device_menu').addClass('active');
    $("#device").addClass('active');

    $('#add_device_menu').removeClass('collapsed');

    $("#sidebarDevice").addClass('show');


    $("#device_name").focus (function () {
        $('span.error-device').hide();
    });
    $("#device-id").focus (function () {
        $('span.error-id').hide();
    });
    $("#device_password").focus (function () {
        $('span.error-pass').hide();
    });
    $("#device_serial").focus (function () {
        $('span.error-serial').hide();
    });
    $("#company_select").focus (function () {
        $('span.error-select').hide();
    });
});

function deviceListRedirect() {
    location.href = _server_url + 'admin/main/deviceList?lang=' + lang_status;
}

function deviceAdd() {
    if (validateForm()) {
        if($('#device_id').val() === '') {
            $.post(_server_url + 'admin/Data/deviceAdd',{
                'device_name': $('#device_name').val(),
                'deviceID': $('#device-id').val(),
                'device_password': $('#device_password').val(),
                'device_serial_number': $('#device_serial').val(),
                'device_company_id': $('#company_select option:selected').val(),
            },
            function (data) {
                console.log(data);
                if(data !== "FAIL") {

                    Swal.fire({
                            title: "<?php echo $success;?>",
                            text: "<?php echo $alert_content[12];?>",
                            icon: "success",
                            customClass: {
                                confirmButton: "btn btn-primary w-xs me-2 mt-2",
                            },
                            buttonsStyling: !1,
                            showCloseButton: !0
                        })
                    .then(function(value) {
                        location.href = _server_url + 'admin/main/deviceList?lang=' + lang_status;
                    });
                }else {
                    Swal.fire({
                        title: "<?php echo $failed;?>",
                        text: "<?php echo $alert_content[14];?>",
                        icon: "warning",
                        customClass: {
                            confirmButton: "btn btn-primary w-xs me-2 mt-2",
                        },
                        buttonsStyling: !1,
                        showCloseButton: !0
                    });
                    
                }
            });
        }else{
            var compare_id = $("#compare_id").val();
            var edited_id = $("#device-id").val();

            if (compare_id === edited_id){
                $.post(_server_url + 'admin/Data/deviceUpdate',{
                    'device_id' : $('#device_id').val(),
                    'device_name': $('#device_name').val(),
                    'device_password': $('#device_password').val(),
                    'device_serial_number': $('#device_serial').val(),
                    'device_company_id': $('#company_select option:selected').val(),
                },
                function (data) {
                    if(data !== "FAIL") {
                        location.href = _server_url + 'admin/main/deviceList?lang=' + lang_status;
                    }else {
                        
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
            } else {
                $.post(_server_url + 'admin/Data/deviceUpdate',{
                    'device_id' : $('#device_id').val(),
                    'device_name':   $('#device_name').val(),
                    'deviceID': $('#device-id').val(),
                    'device_password': $('#device_password').val(),
                    'device_serial_number': $('#device_serial').val(),
                    'device_company_id': $('#company_select option:selected').val(),
                },
                function (data) {
                    if(data !== "FAIL") {
                        location.href = _server_url + 'admin/main/deviceList?lang=' + lang_status;
                    }else {
                       
                        Swal.fire({
                            title: "<?php echo $failed;?>",
                            text: "<?php echo $alert_content[14];?>",
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
        }
    }
}
function validateForm(){
    if(!$("#device_name").val()) {
        $('span.error-device').show();
        return false
    }
    if(!$("#device-id").val()) {
        $('span.error-id').show();
        return false
    }
    if(!$("#device_password").val()) {
        $('span.error-pass').show();
        return false
    }
    if(!$("#device_serial").val()) {
        $('span.error-serial').show();
        return false
    }
    if(parseInt($("#company_select").val()) == 0) {
        $('span.error-select').show();
        return false
    }
    return true;
}
</script>