@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Profil Anggota Baznas</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" class="text-center">Nama</th>
                                <th scope="col">Tempat Lahir</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">No HP/WA</th>
                                <th scope="col"></th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pegawai as $karyawan)
                                <tr>
                                    <td>{{$karyawan->nama_lengkap}}</td>
                                    <td>{{$karyawan->tempat_lahir}}</td>
                                    <td>{{$karyawan->tanggal_lahir}}</td>
                                    <td>{{$karyawan->alamat}}</td>
                                    <td>{{$karyawan->jabatan}}</td>
                                    <td>{{$karyawan->wa_number}}</td>
                                    <td></td>
                                    <td>
                                        <form onsubmit="return confirm('apakah anda yakin')" action="{{route('pegawai.destroy',$karyawan->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('pegawai.edit',$karyawan->id)}}" class="btn btn-primary">edit</a>
                                        <button type="submit" class="btn btn-danger">hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
