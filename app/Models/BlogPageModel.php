<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\BlogCommentModel;

class BlogPageModel extends Model
{
	

	protected $primaryKey = 'id';
    protected $table = 'blog_page';
    protected $fillable = array('id','page', 'name','slug','status','page_title','meta_keywords','meta_description','posted_by','posted_date','image','short_description','description','views_count','category_id','tags_ids','meta_other');



    public static function getCatPostUrl($post_slug)
            {	
            	$blog_url="";
            	
            		$cat_data = BlogCategoryModel::where('slug',$post_slug)->first();
            		$blog_url=url('/blog/category').'/'.$cat_data->slug;
            	

				
				return $blog_url;

           }


         public static function getPostUrl($post_slug)
            {   
                               
                    $blog_url=url('/related-blog').'/'.$post_slug;                

                
                return $blog_url;

           }

            public static function getPostPrv($post_id)
            {   
                $post_data ="";
                $previous_id = BlogPageModel::where('status',1)->where('id', '<', $post_id)->max('id');
                if($previous_id){
                    $post_data = BlogPageModel::where('status',1)->where('id',$previous_id)->first();
                }

                
                return $post_data;

           }

             public static function getPostNaxt($post_id)
            {   
                $post_data ="";
                $next_id = BlogPageModel::where('status',1)->where('id', '>', $post_id)->min('id');
                
                if($next_id){
                    $post_data = BlogPageModel::where('status',1)->where('id',$next_id)->first();
                }

                
                return $post_data;

           }

     public static function getmonthsofyear($year){
        
        $years = BlogPageModel::selectRaw("MONTH(created_at) as month")->distinct()->orderBy('month','ASC')->get();
        return $years;
    }
            public static function getCommentCounts($post_id)
            {   
                $comment_count=0;
                $comments= BlogCommentModel::where('blog_id', $post_id)->count();
                if($comments){
                    $comment_count= BlogCommentModel::where('blog_id', $post_id)->count();
                }

                 $comment_count_text='';

                if($comment_count){
                    $comment_count_text=$comment_count.' Comments';
                    if($comment_count==1){
                        $comment_count_text='1 Comment';

                    }

                }

                 return $comment_count_text;             
                

           }


}//end Block
