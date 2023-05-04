@extends('front.layout.app')

@section('seo_title') 
    Edit Candidate Experience
@endsection

@section('seo_meta_description') 
    Edit Candidate Experience
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
            <h2>Add Experience</h2>
        </div>
    </div>
</div>
</div>

<div class="page-content user-panel">
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-12">
            <div class="card">
                @include('candidate.sidebar')
            </div>
        </div>
        <div class="col-lg-9 col-md-12">
            <a
                href="{{route('candidate_experience')}}"
                class="btn btn-primary btn-sm mb-2"
                ><i class="fas fa-list"></i> See All</a
            >
            <form action="{{route('candidate_experience_update',$experience->id)}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Company *</label>
                        <div class="form-group">
                            <input
                                type="text"
                                name="company"
                                class="form-control"
                                value="{{$experience->company}}"
                            />
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Designation *</label>
                        <div class="form-group">
                            <input
                                type="text"
                                name="designation"
                                class="form-control"
                                value="{{$experience->designation}}"
                            />
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Start Date *</label>
                        <div class="form-group">
                            <input
                                type="text"
                                name="start_date"
                                class="form-control"
                                value="{{$experience->start_date}}"

                            />
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">End Date *</label>
                        <div class="form-group">
                            <input
                                type="text"
                                name="end_date"
                                class="form-control"
                                value="{{$experience->end_date}}"

                            />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input
                                type="submit"
                                class="btn btn-primary"
                                value="Update"
                            />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection