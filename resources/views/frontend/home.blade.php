@extends('frontend.master')
@section('section')
    <div class="container-fluid topbar_sec">
        <div class="container">
            {{--            Topbar--}}
            <div class="row">
                <div class="col-lg-2 d-flex justify-content-between">
                    <a class="bar_color" href="javascript:void(0)"><i class="fa fa-bars"></i></a>
                    <a href="javascript:void(0)"><img src="https://eboighar.com/frontend/assets/images/logo.svg"
                                                      alt="logo" width="200"></a>
                </div>
                <div class="col-lg-8 d-flex justify-content-center">
                    <div class="input-group search_btn">
                        <input type="text" class="form-control"
                               placeholder="Enter Book Name/Author Name to Search Books"
                               aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button type="submit" class="input-group-text" id="basic-addon2"><i
                                    class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 d-flex justify-content-end">
                    <a href="#" class="login_btn mr-3">Login/Sign Up</a>
                    <a href="#" class="bar_color d-inline-block mt-1"><i class="fa fa-shopping-cart"></i></a>
                </div>
            </div>
            {{--            Latest Products--}}
        </div>
    </div>
    <div class="container-fluid book_section">
        <div class="container">
            <h1 class="mt-2 mb-4">Latest Books</h1>
            <div class="card-deck">
                <div class="row">
                    <div class="col-lg-2 mb-3">
                        <div class="card">
                            <a href="">
                                <img class="card-img-top" height="250" src="{{ asset('assets/frontend/images/book1.jpg') }}"
                                     alt="Card image cap">
                            </a>
                            <div class="card-body text-left">
                                <h5 class="card-title"><a href="#">English Grammar</a></h5>
                                <p class="card-text"><span class="symbol">৳</span> {{ round(499.99,2) }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="card">
                            <a href="">
                                <img class="card-img-top" height="250" src="{{ asset('assets/frontend/images/book2.jpg') }}"
                                     alt="Card image cap">
                            </a>
                            <div class="card-body text-left">
                                <h5 class="card-title"><a href="#">Bangla Bekoron</a></h5>
                                <p class="card-text"><span class="symbol">৳</span> {{ round(499.99,2) }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="card">
                            <a href="">
                                <img class="card-img-top" height="250" src="{{ asset('assets/frontend/images/book3.jpg') }}"
                                     alt="Card image cap">
                            </a>
                            <div class="card-body text-left">
                                <h5 class="card-title"><a href="#">Learn Math in 30 Days</a></h5>
                                <p class="card-text"><span class="symbol">৳</span> {{ round(499.99,2) }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="card">
                            <a href="">
                                <img class="card-img-top" height="250" src="{{ asset('assets/frontend/images/book4.jpg') }}"
                                     alt="Card image cap">
                            </a>
                            <div class="card-body text-left">
                                <h5 class="card-title"><a href="#">Learn English in 30 Days</a></h5>
                                <p class="card-text"><span class="symbol">৳</span> {{ round(499.99,2) }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="card">
                            <a href="">
                                <img class="card-img-top" height="250"
                                     src="{{ asset('assets/frontend/images/book5.jpg') }}"
                                     alt="Card image cap">
                            </a>
                            <div class="card-body text-left">
                                <h5 class="card-title"><a href="#">Learn Grammar in 30 Days</a></h5>
                                <p class="card-text"><span class="symbol">৳</span> {{ round(499.99,2) }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="card">
                            <a href="">
                                <img class="card-img-top" height="250"
                                     src="{{ asset('assets/frontend/images/book6.png') }}"
                                     alt="Card image cap">
                            </a>
                            <div class="card-body text-left">
                                <h5 class="card-title"><a href="#">Learn Freelancing in 30 Days</a></h5>
                                <p class="card-text"><span class="symbol">৳</span> {{ round(499.99,2) }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="card">
                            <a href="">
                                <img class="card-img-top" height="250"
                                     src="{{ asset('assets/frontend/images/book7.jpg') }}"
                                     alt="Card image cap">
                            </a>
                            <div class="card-body text-left">
                                <h5 class="card-title"><a href="#">The Caring Wife</a></h5>
                                <p class="card-text"><span class="symbol">৳</span> {{ round(499.99,2) }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="card">
                            <a href="">
                                <img class="card-img-top" height="250"
                                     src="{{ asset('assets/frontend/images/book1.jpg') }}"
                                     alt="Card image cap">
                            </a>
                            <div class="card-body text-left">
                                <h5 class="card-title"><a href="#">Harpers Illustrated Biochemistry</a></h5>
                                <p class="card-text"><span class="symbol">৳</span> {{ round(499.99,2) }} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid book_section">
        <div class="container">
            <h1 class="mt-2 mb-4">Latest Categories</h1>
            <div class="card-deck">
                <div class="row text-center">
                    <div class="col-lg-2 mb-3">
                        <img src="{{ asset('assets/frontend/images/cat.jpg') }}" alt="cat">
                        <a class="image_title" href="">Electronics</a>
                    </div>
                    <div class="col-lg-2 mb-3">
                        <img src="{{ asset('assets/frontend/images/cat.jpg') }}" alt="cat">
                        <a class="image_title" href="">Electronics</a>
                    </div>
                    <div class="col-lg-2 mb-3">
                        <img src="{{ asset('assets/frontend/images/cat.jpg') }}" alt="cat">
                        <a class="image_title" href="">Electronics</a>
                    </div>
                    <div class="col-lg-2 mb-3">
                        <img src="{{ asset('assets/frontend/images/cat.jpg') }}" alt="cat">
                        <a class="image_title" href="">Electronics</a>
                    </div>
                    <div class="col-lg-2 mb-3">
                        <img src="{{ asset('assets/frontend/images/cat.jpg') }}" alt="cat">
                        <a class="image_title" href="">Electronics</a>
                    </div>
                    <div class="col-lg-2 mb-3">
                        <img src="{{ asset('assets/frontend/images/cat.jpg') }}" alt="cat">
                        <a class="image_title" href="">Electronics</a>
                    </div>
                    <div class="col-lg-2 mb-3">
                        <img src="{{ asset('assets/frontend/images/cat.jpg') }}" alt="cat">
                        <a class="image_title" href="">Electronics</a>
                    </div>
                    <div class="col-lg-2 mb-3">
                        <img src="{{ asset('assets/frontend/images/cat.jpg') }}" alt="cat">
                        <a class="image_title" href="">Electronics</a>
                    </div>
                    <div class="col-lg-2 mb-3">
                        <img src="{{ asset('assets/frontend/images/cat.jpg') }}" alt="cat">
                        <a class="image_title" href="">Electronics</a>
                    </div>
                    <div class="col-lg-2 mb-3">
                        <img src="{{ asset('assets/frontend/images/cat.jpg') }}" alt="cat">
                        <a class="image_title" href="">Electronics</a>
                    </div>
                    <div class="col-lg-2 mb-3">
                        <img src="{{ asset('assets/frontend/images/cat.jpg') }}" alt="cat">
                        <a class="image_title" href="">Electronics</a>
                    </div>
                    <div class="col-lg-2 mb-3">
                        <img src="{{ asset('assets/frontend/images/cat.jpg') }}" alt="cat">
                        <a class="image_title" href="">Electronics</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid book_section">
        <div class="container">
            <h1 class="mt-2 mb-4">Popular Authors</h1>
            <div class="card-deck">
                <div class="row text-center">
                    <div class="col-lg-2 mb-3">
                        <img class="rounded-circle" src="{{ asset('assets/frontend/images/cat.jpg') }}" alt="cat">
                        <a class="image_title" href="">Electronics</a>
                    </div>
                    <div class="col-lg-2 mb-3">
                        <img class="rounded-circle" src="{{ asset('assets/frontend/images/cat.jpg') }}" alt="cat">
                        <a class="image_title" href="">Electronics</a>
                    </div>
                    <div class="col-lg-2 mb-3">
                        <img class="rounded-circle" src="{{ asset('assets/frontend/images/cat.jpg') }}" alt="cat">
                        <a class="image_title" href="">Electronics</a>
                    </div>
                    <div class="col-lg-2 mb-3">
                        <img class="rounded-circle" src="{{ asset('assets/frontend/images/cat.jpg') }}" alt="cat">
                        <a class="image_title" href="">Electronics</a>
                    </div>
                    <div class="col-lg-2 mb-3">
                        <img class="rounded-circle" src="{{ asset('assets/frontend/images/cat.jpg') }}" alt="cat">
                        <a class="image_title" href="">Electronics</a>
                    </div>
                    <div class="col-lg-2 mb-3">
                        <img class="rounded-circle" src="{{ asset('assets/frontend/images/cat.jpg') }}" alt="cat">
                        <a class="image_title" href="">Electronics</a>
                    </div>
                    <div class="col-lg-2 mb-3">
                        <img class="rounded-circle" src="{{ asset('assets/frontend/images/cat.jpg') }}" alt="cat">
                        <a class="image_title" href="">Electronics</a>
                    </div>
                    <div class="col-lg-2 mb-3">
                        <img class="rounded-circle" src="{{ asset('assets/frontend/images/cat.jpg') }}" alt="cat">
                        <a class="image_title" href="">Electronics</a>
                    </div>
                    <div class="col-lg-2 mb-3">
                        <img class="rounded-circle" src="{{ asset('assets/frontend/images/cat.jpg') }}" alt="cat">
                        <a class="image_title" href="">Electronics</a>
                    </div>
                    <div class="col-lg-2 mb-3">
                        <img class="rounded-circle" src="{{ asset('assets/frontend/images/cat.jpg') }}" alt="cat">
                        <a class="image_title" href="">Electronics</a>
                    </div>
                    <div class="col-lg-2 mb-3">
                        <img class="rounded-circle" src="{{ asset('assets/frontend/images/cat.jpg') }}" alt="cat">
                        <a class="image_title" href="">Electronics</a>
                    </div>
                    <div class="col-lg-2 mb-3">
                        <img class="rounded-circle" src="{{ asset('assets/frontend/images/cat.jpg') }}" alt="cat">
                        <a class="image_title" href="">Electronics</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
