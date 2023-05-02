@extends('front.layout.app')

@section('seo_title') 
    Candidate Resumes
@endsection

@section('seo_meta_description') 
    Candidate Resumes
@endsection

@section('main_content')
<div
            class="page-top"
            style="background-image: url({{asset('uploads/banner.jpg')}})"
        >
            <div class="bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Resume List</h2>
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
                        @if(count($resumes) > 0)
                        <a
                            href="{{route('candidate_resume_create')}}"
                            class="btn btn-primary btn-sm mb-2"
                            ><i class="fas fa-plus"></i> Add Item</a
                        >
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>SL</th>
                                        <th>resume Name</th>
                                        <th>file</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach($resumes as $resume)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$resume->name}}</td>
                                        <td>
                                            <a href="{{asset('uploads/resumes/'.$resume->file)}}" target="_blank">{{$resume->file}}</a>
                                        </td>
                                        <td>
                                            <a
                                                href="{{route('candidate_resume_edit',$resume->id)}}"
                                                class="btn btn-warning btn-sm text-white"
                                                ><i class="fas fa-edit"></i
                                            ></a>
                                            <a
                                                href="{{route('candidate_resume_delete',$resume->id)}}"
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
                        @else
                        <div class="text-center">
                            <h3>No resumes available</h3>
                            <p>You haven't added any resumes yet. Click the "Add resume" button above to get started.</p>
                            <a href="{{route('candidate_resume_create')}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add resume</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
@endsection