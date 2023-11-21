@extends('layouts.app')
@extends('sidebar')
@section('content')

<body style="background: lightgray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <a href="{{route('absen_pulang.create')}}" class="btn btn-success">Tambah</a>
                        <table class="table table-striped">
                            <thead class="table-dark">
                                <tr>
                                <th scope="col">#</th>
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
                                        <td>{{$abs->id}}</td>
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
