<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Order;
use App\Models\Package;
use App\Models\CompanyLocation;
use App\Models\CompanySize;
use App\Models\CompanyPhoto;
use App\Models\CompanyVideo;
use App\Models\CompanyIndustry;
use Auth;
use Illuminate\Validation\Rule;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class CompanyController extends Controller
{
    public function index(){
        return view('company.dashboard');
    }

 

    public function edit_profile(){
        $company_locations = CompanyLocation::OrderBy('name','asc')->get();
        $company_sizes = CompanySize::OrderBy('name','asc')->get();
        $company_industries = CompanyIndustry::OrderBy('name','asc')->get();
        return view('company.edit_profile',compact('company_locations','company_industries','company_sizes'));
    }

    public function edit_profile_update(Request $request){

        $obj = Company::where('id', Auth::guard('company')->user()->id)->first();
        $id = $obj->id;
        $request->validate([
            'company_name' => 'required',
            'person_name' => 'required',
            'username' => ['required','alpha_dash',Rule::unique('companies')->ignore($id)], 
            'email' => ['required','email',Rule::unique('companies')->ignore($id)],
            'company_location_id' => 'required',
            'company_size_id' => 'required',
            'founded_on' => 'required',
           
        ]);
        
        if($request->hasFile('logo')){
            $request->validate([
                'logo' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
            ]);

            if(Auth::guard('company')->user()->logo != ''){

                unlink(public_path('uploads/'.$obj->logo));
            }

            $ext = $request->file('logo')->extension();
            $final_name = 'company_logo'.time().'.'.$ext;
            $request->file('logo')->move(public_path('uploads/'),$final_name);

            $obj->logo = $final_name;
        }
        
        $obj->company_name = $request->company_name;
        $obj->person_name  = $request->person_name;
        $obj->username  = $request->username;
        $obj->description  = $request->description;
        $obj->email  = $request->email;
        $obj->phone  = $request->phone;
        $obj->address  = $request->address;
        $obj->company_location_id  = $request->company_location_id;
        $obj->company_size_id  = $request->company_size_id;
        $obj->company_industry_id  = $request->company_industry_id;
        $obj->founded_on  = $request->founded_on;
        $obj->oh_monday  = $request->oh_monday;
        $obj->oh_tuesday  = $request->oh_tuesday;
        $obj->oh_wednesday  = $request->oh_wednesday;
        $obj->oh_thursday  = $request->oh_thursday;
        $obj->oh_friday  = $request->oh_friday;
        $obj->oh_saturday  = $request->oh_saturday;
        $obj->oh_sunday  = $request->oh_sunday;
        $obj->map_code  = $request->map_code;
        $obj->website  = $request->website;
        $obj->facebook  = $request->facebook;
        $obj->twitter  = $request->twitter;
        $obj->linkedin  = $request->linkedin;
        $obj->instagram  = $request->instagram;
        $obj->youtube  = $request->youtube;
        
        $obj->update();
        return redirect()->back()->with('success', 'Company Profile Updated Successfully');
    }


    public function videos()
    {
        $order_data = Order::where('company_id',Auth::guard('company')->user()->id)->where('currently_active',1)->first();
        if($order_data != null) //check if any active order exists for this company
        {
            $package = $order_data->package_id;
            $package_data = Package::where('id',$order_data->package_id)->first();  
            $allowed_videos = $package_data->total_allowed_videos;
        }
        else{
            $allowed_videos = 0 ; //if no active order exists then allowed videos will be 0
        }
        
        

        $company_videos_number = CompanyVideo::where('company_id',Auth::guard('company')->user()->id)->count();
        
        $videos= CompanyVideo::where('company_id',Auth::guard('company')->user()->id)->get();
        return view('company.videos' , compact('videos','allowed_videos','company_videos_number'));
    }

    public function videos_submit(Request $request)
    {
       
        $request->validate([
            'video' => [
                'required',
                'url',
                'regex:/^(.*\.(mp4|mov|avi|wmv))|(https?:\/\/)?(www\.)?(youtube\.com|youtu\.be)\/.+$/i'
            ]
        ]);

        

        $obj = new CompanyVideo();


        $obj->video = $request->video;
       
        $obj->company_id = Auth::guard('company')->user()->id;
        $obj->save();

        return redirect()->back()->with('success','video link added succesffully');
    }

    public function video_delete($id){
        $vid = CompanyVideo::where('id',$id)->first();
        
        CompanyVideo::where('id',$id)->delete();
        return redirect()->route('company_videos')->with('success','video Deleted Succesfully!');
    }


    public function photos()
    {
        $order_data = Order::where('company_id',Auth::guard('company')->user()->id)->where('currently_active',1)->first();
        if($order_data != null) //check if any active order exists for this company
        {
            $package = $order_data->package_id;
            $package_data = Package::where('id',$order_data->package_id)->first();  
            $allowed_photos = $package_data->total_allowed_photos;
        }
        else{
            $allowed_photos = 0 ; //if no active order exists then allowed photos will be 0
        }
        $company_photos_number = CompanyPhoto::where('company_id',Auth::guard('company')->user()->id)->count();
        
        $photos= CompanyPhoto::where('company_id',Auth::guard('company')->user()->id)->get();
        return view('company.photos' , compact('photos','allowed_photos','company_photos_number'));
    }

    public function photos_submit(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif'
        ]);

        

        $obj = new CompanyPhoto();


        $ext = $request->file('photo')->extension();
        $final_name = 'company_photo_'.time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/companies_photos/'),$final_name);

        $obj->photo = $final_name;
        $obj->company_id = Auth::guard('company')->user()->id;
        $obj->save();

        return redirect()->back()->with('success','photo added succesffully');
    }

    public function photo_delete($id){
        $pic = CompanyPhoto::where('id',$id)->first();
        unlink(public_path('uploads/companies_photos/'.$pic->photo));
        CompanyPhoto::where('id',$id)->delete();
        return redirect()->route('company_photos')->with('success','Photo Deleted Succesfully!');
    }

    public function make_payment(){

        $current_plan = Order::with('rPackage')->where('company_id',Auth::guard('company')->user()->id)->where('currently_active',1)->first();//check if any active order exists
        $packages = Package::get();//get all packages
        return view('company.make_payment', compact('current_plan','packages'));
    }

    public function paypal(Request $request)
    {
        // $request->package_id;

        $signle_package_data = Package::where('id',$request->package_id)->first(); //get package data


        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('company_paypal_success'),
                "cancel_url" => route('company_paypal_cancel')
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $signle_package_data->package_price //get package price
                    ]
                ]
            ]
        ]);

        //dd($response);

        if(isset($response['id']) && $response['id']!=null) {
            foreach($response['links'] as $link) {
                if($link['rel'] === 'approve') {
                    session()->put('package_id', $signle_package_data->id);
                    session()->put('package_price', $signle_package_data->package_price);
                    session()->put('package_days', $signle_package_data->package_days);
                    return redirect()->away($link['href']);
                }
            }
        } else {
            return redirect()->route('company_paypal_cancel');
        }
    }

    public function orders()
    {
        $orders = Order::with('rPackage')->OrderBy('id','DESC')->where('company_id',Auth::guard('company')->user()->id)->get();
        return view('company.orders', compact('orders'));

    }

    public function paypal_success(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);

        //dd($response);

        if(isset($response['status']) && $response['status'] == 'COMPLETED') {

            

            $data['currently_active'] = 0;
            Order::where('company_id' ,Auth::guard('company')->user()->id)->update($data);

            
            $obj = new order();
            $obj->company_id = Auth::guard('company')->user()->id;
            $obj->package_id = session()->get('package_id');
            $obj->order_no = time();
            $obj->paid_amount = session()->get('package_price');
            $days = session()->get('package_days');
            $obj->start_date = date('Y-m-d');
            $obj->expire_date = date('Y-m-d', strtotime("+$days days"));
            $obj->currently_active = 1;
            $obj->payment_method = 'Paypal';
            $obj->save();
            
            session()->forget('package_id');
            session()->forget('package_price');
            session()->forget('package_days');

            return redirect()->route('company_make_payment')->with('succes','Payment is successful!');
        } else {
            return redirect()->route('company_paypal_cancel');
        }
    }

    public function paypal_cancel()
    {
        return redirect()->route('company_make_payment')->with('error','Payment is cancelled!');
    }



    // STRIPE PAYMENT

    public function stripe(Request $request)
    {
        $signle_package_data = Package::where('id',$request->package_id)->first(); //get package data

        
        \Stripe\Stripe::setApiKey(config('stripe.stripe_sk'));
        $response = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $signle_package_data->package_name
                        ],
                        'unit_amount' => $signle_package_data->package_price * 100 ,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('company_stripe_success'),
            'cancel_url' => route('company_stripe_cancel'),
        ]);

        session()->put('package_id', $signle_package_data->id);
        session()->put('package_price', $signle_package_data->package_price);
        session()->put('package_days', $signle_package_data->package_days);

        return redirect()->away($response->url);
        
    }

    public function stripe_success()
    {
        $data['currently_active'] = 0;
            Order::where('company_id' ,Auth::guard('company')->user()->id)->update($data);

            
            $obj = new order();
            $obj->company_id = Auth::guard('company')->user()->id;
            $obj->package_id = session()->get('package_id');
            $obj->order_no = time();
            $obj->paid_amount = session()->get('package_price');
            $days = session()->get('package_days');
            $obj->start_date = date('Y-m-d');
            $obj->expire_date = date('Y-m-d', strtotime("+$days days"));
            $obj->currently_active = 1;
            $obj->payment_method = 'Stripe';
            $obj->save();
            
            session()->forget('package_id');
            session()->forget('package_price');
            session()->forget('package_days');

         return redirect()->route('company_make_payment')->with('succes','Payment is successful!');
    }

    public function stripe_cancel()
    {
        return redirect()->route('company_make_payment')->with('error','Payment is cancelled!');

    }

    


}
