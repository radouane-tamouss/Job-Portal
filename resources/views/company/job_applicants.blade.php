@extends('front.layout.app')

@section('seo_title') 
    Dashboard
@endsection

@section('seo_meta_description') 
    company dashbaord
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
                @include('company.sidebar')
            </div>
        </div>
        <div class="col-lg-9 col-md-12">
            <h4>Applications for "Senior Laravel Developer"</h4>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>See Resume</th>
                            <th>Reject</th>
                            <th>Action</th>
                        </tr>
                        @foreach($applicants as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->rCandidate->name}}</td>
                            <td>{{$item->rCandidate->email}}</td>
                            <td>{{$item->rCandidate->phone}}</td>
                            <td>
                                <a
                                    href="{{route('applicant_resume',$item->rCandidate->id)}}"
                                    target="_blank"
                                    class="btn btn-primary btn-sm"
                                    >See Resume</a
                                >
                            </td>
                            <td>
                                <a
                                    href=""
                                    class="btn btn-danger btn-sm"
                                    onClick="return confirm('Are you sure?');"
                                    >Reject</a
                                >
                            </td>
                            <td>
                                <a
                                    href="{{route('admin_candidate_applicant_delete',$item->id)}}"
                                    class="btn btn-danger btn-sm"
                                    onClick="return confirm('Are you sure?');"
                                    >Delete</a
                                >
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