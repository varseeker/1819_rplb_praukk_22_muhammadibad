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
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard </a>
                </li>
                @if (Auth::user()->role == 'Admin' )
                  <li class="nav-item active">
                  <a class="nav-link" href="{{ url('/dashboard/customer') }}">Data Customer <span class="sr-only">(current)</span></a>
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
                  <li class="nav-item active">
                      <a class="nav-link" href="{{ url('/dashboard/customer') }}">Data Customer <span class="sr-only">(current)</span></a>
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
                  <li class="nav-item active">
                      <a class="nav-link" href="{{ url('/dashboard/customer') }}">Data Customer <span class="sr-only">(current)</span></a>
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
            </ul>>
        </div>
    </nav>
            <div class="container">
                    <h1 class="mt-3">Tambah Data Pesanan</h1>
            
                    <div class="card">
                        <div class="card-header">
                            Dashboard > Data Customer > Tambah Data Pesanan
                        </div>
                        <form action="/dashboard/pesanan" method="post">
                            @csrf
            
                        <div class="card-body">
            
                            {{-- ID PESANAN --}}
                            <h5 class="card-title">ID</h5>
                            <div class="form-group">
                            <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="ID Pesanan">
                              <small id="helpId" class="form-text text-muted">ID Pesanan</small>
                            </div>
            
                            {{-- NAMA --}}
                            <h5 class="card-title">Nama Customer</h5>
                            <div class="form-group">
                            {{-- <input type="text" class="form-control" name="nis" id="nis" aria-describedby="helpId" placeholder="NIS Siswa"> --}}
                                <select id="id_customer" class="form-control" name="id_customer">
                                    @foreach ($customer as $cust)
                                        <option value="{{ $cust->id }}">{{ $cust->nama }}</option>
                                    @endforeach
                                </select>
                                <small id="helpId" class="form-text text-muted">Nama Customer</small>
                            </div>
                            
                            {{-- NAMA TEMPAT --}}
                            <h5 class="card-title">Nama Outlet</h5>
                            <div class="form-group">
                            {{-- <input type="text" class="form-control" name="nis" id="nis" aria-describedby="helpId" placeholder="NIS Siswa"> --}}
                                <select id="id_outlet" class="form-control" name="id_outlet">
                                    @foreach ($outlet as $outlets)
                                        <option value="{{ $outlets->id }}">{{ $outlets->nama }}</option>
                                    @endforeach
                                </select>
                                <small id="helpId" class="form-text text-muted">Nama Outlet</small>
                            </div>

                            {{-- NAMA --}}
                            <h5 class="card-title">Nama Petugas</h5>
                            <div class="form-group">
                            {{-- <input type="text" class="form-control" name="nis" id="nis" aria-describedby="helpId" placeholder="NIS Siswa"> --}}
                                <select id="id_petugas" class="form-control" name="id_petugas">
                                    @foreach ($petugas as $ptgs)
                                        <option value="{{ $ptgs->id }}">{{ $ptgs->nama }}</option>
                                    @endforeach
                                </select>
                                <small id="helpId" class="form-text text-muted">Nama Petugas</small>
                            </div>
                            
                            
                            {{-- TANGGAL PESAN --}}
                            <h5 class="card-title">Tanggal Pesan</h5>
                            <div class="form-group">
                                <input type="datetime-local" class="form-control" name="tgl_pesan" id="tlp" aria-describedby="helpId" placeholder="Tangggal Pesan">  
                                <small id="helpId" class="form-text text-muted">Tanggal Pesan</small>


                            {{-- TANGGAL BAYAR --}}
                            <h5 class="card-title">Tanggal Bayar</h5>
                            <div class="form-group">
                                <input type="datetime-local" class="form-control" name="tgl_bayar" id="tlp" aria-describedby="helpId" placeholder="Tanggal Bayar">  
                                <small id="helpId" class="form-text text-muted">Tanggal Bayar</small>
                            </div>

                            {{-- STATUS --}}
                            <h5 class="card-title">Status Pemesanan</h5>
                            <div class="form-group">
                                <select class="custom-select" name="status" id="status">
                                    <option value="Baru">Baru</option>
                                    <option value="Proses">Proses</option>
                                    <option value="Selesei">Selesei</option>
                                    <option value="Diambil">Diambil</option>
                                </select>
                                <small id="helpId" class="form-text text-muted">Status Pemesanan</small>
                            </div>

                            {{-- STATUS --}}
                            <h5 class="card-title">Status Pembayaran</h5>
                            <div class="form-group">
                                <select class="custom-select" name="dibayar" id="dibayar">
                                    <option value="Belum_Dibayar">Belum Di Bayar</option>
                                    <option value="Dibayar">Di Bayar</option>
                                </select>
                                <small id="helpId" class="form-text text-muted">Status Pemesanan</small>
                            </div>

                            {{-- NAMA --}}
                            <h5 class="card-title">Nama Paket</h5>
                            <div class="form-group">
                            {{-- <input type="text" class="form-control" name="nis" id="nis" aria-describedby="helpId" placeholder="NIS Siswa"> --}}
                                <select id="id_paket" class="form-control" name="id_paket">
                                    @foreach ($paket as $pakets)
                                        <option value="{{ $pakets->id }}">{{ $pakets->nama_paket }}</option>
                                    @endforeach
                                </select>
                                <small id="helpId" class="form-text text-muted">Nama Paket</small>

                            {{-- NAMA --}}
                            <h5 class="card-title">Jenis Paket</h5>
                            <div class="form-group">
                            {{-- <input type="text" class="form-control" name="nis" id="nis" aria-describedby="helpId" placeholder="NIS Siswa"> --}}
                                <select id="paket" class="form-control" name="paket">
                                    @foreach ($paket as $paket)
                                        <option value="{{ $paket->harga }}">{{ $paket->jenis }}</option>
                                    @endforeach
                                </select>
                                <small id="helpId" class="form-text text-muted">Nama Paket</small>
                            </div>

                            {{-- KUANTITAS --}}
                            <h5 class="card-title">Kuantitas</h5>
                            <div class="form-group">
                            <input type="number" class="form-control" name="kuantitas" id="kuantitas" onblur='totalHarga()' aria-describedby="helpId" placeholder="Kuantitas Barang">
                                <small id="helpId" class="form-text text-muted">Kuantitas Barang</small>

                            {{-- DESC --}}
                            <h5 class="card-title">Keterangan</h5>
                            <div class="form-group">
                            <input type="text" class="form-control" name="keterangan" id="keterangan" aria-describedby="helpId" placeholder="Keterangan">
                                <small id="helpId" class="form-text text-muted">Keterangan</small>                            
            
                            {{-- TOTAL --}}
                            <h5 class="card-title">Total Pembayaran</h5>
                            <div class="form-group">
                            <input type="number" class="form-control" name="total" id="total" aria-describedby="helpId">
                                <small id="helpId" class="form-text text-muted">Total Pembayaran</small>
                                
                            <button type="submit" class="btn btn-primary mt-4">Submit</button>
                           
                        </div>
                    </form>
                    </div>
                </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script>
        function totalHarga(){
	        let paket = document.getElementById('paket').value
            let kuantitas = document.getElementById('kuantitas').value
                    document.getElementById('total').value = paket * kuantitas
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>