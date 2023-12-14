@extends('layouts.app')
@section('content')

<body style="background: lightgray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('keterangan.create')}}" class="btn btn-success">Tambah</a>
                        <table class="table table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Penjelasan</th>
                                    <th></th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($keterangan as $item)
                                    <tr>
                                        <td>{{$item->keterangan}}</td>
                                        <td>{{$item->keterangan_tambahan}}</td>
                                        <td></td>
                                        <td>
                                            <form onsubmit="return confirm('Apakah anda yakin')" action="{{route('keterangan.destroy', $item->id)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{route('keterangan.edit', $item->id)}}" class="btn btn-primary">EDIT</a>
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection
