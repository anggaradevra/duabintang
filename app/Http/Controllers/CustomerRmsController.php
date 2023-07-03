<?php

namespace App\Http\Controllers;

// use PDF;
use Barryvdh\DomPDF\Facade\Pdf;
// use Barryvdh\DomPDF\PDF;
use App\Models\Users;
use App\Models\Customer_rms;
use Illuminate\Http\Request;
use App\Exports\CustomerRmsExport;
use App\Imports\CustomerRmsImport;
use App\Models\produkrms;
use Maatwebsite\Excel\Facades\Excel;

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
        $dataproduk = produkrms::all();
        return view('tambahrms', compact('dataproduk'));
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
        return $pdf->download('datarms.pdf');
    }

    public function exportexcel(){
        return Excel::download(new CustomerRmsExport, 'customer_rms.xlsx');
    }

    public function importexcel(Request $request){
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('DataCustomer_rms', $namafile);

        Excel::import(new CustomerRmsImport, \public_path('/DataCustomer_rms/'. $namafile));
        return \redirect()->back();
    }
}
