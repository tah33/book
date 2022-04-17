<div class="card">
    <div class="card-header">
        <h4>Purchase</h4>
        <div class="card-header-form">
            <a href="{{ route('book.create') }}" class="btn btn-primary float-right"><i
                    class="fa fa-plus"></i> Add New Book </a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Author</th>
                <th scope="col">Price</th>
                <th scope="col">Stock</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($books as $key=> $item)
                <tr>
                    <th scope="row">{{ $key+1 }}</th>
                    <td><img src="{{ asset($item->image) }}" width="60" alt="{{ $item->title }}"></td>
                    <td>{{ $item->title }}</td>
                    <td>{{ @$item->category->title }}</td>
                    <td>{{ @$item->author->name }}</td>
                    <td>{{ round(@$item->price,2) }} ৳</td>
                    <td>{{ $item->stock }}</td>
                    <td>
                        @if($item->status == 1)
                            <div class="badge badge-success">Published</div>
                        @else
                            <div class="badge badge-danger">Unpublished</div>
                        @endif
                    </td>
                    <td>
                        <div class="dropdown d-inline">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-start">
                                <a class="dropdown-item has-icon"
                                   href="#" data-toggle="modal" data-target="#stock_modify_{{ $item->id }}"><i
                                        class="fas fa-book"></i> Modify Stock</a>
                                @if($item->status == 0)
                                    <a class="dropdown-item has-icon"
                                       href="{{ route('status.update',['table' => 'books','id' => $item->id]) }}"><i
                                            class="fas fa-check"></i> Publish</a>
                                @endif
                                <a class="dropdown-item has-icon"
                                   href="{{ route('book.edit',$item->id) }}"><i
                                        class="fas fa-pencil-alt"></i> Edit</a>

                                <a class="dropdown-item has-icon trash_btn" href="#"><i
                                        class="fas fa-trash"></i> Delete</a>
                            </div>
                        </div>
                        <div class="modal fade" id="stock_modify_{{ $item->id }}" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Modify Stock</h5>
                                        <button type="button" class="close" aria-label="Close"
                                                onclick="closeModal('stock_modify_{{ $item->id }}')">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('stock.modify') }}" method="POST">@csrf
                                        <div class="modal-body">
                                            <input type="hidden" value="{{ $item->id }}" name="id">
                                            <div class="form-group col-lg-4">
                                                <label class="d-block">Type</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="inlineradio1"
                                                           value="add" name="type">
                                                    <label class="form-check-label mr-3"
                                                           for="inlineradio1">Increase</label>
                                                    <input class="form-check-input" type="radio" id="inlineradio2"
                                                           value="minus" name="type">
                                                    <label class="form-check-label" for="inlineradio2">Decrease</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <label for="quantity">Quantity <strong
                                                        class="text-danger">*</strong></label>
                                                <input type="number" class="form-control" id="quantity" name="quantity"
                                                       placeholder="Stock" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    onclick="closeModal('stock_modify_{{ $item->id }}')">Close
                                            </button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <form class="trash_form" action="{{ route('book.destroy',$item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer text-right">
        {{ $books->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>
