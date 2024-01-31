<x-app-layout>
    <x-slot name="header">
        <div class="page-header">
            <div class="page-header-content container d-lg-flex">
                <div class="d-flex">
                    <h4 class="page-title mb-0">
                        Reservar - <span class="fw-normal">{{ $servicio->nombre }}</span>
                    </h4>

                </div>
            </div>
        </div>
    </x-slot>

    <form action="{{ route('reserva.guardar') }}" method="POST">
        @csrf
        <input type="hidden" name="servicio_id" value="{{ $servicio->id }}">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">CONFIRMAR DATOS</div>
                    <div class="card-body">
                        
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">EMAIL</label>
                                <div class="form-control-feedback form-control-feedback-start">
                                    <input type="email" disabled name="email" value="{{ old('email',$user->email) }}" class="form-control @error('email') is-invalid @enderror" placeholder="" required>
                                    <div class="form-control-feedback-icon">
                                        <i class="ph ph-envelope text-muted"></i>
                                    </div>
                                </div>
                                @error('email')
                                    <div class="form-text text-danger"><i class="ph-x-circle me-1"></i>{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Apellidos</label>
                                        <div class="form-control-feedback form-control-feedback-start">
                                            <input type="text" name="apellidos" value="{{ old('apellidos',$user->apellidos) }}" class="form-control @error('apellidos') is-invalid @enderror" placeholder="" required>
                                            <div class="form-control-feedback-icon">
                                                <i class="ph-user-circle text-muted"></i>
                                            </div>
                                        </div>
                                        @error('apellidos')
                                            <div class="form-text text-danger"><i class="ph-x-circle me-1"></i>{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nombres</label>
                                        <div class="form-control-feedback form-control-feedback-start">
                                            <input type="text" name="nombres" value="{{ old('nombres',$user->nombres) }}" class="form-control @error('nombres') is-invalid @enderror" placeholder="" required>
                                            <div class="form-control-feedback-icon">
                                                <i class="ph-user-circle text-muted"></i>
                                            </div>
                                        </div>
                                        @error('nombres')
                                            <div class="form-text text-danger"><i class="ph-x-circle me-1"></i>{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Identificación</label>
                                        <div class="form-control-feedback form-control-feedback-start">
                                            <input type="number" name="identificacion" value="{{ old('identificacion',$user->identificacion) }}" class="form-control @error('identificacion') is-invalid @enderror" placeholder="" required>
                                            <div class="form-control-feedback-icon">
                                                <i class="ph ph-credit-card text-muted"></i>
                                            </div>
                                        </div>
                                        @error('identificacion')
                                            <div class="form-text text-danger"><i class="ph-x-circle me-1"></i>{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Teléfono</label>
                                        <div class="form-control-feedback form-control-feedback-start">
                                            <input type="tel" name="telefono" value="{{ old('telefono',$user->telefono) }}" class="form-control @error('telefono') is-invalid @enderror" placeholder="" required>
                                            <div class="form-control-feedback-icon">
                                                <i class="ph ph-device-mobile text-muted"></i>
                                            </div>
                                        </div>
                                        @error('telefono')
                                            <div class="form-text text-danger"><i class="ph-x-circle me-1"></i>{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Dirección</label>
                                        <div class="form-control-feedback form-control-feedback-start">
                                            <input type="text" name="direccion" value="{{ old('direccion',$user->direccion) }}" class="form-control @error('direccion') is-invalid @enderror" placeholder="" required>
                                            <div class="form-control-feedback-icon">
                                                <i class="ph ph-map-pin-line text-muted"></i>
                                            </div>
                                        </div>
                                        @error('direccion')
                                            <div class="form-text text-danger"><i class="ph-x-circle me-1"></i>{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                    
                </div>
                
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">DETALLE DE RESERVA</div>
                    <div class="card-body">
                        <p><strong>{{ $servicio->nombre }}</strong></p>
                        <p>{{ $servicio->detalle }}</p>
                    <div class="row">
                        <div class="col-lg-6">
                            <img id="img_01" src="{{ route('servicios.ver-foto',[$servicio->id,1]) }}" data-zoom-image="{{ Storage::url($servicio->foto_1) }}" width="190" />

                            <div id="gal1">

                                <a href="#" data-image="{{ route('servicios.ver-foto',[$servicio->id,1]) }}" data-zoom-image="{{ Storage::url($servicio->foto_1) }}">
                                    <img id="img_01" src="{{ route('servicios.ver-foto',[$servicio->id,1]) }}" width="45"/>
                                </a>

                                <a href="#" data-image="{{ route('servicios.ver-foto',[$servicio->id,2]) }}" data-zoom-image="{{ Storage::url($servicio->foto_2) }}">
                                    <img id="img_01" src="{{ route('servicios.ver-foto',[$servicio->id,2]) }}" width="45"/>
                                </a>

                                <a href="#" data-image="{{ route('servicios.ver-foto',[$servicio->id,3]) }}" data-zoom-image="{{ Storage::url($servicio->foto_3) }}">
                                    <img id="img_01" src="{{ route('servicios.ver-foto',[$servicio->id,3]) }}" width="45" />
                                </a>

                                <a href="#" data-image="{{ route('servicios.ver-foto',[$servicio->id,4]) }}" data-zoom-image="{{ Storage::url($servicio->foto_4) }}">
                                    <img id="img_01" src="{{ route('servicios.ver-foto',[$servicio->id,4]) }}" width="45"/>
                                </a>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            
                            <ul class="list-group list-group-flush border-top">
                                <li class="list-group-item d-flex">
                                    CAPACIDAD PARA {{ $servicio->capacidad_personas }} PERSONAS
                                </li>
                                <li class="list-group-item d-flex">
                                    Dimensiones: {{ $servicio->dimensiones }}
                                    
                                </li>
                                <li class="list-group-item d-flex">
                                    PRECIO ${{ $servicio->precio_hora }} POR HORA
                                    
                                </li>
                                <li class="list-group-item d-flex">
                                    CATEGORIA: {{ $servicio->tipoReserva->nombre }}                                
                                </li>
                            </ul>
                        </div>
                    </div>

                    

                    </div>
                    <div class="card-footer">
                        <div class="mb-2">
                            <label class="form-label">FECHA Y HORA DE INICIO</label>
                            <div class="form-control-feedback form-control-feedback-start">
                                <input type="datetime-local" name="fecha_inicio" value="{{ old('fecha_inicio',Carbon\Carbon::now()->format('Y-m-d H:i')) }}" class="form-control @error('fecha_inicio') is-invalid @enderror" placeholder="" required>
                                <div class="form-control-feedback-icon">
                                    <i class="ph ph-calendar text-muted"></i>
                                </div>
                            </div>
                            @error('fecha_inicio')
                                <div class="form-text text-danger"><i class="ph-x-circle me-1"></i>{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label class="form-label">¿CUANTAS HORAS QUIERE RESERVAR?</label>
                            <div class="form-control-feedback form-control-feedback-start">
                                <input type="number" name="cantidad_horas" value="{{ old('cantidad_horas') }}" class="form-control @error('cantidad_horas') is-invalid @enderror" placeholder="" required>
                                <div class="form-control-feedback-icon">
                                    <i class="ph ph-clock-clockwise text-muted"></i>
                                </div>
                            </div>
                            @error('cantidad_horas')
                                <div class="form-text text-danger"><i class="ph-x-circle me-1"></i>{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-2">
                            <label class="form-label">DETALLE</label>
                            <div class="form-control-feedback form-control-feedback-start">
                                <input type="text" name="detalle" value="{{ old('detalle') }}" class="form-control @error('detalle') is-invalid @enderror" placeholder="">
                                <div class="form-control-feedback-icon">
                                    
                                    <i class="ph ph-article text-muted"></i>
                                </div>
                            </div>
                            @error('detalle')
                                <div class="form-text text-danger"><i class="ph-x-circle me-1"></i>{{ $message }}</div>
                            @enderror
                        </div>

                        

                        <div class="mb-1">
                            <div class="d-grid gap-2">
                                <button
                                    type="submit"
                                    class="btn btn-success"
                                >
                                    RESERVAR
                                </button>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </form>

    
    <div class="card">
        <div class="card-header">FECHAS DISPONIBLES PARA {{ $servicio->nombre }} <br>
            
            <span
                class="badge bg-warning"
                >SOLICITADO</span
            >
            <span
                class="badge bg-success ml-2"
                >RESERVADO</span
            >
        </div>
        
        
        <div class="card-body">
            <div class="fullcalendar-basic" id="calendar"></div>
        </div>
    </div>
    


    @prepend('scripts')
        <style>
            #gal1 img {
                border: 2px solid white;
            }

            /*Change the colour*/
            .active img {
                border: 2px solid #333 !important;
            }
        </style>
    @endprepend


   @push('scripts')
   <script>
    //initiate the plugin and pass the id of the div containing gallery images
        $('#img_01').ezPlus({
            gallery: 'gal1', cursor: 'pointer', galleryActiveClass: 'active',
            imageCrossfade: true, loadingIcon: 'http://www.elevateweb.co.uk/spinner.gif'
        });

        //pass the images to Fancybox
        $('#img_01').bind('click', function (e) {
            var ez = $('#img_01').data('ezPlus');
            $.fancyboxPlus(ez.getGalleryList());
            return false;
        });
        
        const events = {{ Js::from($reservas) }};

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                initialDate: Date.now(),
                locale:'es',
                navLinks: true, // can click day/week names to navigate views
                nowIndicator: true,
                weekNumberCalculation: 'ISO',
                editable: true,
                selectable: true,
                direction: document.dir == 'rtl' ? 'rtl' : 'ltr',
                dayMaxEvents: true, // allow "more" link when too many events
                events: events
            });
            calendar.render();
        });
   
   </script>
    @endpush


</x-app-layout>
