@extends('front.layout.app')

@section('seo_title') 
    Dashboard
@endsection

@section('seo_meta_description') 
    Candidate dashbaord
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
                        <h2>Edit Profile</h2>
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
                        <form action="{{route('candidate_edit_profile_update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="">Existing Photo</label>
                                    <div class="form-group">
                                        @if($candidate->photo == '')
                                        <img
                                            src="{{asset('uploads/default-candidate.png')}}"
                                            alt=""
                                            class="user-photo"
                                        />
                                        @else
                                        <img
                                            src="{{asset('uploads/'.$candidate->photo)}}"
                                            alt=""
                                            class="user-photo"
                                        />
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="photo-upload" class="form-label">Change Photo</label>
                                    <input type="file" name="photo" id="photo-upload" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Name *</label>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            name="name"
                                            class="form-control"
                                            value="{{$candidate->name}}"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Username *</label>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            name="username"
                                            class="form-control"
                                            value="{{$candidate->username}}"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Email *</label>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            name="email"
                                            class="form-control"
                                            value="{{$candidate->email}}"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Designation *</label>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            name="designation"
                                            class="form-control"
                                            value="{{$candidate->designation}}"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Biography *</label>
                                    <textarea
                                        name="biography"
                                        class="form-control editor"
                                        cols="30"
                                        rows="10"
                                    >
                                    {{$candidate->biography}}
                                </textarea>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="">Phone *</label>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            name="phone"
                                            class="form-control"
                                            value="{{$candidate->phone}}"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Country *</label>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            name="country"
                                            class="form-control"
                                            value="{{$candidate->country}}"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Address *</label>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            name="address"
                                            class="form-control"
                                            value="{{$candidate->address}}"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">City *</label>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            name="city"
                                            class="form-control"
                                            value="{{$candidate->city}}"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Gender *</label>
                                    <div class="form-group">
                                        <select
                                            name="gender"
                                            class="form-control select2"
                                        >
                                            <option value="male" @if($candidate->gender == 'male') selected @endif>Male</option>
                                            <option value="female"@if($candidate->gender == 'female') selected @endif>Female</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- <div class="col-md-6 mb-3">
                                    <label for="">Marital Status *</label>
                                    <div class="form-group">
                                        <select
                                            name=""
                                            class="form-control select2"
                                        >
                                            <option value="">Married</option>
                                            <option value="">Unmarried</option>
                                        </select>
                                    </div>
                                </div> --}}
                                <div class="col-md-6 mb-3">
                                    <label for="">Date of Birth *</label>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            name="date_of_birth"
                                            class="form-control datepicker"
                                            value="{{$candidate->date_of_birth}}"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Website</label>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            name="website"
                                            class="form-control"
                                            value="{{$candidate->website}}"
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