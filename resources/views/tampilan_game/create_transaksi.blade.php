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

        <form action="{{ route('transaksi.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_game">Nama Game:</label>
                <input type="text" class="form-control" id="nama_game" name="nama_game" required>
            </div>
            <div class="form-group">
                <label for="top_up">Top Up:</label>
                <select class="form-control" id="top_up" name="top_up" required>
                    <option value="option1"></option>
                    <option value="1000 gems    Rp.500.000">1000 gems               Rp. 500.000</option>
                    <option value="2000 gems    Rp.1.000.000">2000 gems               Rp. 1.000.000</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <div class="form-group">
                <label for="pembayaran">Pembayaran:</label>
                <select class="form-control" id="pembayaran" name="pembayaran" required>
                    <option value="optionA"></option>
                    <option value="OVO">OVO</option>
                    <option value="DANA">DANA</option>
                    <option value="ShoppePay">SHOPPEPAY</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
