<link href="https://vjs.zencdn.net/7.19.2/video-js.css" rel="stylesheet" type="text/css" />

<script>
    var video_status = "<?php echo $video_data['video_is_show'];?>";
</script>
<style>
.readonly_input {
    width: 80%; border: none; border-bottom: 1px solid #d1d1d1; line-height:10px
}
#video_detail_content input.readonly_input:focus{outline:none;border-color:inherit;}
</style>
<div class="row" style="padding: 10px 20px;">
    <div class="col-sm-8 m-t-10">
        <?php if ($video_data['video_is_show'] == 0) {?>
            <div id="company_logo">
                <?php if($video_data['company_picture']) {?>
                    <?php $image = "../../uploads/company_img/".$video_data['company_picture'];?>
                    <img src="<?php echo $image;?>" id="company_image">
                <?php }?>
            </div>
        <?php } else {?>
            <div id="video_element">
                <video id="custom_player" class="video-js vjs-big-play-centered vjs-default-skin" controls preload="auto" data-setup='{ "aspectRatio":"1280:720" }' >
                    <source src="<?php echo base_url();?>uploads/videos/<?php echo $video_data['video_url'];?>" type="video/mp4" />
                </video>
            </div>
            <br>
        <?php } ?>

        <div id="video_log"></div>
        <div id="linksent_log"></div>

        <div id="send_option">
            <div class="row m-t-10">
                <div class="col-sm-4 video-detail">
                    <span style="font-size: 20px;color: #43425D;"><?php echo $video_table[32];?>:</span>
                </div>
            </div>
            <div class="row m-t-10">
                <div class="col-sm-4 video-detail">
                    <span><?php echo $video_table[16];?>:</span>
                </div>
                <div class="col-sm-6 col-xs-6">
                    <input type="text" class="fcs" id="link_phone" style="width: 60%; border: none; border-bottom: 1px solid #d1d1d1; line-height:10px">
                    <input type="checkbox" <?php if($video_data['sms_time'] == 0) echo "disabled";?> id="checkbox_phone" name="checkbox_phone" value="phone" style="margin-left: 10px" onclick="handleClick(this);">
                    <span id="sms_count" style="margin-left: 7px; font-weight: 500;">(2)</span>
                </div>
                <div class="col-sm-2">
                    <span class="btn btn-primary" id="reset_btn" style="cursor: pointer;" onclick="sms_reset();"><?php echo $video_table[40];?></span>
                </div>
            </div>
            <div class="row m-t-10">
                <div class="col-sm-4 video-detail">
                    <span><?php echo $video_table[4];?>:</span>
                </div>
                <div class="col-sm-6 col-xs-6">
                    <input type="text" class="fcs" id="link_email" style="width: 60%; border: none; border-bottom: 1px solid #d1d1d1; line-height:10px">
                    <input type="checkbox" id="checkbox_email" name="checkbox_email" value="email" style="margin-left: 10px" onclick="handleClick(this);">
                </div>
            </div>
            <div class="row" id="option_error" style="display: none;">
                <div class="col-sm-4"></div>
                <div class="col-sm-6">
                    <span style="color: red;"><?php echo $video_table[35];?></span>
                </div>
                <div class="col-sm-2"></div>
            </div>
            <div class="row m-t-30">
                <div class="col-sm-4"></div>
                <div class="col-sm-6">
                    <a href="javascript:void(0);" style="width:70%;" class="btn btn-success" id="link_send_btn" onclick="send_video_link();">
                        <?php echo $video_table[14];?>
                    </a>
                </div>
                <div class="col-sm-2"></div>
            </div>

            <!-- new function  -->
            <div class="row m-t-30">
                <div class="col-sm-4 video-detail">
                    <span style="font-size: 20px; color: #43425D;"><?php echo $video_table[36];?>:</span>
                </div>
                <div class="col-sm-6" style="padding: 8px 15px;">
                    <span id="activate_status" style="padding: 6px 0; display: <?php if($video_data['video_is_show'] == 2) echo "block;"; else echo "none;";?>"><?php echo $video_table[38];?></span>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-6">
                    <a href="javascript:void(0);" class="btn btn-success" style="display: <?php if($video_data['video_is_show'] == 1) echo "block;"; else echo "none;";?> width:70%;" id="activate_btn" onclick="activate_video();">
                        <?php echo $video_table[36];?>
                    </a><br>
                    <span id="activate_desc" style="display: <?php if($video_data['video_is_show'] == 1) echo "block;"; else echo "none;";?>"><?php echo $video_table[37];?></span>
                </div>
                <div class="col-sm-2"></div>
            </div>

            <div class="row" style="margin-left: 16px;">
                <div class="col-sm-4">
                    <button class="btn btn-primary" onclick="back();"><?php echo $video_table[29];?></button>
                </div>
            </div>
        </div>

        <?php if($video_data['video_is_show'] == 2) {?>
            <span id="video_link"><?php echo $video_table[12];?>: 
                <a target='_BLANK' href="<?php echo base_url();?>client/<?php echo $video_data['video_serial'];?>?lang=<?php echo $default_lang;?>">
                <?php echo base_url();?>client/<?php echo $video_data['video_serial'];?>?lang=<?php echo $default_lang;?>
                </a>
            </span>
        <?php } ?>

        <span id="back_btn"><button class="btn btn-primary" onclick="back();"><?php echo $video_table[29];?></button></span>
    </div>
    <div class="col-sm-4 m-t-10">
        <div class="row m-t-10">
            <div class="col-sm-4 col-xs-4 video-detail">
                <span>ID:</span>
            </div>
            <div class="col-sm-8 col-xs-8">
                <span id="video-id"><?php echo $video_data['video_id'];?></span>
            </div>
        </div>
        <div class="row m-t-10">
            <div class="col-sm-4 col-xs-4 video-detail">
                <span><?php echo $video_table[1];?>:</span>
            </div>
            <div class="col-sm-8 col-xs-8">
                <input type="text" class="fcs readonly_input" value="<?php echo $video_data['video_case_number'];?>" id="car_number" readonly>
                <span class="mdi mdi-pencil-box-outline" onclick="edit_field(this);" id="edit_car" style="font-size: 20px; margin: -5px 0 0 10px;"></span>
            </div>
        </div>

        <div class="row m-t-10">
            <div class="col-sm-4 col-xs-4 video-detail">
                <span><?php echo $video_table[16];?>:</span>
            </div>
            <div class="col-sm-8 col-xs-8">
                <input type="text" class="fcs readonly_input" id="phone_number" value="<?php echo $video_data['customer_phone'];?>" readonly>
                <input type="hidden" name="customer_id" id="customer_id" value="<?php echo $video_data['video_customer_id'];?>">
                <span class="mdi mdi-pencil-box-outline" onclick="edit_field(this);" id="edit_phone_number" style="font-size: 20px; margin: -5px 0 0 10px;"></span>
            </div>
        </div>

        <div class="row m-t-10">
            <div class="col-sm-4 col-xs-4 video-detail">
                <span><?php echo $video_table[4];?>:</span>
            </div>
            <div class="col-sm-8 col-xs-8">
                <input type="text" class="fcs readonly_input" id="client_email" value="<?php echo $video_data['customer_email'];?>" readonly>
                <span class="mdi mdi-pencil-box-outline" onclick="edit_field(this);" id="edit_email" style="font-size: 20px; margin: -5px 0 0 10px;"></span>
            </div>
        </div>

        <div class="row m-t-10">
            <div class="col-sm-4 col-xs-4 video-detail">
                <span><?php echo $video_table[3];?>:</span>
            </div>
            <div class="col-sm-8 col-xs-8">
                <input type="text" class="fcs readonly_input" id="client_name" value="<?php echo $video_data['customer_name'];?>" readonly>
                <span class="mdi mdi-pencil-box-outline" onclick="edit_field(this);" id="edit_name" style="font-size: 20px; margin: -5px 0 0 10px;"></span>
            </div>
        </div>

        <div class="row m-t-10">
            <div class="col-sm-4 col-xs-4 video-detail">
                <span><?php echo $video_table[2];?>:</span>
            </div>
            <div class="col-sm-8 col-xs-8">
                <input type="text" class="fcs readonly_input" id="ncompany" value="<?php echo $video_data['video_customer_company'];?>" readonly>
                <span class="mdi mdi-pencil-box-outline" onclick="edit_field(this);" id="edit_company" style="font-size: 20px; margin: -5px 0 0 10px;"></span>
            </div>
        </div>

        <div class="row m-t-10">
            <div class="col-sm-4 col-xs-4 video-detail">
                <span><?php echo $video_table[5];?>:</span>
            </div>
            <div class="col-sm-8 col-xs-8">
                <input type="text" class="fcs readonly_input" id="video_tech_name" value="<?php echo $video_data['video_tech_name'];?>" readonly>
                <span class="mdi mdi-pencil-box-outline" onclick="edit_field(this);" id="tech_name123" style="font-size: 20px; margin: -5px 0 0 10px;"></span>
                <span class="mdi mdi-pencil-box-outline" id="tech_name" style="visibility: hidden; height: 0"></span>
            </div>
        </div>

        <div class="row m-t-10">
            <div class="col-sm-4 col-xs-4 video-detail">
                <span><?php echo $video_table[23];?>:</span>
            </div>
            <div class="col-sm-8 col-xs-8">
                <span id="media_id"><?php echo $video_data['video_serial'];?></span>
            </div>
        </div>

        <div class="row m-t-10">
            <div class="col-sm-4 col-xs-4 video-detail">
                <span><?php echo $video_table[18];?>:</span>
            </div>
            <div class="col-sm-8 col-xs-8">
                <span id="created_time"><?php echo date('d.m.Y H:i', strtotime($video_data['video_created_time']));?></span>
            </div>
        </div>

        <div class="row m-t-10">
            <div class="col-sm-4 col-xs-4 video-detail">
                <span><?php echo $video_table[6];?>:</span>
            </div>
            <div class="col-sm-8 col-xs-8">
                <span id="upload_time"><?php echo $video_data['video_upload_time'] == null ? "" : date('d.m.Y H:i', strtotime($video_data['video_upload_time']));?></span>
            </div>
        </div>

        <div class="row m-t-10">
            <div class="col-sm-4 col-xs-4 video-detail">
                <span><?php echo $video_table[11];?>:</span>
            </div>
            <div class="col-sm-5 col-xs-5">
                <span id="link_sent"><?php echo $video_data['video_sent_time'] == null ? "" : date('d.m.Y H:i', strtotime($video_data['video_sent_time']));?></span>
            </div>
            <?php if($video_data['video_is_show'] != 0) {?>
            <div class="col-sm-3 col-xs-3" >
                <span id="link_log" class="btn btn-primary btn-sm" style="cursor: pointer;" onclick="view_link_logs();">Log</span>
            </div>
            <?php }?>
        </div>

        <div class="row m-t-10">
            <div class="col-sm-4 col-xs-4 video-detail">
                <span><?php echo $video_table[28];?>:</span>
            </div>
            <div class="col-sm-8 col-xs-8">
                <span id="views_num" style="cursor: pointer; text-decoration: underline; color: #438eff;" onclick="view_logs();"></span>
            </div>
        </div>

        <div class="row m-t-10">
            <div class="col-sm-4 col-xs-4 video-detail">
                <span><?php echo $video_table[7];?>:</span>
            </div>
            <div class="col-sm-8 col-xs-8" style="display: inline-flex;line-height: 20px;">
                <div id="state">
                <?php
					if($video_data['company_removed'] == 1){
						echo '<span class="badge text-danger bg-danger-subtle" title="'.$video_table[22].'">'.$video_table[22].'</span>';
					}else if ($video_data['video_is_show'] == 0) {
						if ($video_data['video_uploaded'] > 0) {
                            echo '<span class="badge text-warning bg-warning-subtle" title="'.$video_table[24].'">
                                    <span style="font-size: 15px"><span class="iconify" data-icon="ion-ios-timer" data-inline="false"></span></span>'.$video_table[24].'
                                </span>';
	
						} else {
							echo '<span class="badge text-warning bg-warning-subtle" id="title_changed'.$video_data['video_id'].'" title="'.$video_table[20].'">'.$video_table[20].'</span>';
						}

					} else if ($video_data['video_is_show'] == 1) {
						echo '<span class="badge text-danger bg-danger-subtle" title="'.$video_table[21].'">'.$video_table[21].'</span>';
					} else {
                        if ($video_data['user_removed'] == 1) {
                            echo '<span class="badge text-success bg-success-subtle" title="'.$video_table[27].'">
                                    <span style="font-size: 15px"><span class="iconify" data-icon="dashicons:lock" data-inline="false"></span></span>'.$video_table[27].'
                                </span>';
                        } else {
                            echo '<span class="badge text-success bg-success-subtle" title="'.$video_table[22].'">'.$video_table[22].'</span>';
                        }

					}?>
                </div>
            </div>
        </div>

        <div class="row m-t-10">
            <button class="btn video_btn btn-danger" id="delete_btn" onclick="deleteVideo()"><?php echo $video_table[13];?></button>
        </div>
        <input type="hidden" id="user_removed" value="<?php echo $video_data['user_removed'];?>">
        <?php if($video_data['video_is_show'] != 0) {?>
        <div class="row m-t-10">
            <a href="javascript:void(0);" class="btn video_btn btn-success" id="send_btn" onclick="send_link()">
            
            <?php if ($video_data['user_removed'] == 1) {
                echo $video_table[26];
            } else {
                echo $video_table[14];
            }
            
            ?>
        </a>
        </div>
        <?php }?>

        <div class="row m-t-10">
            <button class="btn video_btn btn-primary" id="ok_btn" onclick="video_operation()"><?php echo $video_table[15];?></button>
        </div>
    </div>
</div>

<script src="https://vjs.zencdn.net/7.19.2/video.min.js">
    if (video_status > 1) {
        const player = videojs('custom_player', {
            autoplay: true,
            controls: true,
            fluid: true
        });
    }
</script>
<script>
    var video_id = "<?php echo $video_data['video_id'];?>";
    $(document).ready(function () {
        $('#video_log').css('display', 'none');
		$('#linksent_log').css('display', 'none');
		$('#back_btn').css('display', 'none');
		$('#send_option').css('display', 'none');
        $("#modal_title").html("<?php echo $video_data['video_case_number'];?>");
        $.post(_server_url + 'admin/data/getCountLog', {'video_id': video_id, 'lang': lang_status},
            function (data) {
                    $(".preloader").hide();
                    $(".preloader img").hide();
                    $('#modal_back').css('display', 'block');
                    $('#video_preview').css('display', 'block');
                    var response = JSON.parse(data);
                    views = response.counts;
                    $('#views_num').html(views);
                    log_table_load(response.content);
                    linksent_logtable_load(response.log_content);
                }
            );
    });
    if (video_status > 1) {
        var player = videojs('custom_player', {
        controlBar: {
            pictureInPictureToggle: false
        }
        });
    }

</script>