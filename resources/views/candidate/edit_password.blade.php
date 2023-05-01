@extends('front.layout.app')

@section('seo_title') 
    Edit Password
@endsection

@section('seo_meta_description') 
    candidate edit Password
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
            <h2>Edit Password</h2>
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
            <form action="{{route('candidate_edit_password_update')}}" method="POST">
                @csrf
                <div class="row">
                    

                    
                   
                    <div class="col-md-12 mb-3">
                        <label for=""
                            >Old Password *</label
                        >
                        <div class="form-group">
                            <input
                                type="text"
                                name="old_password"
                                class="form-control"
                              

                            />
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">New Password *</label>
                        <div class="form-group">
                            <input
                                type="password"
                                name="new_password"
                                class="form-control"
                              

                            />
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Confirm Password *</label>
                        <div class="form-group">
                            <input
                                type="password"
                                name="password_confirmation"
                                class="form-control"
                              

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