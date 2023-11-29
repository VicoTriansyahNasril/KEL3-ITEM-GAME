@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Show Game</h2>

        <table class="table">
            <tr>
                <th>ID</th>
                <td>{{ $game->id }}</td>
            </tr>
            <tr>
                <th>Nama Game</th>
                <td>{{ $game->nama_game }}</td>
            </tr>
            <tr>
                <th>Jenis Game</th>
                <td>{{ $game->jenis_game }}</td>
            </tr>
            <tr>
                <th>Deskripsi Game</th>
                <td>{{ $game->deskripsi_game }}</td>
            </tr>
            <tr>
                <th>Dibuat Pada</th>
                <td>{{ $game->created_at }}</td>
            </tr>
            <tr>
                <th>Diperbarui Pada</th>
                <td>{{ $game->updated_at }}</td>
            </tr>
        </table>
    </div>
@endsection
