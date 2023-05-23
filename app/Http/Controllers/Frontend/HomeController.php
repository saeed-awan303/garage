<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostWorkDetails;
use App\Models\Category;
use App\Models\EngineCapacity;
use App\Models\FaqCategory;
use App\Models\FuelType;
use App\Models\Make;
use App\Models\MakeModel;
use App\Models\Mechanic;
use App\Models\Order;
use App\Models\OrderServiceCategory;
use App\Models\OrderTyre;
use App\Models\Service;
use App\Models\TyreDetail;
use App\Models\TyreProfile;
use App\Models\TyreRim;
use App\Models\TyreSpeed;
use App\Models\TyreWidth;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Stripe;
use Session;
class HomeController extends Controller
{
    public function index()
    {
        $faqCats=FaqCategory::with('faqs')->get();
        return view('frontend.home',compact('faqCats'));
    }
    public function howItWork()
    {
        return view('frontend.how-it-works');
    }
    public function about()
    {
        return view('frontend.about');
    }
    public function bookingCar(Request $request)
    {

        $makes = Make::all();
        $details=$request->session()->get('details');
        //return $details;
        return view('frontend.booking_car',compact('makes','details'));
    }
    public function postBookingCar(Request $request)
    {
        $validatedData = $request->validate([
            'make' => 'required|numeric',
            'model' => 'required|numeric',
            'fuel' => 'required|numeric',
            'year' => 'required|numeric',
            'postcode'=>'required'
        ]);
        if(empty($request->session()->get('details'))){
            $details=$validatedData;
            $request->session()->put('details', $details);
        }else{
            $details = $request->session()->get('details');
            $details=array_merge($details,$request->all());
            $request->session()->put('details', $details);
        }
        return redirect()->route('workdetails');
    }
    public function workDetails(Request $request)
    {
        $details=$request->session()->get('details');
        // dd($details);
        //dd($details['categories']);
        $services=Service::all();
        $categories=Category::where('parent_id',null)->inRandomOrder()->limit(5)->get();
        $mechanics=Mechanic::inRandomOrder()->limit(3)->get();
        $tyrewidths=TyreWidth::all();
        return view('frontend.work-details',compact('services','categories','details','mechanics','tyrewidths'));
    }
    public function postworkDetails(PostWorkDetails $request)
    {
        $details = $request->session()->get('details');
        $details=array_merge($details,$request->all());
        $request->session()->put('details', $details);
        return redirect()->route('bookingdetails');

    }
    public function bookingDetails(Request $request)
    {
        $details=$request->session()->get('details');
        return view('frontend.booking_details',compact('details'));
    }
    public function postBookingDetails(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required',
            'work_details' => 'required',
            'street_address_1'=>'required',
            'street_address_2'=>'required',
            'city'=>'required',
            'phone_number'=>'required',
            'seller_name'=>'required',
            'seller_phone_number'=>'required',
            'car_registration_number'=>'required',

        ]);

        $details=$request->session()->get('details');
        $details=array_merge($details,$request->all());
        $request->session()->put('details',$details);
        return redirect()->route('paymentdetails');
    }
    public function paymentDetails(Request $request)
    {
        $details=$request->session()->get('details');
        return view('frontend.booking_payment',compact('details'));
    }
    public function postPaymentDetails(Request $request)
    {
        $validateddata=([
            'name_on_card'=>'required|string',
            'card_number'=>'required',
            'cvc'=>'required',
            'expiry_month'=>'required',
            'expiry_year'=>'required',
        ]);
        $details=$request->session()->get('details');
        $details=array_merge($details,$validateddata);

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => round($details['total_price']),
                "currency" => "USD",
                "source" => $request->stripeToken,
                "description" => "This payment is testing purpose of webexert",
        ]);
        $order=new Order();
        $order->first_name=$details['first_name'];
        $order->last_name=$details['last_name'];
        $order->email=$details['email'];
        $order->phone_number=$details['phone_number'];
        $order->work_details=$details['work_details'];
        $order->street_address_1=$details['street_address_1'];
        $order->street_address_2=$details['street_address_2'];
        $order->city=$details['city'];
        $order->seller_name=$details['seller_name'];
        $order->seller_phone_number=$details['seller_phone_number'];
        $order->currency='$';
        $order->amount=$details['total_price'];
        $order->make_id=$details['make'];
        $order->make_model_id=$details['model'];
        $order->fuel_type_id=$details['fuel'];
        $order->save();
        if(isset($details['categories']))
        {
            foreach(json_decode($details['categories']) as $category)
            {
                $order_service_category=new OrderServiceCategory();
                $order_service_category->category_id=$category;
                $order_service_category->order_id=$order->id;
                $order_service_category->save();
            }
        }
        if(isset($details['tyres']))
        {
            foreach(json_decode($details['tyres']) as $tyre)
            {
                $order_tyre=new OrderTyre();
                $order_tyre->tyre_detail_id=$tyre;
                $order_tyre->order_id=$order->id;
                $order_tyre->save();
            }
        }
        $request->session()->forget('details');
        return view('frontend.thankyou');

    }
    public function paymentSuccess()
    {
        return view('frontend.thankyou');
    }
    public function fetchModel(Request $request)
    {
        $data['models'] = MakeModel::where("make_id", $request->make_id)
                                ->get(["title", "id"]);

        return response()->json($data);
    }
    public function fetchFuel(Request $request)
    {
        $data['fuels'] = FuelType::where("model_id", $request->model_id)
                                ->get(["title", "id"]);
        $data['engines'] = EngineCapacity::where("model_id", $request->model_id)
        ->get(["title", "id"]);

        return response()->json($data);
    }
    public function fetchProfile(Request $request)
    {
        $data['models'] = TyreProfile::where("tyre_widths_id", $request->make_id)
                                ->get(["title", "id"]);

        return response()->json($data);
    }
    public function fetchRim(Request $request)
    {
        $data['fuels'] = TyreRim::where("tyre_profiles_id", $request->model_id)
                                ->get(["title", "id"]);


        return response()->json($data);
    }
    public function fetchTyreList(Request $request)
    {
        $data=$request->all();
        $tyres=TyreDetail::where('tyre_width_id',$data['width'])->where('tyre_profile_id',$data['profile'])->where('tyre_rim_id',$data['rim'])->where('tyre_speed_id',$data['speed'])->get();
        return response()->json($tyres);
    }
    public function fetchCategories(Request $request)
    {
        $categoryArray=[];

            $categories=$request->jsonCategories;
            foreach($categories as $category)
            {
                $categoryArray[]=Category::findOrFail($category);
            }

        return response()->json($categoryArray);
    }
    public function fetchTyres(Request $request)
    {
        $tyresArray=[];

            $tyres=$request->jsontyres;
            foreach($tyres as $tyre)
            {
                $tyresArray[]=TyreDetail::findOrFail($tyre);
            }

        return response()->json($tyresArray);
    }

    public function getCategory(Request $request)
    {
        $data=$request->all();
        $search=$data['search'];
        $categories=Category::whereHas('services',function($query){
            $query->where('slug','repairs');
        })->where('title','LIKE',"%{$search}%")->get();
        return response()->json($categories);
    }
    public function fetchTyreProfile(Request $request)
    {
        $data=$request->all();
        $profiles=TyreProfile::where('tyre_widths_id',$data['tyre_width_id'])->get();

        return response()->json($profiles);
    }
    public function fetchTyreRim(Request $request)
    {
        $data=$request->all();
        $rims=TyreRim::where('tyre_profiles_id',$data['tyre_profiles_id'])->get();

        return response()->json($rims);
    }
    function fetchTyreSpeed(Request $request)
    {
        $data=$request->all();
        $speeds=TyreSpeed::where('tyre_rims_id',$data['tyre_rims_id'])->get();

        return response()->json($speeds);
    }
    public function addmechanic(){

        return view('frontend.add_mechanic');

    }
    public function storeMechanic(Request $request){
        $this->validate($request, [
		    'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|unique:mechanics',
            'post_code' => 'required|max:255',
            'password' => 'required|min:6',
            'retype_password' => 'required|same:password',
	    ]);
        $mechanic = Mechanic::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'postcode' => $request->post_code,
            'mobile_number' => $request->mobile,
            'password'=>Hash::make($request->password),
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
        ]);

        $request->session()->flash('success', 'Mechanics saved successfully');
	    return redirect()-route('fronthome');
    }


}
