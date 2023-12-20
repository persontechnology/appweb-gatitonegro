<x-app-layout>
    <x-slot name="header">
        <div class="page-header">
            <div class="page-header-content container d-lg-flex">
                <div class="d-flex">
                    <h4 class="page-title mb-0">
                        ADMINISTRACIÓN - <span class="fw-normal">USUARIOS-ELIMINAR</span>
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

    <form action="{{ route('usuarios.destroy',$user) }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="card">
            <div class="card-header bg-danger text-white">
                CONFIRMAR ELIMINACIÓN
            </div>
            <div class="card-body">
               <h1>ESTA SEGURO DE ELIMINAR</h1>
    
            </div>
            <div class="card-footer text-muted">
                <button type="submit" class="btn btn-success">SI, ELIMINAR</button>
                <a href="{{ route('usuarios.index') }}" class="btn btn-danger">CANCELAR</a>
            </div>
        </div>
    </form>
    
</x-app-layout>
