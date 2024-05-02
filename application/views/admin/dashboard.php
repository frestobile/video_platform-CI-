<div class="row">
    <!-- <div class="col"> -->

        <div class="h-100">
            <div class="row">
                <div class="col-xl-3">
                    <div class="row">
                        <div class="col-xl-12 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="flex-grow-1">
                                            <p class="text-uppercase fw-medium text-muted text-truncate fs-13"><?php echo $menu[1];?></p>
                                            <h4 class="fs-22 fw-semibold mb-3"><span class="counter-value" data-target="<?php echo $registered_companies != null ? $registered_companies : 0;?>">0</span></h4>
                                            <!-- <div class="d-flex align-items-center gap-2"> -->
                                                <!-- <h5 class="text-success fs-12 mb-0">
                                                    <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +18.30 %
                                                </h5>
                                                <p class="text-muted mb-0">than last week</p> -->
                                            <!-- </div> -->
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-success-subtle rounded fs-3">
                                                <i class="bi bi-bank text-success"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                                <div class="animation-effect-6 text-success opacity-25 fs-18">
                                    <i class="bi bi-currency-dollar"></i>
                                </div>
                                <div class="animation-effect-4 text-success opacity-25 fs-18">
                                    <i class="bi bi-currency-pound"></i>
                                </div>
                                <div class="animation-effect-3 text-success opacity-25 fs-18">
                                    <i class="bi bi-currency-euro"></i>
                                </div>
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xl-12 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        
                                        <div class="flex-grow-1">
                                            <p class="text-uppercase fw-medium text-muted text-truncate fs-13"><?php echo $menu[7];?></p>
                                            <h4 class="fs-22 fw-semibold mb-3"><span class="counter-value" data-target="<?php echo $waiting_video_counts != null ? $waiting_video_counts : 0;?>">0</span></h4>
                                            <!-- <div class="d-flex align-items-center justify-content-end gap-2">
                                                <h5 class="text-danger fs-12 mb-0">
                                                    <i class="ri-arrow-right-down-line fs-13 align-middle"></i> -2.74 %
                                                </h5>
                                                <p class="text-muted mb-0">than last week</p>
                                            </div> -->
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-info-subtle rounded fs-3">
                                                <i class="mdi mdi-loading mdi-spin text-info"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                                <div class="animation-effect-6 text-info opacity-25 left fs-18">
                                    <i class="bi bi-handbag"></i>
                                </div>
                                <div class="animation-effect-4 text-info opacity-25 left fs-18">
                                    <i class="bi bi-shop"></i>
                                </div>
                                <div class="animation-effect-3 text-info opacity-25 left fs-18">
                                    <i class="bi bi-bag-check"></i>
                                </div>
                            </div><!-- end card -->
                        </div><!-- end col -->
                    
                        <div class="col-xl-12 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="flex-grow-1">
                                            <p class="text-uppercase fw-medium text-muted text-truncate fs-13"><?php echo $menu[2];?></p>
                                            <h4 class="fs-22 fw-semibold mb-3"><span class="counter-value" data-target="<?php echo $video_counts != null ? $video_counts : 0;?>">0</span> </h4>
                                            <!-- <div class="d-flex align-items-center gap-2">
                                                <h5 class="text-success fs-12 mb-0">
                                                    <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +29.08 %
                                                </h5>
                                                <p class="text-muted mb-0">than last week</p>
                                            </div> -->
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-warning-subtle rounded fs-3">
                                                <i class="bi bi-camera-reels text-warning"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                                <div class="animation-effect-6 text-warning opacity-25 fs-18">
                                    <i class="bi bi-person"></i>
                                </div>
                                <div class="animation-effect-4 text-warning opacity-25 fs-18">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                                <div class="animation-effect-3 text-warning opacity-25 fs-18">
                                    <i class="bi bi-people"></i>
                                </div>
                            </div><!-- end card -->
                        </div><!-- end col -->
                    </div> <!-- end row-->
                </div>
                <div class="col-xl-9">
                    <div class="card">
                        <div class="card-header border-0 align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1"><?php echo $statistics;?></h4>
                            
                        </div><!-- end card header -->

                        <div class="card-body p-0 pb-2">
                            <div class="table-responsive">
                                <table class="table table-centered align-middle table-nowrap mb-0 table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" id="year_val"><?php echo date("Y");?></th>
                                            <th scope="col"><a href="javascript:void(0);" onclick="get_video_by_month(1);"><?php echo $months[0];?></a></th>
                                            <th scope="col"><a href="javascript:void(0);" onclick="get_video_by_month(2);"><?php echo $months[1];?></a></th>
                                            <th scope="col"><a href="javascript:void(0);" onclick="get_video_by_month(3);"><?php echo $months[2];?></a></th>
                                            <th scope="col"><a href="javascript:void(0);" onclick="get_video_by_month(4);"><?php echo $months[3];?></a></th>
                                            <th scope="col"><a href="javascript:void(0);" onclick="get_video_by_month(5);"><?php echo $months[4];?></a></th>
                                            <th scope="col"><a href="javascript:void(0);" onclick="get_video_by_month(6);"><?php echo $months[5];?></a></th>
                                            <th scope="col"><a href="javascript:void(0);" onclick="get_video_by_month(7);"><?php echo $months[6];?></a></th>
                                            <th scope="col"><a href="javascript:void(0);" onclick="get_video_by_month(8);"><?php echo $months[7];?></a></th>
                                            <th scope="col"><a href="javascript:void(0);" onclick="get_video_by_month(9);"><?php echo $months[8];?></a></th>
                                            <th scope="col"><a href="javascript:void(0);" onclick="get_video_by_month(10);"><?php echo $months[9];?></a></th>
                                            <th scope="col"><a href="javascript:void(0);" onclick="get_video_by_month(11);"><?php echo $months[10];?></a></th>
                                            <th scope="col"><a href="javascript:void(0);" onclick="get_video_by_month(12);"><?php echo $months[11];?></a></th>
                                            <th scope="col"><?php echo $months[12];?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($results as $item) {
                                        $countsforCompany = 0;
                                        ?>
                                        <tr>
                                            <td scope="col"><?php echo $item['company_name'];?></td>
                                            <?php
                                            for ($i = 1; $i < 13; $i++) {
                                                $flag = false;
                                                $counts = 0;
                                                foreach ($item['children'] as $item1) {
                                                    if ($item1['month'] == $i) {
                                                        $flag = true;
                                                        $counts = $item1['counts'];
                                                        $countsforCompany += $counts;
                                                    } else {
                                                        $flag = false;
                                                    }
                                                }?>
                                                <td scope="col"
                                                    onclick="calendar_view(<?php echo $item['company_id'];?>, <?php echo $i; ?>,<?php echo $counts; ?>);" style="cursor: pointer;"><?php echo $counts; ?></td>
                                                <?php
                                            }?>
                                            <td scope="col"><?php echo $countsforCompany;?></td>
                                        </tr>
                                        <?php
                                        }?>
                                        <tr>
                                            <td scope="col"><?php echo $months[12];?></td>
                                            <?php
                                            $total = 0;
                                            for ($i = 1; $i < 13; $i++){
                                                $counts1 = 0;
                                                foreach ($statis as $item) {
                                                    if ($item['month'] == $i) {
                                                        $counts1 = $item['counts'];
                                                        $total += $counts1;
                                                    }
                                                }
                                                echo '<td scope="col">'.$counts1.'</td>';
                                            }?>
                                            <td scope="col"><?php echo $total;?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>    
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div>

            <div class="row" style="display: none;" id="video-table">
                <div class="col-lg-12">
                    <div class="card" >
                        <div class="card-header" ><h4 class="card-title mb-0 flex-grow-1"><?php echo $menu[2];?> <span id="search_status"></span></h4></div>
                        <div class="card-body" >
                            <div id="all_video_list"></div>
                        </div>
                        
                    </div>
                </div>
            </div> 
        </div> <!-- end .h-100-->

    <!-- </div> -->

    <div class="col-auto layout-rightside-col">
        <div class="overlay"></div>
        <div class="layout-rightside">
            <div class="card h-100 rounded-0">
                <div class="widget-userlist" data-simplebar>
                    <div class="card-body pb-0">
                        <p class="text-muted text-uppercase fw-medium fs-13">Recent Chat</p>
                        <ul class="hstack gap-2 chat-panel-list list-unstyled">
                            <li>
                                <a href="#!" class="text-center avatar-sm h-auto d-block">
                                    <div class="chat-user-img online">
                                        <img src="../assets/images/users/avatar-1.jpg" class="avatar-sm rounded-circle chatlist-user-image" alt="">
                                        <span class="user-status"></span>
                                    </div>
                                    <p class="text-muted mb-0 mt-2 text-truncate chatlist-user-name">Ashley Silva</p>
                                </a>
                            </li>
                            <li>
                                <a href="#!" class="text-center avatar-sm h-auto d-block">
                                    <div class="chat-user-img online">
                                        <img src="../assets/images/users/avatar-2.jpg" class="avatar-sm rounded-circle chatlist-user-image" alt="">
                                        <span class="user-status"></span>
                                    </div>
                                    <p class="text-muted mb-0 mt-2 text-truncate chatlist-user-name">Misty Taylor</p>
                                </a>
                            </li>
                            <li>
                                <a href="#!" class="text-center avatar-sm h-auto d-block">
                                    <div class="chat-user-img away">
                                        <img src="../assets/images/users/avatar-3.jpg" class="avatar-sm rounded-circle chatlist-user-image" alt="">
                                        <span class="user-status"></span>
                                    </div>
                                    <p class="text-muted mb-0 mt-2 text-truncate chatlist-user-name">Scott Wilson</p>
                                </a>
                            </li>
                            <li>
                                <a href="#!" class="text-center avatar-sm h-auto d-block">
                                    <div class="chat-user-img online">
                                        <img src="../assets/images/users/avatar-4.jpg" class="avatar-sm rounded-circle chatlist-user-image" alt="">
                                        <span class="user-status"></span>
                                    </div>
                                    <p class="text-muted mb-0 mt-2 text-truncate chatlist-user-name">Patricia Wilson</p>
                                </a>
                            </li>
                            <li>
                                <a href="#!" class="text-center avatar-sm h-auto d-block">
                                    <div class="chat-user-img away">
                                        <img src="../assets/images/users/avatar-5.jpg" class="avatar-sm rounded-circle chatlist-user-image" alt="">
                                        <span class="user-status"></span>
                                    </div>
                                    <p class="text-muted mb-0 mt-2 text-truncate chatlist-user-name">Allyson Wigfall</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="search-box flex-grow-1">
                                <input type="text" class="form-control" id="searchResultList" autocomplete="off" placeholder="Search for ...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <ul class="chat-panel-list list-group list-group-flush mb-0 border-dashed">
                            <li class="list-group-item">
                                <div class="d-flex align-items-center gap-1">
                                    <div class="flex-shrink-0 me-2">
                                        <img src="../assets/images/users/avatar-1.jpg" alt="" class="avatar-xs rounded-circle chatlist-user-image" />
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <a href="#!" class="stretched-link"><h6 class="mb-1 chatlist-user-name">Ashley Silva</h6></a>
                                        <p class="chatlist-desc fs-13 text-info mb-0 text-truncate">Good Morning</p>
                                    </div>
                                    <div class="text-end">
                                        <p class="mb-1 text-muted fs-12">04:32 PM</p>
                                        <span class="badge text-info bg-info-subtle rounded-circle fs-10">4</span>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex align-items-center gap-1">
                                    <div class="flex-shrink-0 me-2">
                                        <img src="../assets/images/users/avatar-2.jpg" alt="" class="avatar-xs rounded-circle chatlist-user-image" />
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <a href="#!" class="stretched-link"><h6 class="mb-1 chatlist-user-name">Misty Taylor</h6></a>
                                        <p class="chatlist-desc fs-13 text-info mb-0 text-truncate">Okay, Byy</p>
                                    </div>
                                    <div class="text-end">
                                        <p class="mb-1 text-muted fs-12">02:49 PM</p>
                                        <span class="badge text-info bg-info-subtle rounded-circle fs-10">1</span>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex align-items-center gap-1">
                                    <div class="flex-shrink-0 me-2">
                                        <img src="../assets/images/users/avatar-3.jpg" alt="" class="avatar-xs rounded-circle chatlist-user-image" />
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <a href="#!" class="stretched-link"><h6 class="mb-1 chatlist-user-name">Scott Wilson</h6></a>
                                        <p class="chatlist-desc fs-13 text-info mb-0 text-truncate">Yeah everything is fine...</p>
                                    </div>
                                    <div class="text-end">
                                        <p class="mb-1 text-muted fs-12">12:04 PM</p>
                                        <span class="badge text-info bg-info-subtle rounded-circle fs-10">8</span>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex align-items-center gap-1">
                                    <div class="flex-shrink-0 me-2">
                                        <img src="../assets/images/users/avatar-4.jpg" alt="" class="avatar-xs rounded-circle chatlist-user-image" />
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <a href="#!" class="stretched-link"><h6 class="mb-1 chatlist-user-name">Patricia Wilson</h6></a>
                                        <p class="chatlist-desc fs-13 text-muted mb-0 text-truncate">Hey! there I'm available</p>
                                    </div>
                                    <div class="text-end align-self-start">
                                        <p class="mb-1 text-muted fs-12">11:11 AM</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex align-items-center gap-1">
                                    <div class="flex-shrink-0 me-2">
                                        <img src="../assets/images/users/avatar-5.jpg" alt="" class="avatar-xs rounded-circle chatlist-user-image" />
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <a href="#!" class="stretched-link"><h6 class="mb-1 chatlist-user-name">Allyson Wigfall</h6></a>
                                        <p class="chatlist-desc fs-13 text-muted mb-0 text-truncate">I've finished it! See you so</p>
                                    </div>
                                    <div class="text-end align-self-start">
                                        <p class="mb-1 text-muted fs-12">09:24 AM</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex align-items-center gap-1">
                                    <div class="flex-shrink-0 me-2">
                                        <img src="../assets/images/users/avatar-6.jpg" alt="" class="avatar-xs rounded-circle chatlist-user-image" />
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <a href="#!" class="stretched-link"><h6 class="mb-1 chatlist-user-name">Martha Griffin</h6></a>
                                        <p class="chatlist-desc fs-13 text-muted mb-0 text-truncate">Wow that's great</p>
                                    </div>
                                    <div class="text-end align-self-start">
                                        <p class="mb-1 text-muted fs-12">16/11</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex align-items-center gap-1">
                                    <div class="flex-shrink-0 me-2">
                                        <img src="../assets/images/users/avatar-7.jpg" alt="" class="avatar-xs rounded-circle chatlist-user-image" />
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <a href="#!" class="stretched-link"><h6 class="mb-1 chatlist-user-name">Mark Sargent</h6></a>
                                        <p class="chatlist-desc fs-13 text-muted mb-0 text-truncate">Nice to meet you</p>
                                    </div>
                                    <div class="text-end align-self-start">
                                        <p class="mb-1 text-muted fs-12">16/11</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex align-items-center gap-1">
                                    <div class="flex-shrink-0 me-2">
                                        <img src="../assets/images/users/avatar-8.jpg" alt="" class="avatar-xs rounded-circle chatlist-user-image" />
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <a href="#!" class="stretched-link"><h6 class="mb-1 chatlist-user-name">Ray Stricklin</h6></a>
                                        <p class="chatlist-desc fs-13 text-muted mb-0 text-truncate">Hey, Hi Ray Stricklin ...!</p>
                                    </div>
                                    <div class="text-end align-self-start">
                                        <p class="mb-1 text-muted fs-12">16/11</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex align-items-center gap-1">
                                    <div class="flex-shrink-0 me-2">
                                        <img src="../assets/images/users/avatar-9.jpg" alt="" class="avatar-xs rounded-circle chatlist-user-image" />
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <a href="#!" class="stretched-link"><h6 class="mb-1 chatlist-user-name">Frank Taylor</h6></a>
                                        <p class="chatlist-desc fs-13 text-muted mb-0 text-truncate">Happy holiday 🙂</p>
                                    </div>
                                    <div class="text-end align-self-start">
                                        <p class="mb-1 text-muted fs-12">15/11</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex align-items-center gap-1">
                                    <div class="flex-shrink-0 me-2">
                                        <img src="../assets/images/users/avatar-10.jpg" alt="" class="avatar-xs rounded-circle chatlist-user-image" />
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <a href="#!" class="stretched-link"><h6 class="mb-1 chatlist-user-name">Karla Basso</h6></a>
                                        <p class="chatlist-desc fs-13 text-muted mb-0 text-truncate">Okay, Sure.</p>
                                    </div>
                                    <div class="text-end align-self-start">
                                        <p class="mb-1 text-muted fs-12">14/11</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex align-items-center gap-1">
                                    <div class="flex-shrink-0 me-2">
                                        <img src="../assets/images/users/avatar-1.jpg" alt="" class="avatar-xs rounded-circle chatlist-user-image" />
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <a href="#!" class="stretched-link"><h6 class="mb-1 chatlist-user-name">Sally McPherson</h6></a>
                                        <p class="chatlist-desc fs-13 text-muted mb-0 text-truncate">Thanks</p>
                                    </div>
                                    <div class="text-end align-self-start">
                                        <p class="mb-1 text-muted fs-12">14/11</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex align-items-center gap-1">
                                    <div class="flex-shrink-0 me-2">
                                        <img src="../assets/images/users/avatar-2.jpg" alt="" class="avatar-xs rounded-circle chatlist-user-image" />
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <a href="#!" class="stretched-link"><h6 class="mb-1 chatlist-user-name">Lizzie Beil</h6></a>
                                        <p class="chatlist-desc fs-13 text-muted mb-0 text-truncate">Our next meeting tomorrow at 10.00 AM</p>
                                    </div>
                                    <div class="text-end align-self-start">
                                        <p class="mb-1 text-muted fs-12">13/11</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex align-items-center gap-1">
                                    <div class="flex-shrink-0 me-2">
                                        <img src="../assets/images/users/avatar-3.jpg" alt="" class="avatar-xs rounded-circle chatlist-user-image" />
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <a href="#!" class="stretched-link"><h6 class="mb-1 chatlist-user-name">Mark Williams</h6></a>
                                        <p class="chatlist-desc fs-13 text-muted mb-0 text-truncate">See you tomorrow</p>
                                    </div>
                                    <div class="text-end align-self-start">
                                        <p class="mb-1 text-muted fs-12">12/11</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex align-items-center gap-1">
                                    <div class="flex-shrink-0 me-2">
                                        <img src="../assets/images/users/avatar-4.jpg" alt="" class="avatar-xs rounded-circle chatlist-user-image" />
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <a href="#!" class="stretched-link"><h6 class="mb-1 chatlist-user-name">Vina Scott</h6></a>
                                        <p class="chatlist-desc fs-13 text-muted mb-0 text-truncate">Yeah everything is fine...</p>
                                    </div>
                                    <div class="text-end align-self-start">
                                        <p class="mb-1 text-muted fs-12">11/11</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex align-items-center gap-1">
                                    <div class="flex-shrink-0 me-2">
                                        <img src="../assets/images/users/avatar-5.jpg" alt="" class="avatar-xs rounded-circle chatlist-user-image" />
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <a href="#!" class="stretched-link"><h6 class="mb-1 chatlist-user-name">Keli Henry</h6></a>
                                        <p class="chatlist-desc fs-13 text-muted mb-0 text-truncate">Good afternoon</p>
                                    </div>
                                    <div class="text-end align-self-start">
                                        <p class="mb-1 text-muted fs-12">11/11</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="widget-user-chatlist">
                    <div class="chat-topbar p-4 border-bottom border-bottom-dashed">
                        <div class="align-items-center d-flex">
                            <div class="flex-grow-1">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-2">
                                        <div class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                            <div class="avatar-xs">                        
                                                <img src="../assets/images/users/avatar-1.jpg" class="rounded-circle img-fluid userprofile" alt="">
                                                <span class="user-status"></span>                        
                                            </div>                    
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="fs-14 mb-0 profile-username">Ashley Silva</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-shrink-0">
                                <div class="d-flex align-items-start gap-2">
                                    <div class="dropdown">
                                        <a class="btn btn-ghost-secondary btn-sm fs-16" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ri-more-2-fill"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#"><i class="bi bi-archive text-muted me-2"></i> Archive</a>
                                            <a class="dropdown-item" href="#"><i class="bi bi-mic-mute text-muted me-2"></i> Muted</a>
                                            <a class="dropdown-item" href="#"><i class="bi bi-trash3 text-muted me-2"></i> Delete</a>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-soft-danger btn-sm fs-16" id="close-chatlist"><i class="ri-close-fill"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end chat-topbar -->
                    <div class="card-body p-0">
                        <div>
                            <div id="users-chat">
                                <div class="chat-conversation p-3" id="chat-conversation" data-simplebar>
                                    <ul class="list-unstyled chat-conversation-list chat-sm" id="users-conversation">
                                        <li class="chat-list left">
                                            <div class="conversation-list">
                                                <div class="chat-avatar">
                                                    <img src="../assets/images/users/avatar-1.jpg" alt="">
                                                </div>
                                                <div class="user-chat-content">
                                                    <div class="ctext-wrap">
                                                        <div class="ctext-wrap-content">
                                                            <p class="mb-0 ctext-content">Good morning 😊</p>
                                                        </div>
                                                        <div class="dropdown align-self-start message-box-drop">
                                                            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="bi bi-three-dots-vertical"></i>
                                                            </a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-reply me-2 text-muted align-bottom"></i>Reply</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-share me-2 text-muted align-bottom"></i>Forward</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-files me-2 text-muted align-bottom"></i>Copy</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-bookmark me-2 text-muted align-bottom"></i>Bookmark</a>
                                                                <a class="dropdown-item delete-item" href="javascript:void(0)"><i class="bi bi-trash3 me-2 text-muted align-bottom"></i>Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="conversation-name"><small class="text-muted time">09:07 am</small> <span class="text-success check-message-icon"><i class="ri-check-double-line align-bottom"></i></span></div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- chat-list -->

                                        <li class="chat-list right">
                                            <div class="conversation-list">
                                                <div class="user-chat-content">
                                                    <div class="ctext-wrap">
                                                        <div class="ctext-wrap-content">
                                                            <p class="mb-0 ctext-content">Good morning, How are you? What about our next meeting?</p>
                                                        </div>
                                                        <div class="dropdown align-self-start message-box-drop">
                                                            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="bi bi-three-dots-vertical"></i>
                                                            </a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-reply me-2 text-muted align-bottom"></i>Reply</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-share me-2 text-muted align-bottom"></i>Forward</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-files me-2 text-muted align-bottom"></i>Copy</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-bookmark me-2 text-muted align-bottom"></i>Bookmark</a>
                                                                <a class="dropdown-item delete-item" href="javascript:void(0)"><i class="bi bi-trash3 me-2 text-muted align-bottom"></i>Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="conversation-name"><small class="text-muted time">09:08 am</small> <span class="text-success check-message-icon"><i class="ri-check-double-line align-bottom"></i></span></div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- chat-list -->

                                        <li class="chat-list left">
                                            <div class="conversation-list">
                                                <div class="chat-avatar">
                                                    <img src="../assets/images/users/avatar-1.jpg" alt="">
                                                </div>
                                                <div class="user-chat-content">
                                                    <div class="ctext-wrap">
                                                        <div class="ctext-wrap-content">
                                                            <p class="mb-0 ctext-content">Yeah everything is fine. Our next meeting tomorrow at 10.00 AM</p>
                                                        </div>
                                                        <div class="dropdown align-self-start message-box-drop">
                                                            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="bi bi-three-dots-vertical"></i>
                                                            </a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-reply me-2 text-muted align-bottom"></i>Reply</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-share me-2 text-muted align-bottom"></i>Forward</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-files me-2 text-muted align-bottom"></i>Copy</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-bookmark me-2 text-muted align-bottom"></i>Bookmark</a>
                                                                <a class="dropdown-item delete-item" href="javascript:void(0)"><i class="bi bi-trash3 me-2 text-muted align-bottom"></i>Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ctext-wrap">
                                                        <div class="ctext-wrap-content">
                                                            <p class="mb-0 ctext-content">Yeah everything is fine.</p>
                                                        </div>
                                                        <div class="dropdown align-self-start message-box-drop">
                                                            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="bi bi-three-dots-vertical"></i>
                                                            </a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-reply me-2 text-muted align-bottom"></i>Reply</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-share me-2 text-muted align-bottom"></i>Forward</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-files me-2 text-muted align-bottom"></i>Copy</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-bookmark me-2 text-muted align-bottom"></i>Bookmark</a>
                                                                <a class="dropdown-item delete-item" href="javascript:void(0)"><i class="bi bi-trash3 me-2 text-muted align-bottom"></i>Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ctext-wrap">
                                                        <div class="ctext-wrap-content">
                                                            <p class="mb-0 ctext-content">Hey, I'm going to meet a friend of mine at the department store. I have to buy some presents for my parents 🎁.</p>
                                                        </div>
                                                        <div class="dropdown align-self-start message-box-drop">
                                                            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="bi bi-three-dots-vertical"></i>
                                                            </a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-reply me-2 text-muted align-bottom"></i>Reply</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-share me-2 text-muted align-bottom"></i>Forward</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-files me-2 text-muted align-bottom"></i>Copy</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-bookmark me-2 text-muted align-bottom"></i>Bookmark</a>
                                                                <a class="dropdown-item delete-item" href="javascript:void(0)"><i class="bi bi-trash3 me-2 text-muted align-bottom"></i>Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="conversation-name"><small class="text-muted time">09:10 am</small> <span class="text-success check-message-icon"><i class="ri-check-double-line align-bottom"></i></span></div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- chat-list -->

                                        <li class="chat-list right">
                                            <div class="conversation-list">
                                                <div class="user-chat-content">
                                                    <div class="ctext-wrap">
                                                        <div class="ctext-wrap-content">
                                                            <p class="mb-0 ctext-content">Wow that's great</p>
                                                        </div>
                                                        <div class="dropdown align-self-start message-box-drop">
                                                            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="bi bi-three-dots-vertical"></i>
                                                            </a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-reply me-2 text-muted align-bottom"></i>Reply</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-share me-2 text-muted align-bottom"></i>Forward</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-files me-2 text-muted align-bottom"></i>Copy</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-bookmark me-2 text-muted align-bottom"></i>Bookmark</a>
                                                                <a class="dropdown-item delete-item" href="javascript:void(0)"><i class="bi bi-trash3 me-2 text-muted align-bottom"></i>Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="conversation-name"><small class="text-muted time">09:12 am</small> <span class="text-success check-message-icon"><i class="ri-check-double-line align-bottom"></i></span></div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- chat-list -->

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="position-relative p-4 border-top border-top-dashed">
                        <form class="chat-form" autocomplete="off">
                            <div class="row g-2">
                                <div class="col">
                                    <div class="position-relative">
                                        <input type="text" id="chat-input" class="form-control border-light bg-light" placeholder="Enter Message...">
                                        <div class="chat-input-feedback">
                                            Please enter a message
                                        </div>
                                    </div>
                                </div><!-- end col -->
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-send-fill"></i></button>
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </form>
                    </div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end .rightbar-->
    </div> <!-- end col -->
