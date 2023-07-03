<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Customer_dbs;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
// use App\Exports\CustomerRmsExport;
// use App\Imports\CustomerRmsImport;
use App\Exports\CustomerDbsExport;
use App\Imports\CustomerDbsImport;
use Maatwebsite\Excel\Facades\Excel;

class CustomerDbsController extends Controller
{
    public function Index(Request $request) {

        // if($request->has('search')) {
        //     $data1 = Customer_db::where('nama_customer', 'LIKE', '%' .$request->search.'%')->paginate(5);
        // }else{
        //     $data1 = Customer_db::paginate(5);
        // }
        $datadb = Customer_dbs::all();
        return view('datadb',compact('datadb'));
    }

    public function tambahdb(){
        return view('tambahdb');
    }

    public function insertdatadb(Request $request){
        // dd($request->all());
        $data = Customer_dbs::create($request->all());
        if($request->hasFile('foto_customer')){            
            $request->file('foto_customer')->move('foto_customer_db/', $request->file('foto_customer')->getClientOriginalName());
            $data->foto_customer = $request->file('foto_customer')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('db')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function tampilkandatadb($id){

        $data = Customer_dbs::find($id);
        // dd($data);
        return view('editdb', compact('data'));
    }

    public function updatedatadb(Request $request, $id){
        $data = Customer_dbs::find($id);
        $data->update($request->all());
        return redirect()->route('db')->with('success', 'Data Berhasil Di Update');
    }

    public function deletedb($id){
        $data = Customer_dbs::find($id);
        $data->delete();
        return redirect()->route('db')->with('success', 'Data Berhasil Di Hapus');
    }

    public function exportdbpdf(){
        $data = Customer_dbs::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('datadb-pdf');
        $pdf->setpaper('A4', 'landscape');
        return $pdf->download('datadb.pdf');
    }

    public function exportdbexcel(){
        return Excel::download(new CustomerDbsExport, 'customer_db.xlsx');
    }

    public function importdbexcel(Request $request){
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('DataCustomer_db', $namafile);

        Excel::import(new CustomerDbsImport, \public_path('/DataCustomer_db/'. $namafile));
        return \redirect()->back();
    }
}
