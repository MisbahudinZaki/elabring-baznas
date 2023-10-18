<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
    <style>
        table.static{
            position: relative;

            border:2px solid black;
        }
    </style>
</head>
<body>
    <div class="form-group">
        <h1 align="center">Laporan Absen Pegawai</h1>
        <h2 align="center">BAZNAS KABUPATEN PASAMAN</h2>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <thead>
            <tr>
                <th scope="col">NO PEGAWAI</th>
                <th scope="col">NAMA</th>
                <th scope="col">JABATAN</th>
                <th scope="col">TANGGAL</th>
                <th scope="col">ALAMAT</th>
                <th scope="col">KETERANGAN</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($absensi as $ab)
                    <tr>
                        <td>{{$ab->no_pegawai}}</td>
                        <td>{{$ab->nama_pegawai}}</td>
                        <td>{{$ab->nama_jabatan}}</td>
                        <td>{{$ab->tanggal_pegawai}}</td>
                        <td>{{$ab->alamat}}</td>
                        <td>{{$ab->keterangan_pegawai}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>

        <script type="text/javascript">
        window.print();
        </script>
</body>
</html>
