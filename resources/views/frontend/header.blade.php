<div class="container-fluid topbar_sec">
    <div class="container">
        {{--            Topbar--}}
        <div class="row">
            <div class="col-lg-2 d-flex justify-content-between">
                <a class="bar_color" href="javascript:void(0)"><i class="fa fa-bars"></i></a>
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
                <a href="{{ url('login') }}" class="login_btn mr-3">Login</a>
                <a href="#" class="bar_color d-inline-block mt-1"><i class="fa fa-shopping-cart"></i></a>
            </div>
        </div>
        {{--            Latest Products--}}
    </div>
</div>
