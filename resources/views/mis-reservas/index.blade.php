<x-app-layout>
    <x-slot name="header">
        <div class="page-header">
            <div class="page-header-content container d-lg-flex">
                <div class="d-flex">
                    <h4 class="page-title mb-0">
                        Inicio - <span class="fw-normal">MIS RESERVAS</span>
                    </h4>

                    <a href="#page_header" class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto" data-bs-toggle="collapse">
                        <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                    </a>
                </div>

                <div class="collapse d-lg-block my-lg-auto ms-lg-auto" id="page_header">
                    <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">

                        <div class="d-inline-flex mt-3 mt-sm-0">
                            
                            <a href="{{ url('/') }}" class="btn btn-outline-primary btn-icon w-32px h-32px rounded-pill ms-3">
                                <i class="ph-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>



    <!-- Latest orders -->
    <div class="card">
        <div class="card-header d-flex py-1">
            <h5 class="py-3 mb-0">Últimas reservas</h5>
        
            <div class="d-inline-flex align-items-center ms-auto">
                <span class="badge bg-warning fw-semibold">{{ $reservas->where('estado','SOLICITADO')->count() }} solicitados</span>
                <span class="badge bg-success fw-semibold mx-1">{{ $reservas->where('estado','RESERVADO')->count() }} reservados</span>
                <span class="badge bg-danger fw-semibold mx-1">{{ $reservas->where('estado','RECHAZADO')->count() }} rechazados</span>
            </div>
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

                    @foreach ($reservas as $re)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ Storage::url($re->servicio->foto_1) }}" class="me-3">
                                    <img src="{{ Storage::url($re->servicio->foto_1) }}" class="rounded-circle" width="32" height="32" alt="">
                                </a>

                                <div>
                                    <a href="#" class="text-body fw-semibold">
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

                                    <a href="#" class="dropdown-item">
                                        <i class="ph-receipt me-2"></i>
                                        Order details
                                    </a>
                                    
                                    <a href="#" class="dropdown-item">
                                        <i class="ph-chart-bar me-2"></i>
                                        Statistics
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    
                    
                </tbody>
            </table>
        </div>
    </div>
    <!-- /latest orders -->

</x-app-layout>
