@extends('layouts.app')
@extends('sidebar')
@section('content')

<body style="background: lightgray">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Selamat Datang</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <a href="{{route('absenpulang.create')}}" class="btn btn-success">Tambah</a>
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Waktu Pulang</th>
                                    <th scope="col">Status</th>
                                    <th></th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                               @forelse ($absenpulang as $abs)
                                   <tr>
                                    <td>{{$abs->id}}</td>
                                    <td>{{$abs->waktu_pulang}}</td>
                                    <td>{{$abs->status_pulang}}</td>
                                    <td></td>
                                    <td>
                                        <form action="{{route('absenpulang.destroy', $abs->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('absenpulang.edit', $abs->id)}}" class="btn btn-primary">EDIT</a>
                                        <button type="submit" class="btn btn-danger">HAPUS</button>
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
</body>

@endsection
