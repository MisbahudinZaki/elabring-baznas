@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('absenpulang.update', $absenpulang->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="id">#</label>
                            <input type="number" class="form-control @error('id')
                                is-invalid
                            @enderror" value="{{old('id', $absenpulang->id)}}">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Waktu Pulang</label>
                            <input type="time" class="form-control @error('waktu_pulang') is-invalid @enderror" name="waktu_pulang" value="{{old('waktu_pulang', $absenpulang->waktu_pulang)}}">
                        </div>

                        <button type="submit" class="btn btn-primary">EDIT</button>
                        <button type="reset" class="btn btn-warning">RESET</button>

                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
