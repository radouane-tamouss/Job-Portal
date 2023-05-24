@extends('front.layout.app')

@section('seo_title') 
    Mes Documents
@endsection

@section('seo_meta_description') 
    Mes Documents
@endsection

@section('main_content')
<div
            class="page-top"
            style="background-image: url({{asset('uploads/banner.jpg')}})"
        >
            <div class="bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Mes documents</h2>
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
                        @if(count($resumes) > 0)
                        
<a href="{{route('candidate_resume_create')}}" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i> Ajouter un document</a>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>SL</th>
                                        <th>Nom du document</th>
                                        <th>Fichier</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach($resumes as $resume)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$resume->name}}</td>
                                        <td>
                                            <a href="{{asset('uploads/resumes/'.$resume->file)}}" target="_blank">{{$resume->file}}</a>
                                        </td>
                                        <td>
                                            <a
                                                href="{{route('candidate_resume_edit',$resume->id)}}"
                                                class="btn btn-warning btn-sm text-white"
                                                ><i class="fas fa-edit"></i
                                            ></a>
                                            <a
                                                href="{{route('candidate_resume_delete',$resume->id)}}"
                                                class="btn btn-danger btn-sm"
                                                onClick="return confirm('Are you sure?');"
                                                ><i class="fas fa-trash-alt"></i
                                            ></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                   
                                </tbody>
                            </table>
                        </div>
                        @else
                        <div class="text-center">
                            <h3>Aucun document disponible</h3>
                            <p>Vous n'avez ajouté aucun document pour le moment. Cliquez sur le bouton "Ajouter un nouveau document" ci-dessus pour commencer.</p>
                            <a href="{{route('candidate_resume_create')}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Ajouter un Document</a>
                        </div>
                        
                        
                        
                        
                        @endif
                    </div>
                </div>
            </div>
        </div>
@endsection