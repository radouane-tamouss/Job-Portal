@extends('admin.layout.app')

@section('heading', 'Home Page Content')

@section('main_content')

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row  custom-tab">

                            <div class="col-lg-2 col-md-12 mt-3">
                                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                  <button class="nav-link active" id="v-pills-1-tab" data-bs-toggle="pill" data-bs-target="#v-pills-1" type="button" role="tab" aria-controls="v-pills-1" aria-selected="true">Search</button>
                                  <button class="nav-link" id="v-pills-2-tab" data-bs-toggle="pill" data-bs-target="#v-pills-2" type="button" role="tab" aria-controls="v-pills-2" aria-selected="false">Category</button>
                                </div>
                            </div>
                            <div class="col-lg-10 col-md-12">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab" tabindex="0">
                                      {{-- Search Section Start --}}
                                          <div class="row">
                                              <div class="col-md-12">
                                                  <div class="mb-4">
                                                      <label class="form-label">Heading *</label>
                                                      <input type="text" class="form-control" name="heading" value="Find Your Hesired Job">
                                                  </div>
                                                  <div class="mb-4">
                                                      <label class="form-label">Text *</label>
                                                      <textarea name="text" class="form-control h_100" cols="30" rows="10">Search the best, perfect and suitable jobs that matches your skills in your expertise area.</textarea>
                                                  </div>
                                                  <div class="row">
                                                      <div class="col-lg-6 col-md-6">
                                                          <div class="mb-4">
                                                              <label class="form-label">Job title *</label>
                                                              <input type="text" class="form-control" name="" value="Job title">
                                                          </div>
                                                      </div>
                                                      <div class="col-lg-6 col-md-6">
                                                          <div class="mb-4">
                                                              <label class="form-label">Job Locations *</label>
                                                              <input type="text" class="form-control" name="" value="Job Location">
                                                          </div>
                                                      </div>
                                                  </div>
                  
                                                  <div class="row">
                                                      <div class="col-lg-6 col-md-6">
                                                          <div class="mb-4">
                                                              <label class="form-label">Job Category *</label>
                                                              <input type="text" class="form-control" name="" value="Job Category">
                                                          </div>
                                                      </div>
                                                      <div class="col-lg-6 col-md-6">
                                                          <div class="mb-4">
                                                              <label class="form-label">Search *</label>
                                                              <input type="text" class="form-control" name="" value="Search">
                                                          </div>
                                                      </div>
                                                  </div>
                                                  
                                                  <div class="mb-4">
                                                      <label class="form-label">Existng Background *</label>
                                                      <div>
                                                          <img src="{{asset('uploads/banner5.jpg')}}" alt="" class="w_300">
                                                      </div>
                                                  </div>
                                                  <div class="mb-4">
                                                      <label class="form-label">Change Background *</label>
                                                      <div>
                                                          <input type="file" class="form-control mt_10" name="photo">
                                                      </div>
                                                  </div>
                                                  
                                                  <div class="mb-4">
                                                      <label class="form-label"></label>
                                                      <button type="submit" class="btn btn-primary">Update</button>
                                                  </div>
                                                  
                                              </div>
                                          </div>
                                      {{-- Search Section end --}}
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab" tabindex="0">
                                      {{-- Category Section Start --}}
      
                                      {{-- Category Section end --}}
                                    </div>
      
                                  </div>
                            </div>

                            
                        </div>

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection