@extends('admin.layout.app')

@section('heading','Ajouter un localité d\'entrepris')

@section('button')
    <div class="">
        <a href="{{route('admin_company_location')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Voir tous les localités</a>
    </div>
@endsection

@section('main_content')

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin_company_location_store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Nom de la localité</label>
                            <input type="text" class="form-control" name="name" >
                        </div>
                        
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 