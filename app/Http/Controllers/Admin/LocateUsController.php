<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Showroom;
use App\Models\Office;
use App\Models\PartnerShowroom;
use Illuminate\Support\Facades\DB;

class LocateUsController extends Controller
{  public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    	$showroom = DB::table('showrooms')
            ->select()->where('is_delete','0')
            ->get();
    	return view('admin.LocateUs.showroomList')->with('showroom',$showroom);
    }

    public function addshowroom(){
    	return view('admin.LocateUs.addShowroom');
    }

    public function saveShowroom(Request $request){
    	$validated = $request->validate([
				'dealer_name'		=> 'required',
        		'city'		 		=> 'required',
        		'state'				=> 'required',
        		'locality' 			=> 'required',
        		'address' 			=> 'required',
        		'contact_person'	=> 'required',
        		'lat'	=> 'required',
        		'long'	=> 'required',
//        		'phone'	=> 'required',
//        		'email'	=> 'required',
    		]);
    	if ($request->isMethod('post')) {

    		$data = $request->all();
			$showroom = new Showroom;
			$showroom->dealer_name = $data['dealer_name'];
			$showroom->city = $data['city'];
			$showroom->state = $data['state'];
			$showroom->locality = $data['locality'];
			$showroom->status = $data['status'];
			$showroom->address = 	$data['address'];
    		$showroom->contact_person = $data['contact_person'];
    		$showroom->video_url = $data['video_url'];
    		$showroom->lat = $data['lat'];
    		$showroom->long = $data['long'];
    		

			$showroom->save();

			return redirect('admin/showroom')->with('success','Showroom has been added successfully');
    	}
    }


    public function editshowroom(Request $request,$id){
    	$showroom = Showroom::find($id);
		return view('admin.LocateUs.editShowroom',compact('showroom'));
    }

    public function updateShowroom(Request $request,$id){
    	$validated = $request->validate([
				'dealer_name'		=> 'required',
        		'city'		 		=> 'required',
        		'state'				=> 'required',
        		'locality' 			=> 'required',
        		'address' 			=> 'required',
        		'contact_person'	=> 'required',
        		'lat'	=> 'required',
        		'long'	=> 'required',
//        		'email'	=> 'required',
//        		'phone'	=> 'required',
    		]);

    	if ($request->isMethod('POST')) {
			$data = $request->all();
			$showroom = Showroom::find($id);

			$showroom->dealer_name = $data['dealer_name'];
			$showroom->city = $data['city'];
			$showroom->state = $data['state'];
			$showroom->locality = $data['locality'];
			$showroom->address = $data['address'];
			$showroom->contact_person = $data['contact_person'];
            $showroom->video_url = $data['video_url'];
            $showroom->status = $data['status'];
            $showroom->lat = $data['lat'];
            $showroom->long = $data['long'];
			

			$showroom->save();
			return redirect('admin/showroom')->with('success','Showroom Detail has been Updated successfully');
		}
    }

    public function deleteShowroom(Request $request,$id){
		$showroom = Showroom::find($id);
		$result = array();
		if(!empty($showroom)){
			$isDeleted = Showroom::where('id', $id)->update(array('is_delete' => '1'));
			if($isDeleted){
				$result['key'] = '1';
				$result['msg'] = 'Showroom Deleted';
			}else{
				$result['key'] = '2';
				$result['msg'] = 'whoops!! Showroom could not deleted';
			}
		}else{
			$result['key'] = '0';
			$result['msg'] = 'Showroom not found';
		}
		return json_encode($result);

	}

	public function officeList(){
		$office = DB::table('offices')
            ->select()->where('is_delete','0')
            ->get();
		return view('admin.LocateUs.officeList')->with('officeList',$office);
	}

	public function addOffice(){
    	return view('admin.LocateUs.addOffice');
    }

    public function saveOffice(Request $request){
    	$validated = $request->validate([
				'contact_person'		=> 'required',
        		'email'		 			=> 'required',
        		'phone'					=> 'required',
        		'city' 					=> 'required',
        		'address' 				=> 'required',
        		'type'					=> 'required',
        		'lat'					=> 'required',
        		'long'					=> 'required',
    		]);
    	if ($request->isMethod('post')) {

    		$data = $request->all();
			$office = new Office;
			$office->contact_person = $data['contact_person'];
			$office->email = $data['email'];
			$office->phone = $data['phone'];
			$office->city = $data['city'];
			$office->address = 	$data['address'];
    		$office->type = $data['type'];
            $office->video_url = $data['video_url'];
            $office->status = $data['status'];
            $office->locality = $data['locality'];
            $office->lat = $data['lat'];
            $office->long = $data['long'];
            
			$office->save();

			return redirect('admin/office')->with('success','Office  has been added successfully');
    	}
    }


    public function editOffice(Request $request,$id){
    	$office = Office::find($id);
		return view('admin.LocateUs.editOffice',compact('office'));
    }


    public function updateOffice(request $request,$id){
    	$validated = $request->validate([
				'contact_person'		=> 'required',
        		'email'		 			=> 'required',
        		'phone'					=> 'required',
        		'city' 					=> 'required',
        		'address' 				=> 'required',
        		'type'					=> 'required',
        		'lat'					=> 'required',
        		'long'					=> 'required',
    		]);

    	if ($request->isMethod('POST')) {
			$data = $request->all();
			$office = Office::find($id);

			$office->contact_person = $data['contact_person'];
			$office->email = $data['email'];
			$office->phone = $data['phone'];
			$office->city = $data['city'];
			$office->address = $data['address'];
			$office->type = $data['type'];
            $office->video_url = $data['video_url'];
			$office->locality = $data['locality'];
			$office->status = $data['status'];
			$office->lat = $data['lat'];
			$office->long = $data['long'];
            
			$office->save();
			return redirect('admin/office')->with('success','Office Detail has been Updated successfully');
		}
    }

    public function deleteOffice(Request $request,$id){
		$showroom = Office::find($id);
		$result = array();
		if(!empty($showroom)){
			$isDeleted = Office::where('id', $id)->update(array('is_delete' => '1'));
			if($isDeleted){
				$result['key'] = '1';
				$result['msg'] = 'Office Deleted';
			}else{
				$result['key'] = '2';
				$result['msg'] = 'whoops!! Office could not deleted';
			}
		}else{
			$result['key'] = '0';
			$result['msg'] = 'Office not found';
		}
		return json_encode($result);

	}

	public function partnerShowroomList(){
		$partnerShowroom = DB::table('partner_showrooms')
            ->select()->where('is_delete','0')
            ->get();
		return view('admin.LocateUs.partnerShowroomList')->with('partnerShowroomList',$partnerShowroom);
	}

	public function addParterShowroom(){
		return view('admin.LocateUs.addParterShowroom');
	}

	public function savePartnerShworoom(Request $request){
    	$validated = $request->validate([
				'dealer_name'		=> 'required',
        		'city'		 		=> 'required',
        		'country'		 		=> 'required',
//        		'state'				=> 'required',
        		'locality' 			=> 'required',
        		'address' 			=> 'required',
        		'contact_person'	=> 'required',
        		'phone'	=> 'required',
        		'email'	=> 'required',
        		'lat'	=> 'required',
        		'long'	=> 'required',
    		]);
    	if ($request->isMethod('post')) {

    		$data = $request->all();
			$partnerShowroom = new PartnerShowroom;
			$partnerShowroom->dealer_name = $data['dealer_name'];
			$partnerShowroom->city = $data['city'];
			$partnerShowroom->country = $data['country'];
			$partnerShowroom->state = $data['state'];
			$partnerShowroom->locality = $data['locality'];
			$partnerShowroom->address = 	$data['address'];
    		$partnerShowroom->contact_person = $data['contact_person'];
    		$partnerShowroom->email = $data['email'];
    		$partnerShowroom->phone = $data['phone'];
             $partnerShowroom->video_url = $data['video_url'];
             $partnerShowroom->lat = $data['lat'];
             $partnerShowroom->status = $data['status'];
             $partnerShowroom->long = $data['long'];

			$partnerShowroom->save();

			return redirect('admin/partnerShowroom')->with('success','Partner Showroom has been added successfully');
    	}
    }


    public function editPartnerShowroom(Request $request,$id){
    	$partnerShowroom = PartnerShowroom::find($id);
		return view('admin.LocateUs.editPartnerShowroom',compact('partnerShowroom'));
    }

    public function updatePartnerShowroom(Request $request,$id){
    	$validated = $request->validate([
				'dealer_name'		=> 'required',
        		'city'		 		=> 'required',
        		'country'		 		=> 'required',
//        		'state'				=> 'required',
        		'locality' 			=> 'required',
        		'address' 			=> 'required',
        		'contact_person'	=> 'required',
        		'phone'	=> 'required',
        		'email'	=> 'required',
        		'lat'	=> 'required',
        		'long'	=> 'required',
    		]);

    	if ($request->isMethod('POST')) {
			$data = $request->all();
			$partnerShowroom = PartnerShowroom::find($id);

			$partnerShowroom->dealer_name = $data['dealer_name'];
			$partnerShowroom->country = $data['country'];
			$partnerShowroom->city = $data['city'];
			$partnerShowroom->state = $data['state'];
			$partnerShowroom->locality = $data['locality'];
			$partnerShowroom->address = $data['address'];
			$partnerShowroom->contact_person = $data['contact_person'];
			$partnerShowroom->email = $data['email'];
			$partnerShowroom->phone = $data['phone'];
			$partnerShowroom->status = $data['status'];
            $partnerShowroom->video_url = $data['video_url'];
            $partnerShowroom->lat = $data['lat'];
            $partnerShowroom->long = $data['long'];
            
			$partnerShowroom->save();
			return redirect('admin/partnerShowroom')->with('success','Parter Showroom Detail has been Updated successfully');
		}
    }

    public function deletePartnerShowroom(Request $request,$id){
		$partnerShowroom = PartnerShowroom::find($id);
		$result = array();
		if(!empty($partnerShowroom)){
			$isDeleted = PartnerShowroom::where('id', $id)->update(array('is_delete' => '1'));
			if($isDeleted){
				$result['key'] = '1';
				$result['msg'] = 'Partner Showroom Deleted';
			}else{
				$result['key'] = '2';
				$result['msg'] = 'whoops!! Partner Showroom could not deleted';
			}
		}else{
			$result['key'] = '0';
			$result['msg'] = 'Partner Showroom not found';
		}
		return json_encode($result);

	}
}
