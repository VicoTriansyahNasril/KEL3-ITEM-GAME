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
