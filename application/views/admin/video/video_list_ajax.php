<script src="https://code.iconify.design/1/1.0.5/iconify.min.js"></script>
<link href="<?=base_url();?>assets/libs/videojs/video-js.min.css" rel="stylesheet" />
<script src="<?=base_url();?>assets/libs/videojs/video.min.js"></script>
<style type="text/css">
    input[readonly] {background-color: transparent;}
    .custom_modal input.fcs:focus{outline:none;border-color:inherit;}
</style>

<div class="table-responsive table-card">
    <table class="table table-centered align-middle table-nowrap mb-0 table-hover">
        <thead class="table-light">
        <tr>
            <th width="3%">ID</th>
            <th width="10%"><?php echo $backvideo_table[3];?></th>
            <th width="10%"><?php echo $video_table[16];?></th>
            <th width="10%"><?php echo $backvideo_table[6];?></th>
            <th width="10%"><?php echo $backvideo_table[5];?></th>
            <th width="15%"><?php echo $backvideo_table[1];?></th>
            <th nowrap width="15%"><?php echo $backvideo_table[11];?></th>
            <th width="5%"><?php echo $backvideo_table[9];?></th>
            <!-- <th width="5%"><?php echo $backvideo_table[12];?></th> -->
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($video_list as $item){
            $misverify = 0;
            if($item['video_is_show'] == 0) $misverify = 1; ?>
            <tr>
                <td>
                    <a href="javascript:void:(0);" onclick="checkVideo(this, <?php echo $item['video_id'];?>);" style="color: #438eff;">#<?php echo $item['video_id'];?></a>
                    
                </td>
                <td nowrap id="car_number<?php echo $item['video_id'];?>"><?php echo $item['video_case_number']; ?></td>
                <td nowrap id="phone<?php echo $item['video_id'];?>"><?php echo $item['customer_phone'];?></td>
                <td nowrap id="client_email<?php echo $item['video_id'];?>"><?php echo $item['customer_email']; ?></td>
                <td nowrap id="client_name<?php echo $item['video_id'];?>"><?php echo $item['customer_name']; ?></td>
                <td nowrap><?php echo $item['company_name'];?></td>
                <td nowrap id="created_time<?php echo $item['video_id'];?>"><?php echo date('d.m.Y H:i:s', strtotime($item['video_created_time']));?></td>
                <td nowrap id="status<?php echo $item['video_id'];?>">
                    <input type="hidden" id="video_status<?php echo $item['video_id'];?>" value="<?php echo $item['video_is_show'];?>">
                    <input type="hidden" id="upload_status<?php echo $item['video_id'];?>" value="<?php echo $item['video_uploaded'];?>">
                    <input type="hidden" id="user_removed<?php echo $item['video_id'];?>" value="<?php echo $item['user_removed'];?>">
					<?php
					if($item['company_removed'] == 1){
						echo '<span class="badge text-danger bg-danger-subtle" title="'.$video_table[22].'">'.$video_table[22].'</span>';
					}else if ($item['video_is_show'] == 0) {
						if ($item['video_uploaded'] > 0) {
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
                            echo '<span class="badge text-success bg-success-subtle" title="'.$video_table[22].'">'.$video_table[22].'</span>';
                        }

					}?>
                </td>

            </tr>
        <?php }?>
    </table>
</div>
<!--video preview modal-->
<div class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myExtraLargeModalLabel"></h5>
				<button type="button" class="btn-close close"></button>
			</div>

			<div class="modal-body" id="video_detail_content">
			</div>
			
		</div>
	</div>
