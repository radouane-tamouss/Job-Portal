<ul class="list-group">
    <li class="list-group-item {{Request::is('candidate/dashboard') ? 'active' : ''}}">
        <a href="{{route('candidate_dashboard')}}">Tableau de bord</a>
    </li>
    <li class="list-group-item">
        <a href="{{route('applied_jobs')}}">Offres d'emploi postulées</a>
    </li>
    <li class="list-group-item {{Request::is('candidate/bookmarks') ? 'active' : ''}}">
        <a href="{{route('bookmarks')}}">Offres d'emploi enregistrées</a>
    </li>
    <li class="list-group-item {{Request::is('candidate/education/view') ? 'active' : ''}}">
        <a href="{{route('candidate_education')}}">Formation</a>
    </li>
    <li class="list-group-item {{Request::is('candidate/skills/view') ? 'active' : ''}}">
        <a href="{{route('candidate_skills')}}">Compétences</a>
    </li>
    <li class="list-group-item {{Request::is('candidate/experience/view') ? 'active' : ''}}">
        <a href="{{route('candidate_experience')}}">Expériences</a>
    </li>
    <li class="list-group-item">
        <a href="candidate-award.html">Récompenses</a>
    </li>
    <li class="list-group-item {{Request::is('candidate/edit-profile') ? 'active' : ''}}">
        <a href="{{route('candidate_edit_profile')}}">Modifier le profil</a>
    </li>
    <li class="list-group-item {{Request::is('candidate/edit-password') ? 'active' : ''}}">
        <a href="{{route('candidate_edit_password')}}">Modifier le mot de passe</a>
    </li>
    <li class="list-group-item {{Request::is('candidate/resume/view') ? 'active' : ''}}">
        <a href="{{route('candidate_resume')}}">Mes Documents</a>
    </li>
    <li class="list-group-item">
        <a href="{{route('candidate_logout')}}">Déconnexion</a>
    </li>
</ul>