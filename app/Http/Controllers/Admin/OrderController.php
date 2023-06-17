<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Orders";
        return view('admin.orders.index',compact('title'));
    }

    public function getOrders(Request $request){
        $columns = array(
			0 => 'id',
			1 => 'first_name',
			3 => 'email',
            4 =>'amount',
			5 => 'created_at',
			6 => 'action'
		);

		$totalData = Order::count();
		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');

		if(empty($request->input('search.value'))){
			$categories = Order::offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();
			$totalFiltered = Order::count();
		}else{
			$search = $request->input('search.value');
			$categories = Order::where([

				['name', 'like', "%{$search}%"],
			])

				->orWhere('created_at','like',"%{$search}%")
                ->orWhere('email','like',"%{$search}%")
                ->orWhere('amount','like',"%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy($order, $dir)
				->get();
			$totalFiltered = Order::where([

				['title', 'like', "%{$search}%"],
			])
				->orWhere('created_at','like',"%{$search}%")
                ->orWhere('email','like',"%{$search}%")
                ->orWhere('amount','like',"%{$search}%")
				->count();
		}


		$data = array();

		if($categories){
			foreach($categories as $r){
				$nestedData['id'] = '<td><label class="checkbox checkbox-outline checkbox-success"><input type="checkbox" name="categories[]" value="'.$r->id.'"><span></span></label></td>';
				$nestedData['name'] = $r->first_name.' '.$r->last_name;
                $nestedData['email'] = $r->email;
                $nestedData['amount'] = $r->amount;
				$nestedData['created_at'] = date('d-m-Y',strtotime($r->created_at));
				$nestedData['action'] = '
                                <div>
                                <td>
                                    <a class="btn btn-sm btn-clean btn-icon" onclick="event.preventDefault();viewInfo('.$r->id.');" title="Order Client" href="javascript:void(0)">
                                        <i class="icon-1x text-dark-50 flaticon-eye"></i>
                                    </a>

                                    <a class="btn btn-sm btn-clean btn-icon" onclick="event.preventDefault();del('.$r->id.');" title="Delete order" href="javascript:void(0)">
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

    public function orderDetail(Request $request)
	{

		$order = Order::findOrFail($request->id);
		return view('admin.orders.detail', ['title' => 'Order Detail', 'order' => $order]);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        $order = Order::find($id);
	    if($order->is_admin == 0){
		    $order->delete();
		    Session::flash('success_message', 'Order successfully deleted!');
	    }
	    return redirect()->route('orders.index');
    }
    public function deleteSelectedOrders(Request $request)
	{
        return $request->all();
		$input = $request->all();
		$this->validate($request, [
			'orders' => 'required',

		]);
		foreach ($input['categories'] as $index => $id) {

			$order = Order::find($id);
			if($order){
				$order->delete();
			}

		}
		Session::flash('success_message', 'Orders successfully deleted!');
		return redirect()->back();

	}
}
