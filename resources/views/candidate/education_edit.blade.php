@extends('front.layout.app')

@section('seo_title') 
    Modifier Formation
@endsection

@section('seo_meta_description') 
    
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
            <h2>Modifier Formation</h2>
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
            <a
                href="{{route('candidate_education')}}"
                class="btn btn-primary btn-sm mb-2"
                ><i class="fas fa-list"></i> Voir toutes</a
            >
            <form action="{{route('candidate_education_update',$education->id)}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Niveau d'éducation *</label>
                        <div class="form-group">
                            <input
                                type="text"
                                name="level"
                                class="form-control"
                                value="{{$education->level}}"
                            />
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Institut *</label>
                        <div class="form-group">
                            <input
                                type="text"
                                name="institute"
                                class="form-control"
                                value="{{$education->institute}}"
                            />
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Diplôme *</label>
                        <div class="form-group">
                            <input
                                type="text"
                                name="degree"
                                class="form-control"
                                value="{{$education->degree}}"

                            />
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Année d'obtention *</label>
                        <div class="form-group">
                            <input
                                type="number"
                                name="passing_year"
                                class="form-control"
                                value="{{$education->passing_year}}"

                            />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input
                                type="submit"
                                class="btn btn-primary"
                                value="Mettre à jour"
                            />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection