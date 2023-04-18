<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FaqCategory;
use App\Models\Faq;
use Illuminate\Support\Facades\Session;

class FaqCategoryController extends Controller
{
   
    public function index()
    {
        $title = "Faqs Category";
        return view('admin.faq_cats.index',compact('title'));
    }

    public function getFaq_cats(Request $request){
      
        $columns = array(
			0 => 'id',
			1 => 'title',
			4 => 'created_at',
			5 => 'action'
		);
		
		$totalData = FaqCategory::count();
		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');
		
		if(empty($request->input('search.value'))){
			$faq_cats = FaqCategory::offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();
			$totalFiltered = FaqCategory::count();
		}else{
			$search = $request->input('search.value');
			$faq_cats = FaqCategory::where([
				
				['title', 'like', "%{$search}%"],
			])
				
				->orWhere('created_at','like',"%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy($order, $dir)
				->get();
			$totalFiltered = FaqCategory::where([
				
				['title', 'like', "%{$search}%"],
			])
				->orWhere('created_at','like',"%{$search}%")
				->count();
		}
		
		
		$data = array();
		
		if($faq_cats){
			foreach($faq_cats as $r){
				$edit_url = route('faq_cats.edit',$r->id);
				$nestedData['id'] = '<td><label class="checkbox checkbox-outline checkbox-success"><input type="checkbox" name="faq_cats[]" value="'.$r->id.'"><span></span></label></td>';
				$nestedData['title'] = $r->title;
				$nestedData['created_at'] = date('d-m-Y',strtotime($r->created_at));
				$nestedData['action'] = '
                                <div>
                                <td>
									<a class="btn btn-sm btn-clean btn-icon" onclick="event.preventDefault();viewInfo('.$r->id.');" title="View FAQ Category" href="javascript:void(0)">
										<i class="icon-1x text-dark-50 flaticon-eye"></i>
									</a>
                                    <a title="Edit FAQCategory" class="btn btn-sm btn-clean btn-icon"
                                       href="'.$edit_url.'">
                                       <i class="icon-1x text-dark-50 flaticon-edit"></i>
                                    </a>
                                    <a class="btn btn-sm btn-clean btn-icon" onclick="event.preventDefault();del('.$r->id.');" title="Delete FAQCategory" href="javascript:void(0)">
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
    public function faq_catDetail(Request $request){
        
		$faq = FaqCategory::with('faqs')->findOrFail($request->id);
		
		return view('admin.faq_cats.detail', ['title' => 'FaqCategory Detail', 'faq' => $faq]);
    }
    public function create()
    {
        $title = "Create Faqs Category";
        return view('admin.faq_cats.create',compact('title'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
		    'title' => 'required|max:255',
	    ]);
        $faqs = FaqCategory::create([
            'title' => $request->title
        ]);
        Session::flash('success_message', 'Great! faq category has been saved successfully!');
	  
	    return redirect()->route('faq_cats.index');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $title = "Create Faqs Category";
        $faqs = FaqCategory::find($id);
        return view('admin.faq_cats.edit',compact('title','faqs'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
		    'title' => 'required|max:255',
	    ]);
        $faqs = FaqCategory::where('id',$id)->update([
            'title' => $request->title
        ]);
        Session::flash('success_message', 'Great! faq category has been update successfully!');
	  
	    return redirect()->route('faq_cats.index');
    }

    public function destroy($id)
    {
	    $faq = FaqCategory::find($id);
	    if($faq){
		    $faq->delete();
		    Session::flash('success_message', ' faqCategory successfully deleted!');
	    }
	    return redirect()->route('faq_cats.index');
	   
    }
	public function deleteSelectedClients(Request $request)
	{
		$input = $request->all();
		$this->validate($request, [
			'faq_cats' => 'required',
		
		]);
		foreach ($input['faq_cats'] as $index => $id) {
			
			$faq_cats = FaqCategory::find($id);
			if($faq_cats){
				$faq_cats->delete();
			}
			
		}
		Session::flash('success_message', 'faq Categories successfully deleted!');
		return redirect()->back();
		
	}
}
