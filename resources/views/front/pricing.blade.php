@extends('front.layout.app')

@section('seo_title') 
    Pricing
@endsection

@section('seo_meta_description') 
    Job Portal pricing morocco
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
            <h2>Pricing</h2>
        </div>
    </div>
</div>
</div>

<div class="page-content pricing">
<div class="container">
    <div class="row pricing">
        @foreach($packages as $item)
            <div class="col-lg-4 mb_30">
                <div class="card mb-5 mb-lg-0">
                    <div class="card-body">
                        <h2 class="card-title">{{$item->package_name}}</h2>
                        <h3 class="card-price">${{$item->package_price}}</h3>
                        <h4 class="card-day">({{$item->package_days}} Days)</h4>
                        <hr />
                        <ul class="fa-ul">
                            <li>
                                @if($item->total_allowed_jobs > 0)
                                <span class="fa-li"><i class="fas fa-check"></i></span>
                                {{$item->total_allowed_jobs}} Allowed Job
                                @elseif($item->total_allowed_jobs < 0)
                                <span class="fa-li"><i class="fas fa-check"></i></span>
                                Unlimited Allowed Jobs
                                @else
                                <span class="fa-li"><i class="fas fa-times"></i></span>
                                No Allowed Jobs
                                @endif

                            </li>
                            <li>
                                @if($item->total_allowed_featured_jobs > 0)
                                <span class="fa-li"><i class="fas fa-check"></i></span>
                                {{$item->total_allowed_featured_jobs}} Featured Jobs
                                @elseif($item->total_allowed_featured_jobs < 0)
                                <span class="fa-li"><i class="fas fa-check"></i></span>
                                Unlimited Featured Jobs
                                @else
                                <span class="fa-li"><i class="fas fa-times"></i></span>
                                No Featured Jobs
                                @endif
                            </li>
                            <li>
                                @if($item->total_allowed_photos > 0)
                                <span class="fa-li"><i class="fas fa-check"></i></span>
                                {{$item->total_allowed_photos}} Company Photos
                                @elseif($item->total_allowed_photos < 0)
                                <span class="fa-li"><i class="fas fa-check"></i></span>
                                Unlimited company photos
                                @else
                                <span class="fa-li"><i class="fas fa-times"></i></span>
                                No company photos
                                @endif
                            </li>
                            <li>
                                @if($item->total_allowed_videos > 0)
                                <span class="fa-li"><i class="fas fa-check"></i></span>
                                {{$item->total_allowed_videos}} Company Videos
                                @elseif($item->total_allowed_videos < 0)
                                <span class="fa-li"><i class="fas fa-check"></i></span>
                                Unlimited company vidoes
                                @else
                                <span class="fa-li"><i class="fas fa-times"></i></span>
                                No company videos
                                @endif
                            </li>
                        </ul>
                        <div class="buy">
                            <a href="{{route('company_make_payment')}}" class="btn btn-primary">
                                Choose Plan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</div>
    
@endsection