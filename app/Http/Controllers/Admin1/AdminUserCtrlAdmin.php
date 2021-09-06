<?php
namespace App\Http\Controllers\Admin; //admin add



use App\Http\Controllers\Controller; // using controller class
use Illuminate\Support\Facades\Auth;
use App\User;
use App\AdminModulesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminUserCtrlAdmin extends Controller {
protected $dates = ['updated_at'];
 
public function __construct()
    {
        $this->middleware('auth');
        $this->user =  \Auth::user();
		    $this->name_url_folder= 'admin-user';
    }
    
  public function index() { 
   
    if(isset($_GET['delete'])){

      if(Auth::user()->id==$_GET['delete']){
        $message_type="message_error";
         $message_text="Sorry, You can't delete login account!";
         return redirect(ADMIN_FOLDER.'/'.$this->name_url_folder)->with($message_type,$message_text);      
    }

        $delete_status = User::find($_GET['delete'])->delete();
        $message_type="message_susuccess";
         $message_text="Record has been deleted successfully!";
         return redirect(ADMIN_FOLDER.'/'.$this->name_url_folder)->with($message_type,$message_text);

    }

    if(isset($_GET['q'])){
      $search=$_GET['q'];
    $data_rows=User::where('is_admin',1)->where('id', '!=' ,Auth::user()->id)->where('email', 'LIKE', "%{$search}%") 
	//$data_rows=User::where('is_admin',1)->where('name', 'LIKE', "%{$search}%")->orwhere('email', 'LIKE', "%{$search}%")  	 
      ->orderBy('created_at', 'desc'); 
	  
    } else {
      $data_rows=User::where('is_admin',1)->where('id', '!=' ,Auth::user()->id)->orderBy('created_at', 'desc');
    }

   $data_rows= $data_rows->paginate(PAGINATE_LIMIT);
    $page_array=array(                    
                    'title' => str_replace("-"," ",ucwords($this->name_url_folder)),                 
                    'page_name' => $this->name_url_folder,                     
                    'data_rows' => $data_rows,                     
                    );
     return view('admin.user.index',$page_array); 
  }





    public function view($id) {
      $admin_modules=AdminModulesModel::where('status','1')->orderBy('sorting', 'asc')->get();
    $data = User::where('id', $id)->first();
            if($data){
                $page_array=array(                    
                    'title' =>'View '.str_replace("-"," ",ucwords($this->name_url_folder)),                    
                    'page_name' => $this->name_url_folder,                     
                    'data_row' => $data,                     
                    'admin_modules' => $admin_modules,                     
                    );
              return view('admin.user.view',$page_array); 
        }  else {
        return redirect(ADMIN_URL);        
    }
      
    }

	
	  public function add() {
	 $admin_modules=AdminModulesModel::where('status','1')->orderBy('sorting', 'asc')->get();
              $data=array();
                $page_array=array(                    
                     'title' =>'Add '.str_replace("-"," ",ucwords($this->name_url_folder)),                    
                    'page_name' => $this->name_url_folder,                     
                    'data_rows' => $data,              
								     'admin_modules' => $admin_modules,   
                    );
            return view('admin.user.view',$page_array); 
       
        
    
      
    }
	
	
	
	
	

       public function save(Request $request ) {   
			$id=$_POST['id'];
			unset($_POST['id']); 
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
		//$array_validate['mobile']="numeric";
		$this->validate($request,$array_validate);				
				
				
            $message_type="message_error";
            $message_text="Some error!";

            try
              { 
				  if($_POST['new_password']!='nopassword'){
						$_POST['password']=bcrypt($_POST['new_password']);
				  }
				  $_POST['is_admin']=1;
				  
          if(isset($_POST['admin_modules'])){        
            $_POST['admin_modules']=implode(',',$_POST['admin_modules']); 
               
        }


				if($id==''){
					$update=User::create($_POST);	
					
				} else {
					 $update=User::find($id);
						
                      $update->fill($_POST);
                      $update->save();
				}
				
                   
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


                return redirect(ADMIN_FOLDER.'/'.$this->name_url_folder)->with($message_type,$message_text);
       

    }
	

 
    public function export(Request $request){       
				  if(isset($_GET['q'])){
				  $search=$_GET['q'];
				/*   $data_rows=User::where('is_admin',0)->where('name', 'LIKE', "%{$search}%")
				  ->orWhere('email', 'LIKE', "%{$search}%")
				  ->orWhere('id', 'LIKE', "%{$search}%")
				  ->orWhere('created_at', 'LIKE', "%{$search}%")
				  ->orderBy('created_at', 'desc')->get(); */
				    $data_rows=User::where('is_admin',1)->where('email', 'LIKE', "%{$search}%")->orderBy('created_at', 'desc')->get(); 
					//$data_rows=User::where('is_admin',1)->where('name', 'LIKE', "%{$search}%")->orwhere('email', 'LIKE', "%{$search}%")->orderBy('created_at', 'desc')->get();   
				} else {
				  $data_rows=User::where('is_admin',1)->orderBy('created_at', 'desc')->get();
				}
				
				
        $tot_record_found=0;
        if(count($data_rows)>0){
            $tot_record_found=1;
            //First Methos 
			
            $export_data="Id,Name,Email,Mobile,Status,CreatedAt,UpdatedAt \n";
            foreach($data_rows as $value){
                $export_data.='"'.$value->id.'",';				
				 $export_data.='"'.$value->name.'",';				
				 $export_data.='"'.$value->email.'",';		
				 $export_data.='"'.$value->mobile.'",';		
				 $export_data.='"'.$value->status.'",';									
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