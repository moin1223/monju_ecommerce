@extends('website.layouts.default')

@section('content-css2')
    <link rel="stylesheet" href="{{ asset('website/vendors/datatable/css/jquery.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/vendors/datatable/css/responsive.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/vendors/datatable/css/buttons.dataTables.min.css') }}" />
    <style>
        .order-info, .order-items {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
            border: 1px solid #ddd;
        }
        .order-info h3, .order-items h3 {
            margin-bottom: 20px;
            color: #b68ef7;
            border-bottom: 3px solid #b68ef7;
            display: inline-block;
            padding-bottom: 10px;
            font-weight: 700;
        }
        .order-info p, .order-items table th, .order-items table td {
            font-size: 16px;
            color: #333;
        }
        .order-info p strong {
            color: #b68ef7;
        }
        .order-items table th {
            background-color: #b68ef7;
            color: white;
            font-weight: 700;
        }
        .order-items table td {
            text-align: center;
            vertical-align: middle;
        }
        .order-items table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .order-items table {
            margin-top: 20px;
        }
        .order-items table .text-right {
            text-align: right;
        }
        .order-items table .total-row {
            font-weight: 700;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
                <div class="container">
                    <div class="row mt-5">
                        <!-- Order Information -->
                        <div class="col-lg-6 col-md-12 mb-4 order-info">
                            <h3>Order Information</h3>
                            <p><strong>Name:</strong> {{ $order->name }}</p>
                            <p><strong>Phone Number:</strong> {{ $order->mobile_no }}</p>
                            <p><strong>Address:</strong> {{ $order->address }}</p>
                            
                        </div>
                    
                        <!-- Order Items -->
                        <div class="col-lg-6 col-md-12 order-items">
                            <h3>Order Items</h3>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->items as $item)
                                        <tr>
                                            <td>{{ $item->product->product_name }}</td>
                                            <td>{{ $item->product->new_price }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->sub_total }}</td>
                                        </tr>
                                        @endforeach
                                        {{-- <tr>
                                            <td>Product 2</td>
                                            <td>$15.00</td>
                                            <td>1</td>
                                            <td>$15.00</td>
                                        </tr>
                                        <tr>
                                            <td>Product 3</td>
                                            <td>$5.00</td>
                                            <td>3</td>
                                            <td>$15.00</td>
                                        </tr> --}}
                                        <tr class="total-row">
                                            <td colspan="3" class="text-right"><strong>Total:</strong></td>
                                            <td><strong>{{ $order->sub_total }}</strong></td>
                                        </tr>
                                        <tr class="total-row">
                                            <td colspan="3" class="text-right"><strong>Delivery Charge:</strong></td>
                                            <td><strong>{{ $order->delivery_charge }}</strong></td>
                                        </tr>
                                        <tr class="total-row">
                                            <td colspan="3" class="text-right"><strong>Discount:</strong></td>
                                            <td><strong>{{ $order->discount }}</strong></td>
                                        </tr>
                                        <tr class="total-row">
                                            <td colspan="3" class="text-right"><strong>Grand Total:</strong></td>
                                            <td><strong>{{ $order->grand_total }}</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                        <!-- Form for updating discount and status -->
                        <div class="row mt-5">
                            <div class="col-lg-12 col-md-12 mb-4 order-info">
                                <h3>Update Order</h3>
                                <form method="POST" action="{{ route('order.update', $order->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="discount">Discount</label>
                                        <input type="number" name="discount" id="discount" class="form-control" value="{{ $order->discount }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                            <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                            <option value="return" {{ $order->status == 'return' ? 'selected' : '' }}>Return</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-4">
                                        <button type="submit" class="btn btn-primary">Update Order</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- End of update form -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content-js')
    <script src="{{ asset('website/vendors/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('website/vendors/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('website/vendors/datatable/js/dataTables.buttons.min.js') }}"></script>
@endsection
