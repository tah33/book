<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Order;
use App\Models\Setting;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {
        try {
            $data = [
                'categories' => Category::where('status',1)->latest()->get(),
                'authors' => Author::where('status',1)->latest()->get(),
                'books' => Book::where('status',1)->latest()->take(15)->get()
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
                    'total_books' => Book::where('status',1)->count(),
                    'total_order' => Order::where('delivery_status',2)->count(),
                    'total_sales' => Order::where('delivery_status',2)->sum('total_payable'),
                    'total_return' => Order::where('delivery_status',2)->whereHas('returnOrder',function ($query){
                        $query->where('is_reject',0)->where('status',1);
                    })->sum('total_payable'),
                ];
                return view('backend.home',$data);
            } elseif (auth()->user()->role_id == 2) {
                $data = [
                    'orders' => Order::latest()->where('user_id',auth()->id())->get()
                ];
                return view('frontend.user',$data);
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
            Toastr::success('Status Updated Successfully','Success !!');
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

    //all books
    public function allBooks()
    {
        $data = [
            'books' => Book::where('status',1)->latest()->get()
        ];
        return view('frontend.all_books',$data);
    }

    //category wise books
    public function categoryBooks($id)
    {
        $data = [
            'books' => Book::where('status',1)->where('category_id',$id)->latest()->get()
        ];
        return view('frontend.all_books',$data);
    }

    //author wise books
    public function authorBooks($id)
    {
        $data = [
            'books' => Book::where('status',1)->where('author_id',$id)->latest()->get()
        ];
        return view('frontend.all_books',$data);
    }

    public function bookDetails($id)
    {
        $data = [
            'book' => Book::find($id)
        ];
        return view('frontend.book_details',$data);
    }

    public function searchBook(Request $request)
    {
        $data = [
            'books' => Book::where('title','like','%'.$request->value.'%')->orWhereHas('author',function ($query) use($request){
                $query->where('name','like','%'.$request->value.'%');
            })->get()
        ];
        return view('frontend.all_books',$data);
    }
}
