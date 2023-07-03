<?php

namespace App\Http\Controllers;

use App\Models\produkrms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProdukrmsController extends Controller
{
    public function index(){
        $data = produkrms::paginate(5);
        return view('dataproduk', compact('data'));
    }

    public function create(){

        return view('tambahproduk');
    
    }

    public function insertproduk(Request $request){
        $data = produkrms::create($request->all());
        if($request->hasFile('foto_produk')){            
            $request->file('foto_produk')->move('foto_produk/', $request->file('foto_produk')->getClientOriginalName());
            $data->foto_produk = $request->file('foto_produk')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('dataproduk')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function tampilkandataproduk($id){

        $data = produkrms::find($id);
        // dd($data);
        return view('editproduk', compact('data'));
    }

    public function updatedataproduk(Request $request, $id){
        $data = produkrms::find($id);
        $data->update($request->all());
        return redirect()->route('dataproduk')->with('success', 'Data Berhasil Di Update');
    }

    public function deleteproduk($id){
        $data = produkrms::find($id);
        $data->delete();
        return redirect()->route('dataproduk')->with('success', 'Data Berhasil Di Hapus');
    }
}
