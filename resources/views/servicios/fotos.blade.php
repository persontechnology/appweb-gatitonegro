<x-app-layout>
    <x-slot name="header">
        <div class="page-header">
            <div class="page-header-content container d-lg-flex">
                <div class="d-flex">
                    <h4 class="page-title mb-0">
                        ADMINISTRACIÓN - <span class="fw-normal">SERVICIOS-FOTOS</span>
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

    <div class="row">
        <div class="col-lg-6">
            <form action="{{ route('servicios.fotos-guardar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $servicio->id }}">
                <div class="card">
                    <div class="card-header">
                        <strong>FOTO 1</strong>
                    </div>
                    <div class="card-body">
                        
                        
                        <img src="{{ route('servicios.ver-foto',[$servicio->id,1]) }}" class="img-fluid rounded-top" alt="">
                        
                        <input type="file" name="foto1" class="form-control @error('foto1') is-invalid @enderror" required accept="image/*">
                        <div class="form-text">ACEPTA SOLO IMAGENES (.png .jpg .jpeg)</div>
                        @error('foto1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="card-footer text-muted">
                        <button type="submit" class="btn btn-success">GUARDAR</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-6">
            <form action="{{ route('servicios.fotos-guardar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $servicio->id }}">
                <div class="card">
                    <div class="card-header">
                        <strong>FOTO 2</strong>
                    </div>
                    <div class="card-body">
                        
                        
                        <img src="{{ route('servicios.ver-foto',[$servicio->id,2]) }}" class="img-fluid rounded-top" alt="">
                        
                        <input type="file" name="foto2" class="form-control @error('foto2') is-invalid @enderror" required accept="image/*">
                        <div class="form-text">ACEPTA SOLO IMAGENES (.png .jpg .jpeg)</div>
                        @error('foto2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="card-footer text-muted">
                        <button type="submit" class="btn btn-success">GUARDAR</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-6">
            <form action="{{ route('servicios.fotos-guardar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $servicio->id }}">
                <div class="card">
                    <div class="card-header">
                        <strong>FOTO 3</strong>
                    </div>
                    <div class="card-body">
                        
                        <img src="{{ route('servicios.ver-foto',[$servicio->id,3]) }}" class="img-fluid rounded-top" alt="">
                        
                        <input type="file" name="foto3" class="form-control @error('foto3') is-invalid @enderror" required accept="image/*">
                        <div class="form-text">ACEPTA SOLO IMAGENES (.png .jpg .jpeg)</div>
                        @error('foto3')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="card-footer text-muted">
                        <button type="submit" class="btn btn-success">GUARDAR</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-6">
            <form action="{{ route('servicios.fotos-guardar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $servicio->id }}">
                <div class="card">
                    <div class="card-header">
                        <strong>FOTO 4</strong>
                    </div>
                    <div class="card-body">
                        
                        <img src="{{ route('servicios.ver-foto',[$servicio->id,4]) }}" class="img-fluid rounded-top" alt="">
                        
                        <input type="file" name="foto4" class="form-control @error('foto4') is-invalid @enderror" required accept="image/*">
                        <div class="form-text">ACEPTA SOLO IMAGENES (.png .jpg .jpeg)</div>
                        @error('foto4')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="card-footer text-muted">
                        <button type="submit" class="btn btn-success">GUARDAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    
    
</x-app-layout>
