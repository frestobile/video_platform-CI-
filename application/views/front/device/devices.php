<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-11 col-xs-10">
                        <h4 class="nav_top_align"><i class="bi bi-device-ssd"></i>&nbsp;&nbsp;<?php echo $head_name;?></h4>
                    </div>
                </div>
            </div>
            <input id="company_id" type="hidden" value="<?php echo $company_id;?>">
            <div class="card-body">
                <div class="row m-t-10">
                    <div class="col-sm-12" style="padding: 6px 20px;">
                        <span> <?php echo $device_num;?> : <?php echo $totals;?></span>
                    </div>

                </div>
                <div class="m-t-20">
                    <div class="table-responsive table-card">
                        <table class="table table-centered align-middle table-nowrap mb-0 table-hover">
		                    <thead class="table-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col"><?php echo $device_table[1];?></th>
                                    <th scope="col"><?php echo $device_table[9];?></th>
                                    <th scope="col"><?php echo $device_table[2];?></th>
                                    <th scope="col"><?php echo $device_table[3];?></th>
                                    <th scope="col"><?php echo $device_table[4];?></th>
                                    <th scope="col"><?php echo $device_table[5];?></th>
                                    <th scope="col"><?php echo $device_table[6];?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $idx = 1;
                                foreach($device_list as $item) {
                                    if ($head_lang == 'en'){
                                        $verify_arr = array("Not Active", "Active");
                                    } else {
                                        $verify_arr = array("Ei ole aktiivne", "Aktiivne");
                                    }

                                    $misverify = 0;
                                    if ($item['device_is_allow'] == 0) $misverify = 1;
                                    ?>
                                    <tr>
                                        <td scope="row"><?=$idx++;?></td>
                                        <td id=""><?php echo $item['deviceid'];?></td>
                                        <td id=""><?php echo $item['device_password'];?></td>
                                        <td id=""><?php echo $item['device_name']; ?></td>
                                        <td id=""><?php echo $item['device_serial_number']; ?></td>
                                        <td id=""><?php echo $item['device_login_num']; ?></td>
                                        <td id=""><?php echo date('d.m.Y H:i:s', strtotime($item['device_registered_at']));?></td>
                                        <td id=""><?php echo $verify_arr[$item['device_is_allow']];?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row align-items-center mt-4 pt-2 gy-2 text-center text-sm-start">
                        <?php include_once "pagination.php"; ?>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var cur_page   = parseInt(<?php echo $curpage;?>);
    var total_pages = parseInt(<?php echo $total_pages;?>);
    $(document).ready(function() {
        $('#menu li').removeClass('active');
        $('#device_menu').addClass('active');
    });
</script>