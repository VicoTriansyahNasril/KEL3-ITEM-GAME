@extends('layouts.base_admin.base_dashboard')@section('judul', 'List Akun')
@section('script_head')
<link
    rel="stylesheet"
    type="text/css"
    href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Item</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="breadcrumb-item active">Akun</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"></h3>
            <div class="card-tools">
                <button
                    type="button"
                    class="btn btn-tool"
                    data-card-widget="collapse"
                    title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button
                    type="button"
                    class="btn btn-tool"
                    data-card-widget="remove"
                    title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body p-0" style="margin: 20px">
            <table
                id="previewAkun"
                class="table table-striped table-bordered display"
                style="width:100%">
                <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama Barang</th>
                      <th scope="col">Deskripsi</th>
                      <th scope="col">Harga Barang</th>
                      <th scope="col">Stok Barang</th>
                    </tr>
                </thead>
                <tbody>
                  
                    @foreach ($data as $row)
                    <tr>
                      <th scope="row">{{ $row->id }}</th>
                      <td>{{ $row->nama_item }}</td>
                      <td>{{ $row->deskripsi_item }}</td>
                      <td>{{ $row->harga_item }}</td>
                      <td>{{ $row->stok_item }}</td>
                      <td>
                          <button type="button" class="btn btn-primary">Primary</button>
                          <button type="button" class="btn btn-secondary">Secondary</button>
                      </td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
@endsection @section('script_footer')
@endsection
