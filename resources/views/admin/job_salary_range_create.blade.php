@extends('admin.layout.app')

@section('heading','Create Job Salary Range')

@section('button')
    <div class="">
        <a href="{{route('admin_job_salary_range')}}" class="btn btn-primary"><i class="fas fa-plus"></i> View All</a>
    </div>
@endsection

@section('main_content')

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin_job_salary_range_store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Salary Range Name</label>
                            <input type="text" class="form-control" name="name" >
                        </div>
                        
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 