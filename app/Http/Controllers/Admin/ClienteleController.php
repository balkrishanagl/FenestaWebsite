<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeBannerImage;
use App\Models\GalleryImages;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use URL;
class ClienteleController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }
	public function clientele(){
		return view('admin.Clientele.Clientele');
	}


	public function saveClientele(Request $request){
		if($request->isMethod('post')){
			$postData = $request->all();
			
         	/*foreach($request->file('images') as $file)
            {
           
                $name = time().'.'.$file->extension();
                //$request->home_banner_small->move(public_path('images/home_banner/small'), $smallBannerName);
                $file->move(public_path('/images/gallery_images'), $name);
                $data['image'] = $name;  
            }*/

            
           
         	$imageName = 'clientele'.time().'.'.$request->images->extension();
            $request->images->move(public_path('/images/gallery_images'), $imageName);
            $galleryImages  = new GalleryImages;
         	$galleryImages->heading=$postData['heading'];
         	$galleryImages->zonewise=$postData['zonewise'];
//            $galleryImages->showon=$postData['showon'];
            $galleryImages->segtype=$postData['segtype'];
            $galleryImages->status=$postData['status'];
            $galleryImages->showonhome=$postData['showonhome'];
            $galleryImages->type='clientele';
         	$galleryImages->image = $imageName;
         	$galleryImages->save();
         	return redirect('admin/listClientele')->with('success','Clientele has been added successfully'); 
		}
	}
	public function listClientele(){
		$gallery = DB::table('gallery_images')->select('id','showon','status','segtype','zonewise','heading','image','created_at')->where('is_delete','0')->where('type','clientele')->orderBy('id','DESC')
            ->get();
		return view('admin.Clientele.listClientele')->with('gallery',$gallery);
	}


	public function editClientele(Request $request,$id){
		$gallery = GalleryImages::find($id);
		return view('admin.Clientele.editClientele',compact('gallery'));
	}

	public function updateClientele(Request $request,$id){
		if($request->isMethod('post')){
			$postData = $request->all();
			$gallery  = GalleryImages::find($id);
            
            if(!empty($request->images)){
			$imageName = 'clientele'.time().'.'.$request->images->extension();
            $request->images->move(public_path('/images/gallery_images'), $imageName);
         	$gallery->image = $imageName;
            }
         	$gallery->heading=$postData['heading'];
//            $gallery->showon=$postData['showon'];
            $gallery->zonewise=$postData['zonewise'];
            $gallery->segtype=$postData['segtype'];
            $gallery->status=$postData['status'];
            $gallery->showonhome=$postData['showonhome'];
            $gallery->type='clientele';
         	$gallery->save();
         	return redirect('admin/listClientele')->with('success','Clientele has been updated successfully'); 
		}
	}

	public function deleteClientele(Request $request,$id){
		$gallery = GalleryImages::find($id);
		$result = array();
		if(!empty($gallery)){
			$isDeleted = GalleryImages::where('id', $id)->update(array('is_delete' => '1'));
			if($isDeleted){
				$result['key'] = '1';
				$result['msg'] = 'Clientele Deleted';
			}else{
				$result['key'] = '2';
				$result['msg'] = 'whoops!! Clientele could not deleted';
			}
		}else{
			$result['key'] = '0';
			$result['msg'] = 'Clientele not found';
		}
		return json_encode($result);

	}
}
