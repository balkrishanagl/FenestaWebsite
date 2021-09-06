<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutFenesta;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
		$listings = DB::table('about_fenestas')
            ->select()->where('is_delete','0')->where('type','1')
            ->get();
        $title = "About Fenesta";  
        $type=1;
		return view('admin.about.list',compact('listings','title','type'));
	}
    public function ourinfrastructure(){
		$listings = DB::table('about_fenestas')
            ->select()->where('is_delete','0')->where('type','2')->orwhere('type','7')
            ->get();
        $title = "Our Infrastructure";      $type=2;
		return view('admin.about.list',compact('listings','title','type'));
	}
    public function ourvalues(){
		$listings = DB::table('about_fenestas')
            ->select()->where('is_delete','0')->where('type','3')
            ->get();
         $title = "Our Values";       $type=3;
		return view('admin.about.list',compact('listings','title','type'));
	}
    public function ourleadership(){
		$listings = DB::table('about_fenestas')
            ->select()->where('is_delete','0')->where('type','5')
            ->get();
         $title = "Our Leadership";       $type=5;
		return view('admin.about.list',compact('listings','title','type'));
	}
    public function businessportfolio(){
		$listings = DB::table('about_fenestas')
            ->select()->where('is_delete','0')->where('type','6')
            ->get();
         $title = "Our Business Portfolio";       $type=6;
		return view('admin.about.list',compact('listings','title','type'));
	}
    public function lifefenesta(){
		$listings = DB::table('about_fenestas')
            ->select()->where('is_delete','0')->where('type','4')
            ->get();
         $title = "Life @ Fenesta";   $type=4;
		return view('admin.about.list',compact('listings','title','type'));
	}
    public function add(Request $request)
	{
        $id = $request->segment(3);
    	return view('admin.about.add',compact('id'));
	}

	public function save(Request $request){
        
        if($request->type!=6){
		$validated = $request->validate([
				'type'		=> 'required',
        		'title'		 		=> 'required',
        		'image' 			=> 'required',
    		]);
        }else{
           $validated = $request->validate([
				'type'		=> 'required',
        		'title'		 		=> 'required',
    		]); 
        }
        
			
		if ($request->isMethod('post')) {
			$data = $request->all();
            $news = new AboutFenesta;
			$images = $request->file('image');
            if ($request->hasFile('image')) :
                    
                        $var = date_create();
                        $time = date_format($var, 'YmdHis');
                        $imageName = $data['type'].'-'.$time . '-' . $request->image->getClientOriginalName();
                        $request->image->move(public_path('images/about'), $imageName);
                       
                    
                    $image = $imageName;
            
    		$news->image = $image;
            endif;  

			$news->type = $data['type'];
			$news->title = $data['title'];
			$news->description = 	$data['description'];
			$news->status = 	$data['status'];
			$news->created_at = date('Y-m-d H:i:s');

			$news->save();
            
            if($data['type']==1){
                return redirect('admin/aboutfenesta')->with('success','About fenesta has been added successfully');
            }elseif($data['type']==2 || $data['type']==7){
                return redirect('admin/ourinfrastructure')->with('success','Our infrastructure has been added successfully');
            }elseif($data['type']==3){
                return redirect('admin/ourvalues')->with('success','Our values has been added successfully');
            }elseif($data['type']==5){
                return redirect('admin/ourleadership')->with('success','Our Leadership has been added successfully');
            }elseif($data['type']==6){
                return redirect('admin/businessportfolio')->with('success','Our Business Portfolio has been added successfully');
            }else{
                return redirect('admin/lifefenesta')->with('success','Life fenesta has been added successfully');
            }
			

		}
	}

	
	public function edit(Request $request,$id){
		$news = AboutFenesta::find($id);
		return view('admin.about.edit',compact('news'));
	}

	public function update(Request $request,$id){
		$validated = $request->validate([
				'type'		=> 'required',
        		'title'		 		=> 'required',
//        		'description'			=> 'required',
//        		'image' 			=> 'required',
    		]);
		if ($request->isMethod('POST')) {
			$news = AboutFenesta::find($id);
			$data = $request->all();
    		 $images = $request->file('image');
            if ($request->hasFile('image')) :
                   
                        $var = date_create();
                        $time = date_format($var, 'YmdHis');
                        $imageName = $data['type'].'-'.$time . '-' . $request->image->getClientOriginalName();
                        $request->image->move(public_path('images/about'), $imageName);
                        
                   
            $news->image = $imageName; 
            endif;
            
			$news->type = $data['type'];
			$news->title = $data['title'];
			$news->status = $data['status'];
			$news->description = 	$data['description'];
			$news->created_at = date('Y-m-d H:i:s');
    		

			$news->save();
			 if($data['type']==1){
                return redirect('admin/aboutfenesta')->with('success','About fenesta has been Updated successfully');
            }elseif($data['type']==2 || $data['type']==7){
                return redirect('admin/ourinfrastructure')->with('success','Our infrastructure has been Updated successfully');
            }elseif($data['type']==3){
                return redirect('admin/ourvalues')->with('success','Our values has been Updated successfully');
            }elseif($data['type']==5){
                return redirect('admin/ourleadership')->with('success','Our Leadership has been Updated successfully');
            }elseif($data['type']==6){
                return redirect('admin/businessportfolio')->with('success','Our Business Portfolio has been Updated successfully');
            }else{
                return redirect('admin/lifefenesta')->with('success','Life fenesta has been Updated successfully');
            }
		}
		
	}

	public function delete(Request $request,$id){
		$news = AboutFenesta::find($id);
		$result = array();
		if(!empty($news)){
			$isDeleted = AboutFenesta::where('id', $id)->update(array('is_delete' => '2'));
			if($isDeleted){
				$result['key'] = '1';
				$result['msg'] = 'Successfully Deleted';
			}else{
				$result['key'] = '2';
				$result['msg'] = 'whoops!! This could not deleted';
			}
		}else{
			$result['key'] = '0';
			$result['msg'] = 'Not found';
		}
		return json_encode($result);

	}



}
