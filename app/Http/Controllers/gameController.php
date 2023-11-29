<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();
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

