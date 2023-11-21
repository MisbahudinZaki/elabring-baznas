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
        </div>

    </div>
</div>


@endsection
