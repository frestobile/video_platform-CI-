<table class="table table-centered align-middle table-nowrap mb-0 table-hover">
		<thead class="table-light">
		
			<tr>
				<th scope="col">No</th>
				<th scope="col"><?php echo $video_table[30];?></th>
				<th scope="col"><?php echo $video_table[31];?></th>
			</tr>
		</thead>
		<tbody>
			<?php
				$idx = 1;
				foreach($log_data as $item){  ?>
					<tr>
						<td scope="row"><?php echo $idx++; ?></td>
						<td nowrap><?php echo date('d.m.Y H:i:s', strtotime($item['vl_created_at']));?></td>
						<td nowrap><?php echo $item['ip_address']; ?></td>
					</tr>
			<?php } ?>
		</tbody>
	</table>
</div>