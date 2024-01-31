<x-app-layout>
    <x-slot name="header">
        <div class="page-header">
            <div class="page-header-content container d-lg-flex">
                <div class="d-flex">
                    <h4 class="page-title mb-0">
                        MIS RESERVAS - <span class="fw-normal">DETALLE</span>
                    </h4>

                    <a href="#page_header" class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto" data-bs-toggle="collapse">
                        <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                    </a>
                </div>

                <div class="collapse d-lg-block my-lg-auto ms-lg-auto" id="page_header">
                    <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">

                        <div class="d-inline-flex mt-3 mt-sm-0">
                            
                            <a href="{{ route('mis-reserva.index') }}" class="btn btn-outline-danger btn-icon w-32px h-32px rounded-pill ms-3">
                                <i class="ph ph-x"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    @php
        $servicio=$reserva->servicio;
    @endphp
    <div class="card">
        <div class="card-header">DETALLE DE RESERVA</div>
        <div class="card-body">
            <p><strong>{{ $servicio->nombre }}</strong></p>
            <p>{{ $servicio->detalle }}</p>
        <div class="row">
            <div class="col-lg-6">
                <img id="img_01" src="{{ route('servicios.ver-foto',[$servicio->id,1]) }}" data-zoom-image="{{ route('servicios.ver-foto',[$servicio->id,1]) }}" width="190" />

                <div id="gal1">

                    <a href="#" data-image="{{ route('servicios.ver-foto',[$servicio->id,1]) }}" data-zoom-image="{{ route('servicios.ver-foto',[$servicio->id,1]) }}">
                        <img id="img_01" src="{{ route('servicios.ver-foto',[$servicio->id,1]) }}" width="45"/>
                    </a>

                    <a href="#" data-image="{{ route('servicios.ver-foto',[$servicio->id,2]) }}" data-zoom-image="{{ route('servicios.ver-foto',[$servicio->id,2]) }}">
                        <img id="img_01" src="{{ route('servicios.ver-foto',[$servicio->id,2]) }}" width="45"/>
                    </a>

                    <a href="#" data-image="{{ route('servicios.ver-foto',[$servicio->id,3]) }}" data-zoom-image="{{ route('servicios.ver-foto',[$servicio->id,3]) }}">
                        <img id="img_01" src="{{ route('servicios.ver-foto',[$servicio->id,3]) }}" width="45" />
                    </a>

                    <a href="#" data-image="{{ route('servicios.ver-foto',[$servicio->id,4]) }}" data-zoom-image="{{ route('servicios.ver-foto',[$servicio->id,4]) }}">
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
       
    </div>

    <!-- Latest orders -->
    <div class="card">
        
        
            <div class="card-body">
                <h4 class="card-title">DETALLE DE LA RESERVA</h4>
            </div>
        

        <div class="table-responsive">
            <table class="table text-nowrap">
                <thead>
                    <tr>
                        <th>SERVICIO</th>
                        <th>PRECIO</th>
                        <th>FECHA INICIO</th>
                        <th>FECAH FINAL</th>
                        <th>HORAS</th>
                        <th>DETALLE ADMIN</th>
                        <th>DETALLE CLIENTE</th>
                        <th>ESTADO</th>
                        <th class="text-center" style="width: 20px;"><i class="ph-arrow-circle-down"></i></th>
                    </tr>
                </thead>
                <tbody>

                   @php
                       $re=$reserva;
                   @endphp
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('servicios.ver-foto',[$servicio->id,1]) }}" class="me-3">
                                    <img src="{{ route('servicios.ver-foto',[$servicio->id,1]) }}" class="rounded-circle" width="32" height="32" alt="">
                                </a>

                                <div>
                                    <a href="{{ route('mis-reserva.detalle',$re->id) }}" class="text-body fw-semibold">
                                        {{ $re->servicio->nombre }}
                                    </a>
                                    <div class="text-muted fs-sm">
                                        {{ $re->created_at }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            ${{ $re->precio }}
                        </td>
                        <td>
                            {{ $re->fecha_inicio }}
                        </td>
                        <td>
                            {{ $re->fecha_final }}
                        </td>
                        <td>
                            {{ $re->cantidad_horas }}
                        </td>
                        <td>
                            @if ($re->detalle_admin)
                            <button type="button" class="btn btn-outline-primary btn-sm" data-bs-popup="popover" data-bs-placement="top" title="DETALLE CLIENTE" data-bs-content="{{ $re->detalle_admin }}">ver</i></button>
                            @endif
                        </td>
                        <td>
                            @if ($re->detalle_cliente)
                            <button type="button" class="btn btn-outline-primary btn-sm" data-bs-popup="popover" data-bs-placement="top" title="DETALLE ADMIN" data-bs-content="{{ $re->detalle_cliente }}">ver</i></button>
                            @endif
                        </td>
                        <td>
                            @switch($re->estado)
                                @case('SOLICITADO')
                                    <span class="badge bg-warning bg-opacity-10 text-warning">SOLICITADO</span>
                                    @break
                                @case('RESERVADO')
                                    <span class="badge bg-success bg-opacity-10 text-success">RESERVADO</span>
                                    @break
                                @case('RECHAZADO')
                                    <span class="badge bg-danger bg-opacity-10 text-danger">RECHAZADO</span>
                                    @break
                                @default
                                    
                            @endswitch
                        </td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button type="button" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill" data-bs-toggle="dropdown">
                                    <i class="ph-dots-three-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="{{ route('mis-reserva.recibo-pdf',$re->id) }}" class="dropdown-item">
                                        <i class="ph-file-pdf me-2"></i>
                                        Recibo
                                    </a>
                                    @if ($re->estado=='SOLICITADO')
                                    <button type="button" data-mensaje="{{ $re->servicio->nombre }}" data-url="{{ route('mis-reserva.eliminar',$re->id) }}" class="dropdown-item" onclick="fnEliminar(this)">
                                        <i class="ph ph-trash-simple me-2"></i>Eliminar
                                    </button>    
                                    @endif
                                    
                                    
                                </div>
                            </div>
                        </td>
                    </tr>
                   
                    
                    
                </tbody>
            </table>
        </div>
    </div>
    <!-- /latest orders -->

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
        
      
   
   </script>
    @endpush
</x-app-layout>
