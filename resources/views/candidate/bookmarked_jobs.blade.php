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
            style="background-image: url('{{asset('uploads/banner.jpg')}}')"
        >
            <div class="bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Bookmarked Jobs</h2>
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
                            @if(count($bookmarked_jobs)>0)
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>SL</th>
                                        <th>Job Title</th>
                                        <th>Deadline</th>
                                        <th>Company</th>
                                        <th class="w-100">Detail</th>
                                    </tr>
                                    @foreach($bookmarked_jobs as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->rJob->title}}</td>
                                        <td>{{$item->rJob->deadline}}</td>
                                        <td>{{$item->rJob->rCompany->company_name}}</td>
                                        <td>
                                            <a
                                                href="{{route('job',$item->job_id)}}"
                                                class="btn btn-primary btn-sm text-white"
                                                ><i class="fas fa-eye"></i
                                            ></a>
                                            <a
                                                href="{{route('bookmark_delete',$item->id)}}"
                                                class="btn btn-danger btn-sm text-white"
                                                ><i class="fas fa-trash"></i
                                            ></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                    
                                </tbody>
                            </table>
                            @else
                            <div class="text-center">
                                <h3>No bookmarked jobs available</h3>
                                <p>You haven't bookmarked any jobs yet. Click the "Bookmark Job" button to save jobs for later.</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection