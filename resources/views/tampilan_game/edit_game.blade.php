@extends('layouts.base_admin.base_dashboard')

@section('script_head')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection

@section('content')
    <div class="container">
        <h2>Edit Game</h2>

        <form action="{{ route('game.update', $game->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_game">Nama Game:</label>
                <input type="text" class="form-control" id="nama_game" name="nama_game" value="{{ $game->nama_game }}" required>
            </div>
            <div class="form-group">
                <label for="jenis_game">Jenis Game:</label>
                <input type="text" class="form-control" id="jenis_game" name="jenis_game" value="{{ $game->jenis_game }}" required>
            </div>
            <div class="form-group">
                <label for="deskripsi_game">Deskripsi Game:</label>
                <textarea class="form-control" id="deskripsi_game" name="deskripsi_game" rows="4" required>{{ $game->deskripsi_game }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
