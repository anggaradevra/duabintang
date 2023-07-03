<?php

namespace App\Models;

use App\Models\produkrms;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer_rms extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function produkrms(){
        return $this->belongsTo(produkrms::class, 'produk');
    }
}
