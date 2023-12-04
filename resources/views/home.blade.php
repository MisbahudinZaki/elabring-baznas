@extends('layouts.app')
@extends('sidebar')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">Selamat datang <b>{{Auth::user()->name}}</b>, Anda login sebagai: <b>{{Auth::user()->status}}</b></div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                           <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td scope="row" width="200">Nama</td>
                                <td width="20">:</td>
                                <td>{{$user->name}}</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td>{{$user->jenis_kelamin}}</td>
                            </tr>

                            <tr>
                                <td>Tempat/Tanggal lahir</td>
                                <td>:</td>
                                <td>{{$user->tempat_lahir}} / {{$user->tanggal_lahir}}</td>
                            </tr>

                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>{{$user->alamat_tinggal}}</td>
                            </tr>

                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>{{$user->email}}</td>
                            </tr>


                            <tr>
                                <td>No Hp</td>
                                <td>:</td>
                                <td>{{$user->no_hp}}</td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>:</td>
                                <td><a href="{{route('user.edit', $user->id)}}" class="btn btn-primary">EDIT</a></td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


@endsection
