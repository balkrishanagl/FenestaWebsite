<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WindowDoor;
use App\Models\WindowdoorByapplication;
use App\Models\WindowdoorType;
use App\Models\WindowType;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class DoorController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function add($id=NULL)
	{
         if(!empty($id)){
             $product_id = $id;
         }else{
            $product_id = ''; 
         }
        $windowproduct = DB::table('windowdoor_types')
            ->select()->where('is_delete','0')->where('type','Door')
            ->get();
            
		return view('admin.Door.add',compact('windowproduct','product_id'));
	}

	public function list($id=NULL){
        $windowproduct = DB::table('windowdoor_types')
            ->select()->where('is_delete','0')->where('type','Door')
            ->get();
        
         if(!empty($id)){
             
            $banners = DB::table('window_types')
            ->select()->where('is_delete','0')->where('product_type','Door')->where('product',$id)
            ->get();
             
             $s_title = $windowproduct->where('id',$id)->first()->title;
              $product_id = $id;
         }else{
             
            $banners = DB::table('window_types')
            ->select()->where('is_delete','0')->where('product_type','Door')
            ->get(); 
             $s_title = 'Doors';
             $product_id = ''; 
         }  
		
            
		return view('admin.Door.list',compact('banners','windowproduct','s_title','product_id'));
	}
	public function save(Request $request){
		if($request->isMethod('post')){
			$validated = $request->validate([
				'title' 				=> 'required',
				'product' 				=> 'required',
//				'product_type' 				=> 'required',
				'image'		=> 'required|image|mimes:jpeg,png,jpg,gif,svg',
				'thumb_image'		=> 'required|image|mimes:jpeg,png,jpg,gif,svg',
        		//'door_image' 	=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=593,max_height=603|max:2048|',
    		]);

    		$data = $request->all();
//			$image = $data['door_image'];
//    		$imageName = 'door'.time().'.'.$request->door_image->extension(); 
//    		$request->door_image->move(public_path('images/windowdoor'), $imageName);

    		$smallImage = $data['image'];
    		$smallBannerName = time().'.'.$request->image->extension();
    		$request->image->move(public_path('images/doortype'), $smallBannerName); 
 
    		$smallImage12 = $data['thumb_image'];
    		$smallBannerName12 = 'thumb'.time().'.'.$request->thumb_image->extension();
    		$request->thumb_image->move(public_path('images/doortype'), $smallBannerName12); 
 
    		$homeBanner = new WindowType;
    		$homeBanner->title = $data['title'];
            $homeBanner->slug = $this->createUrlSlug($data['title']);
    		$homeBanner->product = $data['product'];
    		$homeBanner->status = $data['status'];
    		$homeBanner->product_type = 'Door';
    		$homeBanner->image = $smallBannerName;
    		$homeBanner->thumb_image = $smallBannerName12;
    		$homeBanner->save();
    		return redirect('admin/Door/type')->with('success','Door Type has been added successfully'); 
		}
	}


	public function edit(Request $request,$id){
		$banner = DB::table('window_types')
            ->select()->where('is_delete','0')->where('id',$id)
            ->first();
        
		$windowproduct = DB::table('windowdoor_types')
            ->select()->where('is_delete','0')->where('type','Door')
            ->get();
		return view('admin.Door.edit',compact('banner','windowproduct'));
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
    		$request->image->move(public_path('images/doortype'), $smallBannerName);
            }else{
             $smallBannerName = $request->exist_image;   
            }
            
            if(!empty($data['thumb_image'])){
    		$smallImage12 = $data['thumb_image'];
    		$smallBannerName12 = 'thumb'.time().'.'.$request->thumb_image->extension();
    		$request->thumb_image->move(public_path('images/doortype'), $smallBannerName12);
                
    		$homeBanner->thumb_image = $smallBannerName12;
            }
            
            
            
             if(!empty($request->banner_image)){
    		$smallImage11b = $data['banner_image'];
    		$smallBannerName11b = 'banner'.time().'.'.$request->banner_image->extension();
    		$request->banner_image->move(public_path('images/doortype'), $smallBannerName11b); 
                 
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
    		$request->featured_image->move(public_path('images/doortype'), $smallBannerName11bf); 
                 
    		$homeBanner->featured_image = $smallBannerName11bf;
             }
            
             $multi_image = $request->file('multi_image');
            if ($request->hasFile('multi_image')) :
                    foreach ($multi_image as $ik => $item):
                        $var = date_create();
                        $time = date_format($var, 'YmdHis');
                        $imageNamem =  $ik."-".$time.'.'.$item->extension();
                        $item->move(public_path('images/doortype'), $imageNamem);
                        $arrm[] = $imageNamem;
                    endforeach;
                    $imagem = implode(",", $arrm);
            $homeBanner->multi_image = $imagem; 
            endif;
            
                    if(!empty($request->recom)){
//                        echo "<pre>";
//                        print_r($request->recom);
//                        die;
                     $i_vc=0;$arrmu=array();
                    foreach ($request->recom as $ik => $item):
                         if(!empty($item['recom_images'])){
                              
                               if (!empty($item['recom_images'])){
                                $var = date_create();
                                $time = date_format($var, 'YmdHis');
                                $imageNamem = $i_vc."-".$time.'.'.$item['recom_images']->extension();
                                $item['recom_images']->move(public_path('images/recom'), $imageNamem);
                               }else{
                                   if(!empty($item['eimages'])){
                                   $imageNamem = $item['eimages'];
                                   }else{
                                      $imageNamem = '';  
                                   }
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
                        $arrmu[$i_vc]['title'] = $item['recom_title'];
                    $i_vc=$i_vc+1;
                         
                    endforeach;
                        
                    if(!empty($arrmu)){
                    $jdata = json_encode($arrmu);
                    $homeBanner->recom_for = $jdata;
                    }
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
                        $arrmu[$ik]['title'] = $item['title'];
                  
                    endforeach;
                        
                    if(!empty($arrmu)){
                    $jdatag = json_encode($arrmu);
                    $homeBanner->options = $jdatag;
                    }
                        }

    		$homeBanner->video_url = $data['video_url'];
            
            
            $homeBanner->og_title = 	$data['og_title'];
			$homeBanner->og_desc = 	$data['og_description'];
			$homeBanner->og_image = 	$OgimageName;
    		$homeBanner->meta_title = $data['meta_title'];
    		$homeBanner->meta_description = $data['meta_description'];

    		$homeBanner->meta_keyword = $data['meta_keyword'];
    		$homeBanner->short_description = $data['short_description'];
    		$homeBanner->page_description = $data['page_description'];
    		$homeBanner->feature_benefits = $data['feature_benefits'];
    		$homeBanner->title = $data['title'];
    		$homeBanner->status = $data['status'];
            $homeBanner->slug = $this->createUrlSlug($data['title']);
    		$homeBanner->product = $data['product'];
    		$homeBanner->about = $data['about'];
    		$homeBanner->other2 = $data['other2'];
    		$homeBanner->product_type = 'Door';
    		$homeBanner->image = $smallBannerName;

    		$homeBanner->save();
    		return redirect('admin/Door/type')->with('success','Door Type has been Updated successfully');
		}
	}


	public function delete(Request $request,$id){
		$banner = WindowType::find($id);
		$result = array();
		if(!empty($banner)){
			$isDeleted = WindowType::where('id', $id)->update(array('is_delete' => '1'));
			if($isDeleted){
				$result['key'] = '1';
				$result['msg'] = 'Door Type Deleted';
			}else{
				$result['key'] = '2';
				$result['msg'] = 'whoops!! Door Type could not deleted';
			}
		}else{
			$result['key'] = '0';
			$result['msg'] = 'Door Type not found';
		}
		return json_encode($result);

	}

    
    public function byapplicationadd()
	{
		return view('admin.Door.byapplicationadd');
	}

	public function byapplicationlist(){
		$banners = DB::table('windowdoor_byapplications')
            ->select()->where('is_delete','0')->where('type','Door')
            ->get();
            
            
		return view('admin.Door.byapplicationlist',compact('banners'));
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
    		$homeBanner->type = 'Door';
            
            if(!empty($data['image'])){
    		$smallImage = $data['image'];
    		$smallBannerName = time().'-byapp.'.$request->image->extension();
    		$request->image->move(public_path('images/doortype'), $smallBannerName);
                $homeBanner->image = $smallBannerName;
            }
            
            
    		$homeBanner->save();
    		return redirect('admin/Door/byapplication')->with('success','Door byapplication has been added successfully'); 
		}
	}


	public function byapplicationedit(Request $request,$id){
		$banner = DB::table('windowdoor_byapplications')
            ->select()->where('is_delete','0')->where('id',$id)
            ->first();
        
		
		return view('admin.Door.byapplicationedit',compact('banner'));
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
    		$homeBanner->type = 'Door';
            
            
            if(!empty($data['image'])){
    		$smallImage = $data['image'];
    		$smallBannerName = time().'-byapp.'.$request->image->extension();
    		$request->image->move(public_path('images/doortype'), $smallBannerName);
                $homeBanner->image = $smallBannerName;
            }
            

    		$homeBanner->save();
    		return redirect('admin/Door/byapplication')->with('success','Door byapplication has been Updated successfully');
		}
	}


	public function byapplicationdelete(Request $request,$id){
		$banner = WindowdoorByapplication::find($id);
		$result = array();
		if(!empty($banner)){
			$isDeleted = WindowdoorByapplication::where('id', $id)->update(array('is_delete' => '1'));
			if($isDeleted){
				$result['key'] = '1';
				$result['msg'] = 'Door Byapplication Deleted';
			}else{
				$result['key'] = '2';
				$result['msg'] = 'whoops!! Door Byapplication could not deleted';
			}
		}else{
			$result['key'] = '0';
			$result['msg'] = 'Door Byapplication not found';
		}
		return json_encode($result);

	}


    public function typeadd()
	{
		return view('admin.Door.typeadd');
	}

    public function typelist()
	{
       
        $wdtypes = DB::table('windowdoor_types')
            ->select()->where('is_delete','0')->where('type','Door')
            ->get();
            
		return view('admin.Door.typelist')->with('wdtypes',$wdtypes);
        
	}

	public function typesave(Request $request){
		if($request->isMethod('post')){
			$validated = $request->validate([
				'title' 				=> 'required',
				'type' 				=> 'required',
				'fullimage'		=> 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=593,max_height=603|max:2048|',
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

    		$smallImage1 = $data['fullimage'];
    		$smallBannerName1 = time().'.'.$request->fullimage->extension();
    		$request->fullimage->move(public_path('images/windowdoortype'), $smallBannerName1); 

    		$smallImage11b = $data['banner_image'];
    		$smallBannerName11b = 'banner'.time().'.'.$request->banner_image->extension();
    		$request->banner_image->move(public_path('images/windowdoortype'), $smallBannerName11b);
            
    		$homeBanner = new WindowdoorType;
    		$homeBanner->title = $data['title'];
            
            $homeBanner->slug = $this->createUrlSlug($data['title']);
    		$homeBanner->type = $data['type'];
    		$homeBanner->image = $smallBannerName;
    		$homeBanner->fullimage = $smallBannerName1;
    		$homeBanner->hoverimage = $imageName;
            
    		$homeBanner->meta_title = $data['meta_title'];
    		$homeBanner->meta_description = $data['meta_description'];
    		$homeBanner->feature_benefits = $data['feature_benefits'];

    		$homeBanner->meta_keyword = $data['meta_keyword'];
    		$homeBanner->short_description = $data['short_description'];
    		$homeBanner->page_description = $data['page_description'];
    		$homeBanner->status = $data['status'];

    		$homeBanner->banner_image = $smallBannerName11b;
            
    		$homeBanner->save();
    		return redirect('admin/Door/typelist')->with('success','Door Product has been added successfully'); 
		}
	}

	public function typeedit(Request $request,$id){
		$type = WindowdoorType::find($id);
		return view('admin.Door.typeedit',compact('type'));
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
            if(!empty($request->fullimage)){
			$imageName11 = time().'.'.$request->fullimage->extension(); 
    		$request->fullimage->move(public_path('images/windowdoortype'), $imageName11); 
    		$homeBanner->fullimage = $imageName11;
            }else{
                $imageName11 = $request->exist_fullimage;
                

            }
             if(!empty($request->image)){
    		$smallImage = $data['image'];
    		$smallBannerName = 'windowdoorimage'.time().'.'.$request->image->extension();
    		$request->image->move(public_path('images/windowdoortype'), $smallBannerName);
             }else{
                 $smallBannerName = $request->exist_image; 
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
            
            
            if($id==5){
                 if(!empty($request->arange)){
                     $i_vc=0;$arrmu=array();
                    foreach ($request->arange as $ik => $item):
                         if(!empty($item['images'])){
                              
                               if (!empty($item['images'])){
                                $var = date_create();
                                $time = date_format($var, 'YmdHis');
                                $imageNamem = $ik."-".$time.'.'.$item['images']->extension();
                                $item['images']->move(public_path('images/arange'), $imageNamem);
                               }else{
                                   $imageNamem = $item['eimages'];
                               }
                        $arrmu[$i_vc]['image'] = $imageNamem;
                        $arrmu[$i_vc]['title'] = $item['title'];;
                    $i_vc=$i_vc+1;
                          }
                    endforeach;
                        
                    if(!empty($arrmu)){
                    $jdata = json_encode($arrmu);
                    $homeBanner->arange = $jdata;
                    }
                        }
            
                 if(!empty($request->features)){
                     $i_vc=0;$arrmu=array();
                    foreach ($request->features as $ik => $item):
               
                         if(!empty($item['images'])){
                              
                               if (!empty($item['images'])){
                                $var = date_create();
                                $time = date_format($var, 'YmdHis');
                                $imageNamem = $ik."-features".$time.'.'.$item['images']->extension();
                                $item['images']->move(public_path('images/arange'), $imageNamem);
                               }else{
                                   $imageNamem = $item['eimages'];
                               }
                        $arrmu[$i_vc]['image'] = $imageNamem;
                        $arrmu[$i_vc]['title'] = $item['title'];;
                    $i_vc=$i_vc+1;
                          }
                    endforeach;
                        
                    if(!empty($arrmu)){
                    $jdata = json_encode($arrmu);
                    $homeBanner->features = $jdata;
                    }
                        }
            
                 if(!empty($request->woodenoptions)){
                     $i_vc=0;$arrmu=array();
                    foreach ($request->woodenoptions as $ik => $item):
               
                         if(!empty($item['images'])){
                              
                               if (!empty($item['images'])){
                                $var = date_create();
                                $time = date_format($var, 'YmdHis');
                                $imageNamem = $ik."-wooden".$time.'.'.$item['images']->extension();
                                $item['images']->move(public_path('images/options'), $imageNamem);
                               }else{
                                   $imageNamem = $item['eimages'];
                               }
                        $arrmu[$i_vc]['image'] = $imageNamem;
                        $arrmu[$i_vc]['title'] = $item['title'];;
                    $i_vc=$i_vc+1;
                          }
                    endforeach;
                        
                    if(!empty($arrmu)){
                    $jdata = json_encode($arrmu);
                    $homeBanner->woodenoptions = $jdata;
                    }
                        }
            
                 if(!empty($request->fenestaoptions)){
                     $i_vc=0;$arrmu=array();
                    foreach ($request->fenestaoptions as $ik => $item):
               
                         if(!empty($item['images'])){
                              
                               if (!empty($item['images'])){
                                $var = date_create();
                                $time = date_format($var, 'YmdHis');
                                $imageNamem = $ik."-fenesta".$time.'.'.$item['images']->extension();
                                $item['images']->move(public_path('images/options'), $imageNamem);
                               }else{
                                   $imageNamem = $item['eimages'];
                               }
                        $arrmu[$i_vc]['image'] = $imageNamem;
                        $arrmu[$i_vc]['title'] = $item['title'];;
                    $i_vc=$i_vc+1;
                          }
                    endforeach;
                        
                    if(!empty($arrmu)){
                    $jdata = json_encode($arrmu);
                    $homeBanner->fenestaoptions = $jdata;
                    }
                        }
            
            
                
            if(!empty($request->woodenimage)){
                
			$OgimageNameww = 'woodenimage'.time().'.'.$request->woodenimage->extension();  
    		$request->woodenimage->move(public_path('images/options'), $OgimageNameww);
             
    		$homeBanner->woodenimage = $OgimageNameww;   
            }
                
            if(!empty($request->fenestaimage)){
                
			$OgimageNameff = 'fenestaimage'.time().'.'.$request->fenestaimage->extension();  

    		$request->fenestaimage->move(public_path('images/options'), $OgimageNameff);
             
                
    		$homeBanner->fenestaimage = $OgimageNameff;
            }


            }

    		$homeBanner->title = $data['title'];
            
            $homeBanner->slug = $this->createUrlSlug($data['title']);
    		$homeBanner->type = $data['type'];
            $homeBanner->og_title = 	$data['og_title'];
			$homeBanner->og_desc = 	$data['og_description'];
			$homeBanner->og_image = 	$OgimageName;
    		$homeBanner->meta_title = $data['meta_title'];
    		$homeBanner->meta_description = $data['meta_description'];

    		$homeBanner->meta_keyword = $data['meta_keyword'];
    		$homeBanner->short_description = $data['short_description'];
    		$homeBanner->page_description = $data['page_description'];
    		$homeBanner->feature_benefits = $data['feature_benefits'];
    		$homeBanner->status = $data['status'];
    		$homeBanner->series = $data['series'];
    		$homeBanner->image = $smallBannerName;
    		$homeBanner->hoverimage = $imageName; 
    		$homeBanner->fullimage = $imageName11; 

    		$homeBanner->save();
    		return redirect('admin/Door/typelist')->with('success',' Door Product has been Updated successfully');
		}
	}

	public function typedelete(Request $request,$id){
		$banner = WindowdoorType::find($id);
		$result = array();
		if(!empty($banner)){
			$isDeleted = WindowdoorType::where('id', $id)->update(array('is_delete' => '1'));
			if($isDeleted){
				$result['key'] = '1';
				$result['msg'] = 'Door Product Deleted';
			}else{
				$result['key'] = '2';
				$result['msg'] = 'whoops!!Door Product could not deleted';
			}
		}else{
			$result['key'] = '0';
			$result['msg'] = 'Door Product not found';
		}
		return json_encode($result);

	}


	private function createUrlSlug($string){
		$slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
		return $slug;
	}
}
