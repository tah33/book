@extends('frontend.master')
@section('section')
    <div class="container-fluid book_section">
        <div class="container">
            <div class="d-flex justify-content-between border-bottom mb-3">
                <h1 class="border-0">{{ count($books) }} Books Found</h1>
            </div>
            <div class="row">
                @foreach($books as $book)
                    <div class="col-lg-2 mb-3">
                        <div class="card">
                            <a href="{{ route('books.details',$book->id) }}">
                                <img class="card-img-top" height="250"
                                     src="{{ asset($book->image) }}"
                                     alt="Card image cap">
                                @if($book->stock == 0)
                                    <span class="badge badge-danger out_of_stock">Out Of Stock</span>
                                @endif
                            </a>
                            <div class="card-body text-left">
                                <h5 class="card-title"><a href="{{ route('books.details',$book->id) }}">{{ $book->title }}</a></h5>
                                <p class="card-text"><span class="symbol">৳</span> {{ round($book->price,2) }} </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
