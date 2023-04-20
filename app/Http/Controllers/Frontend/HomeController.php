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

class HomeController extends Controller
{
    public function index(){
       
        $title = "title";
        $makes = Make::all();
        return view('frontend.home',compact('title','makes'));
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
}
