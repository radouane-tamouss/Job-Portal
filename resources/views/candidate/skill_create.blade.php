@extends('front.layout.app')

@section('seo_title') 
Ajouter Compétence
@endsection

@section('seo_meta_description') 
Ajouter Compétence
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
                        <h2>Ajouter Compétence</h2>
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
                            href="candidate-skill.html"
                            class="btn btn-primary btn-sm mb-2"
                            ><i class="fas fa-plus"></i> mes Compétences</a
                        >
                        <form action="{{route('candidate_skill_store')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="">Compétence *</label>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            name="name"
                                            class="form-control"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Pourcentage *</label>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            name="percentage"
                                            class="form-control"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input
                                            type="submit"
                                            class="btn btn-primary"
                                            value="Ajouter"
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