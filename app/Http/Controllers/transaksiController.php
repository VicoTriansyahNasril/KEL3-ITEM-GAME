<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Illuminate\Http\Request;

class transaksiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = transaksi::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('transaksi.show', $row->id) . '" class="edit btn btn-primary btn-sm">View</a>';
                    $btn .= ' <a href="' . route('transaksi.edit', $row->id) . '" class="edit btn btn-info btn-sm">Edit</a>';
                    $btn .= ' <button type="button" data-id="' . $row->id . '" class="btn btn-danger btn-sm delete">Delete</button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $transaksis = transaksi::all(); // Tambahkan ini untuk mengambil semua transaksi
        return view('tampilan_game.transaksi', compact('transaksis'));
    }


    public function create()
    {
        return view('tampilan_game.create_transaksi');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_game' => 'required',
            'top_up' => 'required',
            'pembayaran' => 'required',
        ]);

        transaksi::create($request->all());

        return redirect()->route('transaksi.index')
            ->with('success', 'transaksi created successfully');
    }

    public function show($id)
    {
        $transaksi = transaksi::find($id);

        return view('tampilan_game.show_transaksi', compact('transaksi'));
    }

    public function edit($id)
    {
        $transaksi = transaksi::find($id);

        return view('tampilan_game.edit_transaksi', compact('transaksi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_game' => 'required',
            'top_up' => 'required',
            'pembayaran' => 'required',
        ]);

        transaksi::find($id)->update($request->all());

        return redirect()->route('transaksi.index')
            ->with('success', 'transaksi updated successfully');
    }

    public function destroy($id)
    {
        transaksi::find($id)->delete();

        return redirect()->route('transaksi.index')
            ->with('success', 'transaksi deleted successfully');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
