@extends('layouts.app')
@section('content')

<h1>FORM PENGINPUTAN DATA ABSEN PEGAWAI</h1>
<body style="background: lightgray">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{route('absen.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label class="font-weight-bold">no pegawai</label>
                        <input type="text" class="form-control @error('no_pegawai') is-invalid  @enderror" value="{{old('no_pegawai')}}" name="no_pegawai" placeholder="masukkan no">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">nama</label>
                        <input type="text" class="form-control @error('nama_pegawai') is-invalid  @enderror" value="{{old('nama_pegawai')}}" name="nama_pegawai" placeholder="masukkan nama">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">jabatan</label>
                        <select class="form-control" name="nama_jabatan" id="nama_jabatan" value="{{old('nama_jabatan')}}" class="form-control @error('nama_jabatan')
                            is-invalid
                        @enderror">
                        <option value="">Pilih Jabatan</option>
                        <option value="Ketua">Ketua</option>
                        <option value="Wakil Ketua">Wakil Ketua</option>
                        <option value="Sekretaris">Sekretaris</option>
                        <option value="Bendahara">Bendahara</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">tanggal</label>
                        <input type="date" name="tanggal_pegawai" class="form-control @error('tanggal_pegawai') is-invalid @enderror" value="{{old('tanggal_pegawai')}}" placeholder="masukan tanggal">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">keterangan</label>
                        <!--<input type="submit" class="form-control @error('keterangan_pegawai') is-invalid  @enderror" value="{{old('keterangan_pegawai')}}" name="keterangan_pegawai" placeholder="masukkan keterangan">-->
                        <select name="keterangan_pegawai" class="form-control @error('keterangan_pegawai')
                            is-invalid
                        @enderror" value="{{old('keterangan.pegawai')}}">
                                    <option value="">--------</option>
                                    <option value="Hadir">Hadir</option>
                                    <option value="Izin">Izin</option>
                                    <option value="Sakit">Sakit</option>
                        </select>

                    </div>

                    <button type="submit" class="btn btn-md btn-primary"><i class="fas fa-check-square"></i> save</button>
                    <button type="reset" class="btn btn-md btn-warning"><i class="fas fa-undo"></i> reset</button>
                    <a href="{{route('absen.index')}}" class="btn btm-md btn-danger">cancel</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</body>

@endsection
