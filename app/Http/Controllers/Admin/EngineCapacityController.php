<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EngineCapacity;
use Illuminate\Support\Facades\Session;
use App\Models\MakeModel;


class EngineCapacityController extends Controller
{

    public function index()
    {
        $title  = "Engine Capacity";
        return view('admin.engines.index',compact('title'));
    }

    public function getengines(Request $request){
        
        $columns = array(
			0 => 'id',
			1 => 'title',
            2 => 'slug',
			4 => 'created_at',
			5 => 'action'
		);
		
		$totalData = EngineCapacity::count();
		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');
		
		if(empty($request->input('search.value'))){
			$engines = EngineCapacity::offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();
			$totalFiltered = EngineCapacity::count();
		}else{
			$search = $request->input('search.value');
			$engines = EngineCapacity::where([
				
				['title', 'like', "%{$search}%"],
			])
				
				->orWhere('created_at','like',"%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy($order, $dir)
				->get();
			$totalFiltered = EngineCapacity::where([
				
				['title', 'like', "%{$search}%"],
			])
				->orWhere('created_at','like',"%{$search}%")
				->count();
		}
		
		
		$data = array();
		
		if($engines){
			foreach($engines as $r){
				$edit_url = route('engines.edit',$r->id);
				$nestedData['id'] = '<td><label class="checkbox checkbox-outline checkbox-success"><input type="checkbox" name="engines[]" value="'.$r->id.'"><span></span></label></td>';
				$nestedData['title'] = $r->title;
                $nestedData['slug'] = $r->slug;
                $nestedData['model'] = $r->model_id;
				$nestedData['created_at'] = date('d-m-Y',strtotime($r->created_at));
				$nestedData['action'] = '
                                <div>
                                <td>
									<a class="btn btn-sm btn-clean btn-icon" onclick="event.preventDefault();viewInfo('.$r->id.');" title="View engine capcity" href="javascript:void(0)">
										<i class="icon-1x text-dark-50 flaticon-eye"></i>
									</a>
                                    <a title="Edit engine capacity" class="btn btn-sm btn-clean btn-icon"
                                       href="'.$edit_url.'">
                                       <i class="icon-1x text-dark-50 flaticon-edit"></i>
                                    </a>
                                    <a class="btn btn-sm btn-clean btn-icon" onclick="event.preventDefault();del('.$r->id.');" title="Delete engine capcity" href="javascript:void(0)">
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

    public function engineDetail(Request $request){
        $engine = EngineCapacity::with('model')->findOrFail($request->id);
		
		return view('admin.engines.detail', ['title' => 'Engine Detail', 'engine' => $engine]);
    }
   
    public function create()
    {
        $title = "Create Engine Capacity";
        $models = MakeModel::all();
        return view('admin.engines.create',compact('title','models'));
    }

   
    public function store(Request $request)
    {
        $this->validate($request, [
		    'title' => 'required|max:255',
            'model'  => 'required',
	    ]);
        $model = EngineCapacity::create([
            'title' => $request->title,
            'model_id' => $request->model
        ]);
        Session::flash('success_message', 'Great! Engine Capacity has been saved successfully!');
	  
	    return redirect()->route('engines.index');
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $title = "Edit Engine Capacity";
        $models = MakeModel::all();
        $fuel = EngineCapacity::find($id);
      
        return view('admin.engines.edit',compact('title','models','fuel'));
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
		    'title' => 'required|max:255',
            'model'  => 'required',
	    ]);
        $model = EngineCapacity::where('id',$id)->update([
            'title' => $request->title,
            'model_id' => $request->model
        ]);
        Session::flash('success_message', 'Great! Engine Capacity has been Update successfully!');
	  
	    return redirect()->route('engines.index');
    }

    
    public function destroy($id)
    {
	    $engines = EngineCapacity::find($id);
	    if($engines){
		    $engines->delete();
		    Session::flash('success_message', 'Engine Capacity successfully deleted!');
	    }
	    return redirect()->route('engines.index');
	   
    }
	public function deleteSelectedClients(Request $request)
	{
		$input = $request->all();
		$this->validate($request, [
			'engines' => 'required',		
		]);

		foreach ($input['engines'] as $index => $id) {
			
			$engines = EngineCapacity::find($id);
			if($engines){
				$engines->delete();
			}
			
		}
		Session::flash('success_message', 'Engine Capacity successfully deleted!');
		return redirect()->back();
		
	}
}
