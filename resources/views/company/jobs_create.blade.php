@extends('front.layout.app')

@section('seo_title') 
    Create Jobs
@endsection

@section('seo_meta_description') 
    create jobs
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
                        <h2>Add New Job</h2>
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
                        @if($allowed_jobs > $company_jobs_number)
                        <form action="{{route('company_jobs_create_submit')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="title" class="form-label" >Title *</label>
                                    <input type="text" class="form-control" name="title" value="{{old('title')}}"/>
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
                                    value="{{old('description')}}"
                                ></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="" class="form-label">Job Responsibilities</label>
                                    <textarea
                                        name="responsibilities"
                                        class="form-control editor"
                                        cols="30"
                                        rows="10"
                                        value="{{old('responsibilities')}}"
                                    ></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="" class="form-label" >Skills and Abilities</label>
                                    <textarea
                                        name="skill"
                                        class="form-control editor"
                                        cols="30"
                                        rows="10"
                                        value="{{old('skill')}}"
                                    ></textarea>
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
                                        value="{{old('education')}}"
                                    ></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="" class="form-label" >Benifits</label>
                                    <textarea
                                        name="benifit"
                                        class="form-control editor"
                                        cols="30"
                                        rows="10"
                                        value="{{old('benifit')}}"
                                    ></textarea>
                                </div>
                            </div>

                            

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="" class="form-label">Category *</label>
                                    <select name="job_category_id" class="form-control select2" >
                                        <option value="" selected>Select Job Category</option>
                                        @foreach($job_categories as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="" class="form-label" >Location *</label >

                                    <select name="job_location_id" class="form-control select2">
                                        <option value="" selected>Select Job Location</option>
                                        @foreach($job_locations as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
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
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="" class="form-label">Experience *</label>

                                    <select name="job_experience_id"  class="form-control select2">
                                        <option value="" selected>Select Experience</option>
                                        @foreach($job_experiences as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="job_gender" class="form-label">Gender *</label>
                                    <select name="job_gender" class="form-control select2">
                                        <option value="" selected>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="any">Any</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="" class="form-label">Salary Range *</label>
                                    <select name="job_salary_range_id" class="form-control select2">
                                            <option value="" selected>Select Salary Range</option>
                                        @foreach($job_salary_ranges as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
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
                                        value="{{old('deadline') ? old('deadline'): date('Y/m/d')}}"
                                       
                                    />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="" class="form-label" >Vacancy *</label >
                                    <input type="number" class="form-control" name="vacancy" min="1" value="{{old('vacancy') ? old('vacancy'): '1'}}"/>
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
                                    ></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="" class="form-label">Is Featured?</label>
                                    <select name="is_featured" class="form-control select2 @if($company_allowed_featured_jobs <= $company_featured_jobs_number) is-invalid @endif">
                                        @if($company_allowed_featured_jobs <= $company_featured_jobs_number)
                                            {{-- <option value="" class="text-danger" selected disabled>Limit Reached (Upgrade Required)</option> --}}
                                            <option value="0" selected>No</option>
                                            <option value="1" disabled>Yes</option>
                                        @else
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
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
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                            

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <p>total allowed jobs for your plan is {{$allowed_jobs}} 😉</p>
                                    <input
                                        type="submit"
                                        class="btn btn-primary"
                                        value="Submit"
                                    />
                                </div>
                            </div>
                        </form>
                        @else
                            <div class="alert alert-danger" role="alert">
                                @if($company_allowed_featured_jobs == null)
                                <div class="row justify-content-center">
                                    <div class="col-md-8 text-center">
                                      <h3 class="mb-3">Upgrade Your Plan to Add Company Photos</h3>
                                      <p class="mb-4">Your current plan does not allow for any company photos. Upgrade your plan to unlock this feature and start showcasing your company's culture.</p>
                                      <a href="{{route('pricing')}}" class="btn btn-primary">Upgrade Plan</a>
                                    </div>
                                </div>
                                @else
                                <h4 class="alert-heading">Limit Reached</h4>
                                <p class="mb-0">Sorry, you have reached the maximum number of jobs allowed for your plan ({{$allowed_jobs}} jobs). To add more jobs, please delete unused jobs or upgrade your plan using the link below.</p>
                                <hr>
                                <a class="btn btn-primary btn-sm" href="{{route('pricing')}}" role="button">Upgrade Plan</a>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
@endsection