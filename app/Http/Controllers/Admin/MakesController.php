<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Make;
use Illuminate\Support\Facades\Session;

class MakesController extends Controller
{
   
    public function index()
    {
        $title = "Makes";
        return view('admin.makes.index',compact('title'));
    }

    public function getmakes(Request $request){
        $columns = array(
			0 => 'id',
			1 => 'title',
            2 => 'slug',
			4 => 'created_at',
			5 => 'action'
		);
		
		$totalData = Make::count();
		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');
		
		if(empty($request->input('search.value'))){
			$makes = Make::offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();
			$totalFiltered = Make::count();
		}else{
			$search = $request->input('search.value');
			$makes = Make::where([
				
				['title', 'like', "%{$search}%"],
			])
				
				->orWhere('created_at','like',"%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy($order, $dir)
				->get();
			$totalFiltered = Make::where([
				
				['title', 'like', "%{$search}%"],
			])
				->orWhere('created_at','like',"%{$search}%")
				->count();
		}
		
		
		$data = array();
		
		if($makes){
			foreach($makes as $r){
				$edit_url = route('makes.edit',$r->id);
				$nestedData['id'] = '<td><label class="checkbox checkbox-outline checkbox-success"><input type="checkbox" name="makes[]" value="'.$r->id.'"><span></span></label></td>';
				$nestedData['title'] = $r->title;
                $nestedData['slug'] = $r->slug;
				$nestedData['created_at'] = date('d-m-Y',strtotime($r->created_at));
				$nestedData['action'] = '
                                <div>
                                <td>
									<a class="btn btn-sm btn-clean btn-icon" onclick="event.preventDefault();viewInfo('.$r->id.');" title="View Make" href="javascript:void(0)">
									<i class="icon-1x text-dark-50 flaticon-eye"></i>
									</a>
                                    <a title="Edit Make" class="btn btn-sm btn-clean btn-icon"
                                       href="'.$edit_url.'">
                                       <i class="icon-1x text-dark-50 flaticon-edit"></i>
                                    </a>
                                    <a class="btn btn-sm btn-clean btn-icon" onclick="event.preventDefault();del('.$r->id.');" title="Delete Make" href="javascript:void(0)">
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
    public function makeDetail(Request $request){

        $make = Make::with('models')->findOrFail($request->id);
		return view('admin.makes.detail', ['title' => 'Make Detail', 'make' => $make]);

    }
    public function create()
    {
        $title = "Create Make";
        
        return view('admin.makes.create',compact('title'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
		    'title' => 'required|max:255',
	    ]);
        $make = Make::create([
            'title' => $request->title
        ]);
        Session::flash('success_message', 'Great! Make has been saved successfully!');
	  
	    return redirect()->route('makes.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $title = "Edit Make";
        $make = Make::find($id);
        
        return view('admin.makes.edit',compact('make','title'));
    }


    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
		    'title' => 'required|max:255',
	    ]);
        $make = Make::where('id',$id)->update([
            'title' => $request->title
        ]);
        Session::flash('success_message', 'Great! Make has been saved successfully!');
	  
	    return redirect()->route('makes.index');
    }

    public function destroy($id)
    {
	    $make = Make::find($id);
	    if($make){
		    $make->delete();
		    Session::flash('success_message', ' make successfully deleted!');
	    }
	    return redirect()->route('makes.index');
	   
    }
	public function deleteSelectedClients(Request $request)
	{
		$input = $request->all();
		$this->validate($request, [
			'makes' => 'required',
		
		]);
		foreach ($input['makes'] as $index => $id) {
			
			$make = Make::find($id);
			if($make){
				$make->delete();
			}
			
		}
		Session::flash('success_message', 'Make Categories successfully deleted!');
		return redirect()->back();
		
	}
}
