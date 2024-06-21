<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-11 col-xs-10">
                        <h4 class="nav_top_align"><i class="bi bi-person-circle"></i>&nbsp;&nbsp;<?php echo $head_name;?></h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form id="form_profile">
                    <div class="form-group row">
                        <div class="col-lg-4  text-lg-right">
                            <label class="col-form-label"><?php echo $content[0];?> </label>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" id="cmy_name" value="<?php echo $result['company_name'];?>" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-4 text-lg-right">
                            <label class="col-form-label"><?php echo $content[2];?> </label>
                        </div>
                        <div class="col-lg-4">
                            <input class="form-control" id="cmyemail" value="<?php echo $result['company_email'];?>" type="email" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-4 text-lg-right">
                            <label class="col-form-label"><?php echo $content[1];?> </label>
                        </div>
                        <div class="col-lg-4">
                            <input class="form-control" id="cmyphone" value="<?php echo $result['company_phone'];?>" type="tel" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-4 text-lg-right">
                            <label class="col-form-label"><?php echo $content[7];?> </label>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" id="address" class="form-control" value="<?php echo $result['company_address'];?>" disabled>
                        </div>
                    </div>
                    <!-- new add start -->
                    <div class="form-group row">
                        <div class="col-lg-4 text-lg-right">
                            <label class="col-form-label"><?php echo $content[9];?> </label>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" id="sms_sender" class="form-control" value="<?php echo $result['sms_sender'];?>" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-4 text-lg-right">
                            <label class="col-form-label"><?php echo $content[10];?> </label>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" id="email_sender" class="form-control" value="<?php echo $result['email_sender'];?>" disabled>
                        </div>
                    </div>
                    <!-- new add end  -->
                    <div class="form-group row">
                        <div class="col-lg-4 text-lg-right">
                            <label class="col-form-label"><?php echo $content[8];?> </label>
                        </div>
                        <div class="col-lg-4">
                        <?php
                                $lang_arr = array(
                                    0=> $language[2],
                                    1=> $language[1],
                                );
                            ?>
                            <select class="update-lang" onchange="updateLang()">
                                <?php 
                                    for( $idx = sizeof($lang_arr) - 1; $idx >= 0; $idx--)
                                    {
                                        if($result["company_lang"] == $idx)
                                            echo '<option value="'.$idx.'" selected="selected">'.$lang_arr[$idx].'</option>';
                                        else
                                            echo '<option value="'.$idx.'">'.$lang_arr[$idx].'</option>';

                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-4 text-lg-right">
                            <label class="col-form-label"><?php echo $content[3];?></label>
                        </div>
                        <?php
                        $image = '';
                        if($result['company_image']) $image = "../../uploads/company_img/".$result['company_image'];
                        else $image = base_url()."assets/images/empty.png";
                        ?>
                        <div class="col-lg-4">
                            <img src="<?php echo $image;?>" alt="avatar" width="224" height="85">
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
    $('#profile_menu').addClass('active');
});

function updateLang(){
    $('.preloader').show();
    $.post(_server_url + 'manager/companyUpdate',{
        'company_id' : $('#company_id').val(),
        'lang': $('.update-lang').val()
    },
    function (data) {
        $('.preloader').hide();
        var res = JSON.parse(data);
        if(res.status === 'success') {
            if ($('.update-lang').val() == 1) {
                lang_status = 'en';
            } else {
                lang_status = 'ee';
            }
            // location.href =_server_url + 'manager/companyList?lang=' + lang_status;
            location.href =_server_url + 'manager/go_profile?id='+ company_id + '&lang=' + lang_status;
        }else {
            Swal.fire({title: "<?php echo $failed;?>", text: "<?php echo $alert_content[6];?>", icon: "warning"});
        }
    });
}


</script>



