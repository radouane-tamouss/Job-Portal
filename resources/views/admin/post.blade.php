@extends('admin.layout.app')

@section('heading', 'Posts')

@section('button')
<div>
    <a href="{{ route('admin_post_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</a>
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
                                <th>Photo</th>
                                <th>Heading</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/'.$item->photo) }}" alt="" class="w_150">
                                    </td>
                                    <td>{{ $item->heading }}</td>
                                    <td class="pt_10 pb_10">
                                        {{-- <a href="{{ route('admin_post_edit',$item->id) }}" class="btn btn-primary btn-sm">Edit</a> --}}
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}">
                                            Edit
                                          </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin_post_update',$item->id) }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group mb-3">
                                                            <label>Existing Photo</label>
                                                            <div>
                                                                <img src="{{ asset('uploads/'.$item->photo) }}" alt="" class="w_150">
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label>Change Photo</label>
                                                            <div>
                                                                <input class="form-control" type="file" name="photo">
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label>Heading *</label>
                                                            <input type="text" class="form-control" name="heading" value="{{ $item->heading }}">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label>Slug *</label>
                                                            <input type="text" class="form-control" name="slug" value="{{ $item->slug }}">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label>Short Description *</label>
                                                            <textarea name="short_description" class="form-control h_100" cols="30" rows="10">{{ $item->short_description }}</textarea>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label>Description *</label>
                                                            <textarea name="description" class="form-control editor" cols="30" rows="10">{{ $item->description }}</textarea>
                                                        </div>

                                                        <h4 class="seo_section">SEO Section</h4>
                                                        <div class="form-group mb-3">
                                                            <label>Title</label>
                                                            <input type="text" class="form-control" name="title" value="{{ $item->title }}">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label>Meta Description</label>
                                                            <textarea name="meta_description" class="form-control h_100" cols="30" rows="10">{{ $item->meta_description }}</textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <a href="{{ route('admin_post_delete',$item->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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