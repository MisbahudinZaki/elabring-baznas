@extends('layouts.app')
@extends('sidebar')
@section('content')

<h1>DAFTAR HADIR PEGAWAI BAZNAS</h1>

<body style="background: lightgray">
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow">
                <div class="card-header">Selamat datang <b>{{Auth::user()->name}}</b>, Anda login sebagai: <b>{{Auth::user()->status}}</b></div>
                <div class="card-body">



                   <a href="{{route('absen.create')}}" class="btn btn-md btn-success"><i class="fas fa-solid fa-plus-square"></i> Tambah</a>

                    <table class="table table-striped text-center">

                        <thead class="table-dark">
                            <tr>
                                <th scope="col">NAMA</th>
                                <th scope="col">JABATAN</th>
                                <th scope="col">TANGGAL</th>
                                <th scope="col">KETERANGAN</th>
                                <th scope="col">WAKTU KEHADIRAN</th>
                                <th scope="col">Status</th>
                                <th scope="col">User Id </th>
                                <th scope="col">Waktu Pulang</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($absensi as $absen)
                                <tr>
                                    <td>{{$absen->nama_pegawai}}</td>
                                    <td>{{$absen->nama_jabatan}}</td>
                                    <td>{{$absen->tanggal_pegawai}}</td>
                                    <td>{{$absen->keterangan_id}}</td>
                                    <td>{{$absen->waktu_kehadiran}}</td>
                                    <td>{{$absen->status}}</td>
                                    <td>{{$absen->user->id}}</td>
                                    <td>{{$absen->absen_pulangs->waktu_pulang}}</td>
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
        </div>
    </div>
</div>
</body>
@endsection
