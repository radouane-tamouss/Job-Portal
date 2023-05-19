@extends('admin.layout.app')

@section('heading','Send emails to subscribers')

@section('button')
    <div class="">
        <a href="{{route('admin-all-subscribers')}}" class="btn btn-primary"><i class="fas fa-eye mx-2"></i>View All Subscribers</a>
    </div>
@endsection

@section('main_content')

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    
                    <div class="row">
                    <form action="{{route('admin-subscriber-send-email-submit')}} " method="post">
                        @csrf
                        <div class="">
                            <label for="" class="form-label">Subject *</label>
                            <input
                                name="subject"
                                class="form-control"
                            >
                        </div>  
                        <div class="form-group">
                            <label for="" class="form-label">Message *</label>
                            <textarea
                                name="message"
                                class="form-control editor"
                                cols="30"
                                rows="40"
                                value="{{old('responsibilities')}}"
                            ></textarea>
                        </div>
                        <div class="form-group">

                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 