<div>
    <!-- Sidebar outter -->
    <div class="main-sidebar sidebar-style-2">
        <!-- sidebar wrapper -->
        <aside id="sidebar-wrapper">
            <!-- sidebar brand -->
            <div class="sidebar-brand">
                <a href="{{ route('welcome') }}">{{ config('app.name', 'Laravel') }}</a>
            </div>
            <!-- sidebar menu -->
            <ul class="sidebar-menu">
                <!-- menu header -->
                <li class="menu-header">General</li>
                <!-- menu item -->
                <li class="{{ Route::is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-fire"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                @hasrole('admin')
                <li class="menu-header">Main Menu</li>
                <li class="{{ Route::is('destinations') ? 'active' : '' }}">
                    <a href="{{ route('destinations.index') }}">
                        <i class="fas fa-map"></i>
                        <span>Destination</span>
                    </a>
                </li>

                <li class="{{ Route::is('categories') ? 'active' : '' }}">
                    <a href="{{ route('categories.index') }}">
                        <i class="fas fa-cubes"></i>
                        <span>Category</span>
                    </a>
                </li>

                <li class="{{ Route::is('beritas') ? 'active' : '' }}">
                    <a href="{{ route('beritas.index') }}">
                        <i class="fas fa-book"></i>
                        <span>Berita</span>
                    </a>
                </li>
                @endhasrole

                <li class="menu-header">Setting</li>
                <li class="{{ Route::is('profile') ? 'active' : '' }}">
                    <a href="{{ route('profile') }}">
                        <i class="fas fa-user"></i>
                        <span>Profile</span>
                    </a>
                </li>
            </ul>
        </aside>
    </div>
</div>
