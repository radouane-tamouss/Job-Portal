<ul class="list-group list-group-flush">
    <li class="list-group-item {{Request::is('candidate/dashboard') ? 'active' : ''}}">
        <a href="{{route('candidate_dashboard')}}"
            >Dashboard</a
        >
    </li>
    <li class="list-group-item">
        <a href="{{route('applied_jobs')}}"
            >Applied Jobs</a
        >
    </li>
    <li class="list-group-item {{Request::is('candidate/bookmarks') ? 'active' : ''}}">
        <a href="{{route('bookmarks')}}"
            >Bookmarked Jobs</a
        >
    </li>
    <li class="list-group-item {{Request::is('candidate/education/view') ? 'active' : ''}}">
        <a href="{{route('candidate_education')}}"
            >Education</a
        >
    </li>
    <li class="list-group-item {{Request::is('candidate/skills/view') ? 'active' : ''}}">
        <a href="{{route('candidate_skills')}}"
            >Skills</a
        >
    </li>
    <li class="list-group-item {{Request::is('candidate/experience/view') ? 'active' : ''}}">
        <a href="{{route('candidate_experience')}}"
            >experiences</a
        >
    </li>
    <li class="list-group-item">
        <a href="candidate-award.html">Awards</a>
    </li>
    <li class="list-group-item {{Request::is('candidate/edit-profile') ? 'active' : ''}}">
        <a href="{{route('candidate_edit_profile')}}"
            >Edit Profile</a
        >
    </li>
    <li class="list-group-item {{Request::is('candidate/edit-password') ? 'active' : ''}}">
        <a href="{{route('candidate_edit_password')}}">Edit Password</a
        >
    </li>
    <li class="list-group-item {{Request::is('candidate/resume/view') ? 'active' : ''}}">
        <a href="{{route('candidate_resume')}}"
            >Resumes</a
        >
    </li>
    <li class="list-group-item">
        <a href="{{route('candidate_logout')}}">Logout</a>
    </li>
</ul>