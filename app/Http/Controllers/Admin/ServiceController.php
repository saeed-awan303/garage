<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Session;


class ServiceController extends Controller
{
   
    public function index()
    {
        $title = "services";

        return view('admin.services.index',compact('title'));

    }

    public function getservices(Request $request){
        $columns = array(
			0 => 'id',
			1 => 'title',
            2 => 'slug',
            3 => 'status',
			4 => 'created_at',
			5 => 'action'
		);
		
		$totalData = Service::count();
		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');
		
		if(empty($request->input('search.value'))){
			$services = Service::offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();
			$totalFiltered = Service::count();
		}else{
			$search = $request->input('search.value');
			$services = Service::where([
				
				['title', 'like', "%{$search}%"],
			])
				
				->orWhere('created_at','like',"%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy($order, $dir)
				->get();
			$totalFiltered = Service::where([
				
				['title', 'like', "%{$search}%"],
			])
				->orWhere('created_at','like',"%{$search}%")
				->count();
		}
		
		
		$data = array();
		
		if($services){
			foreach($services as $r){
				$edit_url = route('services.edit',$r->id);
				$nestedData['id'] = '<td><label class="checkbox checkbox-outline checkbox-success"><input type="checkbox" name="services[]" value="'.$r->id.'"><span></span></label></td>';
				$nestedData['title'] = $r->title;
                $nestedData['slug'] = $r->slug;
                if($r->status){
					$nestedData['status'] = '<span class="label label-success label-inline mr-2">Active</span>';
				}else{
					$nestedData['status'] = '<span class="label label-danger label-inline mr-2">Inactive</span>';
				}
				$nestedData['created_at'] = date('d-m-Y',strtotime($r->created_at));
				$nestedData['action'] = '
                                <div>
                                <td>
									<a class="btn btn-sm btn-clean btn-icon" onclick="event.preventDefault();viewInfo('.$r->id.');" title="View Service" href="javascript:void(0)">
									<i class="icon-1x text-dark-50 flaticon-eye"></i>
									</a>
                                    <a title="Edit Service" class="btn btn-sm btn-clean btn-icon"
                                       href="'.$edit_url.'">
                                       <i class="icon-1x text-dark-50 flaticon-edit"></i>
                                    </a>
                                    <a class="btn btn-sm btn-clean btn-icon" onclick="event.preventDefault();del('.$r->id.');" title="Delete Service" href="javascript:void(0)">
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

    public function serviceDetail(Request $request){

		$service = Service::with('category')->findOrFail($request->id);
		
		return view('admin.services.detail', ['title' => 'Service Detail', 'service' => $service]);
    }

    public function create()
    {
        $title = "Service";
        return view('admin.services.create',    compact('title'));
    }

  
    public function store(Request $request)
    {
        $this->validate($request, [
		    'title' 	=> 'required',
            'image' => 'max:300000',
	    ]);
        $input = $request->all();
        $res = array_key_exists('status', $input);
	    if ($res == false) {
		    $active = 0;
	    } else {
		    $active = 1;
		
	    }
        if ($request->hasFile('image')) {
			if ($request->file('image')->isValid()) {
				$this->validate($request, [
					'image' => 'required|mimes:jpeg,png,jpg'
				]);
				$file = $request->file('image');
				$destinationPath = public_path('/uploads');
				//$extension = $file->getProductOriginalExtension('logo');
				$thumbnail = $file->getClientOriginalName('image');
				$thumbnail = rand() . $thumbnail;
				$request->file('image')->move($destinationPath, $thumbnail);
				
			}
		}
        $service = Service::create([
            'title' => $request->title,
            'status' => $active,
            'image'	=> $thumbnail,
			
        ]);
        Session::flash('success_message', 'Great! Service has been saved successfully!');
	  
	    return redirect()->route('services.index');
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $title = "Service";
        $service = Service::find($id);
        return view('admin.services.edit',compact('title','service'));
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
		    'title' 	=> 'required',
	    ]);

        $input = $request->all();
        $res = array_key_exists('status', $input);
	    if ($res == false) {
		    $active = 0;
	    } else {
		    $active = 1;
		
	    }
        $service = Service::where('id',$id)->update([
            'title' => $request->title,
            'status' => $active,
			
        ]);
        Session::flash('success_message', 'Great! Service has been update successfully!');
	  
	    return redirect()->route('services.index');
    }

    public function destroy($id)
    {
	    $service = Service::find($id);
	    if($service){
		    $service->delete();
		    Session::flash('success_message', 'service successfully deleted!');
	    }
	    return redirect()->route('services.index');
	   
    }
	public function deleteSelectedClients(Request $request)
	{
		$input = $request->all();
		$this->validate($request, [
			'services' => 'required',
		
		]);
		foreach ($input['services'] as $index => $id) {
			
			$service = Service::find($id);
			if($service){
				$service->delete();
			}
			
		}
		Session::flash('success_message', 'Services successfully deleted!');
		return redirect()->back();
		
	}
}
