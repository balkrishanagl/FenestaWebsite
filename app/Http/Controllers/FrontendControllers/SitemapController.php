<?php namespace App\Http\Controllers\FrontendControllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Post;

use App\Models\Setting;
use App\Models\Cmspage;
use App\Models\FeatureBenefit;
use Illuminate\Http\Request;
use View;


class SitemapController extends Controller
{
    
    private $pp_ss='';
    public $cookie;
   
	public function __construct(Request $request){
        $this->c_city = $request->instance()->query('cookiescity');
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
        
        $uri_seg = request()->segment(1);
        $uri_seg2 = request()->segment(2);
        if(!empty($uri_seg2)){
        
              $uridata = Cmspage::where('page_slug', $uri_seg2)->where('is_delete','0')->where('status','Active')->first();
               if(empty($uridata)){
                  $uridata = Cmspage::where('page_slug', $uri_seg)->where('is_delete','0')->where('status','Active')->first();
                   
                   if(empty($uridata)){
                        return CmspageController::pageNotFound();
                    }else{
                        $this->pp_ss = 'page-'.$uridata->id;
                   }
              }else{
                    $this->pp_ss = 'page-'.$uridata->id;
               }
         
        }else{
        $uridata = Cmspage::where('page_slug', $uri_seg)->where('is_delete','0')->where('status','Active')->first();
            if(!empty($uridata)){
             $this->pp_ss = 'page-'.$uridata->id;
            }else{
              $this->pp_ss = '';  
            }
            
        }
        
//        $appreciations = DB::table('appreciations')
//                     ->select()->where('is_delete','0')->where('status','Active')
//                     ->get();
//        
        $appreciations = DB::table('appreciations')
            ->select()->where('is_delete','0')->where('category','1')->where('status','Active')->where('city',$this->c_city)->take(5)
            ->get();
        if($appreciations->isEmpty()){
           $appreciations = DB::table('appreciations')
            ->select()->where('category','1')->where('is_delete','0')->where('status','Active')->take(5)
            ->get(); 
        }
        
        
        
        if(!empty($this->pp_ss)){
        $faqs = DB::table('faqs')
                ->select()->where('is_delete','0')->where('status','Active')->where('page', 'like', "%$this->pp_ss%") ->get();    
        $relatedblog = DB::table('blog_page')->select()->where('status','Active')->where('page', 'like', "%$this->pp_ss%")->limit(3)->get();
        }else{
          $relatedblog = array();  
          $faqs = DB::table('faqs')
                ->select()->where('is_delete','0')->where('status','Active')->where('page',NULL)
                ->get();
            
        }
        
        view::share('appreciations', $appreciations);
        view::share('relatedblog', $relatedblog);
        view::share('faqs', $faqs);
        view::share('c_city', $this->c_city);
    }
    public function index(Request $request)
    {
       
        
         $result =  DB::select("SELECT page_title,page_slug,id,updated_at FROM `pages` WHERE `is_delete` = '0' AND `status` = 'Active' AND parent_page='0' ");
        
         
        
         $result1 =  DB::select("SELECT title,slug,type,updated_at FROM `windowdoor_types` WHERE `is_delete` = '0' AND `status` = 'Active'");
        
        
        
         $result3 =  DB::select("SELECT name,slug,updated_at FROM `blog_post` WHERE  `status` = 'Active'");
        
        
         $result4 =  DB::select("SELECT name,slug,updated_at FROM `blog_page` WHERE   `status` = 'Active'");
        
         $result5 =  DB::select("SELECT name,slug,updated_at FROM `blog_category` WHERE  `status` = 'Active'");
        
        
        
         $result2 =  DB::select("SELECT window_types.title as title,window_types.slug as slug,windowdoor_types.slug as psluge,windowdoor_types.title as ptitle,window_types.product_type as product_type, window_types.updated_at as updated_at FROM `window_types` join windowdoor_types on windowdoor_types.id=window_types.product  WHERE window_types.is_delete = '0' AND window_types.status = 'Active'");
       

        
         $page_slug='sitemap';
       
        $uritype = $request->segment(1);

         $data = Cmspage::where('page_slug', $page_slug)->where('status','Active')->where('is_delete','0')->first();

         $windows = DB::table('windowdoor_types')
                    ->select()->where('is_delete','0')->where('status','Active')->where('type','Window')
                    ->get();
         $doors = DB::table('windowdoor_types')
                    ->select()->where('is_delete','0')->where('status','Active')->where('type','Door')
                    ->get();

$title = $data->title; 
         $breadcrumbs=array();
      //   dd($data);
$page_array=array(
                    'pageData' => $data,
                    'uritype' => $uritype,
                    'id' => $data->id,
                    'name' => $data->name,                  
                    'title' => $data->title,                  
                    'sub_text' => $data->sub_text,
                    'about' => $data->about,
             'meta_title' => $data->meta_title,
                    'title' => ($data->page_title)?$data->page_title:$data->name,
                    'meta_keyword' => $data->meta_keywords,'og_title' => $data->og_title,
                    'og_desc' => $data->og_desc,
                    'og_image' => $data->og_image,
                    'meta_description' => $data->meta_description,
                    'parent_slug' => '',                    
                    'slug' => $data->slug,                    
                    'content' => $data->page_description,
                    'content2' => $data->content2,                   
                    'image' => $data->image,
                    'image_mobile' => $data->image_mobile,
                    'body_class' => '',                    
                    'meta_other' => $data->meta_other,
                    'image_alt' => '',
                    'breadcrumbs' => $breadcrumbs,
                    'divclass' => '',
                    'windows' => $windows,
                    'doors' => $doors,

                    );
         $featurebenefit = FeatureBenefit::where('is_delete','0')->where('status','Active')->get();
        return response()->view('sitemap', compact('featurebenefit','title','page_array','result','result1','result2','result3','result4','result5'));
//          ->header('Content-Type', 'text/xml');

    }
}