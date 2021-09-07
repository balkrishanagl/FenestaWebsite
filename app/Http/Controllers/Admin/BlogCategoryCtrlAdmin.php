<?php
namespace App\Http\Controllers\Admin; //admin add



use App\Http\Controllers\Controller; // using controller class
use Illuminate\Support\Facades\Auth;
use App\Models\BlogCategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BlogCategoryCtrlAdmin extends Controller {
  protected $dates = ['updated_at'];
  
public function __construct()
    {
        $this->middleware('auth');
        $this->user =  \Auth::user();
        $this->name_url_folder= 'blog-category';
    }








    function getFilter($data_rows){
    if(isset($_GET['saerch']) && $_GET['saerch']=='field'){   

     

      if($_GET['name']){       
       $data_rows->where('name', 'LIKE',"%{$_GET['name']}%" );
      }
    
       if($_GET['slug']){       
       $data_rows->where('slug', 'LIKE',"%{$_GET['slug']}%" );
      }


      if($_GET['status']){       
       $data_rows->where('status',$_GET['status']);
      }

        $fdate=$_GET['fdate'] .' 00:00:00';
        $tdate=$_GET['tdate'] .' 23:59:59';

       if($_GET['fdate']!='' && $_GET['tdate']!=''){
       $data_rows->whereBetween('created_at', array($fdate, $tdate));
      }elseif($_GET['fdate']!=''){
        $tdate=date('Y-m-d') .' 23:59:59';
       $data_rows->whereBetween('created_at', array($fdate, $tdate));
      }elseif($_GET['tdate']!=''){
        $fdate='2000-01-01 23:59:59';
       $data_rows->whereBetween('created_at', array($fdate, $tdate));
      }


}
	return $data_rows;
}





    
  public function index() {

    
    
    if(isset($_GET['delete'])){
        $delete_status = BlogCategoryModel::find($_GET['delete'])->delete();
         $message_type="message_susuccess";
         $message_text="Record has been deleted successfully!";
         return redirect(ADMIN_FOLDER.'/'.$this->name_url_folder)->with($message_type,$message_text);

    }
  



 $data_rows=BlogCategoryModel::orderBy('id', 'desc');
 $data_rows=$this->getFilter($data_rows); 
 $data_rows= $data_rows->paginate(PAGINATE_LIMIT);

  
    $page_array=array(                    
                    'title' => 'Blog Category',                    
                    'page_name' => $this->name_url_folder,                    
                    'data_rows' => $data_rows,                     
                    );
     //return view('admin.pages.pages',$page_array); 
      return view('admin.'.$this->name_url_folder.'.index',$page_array); 
  }





    public function view($id) {

        
    $data = BlogCategoryModel::where('id', $id)->first();
            if($data){
                $page_array=array(                    
                    'title' => 'View Blog Category',                    
                    'page_name' => $this->name_url_folder,                     
                    'data_row' => $data,                     
                    );
              //return view('admin.pages.view',$page_array); 
              return view('admin.'.$this->name_url_folder.'.view',$page_array); 
        }  else {
        return redirect(ADMIN_URL);        
    }
      
    }

    public function add() {
             $data=array();
                $page_array=array(                    
                     'title' =>'Add Blog Category',                    
                    'page_name' => $this->name_url_folder,                     
                    'data_row' => $data,              
                        
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
        $delete_status = BlogCategoryModel::find($id)->delete();
         $message_type="message_susuccess";
         $message_text="Record has been deleted successfully!";
         return redirect(ADMIN_FOLDER.'/'.$this->name_url_folder)->with($message_type,$message_text);

    }




     
         $array_validate=array();
        $array_validate['name']="required";      


        if($id){            
          $array_validate['slug']="required|unique:blog_category,slug,$id"; 
        } else {
          $array_validate['slug'] = "required|unique:blog_category|max:255";  
        } 
  
    
    
    $this->validate($request,$array_validate);  

            $message_type="message_error";
            $message_text="Some error!";

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
            
           $request->image->move(public_path('images/blogcategory/'), $image_name);
           $_POST['image']=$image_name;
            
//            echo $_POST['image'];
//             die;
        } else {
            if(isset($_POST['image_delete'])){        
              $_POST['image']='';
            }
        }
                
        $hoverimage = $request->file('hoverimage');
               
        if(!empty($hoverimage)){  
        
        $file_name1=$hoverimage->getClientOriginalName();
        $file_name1=strtolower(str_replace(" ","-",$file_name1));
           
        $filename_remove1=explode(".",$file_name1);
        //die("a");
             
            
        $new_file_name1=$filename_remove1[0];       
            $image_name1 = $new_file_name1.'-'.time().'.'.$hoverimage->getClientOriginalExtension();
            
//            $destinationPath = public_path('images/blog');
//            $request->image->move($destinationPath, $image_name);
            
           $request->hoverimage->move(public_path('images/blogcategory/'), $image_name1);
           $_POST['hoverimage']=$image_name1;
            
//            echo $_POST['image'];
//             die;
        } else {
            if(isset($_POST['image_delete1'])){        
              $_POST['hoverimage']='';
            }
        }

        
        
        
               if($id==''){           
                      $save=BlogCategoryModel::create($_POST);

                    } else {
                               
            
                $save=BlogCategoryModel::find($id);              
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
          return redirect()->back()->with($message_type,$message_text);

        }

    }


        public function export(Request $request){  

 			  
   
        $data_rows=BlogCategoryModel::orderBy('id', 'desc');
        $data_rows=$this->getFilter($data_rows);
         $data_rows=$data_rows->get();

        $tot_record_found=0;
        if(count($data_rows)>0){
            $tot_record_found=1;
            //First Methos 
			

            $export_data="ID,Name,Slug,CreatedAt,UpdatedAt \n";
            foreach($data_rows as $value){
         		 $export_data.='"'.$value->id.'",';	

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