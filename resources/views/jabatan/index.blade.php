@extends('layouts.app')
@extends('sidebar')
@section('content')
    <h1>DAFTAR JABATAN PEGAWAI BAZNAS</h1>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{route('jabatan.create')}}" class="btn btn-success">TAMBAH</a>
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>

                                    <th scope="col">Jabatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jabatans as $jbt)
                                    <tr>

                                        <td>{{$jbt->nama_jabatan}}</td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Kosong
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{$jabatans->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
