@extends('layouts.app')
@section('content')

<body style="background:lightgray">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">BAZNAS</div>
                    <div class="card-body">
                            <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="font-weight-bold">User Id</label>
                                <input type="text" class="form-control @error('user_id') is-invalid @enderror" value="{{old('user_id')}}" name="user_id">
                            </div>

                            <div class="row mb-3">
                                <label class="font-weight-bold">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" name="name">
                            </div>


                            <div class="row mb-3">
                                <label for="email" class="font-weight-bold">Email Address</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="font-weight-bold">'Password'</label>
                                    <input id="password" type="password" value="12345678" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="font-weight-bold">{{ __('Confirm Password') }}</label>

                                    <input id="password-confirm" type="password" value="12345678" class="form-control" name="password_confirmation" required autocomplete="new-password">

                            </div>

                            <div class="row mb-3">
                                <label for="status" class="font-weight-bold">Status</label>


                                 <input type="text" name="status" class="form-control" value="pegawai" placeholder="Status" readonly>

                            </div>

                            <div class="row mb-3">
                                <label for="user_status" class="font-weight-bold">Status Pengguna</label>


                                 <input type="text" name="user_status" class="form-control" value="aktif" placeholder="Status Pengguna" readonly>

                            </div>

                            <button type="submit" class="btn btn-md btn-primary"><i class="fas fa-check-square"></i> save</button>
                            <button type="reset" class="btn btn-md btn-warning"><i class="fas fa-undo"></i> reset</button>
                            <a href="{{route('home')}}" class="btn btn-danger">cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection
