<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TyreSpeed;
use App\Models\TyreRim;
use Illuminate\Support\Facades\Session;


class TyreSpeedController extends Controller
{
   
    public function index()
    {
        $title = "Tyre Speed";

        return view('admin.tyre_speed.index',compact('title'));
    }

    public function gettyres_speed(Request $request){
        $columns = array(
			0 => 'id',
			1 => 'title',
			4 => 'created_at',
			5 => 'action'
		);
		
		$totalData = TyreSpeed::count();
		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');
		
		if(empty($request->input('search.value'))){
			$tyres = TyreSpeed::offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();
			$totalFiltered = TyreSpeed::count();
		}else{
			$search = $request->input('search.value');
			$tyres = TyreSpeed::where([
				
				['title', 'like', "%{$search}%"],
			])
				->orWhere('created_at','like',"%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy($order, $dir)
				->get();
			$totalFiltered = TyreSpeed::where([
				
				['title', 'like', "%{$search}%"],
			])
				->orWhere('created_at','like',"%{$search}%")
				->count();
		}
		
		
		$data = array();
		
		if($tyres){
			foreach($tyres as $r){
				$edit_url = route('tyre_speeds.edit',$r->id);
				$nestedData['id'] = '<td><label class="checkbox checkbox-outline checkbox-success"><input type="checkbox" name="tyres[]" value="'.$r->id.'"><span></span></label></td>';
				$nestedData['title'] = $r->title;
				$nestedData['created_at'] = date('d-m-Y',strtotime($r->created_at));
				$nestedData['action'] = '
                                <div>
                                <td>
									<a class="btn btn-sm btn-clean btn-icon" onclick="event.preventDefault();viewInfo('.$r->id.');" title="View tyres" href="javascript:void(0)">
									<i class="icon-1x text-dark-50 flaticon-eye"></i>
									</a>
                                    <a title="Edit tyres" class="btn btn-sm btn-clean btn-icon"
                                       href="'.$edit_url.'">
                                       <i class="icon-1x text-dark-50 flaticon-edit"></i>
                                    </a>
                                    <a class="btn btn-sm btn-clean btn-icon" onclick="event.preventDefault();del('.$r->id.');" title="Delete tyres" href="javascript:void(0)">
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

    public function tyrespeedDetail(Request $request){
        $tyre = TyreSpeed::findOrFail($request->id);

		return view('admin.tyre_speed.detail', ['title' => 'Tyre Speed Detail', 'tyre' => $tyre]);
    }

    public function create()
    {
        $title = "Create Tyre Speed";

        $tyres = TyreRim::latest()->get();

        return view('admin.tyre_speed.create',compact('tyres','title'));
    }

   
    public function store(Request $request)
    {
        $this->validate($request, [
		    'title' => 'required|max:255',
			'tyre_rims_id' => 'required'
	    ]);
        
        $tyre = TyreSpeed::create([
            'title' => $request->title,
			'tyre_rims_id' => $request->tyre_rims_id
        ]);
        Session::flash('success_message', 'Great! Tyre Speed has been saved successfully!');
	  
	    return redirect()->route('tyre_speeds.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $title = "Edit	 Tyre Speed";

        $tyres = TyreRim::latest()->get();
        $tyre = TyreSpeed::find($id);
		
        return view('admin.tyre_speed.edit',compact('tyres','title','tyre'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
		    'title' => 'required|max:255',
			'tyre_rims_id' => 'required'
	    ]);
        
        $tyre = TyreSpeed::where('id',$id)->update([
            'title' => $request->title,
			'tyre_rims_id' => $request->tyre_rims_id
        ]);
        Session::flash('success_message', 'Great! Tyre Speed has been Update successfully!');
	  
	    return redirect()->route('tyre_speeds.index');
    }

    public function destroy($id)
    {
	    $tyre = TyreSpeed::find($id);
	    if($tyre){
		    $tyre->delete();
		    Session::flash('success_message', 'Tyre Speed successfully deleted!');
	    }
	    return redirect()->route('tyre_speeds.index');
	   
    }
	public function deleteSelectedClients(Request $request)
	{
		$input = $request->all();
		$this->validate($request, [
			'tyres' => 'required',
		
		]);
		foreach ($input['tyres'] as $index => $id) {
			
			$tyre = TyreSpeed::find($id);
			if($tyre){
				$tyre->delete();
			}
			
		}
		Session::flash('success_message', 'Tyre Speed successfully deleted!');
		return redirect()->back();
		
	}
}
