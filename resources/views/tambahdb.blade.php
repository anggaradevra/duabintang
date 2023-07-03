@extends('layout.admin')

@section('content')

<body>
  <br>
  <br>
    <h1 class="text-center mb-5 mt-5">TAMBAH DATA CUSTOMER DB</h1>

    <div class="container mb-5">
        <div class="row justify-content-center">
          <div class="col-8">
            <div class="card">
              <div class="card-body">
                <form action="/insertdatadb" method="POST" enctype="multipart/form-data">
                @csrf
                  <div class="mb-3">
                    <label for="date" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" name="tanggal" id="date" aria-describedby="date" required>
                    <div class="valid-feedback">Tanggal Valid</div>
	                  <div class="invalid-feedback">Maaf, Tanggal tidak boleh kosong !</div>
                  </div>

                  <div class="mb-3">
                    <label for="namatoko" class="form-label">Nama Toko</label>
                    <input type="text" name="nama_toko" class="form-control" id="namatoko" required>
                    <div class="valid-feedback">Nama Toko Valid</div>
	                  <div class="invalid-feedback">Maaf, Nama Toko tidak boleh kosong !</div>
                  </div>
                  <div class="mb-3">
                    <label for="namacustomer" class="form-label">Nama Customer</label>
                    <input type="text" name="nama_customer" class="form-control" id="namacustomer" required>
                    <div class="valid-feedback">Nama Customer Valid</div>
	                  <div class="invalid-feedback">Maaf, Nama Customer tidak boleh kosong !</div>
                  </div>
                  <div class="mb-3">
                    <label for="nowa" class="form-label">Nomer WA</label>
                    <input type="number" name="no_wa" class="form-control" id="nowa" required>
                    <div class="valid-feedback">Nomer WA Valid</div>
	                  <div class="invalid-feedback">Maaf, Nomer WA tidak boleh kosong !</div>
                  </div>
                  <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="alamat" required>
                    <div class="valid-feedback">Alamat Valid</div>
	                  <div class="invalid-feedback">Maaf, Alamat tidak boleh kosong !</div>
                  </div>
                  <div class="mb-3">
                    <label for="order" class="form-label">Order</label>
                    <input type="number" name="order" class="form-control" id="order" required>
                    <div class="valid-feedback">Order Valid</div>
	                  <div class="invalid-feedback">Maaf, Order tidak boleh kosong !</div>
                  </div>
                  <div class="mb-3">
                    <label for="pembelian" class="form-label">Pembelian</label>
                    <input type="number" name="pembelian" class="form-control" id="pembelian" required>
                    <div class="valid-feedback">Jumlah pembelian Valid</div>
	                  <div class="invalid-feedback">Maaf, Pembelian tidak boleh kosong !</div>
                  </div>
                  <div class="mb-3">
                    <label for="customfile1" class="form-label">Foto Customer</label>
                    <input type="file" name="foto_customer" class="form-control" id="customfile1" required>
                    <div class="valid-feedback">Foto Customer Valid</div>
	                  <div class="invalid-feedback">Maaf, Foto Customer tidak boleh kosong !</div>
                  </div>
                  <div class="mb-3">
                    <label for="customfile2" class="form-label">Foto Toko</label>
                    <input type="file" name="foto_toko" class="form-control" id="customfile2" required>
                    <div class="valid-feedback">Foto Toko Valid</div>
	                  <div class="invalid-feedback">Maaf, Foto Toko tidak boleh kosong !</div>
                  </div>
                  <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control form-control-lg" id="keterangan">
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