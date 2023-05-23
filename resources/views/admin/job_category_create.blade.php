@extends('admin.layout.app')

@section('heading','Créer une catégorie d\'emploi.')

@section('button')
    <div class="">
        <a href="{{route('admin_job_category')}}" class="btn btn-primary"><i class="fas fa-plus"></i>Afficher tout</a>
    </div>
@endsection

@section('main_content')

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin_job_category_store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Nom de la catégorie</label>
                            <input type="text" class="form-control" name="name" >
                        </div>
                        <div class="form-group mb-3">
                            <label>Icône de la catégorie</label>
                            <input type="text" class="form-control" name="icon">
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