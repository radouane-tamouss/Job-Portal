@extends('front.layout.app')

@section('main_content')

<div class="page-top" style="background-image: url('{{asset('uploads/banner.jpg')}}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Liste des emplois</h2>
            </div>
        </div>
    </div>
</div>
<div class="job-result">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="job-filter">
                    <form action="{{url('job-listing')}}" method="get">
                        <div class="widget">
                            <h2>Titre du poste</h2>
                            <input type="text" name="title" class="form-control" placeholder="Rechercher les titres..." />
                        </div>
        
                        <div class="widget">
                            <h2>Emplacement de l'emploi</h2>
                            <select name="location" class="form-control select2">
                                <option value="">Sélectionner l'emplacement de l'emploi</option>
                                @foreach($job_locations as $item)
                                <option value="{{$item->id}}" @if ($form_location == $item->id) selected @endif>{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
        
                        <div class="widget">
                            <h2>Catégorie d'emploi</h2>
                            <select name="category" class="form-control select2">
                                <option value="">Sélectionner la catégorie d'emploi</option>
                                @foreach($job_categories as $item)
                                <option value="{{$item->id}}" @if ($form_category == $item->id) selected @endif>{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
        
                        <div class="widget">
                            <h2>Type d'emploi</h2>
                            <select name="job_type" class="form-control select2">
                                <option value="">Sélectionner le type d'emploi</option>
                                @foreach($job_types as $item)
                                <option value="{{$item->id}}" @if ($form_job_type == $item->id) selected @endif>{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
        
                        <div class="widget">
                            <h2>Expérience</h2>
                            <select name="experience" class="form-control select2">
                                <option value="">Sélectionner l'expérience</option>
                                @foreach($job_experiences as $item)
                                <option value="{{$item->id}}" @if ($form_job_experience == $item->id) selected @endif>{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
        
                        <div class="widget">
                            <h2>Genre</h2>
                            <select name="gender" class="form-control select2">
                                <option value="">Sélectionner le genre de l'emploi</option>
                                <option value="male" @if ($form_job_gender == 'male') selected @endif>Masculin</option>
                                <option value="female" @if ($form_job_gender == 'female') selected @endif>Féminin</option>
                                <option value="any" @if ($form_job_gender == 'any') selected @endif>Tous</option>
                            </select>
                        </div>
        
                        <div class="widget">
                            <h2>Fourchette de salaire</h2>
                            <select name="salary_range" class="form-control select2">
                                <option value="">Sélectionner la fourchette de salaire</option>
                                @foreach($job_salary_ranges as $item)
                                <option value="{{$item->id}}" @if ($form_salary_range == $item->id) selected @endif>{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
        
                        <div class="filter-button">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Filtrer </button>
                        </div>
        
                        <div class="advertisement">
                            <a href=""><img src="uploads/ad-2.png" alt="" /></a>
                        </div>
                    </form>
        
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="job">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="search-result-header">
                                        <i class="fas fa-search"></i> Résultat de la recherche pour "{{$form_title}}"
                                    </div>
                                </div>
                                @if($jobs->count() > 0)
                                @foreach($jobs as $job)
                                {{-- @php
                                    $this_company_id = $job->rCompany->id;
                                    $order_data = \App\Models\Order::where('company_id',$this_company_id)->where('currently_active',1)->first();
                                    if(date('Y-m-d') > $order_data->expire_date){
                                        continue;
                                    }
                                @endphp --}}
                                    <div class="col-md-12">
                                    <div class="item d-flex justify-content-start">
                                        <div class="logo">
                                            {{-- {{$this_company_id}}
                                            {{$order_data->expire_date}} --}}
                                            <img
                                                @if($job->rCompany->logo != '')
                                                src="{{asset('uploads/'.$job->rCompany->logo)}}"
                                                @else
                                                src="{{asset('uploads/default-company-logo.png')}}"
                                                @endif
                                                alt=""
                                            />
                                        </div>
                                        <div class="text">
                                            <h3>
                                                <a href="{{route('job',$job->id)}}">{{$job->title}} - {{$job->rCompany->company_name}}</a>
                                            </h3>
                                            <div class="detail-1 d-flex justify-content-start">
                                                <div class="category">
                                                    {{$job->rJobCategory->name}}
                                                </div>
                                                <div class="location">
                                                    {{$job->rJobLocation->name}}
                                                </div>
                                            </div>
                                            <div class="detail-2 d-flex justify-content-start">
                                                <div class="date">
                                                    {{ $job->created_at->diffForHumans() }}
                                                </div>
                                                <div class="budget">
                                                    {{$job->rJobSalaryRange->name}}
                                                </div>
                                                <div class="{{ \Carbon\Carbon::parse($job->deadline) < now() ? 'expired' : '' }}">
                                                    {{ \Carbon\Carbon::parse($job->deadline) < now() ? 'Expiré' : '' }}
                                                </div>
                                                {{-- @if(date('Y-m-d') > $job->deadline)
                                                <div class="expired">
                                                    Expiré
                                                </div>
                                                @endif --}}
                                            </div>
                                            <div class="special d-flex justify-content-start">
                                                @if ($job->is_featured)
                                                <div class="featured">
                                                    En vedette
                                                </div>
                                                @endif
                                                <div class="type">
                                                    {{$job->rJobType->name}}
                                                </div>
                                                @if($job->is_urgent)
                                                <div class="urgent">
                                                    Urgent
                                                </div>
                                                @endif
                                            </div>
                                            @if(!Auth::guard('company')->check())
                                            
                                            <div class="bookmark">
                                                @if(Auth::guard('candidate')->check())
        
                                                @php
                                                    $count = \App\Models\CandidateBookmark::where('candidate_id',Auth::guard('candidate')->user()->id)->where('job_id',$job->id)->count();
                                                    if($count > 0){
                                                        $bookmark_status = 'active';
                                                    }else{
                                                        $bookmark_status = '';
                                                    }
                                                @endphp 
        
                                                @else
                                                    @php
                                                        $bookmark_status = '';
                                                    @endphp
                                                @endif
                                                <a href="{{route('candidate_bookmark_add',$job->id)}}"><i class="fas fa-bookmark {{$bookmark_status}}"></i></a>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div> 
                                @endforeach
                                <div class="col-md-12">
                                    {{ $jobs->appends($_GET)->links()}}
                                </div>
                                @else
                                <div class="col-md-12 text-center">
                                    <h3>Désolé, aucun emploi correspondant à vos critères de recherche n'a été trouvé.</h3>
                                    <p>Essayez d'élargir votre recherche ou revenez plus tard pour de nouvelles offres d'emploi.</p>
                                </div>
                                @endif
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            @endsection




