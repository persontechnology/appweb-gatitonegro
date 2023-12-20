<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
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
	<script src="{{ asset('assets/js/vendor/visualization/echarts/echarts.min.js') }}"></script>
	<script src="{{ asset('assets/js/vendor/maps/echarts/world.js') }}"></script>
	<script src="{{ asset('assets/js/vendor/ui/fullcalendar/main.min.js') }}"></script>
	<script src="{{ asset('assets/js/vendor/ui/fullcalendar/locales-all.min.js') }}"></script>

	<script src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/js/vendor/tables/datatables/datatables.min.js') }}"></script>

	<script src="{{ asset('assets/js/app.js') }}"></script>
	<script src="{{ asset('assets/demo/charts/pages/dashboard_6/area_gradient.js') }}"></script>
	<script src="{{ asset('assets/demo/charts/pages/dashboard_6/map_europe_effect.js') }}"></script>
	<script src="{{ asset('assets/demo/charts/pages/dashboard_6/progress_sortable.js') }}"></script>
	<script src="{{ asset('assets/demo/charts/pages/dashboard_6/bars_grouped.js') }}"></script>
	<script src="{{ asset('assets/demo/charts/pages/dashboard_6/line_label_marks.js') }}"></script>
	<script src="{{ asset('assets/demo/pages/datatables_basic.js') }}"></script>

	<script type="text/javascript" src="https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.6/src/jquery.ez-plus.js"></script>
	<!-- /theme JS files -->

</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-dark bg-success navbar-expand-xl navbar-static shadow">
		<div class="container-fluid">
			<div class="navbar-brand flex-1">
				<a href="index.html" class="d-inline-flex align-items-center">
					<img src="{{ asset('assets/images/logo_icon.svg') }}" alt="">
					<img src="{{ asset('assets/images/logo_text_light.svg') }}" class="d-none d-sm-inline-block h-16px invert-dark ms-3" alt="">
				</a>
			</div>

			<div class="d-flex w-100 w-xl-auto overflow-auto overflow-xl-visible scrollbar-hidden border-top border-top-xl-0 order-1 order-xl-0 pt-2 pt-xl-0 mt-2 mt-xl-0">
				<ul class="nav gap-1 justify-content-center flex-nowrap flex-xl-wrap mx-auto">

					<li class="nav-item">
						<a href="{{ route('dashboard') }}" class="navbar-nav-link rounded {{ Route::is('dashboard')?'active':'' }}">
							<i class="ph-house me-2"></i>
							INICIO
						</a>
					</li>


					<li class="nav-item">
						<a href="{{ route('mis-reserva.index') }}" class="navbar-nav-link rounded {{ Route::is('mis-reserva*')?'active':'' }}">
							<i class="ph ph-shopping-bag-open me-2"></i>
							MIS RESERVAS
						</a>
					</li>

			

					@if (Auth::user()->perfil==='ADMIN')
					<li class="nav-item nav-item-dropdown-xl dropdown">
						<a href="#" class="navbar-nav-link dropdown-toggle rounded {{ Route::is('servicios*','reservas-admin*','usuarios.*')?'active':'' }}" data-bs-toggle="dropdown">
							<i class="ph-note-blank me-2"></i>
							ADMINISTRACIÓN
						</a>

						<div class="dropdown-menu">
							
							<a href="{{ route('servicios.index') }}" class="dropdown-item rounded">SERVICIOS</a>
							<a href="{{ route('reservas-admin.index') }}" class="dropdown-item rounded">RESERVACIONES</a>
							<a href="{{ route('usuarios.index') }}" class="dropdown-item rounded">USUARIOS</a>
						</div>
					</li>
					@endif

				</ul>
			</div>

			<ul class="nav gap-1 flex-xl-1 justify-content-end order-0 order-xl-1">
				

				{{-- <li class="nav-item">
					<a href="#" class="navbar-nav-link navbar-nav-link-icon rounded-pill" data-bs-toggle="offcanvas" data-bs-target="#notifications">
						<i class="ph-bell"></i>
						<span class="badge bg-yellow text-black position-absolute top-0 end-0 translate-middle-top zindex-1 rounded-pill mt-1 me-1">2</span>
					</a>
				</li> --}}

				<li class="nav-item nav-item-dropdown-xl dropdown">
					<a href="#" class="navbar-nav-link align-items-center rounded-pill p-1 {{ Route::is('profile.edit')?'active':'' }}" data-bs-toggle="dropdown">
						<div class="status-indicator-container">
							<img src="{{ asset('assets/images/usuario.png') }}" class="w-32px h-32px rounded-pill" alt="">
							<span class="status-indicator bg-white"></span>
						</div>
						<span class="d-none d-md-inline-block mx-md-2">{{ Auth::user()->email }}</span>
					</a>

					<div class="dropdown-menu dropdown-menu-end">
						<a href="{{ route('profile.edit') }}" class="dropdown-item">
							<i class="ph-user-circle me-2"></i>
							Mi perfil
						</a>
						<a href="{{ route('mis-reserva.index') }}" class="dropdown-item">
							<i class="ph ph-shopping-bag-open me-2"></i>
							Mis reservas
						</a>
						
						<div class="dropdown-divider"></div>
						
						

						<form method="POST" action="{{ route('logout') }}">
                            @csrf

							<a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="dropdown-item">
								<i class="ph-sign-out me-2"></i>
								Salir
							</a>
                        </form>


					</div>
				</li>
			</ul>
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


				<!-- Content area -->
				<div class="content container pt-0">

					@foreach (['success', 'warning', 'info', 'danger', 'primary'] as $msg)
						@if (Session::has($msg))
							@include('layouts.alert', ['type' => $msg, 'msg' => Session::get($msg)])
						@endif
					@endforeach

					
					@include('layouts.errors')
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

	{{-- eliminar --}}
	<div id="modal_centered" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">CONFIRMACIÓN</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>

				<div class="modal-body">
					<h6 class="fw-semibold">¿ESTÁ SEGURO DE ELIMINAR?</h6>
					<p id="mensaje"></p>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">NO</button>
                    <a href="" id="urleliminar" class="btn btn-success">SI</a>
				</div>
			</div>
		</div>
	</div>

