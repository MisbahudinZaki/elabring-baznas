@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-header">Daftar User BAZNAS</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <a href="{{route('user.create')}}" class="btn btn-primary"><i class="fas fa-plus-square"></i> Tambah</a>
                            <thead class="table-dark">
                                <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Status</th>
                                <th scope="col">Status User</th>

                                <th scope="col">Edit</th>
                                <th scope="col">Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->status}}</td>
                                        <td>{{$user->user_status}}</td>
                                        <td><a href="{{route('pengguna.edit', $user->id)}}" class="btn btn-primary">Edit Status pengguna</a></td>
                                        <td>@if(auth()->user() && auth()->user()->status === 'admin')
                                            <!-- Tampilkan tombol hanya untuk admin -->
                                            <form onclick="return confirm('apakah anda yakin')" action="{{route('user.destroy', $user->id)}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">hapus</button>
                                        </form>
                                        @else
                                            <!-- Tampilkan pesan atau tindakan alternatif untuk non-admin -->
                                            <p>Anda tidak memiliki izin untuk melakukan ini.</p>
                                        @endif
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
