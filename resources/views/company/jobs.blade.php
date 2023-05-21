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
style="background-image: url('{{asset('uploads/banner.jpg')}}')"
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
                @if(date('Y-m-d') > $order_data->expire_date)
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Package Expired</h4>
                    <p class="mb-0">Sorry, your current package has expired on {{ \Carbon\Carbon::parse($order_data->expire_date)->format('F j, Y') }}. As a result, these jobs are not currently visible. To continue accessing all job listings and features, please renew your package using the link below.</p>
                    <hr>
                    <a class="btn btn-primary btn-sm" href="{{route('pricing')}}" role="button">Renew Package</a>
                </div>
                                
                                
                @endif
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>SL</th>
                            <th>Job Title</th>
                            <th>Category</th>
                            <th>Location</th>
                            <th>Is Featured?</th>
                            <th>Action</th>
                        </tr>
                        @foreach($jobs as $job)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$job->title}}</td>
                            <td>{{$job->rJobCategory->name}}</td>
                            <td>{{$job->rJobLocation->name}}</td>
                            <td>
                                @if($job->is_featured == 1)
                                <span class="badge bg-success"
                                    >Featured</span
                                >
                                @else
                                <span class="badge bg-danger"
                                    >Not Featured</span
                                >
                                @endif
                            </td>
                            <td>
                                <a
                                    href="{{route('company_edit_job',$job->id)}}"
                                    class="btn btn-warning btn-sm text-white"
                                    ><i class="fas fa-edit"></i
                                ></a>
                                <a
                                    href="{{route('company_delete_job',$job->id)}}"
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