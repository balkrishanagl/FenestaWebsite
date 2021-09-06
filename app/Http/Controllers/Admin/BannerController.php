<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeBannerImage;
use App\Models\GalleryImages;
use App\Models\Page;
use App\Models\WindowdoorType;
//use App\Models\WindowType;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use View;

use URL;
class BannerController extends Controller
{  public function __construct()
    {
     $this->middleware('auth');
    
     $pages=Page::orderBy('page_title', 'asc')->get();
     $product=WindowdoorType::where('is_delete','0')->orderBy('id', 'DESC')->get();
//     $producttype=WindowType::where('is_delete','0')->orderBy('id', 'DESC')->get();
        
     view::share('pages', $pages);
     view::share('product', $product);
//     view::share('producttype', $producttype);
    }
    public function index()
	{
        $query = json_decode(file_get_contents(URL::to('/js/states-and-districts.json')));
            
        $regions_arr = $query->states;
        $regions = array();
        $regions[0]='Default';
          foreach($regions_arr as $key =>$val){
            $regions[$val->state]= $val->state;
          }
		return view('admin.Banner.addBanner',compact('regions'));
	}

	public function saveBanner(Request $request){
		if($request->isMethod('post')){
			$validated = $request->validate([
				'heading' 				=> 'required',
				'sub_heading'   		=> 'required',
				'hover_heading' 		=> 'required',
				'hover_sub_heading' 	=> 'required',
				'home_banner_small'		=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=413,max_height=553|max:2048|',
        		'home_banner_image' 	=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=413,max_height=553|max:2048|',
    		]);

    		$data = $request->all();
			$image = $data['home_banner_image'];
    		$imageName = time().'.'.$request->home_banner_image->extension(); 
    		$request->home_banner_image->move(public_path('images/home_banner/big'), $imageName);

    		$smallImage = $data['home_banner_small'];
    		$smallBannerName = time().'.'.$request->home_banner_small->extension();
    		$request->home_banner_small->move(public_path('images/home_banner/small'), $smallBannerName); 

    		$homeBanner = new HomeBannerImage;
    		$homeBanner->heading = $data['heading'];
    		$homeBanner->sub_heading = $data['sub_heading'];
    		$homeBanner->hover_heading = $data['hover_heading'];
    		$homeBanner->hover_sub_heading = $data['hover_sub_heading'];
    		$homeBanner->home_banner_small = $smallBannerName;
    		$homeBanner->home_banner_image = $imageName;
    		$homeBanner->regions = $data['regions'];
            
    		$homeBanner->save();
    		return redirect('admin/listBanner')->with('success','Banner has been added successfully'); 
		}
	}

	public function listBanner(){
		$banners = DB::table('home_banner_images')
            ->select('id','heading','sub_heading','hover_heading','hover_sub_heading','home_banner_small','status', 'home_banner_image')->where('is_delete','0')->orderBy('id','DESC')
            ->get();
            
		return view('admin.Banner.listBanner')->with('banners',$banners);
	}

	public function editBanner(Request $request,$id){
		$banner = HomeBannerImage::find($id);
        $query = json_decode(file_get_contents(URL::to('/js/states-and-districts.json')));
            
        $regions_arr = $query->states;
        $regions = array();
        $regions[0]='Default';
          foreach($regions_arr as $key =>$val){
            $regions[$val->state]= $val->state;
          }
        
		return view('admin.Banner.editBanner',compact('banner','regions'));
	}

	public function updateBanner(Request $request,$id){
		if ($request->isMethod('POST')) {
			$validated = $request->validate([
				'heading' 				=> 'required',
				'sub_heading'   		=> 'required',
				'hover_heading' 		=> 'required',
				'hover_sub_heading' 	=> 'required',
//				'home_banner_small'		=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=413,max_height=553|max:2048|',
//        		'home_banner_image' 	=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=413,max_height=553|max:2048|',
                'exist_home_banner_small'		=> 'required',
        		'exist_home_banner_image' 	=> 'required',
    		]);
			$homeBanner = HomeBannerImage::find($id);

			$data = $request->all();
            

            if(!empty($request->home_banner_image)){
			$imageName = time().'.'.$request->home_banner_image->extension(); 
    		$request->home_banner_image->move(public_path('images/home_banner/big'), $imageName); 
    		$homeBanner->home_banner_image = $imageName;
            }else{
              $imageName = $request->exist_home_banner_image;
            }
            
            
            if(!empty($request->home_banner_small)){
    		$smallImage = $data['home_banner_small'];
    		$smallBannerName = time().'.'.$request->home_banner_small->extension();
    		$request->home_banner_small->move(public_path('images/home_banner/small'), $smallBannerName);
            }else{
                 $smallBannerName = $request->exist_home_banner_small;
            }

    		$homeBanner->heading = $data['heading'];
    		$homeBanner->sub_heading = $data['sub_heading'];
    		$homeBanner->hover_heading = $data['hover_heading'];
    		$homeBanner->hover_sub_heading = $data['hover_sub_heading'];
    		$homeBanner->status = $data['status'];
    		$homeBanner->home_banner_small = $smallBannerName;
    		$homeBanner->home_banner_image = $imageName; 
    		$homeBanner->regions = $data['regions'];

    		$homeBanner->save();
    		return redirect('admin/listBanner')->with('success','Banner has been Updated successfully');
		}
	}

	public function deleteBanner(Request $request,$id){
		$banner = HomeBannerImage::find($id);
		$result = array();
		if(!empty($banner)){
			$isDeleted = HomeBannerImage::where('id', $id)->update(array('is_delete' => '1'));
			if($isDeleted){
				$result['key'] = '1';
				$result['msg'] = 'Banner Deleted';
			}else{
				$result['key'] = '2';
				$result['msg'] = 'whoops!! Banner could not deleted';
			}
		}else{
			$result['key'] = '0';
			$result['msg'] = 'Banner not found';
		}
		return json_encode($result);

	}


	// image gallary

	public function galleryImages(){
		return view('admin.Banner.galleryImages');
	}


	public function saveGallery(Request $request){
		if($request->isMethod('post')){
			$postData = $request->all();
			
         	/*foreach($request->file('images') as $file)
            {
           
                $name = time().'.'.$file->extension();
                //$request->home_banner_small->move(public_path('images/home_banner/small'), $smallBannerName);
                $file->move(public_path('/images/gallery_images'), $name);
                $data['image'] = $name;  
            }*/

            
           
         	$imageName = time().'.'.$request->images->extension();
            $request->images->move(public_path('/images/gallery_images'), $imageName);
            $galleryImages  = new GalleryImages;
         	$galleryImages->heading=$postData['heading'];
         	$galleryImages->zonewise=$postData['zonewise'];
            $galleryImages->showon=implode(',',$postData['showon']);
            $galleryImages->segtype=$postData['segtype'];
            $galleryImages->status=$postData['status'];
            $galleryImages->type='gallery';
         	$galleryImages->image = $imageName;
         	$galleryImages->save();
         	return redirect('admin/listGalleryImages')->with('success','Image has been added successfully'); 
		}
	}
	public function listGalleryImages(){
		$gallery = DB::table('gallery_images')
            ->select('id','showon','status','segtype','zonewise','heading','image','created_at')->where('is_delete','0')->where('type','gallery')->orderBy('id','DESC')
            ->get();
		return view('admin.Banner.listGalleryImages')->with('gallery',$gallery);
	}


	public function editGalleryImage(Request $request,$id){
		$gallery = GalleryImages::find($id);
		return view('admin.Banner.editGalleryImage',compact('gallery'));
	}

	public function updateGalleryImage(Request $request,$id){
		if($request->isMethod('post')){
			$postData = $request->all();
			$gallery  = GalleryImages::find($id);
            if($request->images){
			$imageName = time().'.'.$request->images->extension();
            $request->images->move(public_path('/images/gallery_images'), $imageName);
                
         	$gallery->image = $imageName;
            }
         	$gallery->heading=$postData['heading'];
            $gallery->showon=implode(',',$postData['showon']);
            $gallery->zonewise=$postData['zonewise'];
            $gallery->segtype=$postData['segtype'];
            $gallery->status=$postData['status'];
            $gallery->type='gallery';
         	$gallery->save();
         	return redirect('admin/listGalleryImages')->with('success','Image has been updated successfully'); 
		}
	}

	public function deleteGalleryImage(Request $request,$id){
		$gallery = GalleryImages::find($id);
		$result = array();
		if(!empty($gallery)){
			$isDeleted = GalleryImages::where('id', $id)->update(array('is_delete' => '1'));
			if($isDeleted){
				$result['key'] = '1';
				$result['msg'] = 'Image Deleted';
			}else{
				$result['key'] = '2';
				$result['msg'] = 'whoops!! Image could not deleted';
			}
		}else{
			$result['key'] = '0';
			$result['msg'] = 'Image not found';
		}
		return json_encode($result);

	}
}
