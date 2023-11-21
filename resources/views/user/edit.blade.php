@extends('layouts.app')
@section('content')

<body style="background:lightgray">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">BAZNAS</div>
                    <div class="card-body">
                            <form action="{{route('user.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name', $user->name)}}" name="name">
                            </div>



                            <div class="form-group">
                                <label class="font-weight-bold">tempat/tanggal lahir</label>
                                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{old('tempat_lahir', $user->tempat_lahir)}}" name="tempat_lahir">
                                <input type="date" class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{old('tanggal_lahir', $user->tanggal_lahir)}}" name="tanggal_lahir">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" value="{{old('jenis_kelamin', $user->jenis_kelamin)}}">
                                    <option value="">--------</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                        </select>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">alamat tinggal</label>
                                <input type="text" class="form-control @error('alamat_tinggal') is-invalid @enderror" value="{{old('alamat_tinggal', $user->alamat_tinggal)}}" name="alamat_tinggal">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">No Hp Aktif</label>
                                <input type="number" class="form-control @error('no_hp') is-invalid @enderror" value="{{old('no_hp', $user->no_hp)}}" name="no_hp">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Status</label>
                                <input type="text" class="form-control @error('status') is-invalid @enderror" value="{{old('status', $user->status)}}" name="status">
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
