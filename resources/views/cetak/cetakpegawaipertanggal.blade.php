@extends('layouts.report')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Laporan</div>
                <div class="card-body">
                    <div style="float: left; width: 50%;">
                        <h4>User List</h4>
                        @foreach($users->chunk(ceil($users->count() / 2))[0] as $user)
                            <p>ID: {{ $user->id }}</p>
                            <p>Name: {{ $user->name }}</p>
                            <p>Email: {{ $user->email }}</p>

                            <table class="table table-bordered">
                                <tbody>
                                    <tr>

                                        @foreach ($hadir as $item)
                                            @if ($item->user_id == $user->user_id)
                                                <td>Total Kehadiran : {{ $item->hadir_count }}</td>
                                            @endif
                                        @endforeach

                                        @foreach ($pulangcepat as $pc)
                                            @if ($pc->user_id == $user->user_id)
                                            <td>Total Pulang Cepat : {{$pc->pc_count}}</td>
                                            @endif
                                        @endforeach

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

                                    </tr>
                                </tbody>
                            </table>
                            <hr>
                        @endforeach
                    </div>

                    <div style="float: right; width: 50%;">
                        <h4>User List (Column 2)</h4>
                        @foreach($users->chunk(ceil($users->count() / 2))[1] as $user)
                            <p>ID: {{ $user->id }}</p>
                            <p>Name: {{ $user->name }}</p>
                            <p>No Hp : {{$user->no_hp}}</p>
                            <hr>
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

                                    </tr>
                                </tbody>
                            </table>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
