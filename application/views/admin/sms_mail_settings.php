<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-11 col-xs-10">
                        <h4 class="nav_top_align"><i class="fa fa-file-movie-o"></i>&nbsp;&nbsp;<?php echo $sms_mail_settings;?></h4>
                    </div>
                    
                </div>
            </div>
            <div class="card-body">
                <form id="setting_form" name="setting_form" action="" method="post">
                    <div class="form-group row">
                        <div class="col-lg-3  text-lg-right">
                            <label class="col-form-label"><?php echo lang("from_mail"); ?> </label>
                        </div>
                        <div class="col-lg-5">
                            <input class="form-control" name="config[from_mail]" id="from_mail"
                                    value="<?php if(isset($config_data['from_mail'])) echo $config_data['from_mail']; else echo '';?>" placeholder="" type="email" required>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-lg-3  text-lg-right">
                            <label class="col-form-label"><?php echo lang("from_name"); ?> </label>
                        </div>
                        <div class="col-lg-5">
                            <input class="form-control" name="config[from_mail_name]" id="from_mail_name"
                                    value="<?php if(isset($config_data['from_mail_name'])) echo $config_data['from_mail_name']; else echo '';?>"
                                    placeholder="" type="text" required>
                        </div>
                        <div class="col-lg-5 push-xl-3">
                            <span class="error-msg error-device"></span>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-lg-3  text-lg-right">
                            <label class="col-form-label"><?php echo lang("mail_subject"); ?> </label>
                        </div>
                        <div class="col-lg-5">
                            <input class="form-control" name="config[mail_subject]" id="mail_subject"
                                    value="<?php if(isset($config_data['mail_subject'])) echo $config_data['mail_subject']; else echo '';?>"
                                    placeholder="" type="text" required>
                        </div>
                        <div class="col-lg-5 push-xl-3">
                            <span class="error-msg error-device"></span>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-lg-3 text-lg-right">
                            <label class="col-form-label"><?php echo lang("mail_body"); ?> </label>
                        </div>
                        <div class="col-lg-5">
                            <textarea class="form-control" name="config[mail_body]" id="mail_body" rows="8" required><?php if(isset($config_data['mail_body'])) echo $config_data['mail_body']; else echo '';?></textarea>
                        </div>
                        <div class="col-lg-5 push-xl-3">
                            <span class="error-msg error-device"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-3 text-lg-right">
                            <label class="col-form-label"><?php echo lang("sms_sender_id"); ?> </label>
                        </div>
                        <div class="col-lg-5">
                            <input class="form-control" name="config[sms_sender_id]" id="sms_sender_id"
                                    value="<?php if(isset($config_data['sms_sender_id'])) echo $config_data['sms_sender_id']; else echo '';?>" placeholder="" type="text" required>
                        </div>
                        <div class="col-lg-5 push-xl-3">
                            <span class="error-msg error-device"></span>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-lg-3 text-lg-right">
                            <label class="col-form-label"><?php echo lang("sms_body"); ?> </label>
                        </div>
                        <div class="col-lg-5">
                            <textarea class="form-control" name="config[sms_body]" id="sms_body" rows="5" required><?php if(isset($config_data['sms_body'])) echo $config_data['sms_body']; else echo '';?></textarea>
                        </div>
                        <div class="col-lg-5 push-xl-3">
                            <span class="error-msg error-device"></span>
                        </div>
                    </div>
                    
                    <div class="form-actions form-group row" style="margin-top: 40px;">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-3">
                            <input type="submit" value="<?php echo lang("save"); ?>" class="btn btn-primary style="width: 150px">
                        </div>
                        <div class="col-lg-3">
                            <input type="button" value="<?php echo lang("cancel"); ?>" class="btn btn-dark" style="width: 150px" onclick="window.location.reload();">
                        </div>
                        <div class="col-lg-3"></div>
                    </div>

                    <hr>
                    
                    <p><strong>Note: </strong>You can use below variables in subject and body text.</p>
                    <p><strong>{{company}}</strong>: name of the company.</p>
                    <p><strong>{{client}}</strong>: name of the client.</p>
                    <p><strong>{{url}}</strong>: video url.</p>
                    <p><strong>{{car_number}}</strong>: Car Number.</p>
                </form>
                
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#menu li').removeClass('active');
    $('#sms_mail_settings').addClass('active');

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
                if(data !== "FAIL") {
                    swal({
                        title: "<?php echo $success;?>",
                        text: "<?php echo $alert_content[12];?>",
                        icon: "success",
                    })
                    .then(function(value) {
                        if (value) {
                            location.href = _server_url + 'admin/main/deviceList?lang=' + lang_status;
                        }
                    });
                }else {
                    swal("<?php echo $failed;?>", "<?php echo $alert_content[14];?>", "warning");
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
                        swal("<?php echo $failed;?>", "<?php echo $alert_content[6];?>", "warning");
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
                        swal("<?php echo $failed;?>", "<?php echo $alert_content[14];?>", "warning");
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