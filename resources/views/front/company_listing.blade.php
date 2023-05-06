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
            <h2>Company Listing</h2>
        </div>
    </div>
</div>
</div>

<div class="job-result">
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-12">
            <div class="job-filter">
            <form action="{{url("company-listing")}}" method="get">
                <div class="widget">
                    <h2>Company Name</h2>
                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        placeholder="Search Company Name ..."
                    />
                    <div class="clearfix"></div>
                </div>

                <div class="widget">
                    <h2>Company Location</h2>
                    <select name="location" class="form-control select2">
                            <option value="">Select a location</option>
                        @foreach($company_locations as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    <div class="clearfix"></div>
                </div>

                <div class="widget">
                    <h2>Company Industry</h2>
                    <select name="industry" class="form-control select2">
                        <option value="">Select an industry</option>
                        @foreach($company_industries as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    <div class="clearfix"></div>
                </div>

                <div class="widget">
                    <h2>Company Size</h2>
                    <select name="size" class="form-control select2">
                        <option value="">Select a company size</option>
                        @foreach($company_size as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    <div class="clearfix"></div>
                </div>

                <div class="filter-button">
                    
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i>Filter

                    </button>
                </div>
            </form>

                <div class="advertisement">
                    <a href=""
                        ><img src="uploads/ad-2.gif" alt=""
                    /></a>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-12">
            <div class="job">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="search-result-header">
                                <i class="fas fa-search"></i> Search
                                Result for Company Listing
                            </div>
                        </div>
                        @if($companies->count() > 0)
                        @foreach($companies as $item)
                        <div class="col-md-12">
                            <div
                                class="item d-flex justify-content-start"
                            >
                                <div class="logo">
                                    <img
                                        src="{{asset('uploads/'.$item->logo)}}"
                                        alt=""
                                    />
                                </div>
                                <div class="text">
                                    <h3>
                                        <a href="{{route('company',$item->id)}}"
                                            >{{$item->company_name}}</a
                                        >
                                    </h3>
                                    <div
                                        class="detail-1 d-flex justify-content-start"
                                    >
                                    <div class="category">
                                        {{ $item->rCompanyIndustry ? $item->rCompanyIndustry->name : 'N/A' }}
                                    </div>
                                    
                                    <div class="location">
                                        {{ $item->rCompanyLocation ? $item->rCompanyLocation->name : 'N/A' }}
                                    </div>
                                        
                                    </div>
                                    <div
                                        class="detail-2"
                                    >
                                    @php
                                        $new_str = substr($item->description,0 ,600). ' ...';
                                    @endphp
                                    {!! $new_str !!}
                                    </div>
                                    <div class="open-position">
                                        <span
                                            class="badge bg-primary"
                                            >{{$item->r_job_count}} open positions</span
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-md-12">
                            {{ $companies->appends($_GET)->links()}}
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