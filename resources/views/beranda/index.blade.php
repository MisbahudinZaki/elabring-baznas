@extends('layouts.app')

@section('content')

<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('cetak-pegawai-form')}}" class="btn btn-primary"><i class="fas fa-regular fa-print"></i> Cetak</a>
                       <!-- <a href="" class="btn btn-success"><i class="fas fa-solid fa-plus-square"></i> Datang</a><br>-->

                        <button id="tombolku" class="btn btn-success"><i class="fas fa-view"></i><i class="fas fa-solid fa-plus-square"></i> Absen Datang </button>
                        <div id="myModal" class="penghalang">
                            <div class="modal-content1">
                                <span id="tutup">&times;</span>

                                <form action="{{route('absen.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
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
                                        <input type="date" name="tanggal_pegawai" class="form-control @error('tanggal_pegawai') is-invalid @enderror" value="{{old('tanggal_pegawai')}}" placeholder="masukan tanggal">
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
                                        <textarea class="form-control @error('keterangan_tambahan') is-invalid @enderror" name="keterangan_tambahan" id="keterangan_tambahan" rows="5" placeholder="diisi ketika berhalangan hadir atau sakit">{{old('keterangan_tambahan')}}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">waktu kehadiran</label>
                                        <input type="time" class="form-control @error('waktu_kehadiran') is-invalid  @enderror" value="{{old('waktu_kehadiran')}}" id="waktu_kehadiran" name="waktu_kehadiran"  required readonly>
                                    </div>

                                    <input type="submit" value="SIMPAN" class="btn btn-primary">
                                    <input type="reset" value="BATAL" class="btn btn-danger">
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

                <br>

                <div class="card">
                    <div class="card-body">
                        <h3>DAFTAR ABSENSI</h3>
                         <table class="table table-striped text-center">

                             <thead class="table-dark">
                                 <tr>
                                    <th scope="col">Id</th>
                                     <th scope="col">NAMA</th>

                                     <th scope="col">TANGGAL</th>
                                     <th scope="col">KETERANGAN</th>
                                     <th scope="col">WAKTU KEHADIRAN</th>
                                     <th scope="col">STATUS</th>
                                     <th scope="col">WAKTU PULANG</th>
                                     <th scope="col">STATUS PULANG</th>
                                     <th scope="col">AKSI</th>
                                     <th scope="col">ABSEN PULANG</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @forelse ($absensi as $absen)
                                     <tr>
                                        <td>{{$absen->user->id}}</td>
                                         <td>{{$absen->nama_pegawai}}</td>

                                         <td>{{$absen->tanggal_pegawai}}</td>
                                         <td>{{$absen->keterangan->keterangan}}</td>
                                         <td>{{$absen->waktu_kehadiran}}</td>
                                         <td>{{$absen->status}}</td>
                                         <td>{{$absen->waktu_pulang}}</td>
                                         <td>{{$absen->status_pulang}}</td>
                                       <td>
                                         <form onsubmit="return confirm('Apakah anda yakin')" action="{{route('absen.destroy', $absen->id)}}" method="POST" enctype="multipart/form-data">
                                         @csrf
                                         @method('DELETE')
                                         <a href="{{route('absen.edit', $absen->id)}}" class="btn btn-md btn-primary"><i class="fas fa-edit"></i> Edit</a>
                                         <button class="btn btn-md btn-danger" type="submit"><i class="fas fa-trash-alt"></i> Hapus</button>
                                         </form>
                                         </td>
                                         <td>
                                            <a href="{{route('absenpulang.edit', $absen->id)}}" class="btn btn-success">Absen Pulang</a>
                                         </td>
                                     </tr>
                                 @empty
                                     <div class="alert alert-danger">
                                         Data Kosong
                                     </div>
                                 @endforelse
                             </tbody>
                         </table>

                     </div>
                </div>
                <br>

            </div>
        </div>
    </div>
</body>
@endsection
