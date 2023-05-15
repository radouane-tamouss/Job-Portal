@extends('front.layout.app')

@section('seo_title') 
    Candidate Resume
@endsection

@section('seo_meta_description') 
    Candidate Resume
@endsection

@section('main_content')
    
<div
class="page-top"
style="background-image: url('{{asset('uploads/banner.jpg')}}')"
>
<div class="bg"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Dashboard</h2>
        </div>
    </div>
</div>
</div>

<div class="page-content user-panel">
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-12">
            <div class="card">
                @include('company.sidebar')
            </div>
        </div>
        <div class="col-lg-9 col-md-12">
            <h4 class="resume">{{$candidate->name}} Profile</h4>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th class="w-200">Photo:</th>
                        <td>
                            <img
                                src="{{asset('uploads/'.$candidate->photo)}}"
                                alt="{{$candidate->name}}"
                                class="w-100"
                            />
                        </td>
                    </tr>
                    <tr>
                        <th>Name:</th>
                        <td>{{$candidate->name ?? 'N/A'}}</td>
                    </tr>
                    <tr>
                        <th>Designation:</th>
                        <td>{{$candidate->designation ?? 'N/A'}}</td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>{{$candidate->email ?? 'N/A'}}</td>
                    </tr>
                    <tr>
                        <th>Phone:</th>
                        <td>{{$candidate->phone ?? 'N/A'}}</td>
                    </tr>
                    <tr>
                        <th>Country:</th>
                        <td>{{$candidate->country ?? 'N/A'}}</td>

                    </tr>
                    <tr>
                        <th>Address:</th>
                        <td>{{$candidate->address ?? 'N/A'}}</td>
                    </tr>
                    <tr>
                        <th>State:</th>
                        <td>{{$candidate->state ?? 'N/A'}}</td>
                    </tr>
                    <tr>
                        <th>City:</th>
                        <td>{{$candidate->city ?? 'N/A'}}</td>
                    </tr>
                    <tr>
                        <th>Zip Code:</th>
                        <td>{{$candidate->zip_code ?? 'N/A'}}</td>
                    </tr>
                    <tr>
                        <th>Gender:</th>
                        <td>{{$candidate->gender ?? 'N/A'}}</td>
                    </tr>
                    {{-- <tr>
                        <th>Marital Status:</th>
                        <td>{{$candidate->date_of_birth}}</td>
                    </tr> --}}
                    <tr>
                        <th>Date of Birth:</th>
                        <td>{{$candidate->date_of_birth ?? 'N/A'}}</td>
                    </tr>
                    <tr>
                        <th>Website:</th>
                        <td>{{$candidate->website ?? 'N/A'}}</td>
                    </tr>
                    <tr>
                        <th>Biography:</th>
                        <td>{!!$candidate->biography ?? 'No Biography Available' !!}</td>
                    </tr>
                </table>
            </div>

            <h4 class="resume mt-5">Education</h4>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>SL</th>
                            <th>Education Level</th>
                            <th>Institute</th>
                            <th>Degree</th>
                            <th>Passing Year</th>
                        </tr>
                        @foreach($candidate->rCandidateEducation as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->level}}
                            <td>{{$item->institute}}</td>
                            <td>{{$item->degree}}</td>
                            <td>{{$item->passing_year}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <h4 class="resume mt-5">Skills</h4>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>SL</th>
                            <th>Skill Name</th>
                            <th>Percentage</th>
                        </tr>
                        @foreach($candidate->rCandidateSkill as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->percentage}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <h4 class="resume mt-5">Experience</h4>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>SL</th>
                            <th>Company</th>
                            <th>Designation</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                        </tr>
                        @foreach($candidate->rCandidateExperience as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->company}}</td>
                            <td>{{$item->designation}}</td>
                            <td>{{$item->start_date}}</td>
                            <td>{{$item->end_date}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <h4 class="resume mt-5">Resume</h4>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>File</th>
                        </tr>
                        @foreach($candidate->rCandidateResume as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->name}}</td>
                            <td>
                                <a href="{{asset('uploads/resumes/'.$item->file)}}" target="_blank"
                                    >{{$item->file}}</a
                                >
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection