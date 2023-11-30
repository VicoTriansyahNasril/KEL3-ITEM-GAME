@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Transaksi</h1>

        <a href="{{ route('transaksi.create') }}" class="btn btn-success">Tambah Transaksi</a>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Game</th>
                    <th>Top Up</th>
                    <th>Pembayaran</th>
                    <th>Dibuat Pada</th>
                    <th>Diperbarui Pada</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaksis as $transaksi)
                    <tr>
                        <td>{{ $transaksi->id }}</td>
                        <td>{{ $transaksi->nama_game }}</td>
                        <td>{{ $transaksi->top_up }}</td>
                        <td>{{ $transaksi->pembayaran }}</td>
                        <td>{{ $transaksi->created_at }}</td>
                        <td>{{ $transaksi->updated_at }}</td>
                        <td>
                            <a href="{{ route('transaksi.show', $transaksi->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST" style="display: inline;">
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
