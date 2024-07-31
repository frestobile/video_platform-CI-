<div id="offer_table">
	<div class="table-responsive">
		<table class="table table-centered align-middle table-nowrap mb-0 table-hover" id="offer_dt">
			<thead class="table-light">
				<tr>
					<th></th>
					<th scope="col"><?php echo $video_table[51];?></th>
					<th scope="col"><?php echo $video_table[52];?></th>
					<th scope="col"><?php echo $video_table[53];?></th>
					<th scope="col"><?php echo $video_table[54];?></th>
				</tr>
			</thead>
			<tbody id="tableBody">
				<?php
					$idx = 1;
					foreach($offer_data as $item){  ?>
						<tr>
							<input type="hidden" class="offer_id" value="<?php echo $item['id'];?>" />
							<td width="5%">
								<button class="btn btn-success btn-circle save-btn" style="display: none;"><i class="mdi mdi-check"></i></button>
								<button class="btn btn-danger btn-circle delete-btn"><i class="mdi mdi-minus"></i></button>
								<button class="btn btn-primary btn-circle edit-btn"><i class="mdi mdi-pencil"></i></button>
							</td>
							<td>
								<span class="editable" data-name="description"><?php echo $item['description']; ?></span>
								<input type="text" class="form-control edit-input" value="<?php echo $item['description']; ?>">
							</td>
							<td>
								<span class="editable" data-name="quantity"><?php echo $item['quantity']; ?></span>
								<input type="number" class="form-control edit-input quantity" value="<?php echo $item['quantity']; ?>">
							</td>
							<td>
								<span class="editable" data-name="price"><?php echo $item['price']; ?></span>
								<input type="number" class="form-control edit-input price" value="<?php echo $item['price']; ?>">
							</td>
							<td>
								<span class="editable" data-name="sum"><?php echo $item['price'] * $item['quantity']; ?></span>
								<input type="number" class="form-control edit-input" value="<?php echo $item['price'] * $item['quantity']; ?>" disabled>
								
							</td>
						</tr>
				<?php } ?>

			</tbody>
		</table>
		<button class="btn btn-success btn-circle add-btn" style="margin-top: -100px;margin-left: 10px;"><i class="mdi mdi-plus"></i></button>
	</div>
</div>

<div class="row" id="offer_board">
		<?php
		 $valid_date = isset($video_data['valid_date']) ? date('Y-m-d', strtotime($video_data['valid_date'])) : date('Y-m-d');
		 $create_date = isset($video_data['offer_time']) ? date('d.m.Y H:i:s', strtotime($video_data['offer_time'])) : date('d.m.Y H:i:s');
		 $update_date = isset($video_data['update_time']) ? date('d.m.Y H:i:s', strtotime($video_data['update_time'])) : date('d.m.Y H:i:s');
		?>
	<div class="col-sm-4">
		
		<div><strong><?php echo $video_table[18];?> : </strong><span id="created_time"><?php echo $create_date;?></span></div>
		
			<div id="updated_label" style="display: <?php if($video_data['update_time'] != null) echo 'flex'; else echo 'none';?>">
				<strong><?php echo $video_table[43];?> : </strong>
				<span id="updated_time"><?php echo $update_date;?></span>
			</div>
		
		<div class="m-t-10">
			<button class="btn btn-primary" onclick="getBack();"><?php echo $video_table[29];?></button>
		</div>
	</div>
	<div class="col-sm-4">
		<strong><?php echo $video_table[47];?> :</strong>
		
		<input type="date" class="fcs" style="width: 50%; border: none; border-bottom: 1px solid #d1d1d1; line-height:15px;" value="<?php echo $valid_date;?>" id="offer_valied">
	</div>
	<div class="col-sm-4">
		<?php
		$sum = 0;
		foreach ($offer_data as $item) {
			$sum += $item['price'] * $item['quantity'];
		}
		?>
		<table class="table table-bordered">
			<tbody style="background-color: #eff2f7; border-color: #fff;">
				<tr>
					<th><?php echo $video_table[54];?>:</th>
					<td><span id="sum_price"><?php echo $sum;?> &euro;</span></td>
				</tr>
				<tr>
					<th><?php echo $video_table[55];?> 22% :</th>
					<td><span id="vat_fee"><?php echo $sum * 0.22;?> &euro;</span></td>
				</tr>
				<tr>
					<th><?php echo $video_table[56];?>:</th>
					<td><span id="total_price"><?php echo $sum * (1+0.22);?> &euro;</span></td>
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

		$(document).on('click', '.edit-btn', function() {
			console.log(isEditing);
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
				$row.find('.edit-input').each(function() {
					var $input = $(this);
					var newValue = $input.val();
					
					var dataName = $input.siblings('.editable').data('name');
					$input.siblings('.editable').text(newValue).show();
					$input.hide();
					offer_data.push(newValue);
				});

				let sum = offer_data[1] * offer_data[2];
				let vat = sum * 0.22;
				$row.find('.edit-input:last').val(sum);
				$row.find('.editable:last').text(sum);
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
					`<button class="btn btn-circle btn-success save-btn"><i class="mdi mdi-check"></i></button>
					<button class="btn btn-circle btn-danger delete-btn"><i class="mdi mdi-minus"></i></button>
					<button class="btn btn-circle btn-primary edit-btn" style="display: none;"><i class="mdi mdi-pencil"></i></button>`,
					`<span class="editable" data-name="description" style="display: none"></span>
					<input type="text" class="form-control edit-input" style="display: block" value="">`,
					`<span class="editable" data-name="quantity" style="display: none"></span>
					<input type="number" class="form-control edit-input quantity" style="display: block" value="">`,
					`<span class="editable" data-name="price" style="display: none"></span>
					<input type="number" class="form-control edit-input price" style="display: block" value="">`,
					`<span class="editable" data-name="sum" style="display: none"></span>
					<input type="number" class="form-control edit-input" style="display: block" value="" disabled>`
				];
				table.row.add(newRow).draw(false);
				var info = table.page.info();

				// If the number of rows in the table exceeds the current page length, go to the next page
				if (info.recordsTotal > info.length * (info.page + 1)) {
					table.page('next').draw(false);
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
		for(i=0; i < offer.length; i++) {
			offer_sum += offer[i]['price'] * offer[i]['quantity'];	
		}
		$('#sum_price').text(offer_sum);
		$('#vat_fee').text(offer_sum * 0.22);
		$('#total_price').text(offer_sum *(1 + 0.22));
		$('#offer_board').css('display', 'flex');
		$('#no_offer_btn').css('display', 'none');
		$('#offer_btn').css('display', 'flex');
	}

</script>