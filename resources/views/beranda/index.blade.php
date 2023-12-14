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

                       <td>
                        <!-- <a href="" class="btn btn-success">Absen Pulang</a>-->

                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal">
                            <i class="fas fa-plus-square"></i> Presensi Masuk
                       </button>
                       <form action="{{ route('absen.store') }}" method="POST" enctype="multipart/form-data">
                       <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                         <div class="modal-dialog">
                           <div class="modal-content">
                             <div class="modal-header">
                               <p class="modal-title fs-5" id="exampleModalLabel">ABSENSI DATANG</p>
                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                             </div>
                             <div class="modal-body">

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
                                <input type="date" name="tanggal_pegawai" class="form-control @error('tanggal_pegawai') is-invalid @enderror" value="{{old('tanggal_pegawai')}}" id="tanggal_pegawai" placeholder="masukan tanggal" readonly>
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
                                <input type="file" name="keterangan_tambahan" id="keterangan_tambahan" class="form-control @error('keterangan_tambahan') is-invalid @enderror" value="{{old('keterangan_tambahan')}}">

                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">waktu kehadiran</label>
                                <input type="time" class="form-control @error('waktu_kehadiran') is-invalid  @enderror" value="{{old('waktu_kehadiran')}}" id="waktu_kehadiran" name="waktu_kehadiran"  required readonly>
                            </div>


                             <div class="modal-footer">
                           <button type="submit" class="btn btn-primary col-md-12">KLIK UNTUK PRESENSI MASUK</button>
                             </div>
                           </div>
                         </div>
                       </div>
                       </div>
                       </form>



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

                                     <th scope="col">WAKTU PULANG</th>

                                     <th scope="col">AKSI</th>
                                     <th scope="col">ABSEN PULANG</th>
                                 </tr>
                             </thead>
                             <tbody>
                               @foreach ($absensi as $absen)
                                <tr>
                                  <td>{{$absen->user->id}}</td>
                                   <td>{{$absen->nama_pegawai}}</td>

                                   <td>{{$absen->tanggal_pegawai}}</td>
                                   <td>{{$absen->keterangan->keterangan}}</td>
                                   <td>{{$absen->waktu_kehadiran}}</td>
                                   <td>{{$absen->waktu_pulang}}</td>
                                 <td>
                                   <form onsubmit="return confirm('Apakah anda yakin')" action="{{route('absen.destroy', $absen->id)}}" method="POST" enctype="multipart/form-data">
                                   @csrf
                                   @method('DELETE')
                                   <a href="{{route('absen.edit', $absen->id)}}" class="btn btn-md btn-primary"><i class="fas fa-edit"></i> Edit</a>
                                   <button class="btn btn-md btn-danger" type="submit"><i class="fas fa-trash-alt"></i> Hapus</button>
                                   </form>
                                   </td>

                                   <td>
                                     <!-- <a href="" class="btn btn-success">Absen Pulang</a>-->

                                     <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal{{$absen->id}}">
                                        <i class="fas fa-plus-square"></i> Presensi Keluar
                                    </button>
                                    <form action="{{ route('absenpulang.update' , $absen->id) }}" method="POST" enctype="multipart/form-data">
                                    <div class="modal fade" id="editModal{{$absen->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <p class="modal-title fs-5" id="exampleModalLabel">ABSENSI PULANG</p>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">

                                          @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                      <label class="font-weight-bold">Waktu Pulang</label>

                                      <input type="time" class="form-control @error('waktu_pulang') is-invalid @enderror" name="waktu_pulang" value="{{old('waktu_pulang', $absen->waktu_pulang)}}" id="waktu_pulang" readonly>
                                  </div>

                                          <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary col-md-12" name="update">KLIK UNTUK PRESENSI KELUAR</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    </div>
                                    </form>

                                   </td>
                               </tr>
                                @endforeach
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
