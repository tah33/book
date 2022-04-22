@extends('frontend.master')
@section('section')
    <div class="container-fluid book_section mb-5 pb-5">
        <div class="container">
            <div class="d-flex justify-content-between border-bottom mb-3">
                <h1 class="border-0">Choose Payment Method</h1>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <form action="{{ route('confirm.order') }}" method="POST">@csrf
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_type"
                                           id="bkash" value="bkash" checked>
                                    <label class="form-check-label" for="bkash">
                                        Bkash
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_type"
                                           id="rocket" value="rocket">
                                    <label class="form-check-label" for="rocket">
                                        Rocket
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_type"
                                           id="cod" value="cod">
                                    <label class="form-check-label" for="cod">
                                        Cash On Delivery
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-8 text-center mt-5">
                                <button type="submit" class="cart_btn">Confirm Order</button>
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
                    <div class="text-center">
                        <a href="{{ route('cart.lists') }}" class="cart_btn mr-3">Go
                            Back</a>
                        <a href="{{ route('address.page') }}" class="cart_btn mr-3">Place
                            Order</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="success_order" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <h4 class="text-success">Your Order Has Been Placed</h4>
                    <h4 class="mt-3"><strong><i>Thank You For Yor Purchase</i></strong></h4>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        @if(session()->has('show_modal'))
        $(document).ready(function () {
            $('#success_order').modal('show');
        })
        @endif
    </script>
@endpush
