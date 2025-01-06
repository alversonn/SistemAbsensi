<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rekap Kehadiran</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      margin: 20px 0;
    }

    table,
    th,
    td {
      border: 1px solid black;
    }

    th,
    td {
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <h1>Rekap Kehadiran</h1>
  <table>
    <thead>
      <tr>
        <th>NISN</th>
        <th>Nama</th>
        <th>Status</th>
        <!-- <th>Tanggal</th> -->
      </tr>
    </thead>
    <tbody>
      @foreach($rekap as $data)
      <tr>
        <td>{{ $data->siswa ? $data->siswa->nisn : 'N/A' }}</td>
        <td>{{ $data->siswa ? $data->siswa->nama : 'N/A' }}</td>
        <td>{{ $data->status }}</td>
        <!-- <td>{{ $data->created_at ? $data->created_at->format('Y-m-d') : 'Tidak Tersedia' }}</td> -->
      </tr>
      @endforeach
    </tbody>
  </table>
</body>

</html>
