@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Laporan</div>
                <div class="card-body">
                    <div style="float: left; width: 100%;">
                        <h4>User List (Column 1)</h4>
                        @foreach($users->chunk(ceil($users->count() / 1))[0] as $user)
                            <p>ID: {{ $user->id }}</p>
                            <p>Name: {{ $user->name }}</p>
                            <p>Email: {{ $user->email }}</p>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        @foreach($telat as $lambat)
                                        @if ($lambat->user_id == $user->user_id)

                                        <td>Jumlah Terlambat :  {{$lambat->late_count}}</td>
                                        @endif
                                        @endforeach

                                        @foreach ($sakit as $sak)
                                        @if ($sak->user_id == $user->user_id)
                                        <td>Jumlah Sakit : {{ $sak->sick_count }}</td>
                                        @endif
                                        @endforeach

                                        @foreach ($cuti as $cut)
                                            @if ($cut->user_id == $user->user_id)
                                            <td>Jumlah Cuti : {{ $cut->cuti_count }}</td>
                                            @endif
                                        @endforeach

                                        @foreach ($pulangcepat as $pc)
                                            @if ($pc->user_id == $user->user_id)
                                                <td>Jumlah Pulang Cepat : {{ $pc->fast_count }}</td>
                                            @endif
                                        @endforeach

                                        @foreach ($dinas as $din)
                                            @if ($din->user_id == $user->user_id)
                                                <td>Jumlah Dinas Luar : {{ $din->dinas_count }}</td>
                                            @endif
                                        @endforeach

                                        @foreach ($rapat as $r)
                                            @if ($r->user_id == $user->user_id)
                                                <td>Jumlah Rapat Dinas : {{ $r->rapat_Count }}</td>
                                            @endif
                                        @endforeach

                                        @foreach ($train as $t)
                                            @if ($t->user_id == $user->user_id)
                                                <td>Jumlah melakukan training/workshop : {{$t->train_count}}</td>
                                            @endif
                                        @endforeach

                                        @foreach ($tidakabspulang as $tab)
                                            @if ($tab->user_id == $user->user_id)
                                                <td>tidak absen pulang{{$tab->tab_count}}</td>
                                            @endif
                                        @endforeach


                                    </tr>
                                </tbody>
                            </table>
                            <hr>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
