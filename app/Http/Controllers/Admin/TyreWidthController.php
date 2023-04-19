<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TyreWidth;
use App\Models\Tyre;
use Illuminate\Support\Facades\Session;

class TyreWidthController extends Controller
{
   
    public function index()
    {
        $title = "Tyre Width";

        return view('admin.tyrewidths.index',compact('title')); 
    }

    public function gettyres_widths(Request $request){

        $columns = array(
			0 => 'id',
			1 => 'title',
			4 => 'created_at',
			5 => 'action'
		);
		
		$totalData = TyreWidth::count();
		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');
		
		if(empty($request->input('search.value'))){
			$tyres = TyreWidth::offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();
			$totalFiltered = TyreWidth::count();
		}else{
			$search = $request->input('search.value');
			$tyres = TyreWidth::where([
				
				['title', 'like', "%{$search}%"],
			])
				->orWhere('created_at','like',"%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy($order, $dir)
				->get();
			$totalFiltered = TyreWidth::where([
				
				['title', 'like', "%{$search}%"],
			])
				->orWhere('created_at','like',"%{$search}%")
				->count();
		}
		
		
		$data = array();
		
		if($tyres){
			foreach($tyres as $r){
				$edit_url = route('tyre_widths.edit',$r->id);
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
    
    public function tyreDetail(Request $request){
        $tyre = TyreWidth::with('tyre')->findOrFail($request->id);

		return view('admin.tyrewidths.detail', ['title' => 'Tyre Widths Detail', 'tyre' => $tyre]);
    }

    public function create()
    {
        $title = "Create Tyre Width";

        $tyres = Tyre::latest()->get();
		
        return view('admin.tyrewidths.create',compact('tyres','title'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
		    'title' => 'required|max:255',
			'tyre' => 'required'
	    ]);
        $faqs = TyreWidth::create([
            'title' => $request->title,
			'tyre_id' => $request->tyre
        ]);
        Session::flash('success_message', 'Great! Tyre Widths has been saved successfully!');
	  
	    return redirect()->route('tyre_widths.index');
    }


    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $title = "Create Tyre Width";

        $tyres = Tyre::latest()->get();
        $tyre = TyreWidth::find($id);
        
        return view('admin.tyrewidths.edit',compact('tyres','title','tyre'));
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
		    'title' => 'required|max:255',
			'tyre' => 'required'
	    ]);
        $faqs = TyreWidth::where('id',$id)->update([
            'title' => $request->title,
			'tyre_id' => $request->tyre
        ]);
        Session::flash('success_message', 'Great! Tyre Widths has been Update successfully!');
	  
	    return redirect()->route('tyre_widths.index');
    }

    public function destroy($id)
    {
	    $tyre = TyreWidth::find($id);
	    if($tyre){
		    $tyre->delete();
		    Session::flash('success_message', 'Tyre Width successfully deleted!');
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
			
			$tyre = TyreWidth::find($id);
			if($tyre){
				$tyre->delete();
			}
			
		}
		Session::flash('success_message', 'Tyre Width successfully deleted!');
		return redirect()->back();
		
	}
}
