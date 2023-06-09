<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin_home') }}">Panel Admin</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin_home') }}"></a>
        </div>

        <ul class="sidebar-menu">
            <li class="{{ Request::is('admin/home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_home') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Tableau de bord">
                    <i class="fas fa-chart-pie"></i>
                    <span>Tableau de bord</span>
                </a>
            </li>

            <li class="nav-item dropdown {{ Request::is('admin/home-page') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-cog"></i>
                    <span>Paramètres de page</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="active">
                        <a class="nav-link" href="{{ route('admin_home_page') }}">
                            <i class="fas fa-angle-right"></i> Page d'accueil
                        </a>
                    </li>
                    <li class="">
                        <a class="nav-link" href="">
                            <i class="fas fa-angle-right"></i> Conditions
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('admin/job-category/*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-briefcase"></i>
                    <span>Section Emploi</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="active">
                        <a class="nav-link" href="{{ route('admin_job_category') }}">
                            <i class="fas fa-briefcase m-1"></i> Catégorie d'emploi
                        </a>
                    </li>
                    <li class="">
                        <a class="nav-link" href="{{ route('admin_job_location') }}">
                            <i class="fas fa-map-marker-alt m-1"></i> Lieu d'emploi
                        </a>
                    </li>
                    <li class="">
                        <a class="nav-link" href="{{ route('admin_job_type') }}">
                            <i class="fas fa-tools m-1"></i> Type d'emploi
                        </a>
                    </li>
                    <li class="">
                        <a class="nav-link" href="{{ route('admin_job_experience') }}">
                            <i class="fas fa-user-clock m-1"></i> Expérience d'emploi
                        </a>
                    </li>
                    <li class="">
                        <a class="nav-link" href="{{ route('admin_job_salary_range') }}">
                            <i class="fas fa-user-clock m-1"></i> Échelle salariale
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('admin/company-category/*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-building"></i>
                    <span>Section Entreprise</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="">
                        <a class="nav-link" href="{{ route('admin_company_location') }}">
                            <i class="fas fa-map-marker-alt m-1"></i> Lieu de l'entreprise
                        </a>
                    </li>
                    <li class="">
                        <a class="nav-link" href="{{ route('admin_company_industry') }}">
                            <i class="fas fa-industry m-1"></i> Secteur d'activité
                        </a>
                    </li>
                    <li class="">
                        <a class="nav-link" href="{{ route('admin_company_size') }}">
                            <i class="fas fa-size m-1"></i> Taille de l'entreprise
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('admin/post/*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-newspaper"></i>
                    <span>Section Blog</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/post/view') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin_post') }}">
                            <i class="fas fa-newspaper m-1"></i> Tous les articles
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ Request::is('admin/all-subscribers')||Request::is('admin/subscriber-send-email') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-users"></i>
                    <span>Section Abonnés</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/all-subscribers') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin-all-subscribers') }}">
                            <i class="fas fa-map-marker-alt m-1"></i> Tous les abonnés
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/subscriber-send-email') ? 'active' : '' }}">
                        <a class="na}}v-link" href="{{ route('admin-subscriber-send-email') }}">
                            <i class="fas fa-envelope m-1"></i> Envoyer un e-mail aux abonnés
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('admin/package/*') ? 'active' : '' }}">
                <a href="{{ route('admin_package') }}" class="nav-link" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Packages">
                    <i class="fas fa-dollar-sign"></i>
                    <span>Forfait</span>
                </a>
            </li>

            {{-- <li class=""><a class="nav-link" href="setting.html" 
                data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Setting"
                ><i class="fas fa-hand-point-right"></i> <span>Job Category</span></a></li> --}}

        </ul>
    </aside>
</div>
