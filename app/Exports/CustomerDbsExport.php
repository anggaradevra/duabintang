<?php

namespace App\Exports;

use App\Models\Customer_dbs;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class CustomerDbsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Customer_dbs::all();
    }
}
