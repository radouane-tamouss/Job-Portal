<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right w-100-p justify-content-end">
       
        <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{asset('uploads/'.Auth::guard('admin')->user()->photo)}}" alt="" class="rounded-circle-custom">
                <div class="d-sm-none d-lg-inline-block">{{Auth::guard('admin')->user()->name}}</div>
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item has-icon" href="{{route('admin_profile')}}"><i class="far fa-user"></i> Edit Profile</a></li>
                <li><a class="dropdown-item has-icon text-danger" href="{{route('admin_logout')}}"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
            
            
            
            
            {{-- <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{asset('uploads/'.Auth::guard('admin')->user()->photo)}}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">{{Auth::guard('admin')->user()->name}}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{route('admin_profile')}}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Edit Profile
                </a>
                <a href="{{route('admin_logout')}}" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div> --}}
        </li>
    </ul>
</nav> 