<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GreatFacade;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class GreatfacadeController extends Controller
{  public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
	{

		return view('admin.Greatfacade.addGreatfacade');
	}


	public function saveGreatfacade(Request $request){
		$validated = $request->validate([
				
        		'title'		 			=> 'required',
        		'description'			=> 'required',
        		'youtube_url' 			=> 'required',
        		'reference_image'		=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=900,max_height=500|max:2048',
        		
    		]);
		if ($request->isMethod('post')) {
			$data = $request->all();
			
    		$referenceImage =   $data['reference_image'];
    		$referenceImageName = 'reference_'.time().'.'.$request->reference_image->extension();
    		$request->reference_image->move(public_path('images/greatfacade'), $referenceImageName);
			$testimonial = new GreatFacade;
			$testimonial->title = $data['title'];
			$testimonial->description = $data['description'];
			$testimonial->status = $data['status'];
			$testimonial->youtube_url = 	$data['youtube_url'];
    		$testimonial->reference_image = $referenceImageName;
    		//$testimonial->created_at = date('Y-m-d H:i:s');

			$testimonial->save();

			return redirect('admin/listGreatfacade')->with('success','Great facade has been added successfully');

		}
	}

	public function listGreatfacade(){
		$testimonials = DB::table('great_facades')
            ->select('id','title', 'description','status','youtube_url','reference_image','created_at')->where('is_delete','0')->orderBy('id','desc')
            ->get();
           
		return view('admin.Greatfacade.listGreatfacade')->with('testimonials',$testimonials);
	}

	public function editGreatfacade(Request $request,$id){
		$testimonial = GreatFacade::find($id);
		return view('admin.Greatfacade.editGreatfacade',compact('testimonial'));
	}

	public function updateGreatfacade(Request $request,$id){
		if ($request->isMethod('POST')) {
			$validated = $request->validate([
        		'title'		 			=> 'required',
        		'description'			=> 'required',
        		'youtube_url' 			=> 'required',
        		'reference_image'		=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=900,max_height=500|max:2048',
        		
    		]);
			$testimonial = GreatFacade::find($id);
			$data = $request->all();

    		$referenceImage =   $data['reference_image'];
    		$referenceImageName = 'reference_'.time().'.'.$request->reference_image->extension();
    		$request->reference_image->move(public_path('images/greatfacade'), $referenceImageName);
			$testimonial->title = $data['title'];
			$testimonial->description = $data['description'];
			$testimonial->status = $data['status'];
			$testimonial->youtube_url = 	$data['youtube_url'];
    		$testimonial->reference_image = $referenceImageName;
    		$testimonial->save();
    		return redirect('admin/listGreatfacade')->with('success','Great facade has been Updated successfully');
		}
	}


	public function deleteGreatfacade(Request $request,$id){
		$testimonial = GreatFacade::find($id);
		$result = array();
		if(!empty($testimonial)){
			$isDeleted = GreatFacade::where('id', $id)->update(array('is_delete' => '1'));
			if($isDeleted){
				$result['key'] = '1';
				$result['msg'] = 'Greatfacade Deleted';
			}else{
				$result['key'] = '2';
				$result['msg'] = 'whoops!! Greatfacade could not deleted';
			}
		}else{
			$result['key'] = '0';
			$result['msg'] = 'Greatfacade not found';
		}
		return json_encode($result);

	}

}
