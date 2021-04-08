<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <center>
        <h5>Laporan Transaksi</h4>
        </center>
      <table class="table table-striped table-inverse">
          <thead class="thead-inverse">
            <tr>
              <th>No</th>
              <th>ID</th>
              <th>Nama Customer</th>
              <th>Status Barang</th>
              <th>Status Pembayaran</th>
              <th>Total</th>
          </tr>
              </thead>
              <tbody>
                @php $i=1 @endphp
                @foreach($transaksi as $tr)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{$tr->id}}</td>
                    <td>{{$tr->customer->nama}}</td>
                    <td>{{$tr->status}}</td>
                    <td>{{$tr->dibayar}}</td>
                    <td>{{$tr->total}}</td>
                  </tr>  
                @endforeach
              </tbody>
      </table>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<body>