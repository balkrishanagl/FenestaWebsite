<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AwardAccreditation;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class AwardaccreditationController extends Controller
{  public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
	{

		return view('admin.Award.addAward');
	}

	public function saveAward(Request $request){
		$validated = $request->validate([
				'type'		=> 'required',
        		'image' 			=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=900,max_height=500|max:2048',
        		'description' 			=> 'required',
    		]);
		if ($request->isMethod('post')) {
			$data = $request->all();
			$image = $data['image'];
    		$imageName = time().'.'.$request->image->extension();  

    		$request->image->move(public_path('images/awards'), $imageName);
			$news = new AwardAccreditation;
			$news->type = $data['type'];
			$news->description = 	$data['description'];
			$news->status = 	$data['status'];
			$news->created_at = date('Y-m-d H:i:s');
    		$news->image = $imageName;

			$news->save();

			return redirect('admin/listAward')->with('success','News has been added successfully');

		}
	}

	public function listAward(){
		$news = DB::table('award_accreditations')
            ->select('id','type','description','image','created_at','status')->where('is_delete','0')
            ->get();
            
		return view('admin.Award.listAward')->with('news',$news);
	}

	public function editAward(Request $request,$id){
		$news = AwardAccreditation::find($id);
		return view('admin.Award.editAward',compact('news'));
	}

	public function updateAward(Request $request,$id){
		$validated = $request->validate([
				'type'		=> 'required',
//        		'image' 			=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=900,max_height=500|max:2048',
        		'description' 			=> 'required',
    		]);
		if ($request->isMethod('POST')) {
			$news = AwardAccreditation::find($id);
			$data = $request->all();
            if(!empty($request->image)){
    		$imageName = time().'.'.$request->image->extension();  
    		$request->image->move(public_path('images/awards'), $imageName);
            $news->image = $imageName;
            }
			$news->type = $data['type'];
			$news->description = 	$data['description'];
			$news->status = 	$data['status'];
			$news->created_at = date('Y-m-d H:i:s');
    		

			$news->save();
			return redirect('admin/listAward')->with('success','News has been Updated successfully');
		}
		
	}

	public function deleteAward(Request $request,$id){
		$news = AwardAccreditation::find($id);
		$result = array();
		if(!empty($news)){
			$isDeleted = AwardAccreditation::where('id', $id)->update(array('is_delete' => '1'));
			if($isDeleted){
				$result['key'] = '1';
				$result['msg'] = 'Awards & Accreditation  Deleted';
			}else{
				$result['key'] = '2';
				$result['msg'] = 'whoops!! Awards & Accreditation could not deleted';
			}
		}else{
			$result['key'] = '0';
			$result['msg'] = 'Awards & Accreditation not found';
		}
		return json_encode($result);

	}


}
