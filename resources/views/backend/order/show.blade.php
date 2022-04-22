@extends('backend.master')
@section('content')
    <div class="section-header">
        <h1>Invoice</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">Invoice</div>
        </div>
    </div>
    @if($order->delivery_status < 2)
        <div class="dropdown d-inline float-right">
            <button class="btn btn-primary dropdown-toggle" type="button"
                    id="dropdownMenuButton2"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Action
            </button>
            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-start">
                @if($order->delivery_status == 0)
                    <a class="dropdown-item has-icon"
                       href="{{ route('status.change',$order->id) }}"><i
                            class="fas fa-check"></i> Confirm</a>
                @else
                    <a class="dropdown-item has-icon"
                       href="{{ route('status.change',$order->id) }}"><i
                            class="fas fa-check"></i> Delivered</a>
                @endif
            </div>
        </div>
    @endif
    <div class="section-body bg-white p-5">
        <div class="invoice">
            <div id="invoice-print" class="invoice-print">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="invoice-title">
                            <h2>Invoice</h2>
                            <div class="invoice-number">{{ $order->invoice_no }}</div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <address>
                                    <strong>Billed To:</strong><br>
                                    {{ @$order->user->name }}<br>
                                    <a href="mailto:{{ @$order->user->email }}">{{ @$order->user->email }}</a><br>
                                    <a href="tel:{{ @$order->user->phone }}">{{ @$order->user->phone }}</a>
                                </address>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <address>
                                    <strong>Shipped To:</strong><br>
                                    {{ @$order->billingAddress->name }}<br>
                                    <a href="mailto:{{ @$order->billingAddress->email }}">{{ @$order->billingAddress->email }}</a><br>
                                    <a href="tel:{{ @$order->billingAddress->email }}">{{ @$order->billingAddress->phone }}</a>
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <address class="text-uppercase">
                                    <strong>Payment Method:</strong><br>
                                    {{ $order->payment_type }}
                                </address>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <address>
                                    <strong>Order Date:</strong><br>
                                    {{ \Carbon\Carbon::parse($order->created_at)->format('F d, Y') }}<br><br>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="section-title">Order Summary</div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-md">
                                <tbody>
                                <tr>
                                    <th data-width="40" style="width: 40px;">#</th>
                                    <th>Book</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-right">Totals</th>
                                </tr>
                                @foreach($order->orderDetails as $key=> $order_detail)
                                    <tr>
                                        <th data-width="40" style="width: 40px;">{{ $key+1 }}</th>
                                        <th>{{ @$order_detail->book->title }}</th>
                                        <th class="text-center">{{ round($order_detail->price,2) }} ৳</th>
                                        <th class="text-center">{{ $order_detail->quantity }}</th>
                                        <th class="text-right">{{ round($order_detail->price * $order_detail->quantity,2) }}
                                            ৳
                                        </th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row mt-4 justify-content-end">
                            <div class="col-lg-4 text-right">
                                <div class="invoice-detail-item">
                                    <div class="invoice-detail-name">Subtotal</div>
                                    <div class="invoice-detail-value"><h4>{{ round($order->sub_total,2) }} ৳</h4></div>
                                </div>
                                <div class="invoice-detail-item">
                                    <div class="invoice-detail-name">Delivery Charge</div>
                                    <div class="invoice-detail-value"><h4>{{ round($order->delivery_charge,2) }} ৳</h4></div>
                                </div>
                                <hr class="mt-2 mb-2">
                                <div class="invoice-detail-item">
                                    <div class="invoice-detail-name">Total</div>
                                    <div class="invoice-detail-value invoice-detail-value-lg">
                                        <h4>{{ round($order->total_payable,2) }} ৳</h4></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="text-md-right">
                <button class="btn btn-warning btn-icon icon-left print_btn"><i class="fas fa-print"></i> Print</button>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function () {
            $(document).on('click', '.print_btn', function () {
                printDiv();
            })
        });

        function printDiv() {
            var headstr = "<html><head><title></title></head><body>";
            var footstr = "</body>";
            var newstr = document.all.item('invoice-print').innerHTML;
            var oldstr = document.body.innerHTML;
            document.body.innerHTML = headstr + newstr + footstr;
            window.print();
            document.body.innerHTML = oldstr;
            return false;
        }
    </script>
@endpush
