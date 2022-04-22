@extends('frontend.master')
@section('section')
    <div class="container-fluid book_section mb-5 pb-5">
        <div class="container">
            <div class="d-flex justify-content-between border-bottom mb-3">
                <h1 class="border-0">{{ auth()->user()->name }} Dashboard</h1>
                <img src="{{ asset(auth()->user()->image) }}" alt="user" width="200" height="200">
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="d-flex align-items-start">
                        <div class="nav flex-column nav-pills me-3 w-100" id="v-pills-tab" role="tablist"
                             aria-orientation="vertical">
                            <button class="nav-link active" id="v-pills-profile-tab" data-toggle="pill"
                                    data-target="#v-pills-orders" type="button" role="tab"
                                    aria-controls="v-pills-orders" aria-selected="false">Order History
                            </button>
                            <button class="nav-link" id="v-pills-profile-tab" data-toggle="pill"
                                    data-target="#v-pills-profile" type="button" role="tab"
                                    aria-controls="v-pills-profile" aria-selected="false">Edit Profile
                            </button>
                            <button class="nav-link" id="v-pills-password-tab" data-toggle="pill"
                                    data-target="#v-pills-password" type="button" role="tab"
                                    aria-controls="v-pills-password" aria-selected="false">Change Password
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade active show" id="v-pills-orders" role="tabpanel"
                             aria-labelledby="v-pills-orders-tab">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Invoice No</th>
                                    <th>Payment Type</th>
                                    <th>Subtotal</th>
                                    <th>Delivery Charge</th>
                                    <th>Total Payable</th>
                                    <th>Is Returned</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $key=> $order)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $order->invoice_no }}</td>
                                        <td>{{ $order->payment_type }}</td>
                                        <td><span class="symbol">৳</span> {{ number_format($order->sub_total,2) }}</td>
                                        <td><span class="symbol">৳</span> {{ number_format($order->delivery_charge,2) }}
                                        </td>
                                        <td><span class="symbol">৳</span> {{ number_format($order->total_payable,2) }}
                                        </td>
                                        <td>
                                            @if($order->returned)
                                                <div class="badge badge-success">Yes</div>
                                            @else
                                                <div class="badge badge-danger">No</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if(!$order->returnOrder()->exists())
                                                <a href="#" data-toggle="modal"
                                                   data-target="#return_order{{ $order->id }}">Return
                                                    Order</a>
                                                <div class="modal fade" id="return_order{{ $order->id }}" tabindex="-1"
                                                     role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                     aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Return Order</h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <form action="{{ route('request.return') }}"
                                                                      method="POST">@csrf
                                                                    <div class="row">
                                                                        <input type="hidden" value="{{ $order->id }}"
                                                                               name="order_id">
                                                                        <div class="col-lg-12 text-left">
                                                                            <div class="form-group">
                                                                                <label for="reason">Reason</label>
                                                                                <textarea class="form-control"
                                                                                          id="reason" name="reason"
                                                                                          placeholder="Enter Reason"
                                                                                          required></textarea>
                                                                            </div>
                                                                            <span
                                                                                class="text-danger">{{ $errors->first('reason') }}</span>
                                                                        </div>
                                                                        <div class="col-lg-12 text-right">
                                                                            <button type="submit" class="cart_btn">
                                                                                Submit
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                             aria-labelledby="v-pills-profile-tab">
                            <form action="{{ route('profile.update') }}" method="POST"
                                  enctype="multipart/form-data">@csrf
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                   placeholder="Enter Name" required value="{{ auth()->user()->name }}">
                                        </div>
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                   placeholder="Enter Email" required
                                                   value="{{ auth()->user()->email }}">
                                        </div>
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="tel" class="form-control" id="phone" name="phone"
                                                   placeholder="Enter Phone" required
                                                   value="{{ auth()->user()->phone }}">
                                        </div>
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="username"
                                                   placeholder="Enter Username" required
                                                   value="{{ auth()->user()->username }}">
                                        </div>
                                        <span class="text-danger">{{ $errors->first('username') }}</span>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" class="form-control" id="image" name="image">
                                        </div>
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    </div>
                                    <div class="col-lg-8 text-right">
                                        <button type="submit" class="cart_btn">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="v-pills-password" role="tabpanel"
                             aria-labelledby="v-pills-password-tab">
                            <form action="{{ route('profile.update') }}" method="POST">@csrf
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label for="old_password">Old Password</label>
                                            <input type="password" class="form-control" id="password"
                                                   name="old_password" placeholder="Enter Old Password" required>
                                        </div>
                                        <span class="text-danger">{{ $errors->first('old_password') }}</span>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label for="password">Old Password</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                   placeholder="Enter Password" required>
                                        </div>
                                        <span class="text-danger">{{ $errors->first('old_password') }}</span>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label for="password_confirmation">Confirm Password</label>
                                            <input type="password" class="form-control" id="password_confirmation"
                                                   name="password_confirmation" placeholder="Enter Password" required>
                                        </div>
                                        <span class="text-danger">{{ $errors->first('old_password') }}</span>
                                    </div>
                                    <div class="col-lg-8 text-right">
                                        <button type="submit" class="cart_btn">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
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
