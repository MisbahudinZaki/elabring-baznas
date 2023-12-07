@extends('layouts.master')
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
                            <label class="font-weight-bold">Waktu Pulang</label>

                            <input type="time" class="form-control @error('waktu_pulang') is-invalid @enderror" name="waktu_pulang" value="{{old('waktu_pulang', $absenpulang->waktu_pulang)}}" id="waktu_pulang" readonly>
                        </div>

                        <button type="submit" class="btn btn-primary"><i class="fas fa-check-square"></i>SUBMIT</button>
                        <button type="reset" class="btn btn-warning"><i class="fas fa-undo"></i> RESET</button>

                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
