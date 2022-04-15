<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $data = [
            'departments' => ['cse','bba','eee']
        ];
        return view('frontend.home',$data);
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
}
