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
            <li class="{{ request()->is('categories') ? 'active' : '' }}"><a class="nav-link" href="{{ route('category.index') }}"><i class="fa fa-bars"></i> <span>Category</span></a></li>
            <li class="menu-header">Author</li>
            <li class="{{ request()->is('authors') ? 'active' : '' }}"><a class="nav-link" href="{{ route('author.index') }}"><i class="fa fa-user"></i> <span>Author</span></a></li>
            <li class="menu-header">Customer</li>
            <li class="{{ request()->is('customers') ? 'active' : '' }}"><a class="nav-link" href="{{ route('customer.index') }}"><i class="fa fa-user"></i> <span>Customers</span></a></li>
            <li class="menu-header">Book</li>
            <li class="{{ request()->is('books') ? 'active' : '' }}"><a class="nav-link" href="{{ route('book.index') }}"><i class="fa fa-book"></i> <span>Book</span></a></li>
            <li class="menu-header">Order</li>
            <li class="{{ request()->is('order-list') ? 'active' : '' }}"><a class="nav-link" href="{{ route('order.index') }}"><i class="fa fa-book"></i> <span>Order</span></a></li>
            <li class="menu-header">Return Order</li>
            <li class="{{ request()->is('return-order-list') ? 'active' : '' }}"><a class="nav-link" href="{{ route('return.index') }}"><i class="fa fa-backward"></i> <span>Return Order</span></a></li>
            <li class="menu-header">Report</li>
            <li class="{{ request()->is('sales-report') ? 'active' : '' }}"><a class="nav-link" href="{{ route('sales.report') }}"><i class="fa fa-cog"></i> <span>Sales Report</span></a></li>
            <li class="menu-header">Settings</li>
            <li class="{{ request()->is('settings') ? 'active' : '' }}"><a class="nav-link" href="{{ route('settings') }}"><i class="fa fa-cog"></i> <span>Settings</span></a></li>

        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="{{ url('/') }}" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Visit Website
            </a>
        </div>
    </aside>
</div>
