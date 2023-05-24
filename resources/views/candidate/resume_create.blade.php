@extends('front.layout.app')

@section('seo_title') 
    Ajouter Document
@endsection

@section('seo_meta_description') 
    Ajouter Document
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
                        <h2>Ajouter Document</h2>
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
                            href="{{route('candidate_resume')}}"
                            class="btn btn-primary btn-sm mb-2"
                            ><i class="fas fa-plus"></i> Voir toutes</a
                        >
                        <form action="{{route('candidate_resume_store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="">Nom de document *</label>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            name="name"
                                            class="form-control"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">fichier *</label>
                                    <div class="form-group">
                                        <input
                                            type="file"
                                            name="file"
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