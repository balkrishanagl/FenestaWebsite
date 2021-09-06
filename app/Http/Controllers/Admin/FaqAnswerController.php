<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\FaqAnswer;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class FaqAnswerController extends Controller
{  public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    	$faq = DB::table('faqs')
            ->select('id','title', 'question','created_at')->where('is_delete','0')
            ->get();

        $select = [];
			foreach($faq as $faqs){
    			$select[$faqs->id] = $faqs->question;
			}
		return view('admin.FaqAnswer.addAnswer',compact('select'));
    }

    public function saveFaqAnswer(Request $request){
    	$validated = $request->validate([
        		'faq_id' 		=> 'required',
        		'answer' 		=> 'required',
        		
    		]);

    	if ($request->isMethod('post')) {
			$data = $request->all();

			$faqAnswer = new FaqAnswer;
			$faqAnswer->faq_id = $data['faq_id'];
			$faqAnswer->answer = $data['answer'];
			

			$faqAnswer->save();
			return redirect('admin/listFaq')->with('success','Faq Answer has been added successfully'); 
		}
    }



	public function lisFaqAnswers(){
		$answers = DB::table('Faq_answers')
            ->select('id','faq_id', 'answer')->where('is_delete','0')
            ->get();
           
		return view('admin.FaqAnswer.lisFaqAnswers')->with('blogs',$answers);
	}

	public function editFaqAnswer(Request $request,$id){
		$faqAnswer = FaqAnswer::find($id);
		$selectedId = $faqAnswer->faq_id;
		$faq = Faq::pluck('question', 'id');
		return view('admin.FaqAnswer.editFaqAnswer',compact('faqAnswer','faq','selectedId'));
	}


	public function updateFaqAnswer(Request $request,$id){
		$validated = $request->validate([
        		'faq_id' 		=> 'required',
        		'answer' 		=> 'required',
        		
    		]);
		if ($request->isMethod('post')) {
			$data = $request->all();
			$faqAnswer = FaqAnswer::find($id);
			$faqAnswer->faq_id = $data['faq_id'];
			$faqAnswer->answer = $data['answer'];
			

			$faqAnswer->save();
			return redirect('admin/listFaq')->with('success','Faq Answer has been Updated successfully');
		}
	}

	public function deleteFaqAnswer(Request $request,$id){
		$faqAnswer = FaqAnswer::find($id);
		$result = array();
		if(!empty($faqAnswer)){
			$isDeleted = FaqAnswer::where('id', $id)->update(array('is_delete' => '1'));
			if($isDeleted){
				$result['key'] = '1';
				$result['msg'] = 'Faq Answer Deleted';
			}else{
				$result['key'] = '2';
				$result['msg'] = 'whoops!! Faq Answer could not deleted';
			}
		}else{
			$result['key'] = '0';
			$result['msg'] = 'Faq Answer not found';
		}
		return json_encode($result);

	}
}
