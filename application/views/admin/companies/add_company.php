<?php //echo '<pre>'; print_r($company_data);?>
<div id="content" class="bg-container fixed_header_menu_conainer fixed_header_menu_page">
    <header class="head">
        <div class="main-bar">
            <div class="row">
                <div class="col-lg-5">
                    <h4 class="nav_top_align"><i class="fa fa-th"></i>&nbsp;&nbsp;<?php echo $title;?></h4>
                </div>
            </div>
        </div>
        <input type="hidden" id="company_id"
               value="<?php if(isset($company_data['company_id'])) echo $company_data['company_id']; else echo '';?>">
    </header>
    <div class="outer">
        <div class="inner bg-container">
            <div class="card">
                <div class="card-block" style="padding: 5rem;">
                    <form id="form_profile" enctype="multipart/form-data">
                        <div class="form-group row">
                            <div class="col-lg-3  text-lg-right">
                                <label class="col-form-label"><?php echo $company_content[0];?> </label>
                            </div>
                            <div class="col-lg-5">
                                <input type="text" id="company_name"
                                       placeholder="<?php echo $error_company[0];?>"
                                       value="<?php if(isset($company_data['company_name'])) echo $company_data['company_name']; else echo '';?>"
                                       class="form-control">
                            </div>
                            <div class="col-lg-5 push-xl-3">
                                <span class="error-msg error-company"><?php echo $error_company[0];?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-3 text-lg-right">
                                <?php echo $company_content[1];?>
                            </div>
                            <input type="hidden" id="compare_email" value="<?php if(isset($company_data['company_email'])) echo $company_data['company_email']; else echo '';?>">
                            <div class="col-lg-5">
                                
                                <input type="email" class="form-control" id="company_email"
                                       value="<?php if(isset($company_data['company_email'])) echo $company_data['company_email']; else echo '';?>"
                                       placeholder="<?php echo $error_company[1];?>">
                            </div>
                            <div class="col-lg-5 push-xl-3">
                                <span class="error-msg error-email"><?php echo $error_company[1];?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-3 text-lg-right">
                                <label class="col-form-label"><?php echo $company_content[2];?></label>
                            </div>
                            <div class="col-lg-5">
                                
                                <input type="password" class="form-control"
                                       id="company_password" value="<?php if(isset($company_data['company_pass'])) echo $company_data['company_pass']; else echo '';?>" placeholder="<?php echo $error_company[2];?>">
                            </div>
                            <div class="col-lg-5 push-xl-3">
                                <span class="error-msg error-password"><?php echo $error_company[2];?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-3 text-lg-right">
                                <label class="col-form-label"><?php echo $company_content[4];?> </label>
                            </div>
                            <div class="col-lg-5">
                                
                                <input type="tel" class="form-control" id="company_phone"
                                       value="<?php if(isset($company_data['company_phone'])) echo $company_data['company_phone']; else echo '';?>"
                                       placeholder="<?php echo $error_company[4];?>">

                            </div>
                            <div class="col-lg-5 push-xl-3">
                                <span class="error-msg error-phone"><?php echo $error_company[4];?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-3 text-lg-right">
                                <label class="col-form-label"><?php echo $company_content[3];?> </label>
                            </div>
                            <div class="col-lg-5">
                                
                                <input type="text" class="form-control" id="company_address"
                                       value="<?php if(isset($company_data['company_address'])) echo $company_data['company_address']; else echo '';?>"
                                       placeholder="<?php echo $error_company[3];?>">
                            </div>
                            <div class="col-lg-5 push-xl-3">
                                <span class="error-msg error-address"><?php echo $error_company[3];?></span>
                            </div>
                        </div>
                        <!-- new add start -->
                        <div class="form-group row">
                            <div class="col-lg-3 text-lg-right">
                                <label class="col-form-label"><?php echo $company_content[10];?> </label>
                            </div>
                            <div class="col-lg-5">
                               
                                <input type="text" class="form-control" id="sms_name"
                                       value="<?php if(isset($company_data['sms_sender'])) echo $company_data['sms_sender']; else echo '';?>"
                                       placeholder="<?php echo $error_company[6];?>">
                            </div>
                            <div class="col-lg-5 push-xl-3">
                                <span class="error-msg error-sms"><?php echo $error_company[6];?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-3 text-lg-right">
                                <label class="col-form-label"><?php echo $company_content[11];?> </label>
                            </div>
                            <div class="col-lg-5">
                               
                                <input type="text" class="form-control" id="email_name"
                                       value="<?php if(isset($company_data['email_sender'])) echo $company_data['email_sender']; else echo '';?>"
                                       placeholder="<?php echo $error_company[7];?>">
                            </div>
                            <div class="col-lg-5 push-xl-3">
                                <span class="error-msg error-semail"><?php echo $error_company[7];?></span>
                            </div>
                        </div>
                        <!-- new add ned  -->
                        <div class="form-group row">
                            <div class="col-lg-3 text-lg-right">
                                <label class="col-form-label"><?php echo $company_content[9];?> </label>
                            </div>
                            <div class="col-lg-5">
                              
                                <?php
                                $lang_arr = array(
                                    0 => $language[2],
                                    1 => $language[1],
                                );?>
                                <select class="select-lang form-select"  onchange="updateLang()">
                                    <?php if ($company_data == null) { ?>
                                        <option value="100" selected="selected"><?php echo $language[0]; ?></option>
                                        <?php
                                        for($idx = sizeof($lang_arr) - 1; $idx >= 0; $idx--){
                                            echo '<option value="'.$idx.'">'.$lang_arr[$idx].'</option>';
                                        }?>
                                        <?php
                                    } else {
                                        for($idx = sizeof($lang_arr) - 1; $idx >= 0; $idx--){
                                            if($company_data["company_lang"] == $idx)
                                                echo '<option value="'.$idx.'" selected="selected">'.$lang_arr[$idx].'</option>';
                                            else
                                                echo '<option value="'.$idx.'">'.$lang_arr[$idx].'</option>';
                                        }
                                    }?>
                                </select>
                            </div>
                            <div class="col-lg-5 push-xl-3">
                                <span class="error-msg error-lang"><?php echo $error_company[5];?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-3 text-lg-right">
                                <label class="col-form-label"><?php echo $company_content[7];?></label>
                            </div>
                            <?php
                            if ($company_data != ""){
                                $image = '';
                                if($company_data['company_picture']) $image = base_url()."uploads/company_img/".$company_data['company_picture'];
                                else $image = base_url()."public/img/pic_addfengmian.png";
                            } else {
                                $image = base_url()."public/img/pic_addfengmian.png";
                            }?>
                            <div class="col-lg-5">
                                <img id="upload-dialog" src="<?php echo $image;?>" alt="avatar" width="224" height="85">
                                <input style="display: none" id="image-file" accept="image/jpeg,image/png" onchange="company_image_upload(this)" type="file">
                            </div>
                            <div class="col-lg-5 push-xl-3">
                                <span class="error-msg error-image"><?php echo $alert_content[9];?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-3 text-lg-right">
                                <label class="col-form-label"><?php echo $company_content[13];?></label>
                            </div>
                            <?php
                            if ($company_data != ""){
                                $image1 = '';
                                if($company_data['preview_image']) $image1 = "../../uploads/company_img/".$company_data['preview_image'];
                                else $image1 = base_url()."assets/images/empty.png";
                            } else {
                                $image1 = base_url()."assets/images/empty.png";
                            }?>
                            <div class="col-lg-5">
                                <img id="preview-dialog" src="<?php echo $image1;?>" alt="preview" width="100" height="70">
                                <input style="display: none" id="preview-image-file" accept="image/jpeg,image/png" onchange="preview_image_upload(this)" type="file">
                            </div>
                            <div class="col-lg-5 push-xl-3">
                                <span class="error-msg error-image"><?php echo $alert_content[9];?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-3 text-lg-right">
                                <label class="col-form-label"><?php echo $company_content[12];?></label>
                            </div>
                            <?php
                            if ($company_data != ""){
                                $image1 = '';
                                if($company_data['favicon']) $image1 = "../../uploads/company_img/".$company_data['favicon'];
                                else $image1 = base_url()."assets/images/empty.png";
                            } else {
                                $image1 = base_url()."assets/images/empty.png";
                            }?>
                            <div class="col-lg-5">
                                <img id="favicon-dialog" src="<?php echo $image1;?>" alt="favicon" width="50" height="50">
                                <input style="display: none" id="favicon-image-file" accept="image/jpeg,image/png" onchange="favicon_image_upload(this)" type="file">
                            </div>
                            <div class="col-lg-5 push-xl-3">
                                <span class="error-msg error-image"><?php echo $alert_content[9];?></span>
                            </div>
                        </div>

                        <div class="form-actions form-group row" style="margin-top: 40px;">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-3">
                                <input type="button" value="<?php echo $company_content[6];?>" class="btn btn-primary" style="width: 150px" onclick="CompanyAdd();">
                            </div>
                            <div class="col-lg-3">
                                <input type="button" value="<?php echo $company_content[5];?>" class="btn btn-dark" style="width: 150px" onclick="companyListRedirect();">
                            </div>
                            <div class="col-lg-3"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
