<?php

namespace App\Exports;

use App\Models\Customer_rms;
use Maatwebsite\Excel\Concerns\FromCollection;

class CustomerRmsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Customer_rms::all();
    }
}
