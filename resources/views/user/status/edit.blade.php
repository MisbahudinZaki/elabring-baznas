@extends('layouts.master')
@section('content')
    <body style="background: lightgray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('pengguna.update', $pengguna->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name', $pengguna->name)}}" name="name">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" value="{{old('status', $pengguna->status)}}" name="status">
                                <option value="pegawai">User</option>
                                <option value="admin">Administrator</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Status User</label>
                                <select class="form-control @error('user_status') is-invalid @enderror" value="{{old('user_status', $pengguna->user_status)}}" name="user_status">
                                <option value="aktif">aktif</option>
                                <option value="tidak aktif">tidak aktif</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary"><i class="fas fa-check-square"></i> SAVE</button>
                            <button type="reset" class="btn btn-warning"><i class="fas fa-undo"></i> RESET</button>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
