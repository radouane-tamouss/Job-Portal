@extends('admin.layout.app')

@section('heading','Expériences professionnelles')

@section('button')
    <div class="">
        <a href="{{route('admin_job_experience_create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Ajouter</a>
    </div>
@endsection

@section('main_content')

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example1">
                                <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Expérience</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($job_experiences as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->name}}</td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{route('admin_job_experience_edit',$item->id)}}" class="btn btn-primary btn-sm">Modifier</a>
                                            <a href="{{route('admin_job_experience_delete',$item->id)}}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');">Supprimer</a>
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
</div>
@endsection 
