<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GameController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            $games = Game::query();
            return DataTables::of($games)
                ->make();
        }
        return view('tampilan_game.games');
    
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
    $game = Game::find($id);
    if (!$game) {
        return redirect()->route('game.index')->with('error', 'Game not found');
    }

    $game->delete();

    if (request()->ajax()) {
        return response()->json(['success' => 'Game deleted successfully']);
    }

    return redirect()->route('game.index')->with('success', 'Game deleted successfully');
}


    public function __construct()
    {
        $this->middleware('auth');
    }

}