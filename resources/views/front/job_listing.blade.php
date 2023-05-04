@extends('front.layout.app')

@section('main_content')

<div
            class="page-top"
            style="background-image: url('{{asset('uploads/banner.jpg')}}')"
        >
            <div class="bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Job Listing</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="job-result">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="job-filter">

                        <form action="{{url('job-listing')}}" method="get">
                            <div class="widget">
                                <h2>Job Title</h2>
                                <input
                                    type="text"
                                    name="title"
                                    class="form-control"
                                    placeholder="Search Titles ..."
                                />
                            </div>

                            <div class="widget">
                                <h2>Job Location</h2>
                                <select name="location" class="form-control select2">
                                    <option value="">Select Job Location</option>
                                    @foreach($job_locations as $item)
                                    <option value="{{$item->id}}" @if ($form_location == $item->id) selected @endif>{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="widget">
                                <h2>Job Category</h2>
                                <select name="category" class="form-control select2">
                                    <option value="">Select Job Category</option>
                                    @foreach($job_categories as $item)
                                    <option value="{{$item->id}}" @if ($form_category == $item->id) selected @endif>{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="widget">
                                <h2>Job Type</h2>
                                <select name="job_type" class="form-control select2">
                                    <option value="">Select Job Type</option>
                                    @foreach($job_types as $item)
                                    <option value="{{$item->id}}" @if ($form_job_type == $item->id) selected @endif>{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="widget">
                                <h2>Experience</h2>
                                <select name="experience" class="form-control select2">
                                    <option value="">Select Experience</option>
                                    @foreach($job_experiences as $item)
                                    <option value="{{$item->id}}" @if ($form_job_experience == $item->id) selected @endif>{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="widget">
                                <h2>Gender</h2>
                                <select name="gender" class="form-control select2">
                                    <option value="">Select Job Gender</option>
                                    <option value="male" @if ($form_job_gender == 'male') selected @endif>Male</option>
                                    <option value="female" @if ($form_job_gender == 'female') selected @endif>Female</option>
                                    <option value="any" @if ($form_job_gender == 'any') selected @endif>Any</option>
                                </select>
                            </div>

                            <div class="widget">
                                <h2>Salary Range</h2>
                                <select name="salary_range" class="form-control select2">
                                    <option value="">Select Salary Range</option>
                                    @foreach($job_salary_ranges as $item)
                                    <option value="{{$item->id}}" @if ($form_salary_range == $item->id) selected @endif>{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="filter-button">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Filter </button>
                            </div>

                            <div class="advertisement">
                                <a href=""
                                    ><img src="uploads/ad-2.png" alt=""
                                /></a>
                            </div>
                        </form>

                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="job">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="search-result-header">
                                            <i class="fas fa-search"></i> Search
                                            Result for "{{$form_title}}"
                                        </div>
                                    </div>
                                    @if($jobs->count() > 0)
                                    @foreach($jobs as $job)
                                        <div class="col-md-12">
                                        <div
                                            class="item d-flex justify-content-start"
                                        >
                                            <div class="logo">
                                                <img
                                                    @if($job->rCompany->logo != '')
                                                    src="{{asset('uploads/'.$job->rCompany->logo)}}"
                                                    @else
                                                    src="{{asset('uploads/default-company-logo.png')}}"
                                                    @endif
                                                    alt=""
                                                />
                                            </div>
                                            <div class="text">
                                                <h3>
                                                    <a href="{{route('job',$job->id)}}">{{$job->title}} - {{$job->rCompany->company_name}}</a>
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
                                                    {{-- @if(date('Y-m-d') > $job->deadline)
                                                    <div class="expired">
                                                        Expired
                                                    </div>
                                                    @endif --}}
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
                                                <div class="bookmark">
                                                    <a href=""
                                                        ><i
                                                            class="fas fa-bookmark active"
                                                        ></i
                                                    ></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    @endforeach
                                    <div class="col-md-12">
                                        {{ $jobs->appends($_GET)->links()}}
                                    </div>
                                    @else
                                    <div class="col-md-12 text-center">
                                        <h3>Sorry, no jobs were found that match your search criteria.</h3>
                                        <p>Try expanding your search or checking back later for new job postings.</p>
                                    </div>
                                    @endif
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection