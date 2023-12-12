@extends('layouts.base_admin.base_dashboard')

@section('script_head')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<!-- Styles -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection

@section('content')

<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"></h3>
            <div class="card-tools">
            <a href="{{ route('game.create') }}" class="btn btn-success">Tambah Game</a>

                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body p-0" style="margin: 20px">
            <table id="tbl_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Nama Game</th>
                        <th>Jenis Game</th>
                        <th>Deskripsi Game</th>
                        <th>Dibuat Pada</th>
                        <th>Diperbarui Pada</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</section>

<script>
        $(document).ready(function $('#games DataTable();
        });
</script>
@endsection

@section('script_footer')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var table = $('#tbl_list').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url()->current() }}',
                columns: [
                    { data: 'nama_game', name: 'nama_game' },
                    { data: 'jenis_game', name: 'jenis_game' },
                    { data: 'deskripsi_game', name: 'deskripsi_game' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' },
                    {
                        data: 'id',
                        name: 'id',
                        render: function (data, type, full, meta) {
                            return '<a href="{{ route("game.edit", ["id" => ":id"]) }}" class="editData" data-id="' + data + '"><i class="fas fa-edit fa-lg"></i></a> ' +
                                   '<a href="{{ route("game.destroy", ["id" => ":id"]) }}" class="hapusData" data-id="' + data + '"><i class="fas fa-trash fa-lg text-danger"></i></a>';
                        }
                    },
                ]
            });

            // Event delegation for edit and delete actions
            $('#tbl_list').on('click', '.editData', function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                window.location.href = '{{ url("game") }}/' + id + '/edit';
            });

            $('#tbl_list').on('click', '.hapusData', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    var confirmation = confirm('Are you sure you want to delete this record?');
    if (confirmation) {
        // Use AJAX to send a DELETE request
        $.ajax({
            url: '{{ url("delete-game") }}/' + id,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // Handle success response, if needed
                console.log(response);
                // Remove the row from the DataTable
                table.row($('#tbl_list').find('.hapusData[data-id="' + id + '"]').closest('tr')).remove().draw();
            },
            error: function(error) {
                // Handle error response, if needed
                console.error(error);
            }
        });
    }
});

        });
    </script>
@endsection