var company_image = null;
var preview_image = null;
var favicon_image = null;
var flag = false;

if ($('#company_id').val() !== ''){
    flag = true;
}

$(document).ready(function() {
    $('#menu li').removeClass('active');
    $('#add_company_menu').addClass('active');
    $("#company").addClass('active');

    $('#company').removeClass('collapsed');
    $("#sidebarCompany").addClass('show');

    $("#company_name").focus (function () {
        $('span.error-company').hide();
    });
    $("#company_email").focus (function () {
        $('span.error-email').hide();
    });
    $("#company_password").focus (function () {
        $('span.error-password').hide();
    });
    $("#company_address").focus (function () {
        $('span.error-address').hide();
    });
    $("#company_phone").focus (function () {
        $('span.error-phone').hide();
    });
    $("#sms-name").focus (function () {
        $('span.error-sms').hide();
    });
    $("#email-name").focus (function () {
        $('span.error-semail').hide();
    });
});
function updateLang() {
    $("span.error-lang").hide();
}

document.querySelector("#upload-dialog").addEventListener('click', function() {
    document.querySelector("#image-file").click();
});
document.querySelector("#preview-dialog").addEventListener('click', function() {
    document.querySelector("#preview-image-file").click();
});

function company_image_upload(input) {
    
    $('span.error-image').hide();
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#upload-dialog')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
        company_image = input.files[0];
        flag = true;
    }
}

