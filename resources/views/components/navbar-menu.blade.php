<!-- navbar -->
<nav class="navbar-default navbar navbar-expand-lg">
    <a id="nav-toggle" href="#">
        <i class="fe fe-menu"></i>
    </a>

    <!--Navbar nav -->
    <div class="ms-auto d-flex">
        <a href="#" class="form-check form-switch theme-switch btn btn-light btn-icon rounded-circle ">
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault"></label>

        </a>
        <ul class="navbar-nav navbar-right-wrap ms-2 d-flex nav-top-wrap">

            <!-- List -->
            <li class="dropdown ms-2">
                <a class="rounded-circle" href="#" role="button" id="dropdownUser" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <div class="avatar avatar-md avatar-indicators avatar-online">
                        <img alt="avatar" src="../../../assets/images/avatar/avatar-1.jpg" class="rounded-circle">
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                    <div class="dropdown-item">
                        <div class="d-flex">
                            <div class="avatar avatar-md avatar-indicators avatar-online">
                                <img alt="avatar" src="../../../assets/images/avatar/avatar-1.jpg"
                                    class="rounded-circle">
                            </div>
                            <div class="ms-3 lh-1">
                                <h5 class="mb-1">Usuario Test</h5>
                                <p class="mb-0 text-muted">admin@admin.test</p>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <ul class="list-unstyled">
                        <li>
                            <a class="dropdown-item" href="../../../pages/profile-edit.html">
                                <i class="fe fe-user me-2"></i> Perfil
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="../../../pages/student-subscriptions.html">
                                <i class="fe fe-star me-2"></i> Pagos & Subscripciones
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fe fe-settings me-2"></i> Configuración
                            </a>
                        </li>
                    </ul>
                    <div class="dropdown-divider"></div>
                    <ul class="list-unstyled">
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item" href="#"
                                        onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        <i class="fe fe-power me-2"></i>
                                        {{ __('Cerrar Sesión') }}
                                    </a>
                            </form>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
