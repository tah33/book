<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //order List
    public function index()
    {
        try {
            $data = [
                'orders' => Order::with('user')->latest()->paginate(15)
            ];
            return view('backend.order.index', $data);
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong','Error!!');
            return back();
        }
    }

    public function show($id)
    {
        try {
            $data = [
                'order' => Order::with('user','billingAddress')->find($id)
            ];
            return view('backend.order.show', $data);
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong','Error!!');
            return back();
        }
    }

    public function statusChange($id)
    {
        try {
            $order = Order::find($id);
            $order->delivery_status +=1;
            $order->save();

            return back();
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong','Error!!');
            return back();
        }
    }
}
