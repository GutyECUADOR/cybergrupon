<x-guest-layout>

    <!-- Page content -->
	<main>
		<section class="container d-flex flex-column">
			<div class="row align-items-center justify-content-center g-0 min-vh-100">
				<div class="col-xl-6 col-lg-6 col-md-12">
					<!-- Card -->
					<div class="card shadow">
						<!-- Card body -->
						<div class="card-body p-6">
							<div class="mb-4">
								<h1 class="mb-1 fw-bold">Registro de Referido</h1>
								<span>Ya tienes una cuenta?
									<a href="{{ route('login') }}" class="ms-1">Inicia Sesión</a></span>
							</div>
							<!-- Form -->
                            <form method="POST" action="{{ route('referido.store') }}">
                                @csrf

                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />

								<!-- Username -->
								<div class="mb-3">
									<label for="nickname_promoter" class="form-label">Código de Promotor/Patrocinador </label>
									<input type="text" id="nickname_promoter" class="form-control" name="nickname_promoter" placeholder="XXXXX" value="{{ $nickname }}" readonly>
								</div>

                                <!-- Nickname -->
                                <div class="mb-3">
                                    <label for="nickname" class="form-label">Crea un nickname único (Sin espacios)</label>
                                    <input type="nickname" name="nickname" value="{{old('nickname')}}" class="form-control" id="nickname" required autofocus>
                                </div>

								<!-- Email -->
								<div class="mb-3">
									<label for="email" class="form-label">Correo electrónico</label>
									<input type="email" name="email" value="{{old('email')}}" class="form-control" id="email" required>
								</div>

                            <!-- Phone -->
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Teléfono</label>
                                    <input type="phone" name="phone" value="{{old('phone')}}" class="form-control" id="phone" required>
                                </div>

								<!-- Password -->
								<div class="mb-3">
									<label for="password" class="form-label">Contraseña</label>
									<input type="password" id="password" class="form-control" name="password" placeholder="**************" required>
								</div>

                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirme Contraseña</label>
                                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
								</div>

									<!-- Checkbox -->
								<div class="mb-3">
									<div class="form-check">
										<input type="checkbox" class="form-check-input" id="agreeCheck" required>
										<label class="form-check-label" for="agreeCheck"><span>Acepto los <a href="#" data-bs-toggle="modal" data-bs-target="#modalterminos">Términos y Condiciones.</a></span></label>
									</div>
								</div>
								<div>
									<!-- Button -->
                                    @if (!$errors->any())
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">
                                                Crear nueva cuenta
                                            </button>
                                        </div>
                                    @else
                                        <div class="d-grid">
                                            <a href="/" class="btn btn-primary">
                                                Ir al inicio
                                            </a>
                                        </div>
                                    @endif
								</div>

							</form>
						</div>
					</div>
				</div>
                <div class="offset-xxl-1 col-xxl-5 col-lg-6 col-md-12">
                    <div class="card shadow">
                        <div class="card-body p-6">
                            @foreach ($linksPublicidad as $publicidad)
                                <div class="row text-center">
                                    <iframe width="100%"
                                        src="{{ $publicidad->link_publicidad }}"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen></iframe>
                                    <a href="{{ $publicidad->link_redireccion }}" target="_blank" class="btn btn-success btn-sm mt-3 mb-3">Más información</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
			</div>
		</section>
	</main>

    <x-modal-terminos></x-modal-terminos>
</x-guest-layout>
