<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MeshgrillOption;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class MeshgrillController extends Controller
{  public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
	{

		return view('admin.Meshgrill.addMeshgrill');
	}

	public function saveMeshgrill(Request $request){
		$validated = $request->validate([
				'type'		=> 'required',
				'upload_type'		=> 'required',
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
                        $item->move(public_path('images/meshgrill'), $imageName);
                        $arr[] = $imageName;
                    endforeach;
                    $image = implode(",", $arr);
            else:
                    $image = '';
            endif;  

			$news = new MeshgrillOption;
			$news->type = $data['type'];
			$news->upload_type = $data['upload_type'];
			$news->title = $data['title'];
			$news->description = 	$data['description'];
			$news->created_at = date('Y-m-d H:i:s');
    		$news->image = $image;

			$news->save();

			return redirect('admin/listMeshgrill')->with('success','Mesh & Grill Option has been added successfully');

		}
	}

	public function listMeshgrill(){
		$news = DB::table('meshgrill_options')
            ->select('id','status','upload_type','type','description','title','image','created_at')->where('is_delete','0')
            ->get();
            
		return view('admin.Meshgrill.listMeshgrill')->with('news',$news);
	}

	public function editMeshgrill(Request $request,$id){
		$news = MeshgrillOption::find($id);
		return view('admin.Meshgrill.editMeshgrill',compact('news'));
	}

	public function updateMeshgrill(Request $request,$id){
		$validated = $request->validate([
				'type'		=> 'required',
				'upload_type'		=> 'required',
        		'title'		 		=> 'required',
        		'description'			=> 'required',
//        		'image' 			=> 'required',
    		]);
		if ($request->isMethod('POST')) {
			$news = MeshgrillOption::find($id);
			$data = $request->all();
    		 $images = $request->file('image');
            if ($request->hasFile('image')) :
                    foreach ($images as $item):
                        $var = date_create();
                        $time = date_format($var, 'YmdHis');
                        $imageName = $time . '-' . $item->getClientOriginalName();
                        $item->move(public_path('images/meshgrill'), $imageName);
                        $arr[] = $imageName;
                    endforeach;
                    $image = implode(",", $arr);
            $news->image = $image; 
            endif;
            
			$news->type = $data['type'];
			$news->upload_type = $data['upload_type'];
			$news->title = $data['title'];
			$news->description = 	$data['description'];
			$news->created_at = date('Y-m-d H:i:s');
    		

			$news->save();
			return redirect('admin/listMeshgrill')->with('success','Mesh & Grill Option has been Updated successfully');
		}
		
	}

	public function deleteMeshgrill(Request $request,$id){
		$news = MeshgrillOption::find($id);
		$result = array();
		if(!empty($news)){
			$isDeleted = MeshgrillOption::where('id', $id)->update(array('is_delete' => '1'));
			if($isDeleted){
				$result['key'] = '1';
				$result['msg'] = 'Mesh & Grill Option Deleted';
			}else{
				$result['key'] = '2';
				$result['msg'] = 'whoops!! Mesh & Grill Option could not deleted';
			}
		}else{
			$result['key'] = '0';
			$result['msg'] = 'Mesh & Grill Option not found';
		}
		return json_encode($result);

	}



}
