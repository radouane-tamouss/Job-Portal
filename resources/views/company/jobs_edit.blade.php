@extends('front.layout.app')

@section('seo_title') 
    edit Jobs
@endsection

@section('seo_meta_description') 
    edit jobs
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
                        <h2>Modifier Offre d'emploi</h2>
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
                        <form action="{{route('company_update_job', $job->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="title" class="form-label" >Title *</label>
                                    <input type="text" class="form-control" name="title" value="{{$job->title}}"/>
                                </div>
                                
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label"
                                    >Description *</label>
                                <textarea
                                    name="description"
                                    class="form-control editor"
                                    cols="30"
                                    rows="10"
                                    value="{{$job->description}}"
                                >{{$job->description}}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="" class="form-label">Job Responsibilities</label>
                                    <textarea
                                        name="responsibilities"
                                        class="form-control editor"
                                        cols="30"
                                        rows="10"
                                        value="{{$job->responsibilities}}"
                                    >{{$job->responsibilities}}</textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="" class="form-label" >Skills and Abilities</label>
                                    <textarea
                                        name="skill"
                                        class="form-control editor"
                                        cols="30"
                                        rows="10"
                                        value="{{$job->skill}}"
                                    >{{$job->skill}} </textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="" class="form-label">Educational Qualification</label >
                                    <textarea
                                        name="education"
                                        class="form-control editor"
                                        cols="30"
                                        rows="10"
                                        value="{{$job->education}}"
                                    >{{$job->education}}</textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="" class="form-label" >Benifits</label>
                                    <textarea
                                        name="benifit"
                                        class="form-control editor"
                                        cols="30"
                                        rows="10"
                                        value="{{$job->benifit}}"
                                    >{{$job->benifit}}</textarea>
                                </div>
                            </div>

                            

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="" class="form-label">Category *</label>
                                    <select name="job_category_id" class="form-control select2" >
                                        <option value="" selected>Select Job Category</option>
                                        @foreach($job_categories as $item)
                                            
                                            <option value="{{$item->id}}" @if($item->id == $job->job_category_id) selected @endif>{{$item->name}}</option>
                                            
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="" class="form-label" >Location *</label >

                                    <select name="job_location_id" class="form-control select2">
                                        <option value="" selected>Select Job Location</option>
                                        @foreach($job_locations as $item)
                                            <option value="{{$item->id}}" @if($item->id == $job->job_location_id) selected @endif>{{$item->name}}</option>
                                        @endforeach
                                    </select> 
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="" class="form-label">Job Type *</label>
                                    <select name="job_type_id" class="form-control select2">
                                        <option value="" selected>Select Job Type</option>
                                        @foreach($job_types as $item)
                                            
                                            <option value="{{$item->id}}" @if($item->id == $job->job_type_id) selected @endif>{{$item->name}}</option>
                                            
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="" class="form-label">Experience *</label>

                                    <select name="job_experience_id"  class="form-control select2">
                                        <option value="" selected>Select Experience</option>
                                        @foreach($job_experiences as $item)
                                        <option value="{{$item->id}}" @if($item->id == $job->job_experience_id) selected @endif>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="job_gender" class="form-label">Gender *</label>
                                    <select name="job_gender" class="form-control select2">
                                        <option value="" selected>Select Gender</option>
                                        <option value="male" @if($job ->job_gender == 'male') selected @endif>Male</option>
                                        <option value="female" @if($job ->job_gender == 'female') selected @endif>Female</option>
                                        <option value="any" @if($job ->job_gender == 'any') selected @endif>Any</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="" class="form-label">Salary Range *</label>
                                    <select name="job_salary_range_id" class="form-control select2">
                                            <option value="" selected>Select Salary Range</option>
                                        @foreach($job_salary_ranges as $item)
                                            <option value="{{$item->id}}" @if($item->id == $job->job_salary_range_id) selected @endif>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="" class="form-label">Deadline *</label>
                                    <input
                                        type="text"
                                        name="deadline"
                                        class="form-control datepicker"
                                        value="{{$job->deadline ? $job->deadline: date('Y/m/d')}}"
                                       
                                    />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="" class="form-label" >Vacancy *</label >
                                    <input type="number" class="form-control" name="vacancy" min="1" value="{{$job->vacancy}}"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="" class="form-label" value="{{old('map_code')}}">Location Map</label>
                                    <textarea
                                        name="map_code"
                                        class="form-control h-150"
                                        cols="30"
                                        rows="30"
                                    >{{$job->map_code}}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="" class="form-label">Is Featured?</label>
                                    <select name="is_featured" class="form-control select2 @if($company_allowed_featured_jobs <= $company_featured_jobs_number) is-invalid @endif">
                                        @if($company_allowed_featured_jobs <= $company_featured_jobs_number)
                                            <option value="" class="text-danger" selected disabled>Limit Reached (Upgrade Required)</option>
                                            <option value="0" selected >No</option>
                                            <option value="1" disabled>Yes</option>
                                        @else
                                            <option value="0"  @if(0 == $job->is_featured) selected @endif>No</option>
                                            <option value="1"  @if(1 == $job->is_featured) selected @endif>Yes</option>
                                        @endif
                                    </select>
                                    @if($company_allowed_featured_jobs <= $company_featured_jobs_number)
                                        <div class="invalid-feedback">
                                            Your current package has reached its limit for featured jobs. Please upgrade your package to access this feature.
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="" class="form-label">Is Urgent?</label>
                                    <select name="is_urgent" class="form-control select2">
                                        <option value="0" @if(0 == $job->is_urgent) selected @endif>No</option>
                                        <option value="1" @if(1 == $job->is_urgent) selected @endif>Yes</option>
                                    </select>
                                </div>
                            </div>
                            

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <input
                                        type="submit"
                                        class="btn btn-primary"
                                        value="Submit"
                                    />
                                </div>
                            </div>
                        </form>
                       
                        
                    </div>
                </div>
            </div>
        </div>
@endsection