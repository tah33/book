@extends('backend.master')
@section('content')
    <div class="section-header">
        <h1>Return Orders</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a
                    href="{{ route('return.index') }}">Return Order List</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Invoice No</th>
                                <th scope="col">User</th>
                                <th scope="col">Total Amount</th>
                                <th scope="col">Reason</th>
                                <th scope="col">Status</th>
                                <th scope="col">Is Reject</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($return_orders as $key=> $item)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>
                                        <a href="{{ route('order.show',$item->order->id) }}">{{ $item->order->invoice_no }}</a>
                                    </td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ round(@$item->order->total_payable,2) }} ৳</td>
                                    <td>{{ $item->reason }}</td>
                                    <td>
                                        @if($item->status == 0)
                                            <div class="badge badge-warning">Pending</div>
                                        @else
                                            <div class="badge badge-success">Approved</div>
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->is_reject == 0)
                                            <div class="badge badge-warning">No</div>
                                        @else
                                            <div class="badge badge-success">Yes</div>
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->is_reject == 0 && $item->status == 0)
                                            <a class="btn btn-success"
                                               href="{{ route('status.update',['table' => 'return_orders', 'id' => $item->id]) }}"><i
                                                    class="fas fa-check"></i></a>
                                            <a class="btn btn-info"
                                               href="{{ route('reject.return',$item->id) }}"><i
                                                    class="fas fa-times"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-right">
                        {{ $return_orders->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
