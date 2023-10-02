@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <form action="{{route('absen.show', $absen->id)}}">
                            <div class="form-group">
                                <label class="font-weight-bold">no</label>
                                <input type="text" class="form-control @error('no_pegawai') is-invalid  @enderror" value="{{old('no_pegawai', $absen->no_pegawai)}}" name="no_pegawai" placeholder="masukkan no" readonly>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">nama</label>
                                <input type="text" class="form-control @error('nama_pegawai') is-invalid  @enderror" value="{{old('nama_pegawai', $absen->nama_pegawai)}}" name="nama_pegawai" placeholder="masukkan nama" readonly>
                            </div>


                            <div class="form-group">
                                <label class="font-weight-bold">tanggal</label>
                                <input type="date" name="tanggal_pegawai" class="form-control @error('tanggal_pegawai') is-invalid @enderror" value="{{old('tanggal_pegawai', $absen->tanggal_pegawai)}}" placeholder="masukan tanggal" readonly>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">nama jabatan</label>
                                <input type="text" name="nama_jabatan" class="form-control @error('nama_jabatan') is-invalid @enderror" value="{{old('nama_jabatan', $absen->nama_jabatan)}}" placeholder="masukan nama_jabatan" readonly>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">alamat</label>
                                <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{old('alamat',$absen->alamat)}}" placeholder="masukan alamat" readonly>
                            </div>


                            <div class="form-group">
                                <label class="font-weight-bold">keterangan</label>
                                <input type="text" class="form-control @error('keterangan_pegawai') is-invalid  @enderror" value="{{old('keterangan_pegawai', $absen->keterangan_pegawai)}}" name="keterangan_pegawai" placeholder="masukkan keterangan" readonly>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Keterangan Tambahan</label>
                                <textarea class="form-control @error('keterangan_tambahan') is-invalid @enderror" name="keterangan_tambahan" id="keterangan_tambahan" rows="5" placeholder="diisi ketika berhalangan hadir atau sakit" readonly>{{old('keterangan_tambahan',$absen->keterangan_tambahan)}}</textarea>
                            </div>


                        </form>
                        <a href="{{route('home')}}" class="btn btn-primary">kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
