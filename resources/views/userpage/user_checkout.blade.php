@extends('user_master')
@section('user_content')

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a>
                    <a href="./shop.html">Shop</a>
                    <span>Check Out</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Shopping Cart Section Begin -->
<section class="checkout-section spad">
    <div class="container">
        <form action="#" class="checkout-form">
            <div class="row">
                <div class="col-lg-6">
                    <div class="checkout-content">
                        <a href="{{url('login')}}" class="content-btn">Click Here To Login</a>
                    </div>
                    <h4>Biiling Details</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="fir">Name<span>*</span></label>
                            <input type="text" value="{{Auth::user()->user_name}}" id="fir">
                        </div>
                        <div class="col-lg-12">
                            <label for="street">Address<span>*</span></label>
                            <input type="text" id="street" value="{{Auth::user()->address}}" class="street-first">
                        </div>
                        <div class="col-lg-12">
                            <label for="phone">Phone<span>*</span></label>
                            <input type="text" value="{{Auth::user()->phone}}" id="phone">
                        </div>
                        <div class="col-lg-12">
                            <div class="create-item">
                                <label for="acc-create">
                                    Create an account?
                                    <input type="checkbox" id="acc-create">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="checkout-content">
                        <input type="text" placeholder="Enter Your Coupon Code">
                    </div>
                    <div class="place-order">
                        <h4>Your Order</h4>
                        <div class="order-total">
                            <ul class="order-table">
                                    <li>Product <span>Total</span></li>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach($data as $cart)
                                    <li class="fw-normal">{{$cart->product_name}} x {{$cart->quantity}} <span>{{$cart->quantity * $cart->price}}</span></li>
                                    @php
                                        $total += $cart->quantity * $cart->price;
                                    @endphp
                                @endforeach
                                    <li class="total-price">Total: <span>{{ $total }}</span></li>
                            </ul>
                            <div class="payment-check">
                                <div class="pc-item">
                                    <label for="pc-check">
                                        Cheque Payment
                                        <input type="checkbox" id="pc-check">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="pc-item">
                                    <label for="pc-paypal">
                                        Paypal
                                        <input type="checkbox" id="pc-paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="order-btn">
                                <button type="submit" class="site-btn place-btn">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- Shopping Cart Section End -->

@endsection