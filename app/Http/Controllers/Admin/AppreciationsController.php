<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appreciation;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class AppreciationsController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
	{
		
		return view('admin.Appreciation.addAppreciation');
	}

	public function saveAppreciation(Request $request){
		$validated = $request->validate([
        		'name' 			=> 'required',
        		'description' 	=> 'required',
        		'image'			=> 'required',		
        		'category'			=> 'required',		
    		]);
		if ($request->isMethod('post')) {
			$data = $request->all();
			$image = $data['image'];
    		$imageName = time().'.'.$request->image->extension();  

    		$request->image->move(public_path('images/appreciation'), $imageName);
			$appreciation = new Appreciation;
			$appreciation->name = $data['name'];
			$appreciation->description = $data['description'];
			$appreciation->state = $data['state'];
			$appreciation->city = $data['city'];
			$appreciation->status = $data['status'];
			$appreciation->category = $data['category'];
    		$appreciation->image = $imageName;

			$appreciation->save();

			return redirect('admin/listAppreciation')->with('success','Appreciation has been added successfully');

		}
	}

	public function listAppreciation(){
		$appreciation = DB::table('appreciations')
            ->select('id','name','status','description','category','image','state','city','created_at')->where('is_delete','0')
            ->get();
            
		return view('admin.Appreciation.listAppreciation')->with('appreciation',$appreciation);
	}


	public function editAppreciation(Request $request,$id){
		$appreciation = Appreciation::find($id);
		return view('admin.Appreciation.editAppreciation',compact('appreciation'));
	}

	public function updateAppreciation(Request $request,$id){
		$validated = $request->validate([
        		'name' 			=> 'required',
        		'description' 	=> 'required',
//        		'image'			=> 'required',		
        		'category'			=> 'required',		
    		]);

		if ($request->isMethod('post')) {
			$data = $request->all();
            if(!empty($request->image)){
			$image = $data['image'];
    		$imageName = time().'.'.$request->image->extension();  

    		$request->image->move(public_path('images/appreciation'), $imageName);
                
    		$appreciation->image = $imageName;
            }
			$appreciation = Appreciation::find($id);
			$appreciation->name = $data['name'];
			$appreciation->description = $data['description'];
			$appreciation->state = $data['state'];
			$appreciation->city = $data['city'];
			$appreciation->status = $data['status'];
			$appreciation->category = $data['category'];

			$appreciation->save();

			return redirect('admin/listAppreciation')->with('success','Appreciation has been Updated successfully');

		}
	}

	public function deleteAppreciation(Request $request,$id){
		$appreciation = Appreciation::find($id);
		$result = array();
		if(!empty($appreciation)){
			$isDeleted = Appreciation::where('id', $id)->update(array('is_delete' => '1'));
			if($isDeleted){
				$result['key'] = '1';
				$result['msg'] = 'Appreciation Deleted';
			}else{
				$result['key'] = '2';
				$result['msg'] = 'whoops!! Appreciation could not deleted';
			}
		}else{
			$result['key'] = '0';
			$result['msg'] = 'Appreciation not found';
		}
		return json_encode($result);

	}
}
