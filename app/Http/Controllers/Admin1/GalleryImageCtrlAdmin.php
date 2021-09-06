<?php
namespace App\Http\Controllers\Admin; //admin add



use App\Http\Controllers\Controller; // using controller class
use Illuminate\Support\Facades\Auth;
use App\GalleryImageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class GalleryImageCtrlAdmin extends Controller {
  protected $dates = ['updated_at'];
  
public function __construct()
    {
        $this->middleware('auth');
        $this->user =  \Auth::user();
        $this->name_url_folder= 'gallery-image';
    }





public function roleChecking() {

  $admin_modules_array=explode(',',Auth::user()->admin_modules);
      if(!in_array($this->name_url_folder,$admin_modules_array)){
        if(!in_array('all-modules',$admin_modules_array)){
           die("Sorry, you don’t have access to this page/module!");
          }                    
    }

}


    
  public function index() {

  $this->roleChecking(); 
    
    if(isset($_GET['delete'])){
    	$gallery_id = GalleryImageModel::find($_GET['delete'])->gallery_id;
        $delete_status = GalleryImageModel::find($_GET['delete'])->delete();
         $message_type="message_susuccess";
         $message_text="Record has been deleted successfully!";
        // return redirect(ADMIN_FOLDER.'/'.$this->name_url_folder)->with($message_type,$message_text);
         return redirect(ADMIN_FOLDER.'/gallery/view/'.$gallery_id)->with($message_type,$message_text);

    }
  

  }




    public function view($id) {

      $this->roleChecking(); 
    $data = GalleryImageModel::where('id', $id)->first();






            if($data){
                $page_array=array(                    
                    'title' => 'View',                    
                    'page_name' => $this->name_url_folder,                     
                    'data_row' => $data,                     
                    'gallery_id' => $data->gallery_id,                     
                    );
              //return view('admin.pages.view',$page_array); 
              return view('admin.gallery.gallery-image-view',$page_array); 
        }  else {
        return redirect(ADMIN_URL);        
    }
      
    }

    public function add($gallery_id) {

    


             $data=array();
                $page_array=array(                    
                     'title' =>'Add',                    
                    'page_name' => $this->name_url_folder,                     
                    'data_row' => $data,              
                    'gallery_id' => $gallery_id,              
                        
                    );
            return view('admin.gallery.gallery-image-view',$page_array); 
       
        
    
      
    }




    public function save(Request $request ) {          
    	  $this->roleChecking(); 
           
      $id='';
      $gallery_id=$_POST['gallery_id'];
    if($_POST['id']){
      $id=$_POST['id'];      
    }
    unset($_POST['id']); 


 if($_POST['submit_type']=='3' && $id!=''){
        $delete_status = GalleryImageModel::find($id)->delete();
         $message_type="message_susuccess";
         $message_text="Record has been deleted successfully!";
        return redirect(ADMIN_FOLDER.'/gallery-image/view/'.$gallery_id)->with($message_type,$message_text);

    }



     
         $array_validate=array();
        $array_validate['title']="required"; 
        //$array_validate['content1']="required";  
        $array_validate['image_path']="image|mimes:jpeg,png,jpg";  


    
  
    
    
    $this->validate($request,$array_validate);  

            $message_type="message_error";
            $message_text="Some error!";

            try
              { 



         $image_path = $request->file('image_path');
        if($image_path) {  
        
        $file_name=$image_path->getClientOriginalName();
        $file_name=strtolower(str_replace(" ","-",$file_name));
        $filename_remove=explode(".",$file_name);
        //die("a");
        $new_file_name=$filename_remove[0];       
            $image_name = $new_file_name.'-'.time().'.'.$image_path->getClientOriginalExtension();
            $destinationPath = public_path('/media/images/gallery-image/image_path');
            $image_path->move($destinationPath, $image_name);
           $_POST['image_path']='media/images/gallery-image/image_path/'.$image_name;
        } else {
            if(isset($_POST['image_delete'])){        
              $_POST['image_path']='';
            }
        } 

      
          //$_POST['photos']=implode(',',$_POST['photos']);
               if($id==''){           
                      $save=GalleryImageModel::create($_POST);

                    } else {
                               
            
                $save=GalleryImageModel::find($id);              
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
            return redirect(ADMIN_FOLDER.'/gallery-image/view/'.$save->id)->with($message_type,$message_text);
            
          } else {
             return redirect(ADMIN_FOLDER.'/gallery/view/'.$gallery_id)->with($message_type,$message_text);
          }

           
           
        } else {
          return redirect()->back()->with($message_type,$message_text);

        }

    }


        
  

}