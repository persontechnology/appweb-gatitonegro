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
						<a href="#" class="navbar-nav-link dropdown-toggle rounded {{ Route::is(['servicios*']?'active':'') }}" data-bs-toggle="dropdown">
							<i class="ph-note-blank me-2"></i>
							ADMINISTRACIÓN
						</a>

						<div class="dropdown-menu">
							
							<a href="{{ route('servicios.index') }}" class="dropdown-item rounded">SERVICIOS</a>
							<a href="{{ route('dashboard') }}" class="dropdown-item rounded">RESERVACIONES</a>
							<a href="{{ route('dashboard') }}" class="dropdown-item rounded">USUARIOS</a>
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
						<a href="#" class="dropdown-item">
							<i class="ph-currency-circle-dollar me-2"></i>
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

						<ul class="nav">
							<li class="nav-item">
								<a href="https://kopyov.ticksy.com/" class="navbar-nav-link navbar-nav-link-icon rounded" target="_blank">
									<div class="d-flex align-items-center mx-md-1">
										<i class="ph-lifebuoy"></i>
										<span class="d-none d-md-inline-block ms-2">Support</span>
									</div>
								</a>
							</li>
							<li class="nav-item ms-md-1">
								<a href="https://demo.interface.club/limitless/demo/Documentation/index.html" class="navbar-nav-link navbar-nav-link-icon rounded" target="_blank">
									<div class="d-flex align-items-center mx-md-1">
										<i class="ph-file-text"></i>
										<span class="d-none d-md-inline-block ms-2">Docs</span>
									</div>
								</a>
							</li>
							<li class="nav-item ms-md-1">
								<a href="https://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov" class="navbar-nav-link navbar-nav-link-icon text-primary bg-primary bg-opacity-10 fw-semibold rounded" target="_blank">
									<div class="d-flex align-items-center mx-md-1">
										<i class="ph-shopping-cart"></i>
										<span class="d-none d-md-inline-block ms-2">Purchase</span>
									</div>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- /footer -->

			</div>
			<!-- /inner content -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->


	<!-- Notifications -->
	<div class="offcanvas offcanvas-end" tabindex="-1" id="notifications">
		<div class="offcanvas-header py-0">
			<h5 class="offcanvas-title py-3">Activity</h5>
			<button type="button" class="btn btn-light btn-sm btn-icon border-transparent rounded-pill" data-bs-dismiss="offcanvas">
				<i class="ph-x"></i>
			</button>
		</div>

		<div class="offcanvas-body p-0">
			<div class="bg-light fw-medium py-2 px-3">New notifications</div>
			<div class="p-3">
				<div class="d-flex align-items-start mb-3">
					<a href="#" class="status-indicator-container me-3">
						<img src="../../../assets/images/demo/users/face1.jpg" class="w-40px h-40px rounded-pill" alt="">
						<span class="status-indicator bg-success"></span>
					</a>
					<div class="flex-fill">
						<a href="#" class="fw-semibold">James</a> has completed the task <a href="#">Submit documents</a> from <a href="#">Onboarding</a> list

						<div class="bg-light rounded p-2 my-2">
							<label class="form-check ms-1">
								<input type="checkbox" class="form-check-input" checked disabled>
								<del class="form-check-label">Submit personal documents</del>
							</label>
						</div>

						<div class="fs-sm text-muted mt-1">2 hours ago</div>
					</div>
				</div>

				<div class="d-flex align-items-start mb-3">
					<a href="#" class="status-indicator-container me-3">
						<img src="../../../assets/images/demo/users/face3.jpg" class="w-40px h-40px rounded-pill" alt="">
						<span class="status-indicator bg-warning"></span>
					</a>
					<div class="flex-fill">
						<a href="#" class="fw-semibold">Margo</a> has added 4 users to <span class="fw-semibold">Customer enablement</span> channel

						<div class="d-flex my-2">
							<a href="#" class="status-indicator-container me-1">
								<img src="../../../assets/images/demo/users/face10.jpg" class="w-32px h-32px rounded-pill" alt="">
								<span class="status-indicator bg-danger"></span>
							</a>
							<a href="#" class="status-indicator-container me-1">
								<img src="../../../assets/images/demo/users/face11.jpg" class="w-32px h-32px rounded-pill" alt="">
								<span class="status-indicator bg-success"></span>
							</a>
							<a href="#" class="status-indicator-container me-1">
								<img src="../../../assets/images/demo/users/face12.jpg" class="w-32px h-32px rounded-pill" alt="">
								<span class="status-indicator bg-success"></span>
							</a>
							<a href="#" class="status-indicator-container me-1">
								<img src="../../../assets/images/demo/users/face13.jpg" class="w-32px h-32px rounded-pill" alt="">
								<span class="status-indicator bg-success"></span>
							</a>
							<button type="button" class="btn btn-light btn-icon d-inline-flex align-items-center justify-content-center w-32px h-32px rounded-pill p-0">
								<i class="ph-plus ph-sm"></i>
							</button>
						</div>

						<div class="fs-sm text-muted mt-1">3 hours ago</div>
					</div>
				</div>

				<div class="d-flex align-items-start">
					<div class="me-3">
						<div class="bg-warning bg-opacity-10 text-warning rounded-pill">
							<i class="ph-warning p-2"></i>
						</div>
					</div>
					<div class="flex-1">
						Subscription <a href="#">#466573</a> from 10.12.2021 has been cancelled. Refund case <a href="#">#4492</a> created
						<div class="fs-sm text-muted mt-1">4 hours ago</div>
					</div>
				</div>
			</div>

			<div class="bg-light fw-medium py-2 px-3">Older notifications</div>
			<div class="p-3">
				<div class="d-flex align-items-start mb-3">
					<a href="#" class="status-indicator-container me-3">
						<img src="../../../assets/images/demo/users/face25.jpg" class="w-40px h-40px rounded-pill" alt="">
						<span class="status-indicator bg-success"></span>
					</a>
					<div class="flex-fill">
						<a href="#" class="fw-semibold">Nick</a> requested your feedback and approval in support request <a href="#">#458</a>

						<div class="my-2">
							<a href="#" class="btn btn-success btn-sm me-1">
								<i class="ph-checks ph-sm me-1"></i>
								Approve
							</a>
							<a href="#" class="btn btn-light btn-sm">
								Review
							</a>
						</div>

						<div class="fs-sm text-muted mt-1">3 days ago</div>
					</div>
				</div>

				<div class="d-flex align-items-start mb-3">
					<a href="#" class="status-indicator-container me-3">
						<img src="../../../assets/images/demo/users/face24.jpg" class="w-40px h-40px rounded-pill" alt="">
						<span class="status-indicator bg-grey"></span>
					</a>
					<div class="flex-fill">
						<a href="#" class="fw-semibold">Mike</a> added 1 new file(s) to <a href="#">Product management</a> project

						<div class="bg-light rounded p-2 my-2">
							<div class="d-flex align-items-center">
								<div class="me-2">
									<img src="../../../assets/images/icons/pdf.svg" width="34" height="34" alt="">
								</div>
								<div class="flex-fill">
									new_contract.pdf
									<div class="fs-sm text-muted">112KB</div>
								</div>
								<div class="ms-2">
									<button type="button" class="btn btn-flat-dark text-body btn-icon btn-sm border-transparent rounded-pill">
										<i class="ph-arrow-down"></i>
									</button>
								</div>
							</div>
						</div>

						<div class="fs-sm text-muted mt-1">1 day ago</div>
					</div>
				</div>

				<div class="d-flex align-items-start mb-3">
					<div class="me-3">
						<div class="bg-success bg-opacity-10 text-success rounded-pill">
							<i class="ph-calendar-plus p-2"></i>
						</div>
					</div>
					<div class="flex-fill">
						All hands meeting will take place coming Thursday at 13:45.

						<div class="my-2">
							<a href="#" class="btn btn-primary btn-sm">
								<i class="ph-calendar-plus ph-sm me-1"></i>
								Add to calendar
							</a>
						</div>

						<div class="fs-sm text-muted mt-1">2 days ago</div>
					</div>
				</div>

				<div class="d-flex align-items-start mb-3">
					<a href="#" class="status-indicator-container me-3">
						<img src="../../../assets/images/demo/users/face4.jpg" class="w-40px h-40px rounded-pill" alt="">
						<span class="status-indicator bg-danger"></span>
					</a>
					<div class="flex-fill">
						<a href="#" class="fw-semibold">Christine</a> commented on your community <a href="#">post</a> from 10.12.2021

						<div class="fs-sm text-muted mt-1">2 days ago</div>
					</div>
				</div>

				<div class="d-flex align-items-start mb-3">
					<div class="me-3">
						<div class="bg-primary bg-opacity-10 text-primary rounded-pill">
							<i class="ph-users-four p-2"></i>
						</div>
					</div>
					<div class="flex-fill">
						<span class="fw-semibold">HR department</span> requested you to complete internal survey by Friday

						<div class="fs-sm text-muted mt-1">3 days ago</div>
					</div>
				</div>

				<div class="text-center">
					<div class="spinner-border" role="status">
						<span class="visually-hidden">Loading...</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /notifications -->


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
			<a href="{{ url('/') }}" class="btn btn-yellow fw-semibold w-100 my-1">
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

    <script>
        function fnEliminar(arg){
            $('#urleliminar').attr('href',$(arg).data('url')) 
            $('#modal_centered').modal('show');
            $('#mensaje').html($(arg).data('mensaje'))
        }
    </script>


	@stack('scripts')
</body>
</html>