@extends('admin.layout.app')

@section('heading','Catégories d\'emplois')

@section('button')
    <div class="">
        <a href="{{route('admin_job_category_create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</a>
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
                                    <th>Nom de la catégorie</th>
                                    <th>Icône de la catégorie</th>
                                    <th>Aperçu de l'icône</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($job_categories as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->icon}}</td>
                                        <td>
                                            <i class="{{ $item->icon }}"></i>
                                        </td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{route('admin_job_category_edit',$item->id)}}" class="btn btn-primary btn-sm">Modifier</a>
                                            <a href="{{route('admin_job_category_delete',$item->id)}}" class="btn btn-danger btn-sm" onClick="return confirm('T'es sûr ?');">Supprimer</a>
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