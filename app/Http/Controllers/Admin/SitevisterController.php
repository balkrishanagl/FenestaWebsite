<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class SitevisterController extends Controller
{  public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
	{
		$visters = DB::table('site_visits')->orderBy('updated_on','desc')->get();
//        echo "<pre>";
//        print_r($visters);
//        die;
		$visters_total = DB::table('site_visits')->get()->count();
		return view('admin.Sitevisiter.index',compact('visters','visters_total'));
	}

	public function detail($id){
		$user_journey = DB::table('site_visits')->where('id',$id)->first();
           
		return view('admin.Sitevisiter.view',compact('user_journey'));
	}

        public function export(Request $request){  

 			  
   
        $data_rows=$visters = DB::table('site_visits')->orderBy('id', 'desc')->get();

        $tot_record_found=0;
        if(count($data_rows)>0){
            $tot_record_found=1;
            //First Methos 
			

            $export_data="ID,Last Visited Url,First - Last Visit On,IP,Cookie,OS,Browser,Name,Email,Phone Number,State,City \n";
            foreach($data_rows as $value){
                $informationData = json_decode($value->json_data, true);
                //print_r($informationData);
               // die;
                $export_data.='"'.$value->id.'",';	
				$export_data.='"'.$informationData['last_page_info']['url'].'",';	
				$export_data.='"'.date("d F, Y,  h:i A",strtotime($value->created_on)).' - '.date("d F, Y,  h:i A",strtotime($value->updated_on)).'",';	
				$export_data.='"'.$value->ip.'",';			
				$export_data.='"'.$value->cookie_name.'",';			
				$export_data.='"'.$value->os.'",';			
				$export_data.='"'.$value->browser.'",';
                
                if(!empty($informationData['user_information']['user_name'])){
                  $export_data.='"'.$informationData['user_information']['user_name'].'",';  
                }else{
                   $export_data.=' , ';   
                }
      			
                if(!empty($informationData['user_information']['user_email'])){
                  $export_data.='"'.$informationData['user_information']['user_email'].'",';  
                }else{
                   $export_data.=' , ';   
                }
      			
                if(!empty($informationData['user_information']['user_phone'])){
                  $export_data.='"'.$informationData['user_information']['user_phone'].'",';  
                }else{
                   $export_data.=' , ';   
                }
      			
                $export_data.='"'.$informationData['user_information']['state'].'",';
                $export_data.='"'.$informationData['user_information']['city'].'",';
                
				$export_data.="\r\n";
            }
			$filename='Sitevisiter-'.date('Y-m-d').".csv";
            return response($export_data)
                ->header('Content-Type','application/csv')                
                ->header('Content-Disposition', 'attachment; filename="Export-'.$filename)
                ->header('Pragma','no-cache')
                ->header('Expires','0');                     
        }
			$message_type="message_error";
            $message_text="Some error!";
         return redirect('admin/site-visiter')->with($message_type,$message_text);   
    }
  
}
