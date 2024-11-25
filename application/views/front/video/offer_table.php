<style>
	.wrapped-text {
      word-wrap: break-word;
      overflow-wrap: break-word;
      white-space: normal;
    }

    table.dataTable td {
      table-layout: fixed;
      word-break: break-word;
    }
	.w-80 {
		width: 80px;
		height: 30px;
		display: inline;
		border-color: #eae8e8;
		pointer-events: none;
	}
	.w-80-non-editable {
		width: 80px;
		height: 30px;
		display: inline;
		border-color: #eae8e8;
		pointer-events: none;
	}
	.w-60 {
		width: 50px;
		height: 30px;
		display: inline;
		background-color:#eff2f7;
		border-color: #b9b9b9;
	}
</style>
<div id="offer_table">
	<div class="table-responsive" style="overflow-x: unset">
		<table class="table table-centered align-middle table-nowrap mb-0 table-hover" id="offer_dt">
			<thead class="table-light">
				<tr>
					<th scope="col"><?php echo $video_table[51];?></th>
				</tr>
			</thead>
			<tbody id="tableBody">
				<?php
					$idx = 1;
					foreach($offer_data as $item){  ?>
						<tr>
							<td style="border-color:#c9c9c9">						
								<input type="hidden" class="offer_id" value="<?php echo $item['id'];?>" />
								<div class="row">
									<div class="col-10">
										<p class="editable wrapped-text" data-name="description"><?php echo $item['description']; ?></p>
										<input type="text" class="form-control edit-input" style="border-color:rgb(185,185,185)" value="<?php echo $item['description']; ?>">
									</div>
									<div class="col-2">
										<div style="float:right">
											<span class="mdi mdi-delete-circle-outline delete-btn" style="font-size: 20px; margin: -5px 0 0 10px;"></span>
											<span class="mdi mdi-pencil-box-outline edit-btn" style="font-size: 20px; margin: -5px 0 0 10px;"></span>									
											<span class="mdi mdi-content-save-check save-btn" style="font-size: 20px; margin: -5px 0 0 10px; display:none"></span>									
										</div>
									</div>
								</div>

								<div style="margin-top: 5px;">
									<div style="float: right;" class="row">	
										<div class="col-4">
											<span style="font-weight: 700;"><?php echo $video_table[52];?>:</span>
											<input type="number" class="form-control edit-input quantity w-80"value="<?php echo $item['quantity'];?>">
										</div>
										<div class="col-4">
											<span style="font-weight: 700;"><?php echo $video_table[53];?>: </span>
											<input type="number" class="form-control edit-input price w-80" value="<?php echo $item['price']; ?>">
										</div>
										<div class="col-4">
											<span style="font-weight: 700;"><?php echo $video_table[54];?>: </span>
											<input type="number" class="form-control edit-input w-80-non-editable" value="<?php echo $item['price'] * $item['quantity']; ?>">
										</div>
									</div>
								</div>
							</td>
						</tr>
				<?php } ?>

			</tbody>
		</table>
		<button class="btn btn-success btn-circle add-btn" style="margin-top: -90px;margin-left: 10px;"><i class="mdi mdi-plus"></i></button>
	</div>
</div>

