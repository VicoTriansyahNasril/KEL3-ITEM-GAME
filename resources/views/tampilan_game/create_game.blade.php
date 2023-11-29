@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Game</h2>

        <form action="{{ route('game.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_game">Nama Game:</label>
                <input type="text" class="form-control" id="nama_game" name="nama_game" required>
            </div>
            <div class="form-group">
                <label for="jenis_game">Jenis Game:</label>
                <input type="text" class="form-control" id="jenis_game" name="jenis_game" required>
            </div>
            <div class="form-group">
                <label for="deskripsi_game">Deskripsi Game:</label>
                <textarea class="form-control" id="deskripsi_game" name="deskripsi_game" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
