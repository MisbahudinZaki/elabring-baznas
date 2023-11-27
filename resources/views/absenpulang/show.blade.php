@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('absenpulang.show', $absen->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="id">#</label>
                        <input type="number" class="form-control @error('id')
                            is-invalid
                        @enderror" value="{{old('id', $absen->id)}}">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Waktu Pulang</label>
                        <input type="time" class="form-control @error('waktu_pulang') is-invalid @enderror" name="waktu_pulang" value="{{old('waktu_pulang', $absen->waktu_pulang)}}">
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
