@extends('front.layout.app')

@section('seo_title'){{ $post->title }}@endsection
@section('seo_meta_description'){{ $post->meta_description }}@endsection

@section('main_content')
<div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $post->heading }}</h2>
            </div>
        </div>
    </div>
</div>

<script
    type="text/javascript"
    src="https://platform-api.sharethis.com/js/sharethis.js#property=5993ef01e2587a001253a261&product=inline-share-buttons"
    async="async"
></script>

<div class="page-content">
    <div class="container">
        
        <div class="row justify-content-center">

            <div class="col-lg-9">
                
                <div class="featured-photo">
                    <img src="{{ asset('uploads/'.$post->photo) }}" alt="" />
                </div>
                <div class="sub">
                    <div class="item">
                        <b><i class="fa fa-clock-o"></i></b>
                      
                        {{$post->created_at->format('d F, Y');}}  
                    </div>
                    <div class="item">
                        <b><i class="fa fa-eye"></i></b>
                        {{ $post->total_view }}
                    </div>
                </div>
                <div class="main-text">
                    {!! $post->description !!}
                </div>
            </div>
            <div class="col-lg-3 d-none d-lg-block">
                <div class="sticky-side-banner">
                    <img src="{{ asset('uploads/ad-2.gif') }}" alt="" width="300" />
                </div>
            </div>
        </div>
    </div>
</div>


@endsection