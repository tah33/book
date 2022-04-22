@extends('frontend.master')
@section('section')
    <div class="container-fluid book_section mb-5 pb-5">
        <div class="container">
            <div class="d-flex justify-content-between border-bottom mb-3">
                <h1 class="border-0">Add Shipping Address</h1>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <form action="{{ route('save.address') }}" method="POST">@csrf
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name"  name="name"  placeholder="Enter Name" required value="{{ @$billing_address->name }}">
                                </div>
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"  placeholder="Enter Email" required value="{{ @$billing_address->email }}">
                                </div>
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="tel" class="form-control" id="phone"  name="phone" placeholder="Enter Phone" required value="{{ @$billing_address->phone }}">
                                </div>
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="phone">Address</label>
                                    <input type="text" class="form-control" id="address"  name="address" placeholder="Enter Address" required value="{{ @$billing_address->address }}">
                                </div>
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            </div>
                            <div class="col-lg-8 text-right">
                                <button type="submit" class="cart_btn">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <table class="table table-bordered">
                        <tr>
                            <td>SubTotal</td>
                            <td>:</td>
                            <td><span class="symbol">৳</span> {{ number_format($carts->sum('sub_total'),2) }}</td>
                        </tr>
                        <tr>
                            <td>Delivery Charge</td>
                            <td>:</td>
                            <td><span class="symbol">৳</span> {{ number_format($setting->delivery_charge,2) }}</td>
                        </tr>
                        <tr>
                            <td>Total Amount</td>
                            <td>:</td>
                            <td><span
                                    class="symbol">৳</span> {{ number_format($setting->delivery_charge + $carts->sum('sub_total'),2) }}
                            </td>
                        </tr>
                    </table>
                    <div class="text-right">
                        <a href="{{ route('cart.lists') }}" class="cart_btn mr-3">Go
                            Back</a>
                        <a href="{{ route('payment.page') }}" class="cart_btn mr-3">Place
                            Order</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
