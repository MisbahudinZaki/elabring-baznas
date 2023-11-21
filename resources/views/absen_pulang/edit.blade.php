@extends('layouts.app')
@section('content')
<body style="background: lightgray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                     <form action="{{route('absen_pulang.store')}}" method="POST" enctype="multipart/form-data">
                     @csrf

                     <div class="form-group">
                        <label class="font-weight-bold">nama</label>
                        <input type="text" class="form-control @error('nama_pegawai') is-invalid  @enderror" value="{{Auth::user()->name}}" name="nama_pegawai" placeholder="masukkan nama">
                    </div>


                    <div class="form-group">
                        <label class="font-weight-bold">waktu_pulang</label>
                        <input type="time" class="form-control @error('waktu_pulang') is-invalid  @enderror" value="{{old('waktu_pulang')}}" name="waktu_pulang" placeholder="massukan waktu">
                    </div>

                    <button type="submit" class="btn btn-md btn-primary"><i class="fas fa-check-square"></i> save</button>
                    <button type="reset" class="btn btn-md btn-warning"><i class="fas fa-undo"></i> reset</button>
                    <a href="{{route('absen_pulang.index')}}" class="btn btm-md btn-danger">cancel</a>

                     </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>

@endsection
