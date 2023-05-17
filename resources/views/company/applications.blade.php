@extends('front.layout.app')

@section('seo_title') 
    Dashboard
@endsection

@section('seo_meta_description') 
    company dashbaord
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
            
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>SL</th>
                            <th>Job Title</th>
                            <th>Category</th>
                            <th>Location</th>
                            <th>Is Featured?</th>
                            <th>Job Details</th>
                            <th>Applicants</th>

                       
                        </tr>
                        @foreach($jobs as $job)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$job->title}}</td>
                            <td>{{$job->rJobCategory->name}}</td>
                            <td>{{$job->rJobLocation->name}}</td>
                            <td>
                                @if($job->is_featured == 1)
                                <span class="badge bg-success"
                                    >Featured</span
                                >
                                @else
                                <span class="badge bg-danger"
                                    >Not Featured</span
                                >
                                @endif
                            </td>
                            <td>
                               <a  class="badge bg-primary text-white" href="{{route('job',$job->id)}}">Details</a>
                            </td>
                            <td>
                                @php
                                     $count = \App\Models\CandidateAppliedJob::where('job_id',$job->id)->count();
                                @endphp
                                <a href="{{route('job_applicants',$job->id)}}" class="badge bg-primary position-relative">
                                    Applications
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                      {{$count}}
                                      
                                    </span>
                                  </a>
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