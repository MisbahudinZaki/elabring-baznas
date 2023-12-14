@extends('layouts.master')
@section('content')

<body style="background: lightgray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('keterangan.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label class="font-weight-bold">Keterangan</label>
                            <input type="text" class="form-control @error('keterangan')
                                is-invalid
                            @enderror" value="{{old('keterangan')}}" name="keterangan" placeholder="keterangan">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Penjelasan</label>
                            <textarea name="" id="" cols="30" rows="10" class="form-control @error('keterangan_tambahan')
                                is-invalid
                            @enderror" value="{{old('keterangan_tambahan')}}" name="keterangan_tambahan" placeholder="keterangan_tambahan">
                            </textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="reset" class="btn btn-warning">reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
