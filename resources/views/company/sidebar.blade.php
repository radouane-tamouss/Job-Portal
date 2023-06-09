<ul class="list-group list-group-flush">
    <li class="list-group-item {{Request::is('company/dashboard') ? 'active' : ''}}">
        <a href="{{route('company_dashboard')}}">Tableau de bord</a>
    </li>
    <li class="list-group-item {{Request::is('company/make-payment') ? 'active' : ''}}">
        <a href="{{route('company_make_payment')}}">Effectuer un paiement</a>
    </li>
    <li class="list-group-item {{Request::is('company/orders') ? 'active' : ''}}">
        <a href="{{route('company_orders')}}">Commandes</a>
    </li>
    <li class="list-group-item {{Request::is('company/create-job') ? 'active' : ''}}">
        <a href="{{route('jobs_create')}}">Créer un emploi</a>
    </li><li class="list-group-item {{Request::is('company/jobs') ? 'active' : ''}}">
        <a href="{{route('company_jobs')}}">Tous les emplois</a>
    </li>
    <li class="list-group-item {{Request::is('company/photos') ? 'active' : ''}}">
        <a href="{{route('company_photos')}}">Photos</a>
    </li>
    <li class="list-group-item {{Request::is('company/videos') ? 'active' : ''}}">
        <a href="{{route('company_videos')}}">Vidéos</a>
    </li>
    <li class="list-group-item {{Request::is('company/candidate-applications') ? 'active' : ''}}">
        <a href="{{route('candidate_applications')}}">Candidatures des candidats</a>
    </li>
    <li class="list-group-item {{Request::is('company/edit-profile') ? 'active' : ''}}">
        <a href="{{route('company_edit_profile')}}">Modifier le profil</a>
    </li>
    <li class="list-group-item {{Request::is('company/edit-password') ? 'active' : ''}}">
        <a href="{{route('company_edit_password')}}">Modifier le mot de passe</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('company_logout')}}">Déconnexion</a>
    </li>
</ul>



