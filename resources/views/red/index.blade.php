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


                <div class="row" id="container-arbol">

                    <div class="table-responsive">
                        <table class="table" style="width:125%;">
                            <div class="tree">
                                <ul>
                                    <li>
                                        <a href="#" style="margin-left: 60px;">
                                            <img src="{{ asset('assets/images/avatar/default.png') }}" alt=""
                                                class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                            <div class="text-wrap text-break fw-bold text-dark" style="width: 6rem;">
                                                {{ $posicion1_1->nickname }}
                                            </div>
                                        </a>
                                        <!-- segundo nivel -->
                                        <ul id="primerenlace">
                                            <li>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#modal_position2_1" style="margin-left: 30px;">
                                                    <img src="{{ asset('assets/images/avatar/default.png') }}"
                                                        alt=""
                                                        class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                    <div class="text-wrap text-break fw-bold text-dark"
                                                        style="width: 6rem;">
                                                        @if(!is_null($posicion2_1))
                                                            {{
                                                                $posicion2_1->nickname
                                                            }}
                                                        @endif
                                                    </div>
                                                </a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="modal_position2_1" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title">Registrar en posición 2-1</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <form method="POST" action="{{ route('red.store') }}">
                                                                @csrf

                                                                <!-- Username -->
                                                                <div class="mb-3">
                                                                    <label for="nickname_promoter" class="form-label">Código de Promotor/Patrocinador </label>
                                                                    <input type="text" id="nickname_promoter" class="form-control" name="nickname_promoter" value="{{ auth()->user()->nickname }}" readonly required>
                                                                </div>

                                                                <!-- Nickname -->
                                                                <div class="mb-3">
                                                                    <label for="nickname" class="form-label">Crea un nickname único (Sin espacios)</label>
                                                                    <input type="nickname" name="nickname" value="{{old('nickname')}}" class="form-control" id="nickname" required autofocus>
                                                                </div>

                                                                <!-- Email -->
                                                                <div class="mb-3">
                                                                    <label for="email" class="form-label">Correo electrónico</label>
                                                                    <input type="email" name="email" value="{{old('email')}}" class="form-control" id="email" required>
                                                                </div>

                                                                <!-- Phone -->
                                                                <div class="mb-3">
                                                                    <label for="phone" class="form-label">Teléfono</label>
                                                                    <input type="phone" name="phone" value="{{old('phone')}}" class="form-control" id="phone" required>
                                                                </div>

                                                                <!-- Password -->
                                                                <div class="mb-3">
                                                                    <label for="password" class="form-label">Contraseña</label>
                                                                    <input type="password" id="password" class="form-control" name="password" placeholder="" required>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="password_confirmation" class="form-label">Confirme Contraseña</label>
                                                                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
                                                                </div>

                                                                <div>
                                                                        <!-- Button -->
                                                                        <div class="d-grid">
                                                                    <button type="submit" class="btn btn-primary">
                                                                        Crear nueva cuenta
                                                                    </button>
                                                                    </div>
                                                                </div>

                                                            </form>

                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>

                                                <ul>
                                                    <li>
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal_position3_1" style="margin-left: 30px;">
                                                            <img src="{{ asset('assets/images/avatar/default.png') }}"
                                                                alt=""
                                                                class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                            <div class="text-wrap text-break fw-bold text-dark"
                                                                style="width: 6rem;">
                                                                @if(!is_null($posicion3_1))
                                                                    {{ $posicion3_1->nickname }}
                                                                @endif
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal_position3_2" style="margin-left: 30px;">
                                                            <img src="{{ asset('assets/images/avatar/default.png') }}"
                                                                alt=""
                                                                class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                            <div class="text-wrap text-break fw-bold text-dark"
                                                                style="width: 6rem;">
                                                                @if(!is_null($posicion3_2))
                                                                    {{ $posicion3_2->nickname }}
                                                                @endif
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal_position3_3" style="margin-left: 30px;">
                                                            <img src="{{ asset('assets/images/avatar/default.png') }}"
                                                                alt=""
                                                                class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                            <div class="text-wrap text-break fw-bold text-dark"
                                                                style="width: 6rem;">
                                                                @if(!is_null($posicion3_3))
                                                                    {{ $posicion3_3->nickname }}
                                                                @endif
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li id="tercerenlace">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#modal_position2_2" style="margin-left: 30px;">
                                                    <img src="{{ asset('assets/images/avatar/default.png') }}"
                                                        alt=""
                                                        class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                    <div class="text-wrap text-break fw-bold text-dark"
                                                        style="width: 6rem;">
                                                        @if(!is_null($posicion2_2))
                                                            {{ $posicion2_2->nickname }}
                                                        @endif
                                                    </div>
                                                </a>
                                                <ul>
                                                    <li>

                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal_position3_4" style="margin-left: 30px;">
                                                            <img src="{{ asset('assets/images/avatar/default.png') }}"
                                                                alt=""
                                                                class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                            <div class="text-wrap text-break fw-bold text-dark"
                                                                style="width: 6rem;">
                                                                @if(!is_null($posicion3_4))
                                                                    {{ $posicion3_4->nickname }}
                                                                @endif
                                                            </div>
                                                        </a>

                                                    </li>
                                                    <li>
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal_position3_5" style="margin-left: 30px;">
                                                            <img src="{{ asset('assets/images/avatar/default.png') }}"
                                                                alt=""
                                                                class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                            <div class="text-wrap text-break fw-bold text-dark"
                                                                style="width: 6rem;">
                                                                @if(!is_null($posicion3_5))
                                                                    {{ $posicion3_5->nickname }}
                                                                @endif
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                       <a href="#" data-bs-toggle="modal" data-bs-target="#modal_position3_6" style="margin-left: 30px;">
                                                            <img src="{{ asset('assets/images/avatar/default.png') }}"
                                                                alt=""
                                                                class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                            <div class="text-wrap text-break fw-bold text-dark"
                                                                style="width: 6rem;">
                                                                @if(!is_null($posicion3_6))
                                                                    {{ $posicion3_6->nickname }}
                                                                @endif
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#moda_position2_3" style="margin-left: 30px;">
                                                    <img src="{{ asset('assets/images/avatar/default.png') }}"
                                                        alt=""
                                                        class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                    <div class="text-wrap text-break fw-bold text-dark"
                                                        style="width: 6rem;">
                                                        @if(!is_null($posicion2_3))
                                                            {{ $posicion2_3->nickname }}
                                                        @endif
                                                    </div>
                                                </a>
                                                <ul>
                                                    <li>
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#moda_position3_7" style="margin-left: 30px;">
                                                            <img src="{{ asset('assets/images/avatar/default.png') }}"
                                                                alt=""
                                                                class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                            <div class="text-wrap text-break fw-bold text-dark"
                                                                style="width: 6rem;">
                                                                @if(!is_null($posicion3_7))
                                                                    {{ $posicion3_7->nickname }}
                                                                @endif
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#moda_position3_8" style="margin-left: 30px;">
                                                            <img src="{{ asset('assets/images/avatar/default.png') }}"
                                                                alt=""
                                                                class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                            <div class="text-wrap text-break fw-bold text-dark"
                                                                style="width: 6rem;">
                                                                @if(!is_null($posicion3_8))
                                                                    {{ $posicion3_8->nickname }}
                                                                @endif
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#moda_position3_9" style="margin-left: 30px;">
                                                            <img src="{{ asset('assets/images/avatar/default.png') }}"
                                                                alt=""
                                                                class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                            <div class="text-wrap text-break fw-bold text-dark"
                                                                style="width: 6rem;">
                                                                @if(!is_null($posicion3_9))
                                                                    {{ $posicion3_9->nickname }}
                                                                @endif
                                                            </div>
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
