<x-app-layout>

    <!-- Wrapper -->
    <main id="db-wrapper">

        <input id="hiddenuserID" type="hidden" name="hiddenuserID" value="{{Auth::user()->id}}">

        <!-- Sidebar -->
        <x-sidebar-menu></x-sidebar-menu>

        <!-- Page Content -->
        <section id="page-content">
            <div class="header">
                <!-- navbar -->
                <x-navbar-menu></x-sidebar-menu>

            </div>
            <!-- Container fluid -->
            <div class="container-fluid p-4" id="app">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="border-bottom pb-3 mb-3 d-lg-flex justify-content-between align-items-center">
                            <div class="mb-3 mb-lg-0">
                                <h1 class="mb-0 h2 fw-bold">Dashboard</h1>
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-2 col-lg-3 col-md-12 col-12">
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
                                    {{ Auth::user()->SaldoActual }}
                                </h2>
                                <span class="text-success fw-semibold"><i
                                        class="fe fe-trending-up me-1"></i>$ USD </span>
                                <span class="ms-1 fw-medium">Disponible</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                                    <div>
                                        <span class="fs-6 text-uppercase fw-semibold">Saldo VIP</span>
                                    </div>
                                    <div>
                                        <span class="bi bi-cash-coin fs-3 text-primary"></span>
                                    </div>
                                </div>
                                <h2 class="fw-bold mb-1">
                                    {{ Auth::user()->SaldoVIPActual }}
                                </h2>
                                <span class="text-success fw-semibold"><i
                                        class="fe fe-trending-up me-1"></i>$ USD </span>
                                <span class="ms-1 fw-medium">Disponible</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-6 col-md-12 col-12">
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
                                    {{ Auth::user()->NivelActual }}
                                </h2>
                                <span class="ms-1 fw-medium">paquete actual</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-6 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                                    <div>
                                        <span class="fs-6 text-uppercase fw-semibold">Nivel ActualVIP</span>
                                    </div>
                                    <div>
                                        <span class="fe fe-user-check fs-3 text-primary"></span>
                                    </div>
                                </div>
                                <h2 class="fw-bold mb-1">
                                    {{ Auth::user()->NivelActualVIP }}
                                </h2>
                                <span class="ms-1 fw-medium">paquete VIP actual</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-6 col-md-12 col-12">
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
                                     {{ Auth::user()->Referidos }}
                                </h2>
                                <span class="text-success fw-semibold"><i
                                        class="fe fe-trending-up me-1"></i>+</span>
                                <span class="ms-1 fw-medium">Referidos</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-6 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                                    <div>
                                        <span class="fs-6 text-uppercase fw-semibold">Ganancias</span>
                                    </div>
                                    <div>
                                        <span class="bi bi-bar-chart fs-3 text-primary"></span>
                                    </div>
                                </div>
                                <h2 class="fw-bold mb-1">
                                    {{ Auth::user()->GananciasTotales }}
                                </h2>
                                <span class="text-success fw-semibold"><i
                                        class="fe fe-trending-up me-1"></i>USD</span>
                                <span class="ms-1 fw-medium">Comisiones</span>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Grafica --}}
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card header -->
                            <div
                                class="card-header align-items-center card-header-height d-flex justify-content-between align-items-center">
                                <div>
                                    <h4 class="mb-0">Balance</h4>
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
                </div>{{-- Tabla --}}
                <div class="row">
                    <div class="col-12">
                        <!-- card -->
                        <div class="card h-100">
                            <!-- card header -->
                            <div class="card-header">
                                <h4 class="mb-0">Últimos Movimientos</h4>
                            </div>


                            <!-- table -->
                            <table class="table mb-0 table-hover table-centered">
                                <tbody>
                                    <tr>
                                        <th>Tipo de Movimiento</th>
                                        <th>Valor</th>
                                        <th>Fecha</th>
                                        <th>Estado</th>
                                    </tr>
                                    <tr>

                                    @foreach (Auth::user()->Movimientos as $movimiento)
                                        <td>{{$movimiento->tipoMovimiento}}</td>
                                        <td>{{$movimiento->valor}}</td>
                                        <td>{{$movimiento->created_at}}</td>
                                        @if (in_array($movimiento->status, ['Complete', 'Completo', 'Success']))
                                            <td><span class="badge bg-success">Completo</span></td>
                                        @elseif (in_array($movimiento->status, ['Payed']))
                                            <td><span class="badge bg-info text-dark">Pagada</span></td>
                                        @elseif (in_array($movimiento->status, ['Expired']))
                                            <td><span class="badge bg-danger">Expirado</span></td>
                                        @else
                                            <td><span class="badge bg-primary">En proceso</span></td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>



                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>

    <!-- modal -->
    <div class="modal fade" id="modalpromo" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="row">
                        @foreach ($linksPublicidad as $publicidad)
                            <div class="col col-md-6 text-center">
                                <iframe width="100%" height="200px"
                                    src="{{ $publicidad->link_publicidad }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe>
                                <a href="{{ $publicidad->link_redireccion }}" target="_blank" class="btn btn-success btn-sm mt-3 mb-3">Más información</a>
                            </div>
                        @endforeach
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