</div>
<!--add new video modal-->
<div class="custom_modal" id="new_video_modal">
    <form id="new_video" action="<?php echo base_url('admin/main/addNewVideo?lang='. $head_lang)?>" method="post">
        <div class="card">
            <div class="card-header">
				<span type="button" style="float: right;" class="close" data-dismiss="modal">&times;</span>
                <span id="modal_title" style="font-size: 24px;color: #43425D;"><?php echo $modal_head[2];?></span>
            </div>
            <div class="card-block">
                <div class="container" style="padding: 0 10%">
                    <input type="hidden" id="customer_id" name="customer">
                    <input type="hidden" id="company_id" name="company_id" value="">

                    <div class="row m-t-30">
                        <div class="col-sm-3 col-xs-3">
                            <span class="span_txt"><?php echo $video_table[1];?>:</span>
                        </div>
                        <div class="col-sm-8 col-xs-8">
                            <input class="dataSectionC" id="customer_car" name="car" type="text" required>
                            <span class="error-msg error_case"><?php echo $error_case;?></span>
                        </div>
			<div class="col-sm-1 col-xs-1">
			    <span style="color:red; matin-left:-20px;">*</span>
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
			    <span style="color:red; matin-left:-20px;">*</span>
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
                        <div class="col-sm-3 hidden-xs"></div>
                        <div class="col-sm-4 col-xs-6">
                            <input type="button" value="<?php echo $video_table[17];?>" class="btn btn-primary" style="width: 150px" onclick="saveNewVideo();">
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <input type="button" value="<?php echo $video_table[19];?>" class="btn btn-dark" style="width: 150px" onclick="close_view_modal();">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer" style="border-radius: 0 0 15px 15px;border-top: 0;"></div>
        </div>
    </form>
