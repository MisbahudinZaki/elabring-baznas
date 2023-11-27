@extends('layouts.app')
@section('content')
    <body style="background: lightgray">
        <div class="container">
            <div class="row">
                <div class="col-md-md">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('absenpulang.update', $absen->id)}}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
