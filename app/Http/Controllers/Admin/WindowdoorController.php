<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WindowDoor;
use App\Models\WindowdoorType;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class WindowdoorController extends Controller
{  public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
	{
		return view('admin.Windowdoor.add');
	}
	public function save(Request $request){
		if($request->isMethod('post')){
			$validated = $request->validate([
				'heading' 				=> 'required',
				'window_image'		=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=593,max_height=603|max:2048|',
        		'door_image' 	=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=593,max_height=603|max:2048|',
    		]);

    		$data = $request->all();
			$image = $data['door_image'];
    		$imageName = 'door'.time().'.'.$request->door_image->extension(); 
    		$request->door_image->move(public_path('images/windowdoor'), $imageName);

    		$smallImage = $data['window_image'];
    		$smallBannerName = 'window'.time().'.'.$request->window_image->extension();
    		$request->window_image->move(public_path('images/windowdoor'), $smallBannerName); 

    		$homeBanner = new WindowDoor;
    		$homeBanner->heading = $data['heading'];
    		$homeBanner->status = $data['status'];
    		$homeBanner->window_image = $smallBannerName;
    		$homeBanner->door_image = $imageName;
    		$homeBanner->save();
    		return redirect('admin/list')->with('success','Window & Door Type has been added successfully'); 
		}
	}


	public function list(){
		$banners = DB::table('window_doors')
            ->select('id','heading','window_image', 'door_image','status')->where('is_delete','0')
            ->get();
            
		return view('admin.Windowdoor.list')->with('banners',$banners);
	}

	public function edit(Request $request,$id){
		$banner = WindowDoor::find($id);
		return view('admin.Windowdoor.edit',compact('banner'));
	}

	public function update(Request $request,$id){
		if ($request->isMethod('POST')) {
			$validated = $request->validate([
				'heading' 				=> 'required',
				'window_image'		=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=593,max_height=603|max:2048|',
        		'door_image' 	=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=593,max_height=603|max:2048|',
    		]);
			$homeBanner = WindowDoor::find($id);

			$data = $request->all();
			$imageName = 'door'.time().'.'.$request->door_image->extension(); 
    		$request->door_image->move(public_path('images/windowdoor'), $imageName); 
    		$homeBanner->door_image = $imageName;

    		$smallImage = $data['window_image'];
    		$smallBannerName = 'window'.time().'.'.$request->window_image->extension();
    		$request->window_image->move(public_path('images/windowdoor'), $smallBannerName);

    		$homeBanner->heading = $data['heading'];
    		$homeBanner->status = $data['status'];
    		$homeBanner->window_image = $smallBannerName;
    		$homeBanner->door_image = $imageName; 

    		$homeBanner->save();
    		return redirect('admin/list')->with('success','Window & Door Type has been Updated successfully');
		}
	}


	public function delete(Request $request,$id){
		$banner = WindowDoor::find($id);
		$result = array();
		if(!empty($banner)){
			$isDeleted = WindowDoor::where('id', $id)->update(array('is_delete' => '1'));
			if($isDeleted){
				$result['key'] = '1';
				$result['msg'] = 'Window & Door Home Deleted';
			}else{
				$result['key'] = '2';
				$result['msg'] = 'whoops!! Window & Door Home could not deleted';
			}
		}else{
			$result['key'] = '0';
			$result['msg'] = 'Window & Door Home not found';
		}
		return json_encode($result);

	}



}
