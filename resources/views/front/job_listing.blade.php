@extends('front.layout.app')

@section('main_content')

<div
            class="page-top"
            style="background-image: url('uploads/banner.jpg')"
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
                            <div class="widget">
                                <h2>Job Title</h2>
                                <input
                                    type="text"
                                    name=""
                                    class="form-control"
                                    placeholder="Search Titles ..."
                                />
                            </div>

                            <div class="widget">
                                <h2>Job Location</h2>
                                <select name="" class="form-control select2">
                                    <option value="">Australia</option>
                                    <option value="">Bangladesh</option>
                                    <option value="">Canada</option>
                                    <option value="">China</option>
                                    <option value="">India</option>
                                    <option value="">United Kingdom</option>
                                    <option value="">United States</option>
                                </select>
                            </div>

                            <div class="widget">
                                <h2>Job Category</h2>
                                <select name="" class="form-control select2">
                                    <option value="">Accounting</option>
                                    <option value="">Customer Support</option>
                                    <option value="">Web Design</option>
                                    <option value="">Web Development</option>
                                </select>
                            </div>

                            <div class="widget">
                                <h2>Job Type</h2>
                                <select name="" class="form-control select2">
                                    <option value="">Full Time</option>
                                    <option value="">Part Time</option>
                                    <option value="">Contractual</option>
                                    <option value="">Internship</option>
                                    <option value="">Freelance</option>
                                </select>
                            </div>

                            <div class="widget">
                                <h2>Experience</h2>
                                <select name="" class="form-control select2">
                                    <option value="">Fresher</option>
                                    <option value="">1 Year</option>
                                    <option value="">2 Years</option>
                                    <option value="">3 Years</option>
                                    <option value="">4 Years</option>
                                    <option value="">5 Years</option>
                                </select>
                            </div>

                            <div class="widget">
                                <h2>Gender</h2>
                                <select name="" class="form-control select2">
                                    <option value="">Male</option>
                                    <option value="">Female</option>
                                </select>
                            </div>

                            <div class="widget">
                                <h2>Salary Range</h2>
                                <select name="" class="form-control select2">
                                    @foreach($job_salary_ranges as $item)
                                    <option value="{{$item->job_salary_id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="filter-button">
                                <a href="" class="btn btn-sm"
                                    ><i class="fas fa-search"></i> Filter</a
                                >
                            </div>

                            <div class="advertisement">
                                <a href=""
                                    ><img src="uploads/ad-2.png" alt=""
                                /></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="job">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="search-result-header">
                                            <i class="fas fa-search"></i> Search
                                            Result for Job Listing
                                        </div>
                                    </div>
                                    @foreach($jobs as $job)
                                        <div class="col-md-12">
                                        <div
                                            class="item d-flex justify-content-start"
                                        >
                                            <div class="logo">
                                                <img
                                                    src="uploads/logo1.png"
                                                    alt=""
                                                />
                                            </div>
                                            <div class="text">
                                                <h3>
                                                    <a href="job.html">{{$job->title}}</a>
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
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection