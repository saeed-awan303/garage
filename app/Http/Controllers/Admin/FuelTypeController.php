<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\MakeModel;
use App\Models\FuelType;

class FuelTypeController extends Controller
{
    public function index()
    {
        $title  = "Fuel Type";
        return view('admin.fuels.index',compact('title'));
    }

    public function getfuels(Request $request){
        $columns = array(
			0 => 'id',
			1 => 'title',
            2 => 'slug',
			4 => 'created_at',
			5 => 'action'
		);
		
		$totalData = FuelType::count();
		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');
		
		if(empty($request->input('search.value'))){
			$fuels = FuelType::offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();
			$totalFiltered = FuelType::count();
		}else{
			$search = $request->input('search.value');
			$fuels = FuelType::where([
				
				['title', 'like', "%{$search}%"],
			])
				
				->orWhere('created_at','like',"%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy($order, $dir)
				->get();
			$totalFiltered = FuelType::where([
				
				['title', 'like', "%{$search}%"],
			])
				->orWhere('created_at','like',"%{$search}%")
				->count();
		}
		
		
		$data = array();
		
		if($fuels){
			foreach($fuels as $r){
				$edit_url = route('fuels.edit',$r->id);
				$nestedData['id'] = '<td><label class="checkbox checkbox-outline checkbox-success"><input type="checkbox" name="fuels[]" value="'.$r->id.'"><span></span></label></td>';
				$nestedData['title'] = $r->title;
                $nestedData['slug'] = $r->slug;
                $nestedData['model'] = $r->model_id;
				$nestedData['created_at'] = date('d-m-Y',strtotime($r->created_at));
				$nestedData['action'] = '
                                <div>
                                <td>
									<a class="btn btn-sm btn-clean btn-icon" onclick="event.preventDefault();viewInfo('.$r->id.');" title="View Fuel Type" href="javascript:void(0)">
									<i class="icon-1x text-dark-50 flaticon-eye"></i>
									</a>
                                    <a title="Edit Fuel Type" class="btn btn-sm btn-clean btn-icon"
                                       href="'.$edit_url.'">
                                       <i class="icon-1x text-dark-50 flaticon-edit"></i>
                                    </a>
                                    <a class="btn btn-sm btn-clean btn-icon" onclick="event.preventDefault();del('.$r->id.');" title="Delete Fuel Type" href="javascript:void(0)">
                                        <i class="icon-1x text-dark-50 flaticon-delete"></i>
                                    </a>
                                </td>
                                </div>
                            ';
				$data[] = $nestedData;
			}
		}
		
		$json_data = array(
			"draw"			=> intval($request->input('draw')),
			"recordsTotal"	=> intval($totalData),
			"recordsFiltered" => intval($totalFiltered),
			"data"			=> $data
		);
		
		echo json_encode($json_data);
    }

    public function fuelDetail(Request $request){

		$fuel = FuelType::with('model')->findOrFail($request->id);

		return view('admin.fuels.detail', ['title' => 'Fuel Type Detail', 'fuel' => $fuel]);
    }

    public function create()
    {
        $title = "Create Fuel Type";
        $models = MakeModel::all();
        return view('admin.fuels.create',compact('title','models'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
		    'title' => 'required|max:255',
            'model'  => 'required',
	    ]);
        $model = FuelType::create([
            'title' => $request->title,
            'model_id' => $request->model
        ]);
        Session::flash('success_message', 'Great! Fuel Type has been saved successfully!');
	  
	    return redirect()->route('fuels.index');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $title = "Edit Fuel Type";
        $models = MakeModel::all();
        $fuel = FuelType::find($id);
      
        return view('admin.fuels.edit',compact('title','models','fuel'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
		    'title' => 'required|max:255',
            'model'  => 'required',
	    ]);
        $model = FuelType::where('id',$id)->update([
            'title' => $request->title,
            'model_id' => $request->model
        ]);
        Session::flash('success_message', 'Great! Fuel Type has been Update successfully!');
	  
	    return redirect()->route('fuels.index');
    }


    public function destroy($id)
    {
	    $fuel = FuelType::find($id);
	    if($fuel){
		    $fuel->delete();
		    Session::flash('success_message', 'fuel type successfully deleted!');
	    }
	    return redirect()->route('fuels.index');
	   
    }
	public function deleteSelectedClients(Request $request)
	{
		$input = $request->all();
		$this->validate($request, [
			'fuels' => 'required',		
		]);

		foreach ($input['fuels'] as $index => $id) {
			
			$fuel = FuelType::find($id);
			if($fuel){
				$fuel->delete();
			}
			
		}
		Session::flash('success_message', 'Fuel Type successfully deleted!');
		return redirect()->back();
		
	}
}
