@extends('website.layouts.default')

@section('content')
@php
use App\Models\Order;
$pendingOrdersCount = Order::where('status', 'pending')->count();
$deliveredOrdersCount = Order::where('status', 'delivered')->count();
$completedOrdersCount = Order::where('status', 'completed')->count();
$returnOrdersCount = Order::where('status', 'return')->count();
@endphp


<div class="container-fluid px-4">
    <h3 class="text-center">Order Status</h3>
    <div class="row g-3 my-2">
        <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2">{{ $pendingOrdersCount }}</h3>
                    <p class="fs-5">Pending</p>
                </div>
                <i class="fas fa-gift fs-1 border rounded bg-warning p-3"></i>
            </div>
        </div>
        <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2">{{$deliveredOrdersCount}}</h3>
                    <p class="fs-5">Delivered</p>
                </div>
                <i class="fas fa-gift border rounded fs-1 bg-info p-3"></i>
            </div>
        </div>
        <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2">{{$completedOrdersCount}}</h3>
                    <p class="fs-5">Completed</p>
                </div>
                <i class="fas fa-gift fs-1 border rounded bg-success p-3"></i>
            </div>
        </div>
        <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    {{-- <h3 class="fs-2">{{$totalDonor}}</h3> --}}
                    <h3 class="fs-2">{{$returnOrdersCount}}</h3>
                    <p class="fs-5">Return</p>
                </div>
                <i class="fas fa-gift fs-1 border rounded bg-danger  p-3"></i>
            </div>
        </div>

   
    </div>


</div>
@endsection
