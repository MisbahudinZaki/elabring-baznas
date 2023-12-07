@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-header">Print Data Pegawai</div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="label">Tanggal Awal</label>
                        <input type="date" name="tglawal" id="tglawal" class="form-control"/>
                    </div>

                    <div class="form-group mb-3">
                        <label for="label">Tanggal Akhir</label>
                        <input type="date" name="tglakhir" id="tglakhir" class="form-control"/>
                    </div>

                    <a href="#" onclick="this.href='/cetakdatapertanggal/'+ document.getElementById('tglawal').value +
                    '/' + document.getElementById('tglakhir').value "
                    target="_blank" class="btn btn-primary"><i class="fas fa-print"></i>cetak</a>
                </div>



            </div>
            <br>
            <div class="card">
                <div class="card-header">rekap</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">NAMA</th>
                                <th scope="col">TANGGAL</th>
                                <th scope="col">KETERANGAN</th>
                                <th scope="col">WAKTU KEHADIRAN</th>
                                <th scope="col">Status</th>
                                <th scope="col">waktu_pulang</th>
                                <th scope="col">status pulang</th>
                            </tr>
                        </thead>
                        <tbody>

                                @foreach ($absensi as $abs)
                                <tr>
                                <td>{{$abs->nama_pegawai}}</td>

                                <td>{{$abs->tanggal_pegawai}}</td>
                                <td>{{$abs->keterangan->keterangan}}</td>
                                <td>{{$abs->waktu_kehadiran}}</td>
                                <td>{{$abs->status}}</td>
                                <td>{{$abs->absenpulang->waktu_pulang}}</td>
                                <td>{{$abs->absenpulang->status_pulang}}</td>
                            </tr>
                                @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection
