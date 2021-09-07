<?php
namespace App\Http\Controllers\Admin; //admin add



use App\Http\Controllers\Controller; // using controller class
use Illuminate\Support\Facades\Auth;
use App\ContactModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ContactCtrlAdmin extends Controller {
  protected $dates = ['updated_at'];
  
public function __construct()
    {
        $this->middleware('auth');
        $this->user =  \Auth::user();
        $this->name_url_folder= 'contact';
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

     
     if($_GET['type']){       
       $data_rows->where('page_type',$_GET['type']);
      }

      if($_GET['name']){       
       $data_rows->where('name', 'LIKE',"%{$_GET['name']}%" );
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
        $delete_status = ContactModel::find($_GET['delete'])->delete();
         $message_type="message_susuccess";
         $message_text="Record has been deleted successfully!";
         return redirect(ADMIN_FOLDER.'/'.$this->name_url_folder)->with($message_type,$message_text);

    }
  



 $data_rows=ContactModel::orderBy('id', 'desc');
 $data_rows=$this->getFilter($data_rows); 
 $data_rows= $data_rows->paginate(PAGINATE_LIMIT);

  
    $page_array=array(                    
                    'title' => 'Contact/Query Data',                    
                    'page_name' => $this->name_url_folder,                    
                    'data_rows' => $data_rows,                     
                    );
     //return view('admin.pages.pages',$page_array); 
      return view('admin.'.$this->name_url_folder.'.index',$page_array); 
  }





    public function view($id) {

      $this->roleChecking(); 
    $data = ContactModel::where('id', $id)->first();
            if($data){
                $page_array=array(                    
                    'title' => 'View Contact/Query',                    
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
                     'title' =>'Add Contact/Query',                    
                    'page_name' => $this->name_url_folder,                     
                    'data_row' => $data,              
                        
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
        $delete_status = ContactModel::find($id)->delete();
         $message_type="message_susuccess";
         $message_text="Record has been deleted successfully!";
         return redirect(ADMIN_FOLDER.'/'.$this->name_url_folder)->with($message_type,$message_text);

    }




     
         $array_validate=array();
        $array_validate['name']="required"; 
        //$array_validate['content1']="required";  
       // $array_validate['image_path']="image|mimes:jpeg,png,jpg";  


    
  
    
    
    $this->validate($request,$array_validate);  

            $message_type="message_error";
            $message_text="Some error!";

            try
              { 


               if($id==''){           
                      $save=ContactModel::create($_POST);

                    } else {
                               
            
                $save=ContactModel::find($id);              
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
   
        $data_rows=ContactModel::orderBy('id', 'desc');
        $data_rows=$this->getFilter($data_rows);
         $data_rows=$data_rows->get();

        $tot_record_found=0;
           if(count($data_rows)>0){
            $tot_record_found=1;
            //First Methos 
      
            $export_data="Id,Name,Email,Mobile,PageType,Message,Status,IP,Date,UpdatedAt \n";
            foreach($data_rows as $value){
          $export_data.='"'.$value->id.'",';        
         $export_data.='"'.$value->name.'",';       
         $export_data.='"'.$value->email.'",';        
         $export_data.='"'.$value->mobile.'",';             
         $export_data.='"'.$value->message.'",';        
         $export_data.='"'.$value->status.'",';
         $export_data.='"'.$value->page_type.'",';         
         $export_data.='"'.$value->IP.'",';  
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