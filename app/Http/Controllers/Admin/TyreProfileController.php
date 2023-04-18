<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TyreWidth;
use App\Models\TyreProfile;
use Illuminate\Support\Facades\Session;

class TyreProfileController extends Controller
{
    
    public function index()
    {
        
        $title = "Tyre Profile";

        return view('admin.tyre_profiles.index',compact('title'));
    }

    public function gettyres_profiles(Request $request){
        $columns = array(
			0 => 'id',
			1 => 'title',
			4 => 'created_at',
			5 => 'action'
		);
		
		$totalData = TyreProfile::count();
		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');
		
		if(empty($request->input('search.value'))){
			$tyres = TyreProfile::offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();
			$totalFiltered = TyreProfile::count();
		}else{
			$search = $request->input('search.value');
			$tyres = TyreProfile::where([
				
				['title', 'like', "%{$search}%"],
			])
				->orWhere('created_at','like',"%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy($order, $dir)
				->get();
			$totalFiltered = TyreProfile::where([
				
				['title', 'like', "%{$search}%"],
			])
				->orWhere('created_at','like',"%{$search}%")
				->count();
		}
		
		
		$data = array();
		
		if($tyres){
			foreach($tyres as $r){
				$edit_url = route('tyre_profiles.edit',$r->id);
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

    public function tyreprofilesDetail(Request $request){
        $tyre = TyreProfile::findOrFail($request->id);

		return view('admin.tyre_profiles.detail', ['title' => 'Tyre Profile Detail', 'tyre' => $tyre]);
    }
 
    public function create()
    {
        $title = "Create Tyre Profile";
        $tyres = TyreWidth::latest()->get();

        return view('admin.tyre_profiles.create',compact('title','tyres'));
    }

  
    public function store(Request $request)
    {
       
        $this->validate($request, [
		    'title' => 'required|max:255',
			'tyre_widths_id' => 'required'
	    ]);
        
        $faqs = TyreProfile::create([
            'title' => $request->title,
			'tyre_widths_id' => $request->tyre_widths_id
        ]);
        Session::flash('success_message', 'Great! Tyre Profile has been saved successfully!');
	  
	    return redirect()->route('tyre_profiles.index');
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $title = "Update Tyre Profile";
        $tyres = TyreWidth::latest()->get();
        $tyre = TyreProfile::find($id);
        return view('admin.tyre_profiles.edit',compact('title','tyres','tyre'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
		    'title' => 'required|max:255',
			'tyre_widths_id' => 'required'
	    ]);
        $faqs = TyreProfile::where('id',$id)->update([
            'title' => $request->title,
			'tyre_widths_id' => $request->tyre_widths_id
        ]);
        Session::flash('success_message', 'Great! Tyre Profile has been Update successfully!');
	  
	    return redirect()->route('tyre_profiles.index');
    }

    public function destroy($id)
    {
	    $tyre = TyreProfile::find($id);
	    if($tyre){
		    $tyre->delete();
		    Session::flash('success_message', 'Tyre Profile successfully deleted!');
	    }
	    return redirect()->route('tyre_widths.index');
	   
    }
	public function deleteSelectedClients(Request $request)
	{
		$input = $request->all();
		$this->validate($request, [
			'tyres' => 'required',
		
		]);
		foreach ($input['tyres'] as $index => $id) {
			
			$tyre = TyreProfile::find($id);
			if($tyre){
				$tyre->delete();
			}
			
		}
		Session::flash('success_message', 'Tyre Profile successfully deleted!');
		return redirect()->back();
		
	}
}
