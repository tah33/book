<div class="card">
    @php
        $route = isset($author) ? route('author.update',$author->id) : route('author.store');
    @endphp

    <form method="POST" action="{{ $route }}" enctype="multipart/form-data">
        @csrf
        <div class="card-header">
            <h4>{{ isset($author) ? 'Edit' : 'Add' }} Author</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-lg-12">
                    <label for="name">Name <strong class="text-danger">*</strong></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Author Name"
                           value="{{ isset($author) ? $author->name : old('name') }}">
                    <span class="text-danger"> {{ $errors->first('name') }} </span>
                </div>
                <div class="form-group col-lg-12">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="form-group col-lg-12">
                    <label for="status">Status </label>
                    <select name="status" class="form-control" id="status">
                        <option value="1" {{ isset($author) && $author->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ isset($author) && $author->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-footer text-center">
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </form>
</div>
