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
                <a class="navbar-brand" href="#">LaundryIN</a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                    aria-expanded="false" aria-label="Toggle navigation"></button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard/admin">Home </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href=".">Data Customer <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="pesanan">Data Pesanan</a>
                      </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Data Petugas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Data Pemilik</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Data Outlet</a>
                        </li>
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Data</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="#">Action 1</a>
                                <a class="dropdown-item" href="#">Action 2</a>
                            </div>
                        </li> -->
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search">
                        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>
            <div class="container">
                    <h1 class="mt-3">Tambah Data Customer</h1>
            
                    <div class="card">
                        <div class="card-header">
                            Dashboard > Data Customer > Tambah Data Customer
                        </div>
                        <form action="/customer" method="post">
                            @csrf
            
                        <div class="card-body">
            
                            {{-- ID Customer --}}
                            <h5 class="card-title">ID</h5>
                            <div class="form-group">
                            <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="ID Customer">
                              <small id="helpId" class="form-text text-muted">ID Customer</small>
                            </div>
            
                            {{-- NAMA SISWA --}}
                            <h5 class="card-title">Nama</h5>
                            <div class="form-group">
                            <input type="text" class="form-control" name="nama" id="nama" aria-describedby="helpId" placeholder="Nama Customer">
                                <small id="helpId" class="form-text text-muted">Nama Customer</small>
                            </div>
                                
                            {{-- JENIS KELAMIN --}}
                            <h5 class="card-title">Jenis Kelamin</h5>
                            <div class="form-group">
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                <option value="pria">Pria</option>
                                <option value="wanita">Wanita</option>
                            </select>
                                <small id="helpId" class="form-text text-muted">Jenis Kelamin Customer</small>
                            </div>

                            {{-- JENIS KELAMIN --}}
                            <h5 class="card-title">Alamat</h5>
                            <div class="form-group">
                              <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
                                <small id="helpId" class="form-text text-muted">Alamat Customer</small>
                            </div>
            
                            {{-- NO TELEPHONE/HANDPHONE --}}
                            <h5 class="card-title">No Telephon / Handphone</h5>
                            <div class="form-group">
                            <input type="text" class="form-control" name="no_telephone" id="no_telephone" aria-describedby="helpId" placeholder="No Telephone/Handphone Siswa">
                                <small id="helpId" class="form-text text-muted">No Telephone/Handphone</small>
            
                            <button type="submit" class="btn btn-primary mt-4">Submit</button>
                           
                        </div>
                    </form>
                    </div>
                </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>