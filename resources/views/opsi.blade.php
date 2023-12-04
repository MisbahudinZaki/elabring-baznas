@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Laporan</div>
                <div class="card-body">
                    <h5>Telat</h5>
                    @foreach ($terlambat as $telat)
                        <p>User no : {{ $telat->user_id }}, Jumlah Terlambat : {{$telat->late_count}}</p>
                    @endforeach

                    <br>

                    <h5>sakit</h5>
                    @foreach ($sakit as $sick)
                        <p>User no :  {{ $sick->user_id }}, Jumlah Sakit : {{$sick->sick_count}}</p>
                    @endforeach



                </div>
            </div>
        </div>
    </div>
</div>

@endsection
