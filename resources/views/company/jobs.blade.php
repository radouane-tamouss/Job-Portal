@extends('front.layout.app')

@section('seo_title') 
    Company Jobs
@endsection

@section('seo_meta_description') 
     company Jobs
@endsection

@section('main_content')
<div
class="page-top"
style="background-image: url('uploads/banner.jpg')"
>
<div class="bg"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>All Jobs</h2>
        </div>
    </div>
</div>
</div>

<div class="page-content user-panel">
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-12">
            <div class="card">
                  @include('company.sidebar')
            </div>
        </div>
        <div class="col-lg-9 col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>SL</th>
                            <th>Job Title</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach($jobs as $job)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$job->title}}</td>
                            <td>{{$job->rJobCategory->name}}</td>
                            <td>
                                <span class="badge bg-success"
                                    >Active</span
                                >
                            </td>
                            <td>
                                <a
                                    href=""
                                    class="btn btn-warning btn-sm text-white"
                                    ><i class="fas fa-edit"></i
                                ></a>
                                <a
                                    href=""
                                    class="btn btn-danger btn-sm"
                                    onClick="return confirm('Are you sure?');"
                                    ><i class="fas fa-trash-alt"></i
                                ></a>
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
@endsection