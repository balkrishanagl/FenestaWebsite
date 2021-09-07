<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EnquiriesModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class EnquiresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	public function index(){
		$newsletters = DB::table('lp_leads')
            ->select()->where('is_delete','0')->orderBy('id','desc')->paginate(10);
            
		return view('admin.enquiry.enquiries')->with('newsletters',$newsletters);
	}

	public function windowdoorconsult(){
		$newsletters = DB::table('enquiries')
            ->select()->where('is_delete',1)->where('type','Windowdoorconsult')->orderBy('id','desc')
            ->paginate(10);
            
		return view('admin.enquiry.windowdoorconsult')->with('newsletters',$newsletters);
	}
	public function interiorsconsult(){
		$newsletters = DB::table('enquiries')
            ->select()->where('is_delete',1)->where('type','Interiorsconsult')->orderBy('id','desc')
            ->paginate(10);
            
		return view('admin.enquiry.interiorsconsult')->with('newsletters',$newsletters);
	}
	public function customercomplaint(){
		$newsletters = DB::table('enquiries')
            ->select()->where('is_delete',1)->where('type','Customercomplaint')->orderBy('id','desc')
            ->paginate(10);
            
		return view('admin.enquiry.customercomplaint')->with('newsletters',$newsletters);
	}

	public function reachbusiness(){
		$newsletters = DB::table('enquiries')
            ->select()->where('is_delete',1)->where('type','Reachbusiness')->orderBy('id','desc')
            ->paginate(10);
            
		return view('admin.enquiry.reachbusiness')->with('newsletters',$newsletters);
	}
	public function brochureenquiry(){
		$newsletters = DB::table('enquiries')->leftJoin('brochures', 'brochures.id', '=', 'enquiries.brochure_id')->select('enquiries.id as id','brochures.title as btitle','enquiries.name as name','enquiries.email as email','enquiries.contactno as contactno','enquiries.created_at as created_at','enquiries.ip as ip')->where('enquiries.is_delete','0')->where('enquiries.type','Brochureenquiry')->orderBy('id','desc')
            ->paginate(10);
//        echo "<pre>";
//        print_r($newsletters);
//        die;
		return view('admin.enquiry.brochureenquiry')->with('newsletters',$newsletters);
	}

	public function delete(Request $request,$id){
		$fenestaWorld = EnquiriesModel::find($id);
		$result = array();
		if(!empty($fenestaWorld)){
			$isDeleted = EnquiriesModel::where('id', $id)->update(array('is_delete' => '2'));
			if($isDeleted){
				$result['key'] = '1';
				$result['msg'] = 'Data Deleted';
			}else{
				$result['key'] = '2';
				$result['msg'] = 'whoops!! Data could not deleted';
			}
		}else{
			$result['key'] = '0';
			$result['msg'] = 'Data not found';
		}
		return json_encode($result);

	}
	public function deleteleads(Request $request,$id){
        
		$fenestaWorld = DB::table('lp_leads')->where('id', $id)->first();
		$result = array();
		if(!empty($fenestaWorld)){
            
            $isDeleted = DB::table('lp_leads')->where('id',$id)->update(['is_delete'=>'2']);
            
//			$isDeleted = DB::update('lp_leads')->where('id', $id)->update(['' => '2']);
//			if($isDeleted){
				$result['key'] = '1';
				$result['msg'] = 'Data Deleted';
//			}else{
//				$result['key'] = '2';
//				$result['msg'] = 'whoops!! Data could not deleted';
//			}
		}else{
			$result['key'] = '0';
			$result['msg'] = 'Data not found';
		}
		return json_encode($result);

	}
}
