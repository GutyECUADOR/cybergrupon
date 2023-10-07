<x-guest-layout>

    <!-- Page content -->
	<main>
		<section class="container d-flex flex-column">
			<div class="row align-items-center justify-content-center g-0 min-vh-100">
				<div class="col-lg-5 col-md-8 py-8 py-xl-0">
					<!-- Card -->
					<div class="card shadow">
						<!-- Card body -->
						<div class="card-body p-6">
							<div class="mb-4">
								<h1 class="mb-1 fw-bold">Registro</h1>
								<span>Ya tienes una cuenta?
									<a href="{{ route('login') }}" class="ms-1">Inicia Sesión</a></span>
							</div>
							<!-- Form -->
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />

								<!-- Username -->
								<div class="mb-3">
									<label for="nickname_promoter" class="form-label">Código de Promotor/Patrocinador </label>
									<input type="text" id="nickname_promoter" class="form-control" name="nickname_promoter" placeholder="XXXXX" required>
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
										<label class="form-check-label" for="agreeCheck"><span>Acepto los <a href="/terminos-condiciones">Términos</a> y <a href="terms-condition-page.html">Condiciones.</a></span></label>
									</div>
								</div>
								<div>
										<!-- Button -->
										<div class="d-grid">
									<button type="submit" class="btn btn-primary">
										Crear nueva cuenta
									</button>
									</div>
								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
</x-guest-layout>
