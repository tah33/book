<?php

namespace App\Http\Controllers;

use App\Models\ReturnOrder;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ReturnOrderController extends Controller
{
    public function index()
    {
        try {
            $data = [
                'return_orders' => ReturnOrder::with('order','user')->latest()->paginate(15)
            ];
            return view('backend.return_order.index', $data);
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong','Error!!');
            return back();
        }
    }

    public function requestStore(Request $request)
    {
        try {
            ReturnOrder::create([
                'user_id' => auth()->id(),
                'order_id' => $request->order_id,
                'reason' => $request->reason,
            ]);
            Toastr::success('Request Send Successfully','Success !!');
            return back();
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong','Error!!');
            return back();
        }
    }

    public function reject($id)
    {
        try {
            ReturnOrder::where('id',$id)->update(['is_reject' => 1]);
            Toastr::success('Requested Rejected Successfully','Success !!');
            return back();
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong','Error!!');
            return back();
        }
    }
}
