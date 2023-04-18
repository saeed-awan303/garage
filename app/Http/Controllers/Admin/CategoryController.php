<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Session;


class CategoryController extends Controller
{
   
    public function index()
    {
        $title = "Category";
        return view('admin.categories.index',compact('title'));
    }

    public function getCategories(Request $request){
        $columns = array(
			0 => 'id',
			1 => 'title',
			3 => 'status',
			4 => 'created_at',
			5 => 'action'
		);
		
		$totalData = Category::count();
		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');
		
		if(empty($request->input('search.value'))){
			$categories = Category::offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();
			$totalFiltered = Category::count();
		}else{
			$search = $request->input('search.value');
			$categories = Category::where([
				
				['title', 'like', "%{$search}%"],
			])
				
				->orWhere('created_at','like',"%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy($order, $dir)
				->get();
			$totalFiltered = Category::where([
				
				['title', 'like', "%{$search}%"],
			])
				->orWhere('created_at','like',"%{$search}%")
				->count();
		}
		
		
		$data = array();
		
		if($categories){
			foreach($categories as $r){
				$edit_url = route('categories.edit',$r->id);
				$nestedData['id'] = '<td><label class="checkbox checkbox-outline checkbox-success"><input type="checkbox" name="categories[]" value="'.$r->id.'"><span></span></label></td>';
				$nestedData['title'] = $r->title;
				if($r->status){
					$nestedData['status'] = '<span class="label label-success label-inline mr-2">Active</span>';
				}else{
					$nestedData['status'] = '<span class="label label-danger label-inline mr-2">Inactive</span>';
				}
				
				$nestedData['created_at'] = date('d-m-Y',strtotime($r->created_at));
				$nestedData['action'] = '
                                <div>
                                <td>
                                    <a class="btn btn-sm btn-clean btn-icon" onclick="event.preventDefault();viewInfo('.$r->id.');" title="Category Client" href="javascript:void(0)">
                                        <i class="icon-1x text-dark-50 flaticon-eye"></i>
                                    </a>
                                    <a title="Edit Category" class="btn btn-sm btn-clean btn-icon"
                                       href="'.$edit_url.'">
                                       <i class="icon-1x text-dark-50 flaticon-edit"></i>
                                    </a>
                                    <a class="btn btn-sm btn-clean btn-icon" onclick="event.preventDefault();del('.$r->id.');" title="Delete Category" href="javascript:void(0)">
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

    public function categoryDetail(Request $request){
        $category = Category::with('parent','services')->findOrFail($request->id);
		
		
		return view('admin.categories.detail', ['title' => 'Category Detail', 'category' => $category]);
    }
    public function create()
    {
        $title = "Create Category";
        $categories = Category::status()->get();
		$services = Service::where('status',1)->get();
        return view('admin.categories.create',compact('title','categories','services'));
    }

  
    public function store(Request $request)
    {
        $this->validate($request, [
		    'title' => 'required|max:255',
			'service' => 'required',
	    ]);
        $input = $request->all();
        $res = array_key_exists('status', $input);
	    if ($res == false) {
		    $active = 0;
	    } else {
		    $active = 1;
		
	    }
        $category = Category::create([
            'title' => $request->title,
            'parent_id' => $request->parent_id ?? '0',
			'service_id' => $request->service ,
            'status' => $active,
			'price'  => $request->price ?? '', 
        ]);
        
        Session::flash('success_message', 'Great! Category has been saved successfully!');
	    
	    return redirect()->route('categories.index');
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $title = "Edit Category";
        $category = Category::status()->find($id);
        $categories = Category::status()->get();
		$services = Service::where('status',1)->get();
        return view('admin.categories.edit',compact('title','categories','category','services'));
    }

   
    public function update(Request $request, $id)
    {
        $this->validate($request, [
		    'title' => 'required|max:255',
			'service' => 'required|max:255'
	    ]);
        $input = $request->all();
        $res = array_key_exists('status', $input);
	    if ($res == false) {
		    $active = 0;
	    } else {
		    $active = 1;
		
	    }
        $category = Category::where('id',$id)->update([
            'title' => $request->title,
            'parent_id' => $request->parent_id ?? '0',
			'service_id' => $request->service ,
            'status' => $active,
			'price'  => $request->price ?? '', 
        ]);
        
        Session::flash('success_message', 'Great! Category has been Update successfully!');
	    
	    return redirect()->route('categories.index');
    }

   
    public function destroy($id)
    {
	    $category = Category::find($id);
	    if($category){
		    $category->delete();
		    Session::flash('success_message', 'Category successfully deleted!');
	    }
	    return redirect()->route('categories.index');
	   
    }
	public function deleteSelectedClients(Request $request)
	{
		$input = $request->all();
		$this->validate($request, [
			'categories' => 'required',
		
		]);
		foreach ($input['categories'] as $index => $id) {
			
			$category = Category::find($id);
			if($category){
				$category->delete();
			}
			
		}
		Session::flash('success_message', 'Categories successfully deleted!');
		return redirect()->back();
		
	}
}
