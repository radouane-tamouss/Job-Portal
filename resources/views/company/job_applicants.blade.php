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
                            <th>Cover Letter</th>
                            <th>Status</th>
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
                                <form action="{{route('application_change_status')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="applicant_id" value="{{$item->id}}">
                               
                                    {{-- <input type="hidden" name="candidate_id"> --}}
                                    <select name="status" id="" class="form-control select2 w_100" onchange="this.form.submit()">
                                        <option value="">Select</option>
                                        <option value="applied">Applied</option>
                                        <option value="approved"  class="">Approve</option>
                                        <option value="rejected"  class="">Reject</option>
                                    </select>
                                </form>
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