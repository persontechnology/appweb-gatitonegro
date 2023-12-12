<x-guest-layout>
    <x-slot name="header">
        <div class="page-header">
            <div class="page-header-content container d-lg-flex">
                <div class="d-flex">
                    <h4 class="page-title mb-0">
                        RESERVA NUESTRO - <span class="fw-normal">SERVICIOS</span>
                    </h4>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="content">

        
        @foreach ($servicios as $servicio)
            
        
            <div class="card card-body">
                <div class="d-sm-flex align-items-lg-start text-center text-lg-start">
                    <div class="me-lg-3 mb-3 mb-lg-0">
                        <a href="{{ Storage::url($servicio->foto_1) }}" data-bs-popup="lightbox">
                            <img src="{{ Storage::url($servicio->foto_1) }}" width="100" alt="">
                        </a>
                    </div>

                    <div class="flex-fill">
                        <h6 class="mb-1">
                            <a href="{{ route('reserva.detalle',$servicio->id) }}">{{ $servicio->nombre }}</a>
                        </h6>

                        <ul class="list-inline list-inline-bullet mb-3 mb-lg-2">
                            <li class="list-inline-item fw-bold">TIPO DE RESERVA</li>
                            <li class="list-inline-item">{{ $servicio->tipoReserva->nombre }}</li>
                        </ul>

                        <p class="mb-3">
                            {{ $servicio->detalle }}
                        </p>

                        <ul class="list-inline list-inline-bullet mb-0">
                            <li class="list-inline-item fw-bold">DIMENSIONES</li>
                            <li class="list-inline-item"> {{ $servicio->dimensiones }}</li>
                        </ul>
                    </div>

                    <div class="flex-shrink-0 text-center mt-3 mt-lg-0 ms-lg-3">
                        <h5 class="mb-0">${{ $servicio->precio_hora }} <small>la hora</small></h5>

                        <div class="my-1">
                            <i class="ph-star fs-base lh-base align-top text-warning"></i>
                            <i class="ph-star fs-base lh-base align-top text-warning"></i>
                            <i class="ph-star fs-base lh-base align-top text-warning"></i>
                            <i class="ph-star fs-base lh-base align-top text-warning"></i>
                            <i class="ph-star fs-base lh-base align-top text-warning"></i>
                        </div>

                        <div class="text-muted">CAPACIDAD PARA PERSONAS {{ $servicio->capacidad_personas }}</div>

                        <a href="{{ route('reserva.detalle',$servicio->id) }}" class="btn btn-success mt-3">
                            <i class="ph-shopping-cart me-2"></i>
                            RESERVAR
                        </a>
                    </div>
                </div>
            </div>

        @endforeach
        


    </div>



</x-guest-layout>
