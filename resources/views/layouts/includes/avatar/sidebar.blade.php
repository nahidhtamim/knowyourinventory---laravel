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
            <a href="{{route('home')}}" class="nav-item nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}"><i class="fa fa-tachometer-alt me-2"></i>Open To Buy</a>
            <a href="{{route('cycle.count')}}" class="nav-item nav-link {{ Route::currentRouteName() == 'cycle.count' ? 'active' : '' }}"><i class="fa fa-tachometer-alt me-2"></i>Cycle Count</a>
            <a href="{{route('tracking.twelve')}}" class="nav-item nav-link {{ Route::currentRouteName() == 'tracking.twelve' ? 'active' : '' }}"><i class="fa fa-tachometer-alt me-2"></i>12 Month Forecast</a>
        </div>
    </nav>
</div>