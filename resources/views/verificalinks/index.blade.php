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
                                <h1 class="mb-0 h2 fw-bold">Verificar Links</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="justify-content: space-around;">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12 mb-12">
                        <!-- Card -->
                        <div class="card h-100">
                            <!-- Card header -->
                            <div
                                class="card-header d-flex align-items-center
                              justify-content-between card-header-height">
                                <h4 class="mb-0">Listado</h4>
                            </div>
                            <!-- Card body -->
                            <div class="card-body table-responsive">
                                <!-- List group -->
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                        <th scope="col">URL</th>
                                        <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($linksPublicidad as $linkPublicidad)
                                            <tr>
                                                <td><a href="{{ $linkPublicidad['URL'] }}" target="_blank">{{ $linkPublicidad['URL'] }}</a></td>
                                                <td>{{ $linkPublicidad['status'] }}</td>
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

   

</x-app-layout>
