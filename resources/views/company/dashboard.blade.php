@extends('front.layout.app')

@section('seo_title') 
    Dashboard
@endsection

@section('seo_meta_description') 
    company dashbaord
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
            <h2>Dashboard</h2>
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
            <h3>Bonjour, {{ Auth::guard('company')->user()->person_name }} ({{ Auth::guard('company')->user()->company_name }})</h3>
            <p>Consultez toutes les statistiques en un coup d'œil :</p>

            @if ($order_data)
                @if (date('Y-m-d') > $order_data->expire_date)
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Forfait Expiré</h4>
                        <p class="mb-0">Votre forfait actuel a expiré le {{ \Carbon\Carbon::parse($order_data->expire_date)->format('j F Y') }}. Pour continuer à accéder à toutes les fonctionnalités, veuillez renouveler votre forfait en utilisant le lien ci-dessous.</p>
                        <hr>
                        <a class="btn btn-primary btn-sm" href="{{ route('pricing') }}" role="button">Renouveler le Forfait</a>
                    </div>
                @endif
            @else
                <div class="alert alert-info" role="alert">
                    <h4 class="alert-heading">Aucun Forfait</h4>
                    <p class="mb-0">Vous n'avez pas encore souscrit à un forfait. Veuillez choisir un plan en utilisant le lien ci-dessous pour accéder à toutes les fonctionnalités.</p>
                    <hr>
                    <a class="btn btn-primary btn-sm" href="{{ route('pricing') }}" role="button">Choisir un Forfait</a>
                </div>
        
                
               
            @endif
            <div class="row box-items">
                <div class="col-md-4">
                    <div class="box1">
                        <h4>{{$opened_jobs}}</h4>
                        <p>Open Jobs</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box2">
                        <h4>{{$featured_jobs}}</h4>
                        <p>Featured Jobs</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box3">
                        <h4>{{$urgent_jobs}}</h4>
                        <p>Urgent Jobs</p>
                    </div>
                </div>
            </div>

            <h3 class="mt-5">Recent Jobs</h3>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>SL</th>
                            <th>Job Title</th>
                            <th>Category</th>
                            <th>Location</th>
                            <th>Is Featured?</th>
                            <th>Is Urgent?</th>

                       
                        </tr>
                        @foreach($jobs as $job)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$job->title}}</td>
                            <td>{{$job->rJobCategory->name}}</td>
                            <td>{{$job->rJobLocation->name}}</td>
                            <td>
                                @if($job->is_featured == 1)
                                <span class="badge bg-success"
                                    >Featured</span
                                >
                                @else
                                <span class="badge bg-danger"
                                    >Not Featured</span
                                >
                                @endif
                            </td>
                            <td>
                                @if($job->is_urgent == 1)
                                <span class="badge bg-danger"
                                    >Urgent</span
                                >
                                @else
                                <span class="badge bg-primary"
                                    >Not Urgent</span
                                >
                                @endif
                            </td>
                           
                        </tr>
                        @endforeach
                       
                     
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection