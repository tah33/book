@extends('backend.master')
@section('content')
    <div class="section-header">
        <h1>Books</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a
                    href="{{ route('book.index') }}">Category</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    @php
                        $route = isset($book) ? route('book.update',$book->id) : route('book.store');
                    @endphp

                    <form method="POST" action="{{ $route }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>{{ isset($book) ? 'Edit' : 'Add' }} Book</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="title">Title <strong class="text-danger">*</strong></label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                                           value="{{ isset($book) ? $book->title : old('title') }}">
                                    <span class="text-danger"> {{ $errors->first('title') }} </span>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="category_id">Category </label>
                                    <select name="category_id" class="form-control" id="category_id">
                                        @foreach($categories as $category)
                                            <option
                                                value="{{ $category->id }}" {{ isset($book) && $book->category_id == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger"> {{ $errors->first('category_id') }} </span>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="author_id">Author </label>
                                    <select name="author_id" class="form-control" id="author_id">
                                        @foreach($authors as $author)
                                            <option
                                                value="{{ $author->id }}" {{ isset($book) && $book->author_id == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger"> {{ $errors->first('author_id') }} </span>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="price">Price <strong class="text-danger">*</strong></label>
                                    <input type="number" step="any" class="form-control" id="price" name="price"
                                           placeholder="Price"
                                           value="{{ isset($book) ? $book->price : old('price') }}">
                                    <span class="text-danger"> {{ $errors->first('price') }} </span>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="stock">Stock <strong class="text-danger">*</strong></label>
                                    <input type="number" class="form-control" id="stock" name="stock"
                                           placeholder="Stock"
                                           value="{{ isset($book) ? $book->stock : old('stock') }}">
                                    <span class="text-danger"> {{ $errors->first('stock') }} </span>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="publisher">Publisher <strong class="text-danger">*</strong></label>
                                    <input type="text" class="form-control" id="publisher" name="publisher"
                                           placeholder="Publisher"
                                           value="{{ isset($book) ? $book->publisher : old('publisher') }}">
                                    <span class="text-danger"> {{ $errors->first('publisher') }} </span>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="country">Country <strong class="text-danger">*</strong></label>
                                    <input type="text" class="form-control" id="country" name="country"
                                           placeholder="Country"
                                           value="{{ isset($book) ? $book->country : old('country') }}">
                                    <span class="text-danger"> {{ $errors->first('country') }} </span>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="language">Language <strong class="text-danger">*</strong></label>
                                    <input type="text" class="form-control" id="language" name="language"
                                           placeholder="Language"
                                           value="{{ isset($book) ? $book->language : old('language') }}">
                                    <span class="text-danger"> {{ $errors->first('language') }} </span>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="max_page">Max Page Allow For Read <strong class="text-danger">*</strong></label>
                                    <input type="number" class="form-control" id="max_page" name="max_page"
                                           placeholder="e.g.10"
                                           value="{{ isset($book) ? $book->max_page : old('max_page') }}">
                                    <span class="text-danger"> {{ $errors->first('max_page') }} </span>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="pdf">PDF file</label>
                                    <input type="file" class="form-control" id="pdf" name="pdf">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="status">Status </label>
                                    <select name="status" class="form-control" id="status">
                                        <option value="1" {{ isset($book) && $book->status == 1 ? 'selected' : '' }}>
                                            Publish
                                        </option>
                                        <option value="0" {{ isset($book) && $book->status == 0 ? 'selected' : '' }}>
                                            Unpublish
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
