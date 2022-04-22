@extends('frontend.master')
@section('section')
    <div class="container-fluid book_section mb-5 pb-5">
        <div class="container">
            <div class="d-flex justify-content-between border-bottom mb-3">
                <h1 class="border-0">{{ count($carts) }} Item Found</h1>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <form action="{{ route('cart.update') }}" method="POST">@csrf
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Book</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>SubTotal</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($carts as $key=> $cart)
                                <tr>
                                    <td><input type="hidden" name="id[]" value="{{ $cart->id }}">{{ $key+1 }}</td>
                                    <td><img src="{{ $cart->book->image }}" alt="{{ $cart->book->title }}" width="60" height="60"></td>
                                    <td>{{ $cart->book->title }}</td>
                                    <td><span class="symbol">৳</span> {{ number_format($cart->price,2) }}</td>
                                    <td>
                                        <div class="input-group">
                                              <span class="input-group-btn">
                                                  <button type="button" class="btn btn-default btn-number"
                                                          data-type="minus" data-stock="{{ $cart->book->stock }}" data-field="quantity[{{$key}}]">
                                                      <span class="fa fa-minus"></span>
                                                  </button>
                                              </span>
                                            <input type="text" name="quantity[{{$key}}]"
                                                   class="form-control input-number"
                                                   value="{{ $cart->quantity }}" min="1" max="10">
                                            <span class="input-group-btn">
                                              <button type="button" class="btn btn-default btn-number" data-type="plus"
                                                      data-field="quantity[{{$key}}]" data-stock="{{ $cart->book->stock }}">
                                                  <span class="fa fa-plus"></span>
                                              </button>
                                        </span>
                                        </div>
                                    </td>
                                    <td><span class="symbol">৳</span> {{ number_format($cart->sub_total,2) }}</td>
                                    <td><a class="cart_btn" href="{{ route('cart.destroy',$cart->id) }}"><i class="fa fa-trash"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-right">
                            <button type="submit" class="cart_btn mr-3">Save</button>
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
                        <a href="{{ url('/') }}" class="cart_btn mr-3">Go
                            Back</a>
                        <a href="{{ route('address.page') }}" class="cart_btn mr-3">Place
                            Order</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function (){
            $(document).on('click','.btn-number',function (){
                let type = $(this).data('type');
                let stock = $(this).data('stock');
                let selector = $(this).closest('tr').find('.input-number');
                let value = selector.val();
                if(type == 'plus')
                {
                    if(value < stock)
                    {
                        value++;
                        selector.val(value);
                    }
                }
                else{
                    if(value > 1)
                    {
                        value--;
                        selector.val(value);
                    }
                }
            })
        })
    </script>
@endpush
