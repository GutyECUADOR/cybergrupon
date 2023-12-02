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
                                <h1 class="mb-0 h2 fw-bold"> Pagos  </h1>
                                <!-- Breadcrumb -->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="#">Pagos </a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Retiro de Dinero
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row -->
                <div class="row" style="justify-content: space-around;">
                    <div class="col-xl-8 col-lg-7">

                        <!-- Flash messages -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <!-- stepper -->
                        <div id="stepperForm" class="bs-stepper">
                            <!-- card -->
                            <div class="card">
                                <div class="card-header">
                                    <!-- Stepper Button -->
                                    <div class="bs-stepper-header p-0 bg-transparent" role="tablist">
                                        <div class="step" data-target="#test-l-1">
                                            <button type="button" class="step-trigger" role="tab"
                                                id="stepperFormtrigger1" aria-controls="test-l-1">
                                                <span class="bs-stepper-circle p-2 me-2"><i
                                                        class="fe fe-user lh-2"></i></span>
                                                <span class="bs-stepper-label">Información del Pago</span>
                                            </button>
                                        </div>


                                    </div>
                                </div>
                                <div class="card-body">

                                        <form method="POST" action="{{ route('pagos.store') }}">
                                            @csrf

                                            <div id="test-l-1" role="tabpanel" class="bs-stepper-pane fade"
                                                aria-labelledby="stepperFormtrigger1">
                                                <!-- heading -->
                                                <div class="mb-5">
                                                    <h3 class="mb-1">Información de Pago</h3>
                                                    <p class="mb-0">Indique a continuación la información para el retiro. Verifique los datos correctos.
                                                    </p>
                                                </div>
                                                <!-- row -->
                                                <div class="row gx-3">

                                                    <!-- input -->
                                                    <div class="mb-3 col-12">
                                                      <label class="form-label" for="wallet">Wallet (Que recibirá los fondos)</label>
                                                      <input type="text" class="form-control text-dark" placeholder="Ejemplo: TA9gi1vG58oNMAwaHEvEcpFpjwy9PbXXXX" name="wallet" id="wallet">
                                                    </div>
                                                     <!-- input -->
                                                    <div class="mb-3 col-12">
                                                        <label class="form-label" for="wallet">Valor a retirar</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">$</span>
                                                            </div>
                                                            <input type="text" class="form-control text-center text-dark" name="valor" placeholder="0" aria-label="USD" aria-describedby="basic-addon1">
                                                            </div>
                                                    </div>

                                                    <!-- select -->
                                                    {{-- <div class="mb-3 col-12">
                                                      <label class="form-label">Network</label>
                                                      <select class="form-select text-dark" name="network">
                                                        <option selected value="NETWORK_TRX">NETWORK_TRX</option>
                                                        <option value="NETWORK_BTC">NETWORK_BTC</option>
                                                        <option value="NETWORK_ETH">NETWORK_ETH</option>
                                                        <option value="NETWORK_BSC">NETWORK_BSC</option>
                                                      </select>
                                                    </div> --}}

                                                    <!-- select -->
                                                   {{--  <div class="mb-3 col-12">
                                                        <label class="form-label">Crypto currency</label>
                                                        <select class="form-select text-dark" name="currency">
                                                          <option selected value="USDT">USDT</option>
                                                          <option value="BTC">BTC</option>
                                                          <option value="ETH">ETH</option>
                                                        </select>
                                                      </div> --}}

                                                  </div>

                                                <!-- Button -->
                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary">
                                                        Solicitar pago <i class="fe fe-credit-card ms-2"></i>
                                                    </button>
                                                </div>
                                            </div>

                                        </form>

                                </div>
                            </div>





                        </div>

                    </div>

                </div>
            </section>


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
