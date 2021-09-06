<?php
namespace App\Http\Controllers\Admin; //admin add



use App\Http\Controllers\Controller; // using controller class
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;
class DashboardControl extends Controller {

  //$this->ADMIN_URL=ADMIN_URL;

public function __construct()
    {
        $this->middleware('auth');
        $this->user =  \Auth::user();
       
    }
	
  public function index() {
   //echo $field = Auth::user()->roles;
 
    $page_array=array(                    
                    'title' => 'Dashboard',                    
                    'page_name' => 'Dashboard',
                     
                    );
    return view('admin.dashboard', $page_array); 
  }
   public function profile() {
   //echo $field = Auth::user()->roles;
  

    $users_data=$this->user =  \Auth::user();


    $page_array=array(                    
                    'title' => 'Profile',                    
                    'page_name' => 'profile',                   
                    'data_rows' => $users_data,                    
                     
                    );
    return view('admin.profile', $page_array); 
  }
 


 public function save(Request $request ) {  


  
     $users_data=$this->user =  \Auth::user();
            $id= $users_data->id;
            
            $this->validate($request, [                           
                'name' => 'required', 
                'email' => 'required|email|', 
               
                ]);
    
            $array_validate=array();        
            $array_validate['name']="required";            
            if($id){                        
                $array_validate['email']="required|email|unique:users,email,$id";   
            } else {
            $array_validate['email'] = 'required|email|unique:users|max:255';   
            }   

        $array_validate['new_password']="required|min:8";
        $array_validate['mobile']="required|numeric";
        $this->validate($request,$array_validate);              
                
                
            $message_type="message_error";
            $message_text="Some error!";

            try
              { 
                    $update_array=array();
                    $update_array['name']=$_POST['name'];
                    $update_array['email']=$_POST['email'];                  
                    $update_array['mobile']=$_POST['mobile'];   
                  if($_POST['new_password']!='nopassword'){                      
                         $update_array['password']=bcrypt($_POST['new_password']);
                  }
                  //$_POST['is_admin']=1;                  
                   
                                   
                     $update=User::find($id);                        
                      $update->fill($update_array);
                      $update->save();
               
                
                   
                        if($update){
                           $message_type="message_susuccess";
                           $message_text="Successfully updated";
                     
                   }
              }
              catch(\Exception $e)
              {
                            $message_type="message_error";
                           $message_text=$e->getMessage();
                
              }


                return redirect(ADMIN_FOLDER.'/profile')->with($message_type,$message_text);
       

    }

 
}