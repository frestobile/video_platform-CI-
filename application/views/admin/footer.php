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

        <!-- <div class="customizer-setting d-none d-md-block">
            <div class="btn-info btn-rounded shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
                <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
            </div>
        </div> -->

        <!-- Theme Settings -->
        <div class="offcanvas offcanvas-end border-0" tabindex="-1" id="theme-settings-offcanvas">
            <div class="d-flex align-items-center bg-primary bg-gradient p-3 offcanvas-header">
                <h5 class="m-0 me-2 text-white">Theme Customizer</h5>

                <button type="button" class="btn-close btn-close-white ms-auto" id="customizerclose-btn" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body p-0">
                <div data-simplebar class="h-100">
                    <div class="p-4">
                        <h6 class="fw-semibold fs-15">Layout</h6>
                        <p class="text-muted fs-13">Choose your layout</p>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input id="customizer-layout01" name="data-layout" type="radio" value="vertical" class="form-check-input">
                                    <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout01">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-13 text-center mt-2">Vertical</h5>
                            </div>
                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input id="customizer-layout02" name="data-layout" type="radio" value="horizontal" class="form-check-input">
                                    <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout02">
                                        <span class="d-flex h-100 flex-column gap-1">
                                            <span class="bg-light d-flex p-1 gap-1 align-items-center">
                                                <span class="d-block p-1 bg-primary-subtle rounded me-1"></span>
                                                <span class="d-block p-1 pb-0 px-2 bg-primary-subtle ms-auto"></span>
                                                <span class="d-block p-1 pb-0 px-2 bg-primary-subtle"></span>
                                            </span>
                                            <span class="bg-light d-block p-1"></span>
                                            <span class="bg-light d-block p-1 mt-auto"></span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-13 text-center mt-2">Horizontal</h5>
                            </div>
                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input id="customizer-layout03" name="data-layout" type="radio" value="twocolumn" class="form-check-input">
                                    <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout03">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1">
                                                    <span class="d-block p-1 bg-primary-subtle mb-2"></span>
                                                    <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-13 text-center mt-2">Two Column</h5>
                            </div>
                            <!-- end col -->
                        </div>

                        <h6 class="mt-4 fw-semibold">Color Scheme</h6>
                        <p class="text-muted fs-13">Choose Light or Dark Scheme.</p>

                        <div class="colorscheme-cardradio">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check card-radio">
                                        <input class="form-check-input" type="radio" name="data-bs-theme" id="layout-mode-light" value="light">
                                        <label class="form-check-label p-0 avatar-md w-100" for="layout-mode-light">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                        <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Light</h5>
                                </div>

                                <div class="col-4">
                                    <div class="form-check card-radio dark">
                                        <input class="form-check-input" type="radio" name="data-bs-theme" id="layout-mode-dark" value="dark">
                                        <label class="form-check-label p-0 avatar-md w-100 bg-dark" for="layout-mode-dark">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="d-flex h-100 flex-column gap-1 p-1">
                                                        <span class="d-block p-1 px-2 rounded bg-dark-subtle mb-2"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-dark-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-dark-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-dark-subtle"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="d-block  bg-dark-subtle p-1"></span>
                                                        <span class="d-block  bg-dark-subtle p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Dark</h5>
                                </div>
                            </div>
                        </div>

                        <div id="layout-width">
                            <h6 class="mt-4 fw-semibold fs-15">Layout Width</h6>
                            <p class="text-muted fs-13">Choose Fluid or Boxed layout.</p>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check card-radio">
                                        <input class="form-check-input" type="radio" name="data-layout-width" id="layout-width-fluid" value="fluid">
                                        <label class="form-check-label p-0 avatar-md w-100" for="layout-width-fluid">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                        <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Fluid</h5>
                                </div>
                                <div class="col-4">
                                    <div class="form-check card-radio">
                                        <input class="form-check-input" type="radio" name="data-layout-width" id="layout-width-boxed" value="boxed">
                                        <label class="form-check-label p-0 avatar-md w-100 px-2" for="layout-width-boxed">
                                            <span class="d-flex gap-1 h-100 border-start border-end">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                        <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Boxed</h5>
                                </div>
                            </div>
                        </div>

                        <div id="layout-position">
                            <h6 class="mt-4 fw-semibold fs-15">Layout Position</h6>
                            <p class="text-muted fs-13">Choose Fixed or Scrollable Layout Position.</p>

                            <div class="btn-group radio" role="group">
                                <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-fixed" value="fixed">
                                <label class="btn btn-light w-sm" for="layout-position-fixed">Fixed</label>

                                <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-scrollable" value="scrollable">
                                <label class="btn btn-light w-sm ms-0" for="layout-position-scrollable">Scrollable</label>
                            </div>
                        </div>
                        <h6 class="mt-4 fw-semibold fs-13">Topbar Color</h6>
                        <p class="text-muted">Choose Light or Dark Topbar Color.</p>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input class="form-check-input" type="radio" name="data-topbar" id="topbar-color-light" value="light">
                                    <label class="form-check-label p-0 avatar-md w-100" for="topbar-color-light">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-13 text-center mt-2">Light</h5>
                            </div>
                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input class="form-check-input" type="radio" name="data-topbar" id="topbar-color-dark" value="dark">
                                    <label class="form-check-label p-0 avatar-md w-100" for="topbar-color-dark">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-primary d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-13 text-center mt-2">Dark</h5>
                            </div>
                        </div>

                        <div id="sidebar-size">
                            <h6 class="mt-4 fw-semibold fs-15">Sidebar Size</h6>
                            <p class="text-muted fs-13">Choose a size of Sidebar.</p>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidebar-size" id="sidebar-size-default" value="lg">
                                        <label class="form-check-label p-0 avatar-md w-100" for="sidebar-size-default">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                        <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Default</h5>
                                </div>

                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidebar-size" id="sidebar-size-compact" value="md">
                                        <label class="form-check-label p-0 avatar-md w-100" for="sidebar-size-compact">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                        <span class="d-block p-1 bg-primary-subtle rounded mb-2"></span>
                                                        <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Compact</h5>
                                </div>

                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidebar-size" id="sidebar-size-small" value="sm">
                                        <label class="form-check-label p-0 avatar-md w-100" for="sidebar-size-small">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1">
                                                        <span class="d-block p-1 bg-primary-subtle mb-2"></span>
                                                        <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Small (Icon View)</h5>
                                </div>

                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidebar-size" id="sidebar-size-small-hover" value="sm-hover">
                                        <label class="form-check-label p-0 avatar-md w-100" for="sidebar-size-small-hover">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1">
                                                        <span class="d-block p-1 bg-primary-subtle mb-2"></span>
                                                        <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Small Hover View</h5>
                                </div>
                            </div>
                        </div>

                        <div id="sidebar-view">
                            <h6 class="mt-4 fw-semibold fs-15">Sidebar View</h6>
                            <p class="text-muted fs-13">Choose Default or Detached Sidebar view.</p>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-layout-style" id="sidebar-view-default" value="default">
                                        <label class="form-check-label p-0 avatar-md w-100" for="sidebar-view-default">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                        <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Default</h5>
                                </div>
                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-layout-style" id="sidebar-view-detached" value="detached">
                                        <label class="form-check-label p-0 avatar-md w-100" for="sidebar-view-detached">
                                            <span class="d-flex h-100 flex-column">
                                                <span class="bg-light d-flex p-1 gap-1 align-items-center px-2">
                                                    <span class="d-block p-1 bg-primary-subtle rounded me-1"></span>
                                                    <span class="d-block p-1 pb-0 px-2 bg-primary-subtle ms-auto"></span>
                                                    <span class="d-block p-1 pb-0 px-2 bg-primary-subtle"></span>
                                                </span>
                                                <span class="d-flex gap-1 h-100 p-1 px-2">
                                                    <span class="flex-shrink-0">
                                                        <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                            <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                            <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                            <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        </span>
                                                    </span>
                                                </span>
                                                <span class="bg-light d-block p-1 mt-auto px-2"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Detached</h5>
                                </div>
                            </div>
                        </div>
                        <div id="sidebar-color">
                            <h6 class="mt-4 fw-semibold fs-15">Sidebar Color</h6>
                            <p class="text-muted fs-13">Choose a color of Sidebar.</p>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio" data-bs-toggle="collapse" data-bs-target="#collapseBgGradient.show">
                                        <input class="form-check-input" type="radio" name="data-sidebar" id="sidebar-color-light" value="light">
                                        <label class="form-check-label p-0 avatar-md w-100" for="sidebar-color-light">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-white border-end d-flex h-100 flex-column gap-1 p-1">
                                                        <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Light</h5>
                                </div>
                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio" data-bs-toggle="collapse" data-bs-target="#collapseBgGradient.show">
                                        <input class="form-check-input" type="radio" name="data-sidebar" id="sidebar-color-dark" value="dark">
                                        <label class="form-check-label p-0 avatar-md w-100" for="sidebar-color-dark">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-primary d-flex h-100 flex-column gap-1 p-1">
                                                        <span class="d-block p-1 px-2 bg-light-subtle rounded mb-2"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-light-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-light-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-light-subtle"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Dark</h5>
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-link avatar-md w-100 p-0 overflow-hidden border collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBgGradient" aria-expanded="false" aria-controls="collapseBgGradient">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-vertical-gradient d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-light-subtle rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-light-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-light-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-light-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </button>
                                    <h5 class="fs-13 text-center mt-2">Gradient</h5>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="collapse" id="collapseBgGradient">
                                <div class="d-flex gap-2 flex-wrap img-switch p-2 px-3 bg-light rounded">

                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidebar" id="sidebar-color-gradient" value="gradient">
                                        <label class="form-check-label p-0 avatar-xs rounded-circle" for="sidebar-color-gradient">
                                            <span class="avatar-title rounded-circle bg-vertical-gradient"></span>
                                        </label>
                                    </div>
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidebar" id="sidebar-color-gradient-2" value="gradient-2">
                                        <label class="form-check-label p-0 avatar-xs rounded-circle" for="sidebar-color-gradient-2">
                                            <span class="avatar-title rounded-circle bg-vertical-gradient-2"></span>
                                        </label>
                                    </div>
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidebar" id="sidebar-color-gradient-3" value="gradient-3">
                                        <label class="form-check-label p-0 avatar-xs rounded-circle" for="sidebar-color-gradient-3">
                                            <span class="avatar-title rounded-circle bg-vertical-gradient-3"></span>
                                        </label>
                                    </div>
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-sidebar" id="sidebar-color-gradient-4" value="gradient-4">
                                        <label class="form-check-label p-0 avatar-xs rounded-circle" for="sidebar-color-gradient-4">
                                            <span class="avatar-title rounded-circle bg-vertical-gradient-4"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="sidebar-img">
                            <h6 class="mt-4 fw-semibold fs-15">Sidebar Images</h6>
                            <p class="text-muted fs-13">Choose a image of Sidebar.</p>

                            <div class="d-flex gap-2 flex-wrap img-switch">
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidebar-image" id="sidebarimg-none" value="none">
                                    <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-none">
                                        <span class="avatar-md w-auto bg-light d-flex align-items-center justify-content-center">
                                            <i class="ri-close-fill fs-20"></i>
                                        </span>
                                    </label>
                                </div>

                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidebar-image" id="sidebarimg-01" value="img-1">
                                    <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-01">
                                        <img src="<?=base_url();?>assets/images/sidebar/img-1.jpg" alt="" class="avatar-md w-auto object-cover">
                                    </label>
                                </div>

                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidebar-image" id="sidebarimg-02" value="img-2">
                                    <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-02">
                                        <img src="<?=base_url();?>assets/images/sidebar/img-2.jpg" alt="" class="avatar-md w-auto object-cover">
                                    </label>
                                </div>
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidebar-image" id="sidebarimg-03" value="img-3">
                                    <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-03">
                                        <img src="<?=base_url();?>assets/images/sidebar/img-3.jpg" alt="" class="avatar-md w-auto object-cover">
                                    </label>
                                </div>
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidebar-image" id="sidebarimg-04" value="img-4">
                                    <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-04">
                                        <img src="<?=base_url();?>assets/images/sidebar/img-4.jpg" alt="" class="avatar-md w-auto object-cover">
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div id="preloader-menu">
                            <h6 class="mt-4 fw-semibold fs-15">Preloader</h6>
                            <p class="text-muted fs-13">Choose a preloader.</p>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-preloader" id="preloader-view-custom" value="enable">
                                        <label class="form-check-label p-0 avatar-md w-100" for="preloader-view-custom">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                        <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                            <!-- <div id="preloader"> -->
                                            <div id="status" class="d-flex align-items-center justify-content-center">
                                                <div class="spinner-border text-primary avatar-xxs m-auto" role="status">
                                                    <span class="visually-hidden">Loading...</span>
                                                </div>
                                            </div>
                                            <!-- </div> -->
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Enable</h5>
                                </div>
                                <div class="col-4">
                                    <div class="form-check sidebar-setting card-radio">
                                        <input class="form-check-input" type="radio" name="data-preloader" id="preloader-view-none" value="disable">
                                        <label class="form-check-label p-0 avatar-md w-100" for="preloader-view-none">
                                            <span class="d-flex gap-1 h-100">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                        <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    </span>
                                                </span>
                                                <span class="flex-grow-1">
                                                    <span class="d-flex h-100 flex-column">
                                                        <span class="bg-light d-block p-1"></span>
                                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <h5 class="fs-13 text-center mt-2">Disable</h5>
                                </div>
                            </div>

                        </div><!-- end preloader-menu -->
                    </div>
                </div>

            </div>
            <div class="offcanvas-footer border-top p-3 text-center">
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-light w-100" id="reset-layout">Set as Default</button>
                    </div>
                    
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

        <script>

            var page = $("#page_name").val();

            function switch_langugage(id) {
                if (id === 0){
                    if (page === 'companyUpdate') {

                        var company_id = $("#company_id").val();
                        location.href =_server_url + 'admin/main/'+ page + '?id=' + company_id + '&lang=en';

                    } else if (page === 'videoUpdate') {

                        var video_id = $("#VD").val();
                        location.href =_server_url + 'admin/main/'+ page + '?VD=' + video_id + '&lang=en';

                    } else if (page === 'deviceUpdate') {

                        var device_id = $("#device_id").val();
                        location.href =_server_url + 'admin/main/'+ page + '?id=' + device_id + '&lang=en';

                    } else {

                        location.href =_server_url + 'admin/main/'+ page +'?lang=en';

                    }

                } else {
                    if (page === 'companyUpdate') {

                        var company_id = $("#company_id").val();
                        location.href =_server_url + 'admin/main/'+ page + '?id=' + company_id + '&lang=ee';

                    } else if (page === 'videoUpdate') {

                        var video_id = $("#VD").val();
                        location.href =_server_url + 'admin/main/'+ page + '?VD=' + video_id + '&lang=ee';

                    } else if (page === 'deviceUpdate') {

                        var device_id = $("#device_id").val();
                        location.href =_server_url + 'admin/main/'+ page + '?id=' + device_id + '&lang=ee';

                    } else {

                        location.href =_server_url + 'admin/main/'+ page +'?lang=ee';
                    }
                }

            }

            function close_view_modal() {
                $('.bs-example-modal-xl').modal('hide');
                $('#modal_back').css('display', 'none');
                $('.custom_modal').css('display', 'none');
            }
            
            $(function () {
                $('.close').on('click', function () {
                    close_view_modal();
                })
            });
            
            function logOut() {
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
                        window.location.href = _server_url + "admin/Data/logout";
                    } 
                });
            }
        </script>

    </body>

</html>