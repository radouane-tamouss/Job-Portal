@extends('front.layout.app')

@section('main_content')
<div class="slider" style="background-image: url({{asset('uploads/'.$page_home_data->background)}})">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="item">
                    <div class="text">
                        <h2>{{$page_home_data->heading}}</h2>
                        <p>
                            {!! $page_home_data->text !!}
                        </p>
                    </div>
                    <div class="search-section">
                        <form action="{{url('job-listing')}}" method="get"> <!-- we used here the get method!!!-->
                            <div class="inner">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <input
                                                type="text"
                                                name="title"
                                                class="form-control"
                                                placeholder="{{$page_home_data->job_title}}"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <select name="location" class="form-select select2">
                                            <option value="">
                                                {{$page_home_data->job_location}}
                                            </option>
                                            @foreach($job_locations_select as $item)
                                                <option value="{{$item->id}}">
                                                    {{$item->name}}
                                                </option>
                                            @endforeach 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <select name="category" class="form-select select2">
                                                <option value="">
                                                    {{$page_home_data->job_category}}
                                                </option>
                                                @foreach ($job_categories_select as $item)
                                                <option value="{{$item->id}}">
                                                    {{$item->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-search"></i>
                                            {{$page_home_data->search}}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="job-category">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Catégories d'emplois</h2>
                    <p>Obtenez la liste de toutes les catégories d'emplois populaires ici</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($job_categories as $item)
                
            <div class="col-md-4">
                <div class="item">
                    <div class="icon">
                        <i class="{{$item->icon}}"></i>
                    </div>
                    <h3>{{$item->name}}</h3>
                    <p>({{$item->r_job_count}} postes ouverts)</p>
                    <a href="{{url('job-listing?category='.$item->id)}}"></a>
                </div>
            </div>

            @endforeach

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="all">
                    <a href="{{route('job_categories')}}" class="btn btn-primary"
                        >Voir toutes les catégories</a
                    >
                </div>
            </div>
        </div>
    </div>
</div>

<div
    class="why-choose"
    style="background-image: url({{asset('uploads/banner3.jpg')}})"
>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Pourquoi nous choisir</h2>
                    <p>
                        Nos méthodes pour vous aider à construire votre carrière à l'avenir
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="inner">
                    <div class="icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <div class="text">
                        <h2>Candidature rapide</h2>
                        <p>
                            Vous pouvez simplement créer un compte sur notre site web et postuler rapidement à l'emploi de votre choix.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="inner">
                    <div class="icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="text">
                        <h2>Outil de recherche</h2>
                        <p>
                            Nous fournissons un outil de recherche parfait et avancé pour les chercheurs d'emploi, les employeurs ou les entreprises.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="inner">
                    <div class="icon">
                        <i class="fas fa-share-alt"></i>
                    </div>
                    <div class="text">
                        <h2>Meilleures entreprises</h2>
                        <p>
                            Les meilleures entreprises réputées à travers le monde sont enregistrées ici, vous permettant ainsi d'accéder à des emplois de qualité.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="job">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Emplois en avant</h2>
                    <p>Trouvez des emplois exceptionnels qui correspondent à vos compétences</p>
                </div>
            </div>
        </div>
        <div class="row">
            @php
                $i = 0;
            @endphp
            @foreach($featured_jobs as $job)
            {{-- @php
            $this_company_id = $job->rCompany->id;
            $order_data = \App\Models\Order::where('company_id',$this_company_id)->where('currently_active',1)->first();
            if(date('Y-m-d') > $order_data->expire_date){
                continue;
            }
            $i++;
            if($i>6){
                break;
            }
            @endphp --}}
            <div class="col-lg-6 col-md-12">
                <div class="item d-flex justify-content-start">
                    <div class="logo">
                        <img src="{{ asset('uploads/'.$job->rCompany->logo)}}" alt="" />
                    </div>
                    <div class="text">
                        <h3>
                            <a href="{{route('job',$job->id)}}">{{$job->title}} - {{$job->rCompany->company_name}}</a>
                        </h3>
                        <div
                            class="detail-1 d-flex justify-content-start"
                        >
                        <div class="category">
                            {{$job->rJobCategory->name}}
                        </div>
                        <div class="location">
                            {{$job->rJobLocation->name}}
                        </div>
                        </div>
                        <div
                            class="detail-2 d-flex justify-content-start"
                        >
                        <div class="date">
                            {{ $job->created_at->diffForHumans() }}
                      </div>
                      <div class="budget">
                            {{$job->rJobSalaryRange->name}}
                      </div>
                      <div class="{{ \Carbon\Carbon::parse($job->deadline) < now() ? 'expired' : '' }}">
                          {{ \Carbon\Carbon::parse($job->deadline) < now() ? 'Expired' : '' }}
                      </div>
                        </div>
                        <div
                            class="special d-flex justify-content-start"
                        >
                        @if ($job->is_featured)
                        <div class="featured">
                            En avant
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
                            <a href="{{route('candidate_bookmark_add',$job->id)}}"
                                ><i class="fas fa-bookmark {{$bookmark_status}}"></i
                            ></a>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="all">
                    <a href="{{route('job_listing')}}" class="btn btn-primary"
                    >Voir tous les emplois</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div
    class="testimonial"
    style="background-image: url({{ asset('uploads/banner11.jpg')}})"
>
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="main-header">Nos clients satisfaits</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="testimonial-carousel owl-carousel">
                    <div class="item">
                        <div class="photo">
                            <img src="{{ asset('uploads/t1.jpg')}}" alt="" />
                        </div>
                        <div class="text">
                            <h4>Robert Krol</h4>
                            <p>CEO, ABC Company</p>
                        </div>
                        <div class="description">
                            <p width="300px;">
                               Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium voluptatem
                                eveniet facere, recusandae odit repellat dignissimos hic pariatur porro, tenetur,
                                 praesentium veniam laudantium quia dolore nobis incidunt impedit autem qui.
                            </p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="photo">
                            <img src="{{ asset('uploads/t2.jpg')}}" alt="" />
                        </div>
                        <div class="text">
                            <h4>Sal Harvey</h4>
                            <p>Director, DEF Company</p>
                        </div>
                        <div class="description">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium voluptatem
                                eveniet facere, recusandae odit repellat dignissimos hic pariatur porro, tenetur,
                                 praesentium veniam laudantium quia dolore nobis incidunt impedit autem qui.
                                 Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium voluptatem
                                eveniet facere, recusandae odit repellat dignissimos hic pariatur porro, tenetur,
                                 praesentium veniam laudantium quia dolore nobis incidunt impedit autem qui.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Dernières actualités</h2>
<p>Consultez nos dernières actualités dans la section suivante</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($latest_posts as $item)
            <div class="col-lg-4 col-md-6">
                <div class="item">
                    <div class="photo">
                        <img src="{{ asset('uploads/'.$item->photo) }}" alt="" />
                    </div>
                    <div class="text">
                        <h2>
                            <a href="">{{$item->title}}</a>
                        </h2>
                        <div class="short-des">
                            <p>
                                {!! nl2br($item->short_description) !!}
                            </p>
                        </div>
                        <div class="button">
                            <a href="{{ route('post',$item->slug) }}" class="btn btn-primary"
                                >En savoir plus</a
                            >
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>  
@endsection