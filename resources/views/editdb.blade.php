@extends('layout.admin')

@section('content')

<body>
  <br>
  <br>
    <h1 class="text-center mt-5 mb-5">EDIT DATA CUSTOMER DB</h1>

    <div class="container mb-5">
        <div class="row justify-content-center">
          <div class="col-8">
            <div class="card">
              <div class="card-body">
                <form action="/updatedatadb/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                  <div class="mb-3">
                    <label for="date" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" name="tanggal" id="date" value="{{ $data->tanggal }}" >
                  </div>

                  <div class="mb-3">
                    <label for="namatoko" class="form-label">Nama Toko</label>
                    <input type="text" name="nama_toko" class="form-control" id="namatoko" value="{{ $data->nama_toko }}">
                  </div>
                  <div class="mb-3">
                    <label for="namacustomer" class="form-label">Nama Customer</label>
                    <input type="text" name="nama_customer" class="form-control" id="namacustomer" value="{{ $data->nama_customer }}">
                  </div>
                  <div class="mb-3">
                    <label for="nowa" class="form-label">Nomer WA</label>
                    <input type="number" name="no_wa" class="form-control" id="nowa" value="{{ $data->no_wa }}">
                  </div>
                  <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="alamat" value="{{ $data->alamat }}">
                  </div>
                  <div class="mb-3">
                    <label for="Order" class="form-label">Order</label>
                    <input type="number" name="Order" class="form-control" id="Order" value="{{ $data->Order }}">
                  </div>
                  <div class="mb-3">
                    <label for="pembelian" class="form-label">Pembelian</label>
                    <input type="number" name="Pembelian" class="form-control" id="Pembelian" value="{{ $data->Pembelian }}">
                  </div>
                  <div class="mb-3">
                    <label for="customfile1" class="form-label">Foto Customer</label>
                    <input type="file" name="foto_customer" class="form-control" id="customfile1" value="{{ $data->foto_customer }}">
                  </div>
                  <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control form-control-lg" id="keterangan" value="{{ $data->keterangan }}">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>

  @endsection