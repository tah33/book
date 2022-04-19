<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {
        try {
            $data = [
                'departments' => ['cse', 'bba', 'eee']
            ];
            return view('frontend.home', $data);
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function dashboard()
    {
        try {
            if (auth()->user()->role_id == 1) {
                $data = [
                    'total_categories' => Category::where('status',1)->count(),
                    'total_authors' => Author::where('status',1)->count(),
                    'total_customers' => User::where('status',1)->where('role_id',2)->count(),
                    'total_books' => User::where('status',1)->where('role_id',2)->count(),
                    'total_order' => Order::where('delivery_status',2)->count(),
                    'total_sales' => Order::where('delivery_status',2)->sum('total_payable'),
                    'total_return' => Order::where('delivery_status',2)->whereHas('returnOrder',function ($query){
                        $query->where('is_reject',0)->where('status',1);
                    })->sum('total_payable'),
                ];
                return view('backend.home',$data);
            } elseif (auth()->user()->role_id == 2) {
                return view('frontend.home');
            }
            return redirect()->route('home');
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong','error');
            return back();
        }
    }

    public function statusUpdate($table,$id): \Illuminate\Http\RedirectResponse
    {
        try {
            DB::table($table)->where('id',$id)->update([
                'status' => 1
            ]);

            return back();
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong','error');
            return back();
        }
    }

    public function statusInactive($table,$id): \Illuminate\Http\RedirectResponse
    {
        try {
            DB::table($table)->where('id',$id)->update([
                'status' => 0
            ]);

            return back();
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong','error');
            return back();
        }
    }

    public function customer()
    {
        try {
            $data = [
                'customers' => User::where('role_id',2)->latest()->paginate(15)
            ];
            return view('backend.customer.index', $data);
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong','Error!!');
            return back();
        }
    }
}
