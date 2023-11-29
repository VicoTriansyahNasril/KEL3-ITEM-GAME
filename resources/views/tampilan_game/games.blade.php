@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Game</h1>

        <a href="{{ route('game.create') }}" class="btn btn-success">Tambah Game</a>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Game</th>
                    <th>Jenis Game</th>
                    <th>Deskripsi Game</th>
                    <th>Dibuat Pada</th>
                    <th>Diperbarui Pada</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($games as $game)
                    <tr>
                        <td>{{ $game->id }}</td>
                        <td>{{ $game->nama_game }}</td>
                        <td>{{ $game->jenis_game }}</td>
                        <td>{{ $game->deskripsi_game }}</td>
                        <td>{{ $game->created_at }}</td>
                        <td>{{ $game->updated_at }}</td>
                        <td>
                            <a href="{{ route('game.show', $game->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('game.edit', $game->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('game.destroy', $game->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus game ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
