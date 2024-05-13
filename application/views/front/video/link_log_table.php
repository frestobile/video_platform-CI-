<?php if($video_data['status'] == 1) { ?>
	<span ><?php echo $video_table['39'];?> : <?php echo date('d.m.Y H:i:s', strtotime($video_data['video_update_time']));?></span>
<?php 
}
?>
<div class="table-responsive">

<table class="table table-centered align-middle table-nowrap mb-0 table-hover">
		<thead class="table-light">
			<tr>
				<th scope="col">No</th>
				<th scope="col"><?php echo $video_table[11];?></th>
                <th scope="col"><?php echo $video_table[33];?></th>
                <th scope="col"><?php echo $video_table[4];?></th>
			</tr>
		</thead>
		<tbody>
			<?php
				$idx = 1;
				foreach($link_log_data as $item){  ?>
					<tr>
						<td scope="row"><?php echo $idx++; ?></td>
						<td nowrap><?php echo date('d.m.Y H:i:s', strtotime($item['created_at']));?></td>
                        <td nowrap><?php echo $item['sms']; ?></td>
                        <td nowrap><?php echo $item['email']; ?></td>
					</tr>
			<?php } ?>
		</tbody>
	</table>
</div>