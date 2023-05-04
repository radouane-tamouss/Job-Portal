@extends('front.layout.app')

@section('seo_title') 
    Make Payment
@endsection

@section('seo_meta_description') 
     
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
            <h2>Payment</h2>
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
            <h4>Current Plan</h4>
            <div class="row box-items mb-4">
                <div class="col-md-4">
                    <div class="box1">
                        @if($current_plan == null)
                        <h4>No plans found</h4>
                        <p>Please choose a plan to start hiring.</p>
                        @else
                        <h4>{{$current_plan->rPackage->package_name}} - {{$current_plan->paid_amount}}$</h4>
                        <p>Your plan expires on {{$current_plan->expire_date}} </p> 
                      
                        @endif
                    </div>
                </div>
            </div>

            <h4>Choose Plan and Make Payment</h4>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                    <form action="{{route('company_paypal')}}" method="POST">
                    @csrf
                        <td>
                            <select name="package_id" class="form-select" id="">
                                @foreach ($packages as $item)
                                    <option value="{{$item->id}}">{{$item->package_name}} ({{$item->package_price}}$)</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-primary"
                                >Pay with Paypal
                            </button>
                        </td>
                    </tr>
                    </form>
                    <tr>
                    <form action="{{route('company_stripe')}}" method="POST">
                            @csrf
                        <td>
                            <select name="package_id" class="form-select" id="">
                                @foreach ($packages as $item)
                                    <option value="{{$item->id}}">{{$item->package_name}} ({{$item->package_price}}$)</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-primary"
                                >Pay with Card
                            </button>
                        </td>
                    </form>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

@endsection