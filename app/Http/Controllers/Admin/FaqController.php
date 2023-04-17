<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Support\Facades\Session;

class FaqController extends Controller
{
    
    public function index()
    {
        $title = "Faqs";
        return view('admin.faqs.index',compact('title'));
    }

    public function getfaqs(Request $request){
      
        $columns = array(
			0 => 'id',
			1 => 'question',
			4 => 'created_at',
			5 => 'action'
		);
		
		$totalData = Faq::count();
		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');
		
		if(empty($request->input('search.value'))){
			$faqs = Faq::offset($start)
				->limit($limit)
				->orderBy($order,$dir)
				->get();
			$totalFiltered = Faq::count();
		}else{
			$search = $request->input('search.value');
			$faqs = Faq::where([
				
				['question', 'like', "%{$search}%"],
			])
				
				->orWhere('created_at','like',"%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy($order, $dir)
				->get();
			$totalFiltered = Faq::where([
				
				['question', 'like', "%{$search}%"],
			])
				->orWhere('created_at','like',"%{$search}%")
				->count();
		}
		
		
		$data = array();
		
		if($faqs){
			foreach($faqs as $r){
				$edit_url = route('faqs.edit',$r->id);
				$nestedData['id'] = '<td><label class="checkbox checkbox-outline checkbox-success"><input type="checkbox" name="faqs[]" value="'.$r->id.'"><span></span></label></td>';
				$nestedData['question'] = $r->question;
				$nestedData['created_at'] = date('d-m-Y',strtotime($r->created_at));
				$nestedData['action'] = '
                                <div>
                                <td>
									<a class="btn btn-sm btn-clean btn-icon" onclick="event.preventDefault();viewInfo('.$r->id.');" title="View FAQ" href="javascript:void(0)">
									<i class="icon-1x text-dark-50 flaticon-eye"></i>
									</a>
                                    <a title="Edit Faqs" class="btn btn-sm btn-clean btn-icon"
                                       href="'.$edit_url.'">
                                       <i class="icon-1x text-dark-50 flaticon-edit"></i>
                                    </a>
                                    <a class="btn btn-sm btn-clean btn-icon" onclick="event.preventDefault();del('.$r->id.');" title="Delete Faqs" href="javascript:void(0)">
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
    public function faqDetail(Request $request){
        	
		$faq = Faq::findOrFail($request->id);
		
		
		return view('admin.faqs.detail', ['title' => 'FAQs Detail', 'faq' => $faq]);
    }

    public function create()
    {
        $title = "Create FAQs";
		$faq_cats = FaqCategory::latest()->get();
		
		return view('admin.faqs.create',compact('title','faq_cats'));
	
    }


    public function store(Request $request)
    {
		$this->validate($request, [
		    'faq_id' 	=> 'required',
			'question' 	=> 'required',
			'answer' 	=> 'required'
	    ]);
        $faqs = Faq::create([
            'faq_category_id' => $request->faq_id,
			'question' => $request->question,
			'answer' => $request->answer
        ]);
        Session::flash('success_message', 'Great! FAQs has been saved successfully!');
	  
	    return redirect()->route('faqs.index');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
		$title = "Edit FAQs";
		$faq_cats = FaqCategory::latest()->get();
		$faqs = Faq::find($id);
		
		return view('admin.faqs.edit',compact('title','faq_cats','faqs'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
		    'faq_id' 	=> 'required',
			'question' 	=> 'required',
			'answer' 	=> 'required'
	    ]);
        $faqs = Faq::where('id',$id)->update([
            'faq_category_id' => $request->faq_id,
			'question' => $request->question,
			'answer' => $request->answer
        ]);
        Session::flash('success_message', 'Great! FAQs has been Update successfully!');
	  
	    return redirect()->route('faqs.index');
    }

    public function destroy($id)
    {
	    $faq = Faq::find($id);
	    if($faq){
		    $faq->delete();
		    Session::flash('success_message', 'FAQs successfully deleted!');
	    }
	    return redirect()->route('faqs.index');
	   
    }
	public function deleteSelectedClients(Request $request)
	{
		$input = $request->all();
		$this->validate($request, [
			'faqs' => 'required',
		
		]);
		foreach ($input['faqs'] as $index => $id) {
			
			$faqs = Faq::find($id);
			if($faqs){
				$faqs->delete();
			}
			
		}
		Session::flash('success_message', 'Faqs successfully deleted!');
		return redirect()->back();
		
	}
}
