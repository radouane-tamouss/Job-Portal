@extends('front.layout.app')

@section('main_content')
<div
class="page-top page-top-job-single"
style="background-image: url('{{asset('uploads/banner.jpg')}}')"
>
<div class="bg"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12 job job-single">
            <div class="item d-flex justify-content-start">
                <div class="logo">
                    <img src="{{asset('uploads/'.$job->rCompany->logo)}}" alt="" />
                </div>
                <div class="text">
                    <h3>{{$job->title}} - {{$job->rCompany->company_name}}</h3>
                    <div
                        class="detail-1 d-flex justify-content-start"
                    >
                        <div class="category"> {{$job->rJobCategory->name}}</div>
                        <div class="location">{{$job->rJobLocation->name}}</div>
                    </div>
                    <div
                        class="detail-2 d-flex justify-content-start"
                    >
                        <div class="date"> {{ $job->created_at->diffForHumans() }}</div>
                        <div class="budget"> {{$job->rJobSalaryRange->name}}</div>
                        <div class="{{ \Carbon\Carbon::parse($job->deadline) < now() ? 'expired' : '' }}">
                            {{ \Carbon\Carbon::parse($job->deadline) < now() ? 'Expired' : '' }}
                        </div>
                    </div>
                    <div
                        class="special d-flex justify-content-start"
                    >
                        @if ($job->is_featured)
                        <div class="featured">
                            Featured
                        </div>
                        @endif
                        <div class="type">
                            {{$job->rJobType->name}}
                        </div>
                        @if($job->is_urgent)
                        <div class="urgent">
                            Urgent
                        </div>
                        @endif
                    </div>
                    <div class="apply">
                        @if(!Auth::guard('company')->check())
                        <a href="{{route('candidate_apply',$job->id)}}" class="btn btn-primary"
                            >Apply Now</a
                        >
                        <a
                            href="{{route('candidate_bookmark_add',$job->id)}}"
                            class="btn btn-primary save-job"
                            >Bookmark</a
                        >
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="job-result pt-50 pb-50">
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-12">
            @if($job->description != '')
            <div class="left-item">
                <h2>
                    <i class="fas fa-file-invoice"></i>
                    Description
                </h2>
                {!!($job->description)!!} 
                
                
            </div>
            @endif
            @if($job->responsibilities != '')
            <div class="left-item">
                <h2>
                    <i class="fas fa-file-invoice"></i>
                    Job Responsibilities
                </h2>
                {!!($job->responsibilities)!!}
            
            </div>
            @endif
            @if($job->skill != '')
            <div class="left-item">
                <h2>
                    <i class="fas fa-file-invoice"></i>
                    Skills and Abilities
                </h2>
                {!!($job->skill)!!} 
                
            </div>
            @endif

            @if($job->education != '')

            <div class="left-item">
                <h2>
                    <i class="fas fa-file-invoice"></i>
                    Educational Qualification
                </h2>
                {!!($job->education)!!} 
               
            </div>
            @endif

            @if($job->benifit != '')

            <div class="left-item">
                <h2>
                    <i class="fas fa-file-invoice"></i>
                    Benefits
                </h2>
                {!!($job->benifit)!!} 
                
                
            </div>
            @endif

            <div class="left-item">
                <div class="apply">
                    <a href="{{route('candidate_apply',$job->id)}}" class="btn btn-primary"
                        >Apply Now</a
                    >
                </div>
            </div>

            @if($related_jobs->count()>0)
            <div class="left-item">
                <h2>
                    <i class="fas fa-file-invoice"></i>
                    Related Jobs
                </h2>
                <div class="job related-job pt-0 pb-0">
                    <div class="container">
                        <div class="row">
                            @foreach($related_jobs as $job)
                            <div class="col-md-12">
                                <div
                                    class="item d-flex justify-content-start"
                                >
                                    <div class="logo">
                                        <img
                                            src="{{asset('uploads/'.$job->rCompany->logo)}}"
                                            alt=""
                                        />
                                    </div>
                                    <div class="text">
                                        <h3>
                                            <a href="{{route('job',$job->id)}}"
                                                >{{$job->title}} - {{$job->rCompany->company_name}}</a
                                            >
                                        </h3>
                                        <div
                                            class="detail-1 d-flex justify-content-start"
                                        >
                                            <div class="category">
                                                {{$job->rJobCategory->name}}
                                            </div>
                                            <div class="location">
                                                {{$job->rJobLocation->name}}
                                            </div>
                                        </div>
                                        <div
                                            class="detail-2 d-flex justify-content-start"
                                        >
                                            <div class="date">
                                                {{ $job->created_at->diffForHumans() }}
                                            </div>
                                            <div class="budget">
                                                {{$job->rJobSalaryRange->name}}
                                            </div>
                                            <div class="{{ \Carbon\Carbon::parse($job->deadline) < now() ? 'expired' : '' }}">
                                                {{ \Carbon\Carbon::parse($job->deadline) < now() ? 'Expired' : '' }}
                                            </div>
                                        </div>
                                        <div
                                            class="special d-flex justify-content-start"
                                        >
                                            @if ($job->is_featured)
                                            <div class="featured">
                                                Featured
                                            </div>
                                            @endif
                                            <div class="type">
                                                {{$job->rJobType->name}}
                                            </div>
                                            @if($job->is_urgent)
                                            <div class="urgent">
                                                Urgent
                                            </div>
                                            @endif
                                        </div>
                                        @if(!Auth::guard('company')->check())

                                        <div class="bookmark">
                                            @if(Auth::guard('candidate')->check())

                                            @php
                                                $count = \App\Models\CandidateBookmark::where('candidate_id',Auth::guard('candidate')->user()->id)->where('job_id',$job->id)->count();
                                                if($count > 0){
                                                    $bookmark_status = 'active';
                                                }else{
                                                    $bookmark_status = '';
                                                }
                                            @endphp 

                                            @else
                                                @php
                                                    $bookmark_status = '';
                                                @endphp
                                            @endif
                                            <a href="{{route('candidate_bookmark_add',$job->id)}}"
                                                ><i class="fas fa-bookmark {{$bookmark_status}}"></i
                                            ></a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="right-item">
                <h2>
                    <i class="fas fa-file-invoice"></i>
                    Job Summary
                </h2>
                <div class="summary">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td>
                                    <b>Published On:</b>
                                </td>
                                <td>{{$job->created_at->format('D d M, Y')}}</td>
                            </tr>
                            <tr>
                                <td><b>Deadline:</b></td>
                                
                                <td>
                                    @php
                                        $dt = DateTime::createFromFormat('d/m/Y',$job->deadline);
                                        @endphp
                                        {{$dt->format('d F, Y');}}  
                                    {{-- {{$job->deadline}} --}}
                                </td>

                            </tr>
                            <tr>
                                <td><b>Vacancy:</b></td>
                                <td>{{$job->vacancy}}</td>
                            </tr>
                            <tr>
                                <td><b>Category:</b></td>
                                <td>{{$job->rJobCategory->name}}</td>
                            </tr>
                            <tr>
                                <td><b>Location:</b></td>
                                <td>{{$job->rJobLocation->name}}</td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Salary Range:</b>
                                </td>
                                <td>{{$job->rJobSalaryRange->name}}</td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Experience:</b>
                                </td>
                                <td>{{$job->rJobExperience->name}}</td>
                            </tr>
                            <tr>
                                <td><b>Type:</b></td>
                                <td>{{$job->rJobType->name}}</td>

                            </tr>
                            <tr>
                                <td><b>Gender:</b></td>
                                <td>{{$job->job_gender}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="right-item">
                <h2>
                    <i class="fas fa-file-invoice"></i>
                    Enquery Form
                </h2>
                <div class="enquery-form">
                    <form action="{{route('job_enquery_send_email')}}" method="post">
                        @csrf
                        <input type="hidden" name="job_title" value="{{$job->title}}">
                        <input type="hidden" name="company_email" value="{{$job->rCompany->email}}">
                        <div class="mb-3">
                            <input type="text" id="name" name="name" class="form-control" placeholder="Name" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email Address" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone Number" required>
                        </div>
                        <div class="mb-3">
                            <textarea id="message" name="message" class="form-control h-150" rows="3" placeholder="Message" required></textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    
                </div>
            </div>
            @if(preg_match('/<iframe.*?src="(https?:\/\/(?:www\.)?google\.[a-z]+\/maps\/embed.*?)"/', $job->map_code, $matches))
                <div class="right-item">
                    <h2>
                        <i class="fas fa-file-invoice"></i>
                        Location Map
                    </h2>
                    <div class="location-map">
                        {!!$job->map_code!!}
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>
</div>
@endsection