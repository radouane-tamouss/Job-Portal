@extends('admin.layout.app')

@section('heading','Subscribers')

@section('button')
    <div class="">
        <a href="{{route('admin-subscriber-send-email')}}" class="btn btn-primary"><i class="fas fa-plus"></i>Send Email To All</a>
    </div>
@endsection

@section('main_content')

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example1">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Email</th> 
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($subscribers as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->email}}</td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{route('admin-subscriber-delete',$item->id)}}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');">Delete</a>
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
</div>
@endsection 