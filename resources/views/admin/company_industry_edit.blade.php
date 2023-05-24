@extends('admin.layout.app')

@section('heading','Modifier company Industry')

@section('button')
    <div class="">
        <a href="{{route('admin_company_industry')}}" class="btn btn-primary"><i class="fas fa-plus"></i>Toutes les industries</a>
    </div>
@endsection

@section('main_content')

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin_company_industry_update', $company_industry_single->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Nom de l'industrie</label>
                            <input type="text" class="form-control" value="{{$company_industry_single->name}}" name="name" >
                        </div>
                        
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 