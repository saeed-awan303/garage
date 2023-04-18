<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tyre;

class TyreController extends Controller
{
   
    public function index()
    {
        $title = "Tyre";
        
        return view('admin.tyres.index',compact('title'));
    }

    public function gettyres(Request $request){

        $columns = array(
			0 => 'id',
			1 => 'title',
			4 => 'created_at',
			5 => 'action'
		);
		
		$totalData = Tyre::count();
		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');
		
		if(empty($request->input('search.value'))){
			$tyres = Tyre::offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();
			$totalFiltered = Tyre::count();
		}else{
			$search = $request->input('search.value');
			$tyres = Tyre::where([
				
				['title', 'like', "%{$search}%"],
			])
				
				->orWhere('created_at','like',"%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy($order, $dir)
				->get();
			$totalFiltered = Tyre::where([
				
				['title', 'like', "%{$search}%"],
			])
				->orWhere('created_at','like',"%{$search}%")
				->count();
		}
		
		
		$data = array();
		
		if($tyres){
			foreach($tyres as $r){
				$edit_url = route('tyres.edit',$r->id);
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
        $tyre = Tyre::findOrFail($request->id);

		return view('admin.tyres.detail', ['title' => 'tyre Detail', 'tyre' => $tyre]);
    }

    public function create()
    {
        $title = "Create Tyre";

        return view('admin.tyres.create',compact('title'));
    }

  
    public function store(Request $request)
    {
        $this->validate($request, [
		    'title' => 'required|max:255',
	    ]);
        $faqs = Tyre::create([
            'title' => $request->title
        ]);
        Session::flash('success_message', 'Great! Tyre category has been saved successfully!');
	  
	    return redirect()->route('tyres.index');
    }

  
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $title = "Edit Tyre";
        $tyre = Tyre::find($id);
        return view('admin.tyres.edit',compact('title','tyre'));
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
		    'title' => 'required|max:255',
	    ]);
        $faqs = Tyre::where('id',$id)->update([
            'title' => $request->title
        ]);
        Session::flash('success_message', 'Great! Tyre category has been update successfully!');
	  
	    return redirect()->route('tyres.index');
    }

  
    public function destroy($id)
    {
	    $tyre = Tyre::find($id);
	    if($tyre){
		    $tyre->delete();
		    Session::flash('success_message', 'tyre successfully deleted!');
	    }
	    return redirect()->route('tyres.index');
	   
    }
	public function deleteSelectedClients(Request $request)
	{
		$input = $request->all();
		$this->validate($request, [
			'tyres' => 'required',
		
		]);
		foreach ($input['tyres'] as $index => $id) {
			
			$tyre = Tyre::find($id);
			if($tyre){
				$tyre->delete();
			}
			
		}
		Session::flash('success_message', 'tyre successfully deleted!');
		return redirect()->back();
		
	}
}
