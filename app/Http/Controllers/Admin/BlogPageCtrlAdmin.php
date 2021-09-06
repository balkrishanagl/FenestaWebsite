<?php
namespace App\Http\Controllers\Admin; //admin add



use App\Http\Controllers\Controller; // using controller class
use Illuminate\Support\Facades\Auth;
use App\Models\BlogCategoryModel;
use App\Models\BlogTagModel;
use App\Models\Page;
use App\Models\WindowdoorType;
use App\Models\BlogPageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use View;
class BlogPageCtrlAdmin extends Controller {
  protected $dates = ['updated_at'];
  
public function __construct()
    {
        $this->middleware('auth');
        $this->user =  \Auth::user();
        $this->name_url_folder= 'blog-page';
    
    
     $pages=Page::orderBy('page_title', 'asc')->get();
     $product=WindowdoorType::where('is_delete','0')->orderBy('id', 'DESC')->get();
        
     view::share('pages', $pages);
     view::share('product', $product);
    
    }



    function getFilter($data_rows){
    if(isset($_GET['saerch']) && $_GET['saerch']=='field'){   

     

      if($_GET['name']){       
       $data_rows->where('name', 'LIKE',"%{$_GET['name']}%" );
      }
    
       if($_GET['slug']){       
       $data_rows->where('slug', 'LIKE',"%{$_GET['slug']}%" );
      }



    if($_GET['category_id']){       
       $data_rows->where('category_id',$_GET['category_id']);
      }
//echo $_GET['page'];
//        die;
    if(!empty($_GET['page'])){       
       $data_rows->where('page',$_GET['page']);
      }

      if($_GET['status']){       
       $data_rows->where('status',$_GET['status']);
      }

        $fdate=$_GET['fdate'] .' 00:00:00';
        $tdate=$_GET['tdate'] .' 23:59:59';

       if($_GET['fdate']!='' && $_GET['tdate']!=''){
       $data_rows->whereBetween('posted_date', array($fdate, $tdate));
      }elseif($_GET['fdate']!=''){
        $tdate=date('Y-m-d') .' 23:59:59';
       $data_rows->whereBetween('posted_date', array($fdate, $tdate));
      }elseif($_GET['tdate']!=''){
        $fdate='2000-01-01 23:59:59';
       $data_rows->whereBetween('posted_date', array($fdate, $tdate));
      }

//dd($data_rows->toSql()); 
}
//        dd($data_rows);
	return $data_rows;
}





    
  public function index() {

  //  
    
    if(isset($_GET['delete'])){
        $delete_status = BlogPageModel::find($_GET['delete'])->delete();
         $message_type="message_susuccess";
         $message_text="Record has been deleted successfully!";
         return redirect(ADMIN_FOLDER.'/'.$this->name_url_folder)->with($message_type,$message_text);

    }
  


$categorys=BlogCategoryModel::orderBy('name', 'asc')->get();
//$pages=Page::orderBy('page_title', 'asc')->get();
 $data_rows=BlogPageModel::orderBy('posted_date', 'desc')->get();
// $data_rows=$this->getFilter($data_rows); 
// $data_rows= $data_rows->paginate(PAGINATE_LIMIT);

  
    $page_array=array(                    
                    'title' => 'Blog Posts for Pages',                    
                    'page_name' => $this->name_url_folder,                    
//                    'pages' => $pages,                     
                    'data_rows' => $data_rows,                     
                    'categorys' => $categorys,                     
                    );
     //return view('admin.pages.pages',$page_array); 
      return view('admin.'.$this->name_url_folder.'.index',$page_array); 
  }





    public function view($id) {

$categorys=BlogCategoryModel::orderBy('name', 'asc')->get();
//$pages=Page::orderBy('page_title', 'asc')->get();
$tags=BlogTagModel::orderBy('name', 'asc')->get();

        
    $data = BlogPageModel::where('id', $id)->first();
            if($data){
                $page_array=array(                    
                    'title' => 'Edit Page Blog',                    
                    'page_name' => $this->name_url_folder,                     
                    'data_row' => $data,                     
//                    'pages' => $pages,                     
                    'categorys' => $categorys,                     
                    'tags' => $tags,                     
                    );
              //return view('admin.pages.view',$page_array); 
              return view('admin.'.$this->name_url_folder.'.view',$page_array); 
        }  else {
        return redirect(ADMIN_URL);        
    }
      
    }

    public function add() {
        
//$pages=Page::orderBy('page_title', 'asc')->get();
      $categorys=BlogCategoryModel::orderBy('name', 'asc')->get();
      $tags=BlogTagModel::orderBy('name', 'asc')->get();
             $data=array();
                $page_array=array(                    
                     'title' =>'Add Page Blog ',                    
                    'page_name' => $this->name_url_folder,                     
                    'data_row' => $data,              
                    'categorys' => $categorys,              
                    'tags' => $tags,                      
//                    'pages' => $pages,            
                        
                    );
            return view('admin.'.$this->name_url_folder.'.view',$page_array); 
       
        
    
      
    }




