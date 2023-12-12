<x-app-layout>
    <x-slot name="header">
        <div class="page-header">
            <div class="page-header-content container d-lg-flex">
                <div class="d-flex">
                    <h4 class="page-title mb-0">
                        ADMINISTRACIÓN - <span class="fw-normal">SERVICIOS-EDITAR</span>
                    </h4>

                    <a href="#page_header" class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto" data-bs-toggle="collapse">
                        <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                    </a>
                </div>

                <div class="collapse d-lg-block my-lg-auto ms-lg-auto" id="page_header">
                    <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">

                        <div class="d-inline-flex mt-3 mt-sm-0">
                            
                            <a href="{{ route('servicios.index') }}" class="btn btn-outline-danger btn-icon w-32px h-32px rounded-pill ms-3">
                                <i class="ph ph-x"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <form action="{{ route('servicios.update',$servicio) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header">
                Complete información
            </div>
            <div class="card-body">
                <div class="row mb-3">
    
                    <div class="mb-2 col-lg-6">
                        <div class="form-floating form-control-feedback form-control-feedback-start">
                            <div class="form-control-feedback-icon">
                                <i class="ph ph-text-aa"></i>
                            </div>
                            <input name="nombre" value="{{ old('nombre',$servicio->nombre) }}" type="text" class="form-control @error('nombre') is-invalid @enderror"  autofocus>
                            <label>NOMBRE DE SERVICIO</label>
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            
                        </div>
                    </div>
    
                    <div class="mb-2 col-lg-3">
                        <div class="form-floating form-control-feedback form-control-feedback-start">
                            <div class="form-control-feedback-icon">
                                <i class="ph ph-ruler"></i>
                            </div>
                            <input name="dimensiones" value="{{ old('dimensiones',$servicio->dimensiones) }}" type="text" class="form-control @error('dimensiones') is-invalid @enderror" >
                            <label>DIMENSIONES</label>
                            @error('dimensiones')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            
                        </div>
                    </div>

                    <div class="mb-2 col-lg-3">
                        <div class="form-floating form-control-feedback form-control-feedback-start">
                            <div class="form-control-feedback-icon">
                                <i class="ph ph-bookmarks-simple"></i>
                            </div>
                            <select name="estado" class="form-select @error('estado') is-invalid @enderror">
                                <option value="ACTIVO" {{ old('estado',$servicio->estado)=='ACTIVO'?'selected':'' }}>ACTIVO</option>
                                <option value="INACTIVO" {{ old('estado',$servicio->estado)=='INACTIVO'?'selected':'' }}>INACTIVO</option>
                            </select>
                            <label>ESTADO</label>
                            @error('estado')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    
                    <div class="mb-2 col-lg-4">
                        <div class="form-floating form-control-feedback form-control-feedback-start">
                            <div class="form-control-feedback-icon">
                                <i class="ph ph-sketch-logo"></i>
                            </div>
                            <select name="tipo_reserva_id" class="form-select @error('tipo_reserva_id') is-invalid @enderror">
                                @foreach ($TipoReservas as $tr)
                                <option value="{{ $tr->id }}" {{ old('tipo_reserva_id',$servicio->tipo_reserva_id)==$tr->id?'selected':'' }}>{{ $tr->nombre }}</option>
                                @endforeach
                            </select>
                            <label>TIPO DE RESERVA</label>
                            @error('tipo_reserva_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
    
                    <div class="mb-2 col-lg-4">
                        <div class="form-floating form-control-feedback form-control-feedback-start">
                            <div class="form-control-feedback-icon">
                                <i class="ph ph-timer"></i>
                            </div>
                            <input name="precio_hora" value="{{ old('precio_hora',$servicio->precio_hora) }}" step="0.01" type="number" class="form-control @error('precio_hora') is-invalid @enderror"  >
                            <label>PRECIO POR HORA</label>
                            @error('precio_hora')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
    
                    <div class="mb-2 col-lg-4">
                        <div class="form-floating form-control-feedback form-control-feedback-start">
                            <div class="form-control-feedback-icon">
                                <i class="ph ph-users"></i>
                            </div>
                            <input name="capacidad_personas" value="{{ old('capacidad_personas',$servicio->capacidad_personas) }}" step="0.01" type="number" class="form-control @error('capacidad_personas') is-invalid @enderror"  >
                            <label>CAPACIDAD DE PERSONAS</label>
                            @error('capacidad_personas')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
    
                    <div class="mb-2 col-lg-12">
                        <div class="form-floating form-control-feedback form-control-feedback-start">
                            <div class="form-control-feedback-icon">
                                <i class="ph ph-article"></i>
                            </div>
                            <textarea name="detalle" class="form-control @error('detalle') is-invalid @enderror" required>{{ old('detalle',$servicio->detalle) }}</textarea>
                            <label>Detalle</label>
                            @error('detalle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
    
                </div>
    
            </div>
            <div class="card-footer text-muted">
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </div>
    </form>
    
</x-app-layout>
