<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<div align="center">
    <h2>DUA BINTANG GRUP</h2>
    <h3>DATA CUSTOMER DB</h3>
</div>

<div class="container">
<table align="center" width="100px">
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
      <!-- <th scope="col">Foto Customer</th> -->
      <!-- <th scope="col">Foto Toko</th> -->
  </tr>
  @php
    $no=1;
  @endphp
  @foreach ($data as $row)
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
        <!-- <td>
        <img src="{{ asset('foto_customer/'.$row->foto_customer) }}" alt="" style="width: 40px;">
    </td> -->
      <!-- <td>
        <img src="{{ asset('foto_toko/'.$row->foto_toko) }}" alt="" style="width: 40px;">
    </td> -->
  </tr>
  @endforeach
  
  
</table>
</div>  

</body>
</html>
