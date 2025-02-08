                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <!-- <div>
                    <button type="button" class="btn-success btn-rounded shadow-lg btn btn-icon layout-rightside-btn fs-22"><i class="ri-chat-smile-2-line"></i></button>
                </div> -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © VISERV
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                © All rights reserved
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->



        <!--start back-to-top-->
        <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
            <i class="ri-arrow-up-line"></i>
        </button>
        <!--end back-to-top-->

        <!--preloader-->
        <div id="preloader">
            <div id="status">
                <div class="spinner-border text-primary avatar-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src="<?=base_url();?>assets/libs/bootstrap/js/bootstrap.bundle.min.js?_=<?php echo time();?>"></script>
        <script src="<?=base_url();?>assets/libs/simplebar/simplebar.min.js?_=<?php echo time();?>"></script>
        <script src="<?=base_url();?>assets/js/pages/plugins/lord-icon-2.1.0.js?_=<?php echo time();?>"></script>
        <!-- <script src="<?=base_url();?>assets/js/plugins.js?_=<?php echo time();?>"></script> -->

        <!-- apexcharts -->
        <script src="<?=base_url();?>assets/libs/apexcharts/apexcharts.min.js?_=<?php echo time();?>"></script>
        <script src="<?=base_url();?>assets/libs/sweetalert2/sweetalert2.min.js?_=<?php echo time();?>"></script>

        <!-- Vector map-->
        <script src="<?=base_url();?>assets/libs/jsvectormap/js/jsvectormap.min.js?_=<?php echo time();?>"></script>
        <script src="<?=base_url();?>assets/libs/jsvectormap/maps/world-merc.js?_=<?php echo time();?>"></script>

        <!--Swiper slider js-->
        <script src="<?=base_url();?>assets/libs/swiper/swiper-bundle.min.js?_=<?php echo time();?>"></script>

        <!-- Dashboard init -->
        <script src="<?=base_url();?>assets/js/pages/dashboard-ecommerce.init.js?_=<?php echo time();?>"></script>
        <script src="<?=base_url();?>assets/js/pages/sweetalerts.init.js?_=<?php echo time();?>"></script>

        <!-- App js -->
        <script src="<?=base_url();?>assets/js/app.js?_=<?php echo time();?>"></script>

        <script type="text/javascript">

            var company_id = $("#company_id").val();
            var lang_status = $("#lang_status").val();

            $(document).ready(function () {
                $("#modal_back").click(function(event) {
                   close_view_modal();
                });
            });

            function close_view_modal() {
                $('.bs-example-modal-xl').modal('hide');
                $('#modal_back').css('display', 'none');
                $('.custom_modal').css('display', 'none');
                $('span.error_case').hide();
            }

            $(function () {
                $('.close').on('click', function () {
                    close_view_modal();
                })
            });

            function go_next_page(origin_page, data){
                
                location.href =_server_url + 'manager/go_'+origin_page+'?id='+ data + '&lang=' + lang_status;
                if (origin_page == 'videos') {
                    page_refresh();
                }

            }

            function page_refresh()
            {
                $(".preloader").show();
                $(".preloader img").show();
                $.ajax({
                    type:"get",
                    url:_server_url + 'manager/check_videoStatus',
                    data:{'company_id': company_id, 'lang': lang_status},
                    dataType:"json",
                    success:function(resp) {
                        let state = localStorage.getItem('datatable-state');
                        let initialState = state ? JSON.parse(state) : {};
                        let table = null;
                        $(".preloader").hide();
                        $(".preloader img").hide();
                        $("#updated_list").empty();
                        $("#updated_list").html(resp.content);
                        if ($('#offer_status').val() == "0") {
                            table = $('#updated_list table').DataTable({
                                "bFilter":true,
                                "bInfo": false,
                                "bLengthChange" : false,
                                "pageLength": 10,
                                "aaSorting": [],
                                "aoColumnDefs": [
                                    { "bSortable": false, "aTargets": [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ] },
                                    { "bSearchable": true, "aTargets": [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ] }
                                ],
                                "language": {
                                    "paginate": {
                                        "previous": '<i class="mdi mdi-chevron-double-left"></i>',
                                        "next": '<i class="mdi mdi-chevron-double-right"></i>'
                                    }
                                },
                                "fnDrawCallback": function(oSettings) {
                                    // if ($('#DataTables_Table_0 tr').length < 11) {
                                    //     $('.dataTables_paginate').hide();
                                    // } else if ($('#DataTables_Table_0 tr').length < 11)
                                },
                                "statedSaveParams": function(settings, data) {
                                    localStorage.setItem('datatable-state', JSON.stringify(data));
                                },
                                "stateLoadParams": function(settings, data) {
                                    if (initialState) {
                                        // Load saved state
                                        return initialState;
                                    }
                                }
                            });
                        } else {
                            table = $('#updated_list table').DataTable({
                                "bFilter":true,
                                "bInfo": false,
                                "bLengthChange" : false,
                                "pageLength": 10,
                                "aaSorting": [],
                                "aoColumnDefs": [
                                    { "bSortable": false, "aTargets": [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ] },
                                    { "bSearchable": true, "aTargets": [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ] }
                                ],
                                "language": {
                                    "paginate": {
                                        "previous": '<i class="mdi mdi-chevron-double-left"></i>',
                                        "next": '<i class="mdi mdi-chevron-double-right"></i>'
                                    }
                                },
                                "fnDrawCallback": function(oSettings) {
                                    // if ($('#DataTables_Table_0 tr').length < 11) {
                                    //     $('.dataTables_paginate').hide();
                                    // } else if ($('#DataTables_Table_0 tr').length < 11)
                                },
                                "statedSaveParams": function(settings, data) {
                                    localStorage.setItem('datatable-state', JSON.stringify(data));
                                },
                                "stateLoadParams": function(settings, data) {
                                    if (initialState) {
                                        // Load saved state
                                        return initialState;
                                    }
                                }
                            });
                        }

                        table.on('page.dt', function() {
                            let info = table.page.info();
                            localStorage.setItem('currentPage', info.page);
                        });

                        // Retrieve and set the page number on page load
                        let currentPage = localStorage.getItem('currentPage');
                        if (currentPage !== null) {
                            table.page(parseInt(currentPage)).draw('page');
                        }
                    }
                });
            }

            function select_lang(id){
                var lang = '';
                var page_name = $('#page_name').val();
                $('.preloader').show();
                $.post(_server_url + 'manager/companyUpdate',{
                    'company_id' : $('#company_id').val(),
                    'lang': id
                },
                function (data) {
                    $('.preloader').hide();
                    var res = JSON.parse(data);
                    if(res.status === 'success') {
                        if (id == 1) {
                            lang = 'ee';
                        } else {
                            lang = 'en';
                        }
                        // location.href =_server_url + 'manager/companyList?lang=' + lang_status;
                        location.href =_server_url + 'manager/'+ page_name +'?id='+ company_id + '&lang=' + lang;
                    }else {
                        Swal.fire({title: "<?php echo $failed;?>", text: "<?php echo $alert_content[6];?>", icon: "warning"});
                    }
                });
            }

            
            function go_logout() {
                Swal.fire({
                    title: "<?php echo $warning;?>",
                    text: "<?php echo $alert_content[0];?>",
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
                        window.location.href = _server_url + "manager/go_logout";
                    } 
                });
            }
            
        </script>

    </body>

</html>