<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeatureBenefit;
use App\Models\Serie;
use App\Models\WindowType;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class FeaturebenefitController extends Controller
{  public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
	{
        $series = DB::table('series')
                    ->select('title')->where('is_delete','0')
                    ->get(); 
        
         $windowdoortype = DB::table('window_types')
        ->select('id','title', 'slug','product')->where('is_delete','0')->where('product_type','Window')
        ->get();
        $doortype = DB::table('window_types')
        ->select('id','title', 'slug','product')->where('is_delete','0')->where('product_type','Door')
        ->get();
        
		return view('admin.Featurebenefit.addFeaturebenefit',compact('series','windowdoortype','doortype'));
	}


	public function saveFeaturebenefit(Request $request){
		$validated = $request->validate([
				'name'					=> 'required',
        		'title'		 			=> 'required',
        		'description'			=> 'required',
        		'result' 			=> 'required',
        		'meta_title' 		=> 'required|unique:pages|max:255',
        		'meta_description' 	=> 'required',
//        		'belowimage' 			=> 'required',
        		'icon'			=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=50,max_height=50|max:2048',
        		'onhovericon'			=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=50,max_height=50|max:2048',
        		'image'		=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=1200,max_height=700|max:2048',
        		
    		]);
		if ($request->isMethod('post')) {
			$data = $request->all();
			$userImage = $data['icon'];
    		$userImageName = time().'.'.$request->icon->extension();
    		$request->icon->move(public_path('images/featurebenefit/icon'), $userImageName);

    		$userImageNamec = 'onhover'.time().'.'.$request->onhovericon->extension();
    		$request->onhovericon->move(public_path('images/featurebenefit/icon'), $userImageNamec);

    		$referenceImage =   $data['image'];
    		$referenceImageName = time().'.'.$request->image->extension();
    		$request->image->move(public_path('images/featurebenefit/image'), $referenceImageName);
			$testimonial = new FeatureBenefit;
			$testimonial->name = $data['name'];
            $testimonial->slug = $this->createUrlSlug($data['name']);
			$testimonial->othername = $data['othername'];
			$testimonial->title = $data['title'];
			$testimonial->status = $data['status'];
			$testimonial->belowimage = $data['belowimage'];
			$testimonial->showon = $data['showon'];
			$testimonial->description = $data['description'];
			$testimonial->result = 	$data['result'];
			$testimonial->meta_title = $data['meta_title'];
			$testimonial->meta_keyword = $data['meta_keyword'];
			$testimonial->meta_description = $data['meta_description'];
			$testimonial->belowpoints = 	$data['belowpoints'];
    		$testimonial->icon = $userImageName;
    		$testimonial->onhovericon = $userImageNamec;
    		$testimonial->image = $referenceImageName;
    		//$testimonial->created_at = date('Y-m-d H:i:s');
            
			$testimonial->windowtype = 	json_encode($data['windowdata']);
			$testimonial->doortype = 	json_encode($data['doordata']);

            
           $testimonial->optiondata = 	json_encode($data['optiondata']);
            
			$testimonial->save();

			return redirect('admin/listFeaturebenefit')->with('success','Feature benefits has been added successfully');

		}
	}

	public function listFeaturebenefit(){
		$testimonials = DB::table('feature_benefits')
            ->select('id','name','title', 'description','status','result','icon','image','created_at')->where('is_delete','0')
            ->get();
        
           
		return view('admin.Featurebenefit.listFeaturebenefit',compact('testimonials'));
	}

	public function editFeaturebenefit(Request $request,$id){
		$testimonial = FeatureBenefit::find($id);
         $series = DB::table('series')
            ->select('title')->where('is_delete','0')
            ->get(); 
        
        $windowdoortype = DB::table('window_types')
        ->select('id','title', 'slug','product')->where('is_delete','0')->where('product_type','Window')
        ->get();
        $doortype = DB::table('window_types')
        ->select('id','title', 'slug','product')->where('is_delete','0')->where('product_type','Door')
        ->get();
        
//        $windowdoortype = DB::select("SELECT title FROM `window_types` WHERE `product_type` = 'Window' AND `is_delete` = '0' group by title");
//        $doortype = DB::select("SELECT title FROM `window_types` WHERE `product_type` = 'Door' AND `is_delete` = '0' group by title");
		return view('admin.Featurebenefit.editFeaturebenefit',compact('testimonial','series','windowdoortype','doortype'));
	}

	public function updateFeaturebenefit(Request $request,$id){
		//dd($request); die;
		if ($request->isMethod('POST')) {
			$validated = $request->validate([
				'name'					=> 'required',
        		'title'		 			=> 'required',
//        		'belowimage'		 			=> 'required',
        		'description'			=> 'required',
        		'result'			=> 'required',
//        		'icon'			=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=900,max_height=500|max:2048',
//        		'image'		=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=900,max_height=500|max:2048',
        		
    		]);
			$testimonial = FeatureBenefit::find($id);
			$data = $request->all();
            if(!empty($request->icon))
            {
            $userImage = $data['icon'];
    		$userImageName = time().'.'.$request->icon->extension();
    		$request->icon->move(public_path('images/featurebenefit/icon'), $userImageName);
            $testimonial->icon = $userImageName;
           } 
            if(!empty($request->onhovericon))
            {
            //$userImage = $data['icon'];
    		$userImageNames = 'onhover'.time().'.'.$request->onhovericon->extension();
    		$request->onhovericon->move(public_path('images/featurebenefit/icon'), $userImageNames);
            $testimonial->onhovericon = $userImageNames;
           }
        if(!empty($request->image)){
            $referenceImage =   $data['image'];
    		$referenceImageName = time().'.'.$request->image->extension();
    		$request->image->move(public_path('images/featurebenefit/image'), $referenceImageName);
        $testimonial->image = $referenceImageName;
           }
			$testimonial->name = $data['name'];
            $testimonial->slug = $this->createUrlSlug($data['name']);
			$testimonial->othername = $data['othername'];
			$testimonial->title = $data['title'];
			$testimonial->description = $data['description'];
			$testimonial->belowimage = $data['belowimage'];
			$testimonial->meta_title = $data['meta_title'];
			$testimonial->meta_keyword = $data['meta_keyword'];
			$testimonial->meta_description = $data['meta_description'];
			$testimonial->status = $data['status'];
			$testimonial->showon = $data['showon'];
			$testimonial->result = 	$data['result'];
			$testimonial->belowpoints = 	$data['belowpoints'];
			$testimonial->windowtype = 	json_encode($data['windowdata']);
			$testimonial->doortype = 	json_encode($data['doordata']);
//            echo "<pre>";
//            print_r($data['optiondata']);
//            die;
			$testimonial->optiondata = 	json_encode($data['optiondata']);
    		
    		
            
            
//                    if(!empty($request->recom)){
//                     $i_vc=0;$arrmu=array();
//                    foreach ($request->recom as $ik => $item):
//                        print_r($item);
//                        die;
//                         if(!empty($item['recom_title'])){
//                            
//                        $arrmu[$i_vc]['title'] = $item['recom_title'];
//                        $arrmu[$i_vc]['content'] = $item['recom_content'];
//                     $i_vc=$i_vc+1;
//                          }
//                    endforeach;
//                        
//                    if(!empty($arrmu)){
//                    $jdata = json_encode($arrmu);
//                    $homeBanner->optiondata = $jdata;
//                    }
//                        }
//            
            
    		$testimonial->save();
    		return redirect('admin/listFeaturebenefit')->with('success','Feature benefits has been Updated successfully');
		}
	}


	public function deleteFeaturebenefit(Request $request,$id){
		$testimonial = FeatureBenefit::find($id);
		$result = array();
		if(!empty($testimonial)){
			$isDeleted = FeatureBenefit::where('id', $id)->update(array('is_delete' => '1'));
			if($isDeleted){
				$result['key'] = '1';
				$result['msg'] = 'Feature Benefits Deleted';
			}else{
				$result['key'] = '2';
				$result['msg'] = 'whoops!! Feature Benefits could not deleted';
			}
		}else{
			$result['key'] = '0';
			$result['msg'] = 'Feature Benefits not found';
		}
		return json_encode($result);

	}


	private function createUrlSlug($string){
		$slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
		return strtolower($slug);
	}
}
