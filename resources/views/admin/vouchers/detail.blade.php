@extends('layouts.app')
@section('tab')
<div class="row justify-content-between">
    <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
        <li>
            <a class="nav-link" href="{{ route('admin.vouchers') }}"><i class="icon icon-home2"></i>All Vouchers</a>
        </li>
        <li>
            <a class="nav-link" href="{{ route('admin.vouchers.add') }}"><i class="icon icon-plus-circle"></i> Add
                Voucher</a>
        </li>
        <li>
            <a class="nav-link active" href="{{ route('admin.vouchers.detail',$data->id) }}"><i
                    class="icon icon-plus-circle"></i>Usage History</a>
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
                            <th>Code</th>
                            <th>Type</th>
                            <th>Min. Amount</th>
                            <th>Percent</th>
                            <th>Max. Discount</th>
                            <th>Amount</th>
                            <th>Quota</th>
                            <th>Expired At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Code</th>
                            <th>Type</th>
                            <th>Min. Amount</th>
                            <th>Percent</th>
                            <th>Max. Discount</th>
                            <th>Amount</th>
                            <th>Quota</th>
                            <th>Expired At</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