function preview_image_upload(input) {
    
    $('span.error-image').hide();
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#preview-dialog')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
        preview_image = input.files[0];
        flag = true;
    }
}

function favicon_image_upload(input) {
    
    $('span.error-image').hide();
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#favicon-dialog')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
        favicon_image = input.files[0];
        flag = true;
    }
}

function companyListRedirect() {
    location.href =_server_url + 'admin/main/companyList?lang=' + lang_status;
}

function CompanyAdd() {
    var compare_email = $("#compare_email").val();
    var edited_email = $("#company_email").val();
    // var ss = $("#sms_name").val();
    // alert(ss);

    if (validateForm()) {
        if($('#company_id').val() === '') {
            var formData = new FormData();
            formData.append('image', company_image, company_image.filename);
            formData.append('preview', preview_image, preview_image.filename);
            formData.append('favicon', favicon_image, favicon_image.filename);

            formData.append('company_name', $('#company_name').val());
            formData.append('company_email', $('#company_email').val());
            formData.append('company_password', $('#company_password').val());
            formData.append('company_phone', $('#company_phone').val());
            formData.append('company_address', $('#company_address').val());
            formData.append('sms_sender', $('#sms_name').val());
            formData.append('email_sender', $('#email_name').val());
            formData.append('company_language', $('.select-lang').val());
            $('.preloader').show(); 
            $.ajax({
                type: "POST",
                url: _server_url + 'admin/Data/AddCompany',
                async: true,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data, textStatus, jqXHR) {
                    $('.preloader').hide(); 
                    var res = JSON.parse(data);                        
                    if (res.response === 'SUCCESS') {
                        Swal.fire({
                            title: "<?php echo $success;?>",
                            text: "<?php echo $alert_content[13];?>",
                            icon: "success",
                            customClass: {
                                confirmButton: "btn btn-primary w-xs me-2 mt-2",
                            },
                            buttonsStyling: !1,
                            showCloseButton: !0
                        }).then( function(t) {
                            location.href =_server_url + 'admin/main/companyList?lang=' + lang_status;
                        });
                    }else if(res.response === 'FAIL'){
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
                       
                    }else{
                        Swal.fire({
                            title: "<?php echo $failed;?>",
                            text: "<?php echo $alert_content[11];?>",
                            icon: "warning",
                            customClass: {
                                confirmButton: "btn btn-primary w-xs me-2 mt-2",
                            },
                            buttonsStyling: !1,
                            showCloseButton: !0
                        });
                         
                    }   
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    message('danger', textStatus + ': ' + errorThrown);
                }
                
            });
        }else{
            var formData = new FormData();
            if (company_image != null) {
                formData.append('image', company_image, company_image.filename);
            }
            if (preview_image != null) {
                // console.log(preview_image);
                formData.append('preview', preview_image, preview_image.filename);
            }

            if (preview_image != null) {
                // console.log(preview_image);
                formData.append('favicon', favicon_image, favicon_image.filename);
            }

            if (compare_email !== edited_email) {
                formData.append('company_email', $('#company_email').val());
            }
            formData.append('company_id', $('#company_id').val());
            formData.append('company_name', $('#company_name').val());
            formData.append('company_password', $('#company_password').val());
            formData.append('company_phone', $('#company_phone').val());
            formData.append('company_address', $('#company_address').val());
            formData.append('sms_sender', $('#sms_name').val());
            formData.append('email_sender', $('#email_name').val());
            formData.append('company_language', $('.select-lang').val());

            $('.preloader').show();  

            $.ajax({
                    type: "POST",
                    url: _server_url + 'admin/Data/companyUpdate',
                    success: function (data, textStatus, jqXHR) {
                        $('.preloader').hide();
                        var res = JSON.parse(data);
                        if (res.response === "SUCCESS") {
                            alert();
                            // location.href =_server_url + 'admin/main/companyList?lang=' + lang_status;
                        }
                        else {
                            
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
}

function validateForm() {
    if($("#company_name").val() == "") {
        $('span.error-company').show();
        return false
    }

    if($("#company_email").val() == "") {
        $('span.error-email').show();
        return false
    }

    <?php if(!isset($company_data['company_id'])){?>
    if($("#company_password").val() == "") {
        $('span.error-password').show();
        return false
    }
    <?php }?>

    if($("#company_phone").val() == "") {
        $('span.error-phone').show();
        return false
    }

    if($("#company_address").val() == "") {
        $('span.error-address').show();
        return false
    }

    if($('#sms-name').val() == "") {
        $('span.error-sms').show();
        return false
    }

    if($("#email-name").val() == "") {
        $('span.error-semail').show();
        return false
    }

    if($(".select-lang").val() == 100) {
        $('span.error-lang').show();
        return false
    }

    if (flag == false){
        $('span.error-image').show();
        return false
    }
    return true;
}
</script>