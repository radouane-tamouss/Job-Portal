@extends('front.layout.app')

@section('seo_title') 
    Edit Profile
@endsection

@section('seo_meta_description') 
    company edit profile
@endsection

@section('main_content')
<div
class="page-top"
style="background-image: url({{asset('uploads/banner.jpg')}})"
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
                @include('company.sidebar')
            </div>
        </div>
        <div class="col-lg-9 col-md-12">
            <form action="{{route('company_edit_profile_update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Existing Logo</label>
                        @if(Auth::guard('company')->user()->logo == '')
                        <div class="form-group">
                            <img  src="{{asset('uploads/default-company-logo.png')}}" alt="default logo" class="logo"/>
                        </div>
                        @else
                        <div class="form-group">
                            <img  src="{{asset('uploads/'.Auth::guard('company')->user()->logo)}}" alt="" class="logo"/>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Change Logo</label>
                        <div class="form-group">
                            <input type="file" class="form-control" name="logo" />
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Company Name *</label>
                        <div class="form-group">
                            <input
                                type="text"
                                name="company_name"
                                class="form-control"
                                value="{{ old('company_name', Auth::guard('company')->user()->company_name) }}"
                            />
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Contact Person *</label>
                        <div class="form-group">
                            <input
                                type="text"
                                name="person_name"
                                class="form-control"
                                value="{{ old('person_name', Auth::guard('company')->user()->person_name) }}"
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
                                value="{{ old('username', Auth::guard('company')->user()->username) }}"

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
                                value="{{ old('email', Auth::guard('company')->user()->email) }}"
                                />
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Phone</label>
                        <div class="form-group">
                            <input
                                type="text"
                                name="phone"
                                class="form-control"
                                value="{{ old('phone', Auth::guard('company')->user()->phone) }}"

                            />
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Address</label>
                        <div class="form-group">
                            <input
                                type="text"
                                name="address"
                                class="form-control"
                                value="{{ old('address', Auth::guard('company')->user()->address) }}"

                            />
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Location *</label>
                        <div class="form-group">
                            <select
                                name="company_location_id"
                                class="form-control select2"
                                
                            >
                                <option value="">Please select a location</option>
                                @foreach($company_locations as $item)
                                <option value="{{$item->id}}" @if($item->id == Auth::guard('company')->user()->company_location_id) selected @endif> {{$item->name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    
                    <div class="col-md-6 mb-3">
                        <label for="">Company Size *</label>
                        <div class="form-group">
                            <select
                            name="company_size_id"
                            class="form-control select2"
                            >
                            <option value="">Please select a company size</option>
                            @foreach($company_sizes as $item)
                                <option value="{{$item->id}}"  @if($item->id == Auth::guard('company')->user()->company_size_id) selected @endif> {{$item->name}} </option>
                            @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Founded On *</label>
                        <div class="form-group">
                            <select
                                name="founded_on"
                                class="form-control select2"
                            >
                            <option value="">Please select a year</option>
                            @for($i=date('Y') ; $i>1600 ; $i--)
                            <option value="{{$i}}"  @if($i == Auth::guard('company')->user()->founded_on) selected @endif>{{$i}}</option>
                            @endfor
                            </select>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Industry *</label>
                        <div class="form-group">
                            <select
                            name="company_industry_id"
                            class="form-control select2"
                            >
                                <option value="">Please select an industry</option>
                                @foreach($company_industries as $item)
                                <option value="{{$item->id}} @if($i == Auth::guard('company')->user()->company_industry_id) selected @endif"> {{$item->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                   
                    
                    <div class="col-md-12 mb-3">
                        <label for="">About Company</label>
                        <textarea
                            name="description"
                            class="form-control"
                            cols="30"
                            rows="10"
                            >
                            {{Auth::guard('company')->user()->description}}
                        </textarea>
                        </div>
                        
                        
                        <div class="col-md-6 mb-3">
                            <label for="">Opening Hour (Monday)</label>
                        <div class="form-group">
                            <input
                                type="text"
                                name="oh_monday"
                                class="form-control"
                                value="{{ old('oh_monday', Auth::guard('company')->user()->oh_monday) }}"
                            />
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Opening Hour (Tuesday)</label>
                        <div class="form-group">
                            <input
                                type="text"
                                name="oh_tuesday"
                                class="form-control"
                                value="{{Auth::guard('company')->user()->oh_tuesday}}"
                            />
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for=""
                            >Opening Hour (Wednesday)</label
                        >
                        <div class="form-group">
                            <input
                                type="text"
                                name="oh_wednesday"
                                class="form-control"
                                value="{{Auth::guard('company')->user()->oh_wednesday}}"

                            />
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for=""
                            >Opening Hour (Thursday)</label
                        >
                        <div class="form-group">
                            <input
                                type="text"
                                name="oh_thursday"
                                class="form-control"
                                value="{{Auth::guard('company')->user()->oh_thursday}}"

                            />
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Opening Hour (Friday)</label>
                        <div class="form-group">
                            <input
                                type="text"
                                name="oh_friday"
                                class="form-control"
                                value="{{Auth::guard('company')->user()->oh_friday}}"

                            />
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for=""
                            >Opening Hour (Saturday)</label
                        >
                        <div class="form-group">
                            <input
                                type="text"
                                name="oh_saturday"
                                class="form-control"
                                value="{{Auth::guard('company')->user()->oh_saturday}}"

                            />
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Opening Hour (Sunday)</label>
                        <div class="form-group">
                            <input
                                type="text"
                                name="oh_sunday"
                                class="form-control"
                                value="{{Auth::guard('company')->user()->oh_sunday}}"

                            />
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Website</label>
                        <div class="form-group">
                            <input
                                type="text"
                                name="website"
                                class="form-control"
                                value="{{ old('website', Auth::guard('company')->user()->website) }}"
                                />
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for=""
                            >Location Map (Google Map Code)</label
                        >
                        <div class="form-group">
                            <textarea
                                name="map_code"
                                class="form-control h-150"
                                cols="30"
                                rows="10"
                            >
                        {{Auth::guard('company')->user()->map_code}}
                        </textarea>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Facebook link</label>
                        <div class="form-group">
                            <input
                                type="text"
                                name="facebook"
                                class="form-control"
                                value="{{ old('facebook', Auth::guard('company')->user()->facebook) }}"
                                />
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Twitter link</label>
                        <div class="form-group">
                            <input
                                type="text"
                                name="twitter"
                                class="form-control"
                                value="{{ old('twitter', Auth::guard('company')->user()->twitter) }}"
                                />
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">LinkedIn link</label>
                        <div class="form-group">
                            <input
                                type="text"
                                name="linkedin"
                                class="form-control"
                                value="{{ old('linkedin', Auth::guard('company')->user()->linkedin) }}"
                                />
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Instagram link</label>
                        <div class="form-group">
                            <input
                                type="text"
                                name="instagram"
                                class="form-control"
                                value="{{ old('instagram', Auth::guard('company')->user()->instagram) }}"
                                />
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Youtube link</label>
                        <div class="form-group">
                            <input
                                type="text"
                                name="youtube"
                                class="form-control"
                                value="{{Auth::guard('company')->user()->youtube}}"
                            />
                        </div>
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
            </form>
        </div>
    </div>
</div>
</div>
@endsection