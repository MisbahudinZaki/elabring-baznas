@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Laporan</div>
                <div class="card-body">
                    <p>Total late status for User ID {{ $userId }}: {{ $totalLateStatus }}</p>



                </div>
            </div>
        </div>
    </div>
</div>

@endsection
