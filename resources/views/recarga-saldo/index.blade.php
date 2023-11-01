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
                                            <a href="admin-dashboard.html">Dashboard</a>
                                        </li>
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
                                        <div class="step" data-target="#test-l-2">
                                            <button type="button" class="step-trigger" role="tab"
                                                id="stepperFormtrigger2" aria-controls="test-l-2">
                                                <span class="bs-stepper-circle p-2 me-2"><i
                                                        class="fe fe-shopping-bag lh-2"></i></span>
                                                <span class="bs-stepper-label">Shipping Details</span>
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
                                        <form onSubmit="return false">
                                            <!-- Content one -->
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
                                                        <label class="form-label" for="state">Monto</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter State" id="state">
                                                    </div>

                                                </div>

                                                <!-- Button -->
                                                <div class="d-flex justify-content-end">
                                                    <button class="btn btn-primary" onclick="stepperForm.next()">
                                                        Proceed to Shipping <i class="fe fe-shopping-bag ms-1"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- Content two -->
                                            <div id="test-l-2" role="tabpanel" class="bs-stepper-pane fade"
                                                aria-labelledby="stepperFormtrigger2">

                                                <div>
                                                    <!-- heading -->
                                                    <h4 class="mb-4">Shipping Method</h4>
                                                    <!-- card -->
                                                    <div class="card card-bordered shadow-none mb-2">
                                                        <!-- card body -->
                                                        <div class="card-body">
                                                            <!-- form check -->
                                                            <div class="d-flex">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="flexRadioDefault" id="freeDelivery">
                                                                    <label class="form-check-label ms-2"
                                                                        for="freeDelivery">

                                                                    </label>
                                                                </div>
                                                                <div class="">
                                                                    <h5 class="mb-1"> Free Delivery</h5>
                                                                    <span class="fs-6">Expected Delivery 3 to 5
                                                                        Days</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- card -->
                                                    <div class="card card-bordered shadow-none mb-2">
                                                        <!-- card body -->
                                                        <div class="card-body">
                                                            <!-- form check -->
                                                            <div class="d-md-flex">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="flexRadioDefault" id="nextDelivery">
                                                                    <label class="form-check-label ms-2 w-100"
                                                                        for="nextDelivery">

                                                                    </label>

                                                                </div>
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center w-100">
                                                                    <div class="d-flex align-items-start">
                                                                        <!-- img -->
                                                                        <img src="../../../assets/images/svg/payment-logo-fedex.svg"
                                                                            alt="">
                                                                        <!-- text -->
                                                                        <div class="ms-2">
                                                                            <h5 class="mb-1"> FedEx Next Day Delivery
                                                                            </h5>
                                                                            <p class="mb-0 fs-6">No Delivery on Public
                                                                                Holidays</p>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <!-- heading -->
                                                                        <h3 class="mb-0">$19.99
                                                                        </h3>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- card -->
                                                    <div class="card card-bordered shadow-none">
                                                        <!-- card body -->
                                                        <div class="card-body">
                                                            <div class="d-md-flex">
                                                                <div class="form-check">
                                                                    <!-- input -->
                                                                    <input class="form-check-input" type="radio"
                                                                        name="flexRadioDefault" id="DHLExpress">
                                                                    <label class="form-check-label ms-2 w-100"
                                                                        for="DHLExpress">

                                                                    </label>
                                                                </div>
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center w-100">
                                                                    <!-- img -->
                                                                    <div class="d-flex align-items-start">
                                                                        <img src="../../../assets/images/svg/payment-logo-dhl.svg"
                                                                            alt="">
                                                                        <!-- text -->
                                                                        <div class="ms-2">
                                                                            <h5 class="mb-1">DHL Express</h5>
                                                                            <p class="mb-0 fs-6">1 Day Delivery</p>
                                                                        </div>
                                                                    </div>
                                                                    <!-- text -->
                                                                    <div>
                                                                        <h3 class="mb-0">$8.99
                                                                        </h3>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Button -->
                                                <div class="d-md-flex justify-content-between  mt-4">
                                                    <button class="btn btn-outline-primary mb-2 mb-md-0"
                                                        onclick="stepperForm.previous()">
                                                        Back to Info
                                                    </button>
                                                    <!-- Button -->
                                                    <button class="btn btn-primary" onclick="stepperForm.next()">
                                                        Continue to Payment <i class="fe fe-credit-card ms-2"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- Content three -->
                                            <div id="test-l-3" role="tabpanel" class="bs-stepper-pane fade"
                                                aria-labelledby="stepperFormtrigger3">
                                                <!-- Card -->
                                                <div class="mb-5">
                                                    <h3 class="mb-1">Payment selection</h3>
                                                    <p class="mb-0">Please select and enter your billing information.
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
                                                                    name="flexRadioDefault" id="paypal">
                                                                <label class="form-check-label ms-2" for="paypal">

                                                                </label>
                                                            </div>
                                                            <div>
                                                                <h5 class="mb-1"> Payment with Paypal</h5>
                                                                <p class="mb-0 fs-6">You will be redirected to PayPal
                                                                    website to complete your purchase
                                                                    securely.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- card -->
                                                <div class="card card-bordered shadow-none mb-2">
                                                    <!-- card body -->
                                                    <div class="card-body">
                                                        <div class="d-flex mb-4">
                                                            <div class="form-check ">
                                                                <!-- input -->
                                                                <input class="form-check-input" type="radio"
                                                                    name="flexRadioDefault" id="creditdebitcard">
                                                                <label class="form-check-label ms-2"
                                                                    for="creditdebitcard">

                                                                </label>
                                                            </div>
                                                            <div class="">
                                                                <h5 class="mb-1"> Credit / Debit Card</h5>
                                                                <p class="mb-0 fs-6">Safe money transfer using your
                                                                    bank accou k account. We support
                                                                    Mastercard tercard, Visa, Discover and Stripe.</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <!-- input -->
                                                                <div class="mb-3">
                                                                    <label for="cc-mask" class="form-label">Card
                                                                        Number</label>
                                                                    <input type="text" class="form-control"
                                                                        id="cc-mask"
                                                                        data-inputmask="'mask': '9999 9999 9999 9999'"
                                                                        inputmode="numeric"
                                                                        placeholder="xxxx-xxxx-xxxx-xxxx" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <!-- input -->
                                                                <div class="mb-3 mb-lg-0">
                                                                    <label class="form-label">Name on card </label>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Enter your first name">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-12">
                                                                <!-- input -->
                                                                <div class="mb-3  mb-lg-0">
                                                                    <label class="form-label">Expiry date </label>
                                                                    <input type="text"
                                                                        class="form-control flatpickr">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-12">
                                                                <!-- input -->
                                                                <div class="mb-3  mb-lg-0">
                                                                    <label for="cvv" class="form-label">CVV Code
                                                                        <i class="fe fe-help-circle ms-1"
                                                                            data-bs-toggle="tooltip"
                                                                            data-placement="top"
                                                                            title="A 3 - digit number, typically printed on the back of a card."></i></label>
                                                                    <input type="password" class="form-control"
                                                                        name="cvv" id="cvv"
                                                                        placeholder="xxx" maxlength="3"
                                                                        inputmode="numeric" required>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- card -->
                                                <div class="card card-bordered shadow-none mb-2">
                                                    <!-- card body -->
                                                    <div class="card-body">
                                                        <!-- check input -->
                                                        <div class="d-flex">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="flexRadioDefault" id="payoneer">
                                                                <label class="form-check-label ms-2" for="payoneer">

                                                                </label>
                                                            </div>
                                                            <div>
                                                                <h5 class="mb-1"> Pay with Payoneer</h5>
                                                                <p class="mb-0 fs-6">You will be redirected to Payoneer
                                                                    website to complete your
                                                                    purchase securely.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- card -->
                                                <div class="card card-bordered shadow-none">
                                                    <div class="card-body">
                                                        <!-- check input -->
                                                        <div class="d-flex">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="flexRadioDefault" id="cashonDelivery">
                                                                <label class="form-check-label ms-2"
                                                                    for="cashonDelivery">

                                                                </label>
                                                            </div>
                                                            <div>
                                                                <h5 class="mb-1"> Cash on Delivery</h5>
                                                                <p class="mb-0 fs-6">Pay with cash when your order is
                                                                    delivered.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Button -->
                                                <div class="d-flex justify-content-between">
                                                    <!-- Button -->
                                                    <button class="btn btn-outline-primary mt-3"
                                                        onclick="stepperForm.previous()">
                                                        Back to shipping
                                                    </button>
                                                    <!-- Button -->
                                                    <button type="submit" class="btn btn-primary mt-3"
                                                        onclick=" location.href='order-summary.html' ">
                                                        Complete Order
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
