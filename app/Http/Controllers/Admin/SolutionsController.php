<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solution;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class SolutionsController extends Controller
{  public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
	{	
        $id = $request->segment(3);
		return view('admin.Solutions.add',compact('id'));
	}

	public function save(Request $request){
		$validated = $request->validate([
        		'title' 			=> 'required',
        		'type' 			=> 'required',
        		'description' 		=> 'required',
        		'image'				=> 'required',				
        		'mainimage'				=> 'required',				
        		'show_on'				=> 'required',				
        		'status'				=> 'required',				
    		]);
		if ($request->isMethod('post')) {
			$data = $request->all();
            
			$fenestaWorld = new Solution;
            
			$image = $data['image'];
    		$imageName = time().'.'.$request->image->extension();  

    		$request->image->move(public_path('images/solutions'), $imageName);
            
            if($request->mainimage){
    		$imageNamea = "main".time().'.'.$request->mainimage->extension();  
    		$request->mainimage->move(public_path('images/solutions'), $imageNamea);
            
    		$fenestaWorld->mainimage = $imageNamea;
            
            }
			$fenestaWorld->title = $data['title'];
			$fenestaWorld->type = $data['type'];
			$fenestaWorld->description = $data['description'];
			$fenestaWorld->show_on = $data['show_on'];
			$fenestaWorld->status = $data['status'];
    		$fenestaWorld->image = $imageName;

			$fenestaWorld->save();

            if($data['type']==1){
                return redirect('admin/qualityinnovations')->with('success','Data has been added successfully');
            }elseif($data['type']==2){
                return redirect('admin/servicesinfrastructure')->with('success','Data has been added successfully');
            }elseif($data['type']==3){
                return redirect('admin/brandheritage')->with('success','Data has been added successfully');
            }else{
                return redirect('admin/greensustainability')->with('success','Data has been added successfully');
            }
		}
	}


	public function list(){
		$fenestaWorld = DB::table('solutions')
            ->select('id','title','description','status','mainimage','created_at')->where('is_delete','0')->where('type','1')
            ->get();
             $title = "Quality & Innovations";      $type=1;
		return view('admin.Solutions.list',compact('fenestaWorld','title','type'));
	}
 
 
    public function servicesinfrastructure(){
		$fenestaWorld = DB::table('solutions')
            ->select('id','title','description','status','mainimage','created_at')->where('is_delete','0')->where('type','2')->get();
        $title = "Services & Infrastructure";      $type=2;
		return view('admin.Solutions.list',compact('fenestaWorld','title','type'));
	}
    public function brandheritage(){
		$fenestaWorld = DB::table('solutions')
            ->select('id','title','description','status','mainimage','created_at')->where('is_delete','0')->where('type','3')->get();
         $title = "Brand & Heritage";       $type=3;
		return view('admin.Solutions.list',compact('fenestaWorld','title','type'));
	}
    public function greensustainability(){
		$fenestaWorld = DB::table('solutions')
            ->select('id','title','description','status','mainimage','created_at')->where('is_delete','0')->where('type','4')->get();
         $title = "Green & Sustainability";       $type=4;
		return view('admin.Solutions.list',compact('fenestaWorld','title','type'));
	}
 
 

	public function edit(Request $request,$id){
		$fenestaWorld = Solution::find($id);
		return view('admin.Solutions.edit',compact('fenestaWorld'));
	}

	public function update(Request $request,$id){
		$validated = $request->validate([
        		'title' 			=> 'required',
        		'description' 		=> 'required',
//        		'image'				=> 'required',	
            'show_on'				=> 'required',				
        		'status'				=> 'required',	
    		]);

			$fenestaWorld = Solution::find($id);
		if ($request->isMethod('post')) {
			$data = $request->all();
//			$image = $da/ta['image'];
            if($request->image){
    		$imageName = time().'.'.$request->image->extension();  

    		$request->image->move(public_path('images/solutions'), $imageName);
             
    		$fenestaWorld->image = $imageName;   
            }
            
            if($request->mainimage){
    		$imageNamea = time().'.'.$request->mainimage->extension();  

    		$request->mainimage->move(public_path('images/solutions'), $imageNamea);
             
    		$fenestaWorld->mainimage = $imageNamea;   
            }
            
			$fenestaWorld->title = $data['title'];
			$fenestaWorld->description = $data['description'];
			$fenestaWorld->show_on = $data['show_on'];
			$fenestaWorld->status = $data['status'];

			$fenestaWorld->save();

			
            if($data['type']==1){
                return redirect('admin/qualityinnovations')->with('success','Data has been updated successfully');
            }elseif($data['type']==2){
                return redirect('admin/servicesinfrastructure')->with('success','Data has been updated successfully');
            }elseif($data['type']==3){
                return redirect('admin/brandheritage')->with('success','Data has been updated successfully');
            }else{
                return redirect('admin/greensustainability')->with('success','Data has been updated successfully');
            }

		}
	}

	public function delete(Request $request,$id){
		$fenestaWorld = Solution::find($id);
		$result = array();
		if(!empty($fenestaWorld)){
			$isDeleted = Solution::where('id', $id)->update(array('is_delete' => '2'));
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
