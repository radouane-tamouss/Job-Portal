@extends('front.layout.app')

@section('seo_title') 
    Bookmarked Jobs
@endsection

@section('seo_meta_description') 
    Candidate bookmarked jobs
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
            <h2>Offres d'emploi postulées</h2>
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
            <div class="table-responsive">
                <table class="table table-bordered">
                    @if (count($applied_jobs) > 0)
                        <tbody>
                            <tr>
                                <th>N°</th>
                                <th>Intitulé du poste</th>
                                <th>Entreprise</th>
                                <th>Statut</th>
                                <th>Lettre de motivation</th>
                                <th class="w-100">Détails</th>
                            </tr>
                            @foreach ($applied_jobs as $item)
                                @if ($item->rJob && $item->rJob->rCompany)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->rJob->title }}</td>
                                        <td>{{ $item->rJob->rCompany->company_name }}</td>
                                        <td>
                                            @if ($item->status == 'applied')
                                                <div class="badge bg-primary">
                                                    Postulé
                                                </div>
                                            @elseif ($item->status == 'approved')
                                                <div class="badge bg-success">
                                                    Approuvé
                                                </div>
                                            @else
                                                <div class="badge bg-danger">
                                                    Rejeté
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $item->id }}"><i class="fas fa-comment"></i></a>
                                            <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Lettre de motivation</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {!! nl2br($item->cover_letter) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('job', $item->job_id) }}"
                                                class="btn btn-primary btn-sm text-white"><i class="fas fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    @endif
                </table>
                
                @if (count($applied_jobs) == 0)
                    <div class="text-center">
                        <h3>Aucune offre d'emploi postulée disponible</h3>
                        <p>Vous n'avez pas encore postulé à des offres d'emploi. Cliquez sur le bouton "Postuler à un emploi" pour postuler à une nouvelle offre d'emploi !.</p>
                    </div>
                @endif
                
            </div>
        </div>
    </div>
</div>
</div>
@endsection