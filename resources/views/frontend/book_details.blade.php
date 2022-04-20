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
                                <td>Title</td><td>:</td><td class="about_us">{{ $book->title }}</td>
                            </tr>
                            <tr>
                                <td>Author</td><td>:</td><td class="about_us">{{ @$book->author->name }}</td>
                            </tr>
                            <tr>
                                <td>Category</td><td>:</td><td class="about_us">{{ @$book->category->title }}</td>
                            </tr>
                            <tr>
                                <td>Rating</td><td>:</td><td ><div class="rateit" data-rateit-mode="font" data-rateit-value="2.5" data-rateit-readonly="true">
                                    </div></td>
                            </tr>
                            <tr>
                                <td>Price</td><td>:</td><td class="about_us"><span class="symbol">৳</span> {{ round($book->price,2) }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="{{ url('login') }}" class="cart_btn mr-3">Read Book</a>
                                    <a href="{{ url('login') }}" class="cart_btn mr-3">Add To Cart</a>
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
                            <button class="nav-link active" id="nav-specifications-tab" data-toggle="tab" data-target="#nav-specifications" type="button" role="tab" aria-controls="nav-specifications" aria-selected="true">Specifications</button>
                            <button class="nav-link" id="nav-review-tab" data-toggle="tab" data-target="#nav-review" type="button" role="tab" aria-controls="nav-review" aria-selected="false">Review</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-specifications" role="tabpanel" aria-labelledby="nav-specifications-tab">
                            <div class="row mt-3 ml-3">
                                <div class="col-lg-6">
                                    <table class="table">
                                        <tr>
                                            <td>Title</td><td>:</td><td class="about_us">{{ $book->title }}</td>
                                        </tr>
                                        <tr>
                                            <td>Author</td><td>:</td><td class="about_us">{{ @$book->author->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Publisher</td><td>:</td><td class="about_us">{{ @$book->publisher }}</td>
                                        </tr>
                                        <tr>
                                            <td>Country</td><td>:</td><td class="about_us"> {{ $book->country }}</td>
                                        </tr>
                                        <tr>
                                            <td>Language</td><td>:</td><td class="about_us"> {{ $book->language }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab">
                            <div class="row mt-3 ml-3">
                                <div class="col-lg-6">
                                    <form action="">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Feedback</label>
                                            <textarea name="comment" id="comment" cols="30" rows="5" class="form-control"></textarea>
                                        </div>
                                        <div class="rateit" data-rateit-mode="font" data-rateit-value="2.5" data-rateit-readonly="true">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-danger">Submit</button>
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
@endsection
