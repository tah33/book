<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Traits\ImageStore;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use ImageStore;

    //show category list
    public function index()
    {
        try {
            $data = [
                'categories' => Category::latest()->paginate(15)
            ];
            return view('backend.category.index', $data);
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong','error');
            return back();
        }
    }

    //save new category
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'title' => 'required'
        ]);
        try {
            $image = $this->saveImage('category-' . uniqid() . '.png', $request->image, 'uploads/image/', $request->image);

            Category::create([
                'title' => $request->title,
                'status' => $request->status,
                'image' => $image,
            ]);
            Toastr::success('Category Created Successfully :)', 'success');
            return redirect()->route('category.index');
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong','error');
            return back();
        }
    }

    //category info fill in form
    public function edit($id)
    {
        try {
            $data = [
                'categories' => Category::latest()->paginate(15),
                'category' => Category::find($id),
            ];
            return view('backend.category.index', $data);
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong','error');
            return back();
        }
    }

    //edit category
    public function update(Request $request,$id): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'title' => 'required'
        ]);

        try {
            $category = Category::find($id);
            $image = $this->saveImage('category-' . uniqid() . '.png', $request->image, 'uploads/image/', $category->image);
            $category->update([
                'title' => $request->title,
                'status' => $request->status,
                'image' => $image,
            ]);
            Toastr::success('Category Updated Successfully :)', 'success');
            return redirect()->route('category.index');
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong','error');
            return back();
        }
    }

    //delete category
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        try {
            $category = Category::find($id);
            $this->deleteImage($category->image);
            $category->delete();
            Toastr::success('Category Deleted Successfully :)', 'success');
            return redirect()->route('category.index');
        } catch (\Exception $e) {
            Toastr::error('Something Went Wrong','error');
            return back();
        }
    }
}
