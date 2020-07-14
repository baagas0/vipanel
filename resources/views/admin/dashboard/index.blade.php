@extends('layouts.app')
@section('content')
<div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
        <div class="card">
            <div class="card-header white">
                <h6> STATS </h6>
            </div>
            <div class="card-body p-0">
                <div class="lightSlider" data-item="6" data-item-xl="4" data-item-md="2" data-item-sm="1" data-pause="7000" data-pager="false" data-auto="true"
                data-loop="true">
                <div class="p-5 bg-primary text-white">
                    <h5 class="font-weight-normal s-14">Balance</h5>
                    <span class="s-24 font-weight-lighter text-primary">Rp{{ number_format($irvankede->data->balance, 2) }}</span>
                </div>
                <div class="p-5">
                    <h5 class="font-weight-normal s-14">Total User</h5>
                    <span class="s-24 font-weight-lighter light-green-text">{{ $user_total }}</span>
                </div>
                <div class="p-5 light">
                    <h5 class="font-weight-normal s-14">Total Deposit</h5>
                    <span class="s-24 font-weight-lighter text-primary">Rp{{ number_format($deposit_total, 2) }}</span>
                </div>
                <div class="p-5">
                    <h5 class="font-weight-normal s-14">Total Order</h5>
                    <span class="s-24 font-weight-lighter amber-text">{{ $order_total }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="card no-b">
        <div class="card-header white">
            <h6> Services </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Min</th>
                            <th>Max</th>
                            <th>Note</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Min</th>
                            <th>Max</th>
                            <th>Note</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('bottom')
<script>
    var table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        "ajax": {
            url: '{{ route('admin.api.services') }}',
            type:'POST',
            'headers': {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        },
        columns: [
        { data: 'id', name: 'id' },
        { data: 'category', name: 'category' },
        { data: 'name', name: 'name' },
        { data: 'price', name: 'price' },
        { data: 'min', name: 'min' },
        { data: 'max', name: 'max' },
        { data: 'note', name: 'note' },
        ],
    });

</script>
@endpush