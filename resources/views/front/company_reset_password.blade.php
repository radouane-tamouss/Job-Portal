@extends('front.layout.app')

@section('seo_title') 
    Reset Password
@endsection

@section('seo_meta_description') 
    Job Portal Reset Password
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
            <h2>Reset Password</h2>
        </div>
    </div>
</div>
</div>

<div class="page-content">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
            <div class="login-form">
                <form action="{{route('company_reset_password_submit')}}" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{$token}}">
                    <input type="hidden" name="email" value="{{$email}}">
                    <div class="mb-3">
                        <label for="" class="form-label">Nouveau mot de passe</label>
                        <input type="password" class="form-control" name="password"/>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Confirmez le nouveau mot de passe</label>
                        <input type="password" class="form-control" name="retype_password"/>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary bg-website">
                            Soumettre
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection