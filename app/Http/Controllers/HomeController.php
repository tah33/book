<?php

namespace App\Http\Controllers;

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
        if (auth()->user()->role_id == 1)
        {
            return view('backend.home');
        }
        elseif(auth()->user()->role_id == 2)
        {
            return view('frontend.home');
        }
        return redirect()->route('home');
    }

    public function statusUpdate($table,$id): \Illuminate\Http\RedirectResponse
    {
        try {
            DB::table($table)->where('id',$id)->update(['status' => 1]);
            return back();
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong','error');
            return back();
        }
    }
}
