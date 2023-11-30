@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Transaksi</h2>

        <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_game">Nama Game:</label>
                <input type="text" class="form-control" id="nama_game" name="nama_game" value="{{ $transaksi->nama_game }}" required>
            </div>
            <div class="form-group">
                <label for="top_up">Top up</label>
                <input type="text" class="form-control" id="top_up" name="top_up" value="{{ $transaksi->top_up }}" required>
            </div>
            <div class="form-group">
                <label for="pembayaran">Pembayaran:</label>
                <input type="text" class="form-control" id="pembayaran" name="pembayaran" value="{{ $transaksi->pembayaran }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

