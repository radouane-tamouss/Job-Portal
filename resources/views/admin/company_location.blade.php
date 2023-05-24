@extends('admin.layout.app')

@section('heading','Localités de l\'entreprise')

@section('button')
    <div class="">
        <a href="{{route('admin_company_location_create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Voir toutes les localités</a>
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
                                    <th>Nom de la localité</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($company_locations as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->name}}</td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{route('admin_company_location_edit',$item->id)}}" class="btn btn-primary btn-sm">Modifier</a>
                                            <a href="{{route('admin_company_location_delete',$item->id)}}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');">Supprimer</a>
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