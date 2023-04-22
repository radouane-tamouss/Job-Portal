 @extends('admin.layout.app')

 @section('heading','Packages')

 @section('button')
    <div class="">
        <a href="{{route('admin_package_create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</a>
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
                                        <th>Package Name</th>
                                        <th>Package Price</th>
                                        {{-- <th>Package Days</th> --}}
                                        {{-- <th>Package Display Time</th> --}}
                                        {{-- <th>total allowed jobs</th>
                                        <th>total allowed featured jobs</th>
                                        <th>total allowed photos</th>
                                        <th>total allowed videos</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($packages as $item)
                                        <td>{{ $loop->iteration}}</td>
                                        <td>{{ $item->package_name}}</td>
                                        <td>{{ $item->package_price}}</td>
                                        {{-- <td>{{ $item->package_days}}</td> --}}
                                        {{-- <td>{{ $item->package_display_time}}</td> --}}
                                        {{-- <td>{{ $item->total_allowed_jobs}}</td>
                                        <td>{{ $item->total_allowed_featured_jobs}}</td>
                                        <td>{{ $item->total_allowed_photos}}</td>
                                        <td>{{ $item->total_allowed_videos}}</td> --}}

                                        <td class="pt_10 pb_10">
                                            <a href="{{route('admin_package_edit',$item->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="{{route('admin_package_delete',$item->id)}}" onClick="return confirm('Are you sure?');" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                           
                                    </tbody>
                                    @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection