@extends('layouts.app')
@section('tab')
<div class="row justify-content-between">
    <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
        <li>
            <a class="nav-link" href="{{ route('deposit') }}"><i class="icon icon-plus"></i>Deposit</a>
        </li>
        <li>
            <a class="nav-link active" href="{{ route('deposit.history') }}"><i class="icon icon-home"></i>Deposits History</a>
        </li>
    </ul>
</div>
@endsection
@section('content')
<div class="container-fluid my-3">
    <div class="card no-b">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover data-tables">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tanggal & Waktu</th>
                            <th>Metode Deposit</th>
                            <th>Deposit</th>
                            <th>Diterima</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->created_at->format('d F Y H:i:s') }}</td>
                            <td>{{ $row->payment->name }}</td>
                            <td>Rp{{ number_format($row->amount) }}</td>
                            <td>Rp{{ number_format($row->amount_received) }}</td>
                            <td>

                                <span class="badge badge-{{ $row->badge }}">{{ $row->status }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tanggal & Waktu</th>
                            <th>Metode Deposit</th>
                            <th>Deposit</th>
                            <th>Diterima</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
