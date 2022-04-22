<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'rate' => 'required',
            'comment' => 'required',
        ]);
        try {
            Review::create([
                'user_id' => auth()->id(),
                'book_id' => $request->book_id,
                'rating' => $request->rate,
                'comment' => $request->comment,
            ]);
            Toastr::success('Review Added Successfully :)', 'Success!!');
            return back();
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong', 'Error!!');
            return back();
        }
    }
}
