<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header border-0 align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1"><?php echo $menu[6];?></h4>
                
            </div>

            <div class="card-body p-30">
                <form id="form_profile" enctype="multipart/form-data">
                    
                    <div class="form-group row">
                        <div class="col-lg-3 col-xs-3 text-lg-right">
                            <label class="col-form-label"> <?php echo $admin[1];?> </label>
                        </div>
                        <div class="col-lg-6 col-xs-9">
                            <input type="text" id="admin_username"
                                    placeholder=""
                                    value="<?php echo $user_data['admin_username'];?>"
                                    class="form-control" name="admin_username">
                        </div>
                        <div class="col-lg-5 push-xl-3">
                            <span class="error-msg error-username"><?php echo $error_admin[0];?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-3 col-xs-3 text-lg-right"> <?php echo $admin[2];?></div>
                        <div class="col-lg-6 col-xs-9">
                            <input type="password" class="form-control" id="admin_password"
                                    value=""
                                    placeholder="" name="admin_password">
                        </div>
                        <div class="col-lg-5 push-xl-3">
                            <span class="error-msg error-password"><?php echo $error_admin[1];?></span>
                        </div>
                    </div>
                    <div class="form-actions form-group row" style="margin-top: 40px;">
                        <div class="col-lg-3 col-xs-3 text-lg-right"></div>
                        <div class="col-lg-3 col-xs-5">
                            <input type="button" value="<?php echo $admin[5];?>" class="btn btn-primary" onclick="adminAdd();" style="width: 100%">
                        </div>
                        <div class="col-lg-3 col-xs-4">
                            <input type="button" value="<?php echo $admin[6];?>" class="btn btn-dark" onclick="Redirect();" style="width: 100%">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="card">
            <div class="card-header border-0 align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1"><?php echo $lang_setting[0];?></h4>
            </div>
            <div class="card-body p-30">
                <div class="table-responsive table-card">
                    <table class="table table-centered align-middle table-nowrap mb-0 table-hover">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col"><?php echo $lang_setting[1];?></th>
                                <th scope="col"><?php echo $lang_setting[2];?></th>
                                <th scope="col"><?php echo $lang_setting[3];?></th>
                                <th scope="col"><?php echo $lang_setting[4];?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $idx = 1;
                            foreach($lang_data as $item) {
                               
                                $verify_arr = array($lang_setting[6], $lang_setting[5]);

                                $misverify = 0;
                                if ($item['status'] == 0) $misverify = 1;
                                ?>
                                <tr>
                                    <td scope="row"><?=$idx++;?></td>
                                    <td id=""><?php echo $item['name'];?></td>
                                    <td id=""><?php echo $item['code'];?></td>
                                    <td id=""><?php echo $verify_arr[$item['status']];?></td>
                                    <td nowrap>
                                        <a href="#" onclick="operation(<?php echo $item['id'];?>, <?php echo $misverify; ?>);"><?=$verify_arr[$misverify];?></a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#menu li').removeClass('active');
        $('#admin_menu').addClass('active');
    });
function Redirect() {
    location.href =_server_url + 'admin/main/index?lang=' + lang_status;
}

function adminAdd() {
    var admin_username = $("#admin_username").val();
    var admin_password = $("#admin_password").val();

    if (validateForm()) {
         var formData = new FormData();
            formData.append('admin_username', $('#admin_username').val());
            formData.append('admin_password', $('#admin_password').val());
        $('.preloader').show(); 
        $.ajax({
            type: "POST",
            url: _server_url + 'admin/Data/AddAdmin',
            success: function (data, textStatus, jqXHR) {
                $('.preloader').hide(); 
                var res = JSON.parse(data);                        
                if (res.status === 'SUCCESS') {

                    Swal.fire({
                        title: "<?php echo $success;?>",
                        text: "<?php echo $alert_content[10];?>",
                        icon: "success",
                        customClass: {
                            confirmButton: "btn btn-primary w-xs me-2 mt-2",
                        },
                        buttonsStyling: !1,
                        showCloseButton: !0
                    }).then(function() {
                        location.href =_server_url + 'admin/main/adminList?lang=' + lang_status;
                    });
                }  
            },
            error: function (jqXHR, textStatus, errorThrown) {
                message('danger', textStatus + ': ' + errorThrown);
            },
            async: true,
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        });
    }
}

function operation(id, status) {
    $('.preloader').show(); 
    $.post(_server_url + 'admin/Data/languageUpdate', {'id': id, 'status': status},
        function (data) {
            $('.preloader').hide(); 
            if(data !== "FAIL") {
                location.href =_server_url + 'admin/main/adminList?lang=' + lang_status;
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
}

function validateForm() {
    if(!$("#admin_username").val()) {
        $('span.error-username').show();
        return false
    }

    if(!$("#admin_password").val()) {
        $('span.error-password').show();
        return false
    }

    return true;
}
</script>
