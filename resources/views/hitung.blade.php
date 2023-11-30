@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Laporan</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <div style="float: left; width: 100%;">
                            <h4>User List</h4>
                            <div style="float: left; width: 100%">
                                <h4>User List (Column 1)</h4>
                                @foreach($users->chunk(ceil($users->count() / 1))[0] as $user)
                                    <p>ID: {{ $user->id }}</p>
                                    <p>Name: {{ $user->name }}</p>
                                    <p>Email: {{ $user->email }}</p>
                                    <hr>
                                @endforeach
                            </div>


                            </div>

                            <p> {{ $hitung }} </p>
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
