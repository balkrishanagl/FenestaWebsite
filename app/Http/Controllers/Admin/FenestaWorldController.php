<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FenestaWorld;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class FenestaWorldController extends Controller
{  public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
	{
		
		return view('admin.FenestaWorld.addFenestaWorld');
	}

	public function saveFenestaWorld(Request $request){
		$validated = $request->validate([
        		'title' 			=> 'required',
        		'description' 		=> 'required',
        		'image'				=> 'required',		
    		]);
		if ($request->isMethod('post')) {
			$data = $request->all();
			$image = $data['image'];
    		$imageName = time().'.'.$request->image->extension();  

    		$request->image->move(public_path('images/fenesta_world'), $imageName);
			$fenestaWorld = new FenestaWorld;
			$fenestaWorld->title = $data['title'];
			$fenestaWorld->status = $data['status'];
			$fenestaWorld->description = $data['description'];
    		$fenestaWorld->image = $imageName;

			$fenestaWorld->save();

			return redirect('admin/listFenestaWorld')->with('success','Data has been added successfully');

		}
	}


	public function listFenestaWorld(){
		$fenestaWorld = DB::table('fenesta_worlds')
            ->select('id','status','title','description','image','created_at')->where('is_delete','0')
            ->get();
            
		return view('admin.FenestaWorld.listFenestaWorld')->with('fenestaWorld',$fenestaWorld);
	}

	public function editFenestaWorld(Request $request,$id){
		$fenestaWorld = FenestaWorld::find($id);
		return view('admin.FenestaWorld.editFenestaWorld',compact('fenestaWorld'));
	}

	public function updateFenestaWorld(Request $request,$id){
		$validated = $request->validate([
        		'title' 			=> 'required',
        		'description' 		=> 'required',
//        		'image'				=> 'required',		
    		]);

		if ($request->isMethod('post')) {
			$data = $request->all();
            
			$fenestaWorld = FenestaWorld::find($id);
            if(!empty($request->image)){
			$image = $data['image'];
    		$imageName = time().'.'.$request->image->extension();  

    		$request->image->move(public_path('images/fenesta_world'), $imageName);
                
    		$fenestaWorld->image = $imageName;
            }
			$fenestaWorld->title = $data['title'];
			$fenestaWorld->description = $data['description'];
			$fenestaWorld->status = $data['status'];

			$fenestaWorld->save();

			return redirect('admin/listFenestaWorld')->with('success','Data has been Updated successfully');

		}
	}

	public function deleteFenestaWorld(Request $request,$id){
		$fenestaWorld = FenestaWorld::find($id);
		$result = array();
		if(!empty($fenestaWorld)){
			$isDeleted = FenestaWorld::where('id', $id)->update(array('is_delete' => '1'));
			if($isDeleted){
				$result['key'] = '1';
				$result['msg'] = 'Data Deleted';
			}else{
				$result['key'] = '2';
				$result['msg'] = 'whoops!! Data could not deleted';
			}
		}else{
			$result['key'] = '0';
			$result['msg'] = 'Data not found';
		}
		return json_encode($result);

	}
}
