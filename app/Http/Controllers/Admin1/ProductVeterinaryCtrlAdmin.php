<?php
namespace App\Http\Controllers\Admin; //admin add



use App\Http\Controllers\Controller; // using controller class
use Illuminate\Support\Facades\Auth;
use App\ProductVeterinaryModel;
use App\ProductCategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductVeterinaryCtrlAdmin extends Controller {
  protected $dates = ['updated_at'];
  
public function __construct()
    {
        $this->middleware('auth');
        $this->user =  \Auth::user();
        $this->name_url_folder= 'product-veterinary';
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

      if($_GET['brand_name']){       
       $data_rows->where('brand_name', 'LIKE',"%{$_GET['brand_name']}%" );
      }

      if($_GET['form_name']){       
       $data_rows->where('form_name', 'LIKE',"%{$_GET['form_name']}%" );
      }
     if($_GET['category']){       
       $data_rows->where('category', 'LIKE',"%{$_GET['category']}%" );
      }
      /*if($_GET['category_id']){       
       $data_rows->where('category_id', 'LIKE',"%{$_GET['category_id']}%" );
      }*/

    
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
        $delete_status = ProductVeterinaryModel::find($_GET['delete'])->delete();
         $message_type="message_susuccess";
         $message_text="Record has been deleted successfully!";
         return redirect(ADMIN_FOLDER.'/'.$this->name_url_folder)->with($message_type,$message_text);

    }
  
$categorys=ProductCategoryModel::where('parent_id',7)->orderBy('cat_name', 'asc')->get();


 $data_rows=ProductVeterinaryModel::orderBy('id', 'desc');
 $data_rows=$this->getFilter($data_rows); 
 $data_rows= $data_rows->paginate(PAGINATE_LIMIT);

  
    $page_array=array(                    
                    'title' => 'Products Veterinary',                    
                    'page_name' => $this->name_url_folder,                    
                    'data_rows' => $data_rows,                     
                    'categorys' => $categorys,                     
                    );
     //return view('admin.pages.pages',$page_array); 
      return view('admin.'.$this->name_url_folder.'.index',$page_array); 
  }





    public function view($id) {

      $this->roleChecking();  
    $data = ProductVeterinaryModel::where('id', $id)->first();
   //$categorys=ProductCategoryModel::where('parent_id',7)->orderBy('cat_name', 'asc')->get();
            if($data){
                $page_array=array(                    
                    'title' => 'View',                    
                    'page_name' => $this->name_url_folder,                     
                    'data_row' => $data,                     
                    //'categorys' => $categorys,                     
                    );
              //return view('admin.pages.view',$page_array); 
              return view('admin.'.$this->name_url_folder.'.view',$page_array); 
        }  else {
        return redirect(ADMIN_URL);        
    }
      
    }

    public function add() {
       //$categorys=ProductCategoryModel::where('parent_id',7)->orderBy('cat_name', 'asc')->get();
             $data=array();
                $page_array=array(                    
                     'title' =>'Add',                    
                    'page_name' => $this->name_url_folder,                     
                    'data_row' => $data,              
                    //'categorys' => $categorys,              
                        
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
        $delete_status = ProductVeterinaryModel::find($id)->delete();
         $message_type="message_susuccess";
         $message_text="Record has been deleted successfully!";
         return redirect(ADMIN_FOLDER.'/'.$this->name_url_folder)->with($message_type,$message_text);

    }




     
         $array_validate=array();
        $array_validate['form_name']="required";       
        $array_validate['ingredient']="required";       
        $array_validate['packdetails']="required";       


  
    
    
    $this->validate($request,$array_validate);  

            $message_type="message_error";
            $message_text="Some error!";

            try
              { 



               if($id==''){           
                      $save=ProductVeterinaryModel::create($_POST);

                    } else {
                               
            
                $save=ProductVeterinaryModel::find($id);              
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
   
        $data_rows=ProductPrescriptionModel::orderBy('id', 'desc');
        $data_rows=$this->getFilter($data_rows);
         $data_rows=$data_rows->get();

        $tot_record_found=0;
        if(count($data_rows)>0){
            $tot_record_found=1;
            //First Methos 
            

            $export_data="ID,Brand Name,Form name,Ingredient,Packdetails,Status,CreatedAt,UpdatedAt \n";
            foreach($data_rows as $value){
                 $export_data.='"'.$value->id.'",'; 

                $export_data.='"'.$value->brand_name.'",';           
                $export_data.='"'.$value->form_name.'",';           
                $export_data.='"'.$value->ingredient.'",';           
                $export_data.='"'.$value->packdetails.'",';          
                 
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