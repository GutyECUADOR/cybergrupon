<x-app-layout>

    <!-- Wrapper -->
    <main id="db-wrapper">

        <!-- Sidebar -->
        <x-sidebar-menu></x-sidebar-menu>

        <!-- Page Content -->
        <section id="page-content">
            <div class="header">
                <!-- navbar -->
                <x-navbar-menu></x-sidebar-menu>

            </div>
            <!-- Container fluid -->
            <div class="container-fluid p-4">
                <!-- User info -->
                <div class="row align-items-center">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                        <!-- Bg -->
                        <div class="pt-16 rounded-top"
                            style="
                                        background: url(../assets/images/background/profile-bg.jpg) no-repeat;
                                        background-size: cover;
                                    ">
                        </div>
                        <div class="card px-4 pt-2 pb-4 shadow-sm rounded-top-0 rounded-bottom-0 rounded-bottom-md-2 ">
                            <div class="d-flex align-items-end justify-content-between  ">
                                <div class="d-flex align-items-center">
                                    <div
                                        class="me-2 position-relative d-flex justify-content-end align-items-end mt-n5">
                                        <img src="{{ asset('assets/images/avatar/'.$usuario->avatar)}}"
                                            class="avatar-xl rounded-circle border border-4 border-white"
                                            alt="avatar">
                                    </div>
                                    <div class="lh-1">
                                        <h2 class="mb-0">{{ $usuario->nickname }}</h2>
                                        <p class=" mb-0 d-block">{{ $usuario->email }}</p>
                                    </div>
                                </div>
                                <div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content -->
                <div class="row mt-0 mt-md-4">
                    <div class="col-lg-3 col-md-4 col-12">
                        <!-- Side navbar -->
                        <nav class="navbar navbar-expand-md navbar-light shadow-sm mb-4 mb-lg-0 sidenav">
                            <!-- Menu -->
                            <a class="d-xl-none d-lg-none d-md-none text-inherit fw-bold" href="#">Menu</a>
                            <!-- Button -->
                            <button class="navbar-toggler d-md-none icon-shape icon-sm rounded bg-primary text-light"
                                type="button" data-bs-toggle="collapse" data-bs-target="#sidenav"
                                aria-controls="sidenav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="fe fe-menu"></span>
                            </button>
                            <!-- Collapse navbar -->
                            <div class="collapse navbar-collapse" id="sidenav">
                                <div class="navbar-nav flex-column">
                                    <span class="navbar-header">Configuración de Cuenta</span>
                                    <!-- List -->
                                    <ul class="list-unstyled ms-n2 mb-0">
                                        <!-- Nav item -->
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('profile.index')}}"><i
                                                    class="fe fe-settings nav-icon"></i>Editar perfil</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('tienda.index')}}"><i
                                                    class="fe fe-calendar nav-icon"></i>Comprar planes</a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="col-lg-9 col-md-8 col-12">
                        <!-- Card -->
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header">
                                <h3 class="mb-0">Detalles del perfil</h3>
                                <p class="mb-0">
                                    Tiene control total para administrar la configuración de su propia cuenta.
                                </p>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                {{-- <div class="d-lg-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center mb-4 mb-lg-0">
                                        <img src="{{ asset('assets/images/avatar/'.auth()->user()->avatar)}}" id="img-uploaded"
                                            class="avatar-xl rounded-circle" alt="avatar">
                                        <div class="ms-3">
                                            <h4 class="mb-0">Tu avatar</h4>
                                            <p class="mb-0">
                                                PNG or JPG no mayor a 800px de ancho y alto.
                                            </p>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-outline-secondary btn-sm">Update</a>
                                    </div>
                                </div> --}}

                                <div>
                                    <h4 class="mb-0">Previsualización de publicidad</h4>
                                    <p class="mb-4">
                                        Edite la información del link_publicidad y redirección, si no son visibles a continuación, el link proporcionado es incorrecto. Si desea agregar un video desde youtube. El formato del link es: https://www.youtube.com/embed/tgbNymZ7vqY
                                    </p>
                                    <div class="col col-md-12 text-center">
                                        <iframe width="100%" height="200px"
                                            src="{{ auth()->user()->link_publicidad }}"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            allowfullscreen></iframe>
                                        <a href="{{ auth()->user()->link_redireccion }}" target="_blank" class="btn btn-success btn-sm mt-3 mb-3">Más información</a>
                                    </div>
                                </div>

                                <hr class="my-5">
                                <div>
                                    <h4 class="mb-0">Detalles personales</h4>
                                    <p class="mb-4">
                                        Edite su información personal y dirección.
                                    </p>

                                    <!-- Form -->
                                    <form method="POST" action="{{ route('profile.update', $usuario) }}" class="row gx-3">
                                        @csrf
                                        @method('PUT')

                                        <!-- Flash messages -->
                                        <x-auth-session-status class="mb-4" :status="session('status')" />
                                        <!-- Validation Errors -->
                                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                                        <!-- Last name -->
                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label" for="lname">Nickname</label>
                                            <input type="text" id="lname" class="form-control"
                                                placeholder="Nickname" value="{{ $usuario->nickname }}" disabled required>
                                        </div>
                                        <!-- Phone -->
                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label" for="phone">Teléfono</label>
                                            <input type="text" id="phone" name="phone" class="form-control text-dark" value="{{ $usuario->phone }}" required>
                                        </div>

                                        <!-- Address -->
                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label" for="address">Correo</label>
                                            <input type="email" id="address" class="form-control"
                                                placeholder="Correo" value="{{ $usuario->email }}" disabled required>
                                        </div>

                                        <!-- Link Publicidad -->
                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label" for="address2">Link de Publicidad</label>
                                            <input type="url" id="link_publicidad" name="link_publicidad" class="form-control text-dark" placeholder="Ejemplo: http://www.google.com.ec/" value="{{ $usuario->link_publicidad }}" required>
                                        </div>

                                        <!-- Link Redirección -->
                                        <div class="mb-3 col-12 col-md-6">
                                            <label class="form-label" for="address2">Link de Redirección </label>
                                            <input type="url" id="link_redireccion" name="link_redireccion" class="form-control text-dark" placeholder="Ejemplo: http://www.google.com.ec/" value="{{ $usuario->link_redireccion }}" required>
                                        </div>

                                        <div class="col-12">
                                            <!-- Button -->
                                            <button class="btn btn-primary" type="submit">
                                                Guardar cambios
                                            </button>
                                        </div>
                                    </form>


                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


</x-app-layout>
