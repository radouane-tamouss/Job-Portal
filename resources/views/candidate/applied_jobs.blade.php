@extends('front.layout.app')

@section('seo_title') 
    Bookmarked Jobs
@endsection

@section('seo_meta_description') 
    Candidate bookmarked jobs
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
            <h2>Applied Jobs</h2>
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
            <div class="table-responsive">
                <table class="table table-bordered">
                    @if(count($applied_jobs) > 0)
                    <tbody>
                        <tr>
                            <th>SL</th>
                            <th>Job Title</th>
                            <th>Company</th>
                            <th>Status</th>
                            <th>Cover Letter</th>
                            <th class="w-100">Detail</th>
                        </tr>
                        @foreach($applied_jobs as $item)
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
                                <a href="" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}"><i class="fas fa-comment"></i
                                    ></a>
                                <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Cover Letter</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                {!! nl2br($item->cover_letter) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                    @else
                    <div class="text-center">
                        <h3>No Applied jobs available</h3>
                        <p>You haven't Applied any jobs yet. Click the "Apply Job" button to apply for a new job!.</p>
                    </div>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection