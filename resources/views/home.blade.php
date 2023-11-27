@extends('layouts.app')
@extends('sidebar')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{route('cetak-pegawai-form')}}" class="btn btn-primary"><i class="fas fa-regular fa-print"></i>cetak</a>

            <div class="card">
                <div class="card-header">Selamat datang <b>{{Auth::user()->name}}</b>, Anda login sebagai: <b>{{Auth::user()->status}}</b></div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td scope="row" width="200">Nama</td>
                                <td width="20">:</td>
                                <td>{{Auth::user()->name}}</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td>{{Auth::user()->jenis_kelamin}}</td>
                            </tr>

                            <tr>
                                <td>Tempat/Tanggal lahir</td>
                                <td>:</td>
                                <td>{{Auth::user()->tempat_lahir}} / {{Auth::user()->tanggal_lahir}}</td>
                            </tr>

                            <tr>
                                <td>Jabatan</td>
                                <td>:</td>
                                <td>{{Auth::user()->nama_jabatan}}</td>
                            </tr>

                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>{{Auth::user()->alamat_tinggal}}</td>
                            </tr>

                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>{{Auth::user()->email}}</td>
                            </tr>


                            <tr>
                                <td>No Hp</td>
                                <td>:</td>
                                <td>{{Auth::user()->no_hp}}</td>
                            </tr>


                        </tbody>




                    </table>
                </div>
            </div>


@endsection
