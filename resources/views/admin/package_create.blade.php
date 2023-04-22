@extends('admin.layout.app')

@section('heading','Create Package')

@section('button')
    <div class="">
        <a href="{{route('admin_package')}}" class="btn btn-primary"><i class="fas fa-eye"></i> View All</a>
    </div>
@endsection

@section('main_content')

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin_package_store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Package Name *</label>
                                    <input type="text" class="form-control" name="package_name" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Package Price *</label>
                                    <input type="number" class="form-control" name="package_price">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Package Days *</label>
                                    <input type="number" class="form-control" name="package_days">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Display Time *</label>
                                    <input type="text" class="form-control" name="package_display_time">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Total allowed jobs</label>
                                    <input type="number" class="form-control" name="total_allowed_jobs">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Total allowed featured jobs</label>
                                    <input type="number" class="form-control" name="total_allowed_featured_jobs" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Total allowed photos</label>
                                    <input type="number" class="form-control" name="total_allowed_photos">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Total allowed videos</label>
                                    <input type="number" class="form-control" name="total_allowed_videos">
                                </div>
                            </div>
                        </div>
                       
                        
                        
                        
                        
                       
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 