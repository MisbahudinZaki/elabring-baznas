@extends('layouts.master')
@section('content')
    <body style="background: lightgray">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('keterangan.update', $keterangan->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Keterangan</label>
                                <input type="text" class="form-control @error('keterangan')
                                    is-invalid
                                @enderror" value="{{old('keterangan', $keterangan->keterangan)}}" name="keterangan" placeholder="keterangan">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Penjelasan</label>
                                <textarea name="" id="" cols="30" rows="10" class="form-control @error('keterangan_tambahan')
                                    is-invalid
                                @enderror" value="{{old('keterangan_tambahan')}}" name="keterangan_tambahan" placeholder="keterangan_tambahan">
                                </textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
