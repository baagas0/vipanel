@extends('layouts.app')
@section('content')
<div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
        <div class="card">
            <div class="card-header white">
                <h6> STATS </h6>
            </div>
            <div class="card-body p-0">
                <div class="lightSlider" data-item="6" data-item-xl="4" data-item-md="2" data-item-sm="1"
                    data-pause="7000" data-pager="false" data-auto="true" data-loop="true">
                    <div class="p-5 bg-primary text-white">
                        <h5 class="font-weight-normal s-14">Balance</h5>
                        <span
                            class="s-24 font-weight-lighter text-primary"></span>
                    </div>
                    <div class="p-5">
                        <h5 class="font-weight-normal s-14">Total Pesanan</h5>
                        <span class="s-24 font-weight-lighter light-green-text"></span>
                    </div>
                    <div class="p-5 light">
                        <h5 class="font-weight-normal s-14">Total Deposit</h5>
                        <span
                            class="s-24 font-weight-lighter text-primary"></span>
                    </div>
                    <div class="p-5">
                        <h5 class="font-weight-normal s-14">Total Pengeluaran</h5>
                        <span class="s-24 font-weight-lighter amber-text"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection