<x-app-layout>
    <x-slot name="header">
        <div class="page-header">
            <div class="page-header-content container d-lg-flex">
                <div class="d-flex">
                    <h4 class="page-title mb-0">
                        ADMINISTRACIÓN - <span class="fw-normal">USUARIOS-EDITAR</span>
                    </h4>

                    <a href="#page_header" class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto" data-bs-toggle="collapse">
                        <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                    </a>
                </div>

                <div class="collapse d-lg-block my-lg-auto ms-lg-auto" id="page_header">
                    <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">

                        <div class="d-inline-flex mt-3 mt-sm-0">
                            
                            <a href="{{ route('usuarios.index') }}" class="btn btn-outline-danger btn-icon w-32px h-32px rounded-pill ms-3">
                                <i class="ph ph-x"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <form action="{{ route('usuarios.update',$user) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header">
                Complete información
            </div>
            <div class="card-body">
                           

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <div class="form-control-feedback form-control-feedback-start">
                        <input type="email" value="{{ old('email',$user->email) }}" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="" required>
                        <div class="form-control-feedback-icon">
                            <i class="ph-at text-muted"></i>
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

               


                <div class="row">
                    
                    <div class="mb-2 col-lg-12">
                        <div class="form-floating form-control-feedback form-control-feedback-start">
                            <div class="form-control-feedback-icon">
                                <i class="ph ph-bookmarks-simple"></i>
                            </div>
                            <select name="estado" class="form-select @error('estado') is-invalid @enderror">
                                <option value="ACTIVO" {{ old('estado',$user->estado)=='ACTIVO'?'selected':'' }}>ACTIVO</option>
                                <option value="INACTIVO" {{ old('estado',$user->estado)=='INACTIVO'?'selected':'' }}>INACTIVO</option>
                            </select>
                            <label>ESTADO</label>
                            @error('estado')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                </div>

            </div>
            <div class="card-footer text-muted">
                <button type="submit" class="btn btn-success">GUARDAR</button>
            </div>
        </div>
        
    </form>
    
</x-app-layout>
