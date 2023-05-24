@extends('front.layout.app')

@section('seo_title') 
    Postuler pour {{$job->title}}
@endsection

@section('seo_meta_description') 
Postuler pour {{$job->title}}
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
            <h2>Postuler pour : {{$job->title}} </h2>
            <div class="button">
                <a href="{{route('job',$job->id)}}" class="btn btn-primary btn-sm"
                    >Voir les détails du poste</a
                >
            </div>
        </div>
    </div>
</div>
</div>

<div class="job-apply">
<div class="container">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <div class="apply-form">
                <form action="{{route('candidate_apply_submit',$job->id)}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="cover letter" class="mb-1"
                            >Lettre de motiviation *</label
                        >
                        <textarea
                            class="form-control"
                            name="cover_letter"
                            rows="3"
                        ></textarea>
                        <div class="clearfix"></div>
                    </div>
                    <div class="mb-3">
                        <button
                            type="submit"
                            class="btn btn-primary btn-sm"
                        >
                        Confirmer la candidature
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection