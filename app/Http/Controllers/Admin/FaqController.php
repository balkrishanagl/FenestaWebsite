<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\Page;
use App\Models\WindowdoorType;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use View;

class FaqController extends Controller
{
    
    
	public function __construct(){
    $this->middleware('auth');
     $pages=Page::orderBy('page_title', 'asc')->get();
     $product=WindowdoorType::where('is_delete','0')->orderBy('id', 'DESC')->get();
        
     view::share('pages', $pages);
     view::share('product', $product);
    }
    
    
    public function index()
	{
		
		return view('admin.Faq.addFaq');
	}

		public function saveFaq(Request $request){
		$validated = $request->validate([
        		'title' 		=> 'required',
        		'answer' 		=> 'required',
    		]);
		if ($request->isMethod('post')) {
			$data = $request->all();

			$faq = new Faq;
			$faq->title = $data['title'];
			$faq->answer = $data['answer'];
			$faq->status = $data['status'];
			$faq->page = implode(',',$data['page']);
			$faq->slug = $this->createUrlSlug($data['title']);

			$faq->save();
			return redirect('admin/listFaq')->with('success','Faq has been added successfully'); 
		}
	}

	public function listFaq(){
		/*$faq = DB::table('faqs')
			 ->join('faq_answers','faqs.id','=','faq_answers.faq_id')
            ->select('faqs.*','faq_answers.answer','faq_answers.id as faqAnsId','faq_answers.is_delete as faqAnswerDelete')->where('faqs.is_delete','0')
            ->get();*/

        $faq = DB::table('faqs')
            ->select('id','title','status', 'answer','is_delete','created_at')->where('is_delete','0')->orderBy('id','DESC')
            ->get();
            
		return view('admin.Faq.listFaq')->with('faq',$faq);
	}

	public function editFaq(Request $request,$id){
		$faq = Faq::find($id);
		return view('admin.Faq.editFaq',compact('faq'));
	}

	public function updateFaq(Request $request,$id){
		$validated = $request->validate([
        		'title' 		=> 'required',
        		'answer' 	=> 'required',
    		]);

		if ($request->isMethod('POST')) {
			$data = $request->all();
			$faq = Faq::find($id);
			$faq->title = $data['title'];
			$faq->answer = $data['answer'];
			$faq->status = $data['status'];
            $faq->page = implode(',',$data['page']);
			$faq->slug = $this->createUrlSlug($data['title']);
			//$faq->created_at = date('Y-m-d H:i:s');

			$faq->save();
			return redirect('admin/listFaq')->with('success','Faq has been Updated successfully');
		}
	}

	public function deleteFaq(Request $request,$id){
		$faq = Faq::find($id);
		$result = array();
		if(!empty($faq)){
			$isDeleted = Faq::where('id', $id)->update(array('is_delete' => '1'));
			if($isDeleted){
				$result['key'] = '1';
				$result['msg'] = 'Faq Deleted';
			}else{
				$result['key'] = '2';
				$result['msg'] = 'whoops!! Faq could not deleted';
			}
		}else{
			$result['key'] = '0';
			$result['msg'] = 'Faq not found';
		}
		return json_encode($result);

	}

	private function createUrlSlug($string){
		$slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
		return $slug;
	}
}
