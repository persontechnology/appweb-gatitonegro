<x-app-layout>
    <x-slot name="header">
        <div class="page-header">
            <div class="page-header-content container d-lg-flex">
                <div class="d-flex">
                    <h4 class="page-title mb-0">
                        ADMINISTRACIÓN - <span class="fw-normal">USUARIOS</span>
                    </h4>

                    <a href="#page_header" class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto" data-bs-toggle="collapse">
                        <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                    </a>
                </div>

                <div class="collapse d-lg-block my-lg-auto ms-lg-auto" id="page_header">
                    <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">

                        <div class="d-inline-flex mt-3 mt-sm-0">
                            
                            <a href="{{ route('usuarios.create') }}" class="btn btn-outline-primary btn-icon w-32px h-32px rounded-pill ms-3">
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
            Listado de usuarios
        </div>
        <div class="card-body">
            @if ($usuarios->count()>0)
            <div class="table-responsive">
                <table class="table text-nowrap datatable-basic table-sm">
                    <thead>
                        <tr>
                            <th>APELLIDOS & NOMBRES</th>
                            <th>IDENTIFICACIÓN</th>
                            <th>EMAIL</th>
                            <th>PERFIL</th>
                            <th>TELÉFONO</th>
                            <th>DIRECCIÓN</th>
                            <th>ESTADO</th>
                            <th class="text-center" style="width: 20px;"><i class="ph-arrow-circle-down"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $user)
                        <tr>
                            <td>
                                {{ $user->apellidos }} {{ $user->nombres }}
                            </td>
                            <td>{{ $user->identificacion }}</td>
                            <td>{{ $user->email }}</td>
                            
                            <td>{{ $user->perfil }}</td>
                            <td>{{ $user->telefono }}</td>
                            <td>{{ $user->direccion }}</td>
                            <td>{{ $user->estado }}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill" data-bs-toggle="dropdown">
                                        <i class="ph-dots-three-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        
                                        <a href="{{ route('usuarios.edit',$user) }}" class="dropdown-item">
                                            <i class="ph ph-pencil-simple me-2"></i>
                                            Editar
                                        </a>
                                        <a href="{{ route('usuarios.show',$user) }}" class="dropdown-item">
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
                    <strong>NO EXISTE USUARIOS</strong>
                </div>
                
            @endif
            
        </div>
    </div>
</x-app-layout>