</div>
<script type="text/javascript">

    var video_id;
    var video_status;
	var upload_status;
	// var user_removed;
    var views;
    var show_logs = true;
    var show_link_log = true;
    var show_send_option = true;
    var base_url = '<?php echo base_url();?>';

    function addNewVideo(obj, idx) {
        $('#modal_back').css('display', 'block');
        $('#new_video_modal').css('display', 'block');

        var car_number = $("#car_number"+idx).html().trim();
        var company = $("#company"+idx).val().trim();
        var client_name = $("#client_name"+idx).html().trim();
        var client_email = $("#client_email"+idx).html().trim();
        var phone_number = $("#phone"+idx).html().trim();
        var customer_id = $("#customer_id"+idx).val();
        var company_id = $("#company_id"+idx).val();

        $("#customer_name").val(client_name);
        $("#customer_email").val(client_email);
        $("#customer_phone").val(phone_number);
        $("#customer_company").val(company);
        $("#customer_car").val(car_number);
        $("#customer_id").val(customer_id);
        $("#company_id").val(company_id);
    }

    function saveNewVideo() {
        var car_number = $("#customer_car").val();
        $.post(_server_url + 'admin/main/caseCheck', {'car': car_number},
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
            $('#ncompany').removeClass('fcs');
            document.getElementById('ncompany').removeAttribute('readonly');
            $("#ncompany").focus();
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
        Swal.fire({
            title: "<?php echo $warning;?>",
            text: "<?php echo $alert_content[17];?>",
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
                
                    $.post(_server_url + 'admin/main/delete_video', {'video_id': video_id},
                        function (data) {
                            var response = JSON.parse(data);
                            if(response.status !== "fail") {
                                window.location.reload();
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
                        }
                    );
            } 
        });
    }

    function video_operation() {
        $.post(_server_url + 'admin/main/edit_video_active',{
                'video_id': video_id,
                'company': $("#ncompany").val(),
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
                    window.location.reload();
                }else{
                    Swal.fire({
                            title: "Failed！",
                            text: "Something Went Wrong!",
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
	
    $(function () {
        $('.close').on('click', function () {
            close_view_modal();
            $("#video_detail_content").empty();
        })
    });

    function send_link() {
        var user_removed = $('#user_removed').val();
        if (parseInt(user_removed) === 0) {
            show_link_log = true;
            show_logs = true;
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
            }
        } else {
            video_restore();
        }
		 
	}

    function handleClick(cb) {
		$('#option_error').css('display', 'none');
	}

	function activate_video() {
		close_view_modal();
        $(".preloader").show();
		$(".preloader img").show();
        
		$.post(_server_url + 'admin/main/activate', {'video_id': video_id},
			function (data) {
                $(".preloader").hide();
				$(".preloader img").hide();
				var response = JSON.parse(data);
				if(response.status !== "fail") {
                    Swal.fire({
                            title: "<?php echo $success;?>",
                            text: "<?php echo $alert_content[21];?>",
                            icon: "success",
                            customClass: {
                                confirmButton: "btn btn-primary w-xs me-2 mt-2",
                            },
                            buttonsStyling: !1,
                            showCloseButton: !0
                        })
                    .then(function(value) {
                        window.location.reload();
                    });
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
			}
		);
	}

    function sms_reset()
    {
        close_view_modal();
        $(".preloader").show();
		$(".preloader img").show();
        
		$.post(_server_url + 'admin/main/sms_reset', {'video_id': video_id},
			function (data) {
                $(".preloader").hide();
				$(".preloader img").hide();
				var response = JSON.parse(data);
				if(response.status !== "fail") {
                  
                    Swal.fire({
                            title: "<?php echo $success;?>",
                            text: "<?php echo $alert_content[22];?>",
                            icon: "success",
                            customClass: {
                                confirmButton: "btn btn-primary w-xs me-2 mt-2",
                            },
                            buttonsStyling: !1,
                            showCloseButton: !0
                        })
                    .then(function(value) {
                        window.location.reload();
                    });

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

		if (phone_option === 0 && email_option === 0 ) {
			$('#option_error').css('display', 'block');
		} else if ((phone_option == 1 && phone === "") || (email_option == 1 && email === "")) {
			$('#option_error').css('display', 'block');
		} else {
			close_view_modal();
			$(".preloader").show();
			$(".preloader img").show();
			$.post(_server_url + 'admin/main/send_video', 
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
					Swal.fire({
                            title: "<?php echo $success;?>",
                            text: "<?php echo $alert_content[18];?>",
                            icon: "success",
                            customClass: {
                                confirmButton: "btn btn-primary w-xs me-2 mt-2",
                            },
                            buttonsStyling: !1,
                            showCloseButton: !0
                        })
                    .then(function(value) {
                        window.location.reload();
                    });

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
	}

    function video_restore()
    {
        close_view_modal();
        $(".preloader").show();
		$(".preloader img").show();
        $.post(_server_url + 'admin/main/restore', {'video_id': video_id},
            function (data) {
                $(".preloader").hide();
				$(".preloader img").hide();
                var response = JSON.parse(data);
                if(response.status !== "fail") {
                    Swal.fire({
                            title: "<?php echo $success;?>",
                            text: "<?php echo $alert_content[19];?>",
                            icon: "success",
                            customClass: {
                                confirmButton: "btn btn-primary w-xs me-2 mt-2",
                            },
                            buttonsStyling: !1,
                            showCloseButton: !0
                        })
                    .then(function(value) {
                        window.location.reload();
                    });
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
            }
        );

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
                $('#linksent_log').css('display', 'none');
				$('#send_option').css('display', 'none');
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

    $('#car_number, #company, #client_name, #client_email, #phone_number, #video_tech_name, #ncompany').on('change',function(){
        $.post(_server_url + 'admin/main/edit_video_active',{
            'video_id': video_id,
            'company': $("#ncompany").val(),
            'car_number': $("#car_number").val(),
            'name': $("#client_name").val(),
            'email': $("#client_email").val(),
            'phone_number': $("#phone_number").val(),
            'customer_id': $("#customer_id").val(),
            'video_tech_name': $("#video_tech_name").val()
        });
    });

    setInterval(function(){
        if($('.bs-example-modal-xl:visible').length == 0){
            window.location.reload();
        }
    },120000);

    function checkVideo(obj, idx) {
		$(".preloader").show();
        $(".preloader img").show();
		$.ajax({
			type:"post",
			url:_server_url + 'manager/get_video_data',
			data:{ 
                "video_id": idx, 
                "lang": lang_status 
            },
			dataType:"json",
			success:function(resp) {
				$(".preloader").hide();
                $(".preloader img").hide();
                $("#video_detail_content").empty();
				$("#video_detail_content").html(resp.admin_content);
				$('.bs-example-modal-xl').modal('show');
			}
		});
	}

</script>

