@extends('front.layout.app')

@section('seo_title') 
    Company Photos
@endsection

@section('seo_meta_description') 
     company photos
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
            <h2>Photos</h2>
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

                @if($allowed_photos == 0)
                <div class="alert alert-danger" role="alert">
                    @if($allowed_photos == null)
                    <div class="row justify-content-center">
                        <div class="col-md-8 text-center">
                            <h3 class="mb-3">Upgrade Your Plan to Add Company Photos</h3>
                            <p class="mb-4">Your current plan does not allow for any company photos. Upgrade your plan to unlock this feature and start showcasing your company's culture.</p>
                            <a href="{{route('pricing')}}" class="btn btn-primary">Upgrade Plan</a>
                        </div>
                    </div>
                   
                    @else
                    <h4 class="alert-heading">Limit Reached</h4>
                    <p class="mb-0">Sorry, you have reached the maximum number of jobs allowed for your plan ({{$allowed_photos}} jobs). To add more jobs, please delete unused jobs or upgrade your plan using the link below.</p>
                    <hr>
                    <a class="btn btn-primary btn-sm" href="{{route('pricing')}}" role="button">Upgrade Plan</a>
                    @endif
                </div>
                
                
                @else 
                @if($allowed_photos > $company_photos_number and date('Y-m-d') < $order_data->expire_date)
                <h4>Add Photo</h4>
                <form action="{{route('company_photos_submit')}}" method="post"  enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                {{-- <label for="">{{$order_data->expire_date}}</label> --}}
                                <p>total allowed photos for your plan is {{$allowed_photos}}</p>
                                <input class="form-control" type="file" name="photo" />
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <input
                                type="submit"
                                class="btn btn-primary btn-sm"
                                value="Submit"
                            />
                        </div>
                    </div>
                </form>
                @elseif(date('Y-m-d') > $order_data->expire_date)
                <div class="alert alert-danger" role="alert">

                    <h4 class="alert-heading">Package Expired</h4>
                    <p class="mb-0">Sorry, your current package has expired on  {{ \Carbon\Carbon::parse($order_data->expire_date)->format('F j, Y') }}. To continue accessing all features, please renew your package using the link below.</p>
                    <hr>
                    <a class="btn btn-primary btn-sm" href="{{route('pricing')}}" role="button">Renew Package</a>
                </div>
               
                @else
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Limit Reached</h4>
                        <p class="mb-0">Sorry, you have reached the maximum number of photos allowed for your plan. To add more photos, please upgrade your plan using the link below.</p>
                        <hr>
                        <a class="btn btn-primary btn-sm" href="{{route('pricing')}}" role="button">Upgrade Plan</a>
                    </div>
                @endif

                <h4 class="mt-4">Existing Phodos</h4>
                @if($photos->count() == 0)
                    <div class="text-center">
                        <div class="text-center">
                            <i class="far fa-image fa-5x mb-3"></i>
                            <h5 class="mb-4">No photos added yet</h5>
                            <p class="text-muted">You have not added any photos yet</p>
                        </div>
                    </div>                        
                @endif
                <div class="photo-all">
                    <div class="row">
                        @foreach($photos as $item)
                        <div class="col-md-6 col-lg-3">
                            <div class="item">
                                <a href="{{asset('uploads/companies_photos/'.$item->photo)}}" class="magnific">
                                    <img src="{{asset('uploads/companies_photos/'.$item->photo)}}" alt="" />
                                    <div class="bg"></div> 
                                </a>
                            
                                <div class="delete-icon">
                                    <a href="{{route('company_photo_delete',$item->id)}}" onClick="return confirm('Are you sure?');" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                </div>
                            </div>
                        </div>
                        
                        <style>
                            .delete-icon {
                                display: none;
                                position: absolute;
                                top: 50%;
                                left: 50%;
                                transform: translate(-50%, -50%);
                            }
                            .item:hover .delete-icon {
                                display: block;
                            }
                        </style>
                        
                        @endforeach
                        
                    </div>
                </div>
            </div>
            @endif

        

        </div>
    </div>
</div>
@endsection