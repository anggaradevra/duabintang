<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DUA BINTANG GROUP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center">TAMBAH DATA CUSTOMER RMS</h1>

    <div class="container">
        <div class="row justify-content-center">
          <div class="col-8">
            <div class="card">
              <div class="card-body">
                <form action="/insertdatarms" method="POST" enctype="multipart/form-data">
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
                    <label for="produk" class="form-label">Produk</label>
                    <input type="text" name="produk" class="form-control" id="produk" required>
                    <div class="valid-feedback">Nama Produk Valid</div>
	                  <div class="invalid-feedback">Maaf, Nama Produk tidak boleh kosong !</div>
                  </div>
                  <div class="mb-3">
                    <label for="jumlahstok" class="form-label">Jumlah Stok</label>
                    <input type="number" name="jumlah_stok" class="form-control" id="jumlahstok" required>
                    <div class="valid-feedback">Jumlah Stok Valid</div>
	                  <div class="invalid-feedback">Maaf, Jumlah Stok tidak boleh kosong !</div>
                  </div>
                  <div class="mb-3">
                    <label for="penjualan" class="form-label">Penjualan</label>
                    <input type="number" name="penjualan" class="form-control" id="penjualan" required>
                    <div class="valid-feedback">Penjualan Valid</div>
	                  <div class="invalid-feedback">Maaf, Penjualan tidak boleh kosong !</div>
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
</html>