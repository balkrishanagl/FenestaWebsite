<?php
namespace App\Http\Controllers\Admin; //admin add



use App\Http\Controllers\Controller; // using controller class
use Illuminate\Support\Facades\Auth;
use App\CmspageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CmspageCtrlAdmin extends Controller {
  protected $dates = ['updated_at'];
  
public function __construct()
    {
        $this->middleware('auth');
        $this->user =  \Auth::user();
        $this->name_url_folder= 'cms-page';
    }





public function roleChecking() {

  $admin_modules_array=explode(',',Auth::user()->admin_modules);
      if(!in_array($this->name_url_folder,$admin_modules_array)){
        if(!in_array('all-modules',$admin_modules_array)){
           die("Sorry, you don’t have access to this page/module!");
          }                    
    }

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

  $this->roleChecking(); 
    
    if(isset($_GET['delete'])){
        $delete_status = CmspageModel::find($_GET['delete'])->delete();
         $message_type="message_susuccess";
         $message_text="Record has been deleted successfully!";
         return redirect(ADMIN_FOLDER.'/'.$this->name_url_folder)->with($message_type,$message_text);

    }
  



 $data_rows=CmspageModel::orderBy('id', 'desc');
 $data_rows=$this->getFilter($data_rows); 
 $data_rows= $data_rows->paginate(PAGINATE_LIMIT);


  $page_array=array(                    
                    'title' => 'CMS Page',                    
                    'page_name' => $this->name_url_folder,                    
                    'data_rows' => $data_rows,                    
                                        
                    );
     //return view('admin.pages.pages',$page_array); 
      return view('admin.'.$this->name_url_folder.'.index',$page_array); 
  }





    public function view($id) {

   

  $cmspages=CmspageModel::where('parent_menu_page_id',0)->where('id','!=',$id)->orderBy('name', 'asc')->get();
      $this->roleChecking(); 
    $data = CmspageModel::where('id', $id)->first();
            if($data){
                $page_array=array(                    
                    'title' => 'View Page',                    
                    'page_name' => $this->name_url_folder,                     
                    'data_row' => $data,                     
                                    
                    'cmspages' => $cmspages,                     
                    );
              //return view('admin.pages.view',$page_array); 
              return view('admin.'.$this->name_url_folder.'.view',$page_array); 
        }  else {
        return redirect(ADMIN_URL);        
    }
      
    }

    public function add() {
        $cmspages=CmspageModel::where('parent_menu_page_id',0)->orderBy('name', 'asc')->get();
             $data=array();
                $page_array=array(                    
                    'title' =>'Add Page',                    
                    'page_name' => $this->name_url_folder,                     
                    'data_row' => $data,              
                    'cmspages' => $cmspages,              
                        
                    );
            return view('admin.'.$this->name_url_folder.'.view',$page_array); 
       
        
    
      
    }




    public function save(Request $request ) {          
    	  $this->roleChecking(); 
           
      $id='';
    if($_POST['id']){
      $id=$_POST['id'];      
    }
    unset($_POST['id']); 




   if($_POST['submit_type']=='3' && $id!=''){
        $delete_status = CmspageModel::find($id)->delete();
         $message_type="message_susuccess";
         $message_text="Record has been deleted successfully!";
         return redirect(ADMIN_FOLDER.'/'.$this->name_url_folder)->with($message_type,$message_text);

    }




     
         $array_validate=array();
        $array_validate['name']="required"; 
        //$array_validate['content1']="required";  
        $array_validate['image']="image|mimes:jpeg,png,jpg";  
        $array_validate['image_mobile']="image|mimes:jpeg,png,jpg";  


        if($id){            
          $array_validate['slug']="required|unique:cms_page,slug,$id"; 
        } else {
          $array_validate['slug'] = "required|unique:cms_page|max:255";  
        } 
  
    
    
    $this->validate($request,$array_validate);  

            $message_type="message_error";
            $message_text="Some error!";

            try
              { 



         $image = $request->file('image');
        if($image) {  
        
        $file_name=$image->getClientOriginalName();
        $file_name=strtolower(str_replace(" ","-",$file_name));
        $filename_remove=explode(".",$file_name);
        //die("a");
        $new_file_name=$filename_remove[0];       
            $image_name = $new_file_name.'-'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/media/images/cmspage/image');
            $image->move($destinationPath, $image_name);
           $_POST['image']='media/images/cmspage/image/'.$image_name;
        } else {
            if(isset($_POST['image_delete'])){        
              $_POST['image']='';
            }
        } 

            $image_mobile = $request->file('image_mobile');
        if($image_mobile) {  
        
        $file_name=$image_mobile->getClientOriginalName();
        $file_name=strtolower(str_replace(" ","-",$file_name));
        $filename_remove=explode(".",$file_name);
        //die("a");
        $new_file_name=$filename_remove[0];       
            $image_name = $new_file_name.'-'.time().'.'.$image_mobile->getClientOriginalExtension();
            $destinationPath = public_path('/media/images/cmspage/image_mobile');
            $image_mobile->move($destinationPath, $image_name);
           $_POST['image_mobile']='media/images/cmspage/image_mobile/'.$image_name;
        } else {
            if(isset($_POST['image_mobile_delete'])){        
              $_POST['image_mobile']='';
            }
        } 



         
        
      
          //$_POST['photos']=implode(',',$_POST['photos']);
               if($id==''){           
                      $save=CmspageModel::create($_POST);

                    } else {
                               
            
                $save=CmspageModel::find($id);              
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

 			$this->roleChecking(); 
   
        $data_rows=CmspageModel::orderBy('id', 'desc');
        $data_rows=$this->getFilter($data_rows);
         $data_rows=$data_rows->get();

        $tot_record_found=0;
        if(count($data_rows)>0){
            $tot_record_found=1;
            //First Methos 
			

            $export_data="ID,Name,Title,Slug,CreatedAt,UpdatedAt \n";
            foreach($data_rows as $value){
         		 $export_data.='"'.$value->id.'",';	

        $export_data.='"'.$value->name.'",';     
				$export_data.='"'.$value->page_title.'",';			
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
    public function summernotefilesave(Request $request ) {          
       
    
        

            $image_path='';

            try
              { 

        $array_validate=array();
        $array_validate['file']="image|mimes:jpeg,png,jpg";
        $this->validate($request,$array_validate);  

         $image = $request->file('file');
        if($image) {  
        
        $file_name=$image->getClientOriginalName();
        $file_name=strtolower(str_replace(" ","-",$file_name));
        $filename_remove=explode(".",$file_name);
        //die("a");
        $new_file_name=$filename_remove[0];       
            $image_name = $new_file_name.'-'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/media/upload/images');
            $image->move($destinationPath, $image_name);
           $image_path='/media/upload/images/'.$image_name;
        } 

           
        
      
              }
              catch(\Exception $e)
              {
                            
                           $image_path= $e->getMessage();
                
              }

              echo $image_path;



    }
  

}