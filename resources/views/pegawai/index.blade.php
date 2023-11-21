@extends('layouts.app')
@extends('sidebar')
@section('content')

<body style="background: lightgray">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="text-align: center">DATA USER</div>
                    <div class="card-body">

                        <form action="" method="post" enctype="multipart/form-data">



                            <div class="form-group">
                                <label class="font-weight-bold">nama</label>
                                <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" value="{{old('nama_lengkap')}}" name="nama_lengkap" id="">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">tempat / tanggal lahir</label>
                                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{old('tempat_lahir')}}" name="tempat_lahir" id="">
                                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{old('tanggal_lahir')}}" name="tanggal_lahir" id="">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">alamat</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" value="{{old('alamat')}}" name="alamat" id="">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">jabatan</label>
                                <input type="text" class="form-control @error('jabatan') is-invalid @enderror" value="{{old('jabatan')}}" name="jabatan" id="">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">no hp/wa</label>
                                <input type="text" class="form-control @error('wa_number') is-invalid @enderror" value="{{old('wa_number')}}" name="wa_number" id="">
                            </div>

                        </form>

                        <a href="{{route()}}"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection
