<?php

namespace App\Http\Controllers\FrontendControllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BlogPostModel;
use App\Models\BlogPageModel;
use App\Models\BlogCategoryModel;
use App\Models\BlogTagModel;
use App\Models\Cmspage;
use App\Models\Page;
use App\Models\Setting;
use App\Models\BlogCommentModel;
use Validator;
use Exception;
use Response;
use Mail;
use View;


class BlogController extends Controller
{
    public $cookie;
	public function __construct(Request $request){
        
        $this->c_city = $request->instance()->query('cookiescity');
        $years = BlogPostModel::selectRaw("YEAR(posted_date) as year")->distinct()->get();
        
        $logo = Setting::where('key','logo')->first()->value;
        $facebook = Setting::where('key','facebook')->first()->value;
        $twitter = Setting::where('key','twitter')->first()->value;
        $insta = Setting::where('key','insta')->first()->value;
        $youtube = Setting::where('key','youtube')->first()->value;
        $linkedin = Setting::where('key','linkedin')->first()->value;
        $copyright = Setting::where('key','copyright')->first()->value;
        $playstore = Setting::where('key','playstore')->first()->value;
        $appstore = Setting::where('key','appstore')->first()->value;
        $subscribetitle = Setting::where('key','subscribetitle')->first()->value;
        $headerphoneno = Setting::where('key','headerphoneno')->first()->value;
        
        $datasettings = array(
                        'logo'=>$logo,
                        'facebook'=>$facebook,
                        'twitter'=>$twitter,
                        'insta'=>$insta,
                        'youtube'=>$youtube,
                        'linkedin'=>$linkedin,
                        'copyright'=>$copyright,
                        'playstore'=>$playstore,
                        'appstore'=>$appstore,
                        'subscribetitle' => $subscribetitle,
                        'headerphoneno' => $headerphoneno
                        
        );
        
        view::share('datasettings', $datasettings);
        
//         $appreciations = DB::table('appreciations')
//            ->select()->where('is_delete','0')->where('status','Active')
//            ->get();
        
        $appreciations = DB::table('appreciations')
            ->select()->where('is_delete','0')->where('category','1')->where('status','Active')->where('city',$this->c_city)->take(5)
            ->get();
        if($appreciations->isEmpty()){
           $appreciations = DB::table('appreciations')
            ->select()->where('is_delete','0')->where('category','1')->where('status','Active')->take(5)
            ->get(); 
        }
        
        
//         $faqs = DB::table('faqs')
//            ->select()->where('is_delete','0')
//            ->get();
        
         $uri_seg = request()->segment(1);
         $uridata = Cmspage::where('page_slug', $uri_seg)->where('is_delete','0')->first();
         
         if(!empty($uridata)){
             $pp_ss = 'page-'.$uridata->id;
                $faqs = DB::table('faqs')
                        ->select()->where('is_delete','0')->where('status','Active')->where('page', 'like', "%$pp_ss%")->get();    
                }else{ 
                  $faqs = DB::table('faqs')
                        ->select()->where('is_delete','0')->where('status','Active')->where('page',NULL)
                        ->get();

                }

        $blog_categorys = BlogCategoryModel::where('status','Active')->orderBy('sorting', 'asc')->get();

        $popular_blog_list = BlogPostModel::where('status','Active')->orderBy('views_count', 'desc')->take(5)->get();
        
        $data =array(
        'blog_categorys' => $blog_categorys,
        'popular_blog_list' => $popular_blog_list,
//        'datasettings' => $datasettings,
        'faqs' => $faqs,
        'appreciations' => $appreciations,
        'years' => $years,
        'divclass' => '',
        'c_city' => $this->c_city,
        );
        
        view::share($data);
    }
    
    private $per_page = 10;

    
    public function index() {
$pageData = DB::table('pages')
            ->select()->where('is_delete','0')->where('status','Active')->where('page_slug', 'blog')->get();
 

        
// $tags_list = BlogTagModel::where('status','Active')->orderBy('created_at', 'desc')->get();


$result = BlogPostModel::where('status','Active')->skip(0)->take(5)->orderBy('id', 'desc')->get();

$recomresult = BlogPostModel::where('status','Active')->orderBy('views_count', 'asc')->take(4)->get();
$totalResult=BlogPostModel::where('status','Active')->get()->count();





      $page_array=array(
                     'id' => 'blog',
                     'pageData' => $pageData,
                     'title' => $pageData[0]->meta_title,
                    'meta_keywords' => $pageData[0]->meta_keyword,
                    'meta_description' => $pageData[0]->meta_description,
                    'og_title' => $pageData[0]->og_title,
                    'og_desc' => $pageData[0]->og_desc,
                    'og_image' => $pageData[0]->og_image,
                    'slug' => 'blog',
                    'name' => 'Blog',
                    'sub_text' => 'Reference site about Lorem Ipsum',
                    'content_heading' => 'blog',
                    'content1' => 'blog',
                    'content2' => 'blog',
                    'content3' => 'blog',
                    'content4' => 'blog',
                    'image' => '',
                    'body_class' => 'blog blog-page',
                    'result' => $result,                                    
                    'parent_slug' => 'blog',
                    'totalResult'=>$totalResult,
                    'per_page'=>$this->per_page,
                    'category_id'=>'',
                    'tag_id'=>'',
//                    'tags_list'=>$tags_list,
                    'recomresult'=>$recomresult,
                    );


       return view('frontend.blog.blog_list', $page_array);         
    }

public function getLoadMore(Request $request){
    $data   = array();
    $counter = $request->counter; 
    $category_id = $request->category_id; 
    $tags = $request->tags; 
    if($category_id){
     $data['body_class']='blog';     
     $data['result'] = BlogPostModel::where('status','Active')->skip($counter)->where('category_id',$category_id)->take($this->per_page)->orderBy('posted_date', 'desc')->get();
  
   } elseif($tags){
     $data['body_class']='blog';     
     $data['result'] = BlogPostModel::where('status','Active')->skip($counter)->where('tags_ids','LIKE',"%{$tags}%")->take($this->per_page)->orderBy('posted_date', 'desc')->get();
  
   } else{
      $data['body_class']='blog_list';     
     $data['result'] = BlogPostModel::where('status','Active')->skip($counter)->take($this->per_page)->orderBy('posted_date', 'desc')->get();
   }
    return response()
            ->view('frontend.blog.blog-ajax-load-more', $data, 200);
  }//end getLoadMore

    public function category($category_slug,$post_slug=null) {


    $data = BlogCategoryModel::where('slug', $category_slug)->where('status','Active')->first();
  
    // $tags_list = BlogTagModel::where('status','Active')->orderBy('created_at', 'desc')->get();
        
  
      if($data){
                  // blog detail page
                        if($post_slug){
                        $post_data = BlogPostModel::where('slug',$post_slug)->where('category_id',$data->id)->where('status','Active')->first();
                       
                        if($post_data){
                         return  $this->postdetail($post_slug);
                          }  else {
                              return CmspageController::pageNotFound();
                              
                          }

                }

            // blog detail page end



      //$blog_list = BlogPostModel::where('status','Active')->orderBy('created_at', 'desc')->where('category_id',$data->id)->get();     

      $result = BlogPostModel::where('status','Active')->skip(0)->take($this->per_page)->where('category_id',$data->id)->orderBy('posted_date', 'desc')->take(5)->get();
      $totalResult=BlogPostModel::where('status','Active')->where('category_id',$data->id)->get()->count();

      $recomresult = BlogPostModel::where('category_id',$data->id)->where('status','Active')->orderBy('views_count', 'asc')->take(4)->get();
        
      
            
                $page_array=array(
                    'id' => $data->id,
                    'title' => $data->page_title,
                    'name' => $data->name,
                    'sub_text' => '',
                    'meta_keywords' => $data->meta_keywords,
                    'meta_description' => $data->meta_description,
                    'slug' => $data->slug,
                    'content_heading' => $data->content_heading,
                    'content1' => $data->content1,
                    'content2' => $data->content2,
                    'content3' => $data->content3,
                    'content4' => $data->content4,
                    'image' => $data->image,
                    'body_class' => 'blog_list blog-page',
                    'result' => $result,
//                    'tags_list' => $tags_list,
                    'parent_slug' => 'blog',
                    'recomresult' => $recomresult,
                     'totalResult'=>$totalResult,
                    'per_page'=>$this->per_page,
                    'category_id'=>$data->id,
                    'tags'=>'',

                    );
             
          
         
  return view('frontend.blog.blog_list', $page_array);         
        
     }  else {
        return CmspageController::pageNotFound();
        
    }


}


    public function blogbymonth($year,$month) {

        
     $pageData = DB::table('pages')
            ->select()->where('is_delete','0')->where('status','Active')->where('page_slug', 'blog')->get();
 
     $recomresult = BlogPostModel::where('status','Active')->whereYear('posted_date', '=', $year)->whereMonth('posted_date', '=', $month)->get();

      $page_array=array(
                     'id' => 'blog',
                     'year' => $year,
                     'month' => $month,
                     'pageData' => $pageData,
                     'title' => $pageData[0]->meta_title,
                    'meta_keywords' => $pageData[0]->meta_keyword,
                    'meta_description' => $pageData[0]->meta_description,
                    'og_title' => $pageData[0]->og_title,
                    'og_desc' => $pageData[0]->og_desc,
                    'og_image' => $pageData[0]->og_image,
                    'slug' => 'blog',
                    'name' => 'Blog',
                    'sub_text' => 'Reference site about Lorem Ipsum',
                    'content_heading' => 'blog',
                    'content1' => 'blog',
                    'content2' => 'blog',
                    'content3' => 'blog',
                    'content4' => 'blog',
                    'image' => '',
                    'body_class' => 'blog blog-page',                               
                    'parent_slug' => 'blog',
                    'per_page'=>$this->per_page,
                    'category_id'=>'',
                    'tag_id'=>'',
                    'recomresult'=>$recomresult,
                    );

        
      return view('frontend.blog.blog_bymonth', $page_array);         
        

}




  public function tag($tag_slug) {


    $data = BlogTagModel::where('slug', $tag_slug)->where('status','Active')->first();
    $popular_blog_list = BlogPostModel::where('status','Active')->orderBy('views_count', 'desc')->take(5)->get();
//    $tags_list = BlogTagModel::where('status','Active')->orderBy('posted_date', 'desc')->get();
      if($data){            

    

      $blog_categorys = BlogCategoryModel::where('status','Active')->orderBy('sorting', 'asc')->get();

      $search_tag=md5($data->id);
    // $result = BlogPostModel::where('status','Active')->where('tags_ids','LIKE',"%{$search_tag}%")->get();  

      $result = BlogPostModel::where('status','Active')->skip(0)->take($this->per_page)->where('tags_ids','LIKE',"%{$search_tag}%")->orderBy('posted_date', 'desc')->get();
      $totalResult=BlogPostModel::where('status','Active')->where('tags_ids','LIKE',"%{$search_tag}%")->get()->count();
      
     
            
                $page_array=array(
                    'id' => $data->id,
                    'title' => $data->name,
                    'name' => $data->name,
                    'sub_text' => '',
                    'meta_keywords' => $data->meta_keywords,
                    'meta_description' => $data->meta_description,
                    'slug' => $data->slug,
                    'content_heading' => $data->content_heading,
                    'content1' => $data->content1,
                    'content2' => $data->content2,
                    'content3' => $data->content3,
                    'content4' => $data->content4,
                    'image' => $data->image,
                    'body_class' => 'blog_list blog-page',
                     'result' => $result,
                    'blog_categorys' => $blog_categorys,
                    'popular_blog_list' => $popular_blog_list,
//                    'tags_list' => $tags_list,
                    'parent_slug' => 'blog',
                     'totalResult'=>$totalResult,
                    'per_page'=>$this->per_page,
                    'tags'=>$search_tag,
                    'category_id'=>'',
                    );
             
          
         
        return view('frontend.blog.blog_list', $page_array);         
        
     }  else {
        return CmspageController::pageNotFound();
        
    }


}



  public function postdetail($post_slug) {
    
//    $tags_list = BlogTagModel::where('status','Active')->orderBy('created_at', 'desc')->get();

$post_data = BlogPostModel::where('slug',$post_slug)->where('status','Active')->first();
                        if(!empty($post_data)){
$breadcrumbs=array();
$breadcrumbs[]=array("name"=>"Blog","link"=>url('blog'));



                          $views_count=$post_data->views_count;
                          $views_count_array=array();
                          $views_count_array['views_count']=$views_count+1;
                         
                          $save=BlogPostModel::find($post_data->id)->fill($views_count_array)->Save();

                          $relative_blog_list=BlogPostModel::where('status','Active')->where('id','!=',$post_data->id)->where('category_id',$post_data->category_id)->orderBy('posted_date', 'desc')->take(5)->get();
                             $page_array=array(
                                    'id' => $post_data->id,
                                    'name' => $post_data->name,
                                    'title' => $post_data->page_title,
                                    'meta_keywords' => $post_data->meta_keywords,
                                    'meta_description' => $post_data->meta_description,
                                    'slug' => $post_data->slug,
                                    'cat_name' => '',
                                    'cat_slug' => '',  
                                    'image' => '',
                                    'post_data' => $post_data,                                   
                                    'body_class' => 'blog_detail blog-page',                                                                 
//                                    'tags_list' => $tags_list,                                   
                                    'relative_blog_list' => $relative_blog_list,
                                    'parent_slug' => 'blog',  
                                     'meta_other'=>$post_data->meta_other,                                 
                                     'breadcrumbs'=>$breadcrumbs,                                 
                                    );                                                      
                         
                            return view('frontend.blog.blog_detail', $page_array); 


                          }  else {
                              return CmspageController::pageNotFound();
                              
                          }

                

}
  public function relatedpostdetail($post_slug) {
    
//    $tags_list = BlogTagModel::where('status','Active')->orderBy('created_at', 'desc')->get();

$post_data = BlogPageModel::where('slug',$post_slug)->where('status','Active')->first();
                        if(!empty($post_data)){
$breadcrumbs=array();
$breadcrumbs[]=array("name"=>"Blog","link"=>url('blog'));



                          $views_count=$post_data->views_count;
                          $views_count_array=array();
                          $views_count_array['views_count']=$views_count+1;
                         
                          $save=BlogPageModel::find($post_data->id)->fill($views_count_array)->Save();

                          $relative_blog_list=BlogPageModel::where('status','Active')->where('id','!=',$post_data->id)->where('category_id',$post_data->category_id)->orderBy('posted_date', 'desc')->take(5)->get();
                             $page_array=array(
                                    'id' => $post_data->id,
                                    'name' => $post_data->name,
                                    'title' => $post_data->page_title,
                                    'meta_keywords' => $post_data->meta_keywords,
                                    'meta_description' => $post_data->meta_description,
                                    'slug' => $post_data->slug,
                                    'cat_name' => '',
                                    'cat_slug' => '',  
                                    'image' => '',
                                    'post_data' => $post_data,                                   
                                    'body_class' => 'blog_detail blog-page',                                                                 
//                                    'tags_list' => $tags_list,                                   
                                    'relative_blog_list' => $relative_blog_list,
                                    'parent_slug' => 'blog',  
                                     'meta_other'=>$post_data->meta_other,                                 
                                     'breadcrumbs'=>$breadcrumbs,                                 
                                    );                                                      
                         
                            return view('frontend.blog.relatedblog_detail', $page_array); 


                          }  else {
                              return CmspageController::pageNotFound();
                              
                          }

                

}


public function commentPost(Request $request ) {         

           


             $response_array=array();
             $response_array['status']='0';
             $response_array['message']='Some error!';

                
            try
              { 
              $this->validate($request, [                
                'name' => 'required|max:100',          
                'email' => 'required|email|max:100',
                'message' => 'required|max:1000',      
                
            ]);


/*
                $captch_status=0;
                  if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
        //your site secret key
        $secret = '6LeokmcUAAAAAEQBYOzUdhjN5i7hpCwSjM3oSPot';
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);

                if($responseData->success){
                    $captch_status=1;
               }

       }

        if($captch_status==0){            
         
             $response_array['message']='Google Captcha verification failed, please try again.';
            return response()->json($response_array,200);
       }


                */




                $post_array=array();
                
                $post_array['name']=strip_tags($request->name);
                $post_array['email']=strip_tags($request->email);               
                $post_array['message']=strip_tags($request->message);               
                $post_array['blog_name']=strip_tags($request->blog_name);
                $post_array['blog_id']=$request->blog_id;
                $post_array['ip']=$_SERVER['REMOTE_ADDR'];                
                    $save=BlogCommentModel::create($post_array); 
                        if($save->id){
                            $response_array['status']='1';
                            $response_array['message']='Thank you for comment!';                         
                     
                   }
              }
              catch(\Exception $e)
              { 


                            //$response_array['message']="Unable to submit your request. Please check form field values and try again!";
                            $response_array['message']=$e->getMessage();
                          
                
              }


              return response()->json($response_array,200);

                //return redirect('contact-us')->with($message_type,$message_text);
        

    }
 






}
