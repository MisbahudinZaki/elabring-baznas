@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Laporan</div>
                <div class="card-body">
                    <table class="table table-striped" border="1">
                            <h4>User List</h4>
                                <div style="float: left; width: 100%;">

                                    <table class="table table-striped">
                                        <thead class="table-dark">
                                            <th scope="col">Nama</th>
                                            <th scope="col">Terlambat</th>
                                            <th scope="col">Sakit</th>
                                            <th scope="col">Cuti</th>
                                            <th scope="col">Dinas</th>
                                            <th scope="col">Rapat</th>
                                            <th scope="col">Train</th>
                                            <th scope="col">Pulang Cepat</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{$user->name}}</td>

                                                    @foreach($telat as $lambat)
                                                    @if ($lambat->user_id == $user->user_id)

                                                    <td>{{$lambat->late_count}}</td>
                                                    @endif
                                                    @endforeach

                                                    @foreach ($sakit as $sak)
                                                    @if ($sak->user_id == $user->user_id)
                                                    <td>{{ $sak->sick_count }}</td>
                                                    @endif
                                                    @endforeach

                                                    @foreach($cuti as $cut)
                                                    @if ($cut->user_id == $user->user_id)


                                                    <td>{{$cut->cuti_count}}</td>
                                                    @endif
                                                    @endforeach
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>


  </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