{{-- cambiar estado de reserva --}}
	<form action="" id="formEstado" method="POST">
		@csrf
		<div id="modal_centered_estado" class="modal fade" tabindex="-1">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">CONFIRMACIÓN</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					</div>

					<div class="modal-body">
						<h6 class="fw-semibold">¿ESTÁ SEGURO DE CAMBIAR ESTADO A?</h6>
						<div class="border p-2 rounded">
							<div class="d-flex align-items-center">
								<input type="radio" name="estado" value="RESERVADO" id="dr_ls_c" required>
								<label class="ms-2" for="dr_ls_c">RESERVAR</label>
							</div>

							<div class="d-flex align-items-center mb-2">
								<input type="radio" name="estado" id="dr_ls_u" value="RECHAZADO" required>
								<label class="ms-2" for="dr_ls_u">RECHAZAR</label>
							</div>
						</div>

						<div class="form-floating mt-2">
							<textarea class="form-control" autofocus name="detalle_admin" placeholder="Placeholder" style="height: 100px;"></textarea>
							<label>INGRESE DETALLE</label>
						</div>

					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal">NO</button>
						<button type="submit" class="btn btn-success">SI</button>
					</div>
				</div>
			</div>
		</div>
	</form>

    <script>
        function fnEliminar(arg){
            $('#urleliminar').attr('href',$(arg).data('url')) 
            $('#modal_centered').modal('show');
            $('#mensaje').html($(arg).data('mensaje'))
        }

		function cambiarEstado(arg){
			$('#formEstado').attr('action',$(arg).data('url')) 
            $('#modal_centered_estado').modal('show');
		}
    </script>


	@stack('scripts')
</body>
</html>