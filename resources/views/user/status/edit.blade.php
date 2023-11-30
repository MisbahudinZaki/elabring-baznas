@extends('layouts.app')
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
                                <input type="text" class="form-control @error('status') is-invalid @enderror" value="{{old('status', $pengguna->status)}}" name="status">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Status User</label>
                                <input type="text" class="form-control @error('user_status') is-invalid @enderror" value="{{old('user_status', $pengguna->user_status)}}" name="user_status">
                            </div>

                            <button type="reset" class="btn btn-warning">RESET</button>
                            <button type="submit" class="btn btn-primary">SAVE</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
