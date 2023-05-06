@extends('front.layout.app')

@section('seo_title') 
    Company Details
@endsection

@section('seo_meta_description') 
    company details
@endsection

@section('main_content')

<div
class="page-top page-top-job-single page-top-company-single"
style="background-image: url('{{asset('uploads/banner.jpg')}}')"
>
<div class="bg"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12 job job-single">
            <div class="item d-flex justify-content-start">
                <div class="logo">
                    <img src="{{asset('uploads/'.$company->logo)}}" alt="" />
                </div>
                <div class="text">
                    <h3>{{$company->company_name}}</h3>
                    <div
                        class="detail-1 d-flex justify-content-start"
                    >
                        <div class="category"> {{ $company->rCompanyIndustry ? $company->rCompanyIndustry->name : 'N/A' }}</div>
                        <div class="location">  {{ $company->rCompanyLocation ? $company->rCompanyLocation->name : 'N/A' }}</div>
                        <div class="email">{{$company->email}}</div>
                        <div class="phone">{{$company->phone}}</div>
                    </div>
                    <div class="special">
                        <div class="type">{{$company->r_job_count}} open positions</div>
                        <div class="social">
                            <ul>
                                @if($company->facebook != '')
                                <li>
                                    <a href="{{$company->facebook}}" class="social-link" data-toggle="tooltip" data-placement="top" title="Facebook">
                                        <i class="fab fa-facebook"></i>
                                      </a>
                                      
                                </li>
                                
                                @endif
                                @if($company->twitter != '')
                                <li>
                                    <a href="{{$company->twitter}}" class="social-link" data-toggle="tooltip" data-placement="top" title="twitter">
                                        <i class="fab fa-twitter"></i>
                                      </a>
                                </li>
                                @endif
                                @if($company->linkedin != '')
                                <li>
                                    <a href="{{$company->linkedin}}" class="social-link" data-toggle="tooltip" data-placement="top" title="linkedin">
                                        <i class="fab fa-linkedin"></i>
                                      </a>
                                </li>
                                @endif
                                @if($company->instagram != '')
                                <li>
                                    <a href="{{$company->instagram}}" class="social-link" data-toggle="tooltip" data-placement="top" title="instagram">
                                        <i class="fab fa-instagram"></i>
                                      </a>
                                </li>
                                @endif
                                @if($company->youtube != '')
                                <li>
                                    <a href="{{$company->youtube}}" class="social-link" data-toggle="tooltip" data-placement="top" title="youtube">
                                        <i class="fab fa-youtube"></i>
                                      </a>
                                </li>
                                @endif
                            </ul>
                        </div>
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
            <div class="left-item">
                <h2>
                    <i class="fas fa-file-invoice"></i>
                    About Company
                </h2>
                {!! $company->description !!}
            </div>
            <div class="left-item">
                <h2>
                    <i class="fas fa-file-invoice"></i>
                    Opening Hours
                </h2>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>Monday</td>
                                <td>{{ $company->oh_monday ? $company->oh_monday : 'Opening hours not specified' }}</td>
                            </tr>
                            <tr>
                                <td>Tuesday</td>
                                <td>{{ $company->oh_tuesday ? $company->oh_tuesday : 'Opening hours not specified' }}</td>
                            </tr>
                            <tr>
                                <td>Wednesday</td>
                                <td>{{ $company->oh_wednesday ? $company->oh_wednesday : 'Opening hours not specified' }}</td>
                            </tr>
                            <tr>
                                <td>Thursday</td>
                                <td>{{ $company->oh_thursday ? $company->oh_thursday : 'Opening hours not specified' }}</td>
                            </tr>
                            <tr>
                                <td>Friday</td>
                                <td>{{ $company->oh_friday ? $company->oh_friday : 'Opening hours not specified' }}</td>
                            </tr>
                            <tr>
                                <td>Saturday</td>
                                <td>{{ $company->oh_saturday ? $company->oh_saturday : 'Opening hours not specified' }}</td>
                            </tr>
                            <tr>
                                <td>Sunday</td>
                                <td>{{ $company->oh_sunday ? $company->oh_sunday : 'Opening hours not specified' }}</td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="left-item">
                <h2>
                    <i class="fas fa-file-invoice"></i>
                    Photos
                </h2>
                <div class="photo-all">
                    <div class="row">
                      @if(count($company_photos) > 0)
                        @foreach($company_photos as $photo)
                          <div class="col-md-6 col-lg-4">
                            <div class="item">
                              <a href="{{asset('uploads/companies_photos/'.$photo->photo)}}" class="magnific">
                                <img src="{{asset('uploads/companies_photos/'.$photo->photo)}}" alt="" />
                                <div class="icon">
                                  <i class="fas fa-plus"></i>
                                </div>
                                <div class="bg"></div>
                              </a>
                            </div>
                          </div>
                        @endforeach
                      @else
                        <div class="col-12">
                          <p class="text-center">No photos available.</p>
                        </div>
                      @endif
                    </div>
                  </div>
                  
            </div>
            <div class="left-item">
                <h2>
                    <i class="fas fa-file-invoice"></i>
                    Videos
                </h2>
                <div class="video-all">
                    @if(count($company_videos) > 0)
                        <div class="row">
                            @foreach($company_videos as $video)
                                <div class="col-md-6 col-lg-4">
                                    <div class="item">
                                        <a class="video-button" href="{{$video->video}}">
                                            <img src="http://img.youtube.com/vi/{{ substr($video->video, -11) }}/0.jpg" alt=""/>
                                            <div class="icon">
                                                <i class="far fa-play-circle"></i>
                                            </div>
                                            <div class="bg"></div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                    <div class="col-12">
                        <p class="text-center">No Videos available.</p>
                    </div>
                    @endif


                    
                </div>
            </div>

            <div class="left-item">
                <h2>
                    <i class="fas fa-file-invoice"></i>
                    Open Positions
                </h2>
                <div class="job related-job pt-0 pb-0">
                    <div class="container">
                        <div class="row">
                            @if(count($open_positions) > 0)
                            @foreach($open_positions as $job)
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
                            @else
                            <div class="col-12">
                                <p class="text-center">No Open Positions available for this company.</p>
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="right-item">
                <h2>
                    <i class="fas fa-file-invoice"></i>
                    Company Overview
                </h2>
                <div class="summary">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td><b>Contact Person:</b></td>
                                <td>{{$company->person_name ?? 'N/A'}}</td>
                            </tr>
                            <tr>
                                <td><b>Category:</b></td>
                                <td>{{$company->rCompanyIndustry->name ?? 'N/A'}}</td>
                            </tr>
                            <tr>
                                <td><b>Email:</b></td>
                                <td>{{$company->email ?? 'N/A'}}</td>
                            </tr>
                            <tr>
                                <td><b>Phone:</b></td>
                                <td>{{$company->phone ?? 'N/A'}}</td>
                            </tr>
                            <tr>
                                <td><b>Address:</b></td>
                                <td>{{$company->address ?? 'N/A'}}</td>
                            </tr>
                            {{-- <tr>
                                <td><b>Country:</b></td>
                                <td>{{$company->country ?? 'N/A'}}</td>
                            </tr> --}}
                            <tr>
                                <td><b>Website:</b></td>
                                <td>{{$company->website ?? 'N/A'}}</td>
                            </tr>
                            <tr>
                                <td><b>Company Size:</b></td>
                                <td>{{$company->rCompanySize->name ?? 'N/A'}}</td>
                            </tr>
                            <tr>
                                <td><b>Founded On:</b></td>
                                <td>{{$company->founded_on ?? 'N/A'}}</td>
                            </tr>
                        </table>
                        
                    </div>
                </div>
            </div>
            <div class="right-item">
                <h2>
                    <i class="fas fa-file-invoice"></i>
                    Location Map
                </h2>
                <div class="location-map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3629.2542091435403!2d-97.90512175238419!3d38.06450160184029!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sbd!4v1671347381733!5m2!1sen!2sbd"
                        width="600"
                        height="450"
                        style="border: 0"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                    ></iframe>
                </div>
            </div>
            <div class="right-item">
                <h2>
                    <i class="fas fa-file-invoice"></i>
                    Contact Company
                </h2>
                <div class="enquery-form">
                    <form action="{{route('company_enquery_send_email')}}" method="post">
                        @csrf
                        
                        <input type="hidden" name="company_email" value="{{$company->email}}">
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
        </div>
    </div>
</div>
</div>
@endsection