<!-- navbar vertical -->
<!-- Sidebar -->
<nav class="navbar-vertical navbar">
    <div class="vh-100" data-simplebar>
        <!-- Brand logo -->
        <a class="navbar-brand" href="/dashboard">
            <img src="{{ asset('assets/images/brand/logo/logo-cybergrupon.svg')}}" alt="">
            <span class="text-white">Cybergrupon</span>
        </a>
        <!-- Navbar nav -->
        <ul class="navbar-nav flex-column" id="sideNavbar">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="nav-icon fe fe-home me-2"></i> Inicio
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="nav-icon fe fe-user me-2"></i> Mi Perfil
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#navCourses"
                    aria-expanded="false" aria-controls="navCourses">
                    <i class="nav-icon fe fe-book me-2"></i> Genealogia
                </a>
                <div id="navCourses" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Referidos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('red.index') }}">
                                Mi red
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('recargasaldo.index') }}">
                    <i class="nav-icon fe fe-user me-2"></i> Recarga de Saldo
                </a>
            </li>

            <!-- Nav item -->
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('tienda.index') }}">
                    <i class="nav-icon fe fe-book-open me-2"></i> Tienda
                </a>
            </li>
            <!-- Nav item -->
            <li class="nav-item ">
                <a class="nav-link" href="#">
                    <i class="nav-icon fe fe-file me-2"></i> Transferir Fondos
                </a>

            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="nav-icon fe fe-lock me-2"></i> Retiros
                </a>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="nav-icon fe fe-shopping-bag me-2"></i> Ayuda y Herramientas
                </a>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="nav-icon fe fe-power me-2"></i> Salir
                </a>
            </li>
                </a>
            </li>
        </ul>

    </div>
</nav>
