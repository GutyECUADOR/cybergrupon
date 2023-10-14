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
                                <h1 class="mb-0 h2 fw-bold">Mi red</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Flash messages -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />


                <div class="row" style="width: 2000px;" >

                    <div class="table-responsive">
                        <table class="table" style="width:125%;">
                            <div class="tree">
                                <ul>
                                    <li>
                                        <a href="#" style="margin-left: 60px;">
                                            <img src="{{ asset('assets/images/avatar/default.png') }}" alt=""
                                                class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                            <h4 class="mb-0">Gutyecuador</h4>
                                        </a>
                                        <ul id="primerenlace">
                                            <li>
                                                <a href="#" style="margin-left: 30px;">
                                                    <img src="{{ asset('assets/images/avatar/default.png') }}"
                                                        alt=""
                                                        class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                    <h4 class="mb-0">Gutyecuador</h4>
                                                </a>
                                                <ul>
                                                    <li>
                                                        <a href="#">
                                                            <img src="{{ asset('assets/images/avatar/default.png') }}"
                                                                alt=""
                                                                class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                            <h4 class="mb-0">Gutyecuador</h4>
                                                        </a>

                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="{{ asset('assets/images/avatar/default.png') }}"
                                                                alt=""
                                                                class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                            <h4 class="mb-0">Gutyecuador</h4>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="{{ asset('assets/images/avatar/default.png') }}"
                                                                alt=""
                                                                class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                            <h4 class="mb-0">Gutyecuador</h4>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li id="tercerenlace">
                                                <a href="#" style="margin-left: 30px;">
                                                    <img src="{{ asset('assets/images/avatar/default.png') }}"
                                                        alt=""
                                                        class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                    <h4 class="mb-0">Gutyecuador</h4>
                                                </a>
                                                <ul>
                                                    <li>
                                                        <a href="#">
                                                            <img src="{{ asset('assets/images/avatar/default.png') }}"
                                                                alt=""
                                                                class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                            <h4 class="mb-0">Gutyecuador</h4>
                                                        </a>

                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="{{ asset('assets/images/avatar/default.png') }}"
                                                                alt=""
                                                                class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                            <h4 class="mb-0">Gutyecuador</h4>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="{{ asset('assets/images/avatar/default.png') }}"
                                                                alt=""
                                                                class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                            <h4 class="mb-0">Gutyecuador</h4>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#" style="margin-left: 30px;">
                                                    <img src="{{ asset('assets/images/avatar/default.png') }}"
                                                        alt=""
                                                        class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                    <h4 class="mb-0">Gutyecuador</h4>
                                                </a>
                                                <ul>
                                                    <li>
                                                        <a href="#">
                                                            <img src="{{ asset('assets/images/avatar/default.png') }}"
                                                                alt=""
                                                                class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                            <h4 class="mb-0">Gutyecuador</h4>
                                                        </a>

                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="{{ asset('assets/images/avatar/default.png') }}"
                                                                alt=""
                                                                class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                            <h4 class="mb-0">Gutyecuador</h4>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="{{ asset('assets/images/avatar/default.png') }}"
                                                                alt=""
                                                                class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                            <h4 class="mb-0">Gutyecuador</h4>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </table>
                    </div>


                </div>






        </section>
    </main>


</x-app-layout>
