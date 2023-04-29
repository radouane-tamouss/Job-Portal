@extends('front.layout.app')

@section('seo_title') 
    Company videos
@endsection

@section('seo_meta_description') 
     company videos
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
                        <h2>Videos</h2>
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
                        @if($allowed_videos == 0)
                        <div class="row justify-content-center">
                            <div class="col-md-8 text-center">
                            <h3 class="mb-3">Upgrade Your Plan to Add Company videos</h3>
                            <p class="mb-4">Your current plan does not allow for any company videos. Upgrade your plan to unlock this feature and start showcasing your company's culture.</p>
                            <a href="{{route('pricing')}}" class="btn btn-primary">Upgrade Plan</a>
                            </div>
                        </div> 
                        @else 
                            @if($allowed_videos > $company_videos_number)
                            <h4>Add Video</h4>
                            <form action="{{route('company_videos_submit')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <p>total allowed videos for your plan is {{$allowed_videos}}</p>
                                            <input
                                                type="text"
                                                name="video"
                                                class="form-control"
                                                placeholder="Enter a valid youtube video link"
                                            />
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
                            @else
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">Limit Reached</h4>
                                <p class="mb-0">Sorry, you have reached the maximum number of photos allowed for your plan. To add more photos, please upgrade your plan using the link below.</p>
                                <hr>
                                <a class="btn btn-primary btn-sm" href="{{route('pricing')}}" role="button">Upgrade Plan</a>
                            </div>
                            @endif
                            
                            <h4 class="mt-4">Existing Videos</h4>
                            <div class="video-all">
                                @if($videos->count() == 0)
                                <div class="text-center">
                                    <div class="text-center">
                                        <i class="fas fa-video-slash fa-5x mb-3"></i>
                                        <h5 class="mb-4">No videos added yet</h5>
                                        <p class="text-muted">You have not added any videos yet</p>
                                    </div>
                                </div>
                                @endif
                            <div class="row">
                                @foreach ($videos as $item)
                                    <div class="col-md-6 col-lg-3">
                                        <div class="item my-1">
                                            <a class="video-button" href="{{$item->video}}">
                                                <?php
                                                // Match the video ID from the link
                                                preg_match('/(?<=v=|youtu\.be\/)[^\/]+/', $item->video, $videoId);

                                                if ($videoId) {
                                                    // Construct the URL of the thumbnail image
                                                    $thumbnailUrl = "http://img.youtube.com/vi/{$videoId[0]}/0.jpg";
                                                    
                                                    // Display the thumbnail image
                                                    echo '<img src="' . $thumbnailUrl . '" alt="">';
                                                } else {
                                                    // Handle the case where the video ID cannot be extracted from the link
                                                    echo 'Invalid video link';
                                                }
                                                ?>
                                                <div class="icon"><i class="far fa-play-circle"></i></div>
                                                <div class="bg"></div>
                                            </a>
                                            
                                        </div>
                                        <div class="delete-icon">
                                            <a href="{{route('company_video_delete', $item->id)}}" onClick="return confirm('Are you sure?');" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
@endsection