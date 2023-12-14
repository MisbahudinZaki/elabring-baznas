@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-header">Daftar User</div>
                    <div class="card-body">
                        <table class="table table-striped">

                            <thead class="table-dark">
                                <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Status</th>
                                <th scope="col">Status User</th>
                                <th></th>
                                <th scope="col">aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengguna as $user)
                                <tr>
                                        <td>{{$user->name}}</td>

                                        <td>{{$user->status}}</td>
                                        <td>{{$user->user_status}}</td>
                                        <td></td>
                                        <td><a href="{{route('pengguna.edit', $user->id)}}" class="btn btn-primary">EDIT</a></td>

                                </tr>
                                    @endforeach

                            </tbody>


                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
