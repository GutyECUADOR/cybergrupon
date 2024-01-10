<x-app-layout>
    <x-navbar-menu></x-navbar-menu>

    <div class="container-fluid">
      <div class="row">
        <x-sidebar-menu></x-sidebar-menu>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Lista de Clientes</h1>
          </div>

          <!-- Validation Errors -->
          <x-auth-validation-errors class="mb-3" :errors="$errors" />

          @if (Session::has('status'))
              <div class="alert alert-success">
                  <ul>
                      <li>{{ Session::get('status') }}</li>
                  </ul>
              </div>
          @endif

          <div class="table-responsive">
            <table class="table table-striped table-sm table-hover text">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nickname</th>
                  <th scope="col">Email</th>
                  <th scope="col">Saldo</th>
                  <th scope="col">SaldoVIP</th>
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
                    <td>{{ $user->SaldoActualVIP }}</td>
                    <td>{{ $user->SaldoTotal }}</td>

                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>
</x-app-layout>
