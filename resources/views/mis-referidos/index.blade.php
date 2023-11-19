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
            <section class="container-fluid p-4">
                <div class="row ">
                    <div class="col-lg-12 col-md-12 col-12">
                        <!-- Page header -->
                        <div class="border-bottom pb-3 mb-3">
                            <div class="mb-2 mb-lg-0">
                                <h1 class="mb-0 h2 fw-bold"> Mis referidos </h1>
                                <!-- Breadcrumb -->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="#">Red </a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Mis referidos
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row -->
                <div class="row" style="justify-content: space-around;">
                    <div class="col-xl-8 col-lg-8 col-md-8 col-8 mb-8">
                        <!-- Card -->
                        <div class="card h-100">
                            <!-- Card header -->
                            <div
                                class="card-header d-flex align-items-center
                              justify-content-between card-header-height">
                                <h4 class="mb-0">Listado</h4>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                <!-- List group -->
                                <ul class="list-group list-group-flush">
                                    @foreach ($referidos as $referido)
                                        <li class="list-group-item px-0 pt-0 ">
                                            <div class="row">
                                                <div class="col-auto">
                                                    @if ($referido->NivelActual > 0)
                                                        <div class="avatar avatar-md avatar-indicators avatar-online">
                                                            <img alt="avatar" src="../../assets/images/avatar/default.png"
                                                                class="rounded-circle">
                                                        </div>
                                                    @else
                                                        <div class="avatar avatar-md avatar-indicators avatar-busy">
                                                            <img alt="avatar" src="../../assets/images/avatar/default.png"
                                                                class="rounded-circle">
                                                        </div>
                                                    @endif

                                                </div>
                                                <div class="col ms-n3">
                                                    <h4 class="mb-0 h5">{{ $referido->nickname}}</h4>
                                                    <span class="me-2 fs-6">
                                                        <span class="text-dark  me-1 fw-semibold">Nivel / Paquete: </span>{{ $referido->NivelActual }}</span>
                                                    <span class="me-2 fs-6">
                                                        <span
                                                            class="text-dark  me-1 fw-semibold">Email: </span>{{ $referido->email }}</span>
                                                    <span class="fs-6">
                                                        <span class="text-dark  me-1 fw-semibold">Fecha de Registro</span> {{ $referido->created_at }}
                                                    </span>
                                                </div>
                                            </div>

                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </section>


        </section>
    </main>


</x-app-layout>
