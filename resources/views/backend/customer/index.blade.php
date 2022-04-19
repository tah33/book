@extends('backend.master')
@section('content')
    <div class="section-header">
        <h1>Orders</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a
                    href="{{ route('customer.index') }}">Order List</a></div>
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
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Username</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($customers as $key=> $item)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td><img src="{{ $item->image }}" alt="{{ $item->name }}"></td>
                                    <td>{{ $item->name }}</td>
                                    <td><a href="mailto:{{ $item->email }}">{{ $item->email }}</a></td>
                                    <td>{{ $item->username }}</td>
                                    <td><a href="tel:{{ $item->phone }}">{{ $item->phone }}</a></td>
                                    <td>
                                        @if($item->status == 0)
                                            <div class="badge badge-danger">Inactive</div>
                                        @else
                                            <div class="badge badge-success">Active</div>
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
                                                @if($item->status == 0)
                                                    <a class="dropdown-item has-icon"
                                                       href="{{ route('status.update',['table' => 'users','id' => $item->id]) }}"><i
                                                            class="fas fa-check"></i> Active</a>
                                                @else
                                                    <a class="dropdown-item has-icon"
                                                       href="{{ route('status.inactive',['table' => 'users','id' => $item->id]) }}"><i
                                                            class="fas fa-times"></i> Inactive</a>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-right">
                        {{ $customers->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
