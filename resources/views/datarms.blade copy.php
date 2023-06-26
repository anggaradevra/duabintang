<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DUA BINTANG GROUP</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
  <body>
    <h1 class="text-center">DATA CUSTOMER RMS</h1>

    <div class="container">
    <a type="button" href="/tambahrms" class="btn btn-success">Tambah +</a>

    <div class="row g-3 align-items-center mt-2">
      <div class="col-auto">
        <form action="/rms" method="GET">
          <input type="search" id="inputPassword6" name="search" class="form-control">
        </form>
      </div>
<br>
    </div>
        <div class="row mt-2">
            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                {{ $message }}
                </div>

            @endif
        <table class="table">
  <thead>
    <tr>
      <th scope="col">NO</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Nama Toko</th>
      <th scope="col">Nama Customer</th>
      <th scope="col">Nomer WA</th>
      <th scope="col">Alamat</th>
      <th scope="col">Produk</th>
      <th scope="col">Jumlah Stok</th>
      <th scope="col">Penjualan</th>
      <th scope="col">Keterangan</th>
      <th scope="col">Foto Customer</th>
      <th scope="col">Foto Toko</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @php
        $no = 1;
        @endphp
    @foreach ($data as $row)
    <tr>
      <th scope="row">{{ $no++ }}</th>
      <td>{{ $row->tanggal }}</td>
      <td>{{ $row->nama_toko }}</td>
      <td>{{ $row->nama_customer }}</td>
      <td>+62{{ $row->no_wa }}</td>
      <td>{{ $row->alamat }}</td>
      <td>{{ $row->produk }}</td>
      <td>{{ $row->jumlah_stok }}</td>
      <td>{{ $row->penjualan }}</td>
      <td>{{ $row->keterangan }}</td>
      <td>
        <img src="{{ asset('foto_customer/'.$row->foto_customer) }}" alt="" style="width: 40px;">
    </td>
      <td>
        <img src="{{ asset('foto_toko/'.$row->foto_toko) }}" alt="" style="width: 40px;">
    </td>
      <td>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="#" class="btn btn-danger btn-sm delete" data-id="{{ $row->id }}" data-nama="{{ $row->nama_customer }}">Delete</a>
            <a href="tampilkandatarms/{{ $row->id }}" class="btn btn-info btn-sm">Edit</a>
        </div>

      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $data ->links()}}
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.slim.js" integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>
  <script>
        $('.delete').click( function(){
            var rmsid = $(this).attr('data-id');
            var nama = $(this).attr('data-nama');
                swal({
            title: "Yakin?",
            text: "Kamu Akan menghapus data customer dengan nama "+nama+"",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location = "/deleterms/"+rmsid+""
                swal("Sukses! Data Berhasil Di Hapus.", {
                icon: "success",
                });
            } else {
                swal("Data batal di hapus.");
            }
            });
            
        });

  </script>
  <script>
    @if (Session::has('success'))
    toastr.success("{{ Session::get('success') }}")
    @endif
  </script>
</html>