<div class="row" id="offer_board">
		<?php
		 $valid_date = isset($video_data['valid_date']) ? date('Y-m-d', strtotime($video_data['valid_date'])) : date('Y-m-d');
		 $create_date = isset($video_data['offer_time']) ? date('d.m.Y H:i:s', strtotime($video_data['offer_time'])) : date('d.m.Y H:i:s');
		 $update_date = isset($video_data['update_time']) ? date('d.m.Y H:i:s', strtotime($video_data['update_time'])) : date('d.m.Y H:i:s');
		?>
	<div class="col-sm-7">
		<div class="row">
			<div class="col-sm-6">
				<div><strong><?php echo $video_table[18];?> : </strong><span id="created_time"><?php echo $create_date;?></span></div>
				<div id="updated_label" style="display: <?php if($video_data['update_time'] != null) echo 'flex'; else echo 'none';?>">
					<strong><?php echo $video_table[43];?> : </strong>
					<span id="updated_time"><?php echo $update_date;?></span>
				</div>
			</div>
			<div class="col-sm-6">
				<strong><?php echo $video_table[47];?> :</strong>
				<input type="date" class="fcs" style="width: 50%; border: none; border-bottom: 1px solid #d1d1d1; line-height:15px;" value="<?php echo $valid_date;?>" id="offer_valied">				
			</div>
		</div>
		<div class="row">
			<div class="m-t-10">
				<button class="btn btn-primary" onclick="getBack();"><?php echo $video_table[29];?></button>
				<?php if($video_data['status'] == 2) {?>
				<span class="badge text-success bg-success-subtle" style="font-size:15px; margin-left:20px; padding: 0.45em 0.75em;"><?php echo $video_table[48];?></span> &nbsp;
				<span style="font-size:20px"><?php echo date('d.m.Y H:i:s', strtotime($video_data['accept_time']));?></span>
				<?php } else if ($video_data['status'] == 1) {?>
					<span class="badge text-warning bg-warning-subtle" style="font-size:15px; margin-left:20px; padding: 0.45em 0.75em;"><?php echo $video_table[49];?></span>
				<?php }?>
					</span>
			</div>
		</div>
	</div>
	<div class="col-sm-5">
		<?php
			$sum = 0;
			foreach ($offer_data as $item) {
				$sum += $item['price'] * $item['quantity'];
			}
		?>
		<table class="table table-bordered">
			<tbody style="background-color: #eff2f7; border-color: #fff;">
				<tr>
					<th style="padding-left:30px"><?php echo $video_table[54];?>:</th>
					<td><span id="sum_price"><?php echo $sum;?> &euro;</span></td>
				</tr>
				<tr>
					<th><span class="mdi mdi-pencil-box-outline" id="edit_vat_fee" style="font-size: 15px;"></span><span class="mdi mdi-content-save-check" id="save_vat_fee" style="font-size: 15px; display:none"></span><span style="margin-left:5px; margin-right:2px"><?php echo $video_table[55];?> </span><span id="vat-fee-display"><?php echo $video_data['vis_fee'];?></span><input id="vat-fee-edit" type="number" class="form-control edit-input price w-60" style="display: none" value="<?php echo $video_data['vis_fee']; ?>"><span>% :</span></th>
					<td><span id="vat_fee"><?php echo $sum * $video_data['vis_fee'] / 100;?> &euro;</span></td>
				</tr>
				<tr>
					<th style="padding-left:30px"><?php echo $video_table[56];?>:</th>
					<td><span id="total_price"><?php echo $sum * (1+$video_data['vis_fee'] / 100);?> &euro;</span></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>


