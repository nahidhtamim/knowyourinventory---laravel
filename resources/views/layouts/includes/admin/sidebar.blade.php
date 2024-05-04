<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>KYI</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{Auth::user()->name}}</h6>
                <span>
                    @if(Auth::user()->is_admin == '1')
                    Admin
                    @else
                    Customer
                    @endif
                </span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{route('admin.dashboard')}}" class="nav-item nav-link {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

            <a href="{{route('admin.templates')}}" class="nav-item nav-link {{ Route::currentRouteName() == 'admin.templates' ? 'active' : '' }}"><i class="fa fa-file me-2"></i>Template</a>

            <a href="{{route('admin.pages')}}" class="nav-item nav-link {{ Route::currentRouteName() == 'admin.pages' ? 'active' : '' }}"><i class="fa fa-file-alt me-2"></i>Page</a>

            <a href="{{route('admin.users')}}" class="nav-item nav-link {{ Route::currentRouteName() == 'admin.users' ? 'active' : '' }}"><i class="fa fa-user me-2"></i>Users</a>

            <a href="{{route('admin.web.contents')}}" class="nav-item nav-link {{ Route::currentRouteName() == 'admin.web.contents' ? 'active' : '' }}"><i class="fa fa-file-word me-2"></i>Web Contents</a>

            <a href="{{route('admin.texts')}}" class="nav-item nav-link {{ Route::currentRouteName() == 'admin.texts' ? 'active' : '' }}"><i class="fa fa-font me-2"></i>Texts</a>

            <a href="{{route('admin.plans')}}" class="nav-item nav-link {{ Route::currentRouteName() == 'admin.plans' ? 'active' : '' }}"><i class="fa fa-dollar-sign me-2"></i>Plans</a>
        </div>
    </nav>
</div>