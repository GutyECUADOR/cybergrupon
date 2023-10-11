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
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="border-bottom pb-3 mb-3 d-lg-flex justify-content-between align-items-center">
                            <div class="mb-3 mb-lg-0">
                                <h1 class="mb-0 h2 fw-bold">Dashboard</h1>
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                                    <div>
                                        <span class="fs-6 text-uppercase fw-semibold">Saldo Disponible</span>
                                    </div>
                                    <div>
                                        <span class="bi bi-cash-coin fs-3 text-primary"></span>
                                    </div>
                                </div>
                                <h2 class="fw-bold mb-1">
                                    $10,800
                                </h2>
                                <span class="text-success fw-semibold"><i
                                        class="fe fe-trending-up me-1"></i>+20.9$</span>
                                <span class="ms-1 fw-medium">Number of sales</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                                    <div>
                                        <span class="fs-6 text-uppercase fw-semibold">Nivel Actual</span>
                                    </div>
                                    <div>
                                        <span class="fe fe-user-check fs-3 text-primary"></span>
                                    </div>
                                </div>
                                <h2 class="fw-bold mb-1">
                                    2,456
                                </h2>
                                <span class="text-danger fw-semibold">120+</span>
                                <span class="ms-1 fw-medium">Number of pending</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                                    <div>
                                        <span class="fs-6 text-uppercase fw-semibold">Referidos</span>
                                    </div>
                                    <div>
                                        <span class=" fe fe-users fs-3 text-primary"></span>
                                    </div>
                                </div>
                                <h2 class="fw-bold mb-1">
                                    1,22,456
                                </h2>
                                <span class="text-success fw-semibold"><i
                                        class="fe fe-trending-up me-1"></i>+1200</span>
                                <span class="ms-1 fw-medium">Referidos</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                                    <div>
                                        <span class="fs-6 text-uppercase fw-semibold">Ganancias totales</span>
                                    </div>
                                    <div>
                                        <span class="bi bi-bar-chart fs-3 text-primary"></span>
                                    </div>
                                </div>
                                <h2 class="fw-bold mb-1">
                                    22,786
                                </h2>
                                <span class="text-success fw-semibold"><i
                                        class="fe fe-trending-up me-1"></i>+200</span>
                                <span class="ms-1 fw-medium">Instructor</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card header -->
                            <div
                                class="card-header align-items-center card-header-height d-flex justify-content-between align-items-center">
                                <div>
                                    <h4 class="mb-0">Ganancias</h4>
                                </div>
                                <div>
                                    <div class="dropdown dropstart">
                                        <a class="text-muted text-decoration-none" href="#" role="button"
                                            id="courseDropdown1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="courseDropdown1">
                                            <span class="dropdown-header">Opciones</span>

                                            <a class="dropdown-item" href="#"><i class="fe fe-download dropdown-item-icon "></i>Descargar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                <!-- Earning chart -->
                                <div id="earning" class="apex-charts"></div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>
    </main>


</x-app-layout>