    public function save(Request $request ) {          
    	    
           
      $id='';
    if($_POST['id']){
      $id=$_POST['id'];      
    }
    unset($_POST['id']); 

   if($_POST['submit_type']=='3' && $id!=''){
        $delete_status = BlogPageModel::find($id)->delete();
         $message_type="message_susuccess";
         $message_text="Record has been deleted successfully!";
         return redirect(ADMIN_FOLDER.'/'.$this->name_url_folder)->with($message_type,$message_text);

    }

   
         $array_validate=array();
        $array_validate['name']="required";       
         $array_validate['image']="image|mimes:jpeg,png,jpg";  

        if($id){            
          $array_validate['slug']="required|unique:blog_page,slug,$id"; 
        } else {
          $array_validate['slug'] = "required|unique:blog_page|max:255";  
        } 
  
    
    
            $this->validate($request,$array_validate);  

            $message_type="message_error";
            $message_text="Some error!";



//            if(isset($_POST['tags_ids'])){        
//          $_POST['tags_ids']=implode(',',$_POST['tags_ids']);
//        
//               
//        }

            try
              { 
               $image = $request->file('image');
               
        if(!empty($image)){  
        
        $file_name=$image->getClientOriginalName();
        $file_name=strtolower(str_replace(" ","-",$file_name));
           
        $filename_remove=explode(".",$file_name);
        //die("a");
             
            
        $new_file_name=$filename_remove[0];       
            $image_name = $new_file_name.'-'.time().'.'.$image->getClientOriginalExtension();
            
//            $destinationPath = public_path('images/blog');
//            $request->image->move($destinationPath, $image_name);
            
           $request->image->move(public_path('images'), $image_name);
           $_POST['image']=$image_name;
            
//            echo $_POST['image'];
//             die;
        } else {
            if(isset($_POST['image_delete'])){        
              $_POST['image']='';
            }
        }

         if(isset($_POST['page'])){        
          $_POST['page']=implode(',',$_POST['page']);
        
               
        }
               if($id==''){           
                      $save=BlogPageModel::create($_POST);

                    } else {
                               
            
                $save=BlogPageModel::find($id);              
                $save->fill($_POST);
            
                    }
            
            
             $save->save();
                        if($save){
                           $message_type="message_susuccess";
                           $message_text="Successfully saved";
                     
                   }
              }
              catch(\Exception $e)
              {
                            $message_type="message_error";
                           $message_text= $e->getMessage();
                
              }


               // return redirect(ADMIN_FOLDER.'/'.$this->name_url_folder)->with($message_type,$message_text);
        if($message_type=="message_susuccess"){

          if($_POST['submit_type']=='2'){
            return redirect(ADMIN_FOLDER.'/'.$this->name_url_folder.'/view/'.$save->id)->with($message_type,$message_text);
            
          } else {
             return redirect(ADMIN_FOLDER.'/'.$this->name_url_folder)->with($message_type,$message_text);
          }

           
           
        } else {
            
            echo $message_type;
echo $message_text;
          return redirect()->back()->with($message_type,$message_text);

        }

    }


        public function export(Request $request){  

 			  
   
//        $pages=Page::orderBy('page_title', 'asc')->get();
        $data_rows=BlogPageModel::orderBy('id', 'desc');
        $data_rows=$this->getFilter($data_rows);
         $data_rows=$data_rows->get();

        $tot_record_found=0;
        if(count($data_rows)>0){
            $tot_record_found=1;
            //First Methos 
			

            $export_data="ID,Page,Name,Slug,CreatedAt,UpdatedAt \n";
            foreach($data_rows as $value){
                
                 if($value->page!=''){
                          $p_ad = explode('-',$value->page);
                            if($p_ad[0]=='page'){
                                $Pagesdd = Page::find($p_ad[1]);
                                $p_title = $Pagesdd->page_title;
                            }
                           else if($p_ad[0]=='product'){
                                $Pagesdd = WindowdoorType::find($p_ad[1]);
                                $p_title = $Pagesdd->title;
                            }
                            else{
                            $p_title = 'Default';
                            }
                           }else{
                            $p_title = 'Default';
                            }
                
                
         		 $export_data.='"'.$value->id.'",';	
         		 $export_data.='"'.$p_title.'",';	

				$export_data.='"'.$value->name.'",';			
				$export_data.='"'.$value->slug.'",';			
      					
				 $export_data.='"'.$value->created_at.'",';
				 $export_data.='"'.$value->updated_at.'",';
				 $export_data.="\r\n";
            }
			$filename=$this->name_url_folder.'-'.date('Y-m-d').".csv";
            return response($export_data)
                ->header('Content-Type','application/csv')                
                ->header('Content-Disposition', 'attachment; filename="Export-'.$filename)
                ->header('Pragma','no-cache')
                ->header('Expires','0');                     
        }
			$message_type="message_error";
            $message_text="Some error!";
         return redirect(ADMIN_FOLDER.'/'.$this->name_url_folder)->with($message_type,$message_text);   
    }
  

}