<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Handlelock;
use App\Models\WindowdoorType;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use View;
class HandlelockController extends Controller
{
	public function __construct(){
      
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
        
		return view('admin.Handlelock.add')->with('id',$windowdoor);
	}

	public function save(Request $request){
		if($request->isMethod('post')){
			$validated = $request->validate([
				'title' 				=> 'required',
				'type' 				=> 'required',
//				'content' 				=> 'required',
				'windowdoor' 				=> 'required',
				'image'		=> 'required|image|mimes:jpeg,png,jpg,gif,svg|',
        		
    		]);

    		$data = $request->all();
    		$smallImage = $data['image'];
    		$smallBannerName = 'handlelock'.time().'.'.$request->image->extension();
    		$request->image->move(public_path('images/handlelock'), $smallBannerName); 

    		$homeBanner = new Handlelock;
    		$homeBanner->title = $data['title'];
    		$homeBanner->type = $data['type'];
    		$homeBanner->windowdoor = $data['windowdoor'];
    		$homeBanner->content = $data['content'];
    		$homeBanner->acessories_type = $data['acessories_type'];
    		$homeBanner->status = $data['status'];
    		$homeBanner->image = $smallBannerName;
    		$homeBanner->save();
            
            $windowdoorget = WindowdoorType::where('is_delete','0')->where('id',$data['windowdoor'])->first();
            if($windowdoorget->type=="Window"){
               
    		return redirect('admin/Handlelock/window-list')->with('success','Handle and Lock has been added successfully'); 
            }elseif($windowdoorget->type=="Door"){
              
    		return redirect('admin/Handlelock/door-list')->with('success','Handle and Lock has been added successfully'); 
            }else{
    		
    		return redirect('admin/Handlelock/list')->with('success','Handle and Lock has been added successfully'); 
            }
            
		}
	}

	public function list($id=NULL){
        
        if(!empty($id)){
            $banners = DB::table('handlelocks')
            ->select('handlelocks.title as title','windowdoor_types.title as wtitle',
'handlelocks.type as type', 'handlelocks.image as image', 'handlelocks.id as id', 'handlelocks.status as status')->join('windowdoor_types', 'handlelocks.windowdoor', '=', 'windowdoor_types.id')->where('handlelocks.is_delete','0')->where('windowdoor',$id)
            ->get();
            $product_id = $id;
        }else{
          $banners = DB::table('handlelocks')
           ->select('handlelocks.title as title','windowdoor_types.title as wtitle',
'handlelocks.type as type', 'handlelocks.image as image', 'handlelocks.id as id', 'handlelocks.status as status')->join('windowdoor_types', 'handlelocks.windowdoor', '=', 'windowdoor_types.id')->where('handlelocks.is_delete','0')
            ->get();  
            $product_id = '';
        }
		
            
		return view('admin.Handlelock.list',compact('banners','product_id'));
	}

	public function windowlist(){
        
        
          $banners = DB::table('handlelocks')
            ->select('handlelocks.title as title','windowdoor_types.title as wtitle',
'handlelocks.type as type', 'handlelocks.image as image', 'handlelocks.id as id', 'handlelocks.status as status')->join('windowdoor_types', 'handlelocks.windowdoor', '=', 'windowdoor_types.id')->where('handlelocks.is_delete','0')->where('windowdoor_types.type','Window')
            ->get();  
            $product_id = '';
           
		return view('admin.Handlelock.list',compact('banners','product_id'));
	}

	public function doorlist(){
        
           $banners = DB::table('handlelocks')
            ->select('handlelocks.title as title','windowdoor_types.title as wtitle',
'handlelocks.type as type', 'handlelocks.image as image', 'handlelocks.id as id', 'handlelocks.status as status')->join('windowdoor_types', 'handlelocks.windowdoor', '=', 'windowdoor_types.id')->where('handlelocks.is_delete','0')->where('windowdoor_types.type','Door')
            ->get();  
            $product_id = '';
        
            
		return view('admin.Handlelock.list',compact('banners','product_id'));
	}

	public function edit(Request $request,$id){
		$banner = Handlelock::find($id);
		return view('admin.Handlelock.edit',compact('banner'));
	}


	public function update(Request $request,$id){
		if ($request->isMethod('POST')) {
			$validated = $request->validate([
				'title' 				=> 'required',
				'type' 				=> 'required',
//				'content' 				=> 'required',
				'windowdoor' 				=> 'required',
    		]);
			$homeBanner = Handlelock::find($id);

			$data = $request->all();
		  if(!empty($data['image'])){
    		$smallImage = $data['image'];
    		$smallBannerName = 'handlelock'.time().'.'.$request->image->extension();
    		$request->image->move(public_path('images/handlelock'), $smallBannerName);
              
              $homeBanner->image = $smallBannerName;
              
          }

    		$homeBanner->title = $data['title'];
    		$homeBanner->type = $data['type'];
    		$homeBanner->content = $data['content'];
    		$homeBanner->acessories_type = $data['acessories_type'];
    		$homeBanner->windowdoor = $data['windowdoor'];
    		$homeBanner->status = $data['status'];
    		

    		$homeBanner->save();
            
            $windowdoorget = WindowdoorType::where('is_delete','0')->where('id',$data['windowdoor'])->first();
            if($windowdoorget->type=="Window"){
                return redirect('admin/Handlelock/window-list')->with('success','Handle Lovk has been Updated successfully');
            }elseif($windowdoorget->type=="Door"){
                return redirect('admin/Handlelock/door-list')->with('success','Handle Lovk has been Updated successfully');
            }else{
    		return redirect('admin/Handlelock/list')->with('success','Handle Lovk has been Updated successfully');
            }
		}
	}

	public function delete(Request $request,$id){
		$banner = HandleLock::find($id);
		$result = array();
		if(!empty($banner)){
			$isDeleted = HandleLock::where('id', $id)->update(array('is_delete' => '1'));
			if($isDeleted){
				$result['key'] = '1';
				$result['msg'] = 'Handle & Lock  Deleted';
			}else{
				$result['key'] = '2';
				$result['msg'] = 'whoops!! Handle & Lock  could not deleted';
			}
		}else{
			$result['key'] = '0';
			$result['msg'] = 'Handle & Lock  not found';
		}
		return json_encode($result);

	}


}
