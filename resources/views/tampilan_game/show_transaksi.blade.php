@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Transaksi</h2>

        <table class="table">
            <tr>
                <th>ID</th>
                <td>{{ $transaksi->id }}</td>
            </tr>
            <tr>
                <th>Nama Game</th>
                <td>{{ $transaksi->nama_game }}</td>
            </tr>
            <tr>
                <th>Top Up</th>
                <td>{{ $transaksi->top_up }}</td>
            </tr>
            <tr>
                <th>Pembayaran</th>
                <td>{{ $transaksi->pembayaran }}</td>
            </tr>
            <tr>
                <th>Dibuat Pada</th>
                <td>{{ $transaksi->created_at }}</td>
            </tr>
            <tr>
                <th>Diperbarui Pada</th>
                <td>{{ $transaksi->updated_at }}</td>
            </tr>
        </table>
    </div>
@endsection
