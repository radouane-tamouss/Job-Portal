@extends('front.layout.app')

@section('seo_title') 
    Company Jobs
@endsection

@section('seo_meta_description') 
     company Jobs
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
            <h2>All Jobs</h2>
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
            <div class="table-responsive">
                @if ($order_data)
                    @if (date('Y-m-d') > $order_data->expire_date)
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">Forfait Expiré</h4>
                            <p class="mb-0">Désolé, votre forfait actuel a expiré le {{ \Carbon\Carbon::parse($order_data->expire_date)->format('j F Y') }}. Par conséquent, ces offres d'emploi ne sont pas actuellement visibles. Pour continuer à accéder à toutes les offres d'emploi et fonctionnalités, veuillez renouveler votre forfait en utilisant le lien ci-dessous.</p>
                            <hr>
                            <a class="btn btn-primary btn-sm" href="{{route('pricing')}}" role="button">Renouveler le Forfait</a>
                        </div>
                    @elseif ($jobs->isEmpty())
                        <div class="alert alert-info" role="alert">
                            <h4 class="alert-heading">Aucune Offre d'Emploi</h4>
                            <p class="mb-0">Il n'y a aucune offre d'emploi actuellement. Veuillez créer de nouvelles offres d'emploi pour les afficher ici.</p>
                        </div>
                    @else
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>SL</th>
                                    <th>Titre du poste</th>
                                    <th>Catégorie</th>
                                    <th>Emplacement</th>
                                    <th>Mis en avant ?</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($jobs as $job)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$job->title}}</td>
                                        <td>{{$job->rJobCategory->name}}</td>
                                        <td>{{$job->rJobLocation->name}}</td>
                                        <td>
                                            @if($job->is_featured == 1)
                                                <span class="badge bg-success">Mis en avant</span>
                                            @else
                                                <span class="badge bg-danger">Non mis en avant</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('company_edit_job',$job->id)}}" class="btn btn-warning btn-sm text-white">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{route('company_delete_job',$job->id)}}" class="btn btn-danger btn-sm" onClick="return confirm('Êtes-vous sûr ?');">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                @else
                    <div class="alert alert-info" role="alert">
                        <h4 class="alert-heading">Aucun Forfait</h4>
                        <p class="mb-0">Vous n'avez pas encore souscrit à un forfait. Pour accéder à toutes les offres d'emploi et fonctionnalités, veuillez choisir un plan en utilisant le lien ci-dessous.</p>
                        <hr>
                        <a class="btn btn-primary btn-sm" href="{{route('pricing')}}" role="button">Choisir un Forfait</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
</div>
</div>
@endsection