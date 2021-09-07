<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class EndtoendController extends Controller
{  public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($type)
	{
        $type_id = $type;
		return view('admin.endtoend.add',compact('type_id'));
	}
	public function save(Request $request){
		if($request->isMethod('post')){
			$validated = $request->validate([
				'type' 				=> 'required',
				'heading' 				=> 'required',
				'image'		=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=593,max_height=603|max:2048|',
        		
    		]);

    		$data = $request->all();
            
    		$smallImage = $data['image'];
    		$smallBannerName = time().'.'.$request->image->extension();
    		$request->image->move(public_path('images/services'), $smallBannerName); 

    		$homeBanner = new Service;
    		$homeBanner->type = $data['type'];
    		$homeBanner->title = $data['heading'];
    		$homeBanner->status = $data['status'];
            if($data['type']==2){
             if(!empty($request->mainimage)){
             $mmBannerName = 'main-'.time().'.'.$request->mainimage->extension();
    	     $request->mainimage->move(public_path('images/services/rightimage'), $mmBannerName); 
                 $homeBanner->mainimage = $mmBannerName;
             }
             if(!empty($request->onhoverimage)){
             $mmBannerNamea = 'onhover-'.time().'.'.$request->onhoverimage->extension();
    	     $request->onhoverimage->move(public_path('images/services/onhover'), $mmBannerNamea); 
                 $homeBanner->onhoverimage = $mmBannerNamea;
             }
                
    		$homeBanner->contentheading = $data['contentheading'];
    		$homeBanner->content = $data['content'];
            }
    		$homeBanner->image = $smallBannerName;
    		$homeBanner->save();
    		return redirect('admin/endtoend/list/'.$data['type'])->with('success','Services has been added successfully'); 
		}
	}


	public function list($type){
        $type = $type;
		$banners = DB::table('services')
            ->select()->where('is_delete','0')->where('type',$type)
            ->get();
            
		return view('admin.endtoend.list',compact('banners','type'));
	}

	public function edit(Request $request,$id){
		$banner = Service::find($id);
		return view('admin.endtoend.edit',compact('banner'));
	}

	public function update(Request $request,$id){
		if ($request->isMethod('POST')) {
			$validated = $request->validate([
				'type' 				=> 'required',
				'heading' 				=> 'required',
//				'image'		=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=593,max_height=603|max:2048|',
        		
    		]);
			$homeBanner = Service::find($id);

			$data = $request->all();
            if(!empty($request->image)){
    		$smallImage = $data['image'];
    		$smallBannerName = time().'.'.$request->image->extension();
    		$request->image->move(public_path('images/services'), $smallBannerName);
                
    		$homeBanner->image = $smallBannerName;
            }
    		$homeBanner->type = $data['type'];
    		$homeBanner->status = $data['status'];
    		$homeBanner->title = $data['heading'];
            
         if($data['type']==2){
             if(!empty($request->mainimage)){
             $mmBannerName = 'main-'.time().'.'.$request->mainimage->extension();
    	     $request->mainimage->move(public_path('images/services/rightimage'), $mmBannerName); 
                 $homeBanner->mainimage = $mmBannerName;
             }
             if(!empty($request->onhoverimage)){
             $mmBannerNamea = 'onhover-'.time().'.'.$request->onhoverimage->extension();
    	     $request->onhoverimage->move(public_path('images/services/onhover'), $mmBannerNamea); 
                 $homeBanner->onhoverimage = $mmBannerNamea;
             }
                
    		$homeBanner->contentheading = $data['contentheading'];
    		$homeBanner->content = $data['content'];
            }
    		$homeBanner->save();
    		return redirect('admin/endtoend/list/'.$data['type'])->with('success','Services has been Updated successfully');
		}
	}


	public function delete(Request $request,$id){
		$banner = Service::find($id);
		$result = array();
		if(!empty($banner)){
			$isDeleted = Service::where('id', $id)->update(array('is_delete' => '2'));
			if($isDeleted){
				$result['key'] = '1';
				$result['msg'] = 'Services Home Deleted';
			}else{
				$result['key'] = '2';
				$result['msg'] = 'whoops!! Services could not deleted';
			}
		}else{
			$result['key'] = '0';
			$result['msg'] = 'Services not found';
		}
		return json_encode($result);

	}



}
