<x-app-layout>
    <x-slot name="header">
        <div class="page-header">
            <div class="page-header-content container d-lg-flex">
                <div class="d-flex">
                    <h4 class="page-title mb-0">
                        ADMINISTRACIÓN - <span class="fw-normal">SERVICIOS</span>
                    </h4>

                    <a href="#page_header" class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto" data-bs-toggle="collapse">
                        <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                    </a>
                </div>

                <div class="collapse d-lg-block my-lg-auto ms-lg-auto" id="page_header">
                    <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">

                        <div class="d-inline-flex mt-3 mt-sm-0">
                            
                            <a href="{{ route('servicios.create') }}" class="btn btn-outline-primary btn-icon w-32px h-32px rounded-pill ms-3">
                                <i class="ph-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="card">
        <div class="card-header">
            Listado de canchas
        </div>
        <div class="card-body">
            @if ($servicios->count()>0)
            <div class="table-responsive">
                <table class="table text-nowrap">
                    <thead>
                        <tr>
                            <th>NOMBRE</th>
                            <th>DIMENSION</th>
                            <th>CAPACIDAD PERSONAS</th>
                            <th>PRECIO HORA</th>
                            <th>TIPO RESERVA</th>
                            <th>ESTADO</th>
                            <th>DETALLE</th>
                            <th class="text-center" style="width: 20px;"><i class="ph-arrow-circle-down"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($servicios as $servicio)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                   

                                    @if (Storage::exists($servicio->foto_1??''))
                                        <a href="{{ Storage::url($servicio->foto_1) }}" target="_blanck" class="me-3">
                                            <img src="{{ Storage::url($servicio->foto_1) }}" class="rounded-circle" width="32" height="32" alt="">
                                        </a>
                                    @else
                                    <a class="badge bg-danger" href="{{ route('canchas.fotos',$servicio->id) }}">SUBIR FOTOS </a>
                                    @endif

                                    <div>
                                        <strong>{{ $servicio->nombre }}</strong>
                                        <div class="text-muted fs-sm">{{ $servicio->created_at }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $servicio->dimensiones }}</td>
                            <td>{{ $servicio->capacidad_personas }}</td>
                            
                            <td>${{ $servicio->precio_hora }}</td>
                            <td>{{ $servicio->tipoReserva->nombre }}</td>
                            <td>{{ $servicio->estado }}</td>
                            <td>{{ Str::limit($servicio->detalle,10,'...') }}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill" data-bs-toggle="dropdown">
                                        <i class="ph-dots-three-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="{{ route('servicios.fotos',$servicio) }}" class="dropdown-item">
                                            <i class="ph ph-camera me-2"></i>
                                            Fotos
                                        </a>
                                        <a href="{{ route('servicios.edit',$servicio) }}" class="dropdown-item">
                                            <i class="ph ph-pencil-simple me-2"></i>
                                            Editar
                                        </a>
                                        <a href="{{ route('servicios.show',$servicio) }}" class="dropdown-item">
                                            <i class="ph ph-trash me-2"></i>
                                            Eliminar
                                        </a>
                                        
                                    </div>
                                </div>
                            </td>
                        </tr>    
                        @endforeach
                        
                    </tbody>
                </table>
            </div>    
            @else
                <div class="alert alert-danger" role="alert">
                    <strong>NO EXISTE SERVICIOS</strong>
                </div>
                
            @endif
            
        </div>
    </div>
</x-app-layout>
