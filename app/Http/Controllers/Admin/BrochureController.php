<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brochure;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class BrochureController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
	{
        $windowproduct = DB::table('brochures')
            ->select()->where('is_delete','0')
            ->get();
            
		return view('admin.brochure.add',compact('windowproduct'));
	}

	public function list(){
		$banners = DB::table('brochures')
            ->select()->where('is_delete','0')
            ->get();
            
            
		return view('admin.brochure.list',compact('banners'));
	}
	public function save(Request $request){
		if($request->isMethod('post')){
			$validated = $request->validate([
				'title' 				=> 'required',
				'image'		=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=593,max_height=603|max:2048|',
        		'pdf' 	=> 'required',
    		]);

    		$data = $request->all();
			$image = $data['pdf'];
    		$imageName = str_replace(' ', '_', $data['title']).'.'.$request->pdf->extension(); 
    		$request->pdf->move(public_path('images/brochure'), $imageName);

    		$smallImage = $data['image'];
    		$smallBannerName = time().'.'.$request->image->extension();
    		$request->image->move(public_path('images/brochure'), $smallBannerName); 
 
    		$homeBanner = new Brochure;
    		$homeBanner->title = $data['title'];
    		$homeBanner->status = $data['status'];
    		$homeBanner->image = $smallBannerName;
    		$homeBanner->pdf = $imageName;
    		$homeBanner->save();
    		return redirect('admin/Brochurelist')->with('success','Brochure has been added successfully'); 
		}
	}


	public function edit(Request $request,$id){
		$banner = DB::table('brochures')
            ->select()->where('is_delete','0')->where('id',$id)
            ->first();
        
		return view('admin.brochure.edit',compact('banner'));
	}

	public function update(Request $request,$id){
		if ($request->isMethod('POST')) {
			$validated = $request->validate([
				'title' 				=> 'required',
				
				//'image'		=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=593,max_height=603|max:2048|',
        		//'door_image' 	=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=593,max_height=603|max:2048|',
    		]);
			$homeBanner = Brochure::find($id);

			$data = $request->all();
            if(!empty($data['pdf'])){
    		$pdfImage = $data['pdf'];
    		$pdfName = str_replace(' ', '_', $data['title']).'.'.$request->pdf->extension();
    		$request->pdf->move(public_path('images/brochure'), $pdfName);
            }else{
             $pdfName = $request->exist_pdf;   
            }
            
            if(!empty($data['image'])){
    		$smallImage = $data['image'];
    		$smallBannerName = time().'.'.$request->image->extension();
    		$request->image->move(public_path('images/brochure'), $smallBannerName);
            }else{
             $smallBannerName = $request->exist_image;   
            }
            
    		$homeBanner->title = $data['title'];
    		$homeBanner->status = $data['status'];
    		$homeBanner->image = $smallBannerName;
    		$homeBanner->pdf = $pdfName;

    		$homeBanner->save();
    		return redirect('admin/Brochurelist')->with('success','Brochure has been Updated successfully');
		}
	}


	public function delete(Request $request,$id){
		$banner = Brochure::find($id);
		$result = array();
		if(!empty($banner)){
			$isDeleted = Brochure::where('id', $id)->update(array('is_delete' => '1'));
			if($isDeleted){
				$result['key'] = '1';
				$result['msg'] = 'Brochure Deleted';
			}else{
				$result['key'] = '2';
				$result['msg'] = 'whoops!! Brochure could not deleted';
			}
		}else{
			$result['key'] = '0';
			$result['msg'] = 'Brochure not found';
		}
		return json_encode($result);

	}


    

}
