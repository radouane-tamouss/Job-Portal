<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route('admin_home')}}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{route('admin_home')}}"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{ Request::is('admin/home') ? 'active' : ''}}"><a class="nav-link" href="{{route('admin_home')}}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Dashboard" ><i class="fas fa-chart-pie"></i> <span>Dashboard</span></a></li>

            <li class="nav-item dropdown {{ Request::is('admin/home-page') ? 'active' : ''}}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i><span>Page Settings</span></a>
                <ul class="dropdown-menu">
                    <li class="active"><a class="nav-link" href="{{route('admin_home_page')}}"><i class="fas fa-angle-right"></i>Home Page</a></li>
                    <li class=""><a class="nav-link" href=""><i class="fas fa-angle-right"></i>Terms</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('admin/job-category/*') ? 'active' : ''}}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-briefcase"></i><span>Job Section</span></a>
                <ul class="dropdown-menu">
                    <li class="active"><a class="nav-link" href="{{route('admin_job_category')}}"><i class="fas fa-briefcase"></i>Job Category</a></li>
                    <li class=""><a class="nav-link" href="{{route('admin_job_location')}}"><i class="fas fa-map-marker-alt"></i>Job Location</a></li>
                    <li class=""><a class="nav-link" href="{{route('admin_job_type')}}"><i class="fas fa-tools"></i>Job Type</a></li>

                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('admin/package/*') ? 'active' : ''}}">
                <a href="{{route('admin_package')}}" class="nav-link" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Packages"><i class="fas fa-briefcase"></i><span>Package</span></a>
            </li>

            {{-- <li class=""><a class="nav-link" href="setting.html" 
                data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Setting"
                ><i class="fas fa-hand-point-right"></i> <span>Job Category</span></a></li> --}}

  

        </ul>
    </aside>
</div>