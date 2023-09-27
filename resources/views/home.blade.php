@extends('layouts.app')
@extends('sidebar')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{route('cetak')}}" class="btn btn-primary"><i class="fas fa-regular fa-print"></i>cetak</a>
            <div class="card">
                <div class="card-header">Anda login sebagai: <b>{{Auth::user()->status}}</b></div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                            <th scope="col">NAMA</th>
                            <th scope="col">TANGGAL</th>
                            <th scope="col">KETERANGAN</th>
                            <th scope="col">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($absensi as $abs)
                                <tr>
                                    <td>{{$abs->nama_pegawai}}</td>
                                    <td>{{$abs->tanggal_pegawai}}</td>
                                    <td>{{$abs->keterangan_pegawai}}</td>
                                    <td><a href="{{route('absen.show', $abs->id)}}" class="btn btn-md btn-primary"><i class="far fa-eye"></i> view</a></td>
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
