<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('/') }}">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/') }}">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ request()->is('dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('dashboard') }}"><i class="fa fa-fire"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">Category</li>
            {{--<li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i> <span>Utilities</span></a>
                <ul class="dropdown-menu">
                    <li><a href="utilities-contact.html">Contact</a></li>
                    <li><a class="nav-link" href="utilities-invoice.html">Invoice</a></li>
                    <li><a href="utilities-subscribe.html">Subscribe</a></li>
                </ul>
            </li>--}}
            <li class="{{ request()->is('categories') ? 'active' : '' }}"><a class="nav-link" href="{{ route('category.index') }}"><i class="fa fa-bars"></i> <span>Category</span></a></li>
            <li class="menu-header">Author</li>
            <li class="{{ request()->is('authors') ? 'active' : '' }}"><a class="nav-link" href="{{ route('author.index') }}"><i class="fa fa-user"></i> <span>Author</span></a></li>
            <li class="menu-header">Book</li>
            <li class="{{ request()->is('books') ? 'active' : '' }}"><a class="nav-link" href="{{ route('book.index') }}"><i class="fa fa-book"></i> <span>Book</span></a></li>
            <li class="menu-header">Order</li>
            <li class="{{ request()->is('orders') ? 'active' : '' }}"><a class="nav-link" href="{{ route('order.index') }}"><i class="fa fa-book"></i> <span>Order</span></a></li>

        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>
