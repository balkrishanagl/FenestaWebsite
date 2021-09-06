<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class TestimonialsController extends Controller
{  public function __construct()
    {
        $this->middleware('auth');
    
    }
    public function index()
	{

		return view('admin.Testimonials.addTestimonial');
	}


	public function saveTestimonial(Request $request){
		$validated = $request->validate([
				'name'					=> 'required',
        		'title'		 			=> 'required|unique:news|max:255',
        		'description'			=> 'required',
        		'youtube_url' 			=> 'required',
        		'city'					=> 'required',
//        		'type'					=> 'required',
        		'category'					=> 'required',
        		'user_image'			=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=900,max_height=500|max:2048',
        		'reference_image'		=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=900,max_height=500|max:2048',
        		
    		]);
		if ($request->isMethod('post')) {
			$data = $request->all();
			$userImage = $data['user_image'];
    		$userImageName = time().'.'.$request->user_image->extension();
    		$request->user_image->move(public_path('images/testimonials/user'), $userImageName);

    		$referenceImage =   $data['reference_image'];
    		$referenceImageName = 'reference_'.time().'.'.$request->reference_image->extension();
    		$request->reference_image->move(public_path('images/testimonials/reference'), $referenceImageName);
			$testimonial = new Testimonial;
			$testimonial->name = $data['name'];
			$testimonial->title = $data['title'];
			$testimonial->status = $data['status'];
			$testimonial->description = $data['description'];
			$testimonial->youtube_url = 	$data['youtube_url'];
			$testimonial->state = $data['state'];
			$testimonial->city = $data['city'];
//			$testimonial->type = 	$data['type'];
			$testimonial->category = 	$data['category'];
    		$testimonial->user_image = $userImageName;
    		$testimonial->reference_image = $referenceImageName;
    		//$testimonial->created_at = date('Y-m-d H:i:s');

			$testimonial->save();

			return redirect('admin/listTestimonials')->with('success','Testimonial has been added successfully');

		}
	}

	public function listTestimonials(){
		$testimonials = DB::table('testimonials')
            ->select('id','name','title', 'description','youtube_url','category','state','city','type','user_image','reference_image','created_at','status')->where('is_delete','0')
            ->get();
           
		return view('admin.Testimonials.listTestimonials')->with('testimonials',$testimonials);
	}

	public function editTestimonial(Request $request,$id){
		$testimonial = Testimonial::find($id);
		return view('admin.Testimonials.editTestimonial',compact('testimonial'));
	}

	public function updateTestimonial(Request $request,$id){
		if ($request->isMethod('POST')) {
			$validated = $request->validate([
				'name'					=> 'required',
        		'title'		 			=> 'required|unique:news|max:255',
        		'description'			=> 'required',
        		'youtube_url' 			=> 'required',
        		'city'					=> 'required',
//        		'type'					=> 'required',
        		'category'					=> 'required',
//        		'user_image'			=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=900,max_height=500|max:2048',
//        		'reference_image'		=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=900,max_height=500|max:2048',
        		
    		]);
			$testimonial = Testimonial::find($id);
			$data = $request->all();
            if(!empty($request->user_image)){

			$userImage = $data['user_image'];
    		$userImageName = time().'.'.$request->user_image->extension();
    		$request->user_image->move(public_path('images/testimonials/user'), $userImageName);
              
    		$testimonial->user_image = $userImageName;
            }
             if(!empty($request->user_image)){
    		$referenceImage =   $data['reference_image'];
    		$referenceImageName = 'reference_'.time().'.'.$request->reference_image->extension();
    		$request->reference_image->move(public_path('images/testimonials/reference'), $referenceImageName);
            $testimonial->status = 	$data['status'];

                 
             }
			$testimonial->name = $data['name'];
			$testimonial->title = $data['title'];
			$testimonial->description = $data['description'];
			$testimonial->youtube_url = 	$data['youtube_url'];
			$testimonial->state = $data['state'];
			$testimonial->city = $data['city'];
//			$testimonial->type = 	$data['type'];
			$testimonial->category = 	$data['category'];
    		$testimonial->reference_image = $referenceImageName;
    		$testimonial->save();
    		return redirect('admin/listTestimonials')->with('success','Testimonial has been Updated successfully');
		}
	}


	public function deleteTestimonial(Request $request,$id){
		$testimonial = Testimonial::find($id);
		$result = array();
		if(!empty($testimonial)){
			$isDeleted = Testimonial::where('id', $id)->update(array('is_delete' => '1'));
			if($isDeleted){
				$result['key'] = '1';
				$result['msg'] = 'Testimonial Deleted';
			}else{
				$result['key'] = '2';
				$result['msg'] = 'whoops!! Testimonial could not deleted';
			}
		}else{
			$result['key'] = '0';
			$result['msg'] = 'Testimonial not found';
		}
		return json_encode($result);

	}

}
