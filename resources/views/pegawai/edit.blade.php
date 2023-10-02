@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Profil Anggota Baznas</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <a href="{{route('pegawai.create')}}" class="btn btn-success">add</a>
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">NAMA</th>
                                <th scope="col">Tempat Lahir</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">NO Wa/Telfon</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($persons as $pr)
                                <tr>
                                    <td>{{$pr->nama_lengkap}}</td>
                                    <td>{{$pr->tempat_lahir}}</td>
                                    <td>{{$pr->tanggal_lahir}}</td>
                                    <td>{{$pr->alamat}}</td>
                                    <td>{{$pr->jabatan}}</td>
                                    <td>{{$pr->wa_number}}</td>
                                    <td>
                                        <form action="{{route('person.destroy', $pr->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('person.show', $pr->id)}}" class="btn btn-info">show</a>
                                        <a href="{{route('person.edit', $pr->id)}}" class="btn btn-primary">edit</a>
                                        <button type="submit" class="btn btn-danger">delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                    {{$persons->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
