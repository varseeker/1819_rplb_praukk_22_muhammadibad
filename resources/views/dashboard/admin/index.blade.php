<!doctype html>
<html lang="en">

<head>
    <title>LAUNDRYIN</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
        <a class="navbar-brand" href="/">LaundryIN</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard <span class="sr-only">(current)</span></a>
                </li>
                @if (Auth::user()->role == 'Admin' )
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dashboard/customer') }}">Data Customer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dashboard/pesanan') }}">Data Pesanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dashboard/petugas') }}">Data Petugas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dashboard/outlet') }}">Data Outlet</a>
                </li>

                @elseif ( Auth::user()->role == 'Owner')
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dashboard/customer') }}">Data Customer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dashboard/pesanan') }}">Data Pesanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dashboard/petugas') }}">Data Petugas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dashboard/outlet') }}">Data Outlet</a>
                </li>

                @elseif ( Auth::user()->role == 'Petugas')
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dashboard/customer') }}">Data Customer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dashboard/pesanan') }}">Data Pesanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dashboard/outlet') }}">Data Outlet</a>
                </li>

                @elseif ( Auth::user()->role == 'Customer')
                <li class="nav-item">
                    <a class="nav-link" href="dashboard/pesanan/pelanggan">Data Pesanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dashboard/outlet') }}">Data Outlet</a>
                </li>
                @endif

                <!-- <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Data</a>
                      <div class="dropdown-menu" aria-labelledby="dropdownId">
                          <a class="dropdown-item" href="#">Action 1</a>
                          <a class="dropdown-item" href="#">Action 2</a>
                      </div>
                  </li> -->
            </ul>
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="/dashboard/history">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <form id="logout-form" class="drop-item" action="/logout" method="GET" class="d-none">
                            @csrf
                            <button class="ml-4" type="submit">Logout</button>
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </nav>

    <div class="container">
        <table class="table">
            <tr>
                <td>
                    <h1 class="user-select-none mt-4">Dashboard</h1>
                    <p class="user-select-none mb-4">Selamat datang {{ Auth::user()->name }} di Dashboard LaundryIN </p>
                </td>
                @if (Auth::user()->role == "Admin")
                <td>
                    <center><a name="" id="" class="btn btn-primary mt-5" href="#data_pengguna" role="button">Data Pengguna</a></center>
                </td>
                @endif
            </tr>
        </table>
        <table class="table">
            <tr>
                <td>
                    <div class="card md-5 mt-3">
                        <div class="card-header">
                            Outlet
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Total Outlet</h4>
                            <p class="card-text">12</p>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="card md-5 mt-3">
                        <div class="card-header">
                            Petugas
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Total Petugas</h4>
                            <p class="card-text">145</p>
                        </div>
                    </div>
                </td>
                @if (Auth::User()->role == "Admin")
                <td>
                    <div class="card md-5 mt-3">
                        <div class="card-header">
                            Customer
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Total Customer</h4>
                            <p class="card-text">562</p>
                        </div>
                    </div>
                </td>
                @elseif (Auth::User()->role == "Petugas")
                <td>
                    <div class="card md-5 mt-3">
                        <div class="card-header">
                            Customer
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Total Customer</h4>
                            <p class="card-text">562</p>
                        </div>
                    </div>
                </td>
                @endif
                @if (Auth::User()->role == "Admin")
                <td>
                    <div class="card md-5 mt-3">
                        <div class="card-header">
                            Pesanan
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Total Pesanan</h4>
                            <p class="card-text">2458</p>
                        </div>
                    </div>
                </td>
                @elseif (Auth::User()->role == "Petugas")
                <td>
                    <div class="card md-5 mt-3">
                        <div class="card-header">
                            Pesanan
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Total Pesanan</h4>
                            <p class="card-text">2458</p>
                        </div>
                    </div>
                </td>
                @endif
            </tr>
        </table>
        @if (Auth::User()->role == "Admin")
        <table class="table table-striped table-inverse" id="data_pengguna">
            <h3 class="user-select-none mt-2 ml-3 mb-3">Data Pengguna</h3>
            <thead class="thead-inverse">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Role</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $key => $users)
                <tr>
                    <td scope="row">{{ $user->firstItem() + $key }}</td>
                    <td>{{ $users->name }}</td>
                    <td>{{ $users->role }}</td>
                    <td>{{ $users->created_at }}</td>
                    <td>{{ $users->updated_at }}</td>
                    <td>
                        <a href="user/{{ $users->id }}/show" class="badge badge-primary">Show</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $user->links() }}
        @endif
    </div>
    <footer style="background-color:lightcyan; border-color:white;">
        <footer class="container">
            <div class="card" style="background-color:lightcyan; border-color:white;">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">
                <h4 class="card-title">LaundryIN</h4>
                <p class="card-text">Presented By <b><i>Muhammad Ibad</i></b></p>
            </div>
        </div>
    </footer>
</footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>