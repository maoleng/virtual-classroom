@extends('theme.master')

@section('body')
    <div class="rbt-breadcrumb-default ptb--100 ptb_md--50 ptb_sm--30 bg-gradient-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h2 class="title">Checkout</h2>
                        <ul class="page-list">
                            <li class="rbt-breadcrumb-item"><a href="index.html">Home</a></li>
                            <li>
                                <div class="icon-right"><i class="feather-chevron-right"></i></div>
                            </li>
                            <li class="rbt-breadcrumb-item active">Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area -->

    <div class="checkout_area bg-color-white rbt-section-gap">
        <div class="container">
            <div class="row g-5 checkout-form">

                <div class="col-lg-7">
                    <div class="col-12 mb--60">

                        <h4 class="checkout-title">Cart Total</h4>

                        <div class="checkout-cart-total">

                            <h4>Product <span>Total</span></h4>

                            <ul>
                                <li>{{ $course->name }} <span>{{ prettyPrice($course->price) }}</span></li>
                            </ul>

                            <p>VAT <span>{{ prettyPrice($course->price * 0.1) }}</span></p>

                            <h4 class="mt--30">Grand Total <span>{{ prettyPrice($course->lastPrice) }}</span></h4>

                        </div>

                    </div>
                </div>

                <div class="col-lg-5">
                    <form action="{{ route('checkout.process', ['course' => $course]) }}" method="post" class="col-12 mb--60">
                        @csrf
                        <h4 class="checkout-title">Payment Method</h4>
                        <div class="checkout-payment-method">
                            <div class="single-method">
                                <input type="radio" id="momo" name="payment_method" value="momo">
                                <label for="momo">Momo</label>
                                <p data-method="bank">Checkout through Momo.</p>
                            </div>

                            <div class="single-method">
                                <input type="radio" id="VNPAYQR" name="payment_method" value="VNPAYQR">
                                <label for="VNPAYQR">Scan VNPAYQR</label>
                                <p data-method="cash">Checkout through VNPAYQR.</p>
                            </div>

                            <div class="single-method">
                                <input type="radio" id="VNBANK" name="payment_method" value="VNBANK">
                                <label for="VNBANK">Local Bank or ATM Card</label>
                                <p data-method="cash">Checkout through local bank or ATM.</p>
                            </div>

                            <div class="single-method">
                                <input type="radio" id="INTCARD" name="payment_method" value="INTCARD">
                                <label for="INTCARD">INTCARD</label>
                                <p data-method="cash">Checkout through International Card.</p>
                            </div>

                            <div class="single-method">
                                <input name="is_accept" type="checkbox" id="accept_terms">
                                <label for="accept_terms">I’ve read and accept the terms &
                                    conditions</label>
                            </div>
                            @if($error = session()->get('error'))
                                <p>{{ $error }}</p>
                            @endif
                        </div>
                        <div class="plceholder-button mt--50">
                            <button class="rbt-btn btn-gradient hover-icon-reverse">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Checkout</span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    </span>
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="rbt-separator-mid">
        <div class="container">
            <hr class="rbt-separator m-0">
        </div>
    </div>
@endsection
