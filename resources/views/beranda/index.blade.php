@extends('layouts.app')
@section('content')

<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('cetak-pegawai-form')}}" class="btn btn-primary"><i class="fas fa-regular fa-print"></i>cetak</a>
                        <a href="{{route('absen.create')}}" class="btn btn-success">Absen Datang</a><br>


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
                                         <td>{{$absen->absenpulang->waktu_pulang}}</td>
                                         <td>{{$absen->absenpulang->status_pulang}}</td>
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
