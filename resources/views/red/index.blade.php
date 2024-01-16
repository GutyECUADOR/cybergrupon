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
                            <div class="mb-3 mb-lg-0">

                                <a onclick="moverIzquierda()" id="mover_izquierda" class="btn btn-primary" href="#" role="button"><-</a>
                                <a onclick="moverDerecha()" id="mover_derecha" class="btn btn-primary" href="#" role="button">-></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Flash messages -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                @if (\Request::route()->getName() === 'red.subred')
                    <a href="{{ route('red.index') }}" class="btn btn-sm btn-outline-primary me-2 "><i class="bi bi-arrow-return-left"></i> Regresar al nivel principal</a>
                @endif


                <div class="row">

                    <div class="table-responsive wrapper" id="wraper-arbol">
                        <div id="container-arbol">
                            <table class="table">
                                <div class="tree">
                                    <ul>
                                        <li>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal_position1_1" style="margin-left: 60px;">

                                                @if ($posicion1_1->NivelActualVIP >= 1)
                                                    <img src="{{ asset('assets/images/avatar/UbicacionVIP.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                @else
                                                    <img src="{{ asset('assets/images/avatar/UbicacionUtilizada.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                @endif
                                                <div class="text-wrap text-break fw-bold text-dark" style="width: 6rem;">
                                                    {{ $posicion1_1->nickname }}
                                                </div>
                                                <div class="modal" id="modal_position1_1" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content ">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Posición no Válida</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>No se puede seleccionar la posición raiz.</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Aceptar</button>

                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <!-- segundo nivel -->
                                            <ul id="primerenlace">
                                                <!-- Posicion 2-1 -->
                                                <li>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_position2_1" style="margin-left: 30px;">
                                                    @if(!is_null($posicion2_1))
                                                            @if ($posicion2_1->NivelActualVIP >= 1)
                                                                <img src="{{ asset('assets/images/avatar/UbicacionVIP.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                            @else
                                                                <img src="{{ asset('assets/images/avatar/UbicacionUtilizada.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                            @endif
                                                        @else
                                                            <img src="{{ asset('assets/images/avatar/UbicacionDisponible.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                        @endif
                                                        <div class="text-wrap text-break fw-bold text-dark"
                                                            style="width: 6rem;">
                                                            @if(!is_null($posicion2_1))
                                                                {{
                                                                    $posicion2_1->nickname
                                                                }}
                                                            @endif
                                                        </div>
                                                    </a>
                                                    @if(is_null($posicion2_1))
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
                                                                        <input type="hidden" class="form-control" name="id_usuario_location" value="{{ $posicion1_1->id }}" required>
                                                                        <input type="hidden" class="form-control" name="location" value="1" required>

                                                                        <!-- Username -->
                                                                        <div class="mb-3">
                                                                            <label for="nickname_promoter" class="form-label">Código de Promotor/Patrocinador </label>
                                                                            <input type="text" id="nickname_promoter" class="form-control" name="nickname_promoter" value="{{ auth()->user()->nickname }}" readonly required>
                                                                        </div>

                                                                        <!-- Paquete -->
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Paquete</label>
                                                                            <select class="form-select text-dark" name="paquete">
                                                                                <option selected>Seleccione el paquete</option>
                                                                                @foreach ($packages as $package)
                                                                                    @if (old('paquete') == $package->id)
                                                                                        <option value="{{$package->id}}" selected>Plan {{$package->PrecioAcumuladoWithOutID}} USD</option>
                                                                                    @else
                                                                                        <option value="{{$package->id}}">Plan {{$package->PrecioAcumuladoWithOutID}} USD</option>
                                                                                    @endif
                                                                                @endforeach
                                                                            </select>
                                                                        </div>

                                                                        <!-- Saldo -->
                                                                        <div class="mb-3">
                                                                            <label for="saldo" class="form-label">Pago - Saldo Normal</label>
                                                                            <input type="number" name="pago_saldo" value="{{old('pago_saldo', 0)}}" class="form-control" id="pago_saldo" required autofocus>
                                                                            <p class="badge bg-success text-dark mt-1">Disponible $ <span>{{ Auth::user()->SaldoActual }}</span> USDT</p>
                                                                        </div>

                                                                        <!-- Saldo VIP -->
                                                                        <div class="mb-3">
                                                                            <label for="saldoVIP" class="form-label">Pago - Saldo VIP</label>
                                                                            <input type="number" name="pago_saldoVIP" value="{{old('pago_saldoVIP', 0)}}" class="form-control" id="pago_saldoVIP" required autofocus>
                                                                            <p class="badge bg-success text-dark mt-1">Disponible $ <span>{{ Auth::user()->SaldoVIPActual }}</span> USDT</p>
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
                                                    @else
                                                        <div class="modal" id="modal_position2_1" tabindex="-1" aria-hidden="true">
                                                            <div class="modal-dialog modal-sm">
                                                                <div class="modal-content ">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Posición no Válida</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Posición ya está utilizada.</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Aceptar</button>

                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <ul>
                                                        <li>
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal_position3_1" style="margin-left: 30px;">
                                                                @if(is_null($posicion2_1))
                                                                    <img src="{{ asset('assets/images/avatar/UbicacionNoDisponible.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                                @elseif (!is_null($posicion3_1))
                                                                    @if ($posicion3_1->NivelActualVIP >= 1)
                                                                        <img src="{{ asset('assets/images/avatar/UbicacionVIP.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                                    @else
                                                                        <img src="{{ asset('assets/images/avatar/UbicacionUtilizada.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                                    @endif
                                                                @else
                                                                    <img src="{{ asset('assets/images/avatar/UbicacionDisponible.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                                @endif
                                                                <div class="text-wrap text-break fw-bold text-dark"
                                                                    style="width: 6rem;">
                                                                    @if(!is_null($posicion3_1))
                                                                        {{ $posicion3_1->nickname }}
                                                                    @endif
                                                                </div>
                                                            </a>
                                                            @if(!is_null($posicion2_1))

                                                                @if(is_null($posicion3_1))
                                                                    <!-- Modal -->
                                                                    <div class="modal fade" id="modal_position3_1" tabindex="-1" aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                            <h5 class="modal-title">Registrar en posición Nivel 3-1</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">

                                                                                <form method="POST" action="{{ route('red.store') }}">
                                                                                    @csrf
                                                                                    <input type="hidden" class="form-control" name="id_usuario_location"
                                                                                        value="@if(!is_null($posicion2_1)){{$posicion2_1->id}}@endif " required>
                                                                                    <input type="hidden" class="form-control" name="location" value="1" required>

                                                                                    <!-- Username -->
                                                                                    <div class="mb-3">
                                                                                        <label for="nickname_promoter" class="form-label">Código de Promotor/Patrocinador </label>
                                                                                        <input type="text" id="nickname_promoter" class="form-control" name="nickname_promoter" value="{{ auth()->user()->nickname }}" readonly required>
                                                                                    </div>

                                                                                    <!-- Paquete -->
                                                                                    <div class="mb-3">
                                                                                        <label class="form-label">Paquete</label>
                                                                                        <select class="form-select text-dark" name="paquete">
                                                                                            <option selected>Seleccione el paquete</option>
                                                                                            @foreach ($packages as $package)
                                                                                                @if (old('paquete') == $package->id)
                                                                                                    <option value="{{$package->id}}" selected>Plan {{$package->PrecioAcumuladoWithOutID}} USD</option>
                                                                                                @else
                                                                                                    <option value="{{$package->id}}">Plan {{$package->PrecioAcumuladoWithOutID}} USD</option>
                                                                                                @endif
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>

                                                                                    <!-- Saldo -->
                                                                                    <div class="mb-3">
                                                                                        <label for="saldo" class="form-label">Pago - Saldo Normal</label>
                                                                                        <input type="number" name="pago_saldo" value="{{old('pago_saldo', 0)}}" class="form-control" id="pago_saldo" required autofocus>
                                                                                        <p class="badge bg-success text-dark mt-1">Disponible $ <span>{{ Auth::user()->SaldoActual }}</span> USDT</p>
                                                                                    </div>

                                                                                    <!-- Saldo VIP -->
                                                                                    <div class="mb-3">
                                                                                        <label for="saldoVIP" class="form-label">Pago - Saldo VIP</label>
                                                                                        <input type="number" name="pago_saldoVIP" value="{{old('pago_saldoVIP', 0)}}" class="form-control" id="pago_saldoVIP" required autofocus>
                                                                                        <p class="badge bg-success text-dark mt-1">Disponible $ <span>{{ Auth::user()->SaldoVIPActual }}</span> USDT</p>
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
                                                                @else
                                                                    <div class="modal" id="modal_position3_1" tabindex="-1" aria-hidden="true">
                                                                        <div class="modal-dialog modal-sm">
                                                                            <div class="modal-content ">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title">Posición no Válida</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p>Posición ya está utilizada.</p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                @if (\Request::route()->getName() === 'red.index')
                                                                                    <form method="POST" action="{{ route('red.subred') }}">
                                                                                        @csrf
                                                                                        <input type="hidden" name="id" value="{{$posicion3_1->id}}">
                                                                                        <button type="submit" class="btn btn-sm btn-success">
                                                                                            <span data-feather="bar-chart-2"></span>
                                                                                            Ver nivel 3 y 4
                                                                                        </button>
                                                                                    </form>
                                                                                @elseif (\Request::route()->getName() === 'red.subred')
                                                                                    <form method="POST" action="{{ route('red.subred2') }}">
                                                                                        @csrf
                                                                                        <input type="hidden" name="id" value="{{$posicion3_1->id}}">
                                                                                        <button type="submit" class="btn btn-sm btn-success">
                                                                                            <span data-feather="bar-chart-2"></span>
                                                                                            Ver nivel 5
                                                                                        </button>
                                                                                    </form>
                                                                                @endif
                                                                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Aceptar</button>

                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @else
                                                                <div class="modal" id="modal_position3_1" tabindex="-1" aria-hidden="true">
                                                                    <div class="modal-dialog modal-sm">
                                                                        <div class="modal-content ">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Posición no Válida</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Seleccione una posición con usuario directo.</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Aceptar</button>

                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </li>
                                                        <li>
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal_position3_2" style="margin-left: 30px;">
                                                                @if(is_null($posicion2_1))
                                                                    <img src="{{ asset('assets/images/avatar/UbicacionNoDisponible.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                                @elseif (!is_null($posicion3_2))
                                                                    @if ($posicion3_2->NivelActualVIP >= 1)
                                                                        <img src="{{ asset('assets/images/avatar/UbicacionVIP.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                                    @else
                                                                        <img src="{{ asset('assets/images/avatar/UbicacionUtilizada.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                                    @endif
                                                                @else
                                                                    <img src="{{ asset('assets/images/avatar/UbicacionDisponible.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                                @endif
                                                                <div class="text-wrap text-break fw-bold text-dark"
                                                                    style="width: 6rem;">
                                                                    @if(!is_null($posicion3_2))
                                                                        {{ $posicion3_2->nickname }}
                                                                    @endif
                                                                </div>
                                                            </a>
                                                            @if(!is_null($posicion2_1))
                                                                @if(is_null($posicion3_2))
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="modal_position3_2" tabindex="-1" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                        <h5 class="modal-title">Registrar en posición Nivel 3-2</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">

                                                                            <form method="POST" action="{{ route('red.store') }}">
                                                                                @csrf
                                                                                <input type="hidden" class="form-control" name="id_usuario_location"
                                                                                    value="@if(!is_null($posicion2_1)){{$posicion2_1->id}}@endif " required>
                                                                                <input type="hidden" class="form-control" name="location" value="2" required>

                                                                                <!-- Username -->
                                                                                <div class="mb-3">
                                                                                    <label for="nickname_promoter" class="form-label">Código de Promotor/Patrocinador </label>
                                                                                    <input type="text" id="nickname_promoter" class="form-control" name="nickname_promoter" value="{{ auth()->user()->nickname }}" readonly required>
                                                                                </div>

                                                                                <!-- Paquete -->
                                                                                <div class="mb-3">
                                                                                    <label class="form-label">Paquete</label>
                                                                                    <select class="form-select text-dark" name="paquete">
                                                                                        <option selected>Seleccione el paquete</option>
                                                                                        @foreach ($packages as $package)
                                                                                            @if (old('paquete') == $package->id)
                                                                                                <option value="{{$package->id}}" selected>Plan {{$package->PrecioAcumuladoWithOutID}} USD</option>
                                                                                            @else
                                                                                                <option value="{{$package->id}}">Plan {{$package->PrecioAcumuladoWithOutID}} USD</option>
                                                                                            @endif
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>

                                                                                <!-- Saldo -->
                                                                                <div class="mb-3">
                                                                                    <label for="saldo" class="form-label">Pago - Saldo Normal</label>
                                                                                    <input type="number" name="pago_saldo" value="{{old('pago_saldo', 0)}}" class="form-control" id="pago_saldo" required autofocus>
                                                                                    <p class="badge bg-success text-dark mt-1">Disponible $ <span>{{ Auth::user()->SaldoActual }}</span> USDT</p>
                                                                                </div>

                                                                                <!-- Saldo VIP -->
                                                                                <div class="mb-3">
                                                                                    <label for="saldoVIP" class="form-label">Pago - Saldo VIP</label>
                                                                                    <input type="number" name="pago_saldoVIP" value="{{old('pago_saldoVIP', 0)}}" class="form-control" id="pago_saldoVIP" required autofocus>
                                                                                    <p class="badge bg-success text-dark mt-1">Disponible $ <span>{{ Auth::user()->SaldoVIPActual }}</span> USDT</p>
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
                                                                @else
                                                                    <div class="modal" id="modal_position3_2" tabindex="-1" aria-hidden="true">
                                                                        <div class="modal-dialog modal-sm">
                                                                            <div class="modal-content ">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title">Posición no Válida</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p>Posición ya está utilizada.</p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                @if (\Request::route()->getName() === 'red.index')
                                                                                    <form method="POST" action="{{ route('red.subred') }}">
                                                                                        @csrf
                                                                                        <input type="hidden" name="id" value="{{$posicion3_2->id}}">
                                                                                        <button type="submit" class="btn btn-sm btn-success">
                                                                                            <span data-feather="bar-chart-2"></span>
                                                                                            Ver nivel 3 y 4
                                                                                        </button>
                                                                                    </form>
                                                                                @elseif (\Request::route()->getName() === 'red.subred')
                                                                                    <form method="POST" action="{{ route('red.subred2') }}">
                                                                                        @csrf
                                                                                        <input type="hidden" name="id" value="{{$posicion3_2->id}}">
                                                                                        <button type="submit" class="btn btn-sm btn-success">
                                                                                            <span data-feather="bar-chart-2"></span>
                                                                                            Ver nivel 5
                                                                                        </button>
                                                                                    </form>
                                                                                @endif

                                                                                <button type="button" class="btn btn-sm btn-secondary btn-sm" data-bs-dismiss="modal">Aceptar</button>

                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @else
                                                                <div class="modal" id="modal_position3_2" tabindex="-1" aria-hidden="true">
                                                                    <div class="modal-dialog modal-sm">
                                                                        <div class="modal-content ">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Posición no Válida</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Seleccione una posición con usuario directo.</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Aceptar</button>

                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </li>
                                                        <li>
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal_position3_3" style="margin-left: 30px;">
                                                                @if(is_null($posicion2_1))
                                                                    <img src="{{ asset('assets/images/avatar/UbicacionNoDisponible.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                                @elseif (!is_null($posicion3_3))
                                                                    @if ($posicion3_3->NivelActualVIP >= 1)
                                                                        <img src="{{ asset('assets/images/avatar/UbicacionVIP.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                                    @else
                                                                        <img src="{{ asset('assets/images/avatar/UbicacionUtilizada.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                                    @endif
                                                                @else
                                                                    <img src="{{ asset('assets/images/avatar/UbicacionDisponible.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                                @endif
                                                                <div class="text-wrap text-break fw-bold text-dark"
                                                                    style="width: 6rem;">
                                                                    @if(!is_null($posicion3_3))
                                                                        {{ $posicion3_3->nickname }}
                                                                    @endif
                                                                </div>
                                                            </a>
                                                            @if(!is_null($posicion2_1))
                                                                @if(is_null($posicion3_3))
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="modal_position3_3" tabindex="-1" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                        <h5 class="modal-title">Registrar en posición Nivel 3-3</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">

                                                                            <form method="POST" action="{{ route('red.store') }}">
                                                                                @csrf
                                                                                <input type="hidden" class="form-control" name="id_usuario_location"
                                                                                    value="@if(!is_null($posicion2_1)){{$posicion2_1->id}}@endif " required>
                                                                                <input type="hidden" class="form-control" name="location" value="3" required>

                                                                                <!-- Username -->
                                                                                <div class="mb-3">
                                                                                    <label for="nickname_promoter" class="form-label">Código de Promotor/Patrocinador </label>
                                                                                    <input type="text" id="nickname_promoter" class="form-control" name="nickname_promoter" value="{{ auth()->user()->nickname }}" readonly required>
                                                                                </div>

                                                                                <!-- Paquete -->
                                                                                <div class="mb-3">
                                                                                    <label class="form-label">Paquete</label>
                                                                                    <select class="form-select text-dark" name="paquete">
                                                                                        <option selected>Seleccione el paquete</option>
                                                                                        @foreach ($packages as $package)
                                                                                            @if (old('paquete') == $package->id)
                                                                                                <option value="{{$package->id}}" selected>Plan {{$package->PrecioAcumuladoWithOutID}} USD</option>
                                                                                            @else
                                                                                                <option value="{{$package->id}}">Plan {{$package->PrecioAcumuladoWithOutID}} USD</option>
                                                                                            @endif
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>

                                                                                <!-- Saldo -->
                                                                                <div class="mb-3">
                                                                                    <label for="saldo" class="form-label">Pago - Saldo Normal</label>
                                                                                    <input type="number" name="pago_saldo" value="{{old('pago_saldo', 0)}}" class="form-control" id="pago_saldo" required autofocus>
                                                                                    <p class="badge bg-success text-dark mt-1">Disponible $ <span>{{ Auth::user()->SaldoActual }}</span> USDT</p>
                                                                                </div>

                                                                                <!-- Saldo VIP -->
                                                                                <div class="mb-3">
                                                                                    <label for="saldoVIP" class="form-label">Pago - Saldo VIP</label>
                                                                                    <input type="number" name="pago_saldoVIP" value="{{old('pago_saldoVIP', 0)}}" class="form-control" id="pago_saldoVIP" required autofocus>
                                                                                    <p class="badge bg-success text-dark mt-1">Disponible $ <span>{{ Auth::user()->SaldoVIPActual }}</span> USDT</p>
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
                                                                @else
                                                                    <div class="modal" id="modal_position3_3" tabindex="-1" aria-hidden="true">
                                                                        <div class="modal-dialog modal-sm">
                                                                            <div class="modal-content ">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title">Posición no Válida</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p>Posición ya está utilizada.</p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                @if (\Request::route()->getName() === 'red.index')
                                                                                    <form method="POST" action="{{ route('red.subred') }}">
                                                                                        @csrf
                                                                                        <input type="hidden" name="id" value="{{$posicion3_3->id}}">
                                                                                        <button type="submit" class="btn btn-sm btn-success">
                                                                                            <span data-feather="bar-chart-2"></span>
                                                                                            Ver nivel 3 y 4
                                                                                        </button>
                                                                                    </form>
                                                                                @elseif (\Request::route()->getName() === 'red.subred')
                                                                                    <form method="POST" action="{{ route('red.subred2') }}">
                                                                                        @csrf
                                                                                        <input type="hidden" name="id" value="{{$posicion3_3->id}}">
                                                                                        <button type="submit" class="btn btn-sm btn-success">
                                                                                            <span data-feather="bar-chart-2"></span>
                                                                                            Ver nivel 5
                                                                                        </button>
                                                                                    </form>
                                                                                @endif
                                                                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Aceptar</button>

                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @else
                                                                <div class="modal" id="modal_position3_3" tabindex="-1" aria-hidden="true">
                                                                    <div class="modal-dialog modal-sm">
                                                                        <div class="modal-content ">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Posición no Válida</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Seleccione una posición con usuario directo.</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Aceptar</button>

                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </li>
                                                    </ul>
                                                </li>
                                                <!-- Posicion 2-2 -->
                                                <li id="tercerenlace">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_position2_2" style="margin-left: 30px;">
                                                        @if(!is_null($posicion2_2))
                                                            @if ($posicion2_2->NivelActualVIP >= 1)
                                                                <img src="{{ asset('assets/images/avatar/UbicacionVIP.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                            @else
                                                                <img src="{{ asset('assets/images/avatar/UbicacionUtilizada.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                            @endif
                                                        @else
                                                            <img src="{{ asset('assets/images/avatar/UbicacionDisponible.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                        @endif
                                                        <div class="text-wrap text-break fw-bold text-dark"
                                                            style="width: 6rem;">
                                                            @if(!is_null($posicion2_2))
                                                                {{ $posicion2_2->nickname }}
                                                            @endif
                                                        </div>
                                                    </a>

                                                    @if(is_null($posicion2_2))
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modal_position2_2" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title">Registrar en posición 2-2</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <form method="POST" action="{{ route('red.store') }}">
                                                                    @csrf
                                                                    <input type="hidden" class="form-control" name="id_usuario_location" value="{{ $posicion1_1->id }}" required>
                                                                    <input type="hidden" class="form-control" name="location" value="2" required>

                                                                    <!-- Username -->
                                                                    <div class="mb-3">
                                                                        <label for="nickname_promoter" class="form-label">Código de Promotor/Patrocinador </label>
                                                                        <input type="text" id="nickname_promoter" class="form-control" name="nickname_promoter" value="{{ auth()->user()->nickname }}" readonly required>
                                                                    </div>

                                                                    <!-- Paquete -->
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Paquete</label>
                                                                        <select class="form-select text-dark" name="paquete">
                                                                            <option selected>Seleccione el paquete</option>
                                                                            @foreach ($packages as $package)
                                                                                @if (old('paquete') == $package->id)
                                                                                    <option value="{{$package->id}}" selected>Plan {{$package->PrecioAcumuladoWithOutID}} USD</option>
                                                                                @else
                                                                                    <option value="{{$package->id}}">Plan {{$package->PrecioAcumuladoWithOutID}} USD</option>
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <!-- Saldo -->
                                                                    <div class="mb-3">
                                                                        <label for="saldo" class="form-label">Pago - Saldo Normal</label>
                                                                        <input type="number" name="pago_saldo" value="{{old('pago_saldo', 0)}}" class="form-control" id="pago_saldo" required autofocus>
                                                                        <p class="badge bg-success text-dark mt-1">Disponible $ <span>{{ Auth::user()->SaldoActual }}</span> USDT</p>
                                                                    </div>

                                                                    <!-- Saldo VIP -->
                                                                    <div class="mb-3">
                                                                        <label for="saldoVIP" class="form-label">Pago - Saldo VIP</label>
                                                                        <input type="number" name="pago_saldoVIP" value="{{old('pago_saldoVIP', 0)}}" class="form-control" id="pago_saldoVIP" required autofocus>
                                                                        <p class="badge bg-success text-dark mt-1">Disponible $ <span>{{ Auth::user()->SaldoVIPActual }}</span> USDT</p>
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
                                                    @else
                                                        <div class="modal" id="modal_position2_2" tabindex="-1" aria-hidden="true">
                                                            <div class="modal-dialog modal-sm">
                                                                <div class="modal-content ">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Posición no Válida</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Posición ya está utilizada.</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Aceptar</button>

                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    <ul>
                                                        <li>

                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal_position3_4" style="margin-left: 30px;">
                                                                @if(is_null($posicion2_2))
                                                                    <img src="{{ asset('assets/images/avatar/UbicacionNoDisponible.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                                @elseif (!is_null($posicion3_4))
                                                                    @if ($posicion3_4->NivelActualVIP >= 1)
                                                                        <img src="{{ asset('assets/images/avatar/UbicacionVIP.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                                    @else
                                                                        <img src="{{ asset('assets/images/avatar/UbicacionUtilizada.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                                    @endif
                                                                @else
                                                                    <img src="{{ asset('assets/images/avatar/UbicacionDisponible.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                                @endif
                                                                <div class="text-wrap text-break fw-bold text-dark"
                                                                    style="width: 6rem;">
                                                                    @if(!is_null($posicion3_4))
                                                                        {{ $posicion3_4->nickname }}
                                                                    @endif
                                                                </div>
                                                            </a>
                                                            @if(!is_null($posicion2_2))
                                                                @if(is_null($posicion3_4))
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="modal_position3_4" tabindex="-1" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                        <h5 class="modal-title">Registrar en posición Nivel 3-4</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">

                                                                            <form method="POST" action="{{ route('red.store') }}">
                                                                                @csrf
                                                                                <input type="hidden" class="form-control" name="id_usuario_location"
                                                                                    value="@if(!is_null($posicion2_2)){{$posicion2_2->id}}@endif " required>
                                                                                <input type="hidden" class="form-control" name="location" value="1" required>

                                                                                <!-- Username -->
                                                                                <div class="mb-3">
                                                                                    <label for="nickname_promoter" class="form-label">Código de Promotor/Patrocinador </label>
                                                                                    <input type="text" id="nickname_promoter" class="form-control" name="nickname_promoter" value="{{ auth()->user()->nickname }}" readonly required>
                                                                                </div>

                                                                                <!-- Paquete -->
                                                                                <div class="mb-3">
                                                                                    <label class="form-label">Paquete</label>
                                                                                    <select class="form-select text-dark" name="paquete">
                                                                                        <option selected>Seleccione el paquete</option>
                                                                                        @foreach ($packages as $package)
                                                                                            @if (old('paquete') == $package->id)
                                                                                                <option value="{{$package->id}}" selected>Plan {{$package->PrecioAcumuladoWithOutID}} USD</option>
                                                                                            @else
                                                                                                <option value="{{$package->id}}">Plan {{$package->PrecioAcumuladoWithOutID}} USD</option>
                                                                                            @endif
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>

                                                                                <!-- Saldo -->
                                                                                <div class="mb-3">
                                                                                    <label for="saldo" class="form-label">Pago - Saldo Normal</label>
                                                                                    <input type="number" name="pago_saldo" value="{{old('pago_saldo', 0)}}" class="form-control" id="pago_saldo" required autofocus>
                                                                                    <p class="badge bg-success text-dark mt-1">Disponible $ <span>{{ Auth::user()->SaldoActual }}</span> USDT</p>
                                                                                </div>

                                                                                <!-- Saldo VIP -->
                                                                                <div class="mb-3">
                                                                                    <label for="saldoVIP" class="form-label">Pago - Saldo VIP</label>
                                                                                    <input type="number" name="pago_saldoVIP" value="{{old('pago_saldoVIP', 0)}}" class="form-control" id="pago_saldoVIP" required autofocus>
                                                                                    <p class="badge bg-success text-dark mt-1">Disponible $ <span>{{ Auth::user()->SaldoVIPActual }}</span> USDT</p>
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
                                                                @else
                                                                    <div class="modal" id="modal_position3_4" tabindex="-1" aria-hidden="true">
                                                                        <div class="modal-dialog modal-sm">
                                                                            <div class="modal-content ">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title">Posición no Válida</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p>Posición ya está utilizada.</p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                @if (\Request::route()->getName() === 'red.index')
                                                                                    <form method="POST" action="{{ route('red.subred') }}">
                                                                                        @csrf
                                                                                        <input type="hidden" name="id" value="{{$posicion3_4->id}}">
                                                                                        <button type="submit" class="btn btn-sm btn-success">
                                                                                            <span data-feather="bar-chart-2"></span>
                                                                                            Ver nivel 3 y 4
                                                                                        </button>
                                                                                    </form>
                                                                                @elseif (\Request::route()->getName() === 'red.subred')
                                                                                    <form method="POST" action="{{ route('red.subred2') }}">
                                                                                        @csrf
                                                                                        <input type="hidden" name="id" value="{{$posicion3_4->id}}">
                                                                                        <button type="submit" class="btn btn-sm btn-success">
                                                                                            <span data-feather="bar-chart-2"></span>
                                                                                            Ver nivel 5
                                                                                        </button>
                                                                                    </form>
                                                                                @endif
                                                                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Aceptar</button>

                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @else
                                                                <div class="modal" id="modal_position3_4" tabindex="-1" aria-hidden="true">
                                                                    <div class="modal-dialog modal-sm">
                                                                        <div class="modal-content ">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Posición no Válida</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Seleccione una posición con usuario directo.</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Aceptar</button>

                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </li>
                                                        <li>
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal_position3_5" style="margin-left: 30px;">
                                                                @if(is_null($posicion2_2))
                                                                    <img src="{{ asset('assets/images/avatar/UbicacionNoDisponible.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                                @elseif (!is_null($posicion3_5))
                                                                    @if ($posicion3_5->NivelActualVIP >= 1)
                                                                        <img src="{{ asset('assets/images/avatar/UbicacionVIP.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                                    @else
                                                                        <img src="{{ asset('assets/images/avatar/UbicacionUtilizada.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                                    @endif
                                                                @else
                                                                    <img src="{{ asset('assets/images/avatar/UbicacionDisponible.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                                @endif
                                                                <div class="text-wrap text-break fw-bold text-dark"
                                                                    style="width: 6rem;">
                                                                    @if(!is_null($posicion3_5))
                                                                        {{ $posicion3_5->nickname }}
                                                                    @endif
                                                                </div>
                                                            </a>
                                                            @if(!is_null($posicion2_2))
                                                                @if(is_null($posicion3_5))
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="modal_position3_5" tabindex="-1" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                        <h5 class="modal-title">Registrar en posición Nivel 3-5</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">

                                                                            <form method="POST" action="{{ route('red.store') }}">
                                                                                @csrf
                                                                                <input type="hidden" class="form-control" name="id_usuario_location"
                                                                                    value="@if(!is_null($posicion2_2)){{$posicion2_2->id}}@endif " required>
                                                                                <input type="hidden" class="form-control" name="location" value="2" required>

                                                                                <!-- Username -->
                                                                                <div class="mb-3">
                                                                                    <label for="nickname_promoter" class="form-label">Código de Promotor/Patrocinador </label>
                                                                                    <input type="text" id="nickname_promoter" class="form-control" name="nickname_promoter" value="{{ auth()->user()->nickname }}" readonly required>
                                                                                </div>

                                                                                <!-- Paquete -->
                                                                                <div class="mb-3">
                                                                                    <label class="form-label">Paquete</label>
                                                                                    <select class="form-select text-dark" name="paquete">
                                                                                        <option selected>Seleccione el paquete</option>
                                                                                        @foreach ($packages as $package)
                                                                                            @if (old('paquete') == $package->id)
                                                                                                <option value="{{$package->id}}" selected>Plan {{$package->PrecioAcumuladoWithOutID}} USD</option>
                                                                                            @else
                                                                                                <option value="{{$package->id}}">Plan {{$package->PrecioAcumuladoWithOutID}} USD</option>
                                                                                            @endif
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>

                                                                                <!-- Saldo -->
                                                                                <div class="mb-3">
                                                                                    <label for="saldo" class="form-label">Pago - Saldo Normal</label>
                                                                                    <input type="number" name="pago_saldo" value="{{old('pago_saldo', 0)}}" class="form-control" id="pago_saldo" required autofocus>
                                                                                    <p class="badge bg-success text-dark mt-1">Disponible $ <span>{{ Auth::user()->SaldoActual }}</span> USDT</p>
                                                                                </div>

                                                                                <!-- Saldo VIP -->
                                                                                <div class="mb-3">
                                                                                    <label for="saldoVIP" class="form-label">Pago - Saldo VIP</label>
                                                                                    <input type="number" name="pago_saldoVIP" value="{{old('pago_saldoVIP', 0)}}" class="form-control" id="pago_saldoVIP" required autofocus>
                                                                                    <p class="badge bg-success text-dark mt-1">Disponible $ <span>{{ Auth::user()->SaldoVIPActual }}</span> USDT</p>
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
                                                                @else
                                                                    <div class="modal" id="modal_position3_5" tabindex="-1" aria-hidden="true">
                                                                        <div class="modal-dialog modal-sm">
                                                                            <div class="modal-content ">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title">Posición no Válida</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p>Posición ya está utilizada.</p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                @if (\Request::route()->getName() === 'red.index')
                                                                                    <form method="POST" action="{{ route('red.subred') }}">
                                                                                        @csrf
                                                                                        <input type="hidden" name="id" value="{{$posicion3_5->id}}">
                                                                                        <button type="submit" class="btn btn-sm btn-success">
                                                                                            <span data-feather="bar-chart-2"></span>
                                                                                            Ver nivel 3 y 4
                                                                                        </button>
                                                                                    </form>
                                                                                @elseif (\Request::route()->getName() === 'red.subred')
                                                                                    <form method="POST" action="{{ route('red.subred2') }}">
                                                                                        @csrf
                                                                                        <input type="hidden" name="id" value="{{$posicion3_5->id}}">
                                                                                        <button type="submit" class="btn btn-sm btn-success">
                                                                                            <span data-feather="bar-chart-2"></span>
                                                                                            Ver nivel 5
                                                                                        </button>
                                                                                    </form>
                                                                                @endif
                                                                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Aceptar</button>

                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @else
                                                                <div class="modal" id="modal_position3_5" tabindex="-1" aria-hidden="true">
                                                                    <div class="modal-dialog modal-sm">
                                                                        <div class="modal-content ">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Posición no Válida</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Seleccione una posición con usuario directo.</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Aceptar</button>

                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </li>
                                                        <li>
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal_position3_6" style="margin-left: 30px;">
                                                                @if(is_null($posicion2_2))
                                                                    <img src="{{ asset('assets/images/avatar/UbicacionNoDisponible.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                                @elseif (!is_null($posicion3_6))
                                                                    @if ($posicion3_6->NivelActualVIP >= 1)
                                                                        <img src="{{ asset('assets/images/avatar/UbicacionVIP.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                                    @else
                                                                        <img src="{{ asset('assets/images/avatar/UbicacionUtilizada.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                                    @endif
                                                                @else
                                                                    <img src="{{ asset('assets/images/avatar/UbicacionDisponible.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                                @endif
                                                                <div class="text-wrap text-break fw-bold text-dark"
                                                                    style="width: 6rem;">
                                                                    @if(!is_null($posicion3_6))
                                                                        {{ $posicion3_6->nickname }}
                                                                    @endif
                                                                </div>
                                                            </a>
                                                            @if(!is_null($posicion2_2))
                                                                @if(is_null($posicion3_6))
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="modal_position3_6" tabindex="-1" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                        <h5 class="modal-title">Registrar en posición Nivel 3-6</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">

                                                                            <form method="POST" action="{{ route('red.store') }}">
                                                                                @csrf
                                                                                <input type="hidden" class="form-control" name="id_usuario_location"
                                                                                    value="@if(!is_null($posicion2_2)){{$posicion2_2->id}}@endif " required>
                                                                                <input type="hidden" class="form-control" name="location" value="3" required>

                                                                                <!-- Username -->
                                                                                <div class="mb-3">
                                                                                    <label for="nickname_promoter" class="form-label">Código de Promotor/Patrocinador </label>
                                                                                    <input type="text" id="nickname_promoter" class="form-control" name="nickname_promoter" value="{{ auth()->user()->nickname }}" readonly required>
                                                                                </div>

                                                                                <!-- Paquete -->
                                                                                <div class="mb-3">
                                                                                    <label class="form-label">Paquete</label>
                                                                                    <select class="form-select text-dark" name="paquete">
                                                                                        <option selected>Seleccione el paquete</option>
                                                                                        @foreach ($packages as $package)
                                                                                            @if (old('paquete') == $package->id)
                                                                                                <option value="{{$package->id}}" selected>Plan {{$package->PrecioAcumuladoWithOutID}} USD</option>
                                                                                            @else
                                                                                                <option value="{{$package->id}}">Plan {{$package->PrecioAcumuladoWithOutID}} USD</option>
                                                                                            @endif
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>

                                                                                <!-- Saldo -->
                                                                                <div class="mb-3">
                                                                                    <label for="saldo" class="form-label">Pago - Saldo Normal</label>
                                                                                    <input type="number" name="pago_saldo" value="{{old('pago_saldo', 0)}}" class="form-control" id="pago_saldo" required autofocus>
                                                                                    <p class="badge bg-success text-dark mt-1">Disponible $ <span>{{ Auth::user()->SaldoActual }}</span> USDT</p>
                                                                                </div>

                                                                                <!-- Saldo VIP -->
                                                                                <div class="mb-3">
                                                                                    <label for="saldoVIP" class="form-label">Pago - Saldo VIP</label>
                                                                                    <input type="number" name="pago_saldoVIP" value="{{old('pago_saldoVIP', 0)}}" class="form-control" id="pago_saldoVIP" required autofocus>
                                                                                    <p class="badge bg-success text-dark mt-1">Disponible $ <span>{{ Auth::user()->SaldoVIPActual }}</span> USDT</p>
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
                                                                @else
                                                                    <div class="modal" id="modal_position3_6" tabindex="-1" aria-hidden="true">
                                                                        <div class="modal-dialog modal-sm">
                                                                            <div class="modal-content ">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title">Posición no Válida</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p>Posición ya está utilizada.</p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                @if (\Request::route()->getName() === 'red.index')
                                                                                    <form method="POST" action="{{ route('red.subred') }}">
                                                                                        @csrf
                                                                                        <input type="hidden" name="id" value="{{$posicion3_6->id}}">
                                                                                        <button type="submit" class="btn btn-sm btn-success">
                                                                                            <span data-feather="bar-chart-2"></span>
                                                                                            Ver nivel 3 y 4
                                                                                        </button>
                                                                                    </form>
                                                                                @elseif (\Request::route()->getName() === 'red.subred')
                                                                                    <form method="POST" action="{{ route('red.subred2') }}">
                                                                                        @csrf
                                                                                        <input type="hidden" name="id" value="{{$posicion3_6->id}}">
                                                                                        <button type="submit" class="btn btn-sm btn-success">
                                                                                            <span data-feather="bar-chart-2"></span>
                                                                                            Ver nivel 5
                                                                                        </button>
                                                                                    </form>
                                                                                @endif
                                                                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Aceptar</button>

                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @else
                                                                <div class="modal" id="modal_position3_6" tabindex="-1" aria-hidden="true">
                                                                    <div class="modal-dialog modal-sm">
                                                                        <div class="modal-content ">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Posición no Válida</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Seleccione una posición con usuario directo.</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Aceptar</button>

                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </li>
                                                    </ul>
                                                </li>
                                                <!-- Posicion 2-3 -->
                                                <li>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_position2_3" style="margin-left: 30px;">
                                                        @if(!is_null($posicion2_3))
                                                            @if ($posicion2_3->NivelActualVIP >= 1)
                                                                <img src="{{ asset('assets/images/avatar/UbicacionVIP.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                            @else
                                                                <img src="{{ asset('assets/images/avatar/UbicacionUtilizada.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                            @endif
                                                        @else
                                                            <img src="{{ asset('assets/images/avatar/UbicacionDisponible.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                        @endif
                                                        <div class="text-wrap text-break fw-bold text-dark"
                                                            style="width: 6rem;">
                                                            @if(!is_null($posicion2_3))
                                                                {{ $posicion2_3->nickname }}
                                                            @endif
                                                        </div>
                                                    </a>
                                                    @if(is_null($posicion2_3))
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modal_position2_3" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title">Registrar en posición 2-3</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <form method="POST" action="{{ route('red.store') }}">
                                                                    @csrf
                                                                    <input type="hidden" class="form-control" name="id_usuario_location" value="{{ $posicion1_1->id }}" required>
                                                                    <input type="hidden" class="form-control" name="location" value="3" required>

                                                                    <!-- Username -->
                                                                    <div class="mb-3">
                                                                        <label for="nickname_promoter" class="form-label">Código de Promotor/Patrocinador </label>
                                                                        <input type="text" id="nickname_promoter" class="form-control" name="nickname_promoter" value="{{ auth()->user()->nickname }}" readonly required>
                                                                    </div>

                                                                    <!-- Paquete -->
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Paquete</label>
                                                                        <select class="form-select text-dark" name="paquete">
                                                                            <option selected>Seleccione el paquete</option>
                                                                            @foreach ($packages as $package)
                                                                                @if (old('paquete') == $package->id)
                                                                                    <option value="{{$package->id}}" selected>Plan {{$package->PrecioAcumuladoWithOutID}} USD</option>
                                                                                @else
                                                                                    <option value="{{$package->id}}">Plan {{$package->PrecioAcumuladoWithOutID}} USD</option>
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <!-- Saldo -->
                                                                    <div class="mb-3">
                                                                        <label for="saldo" class="form-label">Pago - Saldo Normal</label>
                                                                        <input type="number" name="pago_saldo" value="{{old('pago_saldo', 0)}}" class="form-control" id="pago_saldo" required autofocus>
                                                                        <p class="badge bg-success text-dark mt-1">Disponible $ <span>{{ Auth::user()->SaldoActual }}</span> USDT</p>
                                                                    </div>

                                                                    <!-- Saldo VIP -->
                                                                    <div class="mb-3">
                                                                        <label for="saldoVIP" class="form-label">Pago - Saldo VIP</label>
                                                                        <input type="number" name="pago_saldoVIP" value="{{old('pago_saldoVIP', 0)}}" class="form-control" id="pago_saldoVIP" required autofocus>
                                                                        <p class="badge bg-success text-dark mt-1">Disponible $ <span>{{ Auth::user()->SaldoVIPActual }}</span> USDT</p>
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
                                                    @else
                                                        <div class="modal" id="modal_position2_3" tabindex="-1" aria-hidden="true">
                                                            <div class="modal-dialog modal-sm">
                                                                <div class="modal-content ">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Posición no Válida</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Posición ya está utilizada.</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Aceptar</button>

                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    <ul>
                                                        <li>
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal_position3_7" style="margin-left: 30px;">
                                                                @if(is_null($posicion2_3))
                                                                    <img src="{{ asset('assets/images/avatar/UbicacionNoDisponible.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                                @elseif (!is_null($posicion3_7))
                                                                    @if ($posicion3_7->NivelActualVIP >= 1)
                                                                        <img src="{{ asset('assets/images/avatar/UbicacionVIP.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                                    @else
                                                                        <img src="{{ asset('assets/images/avatar/UbicacionUtilizada.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                                    @endif
                                                                @else
                                                                    <img src="{{ asset('assets/images/avatar/UbicacionDisponible.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                                @endif
                                                                <div class="text-wrap text-break fw-bold text-dark"
                                                                    style="width: 6rem;">
                                                                    @if(!is_null($posicion3_7))
                                                                        {{ $posicion3_7->nickname }}
                                                                    @endif
                                                                </div>
                                                            </a>
                                                            @if(!is_null($posicion2_3))
                                                                @if(is_null($posicion3_7))
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="modal_position3_7" tabindex="-1" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                        <h5 class="modal-title">Registrar en posición Nivel 3-7</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">

                                                                            <form method="POST" action="{{ route('red.store') }}">
                                                                                @csrf
                                                                                <input type="hidden" class="form-control" name="id_usuario_location"
                                                                                    value="@if(!is_null($posicion2_3)){{$posicion2_3->id}}@endif " required>
                                                                                <input type="hidden" class="form-control" name="location" value="1" required>

                                                                                <!-- Username -->
                                                                                <div class="mb-3">
                                                                                    <label for="nickname_promoter" class="form-label">Código de Promotor/Patrocinador </label>
                                                                                    <input type="text" id="nickname_promoter" class="form-control" name="nickname_promoter" value="{{ auth()->user()->nickname }}" readonly required>
                                                                                </div>

                                                                                <!-- Paquete -->
                                                                                <div class="mb-3">
                                                                                    <label class="form-label">Paquete</label>
                                                                                    <select class="form-select text-dark" name="paquete">
                                                                                        <option selected>Seleccione el paquete</option>
                                                                                        @foreach ($packages as $package)
                                                                                            @if (old('paquete') == $package->id)
                                                                                                <option value="{{$package->id}}" selected>Plan {{$package->PrecioAcumuladoWithOutID}} USD</option>
                                                                                            @else
                                                                                                <option value="{{$package->id}}">Plan {{$package->PrecioAcumuladoWithOutID}} USD</option>
                                                                                            @endif
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>

                                                                                <!-- Saldo -->
                                                                                <div class="mb-3">
                                                                                    <label for="saldo" class="form-label">Pago - Saldo Normal</label>
                                                                                    <input type="number" name="pago_saldo" value="{{old('pago_saldo', 0)}}" class="form-control" id="pago_saldo" required autofocus>
                                                                                    <p class="badge bg-success text-dark mt-1">Disponible $ <span>{{ Auth::user()->SaldoActual }}</span> USDT</p>
                                                                                </div>

                                                                                <!-- Saldo VIP -->
                                                                                <div class="mb-3">
                                                                                    <label for="saldoVIP" class="form-label">Pago - Saldo VIP</label>
                                                                                    <input type="number" name="pago_saldoVIP" value="{{old('pago_saldoVIP', 0)}}" class="form-control" id="pago_saldoVIP" required autofocus>
                                                                                    <p class="badge bg-success text-dark mt-1">Disponible $ <span>{{ Auth::user()->SaldoVIPActual }}</span> USDT</p>
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
                                                                @else
                                                                    <div class="modal" id="modal_position3_7" tabindex="-1" aria-hidden="true">
                                                                        <div class="modal-dialog modal-sm">
                                                                            <div class="modal-content ">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title">Posición no Válida</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p>Posición ya está utilizada.</p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                @if (\Request::route()->getName() === 'red.index')
                                                                                    <form method="POST" action="{{ route('red.subred') }}">
                                                                                        @csrf
                                                                                        <input type="hidden" name="id" value="{{$posicion3_7->id}}">
                                                                                        <button type="submit" class="btn btn-sm btn-success">
                                                                                            <span data-feather="bar-chart-2"></span>
                                                                                            Ver nivel 3 y 4
                                                                                        </button>
                                                                                    </form>
                                                                                @elseif (\Request::route()->getName() === 'red.subred')
                                                                                    <form method="POST" action="{{ route('red.subred2') }}">
                                                                                        @csrf
                                                                                        <input type="hidden" name="id" value="{{$posicion3_7->id}}">
                                                                                        <button type="submit" class="btn btn-sm btn-success">
                                                                                            <span data-feather="bar-chart-2"></span>
                                                                                            Ver nivel 5
                                                                                        </button>
                                                                                    </form>
                                                                                @endif
                                                                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Aceptar</button>

                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @else
                                                                <div class="modal" id="modal_position3_7" tabindex="-1" aria-hidden="true">
                                                                    <div class="modal-dialog modal-sm">
                                                                        <div class="modal-content ">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Posición no Válida</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Seleccione una posición con usuario directo.</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Aceptar</button>

                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </li>
                                                        <li>
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal_position3_8" style="margin-left: 30px;">
                                                                @if(is_null($posicion2_3))
                                                                    <img src="{{ asset('assets/images/avatar/UbicacionNoDisponible.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                                @elseif (!is_null($posicion3_8))
                                                                    @if ($posicion3_8->NivelActualVIP >= 1)
                                                                        <img src="{{ asset('assets/images/avatar/UbicacionVIP.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                                    @else
                                                                        <img src="{{ asset('assets/images/avatar/UbicacionUtilizada.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                                    @endif
                                                                @else
                                                                    <img src="{{ asset('assets/images/avatar/UbicacionDisponible.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                                @endif
                                                                <div class="text-wrap text-break fw-bold text-dark"
                                                                    style="width: 6rem;">
                                                                    @if(!is_null($posicion3_8))
                                                                        {{ $posicion3_8->nickname }}
                                                                    @endif
                                                                </div>
                                                            </a>
                                                            @if(!is_null($posicion2_3))
                                                                @if(is_null($posicion3_8))
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="modal_position3_8" tabindex="-1" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                        <h5 class="modal-title">Registrar en posición Nivel 3-8</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">

                                                                            <form method="POST" action="{{ route('red.store') }}">
                                                                                @csrf
                                                                                <input type="hidden" class="form-control" name="id_usuario_location"
                                                                                    value="@if(!is_null($posicion2_3)){{$posicion2_3->id}}@endif " required>
                                                                                <input type="hidden" class="form-control" name="location" value="2" required>

                                                                                <!-- Username -->
                                                                                <div class="mb-3">
                                                                                    <label for="nickname_promoter" class="form-label">Código de Promotor/Patrocinador </label>
                                                                                    <input type="text" id="nickname_promoter" class="form-control" name="nickname_promoter" value="{{ auth()->user()->nickname }}" readonly required>
                                                                                </div>

                                                                                <!-- Paquete -->
                                                                                <div class="mb-3">
                                                                                    <label class="form-label">Paquete</label>
                                                                                    <select class="form-select text-dark" name="paquete">
                                                                                        <option selected>Seleccione el paquete</option>
                                                                                        @foreach ($packages as $package)
                                                                                            @if (old('paquete') == $package->id)
                                                                                                <option value="{{$package->id}}" selected>Plan {{$package->PrecioAcumuladoWithOutID}} USD</option>
                                                                                            @else
                                                                                                <option value="{{$package->id}}">Plan {{$package->PrecioAcumuladoWithOutID}} USD</option>
                                                                                            @endif
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>

                                                                                <!-- Saldo -->
                                                                                <div class="mb-3">
                                                                                    <label for="saldo" class="form-label">Pago - Saldo Normal</label>
                                                                                    <input type="number" name="pago_saldo" value="{{old('pago_saldo', 0)}}" class="form-control" id="pago_saldo" required autofocus>
                                                                                    <p class="badge bg-success text-dark mt-1">Disponible $ <span>{{ Auth::user()->SaldoActual }}</span> USDT</p>
                                                                                </div>

                                                                                <!-- Saldo VIP -->
                                                                                <div class="mb-3">
                                                                                    <label for="saldoVIP" class="form-label">Pago - Saldo VIP</label>
                                                                                    <input type="number" name="pago_saldoVIP" value="{{old('pago_saldoVIP', 0)}}" class="form-control" id="pago_saldoVIP" required autofocus>
                                                                                    <p class="badge bg-success text-dark mt-1">Disponible $ <span>{{ Auth::user()->SaldoVIPActual }}</span> USDT</p>
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
                                                                @else
                                                                    <div class="modal" id="modal_position3_8" tabindex="-1" aria-hidden="true">
                                                                        <div class="modal-dialog modal-sm">
                                                                            <div class="modal-content ">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title">Posición no Válida</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p>Posición ya está utilizada.</p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                @if (\Request::route()->getName() === 'red.index')
                                                                                    <form method="POST" action="{{ route('red.subred') }}">
                                                                                        @csrf
                                                                                        <input type="hidden" name="id" value="{{$posicion3_8->id}}">
                                                                                        <button type="submit" class="btn btn-sm btn-success">
                                                                                            <span data-feather="bar-chart-2"></span>
                                                                                            Ver nivel 3 y 4
                                                                                        </button>
                                                                                    </form>
                                                                                @elseif (\Request::route()->getName() === 'red.subred')
                                                                                    <form method="POST" action="{{ route('red.subred2') }}">
                                                                                        @csrf
                                                                                        <input type="hidden" name="id" value="{{$posicion3_8->id}}">
                                                                                        <button type="submit" class="btn btn-sm btn-success">
                                                                                            <span data-feather="bar-chart-2"></span>
                                                                                            Ver nivel 5
                                                                                        </button>
                                                                                    </form>
                                                                                @endif
                                                                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Aceptar</button>

                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @else
                                                                <div class="modal" id="modal_position3_8" tabindex="-1" aria-hidden="true">
                                                                    <div class="modal-dialog modal-sm">
                                                                        <div class="modal-content ">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Posición no Válida</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Seleccione una posición con usuario directo.</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Aceptar</button>

                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </li>
                                                        <li>
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal_position3_9" style="margin-left: 30px;">
                                                                @if(is_null($posicion2_3))
                                                                    <img src="{{ asset('assets/images/avatar/UbicacionNoDisponible.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                                @elseif (!is_null($posicion3_9))
                                                                    @if ($posicion3_9->NivelActualVIP >= 1)
                                                                        <img src="{{ asset('assets/images/avatar/UbicacionVIP.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                                    @else
                                                                        <img src="{{ asset('assets/images/avatar/UbicacionUtilizada.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                                    @endif
                                                                @else
                                                                    <img src="{{ asset('assets/images/avatar/UbicacionDisponible.png') }}" alt="Profile" class="rounded-circle avatar-xl mb-3 mb-lg-0 w-100 h-100 ">
                                                                @endif
                                                                <div class="text-wrap text-break fw-bold text-dark"
                                                                    style="width: 6rem;">
                                                                    @if(!is_null($posicion3_9))
                                                                        {{ $posicion3_9->nickname }}
                                                                    @endif
                                                                </div>
                                                            </a>
                                                            @if(!is_null($posicion2_3))
                                                                @if(is_null($posicion3_9))
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="modal_position3_9" tabindex="-1" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                        <h5 class="modal-title">Registrar en posición Nivel 3-9</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">

                                                                            <form method="POST" action="{{ route('red.store') }}">
                                                                                @csrf
                                                                                <input type="hidden" class="form-control" name="id_usuario_location"
                                                                                    value="@if(!is_null($posicion2_3)){{$posicion2_3->id}}@endif " required>
                                                                                <input type="hidden" class="form-control" name="location" value="3" required>

                                                                                <!-- Username -->
                                                                                <div class="mb-3">
                                                                                    <label for="nickname_promoter" class="form-label">Código de Promotor/Patrocinador </label>
                                                                                    <input type="text" id="nickname_promoter" class="form-control" name="nickname_promoter" value="{{ auth()->user()->nickname }}" readonly required>
                                                                                </div>

                                                                                <!-- Paquete -->
                                                                                <div class="mb-3">
                                                                                    <label class="form-label">Paquete</label>
                                                                                    <select class="form-select text-dark" name="paquete">
                                                                                        <option selected>Seleccione el paquete</option>
                                                                                        @foreach ($packages as $package)
                                                                                            @if (old('paquete') == $package->id)
                                                                                                <option value="{{$package->id}}" selected>Plan {{$package->PrecioAcumuladoWithOutID}} USD</option>
                                                                                            @else
                                                                                                <option value="{{$package->id}}">Plan {{$package->PrecioAcumuladoWithOutID}} USD</option>
                                                                                            @endif
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>

                                                                                <!-- Saldo -->
                                                                                <div class="mb-3">
                                                                                    <label for="saldo" class="form-label">Pago - Saldo Normal</label>
                                                                                    <input type="number" name="pago_saldo" value="{{old('pago_saldo', 0)}}" class="form-control" id="pago_saldo" required autofocus>
                                                                                    <p class="badge bg-success text-dark mt-1">Disponible $ <span>{{ Auth::user()->SaldoActual }}</span> USDT</p>
                                                                                </div>

                                                                                <!-- Saldo VIP -->
                                                                                <div class="mb-3">
                                                                                    <label for="saldoVIP" class="form-label">Pago - Saldo VIP</label>
                                                                                    <input type="number" name="pago_saldoVIP" value="{{old('pago_saldoVIP', 0)}}" class="form-control" id="pago_saldoVIP" required autofocus>
                                                                                    <p class="badge bg-success text-dark mt-1">Disponible $ <span>{{ Auth::user()->SaldoVIPActual }}</span> USDT</p>
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
                                                                @else
                                                                    <div class="modal" id="modal_position3_9" tabindex="-1" aria-hidden="true">
                                                                        <div class="modal-dialog modal-sm">
                                                                            <div class="modal-content ">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title">Posición no Válida</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p>Posición ya está utilizada.</p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                @if (\Request::route()->getName() === 'red.index')
                                                                                    <form method="POST" action="{{ route('red.subred') }}">
                                                                                        @csrf
                                                                                        <input type="hidden" name="id" value="{{$posicion3_9->id}}">
                                                                                        <button type="submit" class="btn btn-sm btn-success">
                                                                                            <span data-feather="bar-chart-2"></span>
                                                                                            Ver nivel 3 y 4
                                                                                        </button>
                                                                                    </form>
                                                                                @elseif (\Request::route()->getName() === 'red.subred')
                                                                                    <form method="POST" action="{{ route('red.subred2') }}">
                                                                                        @csrf
                                                                                        <input type="hidden" name="id" value="{{$posicion3_9->id}}">
                                                                                        <button type="submit" class="btn btn-sm btn-success">
                                                                                            <span data-feather="bar-chart-2"></span>
                                                                                            Ver nivel 5
                                                                                        </button>
                                                                                    </form>
                                                                                @endif
                                                                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Aceptar</button>

                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @else
                                                                <div class="modal" id="modal_position3_9" tabindex="-1" aria-hidden="true">
                                                                    <div class="modal-dialog modal-sm">
                                                                        <div class="modal-content ">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Posición no Válida</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Seleccione una posición con usuario directo.</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Aceptar</button>

                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
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
