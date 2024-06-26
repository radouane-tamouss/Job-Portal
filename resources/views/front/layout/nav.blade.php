<div class="navbar-area" id="stickymenu">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="/" class="logo">
            <img src="{{asset('uploads/logo.png')}}" alt="logo"/>
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('uploads/logo.png')}}" alt="" />
                </a>
                <div
                    class="collapse navbar-collapse mean-menu"
                    id="navbarSupportedContent"
                >
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ Request::is('/') ? 'active' : ''}}">
                        <a href="{{route('home')}}" class="nav-link">Accueil</a>
                    </li>
                    <li class="nav-item {{ Request::is('job-listing') ? 'active' : ''}}">
                        <a href="{{url('job-listing')}}" class="nav-link">Trouver des emplois</a>
                    </li>
                    <li class="nav-item {{ Request::is('company-listings') ? 'active' : ''}}">
                        <a href="{{url('company-listing')}}" class="nav-link">Entreprises</a>
                    </li>
                    <li class="nav-item {{ Request::is('pricing') ? 'active' : ''}}">
                        <a href="{{route('pricing')}}" class="nav-link">Offres et tarifs</a>
                    </li>
                    <li class="nav-item">
                        <a href="faq.html" class="nav-link">FAQ</a>
                    </li>
                    <li class="nav-item {{ Request::is('blog') ? 'active' : ''}}">
                        <a href="{{route('blog')}}" class="nav-link">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="contact.html" class="nav-link">Contact</a>
                    </li>
                </ul>
                </div>
            </nav>
        </div>
    </div>
</div>