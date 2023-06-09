@extends('front.layout.app')

@section('seo_title')
Vidéos d'entreprise
@endsection

@section('seo_meta_description')
Vidéos d'entreprise
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
                        <h2>Vidéos</h2>
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
                        @if($allowed_videos == 0)
                        <div class="alert alert-danger" role="alert">
                            @if($allowed_videos == null)
                            <div class="row justify-content-center">
                                <div class="col-md-8 text-center">
                                  <h3 class="mb-3">Mettez à niveau votre plan pour ajouter des vidéos d'entreprise</h3>
                                  <p class="mb-4">Votre plan actuel ne permet pas d'ajouter de vidéos d'entreprise. Mettez à niveau votre plan pour débloquer cette fonctionnalité et commencer à présenter la culture de votre entreprise.</p>
                                  <a href="{{route('pricing')}}" class="btn btn-primary">Mettre à niveau le plan</a>
                                </div>
                            </div>
                            @else
                            <h4 class="alert-heading">Limite atteinte</h4>
                            <p class="mb-0">Désolé, vous avez atteint le nombre maximum de vidéos autorisées pour votre plan ({{$allowed_photos}} vidéos). Pour ajouter plus de vidéos, veuillez supprimer les vidéos inutilisées ou mettre à niveau votre plan en utilisant le lien ci-dessous.</p>
                            <hr>
                            <a class="btn btn-primary btn-sm" href="{{route('pricing')}}" role="button">Mettre à niveau le plan</a>
                            @endif
                        </div>
                    </div>
                        @else 
                            @if($allowed_videos > $company_videos_number and date('Y-m-d') < $order_data->expire_date )
                            <h4>Ajouter une vidéo</h4>
                            <form action="{{route('company_videos_submit')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <p>Le nombre total de vidéos autorisées pour votre plan est de {{$allowed_videos}}</p>
                                            <input
                                                type="text"
                                                name="video"
                                                class="form-control"
                                                placeholder="Entrez un lien vidéo YouTube valide"
                                            />
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input
                                            type="submit"
                                            class="btn btn-primary btn-sm"
                                            value="Soumettre"
                                        />
                                    </div>
                                </div>
                            </form>
                            @elseif(date('Y-m-d') > $order_data->expire_date)
                                <div class="alert alert-danger" role="alert">
    
                                    <h4 class="alert-heading">Forfait expiré</h4>
                                    <p class="mb-0">Désolé, votre forfait actuel a expiré le  {{ \Carbon\Carbon::parse($order_data->expire_date)->format('j F Y') }}. Pour continuer à accéder à toutes les fonctionnalités, veuillez renouveler votre forfait en utilisant le lien ci-dessous.</p>
                                    <hr>
                                    <a class="btn btn-primary btn-sm" href="{{route('pricing')}}" role="button">Renouveler le forfait</a>
                                </div>
                            @else
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">Limite atteinte</h4>
                                <p class="mb-0">Désolé, vous avez atteint le nombre maximum de photos autorisées pour votre plan. Pour ajouter plus de photos, veuillez mettre à niveau votre plan en utilisant le lien ci-dessous.</p>
                                <hr>
                                <a class="btn btn-primary btn-sm" href="{{route('pricing')}}" role="button">Mettre à niveau le plan</a>
                            </div>
                            @endif
                            
                            <h4 class="mt-4">Vidéos existantes</h4>
                            <div class="video-all">
                                @if($videos->count() == 0)
                                <div class="text-center">
                                    <div class="text-center">
                                        <i class="fas fa-video-slash fa-5x mb-3"></i>
                                        <h5 class="mb-4">Aucune vidéo ajoutée pour le moment</h5>
                                        <p class="text-muted">Vous n'avez ajouté aucune vidéo pour le moment</p>
                                    </div>
                                </div>
                                @endif
                            <div class="row">
                                @foreach ($videos as $item)
                                    <div class="col-md-6 col-lg-3">
                                        <div class="item my-1">
                                            <a class="video-button" href="{{$item->video}}">
                                                <img src="http://img.youtube.com/vi/{{ substr($item->video, -11) }}/0.jpg" alt=""/>
                                                <div class="icon"><i class="far fa-play-circle"></i></div>
                                                <div class="bg"></div>
                                            </a>
                                            
                                        </div>
                                        <div class="delete-icon">
                                            <a href="{{route('company_video_delete', $item->id)}}" onClick="return confirm('Êtes-vous sûr ?');" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @endsection




