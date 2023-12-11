@extends('layouts.app')
@section('content')

<p class="text-center"><img style="width: 250px" src="gambar/Logo_baznas-removebg-preview.png" alt="logo baznas"></p>

<h1 class="text-center">ELABRING</h1>
<h2 class="text-center">Electronic Absensi Daring</h2>
<h3 class="text-center">Baznas Kabupaten Pasaman</h3>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-header">PROFIL KANTOR</div>
                    <div class="card-body">
                        <h3>Lembaga Pemerintahan Non Struktural yang bertanggungjawab dalam Pengelolaan Zakat di Wilayah Kabupaten Pasaman</h3>
                    </div>
            </div>
<br>
            <div class="card border-0 shadow rounded">
                <div class="card-header">Penambahan</div>
                    <div class="card-body">
                        <a href="{{route('keterangan.index')}}" class="btn btn-primary">Keterangan</a>
                    </div>
            </div>
        </div>
    </div>
</div>
<footer>
    BY MISBAHUDIN ZAKI
</footer>
@endsection
