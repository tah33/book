<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($authors as $key=> $item)
                <tr>
                    <th scope="row">{{ $key+1 }}</th>
                    <td><img src="{{ asset($item->image) }}" width="60" alt="{{ $item->title }}"></td>
                    <td>{{ $item->name }}</td>
                    <td>
                        @if($item->status == 1)
                            <div class="badge badge-success">Active</div>
                        @else
                            <div class="badge badge-danger">Inactive</div>
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
                                   href="{{ route('author.edit',$item->id) }}"><i
                                        class="fas fa-pencil-alt"></i> Edit</a>

                                <a class="dropdown-item has-icon trash_btn" href="#"><i
                                        class="fas fa-trash"></i> Delete</a>
                            </div>
                        </div>
                        <form class="trash_form" action="{{ route('author.destroy',$item->id) }}" method="POST">
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
        {{ $authors->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>
