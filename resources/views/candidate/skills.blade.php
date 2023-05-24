@extends('front.layout.app')

@section('seo_title') 
    Compétences
@endsection

@section('seo_meta_description') 
compétences de candidat
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
                        <h2>Mes compétences</h2>
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
                        @if(count($skills) > 0)
                        <a href="{{route('candidate_skill_create')}}" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i> Ajouter une compétence</a>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>SL</th>
                                        <th>Nom de la compétence</th>
                                        <th>Pourcentage</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach($skills as $skill)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$skill->name}}</td>
                                        <td>{{$skill->percentage}}</td>
                                        <td>
                                            <a
                                                href="{{route('candidate_skill_edit',$skill->id)}}"
                                                class="btn btn-warning btn-sm text-white"
                                                ><i class="fas fa-edit"></i
                                            ></a>
                                            <a
                                                href="{{route('candidate_skill_delete',$skill->id)}}"
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
                            <h3>Aucune compétence disponible</h3>
                            <p>Vous n'avez ajouté aucune compétence. Cliquez sur le bouton "Ajouter une compétence" ci-dessus pour commencer.</p>
                            <a href="{{route('candidate_skill_create')}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Ajouter une compétence</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
@endsection