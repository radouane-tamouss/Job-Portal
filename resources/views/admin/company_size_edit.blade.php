@extends('admin.layout.app')

@section('heading','Edit company Size')

@section('button')
    <div class="">
        <a href="{{route('admin_company_size')}}" class="btn btn-primary"><i class="fas fa-plus"></i> View All</a>
    </div>
@endsection

@section('main_content')

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin_company_size_update', $company_size_single->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Taille</label>
                            <input type="text" class="form-control" value="{{$company_size_single->name}}" name="name" >
                        </div>
                        
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Mettre a jour</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 