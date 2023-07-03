@extends('layout.admin')
@push('css')

@endpush
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Customer DB</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Customer DB</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container">
    <a type="button" href="/tambahdb" class="btn btn-success">Tambah +</a>

    <div class="row g-3 align-items-center mt-2">
      <div class="col-auto">
        <form action="/db" method="GET">
          <input type="search" id="inputPassword6" name="search" class="form-control" placeholder="search">
        </form>
      </div>
      <div class="col-auto">
      <a type="button" href="/exportdbpdf" class="btn btn-danger">Export PDF</a>
    </div>
      <div class="col-auto">
      <a type="button" href="/exportdbexcel" class="btn btn-success ml-1">Export Excel</a>
    </div>
    <div class="col-auto">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Import Data
      </button>
    </div>
  </div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">IMPORT DATA DB EXCEL</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/importdbexcel" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <input type="file" name="file" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Upload</button>
        </div>
      </div>
    </form>
  </div>
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
      <th scope="col">Order</th>
      <th scope="col">Pembelian</th>
      <th scope="col">Keterangan</th>
      <th scope="col">Foto Customer</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @php
        $no = 1;
        @endphp
    @foreach ($datadb as $row)
    <tr>
      <th scope="row">{{ $no++ }}</th>
      <td>{{ $row->tanggal }}</td>
      <td>{{ $row->nama_toko }}</td>
      <td>{{ $row->nama_customer }}</td>
      <td>+62{{ $row->no_wa }}</td>
      <td>{{ $row->alamat }}</td>
      <td>{{ $row->Order }}</td>
      <td>{{ $row->Pembelian }}</td>
      <td>{{ $row->keterangan }}</td>
      <td>
        <img src="{{ asset('foto_customer/'.$row->foto_customer) }}" alt="" style="width: 40px;">
    </td>
      <td>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="#" class="btn btn-danger btn-sm delete" data-id="{{ $row->id }}" data-nama="{{ $row->nama_customer }}">Delete</a>
            <a href="tampilkandatadb/{{ $row->id }}" class="btn btn-info btn-sm">Edit</a>
        </div>

      </td>
    </tr>
    @endforeach
  </tbody>
</table>

        </div>
    </div>   
</div>

@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.0.slim.js" integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>
  <script>
        $('.delete').click( function(){
            var dbid = $(this).attr('data-id');
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
                window.location = "/deletedb/"+dbid+""
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
    // @if (Session::has('success'))
    // toastr.success("{{ Session::get('success') }}")
    // @endif
  </script>
@endpush