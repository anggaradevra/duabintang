@extends('layout.admin')

@section('content')

<body>
  <br>
  <br>
    <h1 class="text-center mt-5 mb-5">EDIT DATA PRODUK</h1>

    <div class="container mb-5">
        <div class="row justify-content-center">
          <div class="col-8">
            <div class="card">
              <div class="card-body">
                <form action="/updatedataproduk/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                @csrf

                  <div class="mb-3">
                    <label for="namatoko" class="form-label">Nama Produk</label>
                    <input type="text" name="produk" class="form-control" id="namatoko" value="{{ $data->produk }}">
                  </div>
                  <div class="mb-3">
                    <label for="customfile1" class="form-label">Foto Produk</label>
                    <input type="file" name="foto_customer" class="form-control" id="customfile1" value="{{ $data->foto_produk }}">
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