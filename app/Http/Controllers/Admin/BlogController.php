<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index()
	{
		
		return view('admin.Blog.addBlog');
	}

	public function saveBlog(Request $request){
		$validated = $request->validate([
        		'meta_title' 		=> 'required',
        		'meta_description' 	=> 'required',
        		'meta_keyword' 	=> 'required',
        		'blog_title' => 'required|unique:blogs|max:255',
        		'blog_url' 		=> 'required',
        		'blog_content' 	=> 'required',
    		]);
		if ($request->isMethod('post')) {
			$data = $request->all();

			$blog = new Blog;
			$blog->meta_title = $data['meta_title'];
			$blog->meta_description = $data['meta_description'];
			$blog->meta_keyword = $data['meta_keyword'];
			$blog->blog_title = $data['blog_title'];
			$blog->blog_slug = $this->createUrlSlug($data['blog_title']);
			$blog->blog_url = $data['blog_url'];
			$blog->blog_content = 	$data['blog_content'];
			$blog->created_at = date('Y-m-d H:i:s');

			$blog->save();
			return redirect('admin/listBlog')->with('success','Blog has been added successfully'); 
		}
	}

	public function listBlog(){
		$blogs = DB::table('blogs')
            ->select('id','meta_title', 'meta_description','meta_keyword','blog_title','blog_url','blog_content','created_at')->where('is_delete','0')
            ->get();
           
		return view('admin.Blog.listBlog')->with('blogs',$blogs);
	}

	public function editBlog(Request $request,$id){
		$blog = Blog::find($id);
		return view('admin.Blog.editBlog',compact('blog'));
	}

	public function updateBlog(Request $request,$id){
		$validated = $request->validate([
        		'meta_title' 		=> 'required',
        		'meta_description' 	=> 'required',
        		'meta_keyword' 	=> 'required',
        		'blog_title' => 'required|unique:blogs|max:255',
        		'blog_url' 		=> 'required',
        		'blog_content' 	=> 'required',
    		]);

		if ($request->isMethod('POST')) {
			$data = $request->all();
			$blog = Blog::find($id);

			$blog->meta_title = $data['meta_title'];
			$blog->meta_description = $data['meta_description'];
			$blog->meta_keyword = $data['meta_keyword'];
			$blog->blog_title = $data['blog_title'];
			$blog->blog_slug = $this->createUrlSlug($data['blog_title']);
			$blog->blog_url = $data['blog_url'];
			$blog->blog_content = 	$data['blog_content'];
			$blog->created_at = date('Y-m-d H:i:s');

			$blog->save();
			return redirect('admin/listBlog')->with('success','Blog has been Updated successfully');
		}
	}

	public function deleteBlog(Request $request,$id){
		$blog = Blog::find($id);
		$result = array();
		if(!empty($blog)){
			$isDeleted = Blog::where('id', $id)->update(array('is_delete' => '1'));
			if($isDeleted){
				$result['key'] = '1';
				$result['msg'] = 'Page Deleted';
			}else{
				$result['key'] = '2';
				$result['msg'] = 'whoops!! Page could not deleted';
			}
		}else{
			$result['key'] = '0';
			$result['msg'] = 'Page not found';
		}
		return json_encode($result);

	}

	private function createUrlSlug($string){
		$slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
		return $slug;
	}
}
