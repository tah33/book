<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Traits\ImageStore;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class BookController extends Controller
{
    use ImageStore;

    public function index()
    {
        try {
            $data = [
                'books' => Book::with('category','author')->latest()->paginate(15)
            ];
            return view('backend.book.index', $data);
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong','Error');
            return back();
        }
    }

    public function create()
    {
        try {
            $data = [
                'categories' => Category::where('status',1)->get(),
                'authors'    => Author::where('status',1)->get(),
            ];
            return view('backend.book.form', $data);
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong','Error');
            return back();
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'category_id' => 'required',
            'author_id' => 'required',
        ]);
        try {
            $image = $this->saveImage('book-' . uniqid() . '.png', $request->image, 'uploads/image/', $request->image);

            Book::create([
                'title' => $request->title,
                'price' => $request->price,
                'stock' => $request->stock,
                'category_id' => $request->category_id,
                'author_id' => $request->author_id,
                'status' => $request->status,
                'image' => $image,
            ]);
            Toastr::success('Book Created Successfully :)', 'Success!!');
            return redirect()->route('book.index');
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong','Error!!');
            return back();
        }
    }

    public function show(Book $book)
    {
        //
    }

    public function edit($id)
    {
        try {
            $data = [
                'categories' => Category::where('status',1)->get(),
                'authors'    => Author::where('status',1)->get(),
                'book'    => Book::find($id),
            ];
            return view('backend.book.form', $data);
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong','Error!!');
            return back();
        }
    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'category_id' => 'required',
            'author_id' => 'required',
        ]);
        try {
            $book = Book::find($id);
            $image = $this->saveImage('book-' . uniqid() . '.png', $request->image, 'uploads/image/', $book->image);

            $book->update([
                'title' => $request->title,
                'price' => $request->price,
                'stock' => $request->stock,
                'category_id' => $request->category_id,
                'author_id' => $request->author_id,
                'status' => $request->status,
                'image' => $image,
            ]);
            Toastr::success('Book Updated Successfully :)', 'Success!!');
            return redirect()->route('book.index');
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong','Error!!');
            return back();
        }
    }

    public function destroy($id)
    {
        try {
            $book = Book::find($id);
            $this->deleteImage($book->image);
            $book->delete();
            Toastr::success('Book Deleted Successfully :)', 'Success!!');
            return redirect()->route('book.index');
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong','Error!!');
            return back();
        }
    }

    public function stockModify(Request $request)
    {
        try {
            $book = Book::find($request->id);
            if ($request->type == 'add')
            {
                $book->stock += $request->quantity;
            }
            else{
                $book->stock -= $request->quantity;
            }
            $book->save();

            Toastr::success('Stock Modified Successfully :)', 'Success!!');
            return back();
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong','Error!!');
            return back();
        }
    }
}
