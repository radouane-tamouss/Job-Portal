@extends('front.layout.app')

@section('seo_title') 
Modifier le mot de passe
@endsection

@section('seo_meta_description') 
Modifier le mot de passe
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
            <h2>Modifier le mot de passe</h2>
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
            <form action="{{route('candidate_edit_password_update')}}" method="POST">
                @csrf
                <div class="row">
                    

                    
                   
                    <div class="col-md-12 mb-3">
                        <label for=""
                            >Ancien mot de passe *</label
                        >
                        <div class="form-group">
                            <input
                                type="password"
                                name="old_password"
                                class="form-control"
                              

                            />
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="new_password">Nouveau mot de passe *</label>
                        <div class="form-group">
                            <input
                                type="password"
                                name="new_password"
                                class="form-control"
                              

                            />
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Confirmer mot de passe *</label>
                        <div class="form-group">
                            <input
                                type="password"
                                name="password_confirmation"
                                class="form-control"
                              

                            />
                        </div>
                    </div>
                  

                    
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <input
                            type="submit"
                            class="btn btn-primary"
                            value="Mettre à jour"
                        />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection