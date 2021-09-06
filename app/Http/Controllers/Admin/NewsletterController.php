<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsletterModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class NewsletterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	public function index(){
		$newsletters = DB::table('newsletter')
            ->select()->where('is_delete',1)
            ->get();
            
		return view('admin.enquiry.newsletter')->with('newsletters',$newsletters);
	}

	public function delete(Request $request,$id){
		$fenestaWorld = NewsletterModel::find($id);
		$result = array();
		if(!empty($fenestaWorld)){
			$isDeleted = NewsletterModel::where('id', $id)->update(array('is_delete' => '1'));
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
}
