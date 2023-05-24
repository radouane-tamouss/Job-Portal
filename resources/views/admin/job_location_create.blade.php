@section('heading','Créer un lieu de travail')

@section('button')
<div class="">
<a href="{{route('admin_job_location')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Voir tous</a>
</div>
@endsection

@section('main_content')

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin_job_location_store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Nom du lieu</label>
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