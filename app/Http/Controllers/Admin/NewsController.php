<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{  public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
	{

		return view('admin.News.addNews');
	}

	public function saveNews(Request $request){
		$validated = $request->validate([
				'upload_type'		=> 'required',
        		'title'		 		=> 'required|unique:news|max:255',
        		'detail'			=> 'required',
        		'image' 			=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=900,max_height=500|max:2048',
        		'content' 			=> 'required',
    		]);
		if ($request->isMethod('post')) {
			$data = $request->all();
			$image = $data['image'];
    		$imageName = time().'.'.$request->image->extension();  

    		$request->image->move(public_path('images/news'), $imageName);
			$news = new News;
			$news->upload_type = $data['upload_type'];
			$news->title = $data['title'];
			$news->detail = $data['detail'];
			$news->slug = $this->createUrlSlug($data['title']);
			$news->content = 	$data['content'];
			$news->status = 	$data['status'];
			$news->created_at = date('Y-m-d H:i:s');
    		$news->image = $imageName;

			$news->save();

			return redirect('admin/listNews')->with('success','News has been added successfully');

		}
	}

	public function listNews(){
		$news = DB::table('news')
            ->select('id','status','upload_type','detail','title','image','created_at')->where('is_delete','0')
            ->get();
            
		return view('admin.News.listNews')->with('news',$news);
	}

	public function editNews(Request $request,$id){
		$news = News::find($id);
		return view('admin.News.editNews',compact('news'));
	}

	public function updateNews(Request $request,$id){
		$validated = $request->validate([
				'upload_type'		=> 'required',
        		'title'		 		=> 'required|unique:news|max:255',
        		'detail'			=> 'required',
        		'image' 			=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=900,max_height=500|max:2048',
        		'content' 			=> 'required',
    		]);
		if ($request->isMethod('POST')) {
			$news = News::find($id);
			$data = $request->all();
    		$imageName = time().'.'.$request->image->extension();  

    		$request->image->move(public_path('images/news'), $imageName);
			$news->upload_type = $data['upload_type'];
			$news->title = $data['title'];
			$news->detail = $data['detail'];
			$news->status = $data['status'];
			$news->slug = $this->createUrlSlug($data['title']);
			$news->content = 	$data['content'];
			$news->created_at = date('Y-m-d H:i:s');
    		$news->image = $imageName;

			$news->save();
			return redirect('admin/listNews')->with('success','News has been Updated successfully');
		}
		
	}

	public function deleteNews(Request $request,$id){
		$news = News::find($id);
		$result = array();
		if(!empty($news)){
			$isDeleted = News::where('id', $id)->update(array('is_delete' => '1'));
			if($isDeleted){
				$result['key'] = '1';
				$result['msg'] = 'News Deleted';
			}else{
				$result['key'] = '2';
				$result['msg'] = 'whoops!! News could not deleted';
			}
		}else{
			$result['key'] = '0';
			$result['msg'] = 'News not found';
		}
		return json_encode($result);

	}


	private function createUrlSlug($string){
		$slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
		return $slug;
	}
}
