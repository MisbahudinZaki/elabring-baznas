@extends('layouts.app')
@section('content')

<h1>FORM PENGEDITAN DATA ABSEN PEGAWAI</h1>
<body style="background: lightgray">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{route('absen.update', $absen->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label class="font-weight-bold">no pegawai</label>
                        <input type="text" class="form-control @error('no_pegawai') is-invalid  @enderror" value="{{old('no_pegawai', $absen->no_pegawai)}}" name="no_pegawai" placeholder="masukkan no">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">nama pegawai</label>
                        <input type="text" class="form-control @error('nama_pegawai') is-invalid  @enderror" value="{{old('nama_pegawai', $absen->nama_pegawai)}}" name="nama_pegawai" placeholder="masukkan nama">
                    </div>


                    <div class="form-group">
                        <label class="font-weight-bold">tanggal</label>
                        <input type="date" name="tanggal_pegawai" class="form-control @error('tanggal_pegawai') is-invalid @enderror" value="{{old('tanggal_pegawai', $absen->tanggal_pegawai)}}" placeholder="masukan tanggal">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">jabatan</label>
                        <input type="text" name="nama_jabatan" class="form-control @error('nama_jabatan') is-invalid @enderror" value="{{old('nama_jabatan', $absen->nama_jabatan)}}" placeholder="masukan jabatan">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">keteragngan</label>
                        <input type="text" name="keterangan_pegawai" class="form-control @error('keterangan_pegawai') is-invalid @enderror" value="{{old('keterangan_pegawai', $absen->keterangan_pegawai)}}" placeholder="masukan keterangan">
                    </div>






                    <button type="submit" class="btn btn-primary"><i class="fas fa-check-square"></i> save</button>
                    <button type="reset" class="btn btn-warning"><i class="fas fa-undo"></i> reset</button>
                    <a href="{{route('absen.index')}}" class="btn btm-md btn-danger">cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

@endsection