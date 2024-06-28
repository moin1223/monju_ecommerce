@extends('frontend.layouts.default')

@section('content')
    <div id="header" class="">
        <div class="container orderBoxContainer">
            {{-- <div class="bistarito">
                <a href="#" class="text-center">প্রোডাক্ট সম্পর্কে বিস্তারিত জানতে এইখানে
                    <span>ক্লিক করুন</span>
                </a>
            </div> --}}
            <div class="row row-cols-1 row-cols-lg-2 row-cols-md-2 row-cols-sm-2 g-2 g-lg-3">
                <!-- persional information -->
                <div class="col">
                    <p class="orderNote">
                        অর্ডারটি কনফার্ম করতে আপনার নাম, ঠিকানা, মোবাইল নাম্বার, লিখে
                        অর্ডার কনফার্ম করুন বাটনে ক্লিক করুন
                    </p>
                    @error('items')
                    <p class="text-danger">{{ $message }}</p>
                   @enderror
                    <form method="POST" action="{{ route('order.store') }}">
                        {{ csrf_field() }}
                    <!-- name  -->
                    <div class="d-block persionalInput">
                        <input type="text" name="name" id="name"  value="{{ old('name') ? old('name') : '' }}" required  placeholder="আপনার নাম" />
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </div>
                    <!-- address  -->
                    <div class="d-block persionalInput">
                        <input type="textarea" name="address" id="address " value="{{ old('address') ? old('address') : '' }}" required  placeholder="আপনার ঠিকানা" />
                        @error('address')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </div>
                    <!-- number  -->
                    <div class="d-block persionalInput">
                        <input type="number" name="mobile_no" id="number" value="{{ old('mobile_no') ? old('mobile_no') : '' }}" required  placeholder="মোবাইল নাম্বার" />
                        @error('mobile_no')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="d-block persionalInput">
                        <select name="delivery_charge" id="location">
                            <option value="120">ঢাকার বাইরে</option>
                            <option value="70">ঢাকার ভিতরে</option>
                        </select>
                    </div>
                        <!-- Hidden inputs for order items -->
                            <!-- Hidden inputs for cart subtotal and total -->
    <input type="hidden" name="cart_subtotal" id="cart_subtotal" value="0">
    <input type="hidden" name="cart_total" id="cart_total" value="0">
                        @foreach ($cart as $id => $details)
                        <input type="hidden" name="items[{{ $id }}][product_id]" value="{{ $id }}" class="hidden-product-id" data-id="{{ $id }}">
                        <input type="hidden" name="items[{{ $id }}][quantity]" value="{{ $details['quantity'] }}" class="hidden-quantity" data-id="{{ $id }}">
                        <input type="hidden" name="items[{{ $id }}][sub_total]" value="{{ $details['price'] * $details['quantity'] }}" class="hidden-subtotal" data-id="{{ $id }}">
                    @endforeach
                    <div class="d-block persionalInput">
                        <button>অর্ডার কনফার্ম করুন</button>
                    </div>
                </form>
                </div>
                <!-- persional information end  -->

                <!-- Order information -->
                <div class="col">
                    <h3 class="orderNote">আপনার অর্ডার</h3>

                    <div class="orderContainer">
                        <div class="orderDetails">
                            <h6>Products</h6>
                            <h6>Quantity</h6>
                            <h6>Sub Total</h6>
                            <h6>Action</h6>
                            <br />
                        </div>
                        @foreach ($cart as $id => $details)
                            <div class="orderDetails align-items-center product" data-price="{{ $details['price'] }}">
                                <span>{{ $details['name'] }}</span>
                                <div class="d-flex align-items-center orderBox">
                                    <span class="minus" data-id="{{ $id }}">-</span>
                                    <span class="currentQuantity">{{ $details['quantity'] }}</span>
                                    <span class="plus" data-id="{{ $id }}">+</span>
                                </div>
                                <span class="productSubtotal">৳{{ $details['price'] * $details['quantity'] }}</span>
                                <button class="d-flex">
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $id }}">
                                        <button type="submit"><i class="bi bi-archive-fill"> </i></button>
                                    </form>
                                </button>
                            </div>
                        @endforeach
                    </div>

                    <!-- cart total -->
                    <div id="orderCart">
                        <h4>Cart Total</h4>
                        <!-- subtotal -->
                        <div class="d-flex subtotal justify-content-between w-100 border-bottom">
                            <h6>Sub Total</h6>
                            <h6><span id="subtotal">৳ 0</span></h6>
                        </div>
                        <!-- shipping -->
                        <div class="d-flex subtotal justify-content-between w-100 border-bottom">
                            <h6>Estimated Shipping</h6>
                            <h6><span id="estimatedShipping">৳ 120</span></h6>
                        </div>
                        <!-- total -->
                        <div class="d-flex subtotal justify-content-between w-100 border-bottom">
                            <h6>Total</h6>
                            <h6><span id="total">৳ 0</span></h6>
                        </div>

                        <div class="d-flex mt-8 align-items-center">
                            <input type="radio" name="" id="" checked />
                            <span class="ml-4 cashDelivary">Cash on Delivery</span>
                        </div>
                    </div>
                </div>
       
                <!-- Order information end  -->
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function updateSubtotal() {
                let subtotal = 0;
                $('.product').each(function() {
                    const price = $(this).data('price');
                    const quantity = parseInt($(this).find('.currentQuantity').text());
                    const productSubtotal = price * quantity;
                    $(this).find('.productSubtotal').text('৳' + productSubtotal);
                    subtotal += productSubtotal;
                });
                $('#subtotal').text('৳' + subtotal);
                $('#cart_subtotal').val(subtotal);
                updateTotal();
            }
    
            function updateTotal() {
                const subtotal = parseInt($('#subtotal').text().replace('৳', ''));
                const shipping = parseInt($('#estimatedShipping').text().replace('৳', ''));
                const total = subtotal + shipping;
                $('#total').text('৳' + total);
                $('#cart_total').val(total);
            }
    
            function updateShipping() {
                const location = $('#location').val();
                const shippingCost = location === '70' ? 70 : 120;
                $('#estimatedShipping').text('৳' + shippingCost);
                updateTotal();
            }
    
            $('.plus').click(function() {
                var id = $(this).data('id');
                var quantityElement = $(this).siblings('.currentQuantity');
                var currentQuantity = parseInt(quantityElement.text());
    
                $.ajax({
                    url: '{{ route('cart.update') }}',
                    method: 'PUT',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        quantity: currentQuantity + 1
                    },
                    success: function(response) {
                        if (response.success) {
                            quantityElement.text(currentQuantity + 1);
                            updateSubtotal();
                        } else {
                            alert(response.message);
                        }
                    }
                });
            });
    
            $('.minus').click(function() {
                var id = $(this).data('id');
                var quantityElement = $(this).siblings('.currentQuantity');
                var currentQuantity = parseInt(quantityElement.text());
    
                if (currentQuantity > 1) {
                    $.ajax({
                        url: '{{ route('cart.update') }}',
                        method: 'PUT',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: id,
                            quantity: currentQuantity - 1
                        },
                        success: function(response) {
                            if (response.success) {
                                quantityElement.text(currentQuantity - 1);
                                updateSubtotal();
                            } else {
                                alert(response.message);
                            }
                        }
                    });
                }
            });
    
            $('#location').change(function() {
                updateShipping();
            });
    
            // Initialize totals on page load
            updateSubtotal();
            updateShipping();
        });
        
        
    </script>
    
@endsection
