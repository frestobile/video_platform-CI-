<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>

		<!-- META DATA -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <meta name="Description" content="VISERV VIDEOÜLEVAADE - Lihtne ja paindlik videoülevaade sõiduki seisukorrast.">
        <meta name="Author" content="Smartsolution">
        <meta name="keywords" content="viserv viservice, admin dashboard ">
        
        <!-- TITLE -->
		<title> <?=APP_ADMIN_NAME;?></title>

        <!-- FAVICON -->
        <link rel="icon" href="<?=base_url();?>assets/images/favicon.ico" type="image/x-icon">
		<link rel="shortcut icon" href="<?=base_url();?>assets/images/favicon.ico" type="image/x-icon">
        
        <!-- BOOTSTRAP CSS -->
        <link id="style" href="<?=base_url();?>assets/libs/bootstrap/css/bootstrap.min.css?_=<?=time();?>" rel="stylesheet">

        <!-- STYLE CSS -->
        <link href="<?=base_url();?>assets/login/css/style.css?_=<?=time();?>" rel="stylesheet">

        <!--- PLUGINS CSS -->
        <link href="<?=base_url();?>assets/login/css/plugins.css?_=<?=time();?>" rel="stylesheet">

        <!--- ICONS CSS -->
        <link href="<?=base_url();?>assets/login/css/icons.css?_=<?=time();?>" rel="stylesheet">

        <!--- ANIMATE CSS -->
        <link href="<?=base_url();?>assets/login/css/animated.css?_=<?=time();?>" rel="stylesheet">
        
        <!-- INTERNAL SWITCHER CSS -->
        <link href="<?=base_url();?>assets/login/css/switcher.css?_=<?=time();?>" rel="stylesheet">
        <link href="<?=base_url();?>assets/login/css/demo.css?_=<?=time();?>" rel="stylesheet">	'
    </head>
    <style>
        p.error-msg{ font-size: small; color: rgb(255, 0, 0); float: left; margin-top: -10px; display: none;}
    </style>
	<body class="bg-account app sidebar-mini ltr">

		<!--- GLOBAL LOADER -->
		<div id="global-loader" >
			<img src="<?=base_url();?>assets/images/loader.svg" alt="loader">
		</div>
		<!--- END GLOBAL LOADER -->

        <!-- PAGE -->

            <!-- MAIN-CONTENT -->
            <div class="page h-100">
                
				<div class="page-content">
					<div class="container text-center text-dark">
						<div class="row">
							<div class="col-lg-4 d-block mx-auto">
								<div class="row">
									<div class="col-xl-12 col-md-12 col-md-12">
										<div class="card">
											<div class="card-body">
												<div class="text-center mb-2">
													<a class="header-brand1" href="">
														<img src="<?=base_url();?>assets/images/viserv_logo.png"
															class="header-brand-img main-logo" alt="VISERV LOGO">
														<img src="<?=base_url();?>assets/images/logo-light.png"
															class="header-brand-img darklogo" alt="VISERV logo">
													</a>
												</div>
												<!-- <h3>Login</h3> -->
												<!-- <p class="text-muted">Sign In to Admin Account</p> -->
												<div class="row">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-addon bg-white"><i class="fa fa-user text-dark"></i></span>
                                                        <input type="text" class="form-control" placeholder="Username" id="username">
                                                    </div>
                                                    <p class="error-msg msg-user">Please enter admin username</p>
                                                </div>
												<div class="row">
                                                    <div class="input-group mb-4">
                                                        <span class="input-group-addon bg-white"><i
                                                                class="fa fa-unlock-alt text-dark"></i></span>
                                                        <input type="password" class="form-control" onkeypress="login_keypress(event);" placeholder="Password" id="password">
                                                    </div>
                                                    <p class="error-msg msg-pass">Please enter password.</p>
                                                </div>
												<div class="row">
													<div class="col-12">
														<a id="btn_login" class="btn btn-primary btn-block">Login</a>
													</div>
                                                    <p class="error-msg msg-incorrect" style="margin: 0;">Username or Password is incorrect!</p>
													<!-- <div class="col-12">
														<a href=""
															class="btn btn-link box-shadow-0 px-0">Forgot password?</a>
													</div> -->
												</div>
												<!-- <div class="mt-6 btn-list">
													<button type="button" class="btn btn-icon btn-facebook"><i
															class="fa fa-facebook"></i></button>
													<button type="button" class="btn btn-icon btn-google"><i
															class="fa fa-google"></i></button>
													<button type="button" class="btn btn-icon btn-twitter"><i
															class="fa fa-twitter"></i></button>
													<button type="button" class="btn btn-icon btn-dribbble"><i
															class="fa fa-dribbble"></i></button>
												</div> -->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

            </div>
            <!-- END MAIN-CONTENT -->

        <!-- END PAGE-->

        <!-- SCRIPTS -->
		
       <!-- JQUERY MIN JS -->
       <script src="<?=base_url();?>assets/libs/jquery/jquery.min.js"></script>

        <!-- BOOTSTRAP5 BUNDLE JS -->
        <script src="<?=base_url();?>assets/libs/bootstrap/popper.min.js"></script>
        <script src="<?=base_url();?>assets/libs/bootstrap/js/bootstrap.min.js"></script>

        <!-- MOMENT JS -->
        <script src="<?=base_url();?>assets/libs/moment/moment.min.js"></script>
                <!-- STICKY JS -->
        <script src="<?=base_url();?>assets/login/js/sticky.js"></script>

        <!-- COLOR THEME JS -->
		<script src="<?=base_url();?>assets/login/js/themeColors.js"></script>

        <!-- CUSTOM JS -->
        <script src="<?=base_url();?>assets/login/js/custom.js"></script>

        <script>
            var _server_url = "<?php echo base_url();?>";
            jQuery(document).ready(function() {
                $('#username').focus(function () {
                    $('p.msg-user').hide();
                    $('p.msg-blocked').hide();
                    $('p.msg-incorrect').hide();
                })

                $('#password').focus(function () {
                    $('p.msg-pass').hide();
                    $('p.msg-blocked').hide();
                    $('p.msg-incorrect').hide();
                })
            });
            function login_keypress(evt) {
                
                if ( evt.keyCode === 13 ) {
                    $('#btn_login').click();
                }
            }
            $('#btn_login').on("click", function (e) {
                if (validateForm()){
                    $.post(_server_url + 'admin/Data/login', {'username': $("#username").val(), 'password': $("#password").val()},
                    function (data) {
                        var val = JSON.parse(data);
                        if (val.status == 'ADMIN_SUCCESS') {
                            location.href = _server_url + 'admin/Main';
                        } else if (val.status == 'BLOCKED') {
                            $('p.msg-blocked').show();
                        } else {
                            $('p.msg-incorrect').show();
                        }
                    });
                }
            });

            function validateForm(){
                if(!$("#username").val()) {
                    $('p.msg-user').show();
                    return false
                }
                if(!$("#password").val()) {
                    $('p.msg-pass').show();
                    return false
                }
                return true;
            }
        </script>
	</body>
</html>
