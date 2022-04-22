@extends('backend.master')
@section('content')
    <div class="section-header">
        <h1>Orders</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a
                    href="{{ route('order.index') }}">Order List</a></div>
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
                                <th scope="col">Payment Type</th>
                                <th scope="col">Payment Status</th>
                                <th scope="col">Total Payable</th>
                                <th scope="col">Delivery Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $key=> $item)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td><a href="{{ route('order.show',$item->id) }}">{{ $item->invoice_no }}</a></td>
                                    <td>{{ $item->user->email }}</td>
                                    <td>{{ $item->payment_type }}</td>
                                    <td>
                                        @if($item->payment_status == 0)
                                            <div class="badge badge-warning">Unpaid</div>
                                        @else
                                            <div class="badge badge-success">Paid</div>
                                        @endif
                                    </td>
                                    <td>{{ round(@$item->total_payable,2) }} ৳</td>
                                    <td>
                                        @if($item->delivery_status == 0)
                                            <div class="badge badge-warning">Pending</div>
                                        @elseif($item->delivery_status == 1)
                                            <div class="badge badge-primary">Confirmed</div>
                                        @else
                                            <div class="badge badge-success">Delivered</div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown d-inline">
                                            <button class="btn btn-primary dropdown-toggle" type="button"
                                                    id="dropdownMenuButton2"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-start">
                                                @if($item->delivery_status == 0)
                                                    <a class="dropdown-item has-icon"
                                                       href="{{ route('status.change',$item->id) }}"><i
                                                            class="fas fa-check"></i> Confirm</a>
                                                @else
                                                    <a class="dropdown-item has-icon"
                                                       href="{{ route('status.change',$item->id) }}"><i
                                                            class="fas fa-check"></i> Delivered</a>
                                                @endif
                                                <a class="dropdown-item has-icon"
                                                   href="{{ route('order.show',$item->id) }}"><i
                                                        class="fas fa-eye"></i> View</a>
                                            </div>
                                        </div>
                                        <form class="trash_form" action="{{ route('category.destroy',$item->id) }}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-right">
                        {{ $orders->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
