<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('customer_home') }}">Customer Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('customer_home') }}">CP</a>
        </div>

        <ul class="sidebar-menu">
            <li class="{{ Request::is('customer/home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('customer_home') }}">
                    <i class="fas fa-tachometer-alt"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="{{ Request::is('customer/order/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('customer_order_view') }}">
                    <i class="fas fa-box"></i> <span>My Orders</span>
                </a>
            </li>

            <li class="{{ Request::is('customer/edit-profile') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('customer_profile') }}">
                    <i class="fas fa-user-cog"></i> <span>Edit Profile</span>
                </a>
            </li>
        </ul>
    </aside>
</div>
