<?php

namespace App\Http\Controllers;

use App\Models\BillingAddress;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Setting;
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

    public function addressPage()
    {
        try {
            $data = [
                'carts' => Cart::where('user_id', auth()->id())->get(),
                'billing_address' => BillingAddress::where('user_id', auth()->id())->first(),
            ];
            return view('frontend.address_page', $data);
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong', 'Error');
            return back();
        }
    }

    public function saveAddress(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        try {
            BillingAddress::where('user_id', auth()->id())->delete();
            $request['user_id'] = auth()->id();

            BillingAddress::create($request->all());
            return back();
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong', 'Error');
            return back();
        }
    }

    public function paymentPage()
    {
        try {
            $data = [
                'carts' => Cart::where('user_id', auth()->id())->get(),
            ];
            return view('frontend.payment_page', $data);
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong', 'Error');
            return back();
        }
    }

    public function confirmOrder(Request $request)
    {
        $carts = Cart::where('user_id',auth()->id())->get();

        $setting = Setting::first();

        $delivery_charge = $setting && $setting->delivery_charge ? $setting->delivery_charge : 0;

        Order::create([
            'user_id' => auth()->id(),
            'billing_address_id' => @auth()->user()->billingAddress->id,
            'invoice_no' => 'IN-'.rand(),
            'payment_type' => $request->payment_type,
            'payment_status' => 1,
            'total_quantity' => $carts->sum('quantity'),
            'sub_total' => $carts->sum('sub_total'),
            'delivery_charge' => $delivery_charge,
            'total_amount' => $carts->sum('sub_total') + $delivery_charge,
            'total_payable' => $carts->sum('sub_total') + $delivery_charge
        ]);

        foreach ($carts as $cart) {
            $cart->delete();
        }

        session()->flash('show_modal');
        return redirect()->route('dashboard');
//        return back();
    }
}
