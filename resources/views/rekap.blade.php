@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{route('cetak')}}" class="btn btn-primary">cetak</a>
            <div class="card">
                <div class="card-header">{{ __('Badan Amil Zakat Nasional Kabupaten Pasaman') }}</div>

                <div class="card-body">

                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                            <th scope="col">NAMA</th>
                            <th scope="col">TANGGAL</th>
                            <th scope="col">KETERANGAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($absensi as $abs)
                                <tr>
                                    <td>{{$abs->nama_pegawai}}</td>
                                    <td>{{$abs->tanggal_pegawai}}</td>
                                    <td>{{$abs->keterangan_pegawai}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$absensi->links()}}
                    <!--@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
