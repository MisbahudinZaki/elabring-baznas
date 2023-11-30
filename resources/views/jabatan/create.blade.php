@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('jabatan.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="jabatan" class="font-weight-bold">Nama</label>
                            <input type="text" class="form-control @error('nama_jabatan')
                                is-invalid
                            @enderror" value="{{old('nama_jabatan')}}" name="nama_jabatan" id="nama_jabatan">
                        </div>

                        <button type="submit" class="btn btn-primary">SAVE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
