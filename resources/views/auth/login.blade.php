<x-guest-layout>
    <form class="login-form" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="card mb-0">
            <div class="card-body">
                
                <div class="text-center mb-3">
                    <div class="d-inline-flex align-items-center justify-content-center mb-4 mt-2">
                        <img src="../../../assets/images/logo_icon.svg" class="h-48px" alt="">
                    </div>
                    <h5 class="mb-0">Ingrese a su cuenta</h5>
                    <span class="d-block text-muted">Ingrese sus credenciales a continuación</span>
                </div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <div class="form-control-feedback form-control-feedback-start">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="" required>
                        <div class="form-control-feedback-icon">
                            <i class="ph-user-circle text-muted"></i>
                        </div>
                    </div>
                    @error('email')
                        <div class="form-text text-danger"><i class="ph-x-circle me-1"></i>{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Contraseña</label>
                    <div class="form-control-feedback form-control-feedback-start">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="********" required>
                        <div class="form-control-feedback-icon">
                            <i class="ph-lock text-muted"></i>
                        </div>
                    </div>
                    @error('password')
                        <div class="form-text text-danger"><i class="ph-x-circle me-1"></i>{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>
                </div>

                <div class="text-center">
                    <a href="{{ route('password.request') }}">¿Has olvidado tu contraseña?</a>
                </div>
            </div>
        </div>
    </form>
</x-guest-layout>
