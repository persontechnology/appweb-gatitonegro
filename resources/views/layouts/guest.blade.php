<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Global stylesheets -->
	<link href="{{ asset('assets/fonts/inter/inter.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/icons/phosphor/styles.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/all.min.css') }}" id="stylesheet" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{ asset('assets/demo/demo_configurator.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{ asset('assets/js/app.js') }}"></script>
	<!-- /theme JS files -->

</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-dark bg-pink navbar-static py-2">
		<div class="container-fluid">
			<div class="navbar-brand">
				<a href="{{ url('/') }}" class="d-inline-flex align-items-center">
					<img src="../../../assets/images/logo_icon.svg" alt="">
					<img src="../../../assets/images/logo_text_light.svg" class="d-none d-sm-inline-block h-16px ms-3" alt="">
				</a>
			</div>

			<div class="d-flex justify-content-end align-items-center ms-auto">
				<ul class="navbar-nav flex-row">
					<li class="nav-item">
						<a href="{{ url('/') }}" class="navbar-nav-link navbar-nav-link-icon rounded ms-1 {{ Route::is('inicio')?'active':'' }}">
							<div class="d-flex align-items-center mx-md-1">
							<i class="ph-house"></i>
							<span class="d-none d-md-inline-block ms-2">Inicio</span>
						</div>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('register') }}" class="navbar-nav-link navbar-nav-link-icon rounded ms-1 {{ Route::is('register')?'active':'' }}">
							<div class="d-flex align-items-center mx-md-1">
							<i class="ph-user-circle-plus"></i>
							<span class="d-none d-md-inline-block ms-2">Registro</span>
						</div>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('login') }}" class="navbar-nav-link navbar-nav-link-icon rounded ms-1 {{ Route::is('login')?'active':'' }}">
							<div class="d-flex align-items-center mx-md-1">
							<i class="ph-user-circle"></i>
							<span class="d-none d-md-inline-block ms-2">Ingresar</span>
						</div>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Inner content -->
			<div class="content-inner">
				<!-- Page header -->
				@if (isset($header))
					{{ $header }}
				@endif
				<!-- /page header -->
				
				@include('layouts.errors')
				@foreach (['success', 'warning', 'info', 'danger', 'primary'] as $msg)
					@if (Session::has($msg))
						@include('layouts.alert', ['type' => $msg, 'msg' => Session::get($msg)])
					@endif
				@endforeach
				
				<!-- Content area -->
				<div class="content d-flex justify-content-center align-items-center">

                    {{ $slot }}

				</div>
				<!-- /content area -->


				<!-- Footer -->
				<div class="navbar navbar-sm navbar-footer border-top">
					<div class="container-fluid">
						<span>&copy; 2022 <a href="#">{{ config('app.name') }}</a></span>

						
					</div>
				</div>
				<!-- /footer -->

			</div>
			<!-- /inner content -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->


	<!-- Demo config -->
	<div class="offcanvas offcanvas-end" tabindex="-1" id="demo_config">
		<div class="position-absolute top-50 end-100 visible">
			<button type="button" class="btn btn-primary btn-icon translate-middle-y rounded-end-0" data-bs-toggle="offcanvas" data-bs-target="#demo_config">
				<i class="ph-gear"></i>
			</button>
		</div>

		<div class="offcanvas-header border-bottom py-0">
			<h5 class="offcanvas-title py-3">Configuración</h5>
			<button type="button" class="btn btn-light btn-sm btn-icon border-transparent rounded-pill" data-bs-dismiss="offcanvas">
				<i class="ph-x"></i>
			</button>
		</div>

		<div class="offcanvas-body">
			<div class="fw-semibold mb-2">Modo de color</div>
			<div class="list-group mb-3">
				<label class="list-group-item list-group-item-action form-check border-width-1 rounded mb-2">
					<div class="d-flex flex-fill my-1">
						<div class="form-check-label d-flex me-2">
							<i class="ph-sun ph-lg me-3"></i>
							<div>
								<span class="fw-bold">CLARO</span>
								<div class="fs-sm text-muted">Establecer tema claro o restablecer el valor predeterminado</div>
							</div>
						</div>
						<input type="radio" class="form-check-input cursor-pointer ms-auto" name="main-theme" value="light" checked>
					</div>
				</label>

				<label class="list-group-item list-group-item-action form-check border-width-1 rounded mb-2">
					<div class="d-flex flex-fill my-1">
						<div class="form-check-label d-flex me-2">
							<i class="ph-moon ph-lg me-3"></i>
							<div>
								<span class="fw-bold">OSCURO</span>
								<div class="fs-sm text-muted">Cambiar al tema oscuro</div>
							</div>
						</div>
						<input type="radio" class="form-check-input cursor-pointer ms-auto" name="main-theme" value="dark">
					</div>
				</label>

				<label class="list-group-item list-group-item-action form-check border-width-1 rounded mb-0">
					<div class="d-flex flex-fill my-1">
						<div class="form-check-label d-flex me-2">
							<i class="ph-translate ph-lg me-3"></i>
							<div>
								<span class="fw-bold">Auto</span>
								<div class="fs-sm text-muted">Establecer tema según el modo del sistema</div>
							</div>
						</div>
						<input type="radio" class="form-check-input cursor-pointer ms-auto" name="main-theme" value="auto">
					</div>
				</label>
			</div>

			

			
		</div>

		<div class="border-top text-center py-2 px-3">
			<a href="{{ url('/') }}" class="btn btn-success fw-semibold w-100 my-1">
				<i class="ph-shopping-cart me-2"></i>
				SERVICIOS
			</a>
		</div>
	</div>
	<!-- /demo config -->

</body>
</html>
