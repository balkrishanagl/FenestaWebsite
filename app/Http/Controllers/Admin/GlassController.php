<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GlassOption;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class GlassController extends Controller
{  public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
	{

		return view('admin.Glass.addGlass');
	}

	public function saveGlass(Request $request){
		$validated = $request->validate([
				'upload_type'		=> 'required',
        		'title'		 		=> 'required',
        		'description'			=> 'required',
        		'image' 			=> 'required',
    		]);
		if ($request->isMethod('post')) {
			$data = $request->all();
			$images = $request->file('image');
            if ($request->hasFile('image')) :
//                    foreach ($images as $item):
                        $var = date_create();
                        $time = date_format($var, 'YmdHis');
                        $imageName = $time . '-' . $request->image->getClientOriginalName();
                        $request->image->move(public_path('images/glass'), $imageName);
//                        $arr[] = $imageName;
//                    endforeach;
                    $image = $imageName;
            else:
                    $image = '';
            endif;  

			$news = new GlassOption;
			$news->upload_type = $data['upload_type'];
			$news->title = $data['title'];
			$news->description = 	$data['description'];
			$news->status = 	$data['status'];
			$news->created_at = date('Y-m-d H:i:s');
    		$news->image = $image;

			$news->save();

			return redirect('admin/listGlass')->with('success','Glass Option has been added successfully');

		}
	}

	public function listGlass(){
		$news = DB::table('glass_options')
            ->select('id','status','upload_type','description','title','image','created_at')->where('is_delete','0')
            ->get();
            
		return view('admin.Glass.listGlass')->with('news',$news);
	}

	public function editGlass(Request $request,$id){
		$news = GlassOption::find($id);
		return view('admin.Glass.editGlass',compact('news'));
	}

	public function updateGlass(Request $request,$id){
		$validated = $request->validate([
				'upload_type'		=> 'required',
        		'title'		 		=> 'required',
        		'description'			=> 'required',
//        		'image' 			=> 'required',
    		]);
		if ($request->isMethod('POST')) {
			$news = GlassOption::find($id);
			$data = $request->all();
    		
            if ($request->file('image')) :
                    
                        $var = date_create();
                        $time = date_format($var, 'YmdHis');
                        $imageName = $time . '-' . $request->image->getClientOriginalName();
                        $request->image->move(public_path('images/glass'), $imageName);
                       
            $news->image = $imageName; 
            endif;
            
			$news->upload_type = $data['upload_type'];
			$news->title = $data['title'];
			$news->description = 	$data['description'];
			$news->status = 	$data['status'];
			$news->created_at = date('Y-m-d H:i:s');
    		

			$news->save();
			return redirect('admin/listGlass')->with('success','Glass Option has been Updated successfully');
		}
		
	}

	public function deleteGlass(Request $request,$id){
		$news = GlassOption::find($id);
		$result = array();
		if(!empty($news)){
			$isDeleted = GlassOption::where('id', $id)->update(array('is_delete' => '1'));
			if($isDeleted){
				$result['key'] = '1';
				$result['msg'] = 'Glass Option Deleted';
			}else{
				$result['key'] = '2';
				$result['msg'] = 'whoops!! Glass Option could not deleted';
			}
		}else{
			$result['key'] = '0';
			$result['msg'] = 'Glass Option not found';
		}
		return json_encode($result);

	}



}
