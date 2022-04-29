@extends('frontend.master')
@section('section')
    <div class="container-fluid book_section">
        <div class="container">
            <div class="d-flex justify-content-between border-bottom mb-3">
                <h1 class="border-0">Latest Books</h1>
                <a class="all_books" href="{{ route('all.books') }}">All Books <i class="fa fa-arrow-right"></i></a>
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
                                <h5 class="card-title"><a
                                        href="{{ route('books.details',$book->id) }}">{{ $book->title }}</a></h5>
                                <p class="card-text"><span class="symbol">৳</span> {{ round($book->price,2) }} </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{--    //category section()--}}
    <div class="container-fluid book_section">
        <div class="container">
            <h1 class="mt-2 mb-4">Latest Categories</h1>
            <div class="card-deck">
                <div class="row text-center">
                    @foreach($categories as $category)
                        <div class="col-lg-2 mb-3">
                            <a href="{{ route('category.books',$category->id) }}"><img
                                    src="{{ asset($category->image) }}" alt="{{ $category->title }}" width="200"
                                    height="150"></a>
                            <a class="image_title"
                               href="{{ route('category.books',$category->id) }}">{{ $category->title }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{--    author section--}}
    <div class="container-fluid book_section">
        <div class="container">
            <h1 class="mt-2 mb-4">Popular Authors</h1>
            <div class="card-deck">
                <div class="row text-center">
                    @foreach($authors as $author)
                        <div class="col-lg-2 mb-3">
                            <a href="{{ route('author.books',$author->id) }}"><img src="{{ asset($author->image) }}"
                                                                                   alt="{{ $author->name }}" width="200"
                                                                                   height="150"></a>
                            <a class="image_title"
                               href="{{ route('author.books',$author->id) }}">{{ $author->name }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{--    about us--}}
    <div class="container-fluid book_section">
        <div class="container">
            <h1 class="mt-2 mb-4">About Us</h1>
            <div class="row">
                <div class="col-lg-12 text-left">
                    <p class="about_us">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquid autem dicta itaque
                        molestiae nemo neque porro reiciendis sint! Adipisci architecto at blanditiis consequatur,
                        corporis dicta dolores ducimus ea earum facere labore magni maxime, neque odit quis sapiente,
                        tempore! Alias at distinctio error explicabo hic, itaque molestias odit officia quam quas? Est
                        facere odit omnis reiciendis repellat tempora! Ad architecto, commodi corporis dolores eos
                        fugiat impedit labore officiis sint vel! Consequuntur, cumque eveniet exercitationem fugiat in,
                        iure laborum modi necessitatibus, possimus quia rerum sint veritatis? Commodi ducimus ipsam
                        molestiae nihil nulla quia quis voluptatum. Animi deserunt dolorum eveniet reprehenderit
                        temporibus.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
