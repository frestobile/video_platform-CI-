<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><?php echo $menu[1];?></h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-2 col-md-3">
                        <a class="btn btn-primary" href="<?php echo base_url('admin/main/addCompany?lang='.$head_lang);?>">
                            <i class="fa fa-plus-square">&nbsp;&nbsp;&nbsp;</i>
                            <?php echo $add_btn;?></a>
                    </div>
                    <div class="col-sm-4 col-md-3" style="align-content: center;">
                        <span> <?php echo $company_count;?>:&nbsp;<?php if ($totals != null) echo $totals; else echo "0";?></span>
                    </div>
                    <div class="col-sm-3 col-md-3">
                        
                        <select class="form-select select-status" onchange="searchCompanyList();">
                                <?php
                                $company_active = isset($company_active)? $company_active: 1;
                                $verify_arr = array(
                                    0=> $status[2],
                                    1=>$status[1],
                                    2=>$status[0]
                                );
                                for($idx = sizeof($verify_arr) - 1; $idx >= 0; $idx--){
                                    if($company_active == $idx)
                                        echo '<option value="'.$idx.'" selected="selected">'.$verify_arr[$idx].'</option>';
                                    else
                                        echo '<option value="'.$idx.'">'.$verify_arr[$idx].'</option>';
                                }?>
                        </select>
                        
                    </div>
                    <div class="col-sm-3 col-md-3">
                        <input class="form-control" type="search" id="searchtxt"
                                    onkeypress="searchCompanyKeypress(event);"
                                    value="<?php if (isset($search_key)) echo $search_key; else echo '';?>"
                                    placeholder="<?php echo $search[0];?>">
                    </div>

                </div>
                <div class="m-t-30">
                    <div class="table-responsive table-card">
                        <table class="table table-centered align-middle table-nowrap mb-0 table-hover">
		                    <thead class="table-light">
                                <tr>
                                    <!-- <th width="3%"><?php echo $company_table[0];?></th> -->
                                    <th width="15%"><?php echo $company_table[1];?></th>
                                    <th width="10%"><?php echo $company_table[2];?></th>
                                    <th width="10%"><?php echo $company_table[3];?></th>
                                    <th width="20%"><?php echo $company_table[4];?></th>
                                    <th width="3%"><?php echo $company_table[5];?></th>
                                    <th nowrap width="2%"><?php echo $company_table[6];?></th>
                                    <th width="15%"><?php echo $company_table[7];?></th>
                                    <th width="5%"><?php echo $company_table[8];?></th>
                                    <th width="17%"><?php echo $company_table[9];?></th>
                                </tr>
                            </thead>
                            <tbody>
                                        <?php
                                        $idx = 1;
                                        foreach($company_list as $key=> $item){
                                        $misverify = 0;
                                        if($item['company_active'] == 0) $misverify = 1;
                                        ?>
                                        <tr>
                                        <!-- <td><?=$idx++;?></td> -->
                                        <td nowrap><?php echo $item['company_name'];?></td>
                                        <td nowrap><?php echo $item['company_email'];?></td>
                                        <td nowrap><?php echo $item['company_phone'];?></td>
                                        <td nowrap><?php echo $item['company_address'];?></td>
                                        <td nowrap>
                                            <a href="#" onclick="viewVideos(this, <?php echo $item['company_id'];?>);">
                                                <?= $video_counts[$key] ;?>
                                            </a>
                                        </td>
                                        <td nowrap><?php echo $item['company_login_num'];?></td>
                                        <td nowrap><?php echo date('d.m.Y H:i:s', strtotime($item['company_registered_at']));?></td>
                                        <td nowrap><?php echo $verify_arr[$item['company_active']];?></td>
                                        <td nowrap>
                                            <a href="#" onclick="editCompany(this, <?php echo $item['company_id'];?>);"><?php echo $company_table[10];?>&nbsp;</a>
                                            <label class="stick">|&nbsp;</label>
                                            <a href="#" onclick="enableCompanyShow(this, <?php echo $item['company_id'];?>);"><?=$verify_arr[$misverify];?></a>
                                            <label class="stick">&nbsp;|</label>
                                            <a href="#" onclick="deleteCompanyData(this, <?php echo $item['company_id'];?>);">&nbsp;<?php echo $company_table[11];?></a>
                                        </td>
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


<script type="text/javascript">
var cur_page = parseInt(<?php echo $curpage;?>);
var total_pages = parseInt(<?php echo $total_pages;?>);

$(document).ready(function() {
   
    $('#menu li').removeClass('active');
    $('#company_menu').addClass('active');
    $('#company').removeClass('collapsed');
    $("#company").addClass('active');
    $("#sidebarCompany").addClass('show');
 
});

function page_change(ptargets){
    if(ptargets === 'first'){
        cur_page = 1;
    }else if(ptargets === 'prev'){
        cur_page --;
        if(cur_page <= 1) cur_page = 1;
    }else if(ptargets === 'next'){
        cur_page ++;
        if(cur_page >= total_pages) cur_page = total_pages;
    }else if(ptargets === 'last'){
        cur_page = total_pages;
    }else {
        cur_page = parseInt(ptargets);
    }

    var company_status = $('.select-status').val();
    var search_key = $('#searchtxt').val();

    location.href = _server_url + 'admin/main/companyList?status='
        + company_status + '&search_key='
        + search_key + '&pageNum='
        + cur_page + '&lang='
        + lang_status;
}

function editCompany(obj, idx) {
    location.href =_server_url + 'admin/main/companyUpdate?id='+ idx +'&lang=' + lang_status;
}

function enableCompanyShow(obj, idx) {
    var state_val, state_str1, state_str2;
    if($(obj).html() === "<?php echo $status[1]?>") {
        state_str1 = "<?php echo $status[2]?>";
        state_str2 = "<?php echo $status[1]?>";
        state_val = 1;
    }else {
        state_str1 = "<?php echo $status[1]?>";
        state_str2 = "<?php echo $status[2]?>";
        state_val = 0;
    }
    $.post(_server_url + 'admin/Data/companyEnable', {'company_id': idx, 'company_active': state_val},
    function (data) {
        var res = JSON.parse(data);
        if(res.response !== "FAIL"){
            $(obj).html(state_str1);
            $(obj).parent('td').parent('tr').find('td').eq(8).html(state_str2);
        }else{
            swal("<?php echo $failed;?>", "<?php echo $alert_content[6];?>", "warning");
        }
    });
}

function deleteCompanyData(obj, idx) {
    swal({
        title: "<?php echo $warning;?>",
        text: "<?php echo $alert_content[8];?>",
        icon: "warning",
        buttons: ["<?php echo $determine[0];?>", "<?php echo $determine[1];?>"],
    })
    .then(function(value) {
        if (value) {
            $.post(_server_url + 'admin/Data/companyDelete', {'company_id': idx},
            function (data) {
                if(data !== "FAIL") {
                    $(obj).parent('td').parent('tr').remove();
                    location.href =_server_url + 'admin/main/companyList?lang=' + lang_status;
                }else
                    swal("<?php echo $failed;?>", "<?php echo $alert_content[6];?>", "warning");
            });
        }
    });
}

function searchCompanyKeypress(evt) {
    if ( evt.which === 13 ) {
        searchCompanyList();
    }
}

function searchCompanyList() {
    var company_status = $('.select-status').val();
    var search_key = $('#searchtxt').val();

    location.href =_server_url + 'admin/main/companyList?status='+ company_status +'&search_key='+ search_key +'&lang=' + lang_status;
}

function viewVideos(obj, idx) {
    location.href =_server_url + 'admin/main/videoList?id='+ idx +'&lang=' + lang_status;
}
</script>