<?php

namespace App\Imports;

use App\Models\Customer_rms;
use Maatwebsite\Excel\Concerns\ToModel;

class CustomerRmsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Customer_rms([
            'tanggal' => $row[1],
            'nama_toko' => $row[2],
            'nama_customer' => $row[3],
            'no_wa' => $row[4],
            'alamat' => $row[5],
            'produk' => $row[6],
            'jumlah_stok' => $row[7],
            'penjualan' => $row[8],
            'foto_customer' => $row[9],
            'foto_toko' => $row[10],
            'keterangan' => $row[11]
        ]);
    }
}
