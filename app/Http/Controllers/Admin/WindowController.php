<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WindowType;
use App\Models\WindowDoor;
use App\Models\WindowdoorByapplication;
use App\Models\WindowdoorType;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class WindowController extends Controller
{  public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function add($id=NULL)
	{
        $windowproduct = DB::table('windowdoor_types')
            ->select()->where('is_delete','0')->where('type','Window')
            ->get();
         if(!empty($id)){
             $product_id = $id;
         }else{
            $product_id = ''; 
         }
		return view('admin.Window.add',compact('windowproduct','product_id'));
	}

	public function list($id=NULL){
        
        $windowproduct = DB::table('windowdoor_types')
            ->select()->where('is_delete','0')->where('type','Window')
            ->get();   
	
        if(!empty($id)){
          $banners = DB::table('window_types')
            ->select()->where('is_delete','0')->where('product_type','Window')
            ->where('product',$id)
            ->get();
        
           $s_title = $windowproduct->where('id',$id)->first()->title;
            $product_id = $id;
        }else{
          $banners = DB::table('window_types')
            ->select()->where('is_delete','0')->where('product_type','Window')
            ->get(); 
            $s_title = 'Windows';
            $product_id = ''; 
        }
		
        
          
            
		return view('admin.Window.list',compact('banners','windowproduct','s_title','product_id'));
	}
	public function save(Request $request){
		if($request->isMethod('post')){
			$validated = $request->validate([
				'title' 				=> 'required',
				'product' 				=> 'required',
//				'product_type' 				=> 'required',
				'image'		=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=593,max_height=603|max:2048|',
				'thumb_image'		=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=593,max_height=603|max:2048|',
        		//'door_image' 	=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=593,max_height=603|max:2048|',
    		]);

    		$data = $request->all();
//			$image = $data['door_image'];
//    		$imageName = 'door'.time().'.'.$request->door_image->extension(); 
//    		$request->door_image->move(public_path('images/windowdoor'), $imageName);

    		$smallImage = $data['image'];
    		$smallBannerName = time().'.'.$request->image->extension();
    		$request->image->move(public_path('images/windowtype'), $smallBannerName); 
 
    		$smallImage12 = $data['thumb_image'];
    		$smallBannerName12 = 'thumb'.time().'.'.$request->thumb_image->extension();
    		$request->thumb_image->move(public_path('images/windowtype'), $smallBannerName12); 
 
    		$homeBanner = new WindowType;
    		$homeBanner->title = $data['title'];
    		$homeBanner->slug = $this->createUrlSlug($data['title']);
    		$homeBanner->product = $data['product'];
    		$homeBanner->status = $data['status'];
    		$homeBanner->product_type = 'Window';
    		$homeBanner->image = $smallBannerName;
    		$homeBanner->thumb_image = $smallBannerName12;
    		$homeBanner->save();
    		return redirect('admin/Window/type')->with('success','Window Type has been added successfully'); 
		}
	}


	public function edit(Request $request,$id){
		$banner = DB::table('window_types')
            ->select()->where('is_delete','0')->where('id',$id)
            ->first();
        
		$windowproduct = DB::table('windowdoor_types')
            ->select()->where('is_delete','0')->where('type','Window')
            ->get();
		return view('admin.Window.edit',compact('banner','windowproduct'));
	}

	public function update(Request $request,$id){
		if ($request->isMethod('POST')) {
			$validated = $request->validate([
				'title' 				=> 'required',
				'product' 				=> 'required',
                'meta_title' 		=> 'required|max:255',
        		'meta_description' 	=> 'required',
				//'image'		=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=593,max_height=603|max:2048|',
        		//'door_image' 	=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=593,max_height=603|max:2048|',
    		]);
			$homeBanner = WindowType::find($id);

			$data = $request->all();
            if(!empty($data['image'])){
    		$smallImage = $data['image'];
    		$smallBannerName = time().'.'.$request->image->extension();
    		$request->image->move(public_path('images/windowtype'), $smallBannerName);
            }else{
             $smallBannerName = $request->exist_image;   
            }
            
            if(!empty($data['thumb_image'])){
    		$smallImage12 = $data['thumb_image'];
    		$smallBannerName12 = 'thumb'.time().'.'.$request->thumb_image->extension();
    		$request->thumb_image->move(public_path('images/windowtype'), $smallBannerName12);
                
    		$homeBanner->thumb_image = $smallBannerName12;
            }
            
            
             if(!empty($request->banner_image)){
    		$smallImage11b = $data['banner_image'];
    		$smallBannerName11b = 'banner'.time().'.'.$request->banner_image->extension();
    		$request->banner_image->move(public_path('images/windowtype'), $smallBannerName11b); 
                 
    		$homeBanner->banner_image = $smallBannerName11b;
             }
 
            if(!empty($request->og_image)){
                
			$OgimageName = time().'.'.$request->og_image->extension();  

    		$request->og_image->move(public_path('images'), $OgimageName);
                
            }else{
                $OgimageName = $homeBanner->exist_og_image;
            }

            


                
            if(!empty($request->featured_image)){
    		$smallImage11bf = $data['featured_image'];
    		$smallBannerName11bf = 'featured_image'.time().'.'.$request->featured_image->extension();
    		$request->featured_image->move(public_path('images/windowtype'), $smallBannerName11bf); 
                 
    		$homeBanner->featured_image = $smallBannerName11bf;
             }
            
             $multi_image = $request->file('multi_image');
            if ($request->hasFile('multi_image')) :
                    foreach ($multi_image as $ik => $item):
                        $var = date_create();
                        $time = date_format($var, 'YmdHis');
                        $imageNamem = $ik."-".$time.'.'.$item->extension();
                        $item->move(public_path('images/windowtype'), $imageNamem);
                        $arrm[] = $imageNamem;
                    endforeach;
                    $imagem = implode(",", $arrm);
            $homeBanner->multi_image = $imagem; 
            endif;
            
//            echo "<pre>";
//            print_r( $request->recom); die;
//            
                       if(!empty($request->recom)){
                     $i_vc=0;$arrmu=array();
                    foreach ($request->recom as $ik => $item):
                           if(!empty($item['recom_images'])){
                               
                               if (!empty($item['recom_images'])){
                                $var = date_create();
                                $time = date_format($var, 'YmdHis');
                                $imageNamem = $i_vc."-".$time.'.'.$item['recom_images']->extension();
                                $item['recom_images']->move(public_path('images/recom'), $imageNamem);
                               }else{
                                   $imageNamem = $item['eimages'];
                               }
                       
                                }else{
//                             print_r(json_decode($homeBanner->recom_for));
//                             die;
                             if(count(json_decode($homeBanner->recom_for))>$i_vc){
                             $imageNamem = json_decode($homeBanner->recom_for)[$i_vc]->image;  
                             }else{
                              $imageNamem = '';   
                             }
                         }
                           
                        $arrmu[$i_vc]['image'] = $imageNamem;
                        $arrmu[$i_vc]['title'] = $item['recom_title'];;
                    $i_vc=$i_vc+1;
                       
                    endforeach;
         
                        
                    if(!empty($arrmu)){
                    $jdata = json_encode($arrmu);
                    $homeBanner->recom_for = $jdata;
                    }
                        }
            
//                       if(!empty($request->options)){
//                    $arrmu=array();
//                    foreach ($request->options as $ik => $item):
//                        $var = date_create();
//                        $time = date_format($var, 'YmdHis');
//                        $imageNamem = $ik."-".$time.'.'.$item['images']->extension();
//                        $item['images']->move(public_path('images/options'), $imageNamem);
//                        $arrmu[$ik]['image'] = $imageNamem;
//                        $arrmu[$ik]['title'] = $item['title'];;
//                  
//                    endforeach;
//                        
//                    if(!empty($arrmu)){
//                    $jdatag = json_encode($arrmu);
//                    $homeBanner->options = $jdatag;
//                    }
//                        }
            
            
            if(!empty($request->options)){
                    $arrmu=array();
                    foreach ($request->options as $ik => $item):
//            echo "<pre>";
//            print_r($item);
//            die;
                    if (!empty($item['images'])){
                        $var = date_create();
                        $time = date_format($var, 'YmdHis');
                        $imageNamem = $ik."-".$time.'.'.$item['images']->extension();
                        $item['images']->move(public_path('images/options'), $imageNamem);
                       }else{
                           if(!empty($item['eimages'])){
                                   $imageNamem = $item['eimages'];
                                   }else{
                                      $imageNamem = '';  
                                   }
                       }
                        $arrmu[$ik]['image'] = $imageNamem;
                        $arrmu[$ik]['title'] = $item['title'];;
                  
                    endforeach;
                        
                    if(!empty($arrmu)){
                    $jdatag = json_encode($arrmu);
                    $homeBanner->options = $jdatag;
                    }
                        }
            
            
    		$homeBanner->title = $data['title'];
    		$homeBanner->video_url = $data['video_url'];
            $homeBanner->slug = $this->createUrlSlug($data['title']);
    		$homeBanner->product = $data['product'];
    		$homeBanner->product_type = 'Window';
    		$homeBanner->image = $smallBannerName;
            
            $homeBanner->og_title = 	$data['og_title'];
			$homeBanner->og_desc = 	$data['og_description'];
			$homeBanner->og_image = 	$OgimageName;
    		$homeBanner->meta_title = $data['meta_title'];
    		$homeBanner->status = $data['status'];
    		$homeBanner->meta_description = $data['meta_description'];
    		$homeBanner->feature_benefits = $data['feature_benefits'];
            $homeBanner->meta_keyword = $data['meta_keyword'];
    		$homeBanner->short_description = $data['short_description'];
    		$homeBanner->page_description = $data['page_description'];
            $homeBanner->about = $data['about'];
            $homeBanner->other2 = $data['other2'];
            
    		$homeBanner->save();
    		return redirect('admin/Window/type')->with('success','Window Type has been Updated successfully');
		}
	}


	public function delete(Request $request,$id){
		$banner = WindowType::find($id);
		$result = array();
		if(!empty($banner)){
			$isDeleted = WindowType::where('id', $id)->update(array('is_delete' => '1'));
			if($isDeleted){
				$result['key'] = '1';
				$result['msg'] = 'Window Type Deleted';
			}else{
				$result['key'] = '2';
				$result['msg'] = 'whoops!! Window Type could not deleted';
			}
		}else{
			$result['key'] = '0';
			$result['msg'] = 'Window Type not found';
		}
		return json_encode($result);

	}


    
    public function byapplicationadd()
	{
		return view('admin.Window.byapplicationadd');
	}

	public function byapplicationlist(){
		$banners = DB::table('windowdoor_byapplications')
            ->select()->where('is_delete','0')->where('type','Window')
            ->get();
            
            
		return view('admin.Window.byapplicationlist',compact('banners'));
	}
	public function byapplicationsave(Request $request){
		if($request->isMethod('post')){
			$validated = $request->validate([
				'title' 				=> 'required',
				'content' 				=> 'required',
    		]);

    		$data = $request->all();
    		$homeBanner = new WindowdoorByapplication;
    		$homeBanner->title = $data['title'];
    		$homeBanner->content = $data['content'];
    		$homeBanner->status = $data['status'];
    		$homeBanner->type = 'Window';
            
            if(!empty($data['image'])){
    		$smallImage = $data['image'];
    		$smallBannerName = time().'-byapp.'.$request->image->extension();
    		$request->image->move(public_path('images/windowtype'), $smallBannerName);
                $homeBanner->image = $smallBannerName;
            }
            
            
    		$homeBanner->save();
    		return redirect('admin/Window/byapplication')->with('success','Window byapplication has been added successfully'); 
		}
	}


	public function byapplicationedit(Request $request,$id){
		$banner = DB::table('windowdoor_byapplications')
            ->select()->where('is_delete','0')->where('id',$id)
            ->first();
        
		
		return view('admin.Window.byapplicationedit',compact('banner'));
	}

	public function byapplicationupdate(Request $request,$id){
		if ($request->isMethod('POST')) {
			$validated = $request->validate([
				'title' 				=> 'required',
				'content' 				=> 'required',
				
    		]);
			$homeBanner = WindowdoorByapplication::find($id);

			$data = $request->all();
         
    		$homeBanner->title = $data['title'];
    		$homeBanner->content = $data['content'];
    		$homeBanner->status = $data['status'];
    		$homeBanner->type = 'Window';
            
            
            if(!empty($data['image'])){
    		$smallImage = $data['image'];
    		$smallBannerName = time().'-byapp.'.$request->image->extension();
    		$request->image->move(public_path('images/windowtype'), $smallBannerName);
                $homeBanner->image = $smallBannerName;
            }
            

    		$homeBanner->save();
    		return redirect('admin/Window/byapplication')->with('success','Window byapplication has been Updated successfully');
		}
	}


	public function byapplicationdelete(Request $request,$id){
		$banner = WindowdoorByapplication::find($id);
		$result = array();
		if(!empty($banner)){
			$isDeleted = WindowdoorByapplication::where('id', $id)->update(array('is_delete' => '1'));
			if($isDeleted){
				$result['key'] = '1';
				$result['msg'] = 'Window Byapplication Deleted';
			}else{
				$result['key'] = '2';
				$result['msg'] = 'whoops!! Window Byapplication could not deleted';
			}
		}else{
			$result['key'] = '0';
			$result['msg'] = 'Window Byapplication not found';
		}
		return json_encode($result);

	}


    public function typeadd()
	{
		return view('admin.Window.typeadd');
	}

    public function typelist()
	{
       
        $wdtypes = DB::table('windowdoor_types')
            ->select()->where('is_delete','0')->where('type','Window')
            ->get();
            
		return view('admin.Window.typelist')->with('wdtypes',$wdtypes);
        
	}

	public function typesave(Request $request){
		if($request->isMethod('post')){
			$validated = $request->validate([
				'title' 				=> 'required',
				'type' 				=> 'required',
                'meta_title' 		=> 'required|max:255',
        		'meta_description' 	=> 'required',
				'fullimage'		=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=593,max_height=603|max:2048|',
				'banner_image'		=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=593,max_height=603|max:2048|',
				'image'		=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=593,max_height=603|max:2048|',
        		'hoverimage' 	=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=593,max_height=603|max:2048|',
    		]);

    		$data = $request->all();
			$image = $data['hoverimage'];
    		$imageName = 'windowdoorimage'.time().'.'.$request->hoverimage->extension(); 
    		$request->hoverimage->move(public_path('images/windowdoortype'), $imageName);

    		$smallImage = $data['image'];
    		$smallBannerName = 'windowdoorhoverimage'.time().'.'.$request->image->extension();
    		$request->image->move(public_path('images/windowdoortype'), $smallBannerName); 

    		$smallImage11 = $data['fullimage'];
    		$smallBannerName11 = time().'.'.$request->fullimage->extension();
    		$request->fullimage->move(public_path('images/windowdoortype'), $smallBannerName11); 
            
    		$smallImage11b = $data['banner_image'];
    		$smallBannerName11b = 'banner'.time().'.'.$request->banner_image->extension();
    		$request->banner_image->move(public_path('images/windowdoortype'), $smallBannerName11b); 

    		$homeBanner = new WindowdoorType;
    		$homeBanner->title = $data['title'];
    		$homeBanner->meta_title = $data['meta_title'];
    		$homeBanner->meta_description = $data['meta_description'];
            $homeBanner->slug = $this->createUrlSlug($data['title']);
    		$homeBanner->type = $data['type'];
    		$homeBanner->meta_keyword = $data['meta_keyword'];
    		$homeBanner->short_description = $data['short_description'];
    		$homeBanner->page_description = $data['page_description'];
    		$homeBanner->feature_benefits = $data['feature_benefits'];
    		$homeBanner->status = $data['status'];
    		$homeBanner->image = $smallBannerName;
    		$homeBanner->fullimage = $smallBannerName11;
    		$homeBanner->banner_image = $smallBannerName11b;
    		$homeBanner->hoverimage = $imageName;
    		$homeBanner->save();
    		return redirect('admin/Window/typelist')->with('success','Window Product has been added successfully'); 
		}
	}

	public function typeedit(Request $request,$id){
		$type = WindowdoorType::find($id);
		return view('admin.Window.typeedit',compact('type'));
	}

	public function typeupdate(Request $request,$id){
		if ($request->isMethod('POST')) {
			$validated = $request->validate([
				'title' 				=> 'required',
				'type' 				=> 'required',
                'meta_title' 		=> 'required|max:255',
        		'meta_description' 	=> 'required',
			//	'image'		=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=593,max_height=603|max:2048|',
        	//	'hoverimage' 	=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=593,max_height=603|max:2048|',
    		]);
			$homeBanner = WindowdoorType::find($id);

			$data = $request->all();
            if(!empty($request->hoverimage)){
			$imageName = 'windowdoorimage'.time().'.'.$request->hoverimage->extension(); 
    		$request->hoverimage->move(public_path('images/windowdoortype'), $imageName); 
    		$homeBanner->hoverimage = $imageName;
            }else{
                $imageName = $request->exist_hoverimage;
                

            }
             if(!empty($request->image)){
    		$smallImage = $data['image'];
    		$smallBannerName = 'windowdoorimage'.time().'.'.$request->image->extension();
    		$request->image->move(public_path('images/windowdoortype'), $smallBannerName);
             }else{
                 $smallBannerName = $request->exist_image; 
             }
            
             if(!empty($request->fullimage)){
    		$smallImage11 = $data['fullimage'];
    		$smallBannerName11 = time().'.'.$request->fullimage->extension();
    		$request->fullimage->move(public_path('images/windowdoortype'), $smallBannerName11);
             }else{
                 $smallBannerName11 = $request->exist_fullimage; 
             }
            
             if(!empty($request->banner_image)){
    		$smallImage11b = $data['banner_image'];
    		$smallBannerName11b = 'banner'.time().'.'.$request->banner_image->extension();
    		$request->banner_image->move(public_path('images/windowdoortype'), $smallBannerName11b); 
                 
    		$homeBanner->banner_image = $smallBannerName11b;
             }
 
            if(!empty($request->og_image)){
                
			$OgimageName = time().'.'.$request->og_image->extension();  

    		$request->og_image->move(public_path('images'), $OgimageName);
                
            }else{
                $OgimageName = $homeBanner->exist_og_image;
            }
        if(!empty($request->options)){
                    $arrmu=array();
                    foreach ($request->options as $ik => $item):
//            echo "<pre>";
//            print_r($item);
//            die;
                    if (!empty($item['images'])){
                        $var = date_create();
                        $time = date_format($var, 'YmdHis');
                        $imageNamem = $ik."-".$time.'.'.$item['images']->extension();
                        $item['images']->move(public_path('images/options'), $imageNamem);
                       }else{
                           if(!empty($item['eimages'])){
                                   $imageNamem = $item['eimages'];
                                   }else{
                                      $imageNamem = '';  
                                   }
                       }
                        $arrmu[$ik]['image'] = $imageNamem;
                        $arrmu[$ik]['title'] = $item['title'];;
                  
                    endforeach;
                        
                    if(!empty($arrmu)){
                    $jdatag = json_encode($arrmu);
                    $homeBanner->options = $jdatag;
                    }
                        }
			$homeBanner->og_title = 	$data['og_title'];
			$homeBanner->og_desc = 	$data['og_description'];
			$homeBanner->og_image = 	$OgimageName;
    		$homeBanner->meta_title = $data['meta_title'];
    		$homeBanner->meta_description = $data['meta_description'];
    		$homeBanner->feature_benefits = $data['feature_benefits'];
    		$homeBanner->series = $data['series'];
    		$homeBanner->title = $data['title'];
            $homeBanner->slug = $this->createUrlSlug($data['title']);
    		$homeBanner->type = $data['type'];
    		$homeBanner->meta_keyword = $data['meta_keyword'];
    		$homeBanner->short_description = $data['short_description'];
    		$homeBanner->page_description = $data['page_description'];
    		$homeBanner->status = $data['status'];
            
    		$homeBanner->image = $smallBannerName;
    		$homeBanner->fullimage = $smallBannerName11;
    		$homeBanner->hoverimage = $imageName; 

    		$homeBanner->save();
    		return redirect('admin/Window/typelist')->with('success','Window Product has been Updated successfully');
		}
	}

	public function typedelete(Request $request,$id){
		$banner = WindowdoorType::find($id);
		$result = array();
		if(!empty($banner)){
			$isDeleted = WindowdoorType::where('id', $id)->update(array('is_delete' => '1'));
			if($isDeleted){
				$result['key'] = '1';
				$result['msg'] = 'Window Product Deleted';
			}else{
				$result['key'] = '2';
				$result['msg'] = 'whoops!! Window Product could not deleted';
			}
		}else{
			$result['key'] = '0';
			$result['msg'] = 'Window Product not found';
		}
		return json_encode($result);

	}


	private function createUrlSlug($string){
		$slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
		return strtolower($slug);
	}
}
