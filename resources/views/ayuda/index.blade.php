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
                                <h1 class="mb-0 h2 fw-bold">Ayuda</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row row-cols-1">
                    <div class="container">
                        <div class="row">
                            <div class="offset-lg-2 col-lg-8 col-md-12 col-12 text-center">
                                <h2 class="display-5 mt-4 mb-3 fw-bold">Conoce más en el siguiente video</h2>

                                <div class="embed-responsive embed-responsive-16by9 mb-3" style="border-width: 4px; margin-top:5%; border-radius: 5px;">
                                    <iframe class="embed-responsive-item" style="border: 6px solid #CCCCCC; border-radius:25px; width: 100%; height: 470px;" src="https://www.youtube.com/embed/Rs-PC7KtFAQ?autoplay=1&controls=1&mute=1"></iframe>
                                </div>
                                <a href="{{ asset('/assets/videos/publicidad.mp4') }}" download class="btn btn-primary">Descargar Video</a>
                                <p class="lead  px-lg-8 mb-6">O si prefieres contacta con nuestro centro de soporte via WhatsApp.</p>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-12 text-center">
                                <h2 class="display-5 mt-4 mb-3 fw-bold">Presentación</h2>
                                <embed src="{{ asset('/assets/docs/CG PDF.pdf') }}" width="100%" height="375" type="application/pdf">

                            </div>
                            <div class="col-lg-6 col-md-12 col-12 text-center">
                                <h2 class="display-5 mt-4 mb-3 fw-bold">Presentation</h2>
                                <embed src="{{ asset('/assets/docs/CG English.pdf') }}" width="100%" height="375" type="application/pdf">
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
                                <iframe width="100%" height="200px" src="{{ $publicidad->link_publicidad }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe>
                                <a href="{{ $publicidad->link_redireccion }}" target="_blank"
                                    class="btn btn-success btn-sm mt-3 mb-3">Más información</a>
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
