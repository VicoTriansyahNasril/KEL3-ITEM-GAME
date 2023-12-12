<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(){

        $data = Item::all();
        return view('page.admin.akun.dataitem',compact('data'));
    }

    public function tambahitem()
    {
        return view('page.admin.akun.tambahitem');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function insertitem(Request $request)
    {
        $data = Item::create($request->all());
        if($request->hasFile('foto_item')){
            $request->file('foto_item')->move('foto_item/', $request->file('foto_item')->getClientOriginalName());
            $data->foto_item = $request->file('foto_item')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('akun.dataitem')->with('success','Dataa Berhasil Ditambahkan');
    }

    public function tampilitem($id)
    {
        $data = Item::find($id);
        //dd($data);

        return view('page.admin.akun.tampilitem', compact('data'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function updateitem(Request $request, $id)
    {
        $data = Item::find($id);
        $data->update($request->all());
        return redirect()->route('akun.dataitem')->with('success','Dataa Berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $data = Item::find($id);
        $data->delete();
        return redirect()->route('akun.dataitem')->with('success','Dataa Berhasil delete');
    }



    public function exportpdf()
    {
        $data = Item::all();

        view()->share('data', $data);
        $pdf = Pdf::loadView('page.admin.akun.data-pdf');
        return $pdf->download("pbo.pdf");
    }










}
