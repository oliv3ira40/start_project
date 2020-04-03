<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>BlueEye - Acesso negado</title>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="{{ asset('assets/favicon.png') }}">
		<link rel="icon" href="{{ asset('assets/favicon.png') }}" type="image/x-icon">
		
		<!-- vector map CSS -->
        <link href="{{ asset('admin_theme/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
		
		<!-- Custom CSS -->
        <link href="{{ asset('admin_theme/theme/dist/css/style.css') }}" rel="stylesheet" type="text/css">
    </head>

	<body>
		<!--Preloader-->
		<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->
		
		<div class="wrapper  error-page pa-0">
			<header class="sp-header">
				<div class="sp-logo-wrap pull-left">
					<a href="{{ route('adm.index') }}">
                        <img style="width: 170px;" class="brand-img" src="{{ asset('assets/logo.png') }}" alt="NBD"/>
                    </a>
				</div>
				<div class="form-group mb-0 pull-right">
					<a class="inline-block btn btn-primary" href="{{ route('adm.index') }}">Página inicial</a>
				</div>
				<div class="clearfix"></div>
			</header>
			
			<!-- Main Content -->
			<div class="page-wrapper pa-0 ma-0 error-bg-img">
				<div class="container-fluid">
					<!-- Row -->
					<div class="table-struct full-width full-height">
						<div class="table-cell vertical-align-middle auth-form-wrap">
							<div class="auth-form  ml-auto mr-auto no-float">
								<div class="row">
									<div class="col-sm-12 col-xs-12">
										<div class="mb-30">
											<span class="block error-head text-center txt-primary mb-10">500</span>
											<span class="text-center nonecase-font mb-20 block error-comment">Acesso negado</span>
											<p class="text-center">Você não tem permissão para acessar esta página</p>
										</div>	
									</div>	
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->	
				</div>
				
			</div>
			<!-- /Main Content -->
		
		</div>
		<!-- /#wrapper -->
		
		<!-- JavaScript -->
		
		<!-- jQuery -->
		<script src="{{ asset('admin_theme/vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="{{ asset('admin_theme/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('admin_theme/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') }}"></script>
		
		<!-- Slimscroll JavaScript -->
		<script src="{{ asset('admin_theme/theme/dist/js/jquery.slimscroll.js') }}"></script>
		
		<!-- Init JavaScript -->
		<script src="{{ asset('admin_theme/theme/dist/js/init.js') }}"></script>
	</body>
</html>
