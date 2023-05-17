<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TyreDetail;
use App\Models\TyreWidth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class TyreDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title='Tyre details';
        return view('admin.tyre_details.index',compact('title'));
    }
    public function gettyres_detail(Request $request)
    {

        $columns = array(
			0 => 'id',
			1 => 'title',
            2 => 'slug',
            3=>'price',
			4 => 'created_at',
			5 => 'action'
		);

		$totalData = TyreDetail::count();
		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');

		if(empty($request->input('search.value'))){
			$tyres = TyreDetail::offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();
			$totalFiltered = TyreDetail::count();
		}else{
			$search = $request->input('search.value');
			$tyres = TyreDetail::where([

				['title', 'like', "%{$search}%"],
			])
				->orWhere('created_at','like',"%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy($order, $dir)
				->get();
			$totalFiltered = TyreDetail::where([

				['title', 'like', "%{$search}%"],
			])
				->orWhere('created_at','like',"%{$search}%")
				->count();
		}


		$data = array();

		if($tyres){
			foreach($tyres as $r){
				$edit_url = route('tyre_details.edit',$r->id);
				$nestedData['id'] = '<td><label class="checkbox checkbox-outline checkbox-success"><input type="checkbox" name="tyres[]" value="'.$r->id.'"><span></span></label></td>';
				$nestedData['title'] = $r->title;
                $nestedData['slug'] = $r->slug;
                $nestedData['price'] = $r->price;
				$nestedData['created_at'] = date('d-m-Y',strtotime($r->created_at));
				$nestedData['action'] = '
                                <div>
                                <td>
									<a class="btn btn-sm btn-clean btn-icon" onclick="event.preventDefault();viewInfo('.$r->id.');" title="View tyres" href="javascript:void(0)">
									<i class="icon-1x text-dark-50 flaticon-eye"></i>
									</a>

                                </td>
                                </div>
                            ';
                            // <a title="Edit tyres" class="btn btn-sm btn-clean btn-icon"
                            //            href="'.$edit_url.'">
                            //            <i class="icon-1x text-dark-50 flaticon-edit"></i>
                            //         </a>
                            //         <a class="btn btn-sm btn-clean btn-icon" onclick="event.preventDefault();del('.$r->id.');" title="Delete tyres" href="javascript:void(0)">
                            //             <i class="icon-1x text-dark-50 flaticon-delete"></i>
                            //         </a>
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title='Tyre details';
        $widths=TyreWidth::all();
        return view('admin.tyre_details.create',compact('title','widths'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
		    'title' => 'required|max:255',
			'tyre_width' => 'required',
            'tyre_profile' => 'required',
            'tyre_rim' => 'required',
            'tyre_speed' => 'required',
            'price'=>'required'
	    ]);
        $tyre = TyreDetail::create([
            'title' => $request->title,
			'price' => $request->price,
            'tyre_width_id'=>$request->tyre_width,
            'tyre_profile_id'=>$request->tyre_profile,
            'tyre_rim_id'=>$request->tyre_rim,
            'tyre_speed_id'=>$request->tyre_speed
        ]);
        Session::flash('success_message', 'Great! Tyre details have been saved successfully!');

	    return redirect()->route('tyre_details.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



}
