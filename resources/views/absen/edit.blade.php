@extends('layouts.master')
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
                        <label class="font-weight-bold">id</label>
                        <input type="number" class="form-control @error('user_id') is-invalid  @enderror" value="{{Auth::user()->id}}" name="user_id" readonly>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">nama</label>
                        <input type="text" class="form-control @error('nama_pegawai') is-invalid  @enderror" value="{{Auth::user()->name}}" name="nama_pegawai" placeholder="masukkan nama">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">tanggal</label>
                        <input type="date" name="tanggal_pegawai" class="form-control @error('tanggal_pegawai') is-invalid @enderror" value="{{old('tanggal_pegawai', $absen->tanggal_pegawai)}}" placeholder="masukan tanggal">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">keterangan</label>
                        <select class="form-control select2" style="width: 100%" name="keterangan_id" id="keterangan_id">
                        <option disabled value>Pilih</option>
                        @foreach ($ket as $item)
                            <option value="{{ $item->id }}">{{ $item->keterangan }}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Keterangan Tambahan</label>
                        <textarea class="form-control @error('keterangan_tambahan') is-invalid @enderror" name="keterangan_tambahan" id="keterangan_tambahan" rows="5" placeholder="diisi ketika berhalangan hadir atau sakit">{{old('keterangan_tambahan', $absen->id)}}</textarea>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">waktu kehadiran</label>
                        <input type="time" class="form-control @error('waktu_kehadiran') is-invalid  @enderror" id="waktu_kehadiran" value="{{old('waktu_kehadiran', $absen->waktu_kehadiran)}}" name="waktu_kehadiran"  required >
                    </div>


                    <button type="submit" class="btn btn-primary"><i class="fas fa-check-square"></i> save</button>
                    <button type="reset" class="btn btn-warning"><i class="fas fa-undo"></i> reset</button>
                    <a href="{{route('beranda.index')}}" class="btn btm-md btn-danger">cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

@endsection
