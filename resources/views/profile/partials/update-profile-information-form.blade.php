<section>
    <div class="card">
        
        <div class="card-body">
            <header>
                <h2 class="text-lg font-medium text-gray-900">
                    Información del perfil
                </h2>
        
                <p class="mt-1 text-sm text-gray-600">
                    Actualice la información del perfil y la dirección de correo electrónico de su cuenta.
                </p>
            </header>
        
            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>
        
            <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('patch')
        
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
        
                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('GUARDAR') }}</x-primary-button>
        
                    @if (session('status') === 'profile-updated')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600"
                        >{{ __('GUARDADO.') }}</p>
                    @endif
                </div>
            </form>
        </div>
        
    </div>
    
</section>
