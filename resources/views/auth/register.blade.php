<x-guest-layout>

    <form action="{{ route('register') }}" method="POST" class="flex-fill">
        @csrf

        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <div class="d-inline-flex align-items-center justify-content-center mb-4 mt-2">
                                <img src="../../../assets/images/logo_icon.svg" class="h-48px" alt="">
                            </div>
                            <h5 class="mb-0">Crear una cuenta</h5>
                            <span class="d-block text-muted">Todos los campos son obligatorios</span>
                        </div>
                       

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <div class="form-control-feedback form-control-feedback-start">
                                <input type="email" value="{{ old('email') }}" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="" required>
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
                                        <input type="text" name="apellidos" value="{{ old('apellidos') }}" class="form-control @error('apellidos') is-invalid @enderror" placeholder="" required>
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
                                        <input type="text" name="nombres" value="{{ old('nombres') }}" class="form-control @error('nombres') is-invalid @enderror" placeholder="" required>
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
                                        <input type="number" name="identificacion" value="{{ old('identificacion') }}" class="form-control @error('identificacion') is-invalid @enderror" placeholder="" required>
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
                                        <input type="tel" name="telefono" value="{{ old('telefono') }}" class="form-control @error('telefono') is-invalid @enderror" placeholder="" required>
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
                                        <input type="text" name="direccion" value="{{ old('direccion') }}" class="form-control @error('direccion') is-invalid @enderror" placeholder="" required>
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
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Contraseña</label>
                                    <div class="form-control-feedback form-control-feedback-start">
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="*******" required>
                                        <div class="form-control-feedback-icon">
                                            <i class="ph-lock text-muted"></i>
                                        </div>
                                    </div>
                                    @error('password')
                                        <div class="form-text text-danger"><i class="ph-x-circle me-1"></i>{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Repita contraseña</label>
                                    <div class="form-control-feedback form-control-feedback-start">
                                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="*******" required>
                                        <div class="form-control-feedback-icon">
                                            <i class="ph-lock text-muted"></i>
                                        </div>
                                    </div>
                                    @error('password_confirmation')
                                        <div class="form-text text-danger"><i class="ph-x-circle me-1"></i>{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-body text-end border-top">
                        <button type="submit" class="btn btn-primary">
                            <i class="ph-plus me-2"></i>
                            Crear una cuenta
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    

</x-guest-layout>