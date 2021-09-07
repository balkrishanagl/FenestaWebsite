<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cmspage extends Model
{
     protected $primaryKey = 'id';
    protected $table = 'pages';
    protected $fillable = array('id', 'page_title','meta_title','meta_keyword','meta_description','page_slug','og_title','og_desc','og_image','is_delete','page_description','banner_image','banner_show','parent_menu_page_id');
    //protected $fillable = array('*');
    public static function getChildPages($parent_slug)
            {	
            	$parent_page_id=Cmspage::where('page_slug', $parent_slug)->first()->id;
            	
            	return $child_pages = Cmspage::where('parent_menu_page_id', $parent_page_id)->where('is_delete','0')->orderBy('menu_sort_order', 'desc')->get();         	

				
				

           }

        public static function getPageUrlBySlug($slug)
            {	
            	$parent_menu_page_id=Cmspage::where('page_slug', $slug)->first()->parent_menu_page_id;
            	$url='';
            	if($parent_menu_page_id){
            		$parent_page=Cmspage::find($parent_menu_page_id);
            		$url=$parent_page->page_slug;
            		$url.='/';
            	}

            	$page=Cmspage::where('page_slug',$slug)->where('is_delete','0')->first();
                       
               if(isset($page->page_slug)){             
                $url.=$page->page_slug; 
                }
            	return url($url);
           }

           public static function getPageUrlById($page_id)
            {   
                $parent_menu_page_id=Cmspage::where('id', $page_id)->first()->parent_menu_page_id;
                $url='';
                if($parent_menu_page_id){
                    $parent_page=Cmspage::find($parent_menu_page_id);
                    $url=$parent_page->page_slug;
                    $url.='/';
                }

                $page=Cmspage::where('id',$page_id)->where('is_delete','0')->first();              
               if(isset($page->page_slug)){             
                $url.=$page->page_slug; 
                }
                return url($url);
           }


   
}
