<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use DataTables;

class GameController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Game::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('game.show', $row->id) . '" class="edit btn btn-primary btn-sm">View</a>';
                    $btn .= ' <a href="' . route('game.edit', $row->id) . '" class="edit btn btn-info btn-sm">Edit</a>';
                    $btn .= ' <button type="button" data-id="' . $row->id . '" class="btn btn-danger btn-sm delete">Delete</button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $games = Game::all(); // Tambahkan ini untuk mengambil semua game
        return view('tampilan_game.games', compact('games'));
    }


    public function create()
    {
        return view('tampilan_game.create_game');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_game' => 'required',
            'jenis_game' => 'required',
            'deskripsi_game' => 'required',
        ]);

        Game::create($request->all());

        return redirect()->route('game.index')
            ->with('success', 'Game created successfully');
    }

    public function show($id)
    {
        $game = Game::find($id);

        return view('tampilan_game.show_game', compact('game'));
    }

    public function edit($id)
    {
        $game = Game::find($id);

        return view('tampilan_game.edit_game', compact('game'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_game' => 'required',
            'jenis_game' => 'required',
            'deskripsi_game' => 'required',
        ]);

        Game::find($id)->update($request->all());

        return redirect()->route('game.index')
            ->with('success', 'Game updated successfully');
    }

    public function destroy($id)
    {
        Game::find($id)->delete();

        return redirect()->route('game.index')
            ->with('success', 'Game deleted successfully');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

}

