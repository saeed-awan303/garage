<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mechanic;
use Illuminate\Support\Facades\Session;

class MechanicController extends Controller
{
  
    public function index()
    {
        $title = "Mechanics";
        return view('admin.mechanics.index',compact('title'));
    }

    public function getMechanics(Request $request){
		$columns = array(
			0 => 'id',
			1 => 'first_name',
            1 => 'last_name',
			3 => 'email',
			4 => 'active',
			5 => 'created_at',
			6 => 'action'
		);
		
		$totalData = Mechanic::count();
		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');
		
		if(empty($request->input('search.value'))){
			$users = Mechanic::offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();
			$totalFiltered = Mechanic::count();
		}else{
			$search = $request->input('search.value');
			$users = Mechanic::where([
				['first_name', 'like', "%{$search}%"],
			])
                ->orWhere('last_name','like',"%{$search}%")
				->orWhere('email','like',"%{$search}%")
				->orWhere('created_at','like',"%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy($order, $dir)
				->get();
			$totalFiltered = User::where([
				
				['first_name', 'like', "%{$search}%"],
			])
				->orWhere('last_name', 'like', "%{$search}%")
				->orWhere('email','like',"%{$search}%")
				->orWhere('created_at','like',"%{$search}%")
				->count();
		}
		
		
		$data = array();
		
		if($users){
			foreach($users as $r){
				$edit_url = route('clients.edit',$r->id);
				$nestedData['id'] = '<td><label class="checkbox checkbox-outline checkbox-success"><input type="checkbox" name="clients[]" value="'.$r->id.'"><span></span></label></td>';
				$nestedData['first_name'] = $r->first_name;
                $nestedData['last_name'] = $r->last_name;
				$nestedData['email'] = $r->email;
				if($r->active){
					$nestedData['active'] = '<span class="label label-success label-inline mr-2">Active</span>';
				}else{
					$nestedData['active'] = '<span class="label label-danger label-inline mr-2">Inactive</span>';
				}
				
				$nestedData['created_at'] = date('d-m-Y',strtotime($r->created_at));
				$nestedData['action'] = '
                                <div>
                                <td>
                                    <a class="btn btn-sm btn-clean btn-icon" onclick="event.preventDefault();viewInfo('.$r->id.');" title="View Client" href="javascript:void(0)">
                                        <i class="icon-1x text-dark-50 flaticon-eye"></i>
                                    </a>
                               
                                    <a class="btn btn-sm btn-clean btn-icon" onclick="event.preventDefault();del('.$r->id.');" title="Delete Client" href="javascript:void(0)">
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
	public function mechanicDetail(Request $request)
	{
		
		$mechanic = Mechanic::findOrFail($request->id);
		
		return view('admin.mechanics.detail', ['title' => 'Client Detail', 'mechanic' => $mechanic]);
	}
    public function create()
    {
       
    }

    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
	    $user = Mechanic::find($id);
	    if($user){
		    $user->delete();
		    Session::flash('success_message', 'Mechanic successfully deleted!');
	    }
	    return redirect()->back();
	   
    }
	public function deleteSelectedClients(Request $request)
	{
		$input = $request->all();
		$this->validate($request, [
			'clients' => 'required',
		
		]);
		foreach ($input['clients'] as $index => $id) {
			
			$user = Mechanic::find($id);
			if($user){
				$user->delete();
			}
			
		}
		Session::flash('success_message', 'clients successfully deleted!');
		return redirect()->back();
		
	}
}
