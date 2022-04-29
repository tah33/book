@extends('frontend.master')
@section('section')
    <div class="container-fluid book_section">
        <div class="container">
            <table class="table" width="100%">
                <tr>
                    <td>
                        <img class="card-img-top" height="250"
                             src="{{ asset($book->image) }}"
                             alt="Card image cap">
                    </td>
                    <td>
                        <table width="100%">
                            <tr>
                                <td>Title</td>
                                <td>:</td>
                                <td class="about_us">{{ $book->title }}</td>
                            </tr>
                            <tr>
                                <td>Author</td>
                                <td>:</td>
                                <td class="about_us">{{ @$book->author->name }}</td>
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td>:</td>
                                <td class="about_us">{{ @$book->category->title }}</td>
                            </tr>
                            <tr>
                                <td>Rating</td>
                                <td>:</td>
                                <td>
                                    <div class="rateit" data-rateit-mode="font"
                                         data-rateit-value="{{ $book->avg_rating }}" data-rateit-readonly="true"></div>
                                </td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td>:</td>
                                <td class="about_us"><span class="symbol">৳</span> {{ number_format($book->price,2) }}
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="d-flex">
                                        <a href="#" class="cart_btn mr-3" data-toggle="modal" data-target="#pdf_file">Read
                                            Book</a>
                                        @if(auth()->check() && $book->stack > 0)
                                            <form action="{{ route('cart.store') }}" method="POST">@csrf
                                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                                                <input type="hidden" name="price" value="{{ $book->price }}">
                                                <button type="submit" class="cart_btn mr-3">Add To Cart</button>
                                            </form>
                                        @endif
                                        @if($book->stack == 0 && auth()->user()->role_id == 2 && !$stock_request)
                                            <a href="{{ route('stock.request',$book->id) }}" class="cart_btn mr-3">Request For ReStock</a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <div class="row">
                <div class="col-lg-12">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-specifications-tab" data-toggle="tab"
                                    data-target="#nav-specifications" type="button" role="tab"
                                    aria-controls="nav-specifications" aria-selected="true">Specifications
                            </button>
                            <button class="nav-link" id="nav-review-tab" data-toggle="tab" data-target="#nav-review"
                                    type="button" role="tab" aria-controls="nav-review" aria-selected="false">Review
                            </button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-specifications" role="tabpanel"
                             aria-labelledby="nav-specifications-tab">
                            <div class="row mt-3 ml-3">
                                <div class="col-lg-6">
                                    <table class="table">
                                        <tr>
                                            <td>Title</td>
                                            <td>:</td>
                                            <td class="about_us">{{ $book->title }}</td>
                                        </tr>
                                        <tr>
                                            <td>Author</td>
                                            <td>:</td>
                                            <td class="about_us">{{ @$book->author->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Publisher</td>
                                            <td>:</td>
                                            <td class="about_us">{{ @$book->publisher }}</td>
                                        </tr>
                                        <tr>
                                            <td>Country</td>
                                            <td>:</td>
                                            <td class="about_us"> {{ $book->country }}</td>
                                        </tr>
                                        <tr>
                                            <td>Language</td>
                                            <td>:</td>
                                            <td class="about_us"> {{ $book->language }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab">
                            <h4 class="about_us mt-3">{{ count($book->reviews) }} Reviews Found</h4>
                            <table>
                                @foreach($book->reviews as $review)
                                    <tr>
                                        <td width="10%"><img src="{{ $review->user->image }}"
                                                             alt="{{ $review->user->name }}" width="50"></td>
                                        <td width="5%"></td>
                                        <td width="80%">
                                            <p class="mb-0">{{ $review->user->name }}</p>
                                            <div data-rate="{{ $review->rating }}" class="all_ratings"
                                                 id="rateYo_{{ $review->id }}"></div>
                                            <p>{{ $review->comment }}</p>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <h4 class="about_us">Write Your Own Feedback</h4>
                                    <form action="{{ route('review.store') }}" method="post">@csrf
                                        <input type="hidden" name="book_id" value="{{ $book->id }}">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="rate">
                                                    <input type="radio" id="star5" name="rate" value="5"/>
                                                    <label for="star5" title="text">5 stars</label>
                                                    <input type="radio" id="star4" name="rate" value="4"/>
                                                    <label for="star4" title="text">4 stars</label>
                                                    <input type="radio" id="star3" name="rate" value="3"/>
                                                    <label for="star3" title="text">3 stars</label>
                                                    <input type="radio" id="star2" name="rate" value="2"/>
                                                    <label for="star2" title="text">2 stars</label>
                                                    <input type="radio" id="star1" name="rate" value="1"/>
                                                    <label for="star1" title="text">1 star</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="about_us" for="exampleInputEmail1">Feedback</label>
                                                    <textarea name="comment" id="comment" cols="30" rows="5"
                                                              class="form-control" required></textarea>
                                                    <span class="text-danger">{{ $errors->first('comment') }}</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-danger">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="pdf_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ $book->title }}'s PDF File</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ $book->pdf }}" frameBorder="0"
                            style="width: 100%;height: 700px;border-width:0"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function () {
            $.each($('.all_ratings'), function () {
                $(this).rateYo({
                    rating: $(this).data('rate'),
                    readOnly: true,
                    starWidth: "20px"
                });
            })
        });
    </script>
@endpush
