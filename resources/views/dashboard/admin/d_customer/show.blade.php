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
                            <a class="nav-link" href="customer">Data Customer <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="pesanan">Data Transaksi</a>
                      </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Data Petugas</a>
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
                <table class="table">
                        <tr>
                              <td><h1 class="user-select-none mt-4">Detail Data Customer</h1>
                                  <p class="user-select-none mb-2">Berikut adalah Detail data untuk Data Customer. </p>
                              </td>
                        </tr>
                </table>
                <div class="card">
                    <div class="card-header">
                        Dashboard > Admin > Data Customer > Detail
                        <form action="" method="POST" class="d-inline float-right">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <a name="" id="" class="btn btn-info float-right mr-3" href="edit" role="button">Update</a>
                    </div>
                    <div class="card-body">
        
                        {{-- ID --}}
                        <h5 class="card-title">ID</h5>
                        <p class="card-text">{{ $customer->id }}</p>
        
                        {{-- NAMA --}}
                        <h5 class="card-title">Nama</h5>
                        <p class="card-text">{{ $customer->nama }}</p>

                        {{-- Alamat --}}
                        <h5 class="card-title">Alamat</h5>
                        <p class="card-text">{{ $customer->alamat }}</p>
        
                        {{-- JENIS KELAMIN --}}
                        <h5 class="card-title">Jenis Kelamin</h5>
                        <p class="card-text">{{ $customer->jenis_kelamin }}</p>
        
        
                        {{-- NO TELEPHONE/HANDPHONE --}}
                        <h5 class="card-title">No Telephone</h5>
                        <p class="card-text">{{ $customer->tlp }}</p>
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