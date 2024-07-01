{{-- @php
use App\Models\Order;
$orderId = $data['id'];
$order = Order::with(['items.product'])->findOrFail($orderId);
@endphp


<h1>{{$data['name']}}</h1>
<h1>{{$data['address']}}</h1>
<h1>{{$data['mobile_no']}}</h1>

<h4>Items:</h4>
<ul>
    @foreach ($order->items as $item)
        <li>
            Product: {{ $item->product->product_name }} <br>
            Quantity: {{ $item->quantity }} <br>
            Price: {{ $item->product->new_price }}
            Sub Total:{{ $item->product->sub_total }}
        </li>
    @endforeach

</ul>
<h3>Total:{{$data['sub_total']}}</h3>
<h3>Delivery Charge:{{$data['delivery_charge']}}</h3>
<h3>Grand Total:{{$data['grand_total']}}</h3> --}}
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Order Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .header,
        .footer {
            text-align: center;
            padding: 10px 0;
            background-color: #007BFF;
            color: #ffffff;
        }

        .content {
            padding: 20px;
        }

        h1,
        h4 {
            color: #333333;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }

        .total,
        .delivery-charge,
        .grand-total {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Order Details</h1>
        </div>
        <div class="content">
            @php
                use App\Models\Order;
                $orderId = $data['id']; // Replace this with the dynamic order ID if needed
                $order = Order::with(['items.product'])->findOrFail($orderId);
            @endphp

            <h1>{{ $data['name'] }}</h1>
            <p>Address: {{ $data['address'] }}</p>
            <p>Mobile No: {{ $data['mobile_no'] }}</p>

            <h4>Items:</h4>
            <ul>
                @foreach ($order->items as $item)
                    <li>
                        <p>Product: {{ $item->product->product_name }}</p>
                        <p>Quantity: {{ $item->quantity }}</p>
                        <p>Price: {{ $item->product->new_price }}</p>
                        <p>Sub Total: {{ $item->sub_total }}</p>
                    </li>
                @endforeach
            </ul>

            <p class="total">Total: {{ $data['sub_total'] }}</p>
            <p class="delivery-charge">Delivery Charge: {{ $data['delivery_charge'] }}</p>
            <p class="grand-total">Grand Total: {{ $data['grand_total'] }}</p>
        </div>
        <div class="footer">
            <p>Thank you for your order!</p>
        </div>
    </div>
</body>

</html>
