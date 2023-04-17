<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Session;

class PermissionController extends Controller
{
   
    public function index()
    {
        $title = "Permissions";
        return view('admin.permission.index',compact('title'));
    }

    public function getPermissions(Request $request){
		$columns = array(
			0 => 'id',
			1 => 'name',
			2 => 'guard',
			4 => 'created_at',
			5 => 'action'
		);
		
		$totalData = Permission::count();
		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');
		
		if(empty($request->input('search.value'))){
			$permissions = Permission::offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();
			$totalFiltered = Permission::count();
		}else{
			$search = $request->input('search.value');
			$permissions = Permission::where([
				['name', 'like', "%{$search}%"],
			])
                ->orWhere('guard_name','like',"%{$search}%")
				->orWhere('created_at','like',"%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy($order, $dir)
				->get();
			$totalFiltered = Permission::where([
				
				['name', 'like', "%{$search}%"],
			])
				->orWhere('name', 'like', "%{$search}%")
				->orWhere('created_at','like',"%{$search}%")
				->count();
		}
		
		
		$data = array();
		
		if($permissions){
			foreach($permissions as $r){
				$edit_url = route('permissions.edit',$r->id);
				$nestedData['id'] = '<td><label class="checkbox checkbox-outline checkbox-success"><input type="checkbox" name="permissions[]" value="'.$r->id.'"><span></span></label></td>';
				$nestedData['name'] = $r->name;
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
                                    <a title="Edit Client" class="btn btn-sm btn-clean btn-icon"
                                       href="'.$edit_url.'">
                                       <i class="icon-1x text-dark-50 flaticon-edit"></i>
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
	public function permissionDetail(Request $request)
	{
		
		$permissions = Permission::findOrFail($request->id);
		
		
		return view('admin.permissions.detail', ['title' => 'Permissions Detail', 'permissions' => $permissions]);
	}
    public function create()
    {
        $title  = "Permission";
     
        return view('admin.permission.create',compact('title'));
    }

  
    public function store(Request $request)
    {
        $this->validate($request, [
		    'name' => 'required|max:255',
		   
	    ]);
        $permission = Permission::create([
            'name'  => $request->name
        ]);
        Session::flash('success_message', 'Great! Client has been saved successfully!');
        return redirect()->route('permissions.index');
    }

   
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $permission  = Permission::find($id);
	    return view('admin.permission.edit', ['title' => 'Edit Permissions details'])->withPermission($permission);
    }

   
    public function update(Request $request, $id)
    {
        $this->validate($request, [
		    'name' => 'required|max:255',
		   
	    ]);
        $permission = Permission::where('id',$id)->update([
            'name'  => $request->name
        ]);
        Session::flash('success_message', 'Great! Client has been saved successfully!');
        return redirect()->route('permissions.index');
    }

 
    public function destroy($id)
    {
	    $permission = Permission::find($id);
	    if($permission->is_admin == 0){
		    $permission->delete();
		    Session::flash('success_message', 'Permission successfully deleted!');
	    }
	    return redirect()->route('permissions.index');
	   
    }
	public function deleteSelectedPermission(Request $request)
	{
		$input = $request->all();
		$this->validate($request, [
			'permissions' => 'required',
		
		]);
		foreach ($input['permissions'] as $index => $id) {
			
			$permission = Permission::find($id);
			if($permission->is_admin == 0){
				$permission->delete();
			}
			
		}
		Session::flash('success_message', 'ermission successfully deleted!');
		return redirect()->back();
		
	}
}
