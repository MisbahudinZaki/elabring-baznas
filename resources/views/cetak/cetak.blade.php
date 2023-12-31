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
            orientation: lanscape;

            border:2px solid black;
        }
    </style>
</head>
<body>
    <div class="form-group">

        <h1 align="center">Kartu Laporan</h1>
        <h2 align="center">BAZNAS KABUPATEN PASAMAN</h2>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <thead>
            <tr>

                <th scope="col">NAMA</th>
                <th scope="col">JABATAN</th>
                <th scope="col">KETERANGAN</th>
                <th scope="col">WAKTU KEHADIRAN</th>
                <th scope="col">WAKTU PULANG</th>

            </tr>
            </thead>
            <tbody>
                @foreach ($absensi as $ab)
                    <tr>
                        <td>{{$ab->nama_pegawai}}</td>
                        <td>{{$ab->nama_jabatan}}</td>
                        <td>{{$ab->keterangan->keterangan}}</td>
                        <td>{{$ab->waktu_kehadiran}}</td>
                        <td>{{$ab->absen_pulangs->waktu_pulang}}</td>
                    </tr>
                @endforeach




            </tbody>

        </table>

        </div>

        <!--<script type="text/javascript">
        window.print();
        </script>-->
</body>
</html>
