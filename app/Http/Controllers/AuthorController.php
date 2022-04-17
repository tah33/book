<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Traits\ImageStore;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    use ImageStore;

    //show author list
    public function index()
    {
        try {
            $data = [
                'authors' => Author::latest()->paginate(15)
            ];
            return view('backend.author.index', $data);
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong','Error!!');
            return back();
        }
    }

    //save new author
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required'
        ]);
        try {
            $image = $this->saveImage('author-' . uniqid() . '.png', $request->image, 'uploads/image/', $request->image);

            Author::create([
                'name' => $request->name,
                'status' => $request->status,
                'image' => $image,
            ]);
            Toastr::success('Author Created Successfully :)', 'Success!!');
            return redirect()->route('author.index');
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong','Error!!');
            return back();
        }
    }

    //author info fill in form
    public function edit($id)
    {
        try {
            $data = [
                'authors' => Author::latest()->paginate(15),
                'author' => Author::find($id),
            ];
            return view('backend.author.index', $data);
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong','Error!!');
            return back();
        }
    }

    //edit author
    public function update(Request $request,$id): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required'
        ]);

        try {
            $author = Author::find($id);
            $image = $this->saveImage('author-' . uniqid() . '.png', $request->image, 'uploads/image/', $author->image);
            $author->update([
                'name' => $request->name,
                'status' => $request->status,
                'image' => $image,
            ]);
            Toastr::success('Author Updated Successfully :)', 'Success!!');
            return redirect()->route('author.index');
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong','Error!!');
            return back();
        }
    }

    //delete author
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        try {
            $author = Author::find($id);
            $this->deleteImage($author->image);
            $author->delete();
            Toastr::success('Author Deleted Successfully :)', 'Success!!');
            return redirect()->route('author.index');
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong','Error!!');
            return back();
        }
    }
}
