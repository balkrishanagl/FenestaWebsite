<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class ProjectsettingController extends Controller
{  public function __construct()
    {
        $this->middleware('auth');
    }
	public function index()
	{
        $logo = Setting::where('key','logo')->first()->value;
        $facebook = Setting::where('key','facebook')->first()->value;
        $twitter = Setting::where('key','twitter')->first()->value;
        $insta = Setting::where('key','insta')->first()->value;
        $youtube = Setting::where('key','youtube')->first()->value;
        $linkedin = Setting::where('key','linkedin')->first()->value;
        $copyright = Setting::where('key','copyright')->first()->value;
        $playstore = Setting::where('key','playstore')->first()->value;
        $appstore = Setting::where('key','appstore')->first()->value;
        $subscribetitle = Setting::where('key','subscribetitle')->first()->value;
        $headerphoneno = Setting::where('key','headerphoneno')->first()->value;
		return view('admin.projectsetting.edit',compact('logo','facebook','twitter','insta','youtube','linkedin','copyright','playstore','appstore','subscribetitle','headerphoneno'));
	}

	public function save(Request $request){

		$validated = $request->validate([
        	//	'logo' 		=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        		'copyright' 		=> 'required',
    		]);
		if ($request->isMethod('post')) {
			$data = $request->all();
            if(empty($request->logo)){
               $imageName  = $request->exist_logo;
            }else{
			$image = $data['logo'];
    		$imageName = time().'.'.$request->logo->extension();
                
    		$request->logo->move(public_path('images/logo'), $imageName);
			

            }

                DB::table('settings')->delete();

                $allintests = [];
                $pagemeta = new Setting;
                 
                $pagemeta->key = 'logo'; 
                $pagemeta->value = $imageName;
                
                $allintests[]=$pagemeta->attributesToArray();
                    
                $pagemeta->key = 'facebook'; 
                $pagemeta->value = $request->facebook;
                
                $allintests[]=$pagemeta->attributesToArray();
                    
                $pagemeta->key = 'twitter'; 
                $pagemeta->value = $request->twitter;
                    
                $allintests[]=$pagemeta->attributesToArray();
                
                $pagemeta->key = 'insta'; 
                $pagemeta->value = $request->insta;
                
                $allintests[]=$pagemeta->attributesToArray();
                    
                $pagemeta->key = 'youtube'; 
                $pagemeta->value = $request->youtube;
                    
                $allintests[]=$pagemeta->attributesToArray();
               
                $pagemeta->key = 'linkedin'; 
                $pagemeta->value = $request->linkedin;
                    
                $allintests[]=$pagemeta->attributesToArray();
                
                $pagemeta->key = 'copyright'; 
                $pagemeta->value = $request->copyright;
                    
                $allintests[]=$pagemeta->attributesToArray();
            
                $pagemeta->key = 'playstore'; 
                $pagemeta->value = $request->playstore;
                    
                $allintests[]=$pagemeta->attributesToArray();
            
                $pagemeta->key = 'appstore'; 
                $pagemeta->value = $request->appstore;
                    
                $allintests[]=$pagemeta->attributesToArray();
            
                $pagemeta->key = 'subscribetitle'; 
                $pagemeta->value = $request->subscribetitle;
                    
                $allintests[]=$pagemeta->attributesToArray();
               
                $pagemeta->key = 'headerphoneno'; 
                $pagemeta->value = $request->headerphoneno;
                    
                $allintests[]=$pagemeta->attributesToArray();
               
                Setting::insert($allintests);
            

			return redirect('admin/projectsettings')->with('success','Project Setting has been added successfully');

		}
	}


}
