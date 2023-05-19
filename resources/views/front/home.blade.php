@extends('front.layout.app')

@section('main_content')
<div class="slider" style="background-image: url({{asset('uploads/'.$page_home_data->background)}})">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="item">
                    <div class="text">
                        <h2>{{$page_home_data->heading}}</h2>
                        <p>
                            {!! $page_home_data->text !!}
                        </p>
                    </div>
                    <div class="search-section">
                        <form action="{{url('job-listing')}}" method="get"> <!-- we used here the get method!!!-->
                            <div class="inner">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <input
                                                type="text"
                                                name="title"
                                                class="form-control"
                                                placeholder="{{$page_home_data->job_title}}"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <select name="location" class="form-select select2">
                                            <option value="">
                                                {{$page_home_data->job_location}}
                                            </option>
                                            @foreach($job_locations_select as $item)
                                                <option value="{{$item->id}}">
                                                    {{$item->name}}
                                                </option>
                                            @endforeach 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <select name="category" class="form-select select2">
                                                <option value="">
                                                    {{$page_home_data->job_category}}
                                                </option>
                                                @foreach ($job_categories_select as $item)
                                                <option value="{{$item->id}}">
                                                    {{$item->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-search"></i>
                                            {{$page_home_data->search}}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="job-category">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Job Categories</h2>
                    <p>
                        Get the list of all the popular job categories
                        here
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($job_categories as $item)
                
            <div class="col-md-4">
                <div class="item">
                    <div class="icon">
                        <i class="{{$item->icon}}"></i>
                    </div>
                    <h3>{{$item->name}}</h3>
                    <p>( {{$item->r_job_count}} Open Positions)</p>
                    <a href="{{url('job-listing?category='.$item->id)}}"></a>
                </div>
            </div>

            @endforeach

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="all">
                    <a href="{{route('job_categories')}}" class="btn btn-primary"
                        >See All Categories</a
                    >
                </div>
            </div>
        </div>
    </div>
</div>

<div
    class="why-choose"
    style="background-image: url({{asset('uploads/banner3.jpg')}})"
>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Why Choose Us</h2>
                    <p>
                        Our Methods to help you build your career in
                        future
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="inner">
                    <div class="icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <div class="text">
                        <h2>Quick Apply</h2>
                        <p>
                            You can just create your account in our
                            website and apply for desired job very
                            quickly.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="inner">
                    <div class="icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="text">
                        <h2>Search Tool</h2>
                        <p>
                            We provide a perfect and advanced search
                            tool for job seekers, employers or
                            companies.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="inner">
                    <div class="icon">
                        <i class="fas fa-share-alt"></i>
                    </div>
                    <div class="text">
                        <h2>Best Companies</h2>
                        <p>
                            The best and reputed worldwide companies
                            registered here and so you will get the
                            quality jobs.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="job">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Featured Jobs</h2>
                    <p>Find the awesome jobs that matches your skill</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($fetured_jobs as $job)
            <div class="col-lg-6 col-md-12">
                <div class="item d-flex justify-content-start">
                    <div class="logo">
                        <img src="{{ asset('uploads/'.$job->rCompany->logo)}}" alt="" />
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
        <div class="row">
            <div class="col-md-12">
                <div class="all">
                    <a href="{{route('job_listing')}}" class="btn btn-primary"
                        >See All Jobs</a
                    >
                </div>
            </div>
        </div>
    </div>
</div>

<div
    class="testimonial"
    style="background-image: url({{ asset('uploads/banner11.jpg')}})"
>
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="main-header">Our Happy Clients</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="testimonial-carousel owl-carousel">
                    <div class="item">
                        <div class="photo">
                            <img src="{{ asset('uploads/t1.jpg')}}" alt="" />
                        </div>
                        <div class="text">
                            <h4>Robert Krol</h4>
                            <p>CEO, ABC Company</p>
                        </div>
                        <div class="description">
                            <p width="300px;">
                               Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium voluptatem
                                eveniet facere, recusandae odit repellat dignissimos hic pariatur porro, tenetur,
                                 praesentium veniam laudantium quia dolore nobis incidunt impedit autem qui.
                            </p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="photo">
                            <img src="{{ asset('uploads/t2.jpg')}}" alt="" />
                        </div>
                        <div class="text">
                            <h4>Sal Harvey</h4>
                            <p>Director, DEF Company</p>
                        </div>
                        <div class="description">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium voluptatem
                                eveniet facere, recusandae odit repellat dignissimos hic pariatur porro, tenetur,
                                 praesentium veniam laudantium quia dolore nobis incidunt impedit autem qui.
                                 Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium voluptatem
                                eveniet facere, recusandae odit repellat dignissimos hic pariatur porro, tenetur,
                                 praesentium veniam laudantium quia dolore nobis incidunt impedit autem qui.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Latest News</h2>
                    <p>
                        Check our latest news from the following section
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="item">
                    <div class="photo">
                        <img src="{{ asset('uploads/banner1.jpg')}}" alt="" />
                    </div>
                    <div class="text">
                        <h2>
                            <a href="post.html"
                                >This is a sample blog post title</a
                            >
                        </h2>
                        <div class="short-des">
                            <p>
                                Lorem ipsum dolor sit amet, nibh saperet
                                te pri, at nam diceret disputationi. Quo
                                an consul impedit, usu possim evertitur
                                dissentiet ei.
                            </p>
                        </div>
                        <div class="button">
                            <a href="post.html" class="btn btn-primary"
                                >Read More</a
                            >
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="item">
                    <div class="photo">
                        <img src="{{ asset('uploads/banner2.jpg')}}" alt="" />
                    </div>
                    <div class="text">
                        <h2>
                            <a href="post.html"
                                >This is a sample blog post title</a
                            >
                        </h2>
                        <div class="short-des">
                            <p>
                                Nec in rebum primis causae. Affert
                                iisque ex pri, vis utinam vivendo
                                definitionem ad, nostrum omnes que per
                                et. Omnium antiopam.
                            </p>
                        </div>
                        <div class="button">
                            <a href="post.html" class="btn btn-primary"
                                >Read More</a
                            >
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="item">
                    <div class="photo">
                        <img src="{{ asset('uploads/banner3.jpg')}}" alt="" />
                    </div>
                    <div class="text">
                        <h2>
                            <a href="post.html"
                                >This is a sample blog post title</a
                            >
                        </h2>
                        <div class="short-des">
                            <p>
                                Id pri placerat voluptatum, vero dicunt
                                dissentiunt eum et, adhuc iisque vis no.
                                Eu suavitate conten tiones definitionem
                                mel, ex vide.
                            </p>
                        </div>
                        <div class="button">
                            <a href="post.html" class="btn btn-primary"
                                >Read More</a
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection