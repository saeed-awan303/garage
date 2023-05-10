<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Make;
use App\Models\MakeModel;
use App\Models\Profile;
use App\Models\FuelType;
use App\Models\EngineCapacity;
use App\Models\Category;
use App\Models\Service;
use App\Models\TyreWidth;
use App\Models\TyreProfile;
use App\Models\TyreSpeed;
use App\Models\TyreRim;
use App\Models\Mechanic;

class HomeControllerold extends Controller
{
    public function index(){

        $title = "title";
        $makes = Make::all();
        return view('frontend.homeold',compact('title','makes'));
    }

    public function create_next2(REquest $request){
        // dd($request->all());
        $title = "title";
        $services = Service::with('category')->get();
        $widths = TyreWidth::all();
        return view('frontend.form-2',compact('title','services','widths'));
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

    public function fetchSpeed(Request $request)
    {
        $data['speeds'] = TyreSpeed::where("tyre_rims_id", $request->rim_id)
                                ->get(["title", "id"]);


        return response()->json($data);
    }

    public function addmechanic(){

        return view('frontend.add_mechanic');

    }
    public function storeMechanic(Request $request){
        $this->validate($request, [
		    'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|max:255',
            'post_code' => 'required|max:255',
	    ]);
        $mechanic = Mechanic::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'postcode' => $request->post_code,
            'mobile_number' => $request->mobile,
        ]);


	    return redirect()->back();
    }
}