</div>

<div class="custom_modal" id="calendar_modal">
    <div class="card">
        <div class="card-header">
            <span type="button" class="close" style="float: right;" id="close_btn">&times;</span>
            <span id="modal_title" style="font-size: 24px;margin-right: 20px;"></span>&nbsp;&nbsp;<span id="company_name" style="float: right;font-size: 24px;"></span>
        </div>
        <div class="card-block">
            <div class="row" id="month_data" style="margin-top: 10px;"></div>
        </div>
        <div class="card-footer" style="border-radius: 0 0 15px 15px;border-top: 0;"></div>
    </div>
</div>

<div class="modal_back" id="modal_back" style="display: none;"></div>

<script type="text/javascript">
var video_id;
$(document).ready(function() {
    $('#menu li').removeClass('active');
    $('#dashboard_menu').addClass('active');
});

function leapYear(year){
    return ((year % 4 === 0) && (year % 100 !== 0)) || (year % 400 === 0);
}

function calendar_view(obj, idx, total) {
    var day;
    var title;
    var td = ((document.getElementById("year_val")).innerHTML).trim();
    var year = parseInt(td);
    if (idx === 1){
        day = 32;
        title = "January";
    } else if (idx === 2) {
        if (leapYear(year) == false) {
            day = 29;
        } else {
            day = 30;
        }
        title = "February";
    } else if (idx === 3) {
        day = 32;
        title = "March";
    } else if (idx === 4) {
        day = 31;
        title = "April";
    } else if (idx === 5) {
        day = 32;
        title = "May";
    } else if (idx === 6) {
        day = 31;
        title = "June";
    } else if (idx === 7) {
        day = 32;
        title = "July";
    } else if (idx === 8) {
        day = 32;
        title = "August";
    } else if (idx === 9) {
        day = 31;
        title = "September";
    } else if (idx === 10) {
        day = 32;
        title = "October";
    } else if (idx === 11) {
        day = 31;
        title = "November";
    } else {
        day = 32;
        title = "December";
    }

	$(".preloader").show();
    $(".preloader img").show();
    $.post(_server_url + 'admin/Data/getDatabymonth', {
        'company_id': obj,
        'month' : idx,
    },
    function (data){
		$(".preloader").hide();
		$(".preloader img").hide();
        var result = JSON.parse(data);
        if (result['status'] === "OK") {
            var rel = result['month_data'];
            var modal = "";
            var company_name = result['company_name'];
            for (var i = 1; i < day; i++) {
                var counts = 0;
                var flag = false;
                for (var j = 0; j < rel.length; j++){
                    var item = rel[j];
                    if (item['day'] == i) {
                        flag = true;
                        counts = item['counts'];
                    } else {
                        flag = false;
                    }
                }
                if (i < 10){
                    i = "0" +i;
                }
                 var month = item['month'];
                 if (month < 10){
                    month = "0" +month;
                }
                modal += '<div class="col-sm-2 col-xs-2" style="padding:5px 2%; text-align: center;">';
                modal += '<span style="font-size: 15px; font-weight: bold">' +
            i + ': <a href="javascript:void(0);" onclick="get_video_by_date('+obj+',\''+item['year']+'-'+month+'-'+i+'\');"><span style="font-size: 15px; color: blue;">' + counts + '</span></a>';
                modal += '</div>';
            }
            $('#month_data').html(modal);
            document.getElementById('modal_title').innerHTML = title+ " (" + total + ")";
            document.getElementById('company_name').innerHTML = company_name;

            $('#modal_back').css('display', 'block');
            $('#calendar_modal').css('display', 'block');
        } else {
            Swal.fire({
                title: "<?php echo $warning;?>",
                text: "<?php echo $no_data[1];?>",
                icon: "warning",
            });
        }
    });
}

