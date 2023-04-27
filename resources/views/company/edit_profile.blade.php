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
style="background-image: url('uploads/banner.jpg')"
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
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Existing Logo</label>
                        @if(Auth::guard('company')->user()->logo == '')
                        <div class="form-group">
                            <img  src="{{asset('uploads/default-company-logo.png')}}" alt="" class="logo"/>
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
                            <input type="file" name="logo" />
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Company Name *</label>
                        <div class="form-group">
                            <input
                                type="text"
                                name="company_name"
                                class="form-control"
                                value="{{Auth::guard('company')->user()->company_name}}"
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
                                value="{{Auth::guard('company')->user()->person_name}}"
                            />
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Username</label>
                        <div class="form-group">
                            <input
                                type="text"
                                name="username"
                                class="form-control"
                                value="{{Auth::guard('company')->user()->username}}"
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
                                value="{{Auth::guard('company')->user()->email}}"
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
                                value="{{Auth::guard('company')->user()->phone}}"
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
                                value="{{Auth::guard('company')->user()->address}}"
                            />
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Location</label>
                        <div class="form-group">
                            <select
                                name="company_location_id"
                                class="form-control select2"
                            >
                                @foreach($company_locations as $item)
                                <option value="{{$item->name}}"> {{$item->name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Website</label>
                        <div class="form-group">
                            <input
                                type="text"
                                name="website"
                                class="form-control"
                                value="{{Auth::guard('company')->user()->website}}"
                            />
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Company Size</label>
                        <div class="form-group">
                            <select
                                name=""
                                class="form-control select2"
                            >
                                <option value="">
                                    2-5 Persons
                                </option>
                                <option value="" selected>
                                    5-10 Persons
                                </option>
                                <option value="">
                                    10-20 Persons
                                </option>
                                <option value="">
                                    20-50 Persons
                                </option>
                                <option value="">
                                    50-100 Persons
                                </option>
                                <option value="">
                                    100+ Persons
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Founded On</label>
                        <div class="form-group">
                            <select
                                name=""
                                class="form-control select2"
                            >
                                <option value="">2018</option>
                                <option value="">2019</option>
                                <option value="" selected>
                                    2020
                                </option>
                                <option value="">2021</option>
                                <option value="">2022</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Industry</label>
                        <div class="form-group">
                            <select
                                name=""
                                class="form-control select2"
                            >
                                <option value="">
                                    Accounting Firm
                                </option>
                                <option value="">IT Firm</option>
                                <option value="">Law Firm</option>
                                <option value="">
                                    Real Estate Company
                                </option>
                                <option value="" selected>
                                    Software Company
                                </option>
                            </select>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">About Company</label>
                        <textarea
                            name=""
                            class="form-control editor"
                            cols="30"
                            rows="10"
                        >
His cu nobis populo, eum laoreet evertitur te. In tollit audire adolescens vix. Ad veri admodum quo. Ea pri cetero timeam probatus, dicunt principes vel ut.</textarea
                        >
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Opening Hour (Monday)</label>
                        <div class="form-group">
                            <input
                                type="text"
                                name=""
                                class="form-control"
                                value="9:00 AM to 5:00 PM"
                            />
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Opening Hour (Tuesday)</label>
                        <div class="form-group">
                            <input
                                type="text"
                                name=""
                                class="form-control"
                                value="9:00 AM to 5:00 PM"
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
                                name=""
                                class="form-control"
                                value="9:00 AM to 5:00 PM"
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
                                name=""
                                class="form-control"
                                value="9:00 AM to 5:00 PM"
                            />
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Opening Hour (Friday)</label>
                        <div class="form-group">
                            <input
                                type="text"
                                name=""
                                class="form-control"
                                value="9:00 AM to 5:00 PM"
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
                                name=""
                                class="form-control"
                                value="9:00 AM to 5:00 PM"
                            />
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Opening Hour (Sunday)</label>
                        <div class="form-group">
                            <input
                                type="text"
                                name=""
                                class="form-control"
                                value="9:00 AM to 5:00 PM"
                            />
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for=""
                            >Location Map (Google Map Code)</label
                        >
                        <div class="form-group">
                            <textarea
                                name=""
                                class="form-control h-150"
                                cols="30"
                                rows="10"
                            >
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387190.2799198932!2d-74.25987701513004!3d40.69767006272707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1645362221879!5m2!1sen!2sbd" width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy"></iframe>
</textarea
                            >
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Facebook</label>
                        <div class="form-group">
                            <input
                                type="text"
                                name=""
                                class="form-control"
                                value="https://www.facebook.com/"
                            />
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Twitter</label>
                        <div class="form-group">
                            <input
                                type="text"
                                name=""
                                class="form-control"
                                value="https://www.twitter.com/"
                            />
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Linkedin</label>
                        <div class="form-group">
                            <input
                                type="text"
                                name=""
                                class="form-control"
                                value="https://www.linkedin.com/"
                            />
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Instagram</label>
                        <div class="form-group">
                            <input
                                type="text"
                                name=""
                                class="form-control"
                                value="https://www.instagram.com/"
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