@extends('front.layout.app')

@section('seo_title')
Tarification
@endsection

@section('seo_meta_description')
Tarification du portail d'emploi au Maroc
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
            <h2>Tarification</h2>
        </div>
    </div>
</div>
</div>
<div class="page-content pricing">
<div class="container">
    <div class="row pricing">
        @foreach($packages as $item)
            <div class="col-lg-4 mb_30">
                <div class="card mb-5 mb-lg-0">
                    <div class="card-body">
                        <h2 class="card-title">{{$item->package_name}}</h2>
                        <h3 class="card-price">{{$item->package_price}} DH</h3>
                        <h4 class="card-day">({{$item->package_days}} jours)</h4>
                        <hr />
                        <ul class="fa-ul">
                            <li>
                                @if($item->total_allowed_jobs > 0)
                                <span class="fa-li"><i class="fas fa-check"></i></span>
                                {{$item->total_allowed_jobs}} emploi autorisé
                                @elseif($item->total_allowed_jobs < 0)
                                <span class="fa-li"><i class="fas fa-check"></i></span>
                                Emplois illimités autorisés
                                @else
                                <span class="fa-li"><i class="fas fa-times"></i></span>
                                Aucun emploi autorisé
                                @endif
                            </li>
                            <li>
                                @if($item->total_allowed_featured_jobs > 0)
                                <span class="fa-li"><i class="fas fa-check"></i></span>
                                {{$item->total_allowed_featured_jobs}} Emplois en vedette
                                @elseif($item->total_allowed_featured_jobs < 0)
                                <span class="fa-li"><i class="fas fa-check"></i></span>
                                Emplois en vedette illimités
                                @else
                                <span class="fa-li"><i class="fas fa-times"></i></span>
                                Aucun emploi en vedette
                                @endif
                            </li>
                            <li>
                                @if($item->total_allowed_photos > 0)
                                <span class="fa-li"><i class="fas fa-check"></i></span>
                                {{$item->total_allowed_photos}} Photos de l'entreprise
                                @elseif($item->total_allowed_photos < 0)
                                <span class="fa-li"><i class="fas fa-check"></i></span>
                                Photos d'entreprise illimitées
                                @else
                                <span class="fa-li"><i class="fas fa-times"></i></span>
                                Aucune photo d'entreprise
                                @endif
                            </li>
                            <li>
                                @if($item->total_allowed_videos > 0)
                                <span class="fa-li"><i class="fas fa-check"></i></span>
                                {{$item->total_allowed_videos}} Vidéos de l'entreprise
                                @elseif($item->total_allowed_videos < 0)
                                <span class="fa-li"><i class="fas fa-check"></i></span>
                                Vidéos d'entreprise illimitées
                                @else
                                <span class="fa-li"><i class="fas fa-times"></i></span>
                                Aucune vidéo d'entreprise
                                @endif
                            </li>
                        </ul>
                        <div class="buy">
                            <a href="{{route('company_make_payment')}}" class="btn btn-primary">
                                Choisissez le plan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</div>
@endsection
    