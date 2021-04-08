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
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard </a>
                </li>
                @if (Auth::user()->role == 'Admin' )
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dashboard/customer') }}">Data Customer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dashboard/pesanan') }}">Data Pesanan</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/dashboard/petugas') }}">Data Petugas <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dashboard/outlet') }}">Data Outlet</a>
                </li>

                @elseif ( Auth::user()->role == 'Owner')
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/dashboard/customer') }}">Data Customer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dashboard/pesanan') }}">Data Pesanan</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/dashboard/petugas') }}">Data Petugas <span class="sr-only">(current)</span></a>
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
                    <a class="nav-link" href="{{ url('/dashboard/pesanan') }}">Data Pesanan</a>
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
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/logout" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="/logout" method="GET" class="d-none">
                            @csrf
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
                    <h1 class="user-select-none mt-4">Data Petugas</h1>
                    <p class="user-select-none mb-2">Berikut adalah Index data untuk semua Data Petugas. </p>
                </td>
                <td>
                    <center><a name="" id="" class="btn btn-primary mt-5" href="petugas/add" role="button">Tambah Data</a></center>
                </td>
                <td>
                    <center><a name="" id="" class="btn btn-primary mt-5" href="petugas/laporan" role="button">Cetak Laporan Data</a></center>
                </td>
            </tr>
        </table>
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                Dashboard > Admin > Data Petugas
            </div>
            <div class="card-body">
                <h5 class="card-title">Data Petugas</h5>
                <table class="table table-striped table-inverse">
                    <thead class="thead-inverse">
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($petugas as $key => $ptgs)
                        <tr>
                            <td scope="row">{{ $petugas->firstItem() + $key }}</td>
                            <td>{{ $ptgs->id }}</td>
                            <td>{{ $ptgs->nama }}</td>
                            <td>{{ $ptgs->email }}</td>
                            <td>
                                <a href="petugas/{{ $ptgs->id }}/show" class="badge badge-primary">Show</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $petugas->links() }}
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>