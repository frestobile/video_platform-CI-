<script src="https://code.iconify.design/1/1.0.5/iconify.min.js"></script>
<link href="https://vjs.zencdn.net/7.19.2/video-js.css" rel="stylesheet" type="text/css" />
<script src="https://vjs.zencdn.net/7.19.2/video.min.js"></script>

<!-- <style>
	.badge:empty {
		display: block;
		width: 35px;
		height: 17px;
	}
	.badge:empty.bg-success-subtle {
		background-color: #2dcb73 !important;
	}

	.badge:empty.bg-danger-subtle {
		background-color: #f85b5b !important;
	}

	.badge:empty.bg-warning-subtle {
		background-color: #f6bf5e !important;
	}
</style> -->
<div class="table-responsive" id="dt_table" style="margin: -1.2rem -1.2rem;">

	<table class="table table-centered align-middle table-nowrap mb-0 table-hover">
		<thead class="table-light">
		<tr>
			<th scope="col">ID</th>
			<th scope="col"><?php echo $video_table[41];?></th>
			<th scope="col"><?php echo $video_table[1];?></th>
			<th scope="col"><?php echo $video_table[16];?></th>
			<th scope="col"><?php echo $video_table[4];?></th>
			<th scope="col"><?php echo $video_table[3];?></th>
			<th scope="col"><?php echo $video_table[2];?></th>
			<th scope="col"><?php echo $video_table[18];?></th>
			<th scope="col" width="5%"><?php echo $video_table[7];?></th>
		</tr>
		</thead>
		<tbody>
		<?php 
		$idx = 1;
		foreach($video_list as $item){?>
			<tr>
				<input type="hidden" id="video_url<?php echo $item['video_id'];?>" value="<?php echo $item['video_url'];?>">
				<?php if($item['video_is_show'] > 1){?>
					<input type="hidden" id="video_serial<?php echo $item['video_id'];?>" value="<?php echo $item['video_serial'];?>" data-value="<?php echo $item['video_is_show'];?>">
				<?php }?>
				<input type="hidden" id="link_sent<?php echo $item['video_id'];?>" value="<?php if ($item['video_sent_time']!=null) echo date('d.m.Y H:i:s', strtotime($item['video_sent_time'])); else echo '';?>">
				<input type="hidden" id="link_sent_second_time<?php echo $item['video_id'];?>" value="<?php if ($item['video_sent_second_time']!=null) echo date('d.m.Y H:i:s', strtotime($item['video_sent_second_time'])); else echo '';?>">
				<input type="hidden" id="deviceID<?php echo $item['video_id'];?>" value="<?php echo $item['deviceid'];?>">
				<input type="hidden" id="customer_id<?php echo $item['video_id'];?>" value="<?php echo $item['video_customer_id'];?>">
				<input type="hidden" id="upload_time<?php echo $item['video_id'];?>" value="<?php echo date('d.m.Y H:i:s', strtotime($item['video_upload_time']?? ''));?>">
				<input type="hidden" id="tech_name<?php echo $item['video_id'];?>" value="<?php echo $item['video_tech_name'];?>">
				<input type="hidden" id="sms_count<?php echo $item['video_id'];?>" value="<?php echo $item['sms_time'];?>">

				<td scope="row">
					<?php if($item['company_removed'] != 1 && $item['user_removed'] != 1){ ?>
						
						<a href="javascript:void(0);" onclick="viewVideo(this, <?php echo $item['video_id'];?>);" style="color: #438eff; ">#<?php echo $item['video_id'];?></a>
					<?php } ?>
				</td>
				<td scope="row" style="padding: 5px; width: 100px">
					<?php if($item['video_uploaded'] < 2) {
						$image = "../../uploads/company_img/".$result['preview_image'];
					?>
					<img src="<?php echo $image;?>" alt="<?php echo $video_table[41];?>" width="100" height="70">
					
					<?php } else { ?>
						<div class="img_container" onclick="viewVideo(this, <?php echo $item['video_id'];?>);">
							<img src="<?php echo base_url().'uploads/videos/'.$item['video_serial'].'.jpg';?>" alt="<?php echo $video_table[41];?>" width="100" height="70">
							<div class="middle">
								<img src="<?=base_url()?>assets/images/play.png" alt="play button" width="20" height="20">
							</div>
						</div>
					
					<?php } ?>
				</td>

				<td nowrap id="car_number<?php echo $item['video_id'];?>"><?php echo $item['video_case_number'];?></td>

				<?php if ($item['user_removed'] == 1) { ?>
					<td nowrap >********</td>
				<?php } else { ?>
					<td nowrap id="user_phone<?php echo $item['video_id'];?>"><?php echo $item['customer_phone'];?></td>
				<?php } ?>

				<?php if ($item['user_removed'] == 1) { ?>
					<td nowrap >*************</td>
				<?php } else { ?>
					<td nowrap id="client_email<?php echo $item['video_id'];?>"><?php echo $item['customer_email'];?></td>
				<?php } ?>
				
				<?php if ($item['user_removed'] == 1) { ?>
					<td nowrap >********</td>
				<?php } else { ?>
					<td nowrap id="client_name<?php echo $item['video_id'];?>"><?php echo $item['customer_name'];?></td>
				<?php } ?>

				<?php if ($item['user_removed'] == 1) { ?>
					<td nowrap >************</td>
				<?php } else { ?>
					<td nowrap id="company<?php echo $item['video_id'];?>">
						<?php
						if ($item['video_customer_company']==null){
							echo $item['customer_company'];
						} else {
							echo $item['video_customer_company'];
						}?>
					</td>
				<?php } ?>
				
				
				<td nowrap id="created_time<?php echo $item['video_id'];?>"><?php echo date('d.m.Y H:i:s', strtotime($item['video_created_time']));?></td>
				<td nowrap id="status<?php echo $item['video_id'];?>">
					<input type="hidden" id="video_status<?php echo $item['video_id'];?>" value="<?php echo $item['video_is_show'];?>">
					<input type="hidden" id="upload_status<?php echo $item['video_id'];?>" value="<?php echo $item['video_uploaded'];?>">
					<?php
					if($item['company_removed'] == 1){
						echo '<span class="badge text-success bg-success-subtle" title="'.$video_table[22].'">'.$video_table[22].'</span>';
					}else if ($item['video_is_show'] == 0) {
						if ($item['video_uploaded'] == 1 || $item['video_uploaded'] == 2) {
							echo '<span class="badge text-warning bg-warning-subtle" title="'.$video_table[24].'">
                                    <span style="font-size: 15px"><span class="iconify" data-icon="ion-ios-timer" data-inline="false"></span></span>'.$video_table[24].'
                                </span>';
						} else {
							
								  echo '<span class="badge text-warning bg-warning-subtle" id="title_changed'.$item['video_id'].'" title="'.$video_table[20].'">'.$video_table[20].'</span>';
						}
					} else if ($item['video_is_show'] == 1) {
						echo '<span class="badge text-danger bg-danger-subtle" title="'.$video_table[21].'">'.$video_table[21].'</span>';
					} else {
						if ($item['user_removed'] == 1) {
							echo '<span class="badge text-success bg-success-subtle" title="'.$video_table[27].'">
                                    <span style="font-size: 15px"><span class="iconify" data-icon="dashicons:lock" data-inline="false"></span></span>'.$video_table[27].'
                                </span>';
						} else {
							// echo '<a href="javascript:void(0);" class="status_box" title="'.$video_table[22].'">
                            //         <div class="enable-status"></div>
                            //      </a>';
							echo '<span class="badge text-success bg-success-subtle" title="'.$video_table[22].'">'.$video_table[22].'</span>';
						}
						
					}?>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</div>
<div class="custom_modal" id="video_preview">
	<div class="card">
		<div class="card-header">
			<span type="button" class="close" style="float: right;" data-dismiss="modal">&times;</span>
			<span id="modal_title" style="font-size: 24px;color: #43425D; float: left;"><?php echo $modal_head[0];?></span>&nbsp;&nbsp;
		</div>
		<div class="card-block">
			<div class="row" style="padding: 0 20px 20px">
				<div class="col-lg-8 m-t-10 col-xs-12">
					<div id="video_element">
						<video id="modal_video" class="video-js vjs-big-play-centered vjs-default-skin" controls preload="auto" width="640" height="360" data-setup='{ "aspectRatio":"1280:720", "playbackRates": [1, 1.5, 2] }'>
							<source src="" type="video/mp4" />
						</video>
					</div>
					<div id="video_log"></div>
					<div id="linksent_log"></div>
					<div id="company_logo">
						<?php if($result['company_image']) {?>
							<?php $image = "../../uploads/company_img/".$result['company_image'];?>
							<img src="<?php echo $image;?>" id="company_image" alt="<?php echo $modal_head[0];?>">
						<?php }?>
					</div>

					<div id="send_option">
						<div class="row m-t-10">
							<div class="col-sm-4 video-detail">
								<span style="font-size: 20px;color: #43425D;"><?php echo $video_table[32];?>:</span>
							</div>
						</div>
						<div class="row m-t-10">
							<div class="col-sm-4 video-detail" style="margin-left: 25px;">
								<span><?php echo $video_table[16];?>:</span>
							</div>
							<div class="col-sm-6 col-xs-6">
								<input type="text" class="fcs" id="link_phone" style="width: 60%; border: none; border-bottom: 1px solid #d1d1d1; line-height:10px">
								<input type="checkbox" id="checkbox_phone" name="checkbox_phone" value="phone" style="margin-left: 10px" onclick="handleClick(this);">
  								<span id="sms_count" style="margin-left: 7px; font-weight: 500;">(2)</span>
							</div>
						</div>
						<div class="row m-t-10">
							<div class="col-sm-4 video-detail" style="margin-left: 25px;">
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
								<span style="color: red; margin-left:22px;"><?php echo $video_table[35];?></span>
							</div>
							<div class="col-sm-2"></div>
						</div>
						<div class="row m-t-30" style="margin-left: 16px;">
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
							<div class="col-sm-6" style="margin-left: 22px;">
								<span id="activate_status" style="padding: 8px 0;"><?php echo $video_table[38];?></span>
							</div>
						</div>

						<div class="row" style="margin-left: 16px;">
							<div class="col-sm-4">
							</div>
							<div class="col-sm-6">
								<a href="javascript:void(0);" class="btn btn-success" style="display: none; width:70%;" id="activate_btn" onclick="activate_video();">
									<?php echo $video_table[36];?>
								</a><br>
								<span id="activate_desc" style="display: none;"><?php echo $video_table[37];?></span>
							</div>
							<div class="col-sm-2"></div>
						</div>

						<div class="row" style="margin-left: 16px;">
							<div class="col-sm-4">
								<button class="btn btn-primary" onclick="back();"><?php echo $video_table[29];?></button>
							</div>
						</div>

					</div>

					<span id="video_link"><span id="link_address"></span></span>
					<span id="back_btn" style="margin-top: 25px;">
						<button class="btn btn-primary" onclick="back();"><?php echo $video_table[29];?></button>
					</span>
				</div>
				<div class="col-lg-4 m-t-10 col-xs-12">
					<div class="row m-t-10">
						<div class="col-sm-4 col-xs-4 video-detail">
							<span>ID:</span>
						</div>
						<div class="col-sm-8 col-xs-8">
							<span id="video-id"></span>
						</div>
					</div>
					<div class="row m-t-10">
						<div class="col-sm-4 col-xs-4 video-detail">
							<span><?php echo $video_table[1];?>:</span>
						</div>
						<div class="col-sm-8 col-xs-8">
							<input type="text" class="fcs" id="car_number" style="width: 80%; border: none; border-bottom: 1px solid #d1d1d1; line-height:10px" readonly>
							<span class="mdi mdi-pencil-box-outline" onclick="edit_field(this);" id="edit_car" style="font-size: 20px; margin: -5px 0 0 10px;"></span>
						</div>
					</div>

					<div class="row m-t-10">
						<div class="col-sm-4 col-xs-4 video-detail">
							<span><?php echo $video_table[16];?>:</span>
						</div>
						<div class="col-sm-8 col-xs-8">
							<input type="text" class="fcs" id="phone_number" style="width: 80%; border: none; border-bottom: 1px solid #d1d1d1; line-height:10px" readonly>
							<input type="hidden" name="customer_id" id="customer_id" value="">
							<span class="mdi mdi-pencil-box-outline" onclick="edit_field(this);" id="edit_phone_number" style="font-size: 20px; margin: -5px 0 0 10px;"></span>
						</div>
					</div>

					<div class="row m-t-10">
						<div class="col-sm-4 col-xs-4 video-detail">
							<span><?php echo $video_table[4];?>:</span>
						</div>
						<div class="col-sm-8 col-xs-8">
							<input type="text" class="fcs" id="client_email" style="width: 80%; border: none; border-bottom: 1px solid #d1d1d1; line-height:10px" readonly>
							<span class="mdi mdi-pencil-box-outline" onclick="edit_field(this);" id="edit_email" style="font-size: 20px; margin: -5px 0 0 10px;"></span>
						</div>
					</div>

					<div class="row m-t-10">
						<div class="col-sm-4 col-xs-4 video-detail">
							<span><?php echo $video_table[3];?>:</span>
						</div>
						<div class="col-sm-8 col-xs-8">
							<input type="text" class="fcs" id="client_name" style="width: 80%; border: none; border-bottom: 1px solid #d1d1d1; line-height:10px" readonly>
							<span class="mdi mdi-pencil-box-outline" onclick="edit_field(this);" id="edit_name" style="font-size: 20px; margin: -5px 0 0 10px;"></span>
						</div>
					</div>

					<div class="row m-t-10">
						<div class="col-sm-4 col-xs-4 video-detail">
							<span><?php echo $video_table[2];?>:</span>
						</div>
						<div class="col-sm-8 col-xs-8">
							<input type="text" class="fcs" id="company" style="width: 80%;border: none; border-bottom: 1px solid #d1d1d1;line-height:10px" readonly>
							<span class="mdi mdi-pencil-box-outline" onclick="edit_field(this);" id="edit_company" style="font-size: 20px; margin: -5px 0 0 10px;"></span>
						</div>
					</div>

					<div class="row m-t-10">
						<div class="col-sm-4 col-xs-4 video-detail">
							<span><?php echo $video_table[5];?>:</span>
						</div>
						<div class="col-sm-8 col-xs-8">
							<input type="text" class="fcs" id="video_tech_name" style="width: 80%; border: none; border-bottom: 1px solid #d1d1d1; line-height:10px" readonly>
							<span class="mdi mdi-pencil-box-outline" onclick="edit_field(this);" id="tech_name123" style="font-size: 20px; margin: -5px 0 0 10px;"></span>
							<span id="tech_name" style="visibility: hidden; height: 0"></span>
						</div>
					</div>

					<div class="row" style="margin-top: 0">
						<div class="col-sm-4 col-xs-4 video-detail">
							<span><?php echo $video_table[18];?>:</span>
						</div>
						<div class="col-sm-8 col-xs-8">
							<span id="created_time"></span>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-4 col-xs-4 video-detail">
							<span><?php echo $video_table[6];?>:</span>
						</div>
						<div class="col-sm-8 col-xs-8">
							<span id="upload_time"></span>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-4 col-xs-4 video-detail">
							<span><?php echo $video_table[11];?>:</span>
						</div>
						<div class="col-sm-5 col-xs-5">
							<span id="link_sent"></span>
						</div>
						<div class="col-sm-3 col-xs-3" >
							<span id="link_log" class="btn btn-primary btn-sm" style="cursor: pointer;" onclick="view_link_logs();">Log</span>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-4 col-xs-4 video-detail">
							<span><?php echo $video_table[28];?>:</span>
						</div>
						<div class="col-sm-8 col-xs-8">
							<span id="views_num" style="cursor: pointer; text-decoration: underline; color: #438eff;" onclick="view_logs();"></span>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-4 col-xs-4 video-detail" style="align-content: center;">
							<span><?php echo $video_table[7];?>:</span>
						</div>
						<div class="col-sm-8 col-xs-8" style="display: inline-flex;line-height: 30px;">
							<!-- <a href="javascript:void(0);" title="" id="state" style="width: 35px; height: 20px; display: block;border-radius: 5px">
								<div id="disp_status" style="font-size:15px; color:black; text-align:center; display: none">
									<span class="iconify" data-icon="ion-ios-timer" data-inline="false"></span>
								</div>
							</a>
							<span id="status-disp" style="margin-left: 10px; display: none;"></span> -->
							<div id="state"></div>
						</div>
					</div>
					<div class="row m-t-30">
						<button class="btn video_btn btn-danger" id="delete_btn" onclick="deleteVideo()"><?php echo $video_table[13];?></button>
					</div>
					<div class="row m-t-10">
						<a href="javascript:void(0);" class="btn video_btn btn-success" id="send_btn" onclick="send_link()"><?php echo $video_table[14];?></a>
					</div>
					<div class="row m-t-10">
						<button class="btn video_btn btn-primary" id="ok_btn" onclick="video_operation()"><?php echo $video_table[15];?></button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--add new video modal-->
<div class="custom_modal" id="new_video_modal">
	<form id="new_video" action="<?php echo base_url('manager/addNewVideo?lang='. $head_lang)?>" method="post">
		<div class="card">
			<div class="card-header">
				<span type="button" style="float: right;" class="close" data-dismiss="modal">&times;</span>
				<span style="font-size: 24px;color: #43425D; flaot: left;"><?php echo $modal_head[2];?></span>
			</div>
			<div class="card-block">
				<div class="container" style="padding: 0 10%">
					<input type="hidden" id="customer_id_new" name="customer">
					<div class="row m-t-30">
						<div class="col-sm-3 col-xs-3">
							<span class="span_txt"><?php echo $video_table[1];?>:</span>
						</div>
						<div class="col-sm-8 col-xs-8">
							<input class="dataSectionC" id="customer_car" name="car" type="text" required>
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
							<input class="dataSectionC" id="customer_phone" name="phone" type="tel" required>
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
							<input class="dataSectionC" id="customer_email" name="email" type="email" >
						</div>
					</div>

					<div class="row m-t-15">
						<div class="col-sm-3 col-xs-3">
							<span class="span_txt"><?php echo $video_table[3];?>:</span>
						</div>
						<div class="col-sm-8 col-xs-8">
							<input class="dataSectionC" id="customer_name" name="name" type="text" >
						</div>
					</div>

					<div class="row m-t-15">
						<div class="col-sm-3 col-xs-3">
							<span class="span_txt"><?php echo $video_table[2];?>:</span>
						</div>
						<div class="col-sm-8 col-xs-8">
							<input class="dataSectionC" id="customer_company" name="company" type="text">
						</div>
					</div>

					<div class="row m-t-35 m-b-20">
						<div class="col-sm-3"></div>
						<div class="col-sm-4 col-xs-6">
							<input type="button" value="<?php echo $video_table[17];?>" class="btn btn-primary style="width: 150px" onclick="saveNewVideo();">
						</div>
						<div class="col-sm-4 col-xs-6">
							<input type="button" value="<?php echo $video_table[19];?>" class="btn btn-dark" style="width: 150px" onclick="close_view_modal();">
						</div>
					</div>
				</div>
			</div>
			<!-- <div class="card-footer" style="border-radius: 0 0 15px 15px;border-top: 0;"></div> -->
		</div>
	</form>
</div>

<script type="text/javascript">
	var video_id;
	var video_status;
	var upload_status;
	var playerInstance = jwplayer("video_element");
	var views;
	var show_logs = true;
	var show_link_log = true;
	var show_send_option = true;
	var base_url = '<?php echo base_url();?>';

	function viewVideo(obj, idx) {
		video_id = idx;
		$(".preloader").show();
        $(".preloader img").show();
		$.post(_server_url + 'manager/getCountLog', {'video_id': video_id, 'lang': lang_status},
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

		$('#video_log').css('display', 'none');
		$('#linksent_log').css('display', 'none');
		$('#back_btn').css('display', 'none');
		$('#send_option').css('display', 'none');
		
		var video_serial = $("#video_serial"+idx).val();
		var car_number = (document.getElementById('car_number'+idx)).innerHTML.trim();
		var company = (document.getElementById('company'+idx)).innerHTML.trim();
		var client_name = (document.getElementById('client_name'+idx)).innerHTML.trim();
		var client_email = (document.getElementById('client_email'+idx)).innerHTML.trim();
		var customer_id = $('#customer_id'+idx).val();

		var tech_name = $("#tech_name"+idx).val();
		var created_time = (document.getElementById('created_time'+idx)).innerHTML.trim();
		var upload_time = $('#upload_time'+idx).val();
		var link_sent_time = $("#link_sent"+idx).val();
		var link_sent_second_time = $("#link_sent_second_time"+idx).val();
		video_status = $("#video_status"+idx).val();
		upload_status = $("#upload_status" + idx).val();
		var video_url = $("#video_url"+idx).val();
		var sms_count = $("#sms_count"+idx).val();
		
		var preview_url = _server_url+"client/"+video_serial+"?lang=ee";
		var phone_number = $('#user_phone'+idx).html().trim();
		document.getElementById("tech_name").innerHTML = tech_name;
		document.getElementById("created_time").innerHTML = created_time;

		$("#video-id").html(video_id);
		$("#car_number").val(car_number);
		$("#client_name").val(client_name);
		$("#client_email").val(client_email);
		$("#phone_number").val(phone_number);
		$("#customer_id").val(customer_id);
		$("#company").val(company);
		// $("#video_status").val(video_status);
		$("#video_tech_name").val(tech_name);
		$('#modal_title').html(car_number);
		$("#link_phone").val(phone_number);
		$("#link_email").val(client_email);
		
		$('#status-disp').html('');
		document.getElementById("sms_count").innerHTML = "("+ sms_count +")  <?php echo $video_table[34];?>";

		if (sms_count == 0) {
			document.getElementById("checkbox_phone").disabled = true;
		} else {
			document.getElementById("checkbox_phone").disabled = false;
		}


		if (link_sent_time){
			document.getElementById("link_sent").innerHTML = link_sent_time;
		} else {
			document.getElementById("link_sent").innerHTML = "";
			// $('#link_log').css('display', 'none');
		}

		if (parseInt(video_status) !== 0){
			var player = videojs('modal_video', {
				autoplay: true,
				controls: true,
				fluid: true
			});
			var videoLink = base_url + 'uploads/videos/' + video_url;
			player.src(videoLink);

			// playerInstance.setup({
			// 	playlist: [{
			// 		image:"https://content.jwplatform.com/thumbs/" + video_url + "-1280.jpg",
			// 		sources: [{
			// 			file:"https://cdn.jwplayer.com/videos/" + video_url + "-ONDbyjfZ.mp4",
			// 			label: "720p",
            //             "default": "true"

			// 		}],
			// 		tracks: [{
			// 			file: "https://cdn.jwplayer.com/strips/" + video_url + "-120.vtt",
			// 			kind: "thumbnails"
			// 		}]
			// 	}]
			// });
		}

		if (parseInt(video_status) === 0){ // YELLOW JOB

			// document.getElementById("state").style.backgroundColor = "#f6bf5e";
			document.getElementById("upload_time").innerHTML = "";
			if (parseInt(upload_status) === 1 || parseInt(upload_status) === 2) {
				var vi_state = '<span class="badge text-warning bg-warning-subtle" title="<?=$video_table[24];?>">' +
                                    '<span style="font-size: 15px">' + 
                                    '<span class="iconify" data-icon="ion-ios-timer" data-inline="false"></span></span>'+ "<?=$video_table[24];?>" +'</span>';
                $("#state").html(vi_state);
			} else {
				var vi_state = '<span class="badge text-warning bg-warning-subtle" title="<?=$video_table[20];?>">'+ "<?=$video_table[20];?>" +'</span>'
                $("#state").html(vi_state);
			}

			$('#video_link').css('display', 'none');
			$('#send_btn').css('display','none');
			$('#ok_btn').css('display','block');
			$('#link_log').css('display','none');
			$('#delete_btn').css('display','block');
			document.getElementById("send_btn").disabled = true;
			document.getElementById("delete_btn").disabled = false;
			$('#video_element').css('display','none');
			$('#company_logo').css('display','block');

		} else if (parseInt(video_status) === 1){ // RED JOB
			document.getElementById("upload_time").innerHTML = upload_time;
            var vi_state = '<span class="badge text-danger bg-danger-subtle" title="<?=$video_table[21];?>">'+ "<?=$video_table[21];?>" +'</span>'
                $("#state").html(vi_state);
			$('#video_link').css('display', 'none');
			// $('#video_source').css('display','block');
			$('#send_btn').css('display','block');
			$('#delete_btn').css('display','block');
			$('#ok_btn').css('display','block');
			$('#link_address').css('display','none');
			// document.getElementById("link_address").innerHTML="<a target='_BLANK' href='" + preview_url +"'>"+ preview_url +"</a>";
			document.getElementById("send_btn").disabled = false;
			document.getElementById("delete_btn").disabled = false;
			// $("#disp_status").css('display', 'none');
			$('#company_logo').css('display','none');
			$('#link_log').css('display','none');
			$('#activate_status').css('display', 'none');
			$('#activate_desc').css('display', 'block');
			$('#activate_btn').css('display', 'block');
		} else { // GREEN JOB
			document.getElementById("upload_time").innerHTML = upload_time;
			var vi_state = '<span class="badge text-success bg-success-subtle" title="<?=$video_table[22];?>">'+ "<?=$video_table[22];?>" +'</span>'
                $("#state").html(vi_state);
			$('#video_link').css('display', 'block');
			$('#link_address').css('display','block')
			$('#send_btn').css('display','block');
			$('#ok_btn').css('display','block');
			$('#delete_btn').css('display','none');
			$('#company_logo').css('display','none');
			$("#disp_status").css('display', 'none');
			$('#activate_status').css('display', 'block');
			document.getElementById("link_address").innerHTML="<?php echo $video_table[12];?>: <a target='_BLANK' href='" + preview_url +"'>"+ preview_url +"</a>";

			if (link_sent_time) {
				document.getElementById("delete_btn").disabled = false;
				document.getElementById("send_btn").disabled = false;
			}

			if (link_sent_second_time) {
				document.getElementById("delete_btn").disabled = false;
				document.getElementById("send_btn").disabled = true;
				// $('#send_btn').css('display','none');
			}
		}
	}

	function addNewVideo(obj, idx) {
		$('#modal_back').css('display', 'block');
		$('#new_video_modal').css('display', 'block');

		var car_number = $("#car_number"+idx).html().trim();
		var company = $("#company"+idx).html().trim();
		var client_name = $("#client_name"+idx).html().trim();
		var client_email = $("#client_email"+idx).html().trim();
		var phone_number = $("#user_phone"+idx).html().trim();
		var customer_id = $("#customer_id"+idx).val();

		$("#customer_name").val(client_name);
		$("#customer_email").val(client_email);
		$("#customer_phone").val(phone_number);
		$("#customer_company").val(company);
		$("#customer_car").val(car_number);
		$("#customer_id_new").val(customer_id);
	}

	function saveNewVideo() {
		var car_number = $("#customer_car").val();
		$.post(_server_url + 'manager/caseCheck', {'car': car_number},
			function (data) {
				var response = JSON.parse(data);
				if(response.status !== "fail") {
					document.getElementById("new_video").submit();
				} else {
					$('span.error_case').show();
				}
			}
		);
	}

	function edit_field(obj) {
		$('.custom_modal input').addClass('fcs');
		$('.custom_modal input').attr('readonly', true);
		if(obj.id === 'edit_email') {
			$('#client_email').removeClass('fcs');
			document.getElementById('client_email').removeAttribute('readonly');
			$("#client_email").focus();
		} else if (obj.id === 'edit_name') {
			$('#client_name').removeClass('fcs');
			document.getElementById('client_name').removeAttribute('readonly');
			$("#client_name").focus();
		} else if (obj.id === 'edit_car') {
			$('#car_number').removeClass('fcs');
			document.getElementById('car_number').removeAttribute('readonly');
			$("#car_number").focus();
		} else if (obj.id === 'edit_company') {
			$('#company').removeClass('fcs');
			document.getElementById('company').removeAttribute('readonly');
			$("#company").focus();
		}else if (obj.id === 'edit_phone_number') {
			$('#phone_number').removeClass('fcs');
			document.getElementById('phone_number').removeAttribute('readonly');
			$("#phone_number").focus();
		}else if (obj.id === 'tech_name123') {
			$('#video_tech_name').removeClass('fcs');
			document.getElementById('video_tech_name').removeAttribute('readonly');
			$("#video_tech_name").focus();
		}
	}

	function deleteVideo() {
		close_view_modal();
		swal({
			title: "<?php echo $warning;?>",
			text: "<?php echo $alert_content[17];?>",
			icon: "warning",
			buttons: ["<?php echo $determine[0];?>", "<?php echo $determine[1];?>"],
		})
			.then(function(value) {
				if (value) {
                    $(".preloader").show();
                    $(".preloader img").show();
					if (parseInt(upload_status) === 0 || parseInt(upload_status) === 1){
						$.post(_server_url + 'manager/delete_video', {'video_id': video_id},
							function (data) {
                                $(".preloader").hide();
                                $(".preloader img").hide();
								var response = JSON.parse(data);
								if(response.status !== "fail") {
									page_refresh();
								} else {
									swal("<?php echo $failed;?>", "<?php echo $alert_content[6];?>", "warning");
								}
							}
						);
					} else {
						$.post(_server_url + 'backend/video_delete', {'video_key': $("#video_url"+video_id).val()},
							function (data) {
									$.post(_server_url + 'manager/delete_video', {'video_id': video_id},
										function (data) {
                                            $(".preloader").hide();
                                            $(".preloader img").hide();
											var response = JSON.parse(data);
											if(response.status !== "fail") {
												page_refresh();
											} else {
												swal("<?php echo $failed;?>", "<?php echo $alert_content[6];?>", "warning");
											}
										}
									);

							}
						);
					}

				}
			});
	}

	function video_operation() {
	    close_view_modal();
        $(".preloader").show();
        $(".preloader img").show();
		$.post(_server_url + 'manager/edit_video_active',{
				'video_id': video_id,
				'company': $("#company").val(),
				'car_number': $("#car_number").val(),
				'name': $("#client_name").val(),
				'email': $("#client_email").val(),
				'phone_number': $("#phone_number").val(),
				'customer_id': $("#customer_id").val(),
				'video_tech_name': $("#video_tech_name").val(),
			},
			function (data) {
				$(".preloader").hide();
        		$(".preloader img").hide();
				var response = JSON.parse(data);
				if(response.status !== "fail"){
					// page_refresh();
					// window.location.reload();
					var show_logs = true;
					var show_link_log = true;
					var show_send_option = true;
					document.getElementById('car_number' + video_id).innerHTML = $("#car_number").val();
					document.getElementById('company' + video_id).innerHTML = $("#company").val();
					document.getElementById('client_name' + video_id).innerHTML = $("#client_name").val();
					document.getElementById('client_email' + video_id).innerHTML = $("#client_email").val();
					document.getElementById('user_phone' + video_id).innerHTML = $("#phone_number").val();
				}else{
					swal("<?php echo $failed;?>", "<?php echo $alert_content[6];?>", "warning");
					// swal({
					// 	title: "Failed！",
					// 	text: "Something Went Wrong!",
					// 	icon: "warning",
					// });
				}
			});
	}

	function send_link() {
		show_link_log = true;
		show_logs = true;
		$("#link_phone").val($("#phone_number").val());
		$("#link_email").val($("#client_email").val());
		if (show_send_option == true) {
			$('#send_option').css('display', 'block');
			$('#linksent_log').css('display', 'none');
			$('#video_log').css('display', 'none');
			$('#video_element').css('display','none');
			$('#company_logo').css('display','none');
			$('#video_link').css('display', 'none');
			$('#back_btn').css('display', 'none');
			show_send_option = false;
			$('#send_btn').css('display','none');
		} else {
			$('#send_option').css('display', 'block');
			$('#linksent_log').css('display', 'none');
			$('#video_log').css('display', 'none');
			$('#video_element').css('display','none');
			$('#company_logo').css('display','none');
			$('#video_link').css('display', 'none');
			$('#back_btn').css('display', 'none');
			show_send_option = false;
			$('#send_btn').css('display','none');
		}
	}

	function handleClick(cb) {
		$('#option_error').css('display', 'none');
	}

	function activate_video() {
		close_view_modal();
        $(".preloader").show();
		$(".preloader img").show();
		$.post(_server_url + 'manager/activate', {'video_id': video_id},
			function (data) {
				$(".preloader").hide();
				$(".preloader img").hide();
				var response = JSON.parse(data);
				if(response.status !== "fail") {
					swal({
						title: "<?php echo $success;?>",
						text: "<?php echo $alert_content[21];?>",
						icon: "success"
					}).then(function() {
						window.location.reload();
					});
				} else {
					swal("<?php echo $failed;?>", "<?php echo $alert_content[6];?>", "warning");
				}
			}
		);
	}

	function send_video_link() {
		var phone = $('#link_phone').val();	
		var email = $('#link_email').val();	
		var phone_option = 0;
		var email_option = 0;
		if (document.getElementById("checkbox_phone").checked == true) {
			phone_option = 1;
		}
		if (document.getElementById("checkbox_email").checked == true) {
			email_option = 1;
		}
		if (phone_option == 0 && email_option == 0 ) {
			$('#option_error').css('display', 'block');
		} else if ((phone_option == 1 && phone === "") || (email_option == 1 && email === "")) {
			$('#option_error').css('display', 'block');
		} else {
			close_view_modal();
			$(".preloader").show();
			$(".preloader img").show();
			$.post(_server_url + 'manager/send_video', 
			{
				'video_id': video_id,
				'phone': phone,
				'email': email,
				'phone_state': phone_option,
				'email_state': email_option
			},
			function (data) {
				$(".preloader").hide();
				$(".preloader img").hide();
				var response = JSON.parse(data);
				if(response.status !== "fail") {
					swal({
						title: "<?php echo $success;?>",
						text: "<?php echo $alert_content[18];?>",
						icon: "success"
					}).then(function() {
						// page_refresh();
						window.location.reload();
					});

				} else {
					swal("<?php echo $failed;?>", "<?php echo $alert_content[6];?>", "warning");
				}
			});
		}		
	}

	function view_link_logs() {
		$('#send_btn').css('display','block');
		show_send_option = true;
		show_logs = true;
		if (show_link_log == true) {
			$('#linksent_log').css('display', 'block');
			$('#send_option').css('display', 'none');
			$('#video_log').css('display', 'none');
			$('#video_element').css('display','none');
			$('#company_logo').css('display','none');
			$('#video_link').css('display', 'none');
			$('#back_btn').css('display', 'block');
			show_link_log = false;
			
		} else {
			$('#linksent_log').css('display', 'none');
			$('#send_option').css('display', 'none');
			$('#video_log').css('display', 'none');
			$('#video_element').css('display','block');
			$('#company_logo').css('display','none');
			$('#video_link').css('display', 'block');
			$('#back_btn').css('display', 'none');
			show_link_log = true;
		}
		
	}

	function view_logs() {
		$('#send_btn').css('display','block');
		show_send_option = true;
		show_link_log = true;
		if (parseInt(views) == 0) {
			alert("No Views!");
		} else {
			if (show_logs == true) {
				$('#video_log').css('display', 'block');
				$('#linksent_log').css('display', 'none');
				$('#send_option').css('display', 'none');
				$('#video_element').css('display','none');
				$('#company_logo').css('display','none');
				$('#video_link').css('display', 'none');
				$('#back_btn').css('display', 'block');
				show_logs = false;
				
			} else {
				$('#video_log').css('display', 'none');
				$('#send_option').css('display', 'none');
				$('#linksent_log').css('display', 'none');
				$('#video_element').css('display','block');
				$('#company_logo').css('display','none');
				$('#video_link').css('display', 'block');
				$('#back_btn').css('display', 'none');
				show_logs = true;
			}
		}
	}

	function back() {
		if(show_logs == false) {
			$('#video_log').css('display', 'none');
			$('#video_element').css('display','block');
			$('#company_logo').css('display','none');
			$('#video_link').css('display', 'block');
			$('#back_btn').css('display', 'none');
			show_logs = true;
			$('#send_btn').css('display','block');
		} 
		if(show_link_log == false) {
			$('#linksent_log').css('display', 'none');
			$('#video_log').css('display', 'none');
			$('#video_element').css('display','block');
			$('#company_logo').css('display','none');
			$('#video_link').css('display', 'block');
			$('#back_btn').css('display', 'none');
			show_link_log = true;
			$('#send_btn').css('display','block');
		}
		if (show_send_option == false) {
			$('#send_option').css('display', 'none');
			$('#linksent_log').css('display', 'none');
			$('#video_log').css('display', 'none');
			$('#video_element').css('display','block');
			$('#company_logo').css('display','none');
			$('#video_link').css('display', 'block');
			$('#back_btn').css('display', 'none');
			show_send_option = true;
			$('#send_btn').css('display','block');
		}
	}

	$('.close').on('click', function () {
		playerInstance.pause();
		close_view_modal();
		var show_logs = true;
		var show_link_log = true;
		var show_send_option = true;
        // page_refresh();
	});

	$('#car_number, #company, #client_name, #client_email, #phone_number, #video_tech_name').on('change',function(){
		$.post(_server_url + 'manager/edit_video_active',{
			'video_id': video_id,
			'company': $("#company").val(),
			'car_number': $("#car_number").val(),
			'name': $("#client_name").val(),
			'email': $("#client_email").val(),
			'phone_number': $("#phone_number").val(),
			'customer_id': $("#customer_id").val(),
			'video_tech_name': $("#video_tech_name").val(),
		},
		function (data) {
				var response = JSON.parse(data);
				if(response.status !== "fail"){
					document.getElementById('car_number' + video_id).innerHTML = $("#car_number").val();
					document.getElementById('company' + video_id).innerHTML = $("#company").val();
					document.getElementById('client_name' + video_id).innerHTML = $("#client_name").val();
					document.getElementById('client_email' + video_id).innerHTML = $("#client_email").val();
					document.getElementById('user_phone' + video_id).innerHTML = $("#phone_number").val();
				}else{
					
				}
			});
	});

</script>

<style>
	input[readonly] {background-color: transparent;}
	.custom_modal input.fcs:focus{outline:none;border-color:inherit;}
	/* #dt_table .table th, .table td {padding:  0.20rem} */
	/* .enable-status { background-color: #26cc70; width: 40px; height: 40px;} */
</style>
