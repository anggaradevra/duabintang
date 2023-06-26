<?php

namespace App\Http\Controllers;
use App\Models\Users;
use Barryvdh\DomPDF\PDF;
use App\Models\Customer_rms;
use Illuminate\Http\Request;

class CustomerRmsController extends Controller
{
    public function Index(Request $request) {

        if($request->has('search')) {
            $data = Customer_rms::where('nama_customer', 'LIKE', '%' .$request->search.'%')->paginate(5);
        }else{
            $data = Customer_rms::paginate(5);
        }
        // $data = Customer_rms::all();
        return view('datarms',compact('data'));
    }

    public function tambahrms(){
        return view('tambahrms');
    }

    public function insertdatarms(Request $request){
        // dd($request->all());
        $data = Customer_rms::create($request->all());
        if($request->hasFile('foto_toko', 'foto_customer')){
            $request->file('foto_toko')->move('foto_toko/', $request->file('foto_toko')->getClientOriginalName());
            $data->foto_toko = $request->file('foto_toko')->getClientOriginalName();
            $data->save();
            
            $request->file('foto_customer')->move('foto_customer/', $request->file('foto_customer')->getClientOriginalName());
            $data->foto_customer = $request->file('foto_customer')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('rms')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function tampilkandatarms($id){

        $data = Customer_rms::find($id);
        // dd($data);
        return view('editrms', compact('data'));
    }

    public function updatedatarms(Request $request, $id){
        $data = Customer_rms::find($id);
        $data->update($request->all());
        return redirect()->route('rms')->with('success', 'Data Berhasil Di Update');
    }

    public function deleterms($id){
        $data = Customer_rms::find($id);
        $data->delete();
        return redirect()->route('rms')->with('success', 'Data Berhasil Di Hapus');
    }

    public function exportpdf(){
        $data = Customer_rms::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('datarms-pdf');
        $pdf->setpaper('A4', 'landscape');
        return $pdf->stream('datarms.pdf');
    }
}
