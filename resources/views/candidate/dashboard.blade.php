@extends('front.layout.app')

@section('seo_title') 
    Dashboard
@endsection

@section('seo_meta_description') 
    Candidate dashbaord
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
            <h2>Dashboard</h2>
        </div>
    </div>
</div>
</div>

<div class="page-content user-panel">
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-12">
            <div class="card">
                @include('candidate.sidebar')
            </div>
        </div>
        <div class="col-lg-9 col-md-12">
            <h3>Hello, {{Auth::guard('candidate')->user()->name}}</h3>
            <p>See all the statistics at a glance:</p>

            <div class="row box-items">
                <div class="col-md-4">
                    <div class="box1">
                        <h4>{{$nb_applied_jobs}}</h4>
                        <p>Applied Jobs</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box2">
                        <h4>{{$nb_bookmarked_jobs}}</h4>
                        <p>Bookmarked Jobs</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box3">
                        <h4>{{$nb_approved_jobs}}</h4>
                        <p>Approved Jobs</p>
                    </div>
                </div>
            </div>

            <h3 class="mt-5">Recently Applied</h3>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>SL</th>
                            <th>Job Title</th>
                            <th>Company</th>
                            <th>Status</th>
                            <th class="w-100">Detail</th>
                        </tr>
                        @foreach($recently_applied_jobs as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->rJob->title}}</td>
                            <td>{{$item->rJob->rCompany->company_name}}</td>
                            <td>
                                @if($item->status == 'applied')
                                <div class="badge bg-primary">
                                    Applied
                                </div>
                                @elseif($item->status == 'approved')
                                <div class="badge bg-success">
                                    Approved
                                </div>
                                @else
                                <div class="badge bg-danger">
                                    Rejected
                                </div>
                                @endif
                                
                            </td>
                            <td>
                                <a
                                    href="{{route('job',$item->job_id)}}"
                                    class="btn btn-primary btn-sm text-white"
                                    ><i class="fas fa-eye"></i
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