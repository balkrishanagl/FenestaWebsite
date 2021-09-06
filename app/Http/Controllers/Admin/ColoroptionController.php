<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coloroption;
use App\Models\WindowdoorType;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use View;
class ColoroptionController extends Controller
{  public function __construct()
    {
        $this->middleware('auth');
    
        $windowdoorget = WindowdoorType::where('is_delete','0')->get();
        $windowdoor = array();
        foreach($windowdoorget as $ww){
            $windowdoor[$ww->id]=$ww->title;
        }
        view::share('windowdoor', $windowdoor);
    }
    public function index($id=NULL)
	{
        if(!empty($id)){
        $windowdoor = $id;
        }else{
           
        $windowdoor = ''; 
        }
        
		return view('admin.Coloroption.add')->with('id',$windowdoor);
	}

	public function save(Request $request){
		if($request->isMethod('post')){
			$validated = $request->validate([
				'title' 				=> 'required',
				'type' 				=> 'required',
//				'slider_images' 				=> 'required',
				'windowdoor' 				=> 'required',
				'image'		=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=593,max_height=603|max:2048|',
        		
    		]);
   
            
    		$homeBanner = new Coloroption;
    		$data = $request->all();
            if(!empty($data['image'])){
    		$smallImage = $data['image'];
    		$smallBannerName = time().'.'.$request->image->extension();
    		$request->image->move(public_path('images/coloroption'), $smallBannerName);
                
    		$homeBanner->image = $smallBannerName;
            }
            
            $images = $request->file('slider_images');
            if ($request->hasFile('slider_images')) :
                    foreach ($images as $item):
                        $var = date_create();
                        $time = date_format($var, 'YmdHis');
                        $imageName = $time . '-' . $item->getClientOriginalName();
                        $item->move(public_path('images/coloroption'), $imageName);
                        $arr[] = $imageName;
                    endforeach;
                    $image = implode(",", $arr);
            
    	        	$homeBanner->slider_images = $image;
            else:
                    $image = '';
            endif;
            
            
    		$homeBanner->title = $data['title'];
    		$homeBanner->type = $data['type'];
    		$homeBanner->windowdoor = $data['windowdoor'];
    		$homeBanner->status = $data['status'];
    		$homeBanner->save();
            if($data['type']=='Window'){
                return redirect('admin/Coloroption/window-list')->with('success','Color option has been added successfully'); 
            }elseif($data['type']=='Door'){
                return redirect('admin/Coloroption/door-list')->with('success','Color option has been added successfully'); 
            }else{
    		return redirect('admin/Coloroption/list')->with('success','Color option has been added successfully'); 
            }
		}
	}

	public function list($id=NULL){
        
        if(!empty($id)){
            $banners = DB::table('coloroptions')
                ->select('coloroptions.title as title','windowdoor_types.title as wtitle','coloroptions.type as type', 'coloroptions.image as image', 'coloroptions.id as id', 'coloroptions.status as status')->join('windowdoor_types', 'coloroptions.windowdoor', '=', 'windowdoor_types.id')->where('coloroptions.is_delete','0')
            ->get();
            $product_id = $id;
        }else{
          $banners = DB::table('coloroptions')
                ->select('coloroptions.title as title','windowdoor_types.title as wtitle','coloroptions.type as type', 'coloroptions.image as image', 'coloroptions.id as id', 'coloroptions.status as status')->join('windowdoor_types', 'coloroptions.windowdoor', '=', 'windowdoor_types.id')->where('coloroptions.is_delete','0')
            ->get();  
            $product_id = '';
        }
		
            
		return view('admin.Coloroption.list',compact('banners','product_id'));
	}

	public function windowlist(){
        
        
          $banners = DB::table('coloroptions')
            ->select('coloroptions.title as title','windowdoor_types.title as wtitle','coloroptions.type as type', 'coloroptions.image as image', 'coloroptions.id as id', 'coloroptions.status as status')->join('windowdoor_types', 'coloroptions.windowdoor', '=', 'windowdoor_types.id')->where('coloroptions.is_delete','0')->where('coloroptions.type','Window')
            ->get();  
            $product_id = '';
           
		return view('admin.Coloroption.list',compact('banners','product_id'));
	}

	public function doorlist(){
        
           $banners = DB::table('coloroptions')
            ->select('coloroptions.title as title','windowdoor_types.title as wtitle',
'coloroptions.type as type', 'coloroptions.image as image', 'coloroptions.id as id', 'coloroptions.status as status')->join('windowdoor_types', 'coloroptions.windowdoor', '=', 'windowdoor_types.id')->where('coloroptions.is_delete','0')->where('windowdoor_types.type','Door')
            ->get();  
            $product_id = '';
        
            
		return view('admin.Coloroption.list',compact('banners','product_id'));
	}

	public function edit(Request $request,$id){
		$banner = Coloroption::find($id);
		return view('admin.Coloroption.edit',compact('banner'));
	}


	public function update(Request $request,$id){
		if ($request->isMethod('POST')) {
			$validated = $request->validate([
				'title' 				=> 'required',
				'type' 				=> 'required',
				'windowdoor' 				=> 'required',
    		]);
			$homeBanner = Coloroption::find($id);

			$data = $request->all();
		
            if(!empty($data['image'])){
    		$smallImage = $data['image'];
    		$smallBannerName = time().'.'.$request->image->extension();
    		$request->image->move(public_path('images/coloroption'), $smallBannerName);
                
    		$homeBanner->image = $smallBannerName;
            }
            
            
            $images = $request->file('slider_images');
            if ($request->hasFile('slider_images')) :
                    foreach ($images as $item):
                        $var = date_create();
                        $time = date_format($var, 'YmdHis');
                        $imageName = $time . '-' . $item->getClientOriginalName();
                        $item->move(public_path('images/coloroption'), $imageName);
                        $arr[] = $imageName;
                    endforeach;
                    $image = implode(",", $arr);
            
    		        $homeBanner->slider_images = $image;
            else:
                    $image = '';
            endif;
            
            
            
    		$homeBanner->title = $data['title'];
    		$homeBanner->type = $data['type'];
    		$homeBanner->windowdoor = $data['windowdoor'];
    		$homeBanner->status = $data['status'];

    		$homeBanner->save();
            if($data['type']=='Window'){
                return redirect('admin/Coloroption/window-list')->with('success','Color option has been Updated successfully'); 
            }elseif($data['type']=='Door'){
                return redirect('admin/Coloroption/door-list')->with('success','Color option has been Updated successfully'); 
            }else{
    		return redirect('admin/Colorotion/list')->with('success','Color option has been Updated successfully');
            }
            
    		
		}
	}

	public function delete(Request $request,$id){
		$banner = Coloroption::find($id);
		$result = array();
		if(!empty($banner)){
			$isDeleted = Coloroption::where('id', $id)->update(array('is_delete' => '1'));
			if($isDeleted){
				$result['key'] = '1';
				$result['msg'] = 'Color Option Deleted';
			}else{
				$result['key'] = '2';
				$result['msg'] = 'whoops!! Color Option could not deleted';
			}
		}else{
			$result['key'] = '0';
			$result['msg'] = 'Color Option not found';
		}
		return json_encode($result);

	}


}
