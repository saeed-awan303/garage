<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MakeModel;
use App\Models\Make;
use Illuminate\Support\Facades\Session;

class ModelController extends Controller
{
  
    public function index()
    {
        $title = "Models";
         
        return view('admin.models.index',compact('title'));

    }

    public function getmodels(Request $request){
        $columns = array(
			0 => 'id',
			1 => 'title',
            2 => 'slug',
            3 => 'make_id',
			4 => 'created_at',
			5 => 'action'
		);
		
		$totalData = MakeModel::count();
		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');
		
		if(empty($request->input('search.value'))){
			$models = MakeModel::offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();
			$totalFiltered = MakeModel::count();
		}else{
			$search = $request->input('search.value');
			$models = MakeModel::where([
				
				['title', 'like', "%{$search}%"],
			])
				
				->orWhere('created_at','like',"%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy($order, $dir)
				->get();
			$totalFiltered = MakeModel::where([
				
				['title', 'like', "%{$search}%"],
			])
				->orWhere('created_at','like',"%{$search}%")
				->count();
		}
		
		
		$data = array();
		
		if($models){
			foreach($models as $r){
				$edit_url = route('models.edit',$r->id);
				$nestedData['id'] = '<td><label class="checkbox checkbox-outline checkbox-success"><input type="checkbox" name="models[]" value="'.$r->id.'"><span></span></label></td>';
				$nestedData['title'] = $r->title;
                $nestedData['slug'] = $r->slug;
                $nestedData['make'] = $r->make_id;
				$nestedData['created_at'] = date('d-m-Y',strtotime($r->created_at));
				$nestedData['action'] = '
                                <div>
                                <td>
                                   
                                    <a title="Edit Model" class="btn btn-sm btn-clean btn-icon"
                                       href="'.$edit_url.'">
                                       <i class="icon-1x text-dark-50 flaticon-edit"></i>
                                    </a>
                                    <a class="btn btn-sm btn-clean btn-icon" onclick="event.preventDefault();del('.$r->id.');" title="Delete Model" href="javascript:void(0)">
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
    
    public function modelDetail(Request $request){
        
    }

    public function create()
    {
        $title = "Create Model";
        $makes = Make::all();
        
        return view('admin.models.create',compact('title','makes'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
		    'title' => 'required|max:255',
            'make'  => 'required',
	    ]);
        $model = MakeModel::create([
            'title' => $request->title,
            'make_id' => $request->make
        ]);
        Session::flash('success_message', 'Great! Model has been saved successfully!');
	  
	    return redirect()->route('models.index');
    }


    public function show($id)
    {
       
    }


    public function edit($id)
    {
        $title = "Create Model";
        $makes = Make::all();
        $model = MakeModel::find($id);
        
        return view('admin.models.edit',compact('title','makes','model'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
		    'title' => 'required|max:255',
            'make'  => 'required',
	    ]);
        $make = MakeModel::where('id',$id)->update([
            'title' => $request->title,
            'make_id' => $request->make
        ]);
        Session::flash('success_message', 'Great! Model has been saved successfully!');
	  
	    return redirect()->route('models.index');
    }


    public function destroy($id)
    {
	    $model = MakeModel::find($id);
	    if($model){
		    $model->delete();
		    Session::flash('success_message', 'Model successfully deleted!');
	    }
	    return redirect()->route('makes.index');
	   
    }
	public function deleteSelectedClients(Request $request)
	{
		$input = $request->all();
		$this->validate($request, [
			'models' => 'required',
		
		]);
		foreach ($input['models'] as $index => $id) {
			
			$model = MakeModel::find($id);
			if($model){
				$model->delete();
			}
			
		}
		Session::flash('success_message', 'Model Categories successfully deleted!');
		return redirect()->back();
		
	}
}
