<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrimOption;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class TrimoptionController extends Controller
{  public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
	{

		return view('admin.Trim.addTrim');
	}

	public function saveTrim(Request $request){
		$validated = $request->validate([
				'type'		=> 'required',
        		'title'		 		=> 'required',
        		'description'			=> 'required',
        		'image' 			=> 'required',
    		]);
		if ($request->isMethod('post')) {
			$data = $request->all();
			$images = $request->file('image');
            if ($request->hasFile('image')) :
                    foreach ($images as $item):
                        $var = date_create();
                        $time = date_format($var, 'YmdHis');
                        $imageName = $time . '-' . $item->getClientOriginalName();
                        $item->move(public_path('images/trim'), $imageName);
                        $arr[] = $imageName;
                    endforeach;
                    $image = implode(",", $arr);
            else:
                    $image = '';
            endif;  

			$news = new TrimOption;
			$news->type = $data['type'];
			$news->title = $data['title'];
			$news->status = $data['status'];
			$news->description = 	$data['description'];
			$news->created_at = date('Y-m-d H:i:s');
    		$news->image = $image;

			$news->save();

			return redirect('admin/listTrim')->with('success','Trim Option has been added successfully');

		}
	}

	public function listTrim(){
		$news = DB::table('trim_options')
            ->select('id','status','type','description','title','image','created_at')->where('is_delete','0')
            ->get();
            
		return view('admin.Trim.listTrim')->with('news',$news);
	}

	public function editTrim(Request $request,$id){
		$news = TrimOption::find($id);
		return view('admin.Trim.editTrim',compact('news'));
	}

	public function updateTrim(Request $request,$id){
		$validated = $request->validate([
				'type'		=> 'required',
        		'title'		 		=> 'required',
        		'description'			=> 'required',
//        		'image' 			=> 'required',
    		]);
		if ($request->isMethod('POST')) {
			$news = TrimOption::find($id);
			$data = $request->all();
    		 $images = $request->file('image');
            if ($request->hasFile('image')) :
                    foreach ($images as $item):
                        $var = date_create();
                        $time = date_format($var, 'YmdHis');
                        $imageName = $time . '-' . $item->getClientOriginalName();
                        $item->move(public_path('images/trim'), $imageName);
                        $arr[] = $imageName;
                    endforeach;
                    $image = implode(",", $arr);
            $news->image = $image; 
            endif;
            
			$news->type = $data['type'];
			$news->title = $data['title'];
			$news->description = 	$data['description'];
			$news->status = 	$data['status'];
			$news->created_at = date('Y-m-d H:i:s');
    		

			$news->save();
			return redirect('admin/listTrim')->with('success','Trim Option has been Updated successfully');
		}
		
	}

	public function deleteTrim(Request $request,$id){
		$news = TrimOption::find($id);
		$result = array();
		if(!empty($news)){
			$isDeleted = TrimOption::where('id', $id)->update(array('is_delete' => '1'));
			if($isDeleted){
				$result['key'] = '1';
				$result['msg'] = 'Trim Option Deleted';
			}else{
				$result['key'] = '2';
				$result['msg'] = 'whoops!! Trim Option could not deleted';
			}
		}else{
			$result['key'] = '0';
			$result['msg'] = 'Trim Option not found';
		}
		return json_encode($result);

	}



}
