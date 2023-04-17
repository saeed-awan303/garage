<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Session;
use DB;

class RoleController extends Controller
{
  
    // function __construct()
    // {
    //         $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
    //         $this->middleware('permission:role-create', ['only' => ['create','store']]);
    //         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
    //         $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    // }
    public function index()
    {
        $title  = "Roles";
        return view('admin.roles.index',compact('title'));
    }

    public function getRoles(Request $request){
		$columns = array(
			0 => 'id',
			1 => 'name',
			2 => 'guard',
			4 => 'created_at',
			5 => 'action'
		);
		
		$totalData = Role::count();
		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');
		
		if(empty($request->input('search.value'))){
			$roles = Role::offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();
			$totalFiltered = Role::count();
		}else{
			$search = $request->input('search.value');
			$roles = Role::where([
				['name', 'like', "%{$search}%"],
			])
				->orWhere('guard_name','like',"%{$search}%")
				->orWhere('created_at','like',"%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy($order, $dir)
				->get();
			$totalFiltered = Role::where([
				
				['name', 'like', "%{$search}%"],
			])
				->orWhere('name', 'like', "%{$search}%")
				->orWhere('guard_name','like',"%{$search}%")
				->orWhere('created_at','like',"%{$search}%")
				->count();
		}
		
		
		$data = array();
		
		if($roles){
			foreach($roles as $r){
				$edit_url = route('roles.edit',$r->id);
				$nestedData['id'] = '<td><label class="checkbox checkbox-outline checkbox-success"><input type="checkbox" name="roles[]" value="'.$r->id.'"><span></span></label></td>';
				$nestedData['name'] = $r->name;
				$nestedData['guard_name'] = $r->guard_name;
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
	public function roleDetail(Request $request)
	{
		$title = "Role Details";
        $role = Role::find($request->id);
        $permission = Permission::get();
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
                                        ->where("role_has_permissions.role_id",$request->id)
                                        ->get();
		return view('admin.roles.detail', compact('role','rolePermissions','title'));
	}
    public function create()
    {
        $title  = "Roles";
        $permission = Permission::get();
        return view('admin.roles.create',compact('permission','title'));
    }

   
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
    
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
        Session::flash('success_message', 'Role successfully save!');
        return redirect()->route('roles.index')
                        ->with('success','Role created successfully');
    }

    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();
    
        return view('admin.roles.detail',compact('role','rolePermissions'));
    }

    public function edit($id)
    {
        $title  = "Roles";
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        $role = Role::find($id);
        return view('admin.roles.edit',compact('permission','title','role','rolePermissions'));
    }

   
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
    
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
    
        $role->syncPermissions($request->input('permission'));
        Session::flash('success_message', 'Role successfully update!');
        return redirect()->route('roles.index')
                        ->with('success','Role created successfully');
    
    }

 
    public function destroy($id)
    {
	    $role = Role::find($id);
	    if($role->is_admin == 0){
		    $role->delete();
		    Session::flash('success_message', 'roleUser successfully deleted!');
	    }
	    return redirect()->route('roles.index');
	   
    }
	public function deleteSelectedClients(Request $request)
	{
		$input = $request->all();
		$this->validate($request, [
			'roles' => 'required',
		
		]);
		foreach ($input['clients'] as $index => $id) {
			
			$role = Role::find($id);
			if($role->is_admin == 0){
				$role->delete();
			}
			
		}
		Session::flash('success_message', 'Roles successfully deleted!');
		return redirect()->back();
		
	}
}
