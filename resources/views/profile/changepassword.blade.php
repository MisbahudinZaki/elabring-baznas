@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ganti Password</div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{session('error')}}
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif

                        <form class="form-horizontal" method="post" action="{{route('changepassword')}}">
                        {{ csrf_field() }}

                        <div class="form-group{{$errors->has('current-password')?'has-error': ""}}">
                            <label for="new-password" class="col-md-4 control-label">Password Sekarang</label>

                            <div class="col-md-6">
                                <input type="password" name="current-password" id="current-password" required>
                                @if ($errors->has('current-password'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('current-password')}}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{$errors->has('new-password') ?' has-error' :""}}">
                        <label for="new-password" class="col-md-4 control-label">Password Baru</label>

                        <div class="col-md-6">
                            <input id="new-password" type="password" class="form-control" name="new-password" required>
                            @if ($errors->has('new-password'))
                            <span class="help-block">
                                <strong>{{$errors->first('new-password')}}</strong>
                            </span>
                        @endif
                        </div>
                        </div>

                        <div class="form=group">
                            <label for="new-password-confirm" class="col-md-4 control-label">Konfirmasi Password</label>
                            <div class="col-md-6">
                                <input id="new-password-confirm" type="password" class="form-control" name="new-password-confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset4">
                                <button type="submit" class="btn btn-primary">Ganti Password</button>
                            </div>
                            <a href="{{route('home')}}" class="btn btn-danger">kembali</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
