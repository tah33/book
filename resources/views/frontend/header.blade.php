<div class="container-fluid topbar_sec">
    <div class="container">
        {{--            Topbar--}}
        <div class="row">
            <div class="col-lg-2 d-flex justify-content-between">
                <div class="dropdown">
                    <button class="btn btn-secondary bar_color" type="button" id="dropdown_btn" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bars"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdown_btn">
                        @foreach($sidebar_categories as $category)
                            <a class="dropdown-item" href="{{ route('category.books',$category->id) }}">{{ $category->title }}</a>
                        @endforeach
                    </div>
                </div>

                <a href="{{ url('/') }}"><img src="{{ asset($setting->logo) }}" alt="logo" width="100" height="50"></a>
            </div>
            <div class="col-lg-8 d-flex justify-content-center">
                <form action="{{ route('search.book') }}" method="POST">@csrf
                    <div class="input-group search_btn">
                        <input type="text" class="form-control" name="value"
                               placeholder="Enter Book Name/Author Name to Search Books">
                        <div class="input-group-append">
                            <button type="submit" class="input-group-text"><i
                                    class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-2 d-flex justify-content-end">
                @if(auth()->check())
                    <a href="{{ url('login') }}" class="login_btn mr-3">Dashboard</a>
                    <a href="{{ route('logout') }}" class="login_btn mr-3" onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @else
                    <a href="{{ url('dashboard') }}" class="login_btn mr-3">Login</a>
                @endif
                <a href="{{ route('cart.lists') }}" class="bar_color d-inline-block mt-1"><i
                        class="fa fa-shopping-cart"></i><span class="cart_number">{{ count($carts) }}</span></a>
            </div>
        </div>
        {{--            Latest Products--}}
    </div>
</div>
