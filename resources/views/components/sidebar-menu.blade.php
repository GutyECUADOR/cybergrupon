<!-- navbar vertical -->
<!-- Sidebar -->
<nav class="navbar-vertical navbar">
    <div class="vh-100" data-simplebar>
        <!-- Brand logo -->
        <a class="navbar-brand" href="/dashboard">
            <img src="{{ asset('assets/images/brand/logo/logo-cybergrupon.svg')}}" alt="">
            <span class="text-white" translate="no">Cybergrupon</span>
        </a>
        <!-- Navbar nav -->
        <ul class="navbar-nav flex-column" id="sideNavbar">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="nav-icon fe fe-home me-2"></i> Inicio
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile.index') }}">
                    <i class="nav-icon fe fe-user me-2"></i> Mi Perfil
                </a>
            </li>

            @if (Auth::user()->ReferidosUltimos5meses >= 3)

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#navCourses"
                    aria-expanded="false" aria-controls="navCourses">
                    <i class="nav-icon fe fe-git-merge me-2"></i> Genealogia
                </a>
                <div id="navCourses" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('mis-referidos.index') }}">
                                Mis Referidos
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
                    <i class="nav-icon fe fe-dollar-sign me-2"></i> Recarga de Saldo
                </a>
            </li>

            <!-- Nav item -->
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('tienda.index') }}">
                    <i class="nav-icon fe fe-shopping-cart me-2"></i> Tienda
                </a>
            </li>

            <!-- Nav item -->
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('tienda-VIP.index') }}">
                    <i class="nav-icon fe fe-star me-2"></i> Tienda VIP
                </a>
            </li>

            <!-- Nav item -->
            {{-- <li class="nav-item ">
                <a class="nav-link" href="{{ route('transferencia.index') }}">
                    <i class="nav-icon fe fe-file me-2"></i> Transferir Fondos
                </a>

            </li> --}}
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('pagos.index') }}">
                    <i class="nav-icon fe fe-lock me-2"></i> Retiros
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('retiros-vip.index') }}">
                    <i class="nav-icon fe fe-star me-2"></i> Retiros VIP
                </a>
            </li>

                @if (Auth::user()->role == 'ADMIN_ROLE')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('verificalinks.index') }}">
                        <i class="nav-icon fe fe-check me-2"></i> Verificar links
                    </a>
                </li>
                @endif

            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('ayuda.index') }}">
                    <i class="nav-icon fe fe-help-circle me-2"></i> Ayuda y Herramientas
                </a>
            </li>

            @endif
            <!-- Nav item -->
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="nav-link" href="#"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            <i class="fe fe-power me-2"></i>
                            {{ __('Logout') }}
                        </a>
                </form>

            </li>
                </a>
            </li>
        </ul>

    </div>
</nav>
