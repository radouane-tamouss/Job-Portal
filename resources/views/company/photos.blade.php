@extends('front.layout.app')

@section('seo_title')
Photos de l'entreprise
@endsection

@section('seo_meta_description')
Photos de l'entreprise
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
            <h2>Photos</h2>
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
                @if($allowed_photos == 0)
                <div class="alert alert-danger" role="alert">
                    @if($allowed_photos == null)
                    <div class="row justify-content-center">
                        <div class="col-md-8 text-center">
                            <h3 class="mb-3">Mettez à niveau votre plan pour ajouter des photos d'entreprise</h3>
                            <p class="mb-4">Votre plan actuel ne permet pas d'ajouter de photos d'entreprise. Mettez à niveau votre plan pour débloquer cette fonctionnalité et commencer à présenter la culture de votre entreprise.</p>
                            <a href="{{route('pricing')}}" class="btn btn-primary">Mettre à niveau le plan</a>
                        </div>
                    </div>
                   
                    @else
                    <h4 class="alert-heading">Limite atteinte</h4>
                    <p class="mb-0">Désolé, vous avez atteint le nombre maximum de photos autorisées pour votre plan ({{$allowed_photos}} photos). Pour ajouter plus de photos, veuillez supprimer les photos inutilisées ou mettre à niveau votre plan en utilisant le lien ci-dessous.</p>
                    <hr>
                    <a class="btn btn-primary btn-sm" href="{{route('pricing')}}" role="button">Mettre à niveau le plan</a>
                    @endif
                </div>
                
                
                @else 
                @if($allowed_photos > $company_photos_number and date('Y-m-d') < $order_data->expire_date)
                <h4>Ajouter une photo</h4>
                <form action="{{route('company_photos_submit')}}" method="post"  enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                {{-- <label for="">{{$order_data->expire_date}}</label> --}}
                                <p>Le nombre total de photos autorisées pour votre plan est de {{$allowed_photos}}</p>
                                <input class="form-control" type="file" name="photo" />
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
    
                <h4 class="mt-4">Photos existantes</h4>
                @if($photos->count() == 0)
                    <div class="text-center">
                        <div class="text-center">
                            <i class="far fa-image fa-5x mb-3"></i>
                            <h5 class="mb-4">Aucune photo ajoutée pour le moment</h5>
                            <p class="text-muted">Vous n'avez ajouté aucune photo pour le moment</p>
                        </div>
                    </div>                        
                @endif
                <div class="photo-all">
                    <div class="row">
                        @foreach($photos as $item)
                        <div class="col-md-6 col-lg-3">
                            <div class="item">
                                <a href="{{asset('uploads/companies_photos/'.$item->photo)}}" class="magnific">
                                    <img src="{{asset('uploads/companies_photos/'.$item->photo)}}" alt="" />
                                    <div class="bg"></div> 
                                </a>
                            
                                <div class="delete-icon">
                                    <a href="{{route('company_photo_delete',$item->id)}}" onClick="return confirm('Êtes-vous sûr ?');" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                </div>
                            </div>
                        </div>
                        
                        <style>
                            .delete-icon {
                                display: none;
                                position: absolute;
                                top: 50%;
                                left: 50%;
                                transform: translate(-50%, -50%);
                            }
                            .item:hover .delete-icon {
                                display: block;
                            }
                        </style>
                        
                        @endforeach
                        
                    </div>
                </div>
            </div>
            @endif
    
        
    
        </div>
    </div>
</div>
@endsection