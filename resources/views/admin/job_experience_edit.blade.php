@extends('admin.layout.app')

@section('heading','Modifier l\'expérience professionnelle')

@section('button')
    <div class="">
        <a href="{{route('admin_job_experience')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Voir tout</a>
    </div>
@endsection

@section('main_content')

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin_job_experience_update', $job_experience_single->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Nom de l'expérience</label>
                            <input type="text" class="form-control" value="{{$job_experience_single->name}}" name="name" >
                        </div>
                        
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Mattre à jour</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
