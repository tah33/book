@extends('backend.master')
@section('content')
    <div class="section-header">
        <h1>Orders</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a
                    href="{{ route('sales.report') }}">Sales Report</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Sales Report</h4>
                    </div>
                    <div class="card-body">
                        <table border="0" cellspacing="5" cellpadding="5">
                            <tbody>
                            <tr>
                                <td>Minimum date:</td>
                                <td><input type="text" class="form-control" id="min" name="min"></td>
                                <td>Maximum date:</td>
                                <td><input type="text" class="form-control" id="max" name="max"></td>
                            </tr>
                            </tbody>
                        </table>
                        <table class="table table-striped" id="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Invoice No</th>
                                <th scope="col">User</th>
                                <th scope="col">Date</th>
                                <th scope="col">Total Payable</th>
                                <th scope="col">Is Returned</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $key=> $item)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td><a href="{{ route('order.show',$item->id) }}">{{ $item->invoice_no }}</a></td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('Y-m-d') }}</td>
                                    <td>{{ round(@$item->total_payable,2) }} ৳</td>
                                    <td>
                                        @if($item->Returned)
                                            <div class="badge badge-success">Yes</div>
                                        @else
                                            <div class="badge badge-danger">No</div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
