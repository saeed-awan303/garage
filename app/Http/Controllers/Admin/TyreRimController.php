<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TyreProfile;
use App\Models\TyreRim;
use Illuminate\Support\Facades\Session;


class TyreRimController extends Controller
{
  
    public function index()
    {
        $title = "Tyre Rim";

        return view('admin.tyre_rim.index',compact('title'));
    }

    public function getRims(Request $request){
        $columns = array(
			0 => 'id',
			1 => 'title',
			4 => 'created_at',
			5 => 'action'
		);
		
		$totalData = TyreRim::count();
		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');
		
		if(empty($request->input('search.value'))){
			$tyres = TyreRim::offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();
			$totalFiltered = TyreRim::count();
		}else{
			$search = $request->input('search.value');
			$tyres = TyreRim::where([
				
				['title', 'like', "%{$search}%"],
			])
				->orWhere('created_at','like',"%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy($order, $dir)
				->get();
			$totalFiltered = TyreRim::where([
				
				['title', 'like', "%{$search}%"],
			])
				->orWhere('created_at','like',"%{$search}%")
				->count();
		}
		
		
		$data = array();
		
		if($tyres){
			foreach($tyres as $r){
				$edit_url = route('rims.edit',$r->id);
				$nestedData['id'] = '<td><label class="checkbox checkbox-outline checkbox-success"><input type="checkbox" name="tyres[]" value="'.$r->id.'"><span></span></label></td>';
				$nestedData['title'] = $r->title;
				$nestedData['created_at'] = date('d-m-Y',strtotime($r->created_at));
				$nestedData['action'] = '
                                <div>
                                <td>
									<a class="btn btn-sm btn-clean btn-icon" onclick="event.preventDefault();viewInfo('.$r->id.');" title="View tyre profile" href="javascript:void(0)">
									<i class="icon-1x text-dark-50 flaticon-eye"></i>
									</a>
                                    <a title="Edit tyre profile" class="btn btn-sm btn-clean btn-icon"
                                       href="'.$edit_url.'">
                                       <i class="icon-1x text-dark-50 flaticon-edit"></i>
                                    </a>
                                    <a class="btn btn-sm btn-clean btn-icon" onclick="event.preventDefault();del('.$r->id.');" title="Delete tyre profile" href="javascript:void(0)">
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

    public function rimDetail(Request $request){
        $tyre = TyreRim::findOrFail($request->id);

		return view('admin.tyre_rim.detail', ['title' => 'Tyre Rims Detail', 'tyre' => $tyre]);
    }
 
    public function create()
    {
        $title = "Create Tyre Rim";
        $tyres = TyreProfile::latest()->get();

        return view('admin.tyre_rim.create',compact('title','tyres'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
		    'title' => 'required|max:255',
			'tyre_profiles_id' => 'required'
	    ]);
        $faqs = TyreRim::create([
            'title' => $request->title,
			'tyre_profiles_id' => $request->tyre_profiles_id
        ]);
        Session::flash('success_message', 'Great! Tyre Rim has been saved successfully!');
	  
	    return redirect()->route('rims.index');
    }

    
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $title = "Create Tyre Rim";
        $tyres = TyreProfile::latest()->get();
        $tyre = TyreRim::find($id);

        return view('admin.tyre_rim.edit',compact('title','tyres','tyre'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
		    'title' => 'required|max:255',
			'tyre_profiles_id' => 'required'
	    ]);
        $faqs = TyreRim::where('id',$id)->update([
            'title' => $request->title,
			'tyre_profiles_id' => $request->tyre_profiles_id
        ]);
        Session::flash('success_message', 'Great! Tyre Rim has been update successfully!');
	  
	    return redirect()->route('rims.index');
    }


    public function destroy($id)
    {
	    $tyre = TyreRim::find($id);
	    if($tyre){
		    $tyre->delete();
		    Session::flash('success_message', 'Tyre Rim successfully deleted!');
	    }
	    return redirect()->route('rims.index');
	   
    }
	public function deleteSelectedClients(Request $request)
	{
		$input = $request->all();
		$this->validate($request, [
			'tyres' => 'required',
		
		]);
		foreach ($input['tyres'] as $index => $id) {
			
			$tyre = TyreRim::find($id);
			if($tyre){
				$tyre->delete();
			}
			
		}
		Session::flash('success_message', 'Tyre Rim successfully deleted!');
		return redirect()->back();
		
	}
}
