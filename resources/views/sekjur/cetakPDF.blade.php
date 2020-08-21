<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>



    #customers {
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      font-size: 10px;
      border-collapse: collapse;
      width: 100%;
    }

    #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #337ab7;
      color: white;
    }
  </style>
</head>
<body>
  <center>
    <h4>Daftar Peserta PKPM@darmajaya.ac.id</h4>
  </center>
    <table id="customers">
      <tr>
        <th>NPM</th>
        <th>Nama</th>
        <th>Program Studi</th>
        <th>Nomor Kelompok</th>
        <th>Dosen Pembimbing Lapangan</th>
        <th>Desa / Tempat</th>
      </tr>

      @foreach($datas as $data)
      <tr>
        <td>{{ $data['npm'] }}</td>
        <td>{{ $data['nama'] }}</td>
        <td>{{ $data['jurusan'] }}</td>
        <td>{{ $data['namaKelompok'] }}</td>
        <td>{{ $data['dpl'] }}</td>
        <td>{{ $data['namaTempat'] }}</td>
      </tr>
      @endforeach
    </table>
</body>
</html>