function get_video_by_date(company_id,date){
    $(".preloader").show();
    $(".preloader img").show();
    $.ajax({
        type:"get",
        url:_server_url + 'admin/main/get_video_by_date',
        data:{'company_id': company_id,'date':date},
        dataType:"json",
        success:function(resp){
			close_view_modal();
            $(".preloader").hide();
            $(".preloader img").hide();
            $('#search_status').html("by Date");
            $('#video-table').show();
            $("#all_video_list").html(resp.content);

            $('#all_video_list table').DataTable({
                "bFilter":false,
                "bInfo": false,
                "bLengthChange" : false,
                "pageLength": 20,
                 "aaSorting": [],
                  "aoColumnDefs": [
                    { "bSortable": false, "aTargets": [ 0, 1, 2, 3,4,5,6,7,8 ] }, 
                    { "bSearchable": false, "aTargets": [ 0, 1, 2, 3,4,5,6,7,8  ] }
                ],
                "language": {
                    "paginate": {
                      "previous": '<i class="mdi mdi-chevron-double-left"></i>',
                      "next": '<i class="mdi mdi-chevron-double-right"></i>'
                    }
                  },
                 
                 "fnDrawCallback": function(oSettings) {
                    if ($('#DataTables_Table_0 tr').length < 21) {
                        $('.dataTables_paginate').hide();
                    }
                  }
            });
        }

    })
}

