<?php
namespace App\Http\Controllers\Admin; //admin add



use App\Http\Controllers\Controller; // using controller class
use Illuminate\Support\Facades\Auth;
use App\VisitorTrackModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class VisitorTrackCtrlAdmin extends Controller {
  protected $dates = ['updated_at'];
  
public function __construct()
    {
        $this->middleware('auth');
        $this->user =  \Auth::user();
        $this->name_url_folder= 'visitor-track';
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

     

      if($_GET['ip']){       
       $data_rows->where('ip', 'LIKE',"%{$_GET['ip']}%" );
      }

      if($_GET['country']){       
       $data_rows->where('country', 'LIKE',"%{$_GET['country']}%" );
      }

      if($_GET['regionName']){       
       $data_rows->where('regionName', 'LIKE',"%{$_GET['regionName']}%" );
      }

      if($_GET['city']){       
       $data_rows->where('city', 'LIKE',"%{$_GET['city']}%" );
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
        $delete_status = VisitorTrackModel::find($_GET['delete'])->delete();
         $message_type="message_susuccess";
         $message_text="Record has been deleted successfully!";
         return redirect(ADMIN_FOLDER.'/'.$this->name_url_folder)->with($message_type,$message_text);

    }
  



 $data_rows=VisitorTrackModel::orderBy('id', 'desc');
 $data_rows=$this->getFilter($data_rows); 
 $data_rows= $data_rows->paginate(PAGINATE_LIMIT);

  
    $page_array=array(                    
                    'title' => 'Visitor Track',                    
                    'page_name' => $this->name_url_folder,                    
                    'data_rows' => $data_rows,                     
                    );
     //return view('admin.pages.pages',$page_array); 
      return view('admin.'.$this->name_url_folder.'.index',$page_array); 
  }





    public function view($id) {

      $this->roleChecking(); 
    $data = VisitorTrackModel::where('id', $id)->first();
            if($data){
                $page_array=array(                    
                    'title' => 'View',                    
                    'page_name' => $this->name_url_folder,                     
                    'data_row' => $data,                     
                    );
              //return view('admin.pages.view',$page_array); 
              return view('admin.'.$this->name_url_folder.'.view',$page_array); 
        }  else {
        return redirect(ADMIN_URL);        
    }
      
    }

   


        public function export(Request $request){  

            $this->roleChecking(); 
   
        $data_rows=VisitorTrackModel::orderBy('id', 'desc');
        $data_rows=$this->getFilter($data_rows);
         $data_rows=$data_rows->get();

        $tot_record_found=0;
        if(count($data_rows)>0){
            $tot_record_found=1;
            //First Methos 
            

            $export_data="ID,VisitorID,IP,Country,Region,City,UseTime,Device,Visited Pages,First Hit Date,Last Hit Date \n";
            foreach($data_rows as $value){
                 $export_data.='"'.$value->id.'",'; 
                $export_data.='"'.$value->visitor.'",';           
                $export_data.='"'.$value->ip.'",';           
                $export_data.='"'.$value->country.'",';            
                $export_data.='"'.$value->regionName.'",';            
                $export_data.='"'.$value->city.'",';            
                $export_data.='"'.$value->use_time.'",';            
                $export_data.='"'.$value->device.'",';            
                $export_data.='"'.$value->pages.'",';            
                        
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