<script >
	

	$(document).ready(function() {
		var isNew = false;
		var isEditing = false;
		let offer_status = '<?php echo $video_data['status'];?>';
		let v_id = $('#modal_video_id').val();

		if (offer_status !== "0") {
			$('#offer_board').css('display', 'flex');
		} else {
			$('#offer_board').css('display', 'none');
		}

		$(document).on('click', '#edit_vat_fee', function() {
			if (isEditing) {
				Swal.fire({
					title: "",
					text: "<?php echo $alert_content[23];?>",
					icon: "warning",
					customClass: {
						confirmButton: "btn btn-primary w-xs me-2 mt-2",
					},
					buttonsStyling: !1,
					showCloseButton: !0
				});
			} else {
				document.getElementById('vat-fee-display').style.display = 'none';
				document.getElementById('vat-fee-edit').style.display = 'inline-block';
				document.getElementById('edit_vat_fee').style.display = 'none';
				document.getElementById('save_vat_fee').style.display = 'inline-block';
				isEditing = true;
			}
		})

		$(document).on('click', '#save_vat_fee', function() {
			let vat_fee = document.getElementById('vat-fee-edit').value;
			$.post(_server_url + 'manager/offer_vat', 
			{
				'video_id': v_id,
				'vat_fee': vat_fee
			},
			function (data) {
				$(".preloader").hide();
				$(".preloader img").hide();
				var response = JSON.parse(data);
				if(response.status !== "fail") {
					Swal.fire({
						title: "",
						text: "<?php echo $alert_content[24];?>",
						icon: "success",
						customClass: {
							confirmButton: "btn btn-primary w-xs me-2 mt-2",
						},
						buttonsStyling: !1,
						showCloseButton: !0
					});
					updateOffer(response.offer_data);
					$('#updated_label').css('display', 'flex');
					document.getElementById('vat-fee-display').style.display = 'inline-block';
					document.getElementById('vat-fee-display').textContent = vat_fee;
					document.getElementById('vat-fee-edit').style.display = 'none';
					document.getElementById('edit_vat_fee').style.display = 'inline-block';
					document.getElementById('save_vat_fee').style.display = 'none';

				} else {
					Swal.fire({
						title: "",
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
			isEditing = false;
			isNew = false;
		})

		$(document).on('click', '.edit-btn', function() {
			if (isEditing) {
				Swal.fire({
					title: "",
					text: "<?php echo $alert_content[23];?>",
					icon: "warning",
					customClass: {
						confirmButton: "btn btn-primary w-xs me-2 mt-2",
					},
					buttonsStyling: !1,
					showCloseButton: !0
				});
			} else {
				var $row = $(this).closest('tr');
				var input = $row.find('.w-80');
				input.css({
					'border-color': '#b9b9b9',
					'pointer-events': 'all',
				});
				$row.find('.editable').hide();
				$row.find('.edit-input').show();
				$(this).hide();
				$row.find('.save-btn').show();
				$row.find('.edit-input:first').focus();
				isEditing = true;
				isNew = false;
			}
		});

		$(document).on('click', '.save-btn', function() {
			let offer_data = [];
			var $row = $(this).closest('tr');
			if ($row.find('.edit-input:first').val() == '' || 
				$row.find('.quantity').val() == '' || 
				$row.find('.quantity').val() == 0 || 
				$row.find('.price').val() == '' ||
				$row.find('.price').val() == 0) {
				Swal.fire({
					title: "",
					text: "<?php echo $alert_content[15];?>",
					icon: "warning",
					customClass: {
						confirmButton: "btn btn-primary w-xs me-2 mt-2",
					},
					buttonsStyling: !1,
					showCloseButton: !0
				});
			} else {
				let i = 0;
				$row.find('.edit-input').each(function() {
					var $input = $(this);
					var newValue = $input.val();
					
					// $input.siblings('.editable').text(newValue).show();
					// $input.hide();
					if (!i) {
						console.log(i);
						$input.hide();
						$row.find('.editable').text(newValue).css({'display': 'block'});
					}
					i++;
					offer_data.push(newValue);
					var input_detail = $row.find('.w-80');
					input_detail.css({
						'border-color': '#eae8e8',
						'pointer-events': 'none',
					});
				});

				let sum = offer_data[1] * offer_data[2];
				$row.find('.edit-input:last').val(sum);
				// $row.find('.editable:last').text(sum);
				$(this).hide();
				$row.find('.edit-btn').show();
				isEditing = false;
				if (isNew) {
					$.post(_server_url + 'manager/offer_add', 
					{
						'video_id': v_id,
						'description': offer_data[0],
						'quantity': offer_data[1],
						'price': offer_data[2]
					},
					function (data) {
						$(".preloader").hide();
						$(".preloader img").hide();
						var response = JSON.parse(data);
						var $row = $('#tableBody tr:last-child');
						$row.find('.offer_id').val(response['offer_id']);
						if(response.status !== "fail") {
							Swal.fire({
								title: "",
								text: "<?php echo $alert_content[24];?>",
								icon: "success",
								customClass: {
									confirmButton: "btn btn-primary w-xs me-2 mt-2",
								},
								buttonsStyling: !1,
								showCloseButton: !0
							});
							if(offer_status === "0") {
								$('#updated_label').css('display', 'none');
							} else {
								$('#updated_label').css('display', 'flex');
							}
							updateOffer(response.offer_data);
						} else {
							Swal.fire({
								title: "",
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
					let offer_id = $row.find('.offer_id').val();
					$.post(_server_url + 'manager/offer_update', 
					{
						'id': offer_id,
						'video_id': v_id,
						'description': offer_data[0],
						'quantity': offer_data[1],
						'price': offer_data[2]
					},
					function (data) {
						$(".preloader").hide();
						$(".preloader img").hide();
						var response = JSON.parse(data);
						if(response.status !== "fail") {
							Swal.fire({
								title: "",
								text: "<?php echo $alert_content[24];?>",
								icon: "success",
								customClass: {
									confirmButton: "btn btn-primary w-xs me-2 mt-2",
								},
								buttonsStyling: !1,
								showCloseButton: !0
							});
							updateOffer(response.offer_data);
							$('#updated_label').css('display', 'flex');
						} else {
							Swal.fire({
								title: "",
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
				isNew = false;
			}
		});

		$(document).on('click', '.delete-btn', function() {
			var $tag = $(this).closest('tr');
			var table = $('#offer_dt').DataTable();
			var info = table.page.info();

			if (isNew) {
				let rowToDelete = table.row(':last');
				if (!rowToDelete.length) return;
				rowToDelete.remove().draw(false); 
				let newInfo = table.page.info();

				// If the current page is now empty, navigate to the previous page
				if (newInfo.start === newInfo.recordsDisplay && newInfo.page > 0) {
					table.page('previous').draw(false);
				}
			} else {
				Swal.fire({
					title: "",
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
				})
				.then(function(t) {
					if (t.isConfirmed) {
						let offer_id = $tag.find('.offer_id').val();
						console.log('offer_id', offer_id);
						$.post(_server_url + 'manager/offer_delete', 
						{
							'id': offer_id,
							'video_id': v_id
						},
						function (data) {
							$(".preloader").hide();
							$(".preloader img").hide();
							var response = JSON.parse(data);
							if(response.status !== "fail") {
								Swal.fire({
									title: "",
									text: "<?php echo $alert_content[25];?>",
									icon: "success",
									customClass: {
										confirmButton: "btn btn-primary w-xs me-2 mt-2",
									},
									buttonsStyling: !1,
									showCloseButton: !0
								});
								updateOffer(response.offer_data);
								
								let rowToDelete = table.row(':last');
								if (!rowToDelete.length) return;
								rowToDelete.remove().draw(false); 
								let newInfo = table.page.info();

								// If the current page is now empty, navigate to the previous page
								if (newInfo.start === newInfo.recordsDisplay && newInfo.page > 0) {
									table.page('previous').draw(false);
								}
							} else {
								Swal.fire({
									title: "",
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
			
			isNew = false;
			isEditing = false;
		});

		$('.add-btn').on('click', function() {
			if (isEditing) {
				Swal.fire({
					title: "",
					text: "<?php echo $alert_content[23];?>",
					icon: "warning",
					customClass: {
						confirmButton: "btn btn-primary w-xs me-2 mt-2",
					},
					buttonsStyling: !1,
					showCloseButton: !0
				});
			} else {
				var table = $('#offer_dt').DataTable();
				let newRow = [
					`<div class="row">
						<input type="hidden" class="offer_id" value="" />
						<div class="col-10">
							<p class="editable wrapped-text" data-name="description"></p>
							<input type="text" class="form-control edit-input" style="border-color:rgb(185,185,185)" value="">
						</div>
						<div class="col-2">
							<div style="float:right">
								<span class="mdi mdi-delete-circle-outline delete-btn" style="font-size: 20px; margin: -5px 0 0 10px;"></span>
								<span class="mdi mdi-pencil-box-outline edit-btn" style="font-size: 20px; margin: -5px 0 0 10px;"></span>									
								<span class="mdi mdi-content-save-check save-btn" style="font-size: 20px; margin: -5px 0 0 10px; display:none"></span>									
							</div>
						</div>
					</div>

					<div style="margin-top:5px">
						<div style="float: right;" class="row">	
							<div class="col-4">
								<span style="font-weight: 700;"><?php echo $video_table[52];?>:</span>
								<input type="number" class="form-control edit-input quantity w-80"value="">
							</div>
							<div class="col-4">
								<span style="font-weight: 700;"><?php echo $video_table[53];?>: </span>
								<input type="number" class="form-control edit-input price w-80" value="">
							</div>
							<div class="col-4">
								<span style="font-weight: 700;"><?php echo $video_table[54];?>: </span>
								<input type="number" class="form-control edit-input w-80-non-editable" value="">
							</div>
						</div>
					</div>`
				];
				var info = table.page.info();
				console.log(info);

				// If the number of rows in the table exceeds the current page length, go to the next page
				if (info.recordsTotal >= info.length * (info.page + 1)) {
					table.row.add(newRow).draw(false);
					table.page('next').draw(false);
					var $row = $('#tableBody tr:last-child');
					$row.find('.edit-btn').click();
				} else {
					table.row.add(newRow).draw(false);
					var $row = $('#tableBody tr:last-child');
					$row.find('.edit-btn').click();
				}
				isEditing = true;
				isNew = true;
			}
		});

		$('#offer_valied').on('change', function(event) {
			console.log('Date changed:', event.target.value);
			$.post(_server_url + 'manager/offer_valid_update', 
			{
				'video_id': v_id,
				'date': event.target.value
			},
			function (data) {
				$(".preloader").hide();
				$(".preloader img").hide();
				var response = JSON.parse(data);
				if(response.status !== "fail") {
					
				} else {
					
				}

			});
		})
	});

	function updateOffer(data) {
		let offer = data;
		let offer_sum = 0;
		let vat_fee = document.getElementById('vat-fee-edit').value / 100;
		for(i=0; i < offer.length; i++) {
			offer_sum += offer[i]['price'] * offer[i]['quantity'];	
		}
		$('#sum_price').text(offer_sum);
		$('#vat_fee').text((offer_sum * vat_fee).toFixed(1));
		$('#total_price').text((offer_sum *(1 + vat_fee)).toFixed(1));
		$('#offer_board').css('display', 'flex');
		$('#no_offer_btn').css('display', 'none');
		$('#offer_btn').css('display', 'flex');
	}

	function init() {
		document.getElementsByClassName('w-80').readOnly = true;
	}

	init();

</script>