function get_video_by_month(month){   
    $(".preloader").show();
    $(".preloader img").show();
    $("#all_video_list").html("");
    $.ajax({
        type:"get",
        url:_server_url + 'admin/main/get_video_by_month',
        data:{'month':month},
        dataType:"json",
        success:function(resp){
            $(".preloader").hide();
            $(".preloader img").hide();
            if(resp.total_count > 0){
                $('#search_status').html("by Month");
            $('#video-table').show();
                $("#all_video_list").html(resp.content);

                $('#all_video_list table').DataTable({
                    "bFilter":false,
                    "bInfo": false,
                    "bLengthChange" : false,
                    "pageLength": 20,
                     "aaSorting": [],
                      "aoColumnDefs": [
                        { "bSortable": false, "aTargets": [ 0, 1, 2, 3,4,5,6,7,8 ] }, 
                        { "bSearchable": false, "aTargets": [ 0, 1, 2, 3,4,5,6,7,8  ] }
                    ],
                    "language": {
                        "paginate": {
                          "previous": '<i class="mdi mdi-chevron-double-left"></i>',
                          "next": '<i class="mdi mdi-chevron-double-right"></i>'
                        }
                    },
                    "fnDrawCallback": function(oSettings) {
                        if ($('#DataTables_Table_0 tr').length < 21) {
                            $('.dataTables_paginate').hide();
                        }
                    }
                });               
            }else{
                 swal({
                    title: "<?php echo $warning;?>",
                    text: "<?php echo $no_data[1];?>",
                    icon: "warning",
                });
            }
        }
    })
}


</script>