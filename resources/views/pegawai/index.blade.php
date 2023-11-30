@extends('layouts.app')
@extends('sidebar')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-header">Daftar User</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <a href="{{route('auth.register')}}">TAMBAH USER</a>
                            <thead class="table-dark">
                                <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Status User</th>
                                <th scope="col"></th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->status}}</td>
                                        <td>{{$user->user_status}}</td>
                                        <td><a href="{{route('user.edit', $user->id)}}" class="btn btn-md btn-primary">edit</a></td>
                                        <td>
                                            <form onclick="return confirm('apakah anda yakin')" action="{{route('user.destroy', $user->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">hapus</button>
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
@endsection
