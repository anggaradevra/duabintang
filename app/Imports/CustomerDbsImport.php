<?php

namespace App\Imports;

use App\Models\Customer_dbs;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class CustomerDbsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Customer_dbs([
            'tanggal' => $row[1],
            'nama_toko' => $row[2],
            'nama_customer' => $row[3],
            'no_wa' => $row[4],
            'alamat' => $row[5],
            'Order' => $row[6],
            'Pembelian' => $row[7],
            'keterangan' => $row[8],
            // 'foto_customer' => $row[9],
            // 'foto_toko' => $row[10]
        ]);
    }
}
