@extends('layouts.app')
@extends('sidebar')
@section('content')

<body style="background: lightgray">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('absen.create')}}" class="btn btn-success">Absen Datang</a><br>
                        <br>
                        <a href="{{route('absen_pulang.create')}}" class="btn btn-success">Absen Pulang</a>
                    </div>
                </div>

                <br>

                <div class="card">
                    <div class="card-body">
                        <h3>DAFTAR ABSENSI DATANG</h3>
                         <table class="table table-striped text-center">

                             <thead class="table-dark">
                                 <tr>
                                     <th scope="col">#</th>

                                     <th scope="col">NAMA</th>
                                     <th scope="col">JABATAN</th>
                                     <th scope="col">TANGGAL</th>
                                     <th scope="col">KETERANGAN</th>
                                     <th scope="col">WAKTU KEHADIRAN</th>
                                     <th scope="col">Status</th>
                                     <th scope="col"></th>
                                     <th scope="col">Aksi</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @forelse ($absensi as $absen)
                                     <tr>
                                         <td>{{$absen->id}}</td>
                                         <td>{{$absen->nama_pegawai}}</td>
                                         <td>{{$absen->nama_jabatan}}</td>
                                         <td>{{$absen->tanggal_pegawai}}</td>
                                         <td>{{$absen->keterangan_pegawai}}</td>
                                         <td>{{$absen->waktu_kehadiran}}</td>
                                         <td>{{$absen->status}}</td>
                                         <td></td>
                                       <td>
                                         <form onsubmit="return confirm('Apakah anda yakin')" action="{{route('absen.destroy', $absen->id)}}" method="POST" enctype="multipart/form-data">
                                         @csrf
                                         @method('DELETE')
                                         <a href="{{route('absen.edit', $absen->id)}}" class="btn btn-md btn-primary"><i class="fas fa-edit"></i> Edit</a>
                                         <button class="btn btn-md btn-danger" type="submit"><i class="fas fa-trash-alt"></i> Hapus</button>
                                         </form>
                                         </td>
                                     </tr>
                                 @empty
                                     <div class="alert alert-danger">
                                         Data Kosong
                                     </div>
                                 @endforelse
                             </tbody>
                         </table>
                         {{$absensi->links()}}
                     </div>
                </div>
                <br>

                <div class="card">
                    <div class="card-body">
                        <h3>DAFTAR ABSENSI PULANG</h3>
                        <table class="table table-striped">

                            <thead class="table-dark">
                                <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Waktu</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                                <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($absplngs as $abs)
                                    <tr>
                                        <td>{{$abs->nama_pegawai}}</td>
                                        <td>{{$abs->tanggal_pegawai}}</td>
                                        <td>{{$abs->waktu_pulang}}</td>
                                        <td>{{$abs->keterangan_pegawai}}</td>
                                        <td>{{$abs->status}}</td>
                                        <td></td>
                                        <td>
                                            <form action="{{route('absen_pulang.destroy', $abs->id)}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{route('absen_pulang.edit', $abs->id)}}" class="btn btn-primary">Edit</a>
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$absplngs->links()}}
                     </div>
                </div>

            </div>
        </div>
    </div>
</body>

@endsection
