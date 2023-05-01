@extends('front.layout.app')

@section('seo_title') 
    Candidate Education
@endsection

@section('seo_meta_description') 
    Candidate Education
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
                        <h2>Edit Profile</h2>
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
                        @if(count($educations) > 0)
                        <a
                            href="{{route('candidate_education_create')}}"
                            class="btn btn-primary btn-sm mb-2"
                            ><i class="fas fa-plus"></i> Add Item</a
                        >
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>SL</th>
                                        <th>Education Level</th>
                                        <th>Institute</th>
                                        <th>Degree</th>
                                        <th>Passing Year</th>
                                        <th class="w-100">Action</th>
                                    </tr>
                                    @foreach($educations as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->level}}</td>
                                        <td>{{$item->institute}}</td>
                                        <td>{{$item->degree}}</td>
                                        <td>{{$item->passing_year}}</td>
                                        <td>
                                            <a
                                                href="{{route('candidate_education_edit',$item->id)}}"
                                                class="btn btn-warning btn-sm text-white"
                                                ><i class="fas fa-edit"></i
                                            ></a>
                                            <a
                                                href="{{route('candidate_education_delete',$item->id)}}"
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
                            <h3>No education items available</h3>
                            <p>You haven't added any education items yet. Click the "Add Item" button above to get started.</p>
                            <a href="{{route('candidate_education_create')}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add Item</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
@endsection