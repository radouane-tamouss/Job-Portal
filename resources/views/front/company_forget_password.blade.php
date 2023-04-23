@extends('front.layout.app')

@section('seo_title') 
    Forget Password
@endsection

@section('seo_meta_description') 
    Job Portal forget password
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
            <h2>Forget Password</h2>
        </div>
    </div>
</div>
</div>

<div class="page-content">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
            <div class="login-form">
                <form action="{{route('company_forget_password_submit')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Email Address</label>
                        <input type="text" class="form-control" name="email"/>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary bg-website">
                            Submit
                        </button>
                        <a href="{{route('login')}}" class="primary-color" >Back to Login Page</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection