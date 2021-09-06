<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\PageMeta;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class PagesController extends Controller
{  public function __construct()
    {
        $this->middleware('auth');
    }
	public function index()
	{
		return view('admin.addPage');
	}

	public function savePage(Request $request){

		$validated = $request->validate([
        		'meta_title' 		=> 'required|unique:pages|max:255',
        		'meta_description' 	=> 'required',
        		'banner_image' 		=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        		'page_title' 		=> 'required',
        		'page_description' 	=> 'required',
    		]);
		if ($request->isMethod('post')) {
			$data = $request->all();
			$image = $data['banner_image'];
    		$imageName = time().'.'.$request->banner_image->extension();  

    		$request->banner_image->move(public_path('images'), $imageName);
			$page = new Page;
			$page->meta_title = $data['meta_title'];
			$page->meta_keyword = $data['meta_keyword'];
			$page->meta_description = $data['meta_description'];
//			$page->banner_show = $data['banner_show'];
			$page->page_title = $data['page_title'];
			$page->page_slug = $this->createUrlSlug($data['page_title']);
			$page->page_description = 	$data['page_description'];
			$page->status = 	$data['status'];
			$page->about = 	$data['about'];
			$page->created_at = date('Y-m-d H:i:s');
    		$page->banner_image = $imageName;

			$page->save();

			return redirect('admin/listPage')->with('success','Page has been added successfully');

		}
	}

	public function listPage(){

		$pages = DB::table('pages')
            ->select('id', 'meta_title','about','meta_description','page_title','page_description','banner_image','status')->where('is_delete','0')->orderBy('id', 'DESC')
            ->get();

		return view('admin.listPage')->with('pages',$pages);
	}


	public function editPage(Request $request,$id){
		$page = Page::find($id);
       // if($id==1 || $id==13){
		$wi_subtitles = PageMeta::where('page_id',$id)->where('meta_key','wi_subtitle')->first();
        if(!empty($wi_subtitles)){
        $wi_subtitle = $wi_subtitles->meta_value;
        }else{
        $wi_subtitle ='';    
        }
        
		$wi_titles = PageMeta::where('page_id',$id)->where('meta_key','wi_title')->first();
        if(!empty($wi_titles)){
        $wi_title = $wi_titles->meta_value;
        }else{
        $wi_title ='';    
        }
               
		$wi_subcontents = PageMeta::where('page_id',$id)->where('meta_key','wi_subcontent')->first();
        if(!empty($wi_subcontents)){
        $wi_subcontent = $wi_subcontents->meta_value;
        }else{
        $wi_subcontent ='';    
        }
               
		$wi_contents = PageMeta::where('page_id',$id)->where('meta_key','wi_content')->first();
        if(!empty($wi_contents)){
        $wi_content = $wi_contents->meta_value;
        }else{
        $wi_content ='';    
        }
        
		$about_headings = PageMeta::where('page_id',$id)->where('meta_key','about_heading')->first();
        if(!empty($about_headings)){
        $about_heading = $about_headings->meta_value;
        }else{
        $about_heading ='';    
        }
        
		$about_contents = PageMeta::where('page_id',$id)->where('meta_key','about_content')->first();
        if(!empty($about_contents)){
        $about_content = $about_contents->meta_value;
        }else{
        $about_content ='';    
        }

		$solu_headings = PageMeta::where('page_id',$id)->where('meta_key','solu_heading')->first();
        if(!empty($solu_headings)){
        $solu_heading = $solu_headings->meta_value;
        }else{
        $solu_heading ='';    
        }
        
//		$solu_contents = PageMeta::where('page_id',$id)->where('meta_key','solu_content')->first();
//        if(!empty($solu_contents)){
//        $solu_content = $solu_contents->meta_value;
//        }else{
//        $solu_content ='';    
//        }
//        

		$visdsg_headings = PageMeta::where('page_id',$id)->where('meta_key','visdsg_heading')->first();
        if(!empty($visdsg_headings)){
        $visdsg_heading = $visdsg_headings->meta_value;
        }else{
        $visdsg_heading ='';    
        }
        
//		$visdsg_contents = PageMeta::where('page_id',$id)->where('meta_key','visdsg_content')->first();
//        if(!empty($visdsg_contents)){
//        $visdsg_content = $visdsg_contents->meta_value;
//        }else{
//        $visdsg_content ='';    
//        }
        
		$cli_headings = PageMeta::where('page_id',$id)->where('meta_key','cli_heading')->first();
        if(!empty($cli_headings)){
        $cli_heading = $cli_headings->meta_value;
        }else{
        $cli_heading ='';    
        }
        
		$dcm_headings = PageMeta::where('page_id',$id)->where('meta_key','dcm_heading')->first();
        if(!empty($dcm_headings)){
        $dcm_heading = $dcm_headings->meta_value;
        }else{
        $dcm_heading ='';    
        }
		$dcm_contents = PageMeta::where('page_id',$id)->where('meta_key','dcm_content')->first();
        if(!empty($dcm_contents)){
        $dcm_content = $dcm_contents->meta_value;
        }else{
        $dcm_content ='';    
        }
        
		$locateus_headings = PageMeta::where('page_id',$id)->where('meta_key','locateus_heading')->first();
        if(!empty($locateus_headings)){
        $locateus_heading = $locateus_headings->meta_value;
        }else{
        $locateus_heading ='';    
        }
        
		$cltsat_headings = PageMeta::where('page_id',$id)->where('meta_key','cltsat_heading')->first();
        if(!empty($cltsat_headings)){
        $cltsat_heading = $cltsat_headings->meta_value;
        }else{
        $cltsat_heading ='';    
        }
        
		$cltsat_subheadings = PageMeta::where('page_id',$id)->where('meta_key','cltsat_subheading')->first();
        if(!empty($cltsat_subheadings)){
        $cltsat_subheading = $cltsat_subheadings->meta_value;
        }else{
        $cltsat_subheading ='';    
        }
        
		$imgglry_headings = PageMeta::where('page_id',$id)->where('meta_key','imgglry_heading')->first();
        if(!empty($imgglry_headings)){
        $imgglry_heading = $imgglry_headings->meta_value;
        }else{
        $imgglry_heading ='';    
        }
		$cusapp_headings = PageMeta::where('page_id',$id)->where('meta_key','cusapp_heading')->first();
        if(!empty($cusapp_headings)){
        $cusapp_heading = $cusapp_headings->meta_value;
        }else{
        $cusapp_heading ='';    
        }
            
		$blog_headings = PageMeta::where('page_id',$id)->where('meta_key','blog_heading')->first();
        if(!empty($blog_headings)){
        $blog_heading = $blog_headings->meta_value;
        }else{
        $blog_heading ='';    
        }
		$fw_headings = PageMeta::where('page_id',$id)->where('meta_key','fw_heading')->first();
        if(!empty($fw_headings)){
        $fw_heading = $fw_headings->meta_value;
        }else{
        $fw_heading ='';    
        }
		$banner_images = PageMeta::where('page_id',$id)->where('meta_key','banner_images')->first();
        if(!empty($banner_images)){
        $exist_banner_images = $banner_images->meta_value;
        }else{
        $exist_banner_images ='';    
        }
		$bthum_images = PageMeta::where('page_id',$id)->where('meta_key','bthum_images')->first();
        if(!empty($bthum_images)){
        $exist_bthum_images = $bthum_images->meta_value;
        }else{
        $exist_bthum_images ='';    
        }
//		$slider_images = PageMeta::where('page_id',$id)->where('meta_key','slider_images')->first();
//        if(!empty($slider_images)){
//        $exist_slider_images = $slider_images->meta_value;
//        }else{
//        $exist_slider_images ='';    
//        }
       

		$dcm_leftimage = PageMeta::where('page_id',$id)->where('meta_key','left_image')->first();
        if(!empty($dcm_leftimage)){
        $exist_dcm_leftimage = $dcm_leftimage->meta_value;
        }else{
        $exist_dcm_leftimage ='';    
        }
       
            $durable_headings = PageMeta::where('page_id',1)->where('meta_key','durable_heading')->first();
        if(!empty($durable_headings)){
        $durable_heading = $durable_headings->meta_value;
        }else{
        $durable_heading ='';    
        }
     
		$durable_subcontents = PageMeta::where('page_id',1)->where('meta_key','durable_subcontent')->first();
        if(!empty($durable_subcontents)){
        $durable_subcontent = $durable_subcontents->meta_value;
        }else{
        $durable_subcontent ='';    
        }
     
		$durable_contents = PageMeta::where('page_id',1)->where('meta_key','durable_content')->first();
        if(!empty($durable_contents)){
        $durable_content = $durable_contents->meta_value;
        }else{
        $durable_content ='';    
        }
     
		$durable_images = PageMeta::where('page_id',1)->where('meta_key','durable_image')->first();
        if(!empty($durable_images)){
        $durable_image = $durable_images->meta_value;
        }else{
        $durable_image='';    
        }
            
//		$dcm_logo = PageMeta::where('page_id',$id)->where('meta_key','logo_image')->first();
//        if(!empty($dcm_logo)){
//        $exist_dcm_logo = $dcm_logo->meta_value;
//        }else{
//        $exist_dcm_logo ='';    
//        }
//       

       // }
		return view('admin.editPage',compact('page','wi_subtitle','wi_title','wi_subcontent','wi_content','about_heading','about_content','solu_heading','visdsg_heading','cli_heading','locateus_heading','cltsat_heading','cltsat_subheading','imgglry_heading','fw_heading','cusapp_heading','exist_banner_images','exist_bthum_images','dcm_heading','dcm_content','exist_dcm_leftimage','durable_heading','durable_subcontent','durable_content','durable_image','blog_heading'));
	}

	public function updatePage(Request $request,$id){
		$validated = $request->validate([
//        		'meta_title' 		=> 'required|unique:pages|max:255',
        		'meta_title' 		=> 'required|max:255',
        		'meta_description' 	=> 'required',
//        		'banner_image' 		=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        		'page_title' 		=> 'required',
        		'page_description' 	=> 'required',
    		]);
		if ($request->isMethod('POST')) {

			$page = Page::find($id);
            
            if(!empty($request->banner_image)){
                
			$imageName = time().'.'.$request->banner_image->extension();  

    		$request->banner_image->move(public_path('images'), $imageName);
                
            }else{
                $imageName = $page->banner_image;
            }
            
            if(!empty($request->og_image)){
                
			$OgimageName = time().'.'.$request->og_image->extension();  

    		$request->og_image->move(public_path('images'), $OgimageName);
                
            }else{
                $OgimageName = $page->exist_og_image;
            }
			$page->meta_title = $request->meta_title;
			$page->meta_keyword = $request->meta_keyword;
			$page->meta_description = $request->meta_description;
//			$page->banner_show = $request->banner_show;
			$page->page_title = $request->page_title;
//			$page->page_slug = $this->createUrlSlug($request->page_title);
			$page->page_description = $request->page_description;
			$page->status = $request->status;
			$page->about = $request->about;
			$page->created_at = date('Y-m-d H:i:s');
             if($id==25){
			$page->sub_text = 	$request->sub_text;
			$page->content2 = 	$request->content2;
             }
             if($id==24 || $id==43 || $id==44){
                 $page->sub_text = 	$request->sub_text;
			$page->content2 = 	$request->content2;
             }
             if($id==44){
			$page->content3 = 	$request->content3;
             }
            
			$page->og_title = 	$request->og_title;
			$page->og_desc = 	$request->og_description;
			$page->og_image = 	$OgimageName;
    		$page->banner_image = $imageName;

			$page->save();
            
            
            if($id==1){
                DB::table('page_metas')->where('page_id', $id)->delete();

                $allintests = [];
                $pagemeta = new PageMeta;
                
                $pagemeta->page_id = $id; 
                $pagemeta->meta_key = 'wi_subtitle'; 
                $pagemeta->meta_value = $request->wi_subtitle;
                
                $allintests[]=$pagemeta->attributesToArray();
                    
                $pagemeta->page_id = $id; 
                $pagemeta->meta_key = 'wi_title'; 
                $pagemeta->meta_value = $request->wi_title;
                    
                $allintests[]=$pagemeta->attributesToArray();
                
                $pagemeta->page_id = $id; 
                $pagemeta->meta_key = 'wi_subcontent'; 
                $pagemeta->meta_value = $request->wi_subcontent;
                
                $allintests[]=$pagemeta->attributesToArray();
                    
                $pagemeta->page_id = $id; 
                $pagemeta->meta_key = 'wi_content'; 
                $pagemeta->meta_value = $request->wi_content;
                    
                $allintests[]=$pagemeta->attributesToArray();
               
                $pagemeta->page_id = $id; 
                $pagemeta->meta_key = 'about_heading'; 
                $pagemeta->meta_value = $request->about_heading;
                    
                $allintests[]=$pagemeta->attributesToArray();
                
                $pagemeta->page_id = $id; 
                $pagemeta->meta_key = 'about_content'; 
                $pagemeta->meta_value = $request->about_content;
                    
                $allintests[]=$pagemeta->attributesToArray();
               
                $pagemeta->page_id = $id; 
                $pagemeta->meta_key = 'solu_heading'; 
                $pagemeta->meta_value = $request->solu_heading;
                    
                $allintests[]=$pagemeta->attributesToArray();
                
//                $pagemeta->page_id = $id; 
//                $pagemeta->meta_key = 'solu_content'; 
//                $pagemeta->meta_value = $request->solu_content;
//                    
//                $allintests[]=$pagemeta->attributesToArray();
               
                $pagemeta->page_id = $id; 
                $pagemeta->meta_key = 'visdsg_heading'; 
                $pagemeta->meta_value = $request->visdsg_heading;
                    
                $allintests[]=$pagemeta->attributesToArray();
                
//                $pagemeta->page_id = $id; 
//                $pagemeta->meta_key = 'visdsg_content'; 
//                $pagemeta->meta_value = $request->visdsg_content;
//                    
//                $allintests[]=$pagemeta->attributesToArray();
                  
                $pagemeta->page_id = $id; 
                $pagemeta->meta_key = 'cli_heading'; 
                $pagemeta->meta_value = $request->cli_heading;
                    
                $allintests[]=$pagemeta->attributesToArray();

                $pagemeta->page_id = $id; 
                $pagemeta->meta_key = 'dcm_heading'; 
                $pagemeta->meta_value = $request->dcm_heading;
                    
                $allintests[]=$pagemeta->attributesToArray();

                $pagemeta->page_id = $id; 
                $pagemeta->meta_key = 'dcm_content'; 
                $pagemeta->meta_value = $request->dcm_content;
                    
                $allintests[]=$pagemeta->attributesToArray();

                $pagemeta->page_id = $id; 
                $pagemeta->meta_key = 'locateus_heading'; 
                $pagemeta->meta_value = $request->locateus_heading;
                    
                $allintests[]=$pagemeta->attributesToArray();

                $pagemeta->page_id = $id; 
                $pagemeta->meta_key = 'cltsat_heading'; 
                $pagemeta->meta_value = $request->cltsat_heading;
                    
                $allintests[]=$pagemeta->attributesToArray();

                $pagemeta->page_id = $id; 
                $pagemeta->meta_key = 'cltsat_subheading'; 
                $pagemeta->meta_value = $request->cltsat_subheading;
                    
                $allintests[]=$pagemeta->attributesToArray();

                $pagemeta->page_id = $id; 
                $pagemeta->meta_key = 'imgglry_heading'; 
                $pagemeta->meta_value = $request->imgglry_heading;
                    
                $allintests[]=$pagemeta->attributesToArray();

                $pagemeta->page_id = $id; 
                $pagemeta->meta_key = 'fw_heading'; 
                $pagemeta->meta_value = $request->fw_heading;
                    
                $allintests[]=$pagemeta->attributesToArray();

                $pagemeta->page_id = $id; 
                $pagemeta->meta_key = 'cusapp_heading'; 
                $pagemeta->meta_value = $request->cusapp_heading;
                    
                $allintests[]=$pagemeta->attributesToArray();

                $pagemeta->page_id = $id; 
                $pagemeta->meta_key = 'blog_heading'; 
                $pagemeta->meta_value = $request->blog_heading;
                    
                $allintests[]=$pagemeta->attributesToArray();

                $pagemeta->page_id = $id; 
                $pagemeta->meta_key = 'durable_heading'; 
                $pagemeta->meta_value = $request->durable_heading;
                    
                $allintests[]=$pagemeta->attributesToArray();

                $pagemeta->page_id = $id; 
                $pagemeta->meta_key = 'durable_subcontent'; 
                $pagemeta->meta_value = $request->durable_subcontent;
                    
                $allintests[]=$pagemeta->attributesToArray();

                $pagemeta->page_id = $id; 
                $pagemeta->meta_key = 'durable_content'; 
                $pagemeta->meta_value = $request->durable_content;
                    
                $allintests[]=$pagemeta->attributesToArray();

                
                if($request->hasFile('durable_image'))
                {
                    $names = [];
                    foreach($request->file('durable_image') as $image)
                    {
                        $destinationPath = public_path('images/page');
                        $filename = $image->getClientOriginalName();
                        $image->move($destinationPath, $filename);
                        array_push($names, $filename);          

                    }
                    $imageName1d = json_encode($names);
                }else{
                   
                      $imageName1d = $request->exist_durable_image;  
                     
                }
                if($request->hasFile('banner_images'))
                {
                    $names = [];
                    foreach($request->file('banner_images') as $image)
                    {
                        $destinationPath = public_path('images/page');
                        $filename = $image->getClientOriginalName();
                        $image->move($destinationPath, $filename);
                        array_push($names, $filename);          

                    }
                    $imageName1 = json_encode($names);
                }else{
                   
                      $imageName1 = $request->exist_banner_images;  
                     
                }
                
                if($request->hasFile('bthum_images'))
                {
//                    $names = [];
//                    foreach($request->file('bthum_images') as $image)
//                    {
                        $destinationPath = public_path('images/page');
                        $filename = $request->bthum_images->getClientOriginalName();
                        $request->bthum_images->move($destinationPath, $filename);
//                        array_push($names, $filename);          

//                    }
                    $imageName11 = $filename;
                }else{
                   
                      $imageName11 = $request->exist_bthum_images;  
                    
                }
                
//                if($request->hasFile('slider_images'))
//                {
//                    $names = [];
//                    foreach($request->file('slider_images') as $image)
//                    {
//                        $destinationPath = public_path('images/page');
//                        $filename = $image->getClientOriginalName();
//                        $image->move($destinationPath, $filename);
//                        array_push($names, $filename);          
//
//                    }
//                    $imageName111 = json_encode($names);
//                }else{
//                  
//                      $imageName111 = $request->exist_slider_images;    
//                    
//                }
                
                
                if(!empty($request->left_image)){
                
                $imageName2 = 'dcmleft'.time().'.'.$request->left_image->extension();  

                $request->left_image->move(public_path('images/page'), $imageName2);

                }else{
                   
                      $imageName2 = $request->exist_dcm_leftimage;    
                    
                }
                
//                
//                
//                
//                if(!empty($request->logo_image)){
//                
//                $imageName21 = 'dcmlogo'.time().'.'.$request->logo_image->extension();  
//
//                $request->logo_image->move(public_path('images/page'), $imageName21);
//
//                }else{
//                    
//                      $imageName21 = $request->exist_dcm_logo;    
//                         }
//                
//                
                
                $pagemeta->page_id = $id; 
                $pagemeta->meta_key = 'banner_images'; 
                $pagemeta->meta_value = $imageName1;
                    
                $allintests[]=$pagemeta->attributesToArray();

                
                
                $pagemeta->page_id = $id; 
                $pagemeta->meta_key = 'bthum_images'; 
                $pagemeta->meta_value = $imageName11;
                    
                $allintests[]=$pagemeta->attributesToArray();

                
                
//                $pagemeta->page_id = $id; 
//                $pagemeta->meta_key = 'slider_images'; 
//                $pagemeta->meta_value = $imageName111;
//                    
//                $allintests[]=$pagemeta->attributesToArray();

                
                $pagemeta->page_id = $id; 
                $pagemeta->meta_key = 'left_image'; 
                $pagemeta->meta_value = $imageName2;
                    
                $allintests[]=$pagemeta->attributesToArray();

//                
                $pagemeta->page_id = $id; 
                $pagemeta->meta_key = 'durable_image'; 
                $pagemeta->meta_value = $imageName1d;
                    
                $allintests[]=$pagemeta->attributesToArray();

//                
//                $pagemeta->page_id = $id; 
//                $pagemeta->meta_key = 'logo_image'; 
//                $pagemeta->meta_value = $imageName21;
//                    
//                $allintests[]=$pagemeta->attributesToArray();

                
                
                PageMeta::insert($allintests);
            }

			return redirect('admin/listPage')->with('success','Page has been updated successfully');

		}

	}

	public function deletePage(Request $request,$id){
		$page = Page::find($id);
		$result = array();
		if(!empty($page)){
			$isDeleted = Page::where('id', $id)->update(array('is_delete' => '1'));
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
		return strtolower($slug);
	}
}
