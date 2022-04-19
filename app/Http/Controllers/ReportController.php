<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Brian2694\Toastr\Facades\Toastr;

class ReportController extends Controller
{
    public function salesReport()
    {
        try {
            $data = [
                'orders' => Order::with('user')->where('delivery_status',2)->latest()->get()
            ];
            return view('backend.report.sales_report', $data);
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong','Error!!');
            return back();
        }
    }
}
