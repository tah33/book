@extends('frontend.master')
@section('section')
    <section id="menu" class="menu">
        <div class="row">
            <div class="col-2 d-flex justify-content-center">
                <div class="mr-5">
                    <a href="javascript:void(0)" class="cart_btn"><i class="fa fa-bars"></i></a>
                </div>
                <div>
                    <a href="{{ route('home') }}"><img src="{{ asset('assets/frontend/images/logo.jpg') }}" alt="logo" width="60"></a>
                </div>
            </div>
            <div class="col-6 mt-2">
                <form class="form-row">
                    <div class="input-group">
                        <input type="text" class="form-control" id="validationDefaultUsername" placeholder="Search Book By Name/Author Name"
                               aria-describedby="inputGroupPrepend2" required>
                        <div class="input-group-prepend">
                            <button type="submit" class="input-group-text search_btn" id="inputGroupPrepend2"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-4 d-flex justify-content-center">
                <div class="mr-5">
                    <a class="cart_btn" href="#"><i class="fa fa-shopping-cart"></i></a>
                </div>
                <div>
                    <a href="{{ route('login') }}" class="btn btn-success">Login</a>
                </div>
            </div>
        </div>
    </section>

    <section class="about-area text-center section-padding" id="about_us">
        <div class="container">
            <div class="about">
                <h2>About us</h2>
                <img src="{{URL::asset('icons/about.png')}}" alt="about image" width="100px" height="100px">
                <p class="text-justify">At OCAS, we follow a very unique method towards providing Online Career
                    Advising.
                    We believe that the most important step towards finding ones' BEST SUITED career or course is to
                    first
                    find the Real Inherent Strength pattern in the individual.
                    This Real Inherent Strength pattern is mapped in terms of ones' Aptitude, Personality and Interest
                    profile using our proprietary MyTalent Psychometric Assessment.
                    This Assessment is an outcome of extensive Standadization and Validation process done on a large
                    population Students across
                    different economic conditions and geographies.
                    They then give their recommendations (which are there on their dashboard as well as in the form of
                    comprehensive reports) and
                    provide them with very comprehensive Online Career Advising.
                </p>
            </div>
        </div>
    </section>
    <section class="about-area text-center section-padding departments" id="categories" style="background-color:grey;">
        <div class="container">
            <div class="about">
                <h2>Departments</h2>
                <h3>Get Services For Below Departments</h3>
            </div>
            <div class="row">
                @foreach($departments as $department)
                    <a href="">
                        <div class="card" style="width: 25rem;">
                            <img class="rounded-circle" src="{{URL::asset('images/department/'.@$department->logo)}}"
                                 alt="Card image cap" height="50px" width="50px">
                            <div class="card-body">
                                <h5 class="card-title"><b>{{@$department->name}}</b></h5><br>
                                <h5 class="card-body"><b>({{@$department->slug}})</b></h5>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    <section class="Contuct-area text-center section-padding" id="contact_us">
        <div class="container">
            <div class="about">
                <h2>Contuct us</h2>
                <p>We Are Here to Help and Answer Any Question you Might Have.We look forward to hearing from you </p>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="about-contuct">
                        <div class="contuct-icon">
                            <a href=""><i class="fa fa-phone"></i></a>
                            <h3>Call us</h3>
                        </div>
                        <p>+88017984876854,01864553548</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="about-contuct">
                        <div class="contuct-icon">
                            <a href=""><i class="fa fa-map-marker"></i></a>
                            <h3>office location</h3>
                        </div>
                        <p>450/4,west Shawrapara,Dhaka</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="about-contuct">
                        <div class="contuct-icon">
                            <a href=""><i class="fa fa-envelope"></i></a>
                            <h3>Email</h3>
                        </div>
                        <p>info@ocas.com</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
