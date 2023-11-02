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
                                <h1 class="mb-0 h2 fw-bold"> Recarga de saldo </h1>
                                <!-- Breadcrumb -->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="#">Comprar </a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Recarga de saldo
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
                                                <span class="bs-stepper-label">Información de Recarga</span>
                                            </button>
                                        </div>
                                        <div class="bs-stepper-line"></div>
                                        <!-- Stepper Button -->
                                        <div class="step" data-target="#test-l-3">
                                            <button type="button" class="step-trigger" role="tab"
                                                id="stepperFormtrigger3" aria-controls="test-l-3">
                                                <span class="bs-stepper-circle p-2 me-2"><i
                                                        class="fe fe-credit-card lh-2"></i></span>
                                                <span class="bs-stepper-label">Forma de Pago</span>
                                            </button>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-body">
                                    <!-- Stepper content -->
                                    <div class="bs-stepper-content">

                                        <form method="POST" action="{{ route('recargasaldo.store') }}">
                                            @csrf

                                            <div id="test-l-1" role="tabpanel" class="bs-stepper-pane fade"
                                                aria-labelledby="stepperFormtrigger1">
                                                <!-- heading -->
                                                <div class="mb-5">
                                                    <h3 class="mb-1">Información de Recarga</h3>
                                                    <p class="mb-0">Indique a continuación la cantidad a recargar
                                                    </p>
                                                </div>
                                                <!-- row -->
                                                <div class="row gx-3">

                                                    <!-- input -->
                                                    <div class="mb-3 col-12">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">$</span>
                                                            </div>
                                                            <input type="text" class="form-control text-center" name="valor" placeholder="USD" aria-label="USD" aria-describedby="basic-addon1">
                                                            </div>
                                                    </div>

                                                </div>

                                                <!-- Button -->
                                                <div class="d-flex justify-content-end">
                                                    <button type="button" class="btn btn-primary" onclick="stepperForm.next()">
                                                        Continuar al pago <i class="fe fe-credit-card ms-2"></i>
                                                    </button>
                                                </div>
                                            </div>

                                            <!-- Content three -->
                                            <div id="test-l-3" role="tabpanel" class="bs-stepper-pane fade"
                                                aria-labelledby="stepperFormtrigger3">
                                                <!-- Card -->
                                                <div class="mb-5">
                                                    <h3 class="mb-1">Seleccion de Gateway de pago</h3>
                                                    <p class="mb-0">Por favor seleccione una forma de pago.
                                                    </p>
                                                </div>
                                                <!-- Card -->
                                                <div class="card card-bordered shadow-none mb-2">
                                                    <!-- card body -->
                                                    <div class="card-body">
                                                        <div class="d-flex">
                                                            <div class="form-check">
                                                                <!-- checkbox -->
                                                                <input class="form-check-input" type="radio"
                                                                    name="gateway" id="gatewayDefault" value="gatewayDefault" checked>
                                                                <label class="form-check-label ms-2" for="gatewayDefault">

                                                                </label>
                                                            </div>
                                                            <div>
                                                                <h5 class="mb-1"> Pago directo</h5>
                                                                <p class="mb-0 fs-6">Se realizará la recarga de
                                                                saldo directo.
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Button -->
                                                <div class="d-flex justify-content-between">
                                                    <!-- Button -->
                                                    <button class="btn btn-outline-primary mt-3"
                                                        onclick="stepperForm.previous()">
                                                        Regresar
                                                    </button>
                                                    <!-- Button -->
                                                    <button type="submit" class="btn btn-primary mt-3"
                                                        onclick=" location.href='order-summary.html' ">
                                                        Procesar pago
                                                    </button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>





                        </div>

                    </div>

                </div>
            </section>


        </section>
    </main>


</x-app-layout>
