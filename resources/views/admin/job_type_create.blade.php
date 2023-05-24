@extends('admin.layout.app')

@section('heading','Créer un type d\'emploi')

@section('button')
    <div class="">
        <a href="{{route('admin_job_type')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Voir tous</a>
    </div>
@endsection

@section('main_content')

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin_job_type_store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Nom du type</label>
                            <input type="text" class="form-control" name="name" >
                        </div>
                        
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Soumettre</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
