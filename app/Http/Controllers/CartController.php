<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        try {
            $data = [
                'carts' => Cart::where('user_id', auth()->id())->get()
            ];
            return view('frontend.carts', $data);
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong', 'Error');
            return back();
        }
    }

    public function store(Request $request)
    {
        try {

            $cart = Cart::where('user_id', auth()->id())->where('book_id', $request->book_id)->first();
            if ($cart) {
                $cart->quantity += 1;
                $cart->sub_total += $request->price;
                $cart->save();
            } else {
                Cart::create([
                    'user_id' => auth()->id(),
                    'book_id' => $request->book_id,
                    'quantity' => 1,
                    'price' => $request->price,
                    'discount' => 0,
                    'tax' => 0,
                    'delivery_charge' => 0,
                    'sub_total' => $request->price,
                ]);
            }

            Toastr::success('Added To Cart Successfully :)', 'Success!!');
            return back();
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong', 'Error!!');
            return back();
        }
    }


    public function update(Request $request)
    {
        try {
            foreach ($request->id as $key => $id) {
                $cart = Cart::find($id);
                if ($cart) {
                    $cart->quantity = $request->quantity[$key];
                    $cart->sub_total = $request->quantity[$key] * $cart->price;
                    $cart->save();
                }
            }
            Toastr::success('Cart Updated Successfully :)', 'Success!!');
            return back();
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong', 'Error!!');
            return back();
        }
    }

    public function destroy($id)
    {
        try {
            Cart::destroy($id);
            Toastr::success('Cart Removed Successfully :)', 'Success!!');
            return back();
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong', 'Error');
            return back();
        }
    }
}
