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
                                <h1 class="mb-0 h2 fw-bold"> Mis referidos </h1>
                                <!-- Breadcrumb -->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="#">Red </a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Mis Usuarios
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row -->
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
                            <div class="card-body">
                                <!-- List group -->
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                        <th scope="col">#ID</th>
                                        <th scope="col">Nickname</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Saldo Normal</th>
                                        <th scope="col">Saldo VIP</th>
                                        <th scope="col">Saldo Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->nickname }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->SaldoActual }}</td>
                                                <td>{{ $user->SaldoVIPActual }}</td>
                                                <td>{{ $user->SaldoTotal }}</td>

                                            </tr>
                                            @endforeach
                                    </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>

                </div>
            </section>


        </section>
    </main>

</x-app-layout>
