<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Serie;
use App\Models\WindowdoorType;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use View;

class SeriesController extends Controller
{  public function __construct()
    {
        $this->middleware('auth');
    
     $product=WindowdoorType::where('is_delete','0')->orderBy('id', 'DESC')->get();  
     view::share('product', $product);
    }
    public function index()
	{

		return view('admin.Series.addSeries');
	}

	public function saveSeries(Request $request){
		$validated = $request->validate([
				'feature'		=> 'required',
        		'title'		 		=> 'required',
        		'description'			=> 'required',
        		'image' 			=> 'required',
    		]);
		if ($request->isMethod('post')) {
			$data = $request->all();
			$images = $request->file('image');
            $news = new Serie;
            if ($request->hasFile('image')) :
                   
                        $var = date_create();
                        $time = date_format($var, 'YmdHis');
                        $imageName = $time . '-' . $request->image->getClientOriginalName();
                        $request->image->move(public_path('images/series'), $imageName);
                       
                    $news->image = $imageName;
            endif;  

			
			$news->feature = $data['feature'];
			$news->status = $data['status'];
			$news->title = $data['title'];
			$news->description = 	$data['description'];
			$news->product = 	implode(',',$data['product_ids']);
			$news->created_at = date('Y-m-d H:i:s');
    		

			$news->save();

			return redirect('admin/listSeries')->with('success','Series has been added successfully');

		}
	}

	public function listSeries(){
		$news = DB::table('series')
            ->select('id','status','feature','description','title','image','created_at')->where('is_delete','0')
            ->get();
            
		return view('admin.Series.listSeries')->with('news',$news);
	}

	public function editSeries(Request $request,$id){
		$news = Serie::find($id);
		return view('admin.Series.editSeries',compact('news'));
	}

	public function updateSeries(Request $request,$id){
		$validated = $request->validate([
				'feature'		=> 'required',
        		'title'		 		=> 'required',
        		'description'			=> 'required',
//        		'image' 			=> 'required',
    		]);
		if ($request->isMethod('POST')) {
			$news = Serie::find($id);
			$data = $request->all();
    		 $images = $request->file('image');
             if ($request->hasFile('image')) :
                   
                        $var = date_create();
                        $time = date_format($var, 'YmdHis');
                        $imageName = $time . '-' . $request->image->getClientOriginalName();
                        $request->image->move(public_path('images/series'), $imageName);
                       
                    $news->image = $imageName;
            endif;  
            
			$news->feature = $data['feature'];
			$news->title = $data['title'];
			$news->status = $data['status'];
			$news->description = 	$data['description'];
			$news->created_at = date('Y-m-d H:i:s');
    		$news->product = 	implode(',',$data['product_ids']);

			$news->save();
			return redirect('admin/listSeries')->with('success','Series has been Updated successfully');
		}
		
	}

	public function deleteSeries(Request $request,$id){
		$news = Serie::find($id);
		$result = array();
		if(!empty($news)){
			$isDeleted = Serie::where('id', $id)->update(array('is_delete' => '1'));
			if($isDeleted){
				$result['key'] = '1';
				$result['msg'] = 'Series Deleted';
			}else{
				$result['key'] = '2';
				$result['msg'] = 'whoops!! Series could not deleted';
			}
		}else{
			$result['key'] = '0';
			$result['msg'] = ' Series not found';
		}
		return json_encode($result);

	}



}
