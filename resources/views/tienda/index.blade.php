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
                                <h1 class="mb-0 h2 fw-bold">Tienda</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Flash messages -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                @if ($packages->isEmpty())
                    <div class="alert alert-primary" role="alert">
                        No hay paquetes disponibles en este momento
                    </div>
                @endif

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($packages as $package)
                        <div class="col">
                            <!-- Card -->
                            <div class="card card-hover">
                                <a class="card-img-top"><img
                                        src="{{ asset('assets/images/planes/'.$package->imagen) }}" alt="{{$package->name}}"
                                        class="rounded-top-md card-img-top"></a>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <h4 class="mb-2 text-truncate-line-2 "><a class="text-inherit">{{$package->name}}</a></h4>

                                    <small>
                                    {{$package->descripcion}}
                                    </small>
                                </div>
                                <!-- Card Footer -->
                                <div class="card-footer">
                                    <div class="row align-items-center g-0">
                                        <div class="col">
                                            <h5 class="mb-0">${{$package->PrecioAcumulado}} USD</h5>
                                        </div>

                                        <div class="col-auto">
                                            <form method="POST" action="{{ route('compra.store')}}">
                                                @method('POST')
                                                @csrf
                                                <input type="hidden" name="package_id" value="{{ $package->id }}">
                                                <input type="hidden" name="package_name" value="{{ $package->name }}">
                                                <input type="hidden" name="valor" value="{{ $package->PrecioAcumulado }}">
                                                <a href="#" class="text-inherit btn btn-success"
                                                        onclick="event.preventDefault();
                                                                if (window.confirm('Confirma la compra del {{$package->name}}?')) {
                                                                    this.closest('form').submit();
                                                                }">
                                                    <i class="fe fe-shopping-cart align-middle me-2"></i>Comprar
                                                </a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach



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
