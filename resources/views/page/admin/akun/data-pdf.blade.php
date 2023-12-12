<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabel Barang</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
    h1 {
      text-align: center
    }
  </style>
</head>
<body>

  <h1>Tabel Barang</h1>
  <table>
      <tr>
        <th>No</th>
        <th>Nama Item</th>
        <th>Deskripsi Barang</th>
        <th>Harga Barang</th>
        <th>Stok Barang</th>
      </tr>
    @foreach ($data as $row)

      <tr>
        <td>{{ $row->id }}</td>
        <td>{{ $row->nama_item }}</td>
        <td>{{ $row->deskripsi_item }}</td>
        <td>{{ $row->harga_item }}</td>
        <td>{{ $row->stok_item }}</td>
      </tr>
    @endforeach
  </table>

</body>
</html>
