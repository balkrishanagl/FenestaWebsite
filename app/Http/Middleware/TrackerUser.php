<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class TrackerUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      
    // $data_array = array();
                
       // $referer = $request->header('referer');
        $user_agent = $request->header('User-Agent');
        $os_platform =   "";
        $os_array =   array(
            '/windows nt 10/i'      =>  'Windows 10',
            '/windows nt 6.3/i'     =>  'Windows 8.1',
            '/windows nt 6.2/i'     =>  'Windows 8',
            '/windows nt 6.1/i'     =>  'Windows 7',
            '/windows nt 6.0/i'     =>  'Windows Vista',
            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
            '/windows nt 5.1/i'     =>  'Windows XP',
            '/windows xp/i'         =>  'Windows XP',
            '/windows nt 5.0/i'     =>  'Windows 2000',
            '/windows me/i'         =>  'Windows ME',
            '/win98/i'              =>  'Windows 98',
            '/win95/i'              =>  'Windows 95',
            '/win16/i'              =>  'Windows 3.11',
            '/macintosh|mac os x/i' =>  'Mac OS X',
            '/mac_powerpc/i'        =>  'Mac OS 9',
            '/linux/i'              =>  'Linux',
            '/ubuntu/i'             =>  'Ubuntu',
            '/iphone/i'             =>  'iPhone',
            '/ipod/i'               =>  'iPod',
            '/ipad/i'               =>  'iPad',
            '/android/i'            =>  'Android',
            '/blackberry/i'         =>  'BlackBerry',
            '/webos/i'              =>  'Mobile'
        );

	foreach ( $os_array as $regex => $value ) { 
		if ( preg_match($regex, $user_agent ) ) {
			$os_platform = $value;
		}
	}   
	//echo $os_platform;
    
        
    $browser        = "";
	$browser_array  = array(
		'/msie/i'       =>  'Internet Explorer',
		'/firefox/i'    =>  'Firefox',
		'/safari/i'     =>  'Safari',
		'/chrome/i'     =>  'Chrome',
		'/edge/i'       =>  'Edge',
		'/opera/i'      =>  'Opera',
		'/netscape/i'   =>  'Netscape',
		'/maxthon/i'    =>  'Maxthon',
		'/konqueror/i'  =>  'Konqueror',
		'/mobile/i'     =>  'Handheld Browser'
	);

	foreach ( $browser_array as $regex => $value ) { 
		if ( preg_match( $regex, $user_agent ) ) {
			$browser = $value;
		}
	}
        
    $userCookieData = array_filter($_COOKIE, function($key) {
		    return strpos($key, 'fenesta_web_') === 0;
		}, ARRAY_FILTER_USE_KEY);
//        dd($userCookieData);
    if(!empty($userCookieData)){
        $userCookieKey = array_keys($userCookieData);
        $a_key = count($userCookieKey);
        $userCookieName = $userCookieKey[($a_key-1)];
    }else{
        $userCookieName = '';
    }

//echo $userCookieName;
//        die;
      $page = $request->url();  
       
        if(strpos($page, 'admin') == false){

			if(strpos($page, 'home') == false){
			if(strpos($page, 'ajax') == false){
			if(strpos($page, 'login') == false){

			if(strpos($page, 'images') == false){
			if(strpos($page, 'css') == false){
			if(strpos($page, 'js') == false){
			if(strpos($page, 'fonts') == false){
			if(strpos($page, '_ignition') == false){

        $ip = $request->ip();
        $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));

        $city = '';
        $state = '';
        $country = '';
        $pincode = '';
//dd($query);
                
        if($query && $query['status'] == 'success')
        {
            if(isset($query['city'])){
                $city = $query['city'];	
            }else{
                $city = "Delhi";
            }

            if(isset($query['regionName'])){
                $state = $query['regionName'];	
            }else{
                $state = "";
            }

            if(isset($query['country'])){
                $country = $query['country'];	
            }else{
                $country = "";
            }

            if(isset($query['zip'])){
                $pincode = $query['zip'];	
            }else{
                $pincode = "";
            }

            //$state = $query['region'];
        }
        
        //$current_url = $request->url();

        $request->merge(array("cookiesstate" => $state));
        $request->merge(array("cookiescity" => $city));
        $request->merge(array("cookiesuserda" => $userCookieData));

        $refferral_url = '';
        $searchTerm = '';
        if ($request->header('referer'))
		{
			
		    $refferralArray = parse_url($request->header('referer'));

		    if ( stristr( $refferralArray['host'], 'google.' ) )
	        {
	          parse_str( $refferralArray['query'], $queryVars );
	          $refferral_url = $request->header('referer');
	          $searchTerm = $queryVars['q']; // This is the search term used
	        }
		}

        
                $query=DB::table('site_visits');
 
		        if($userCookieName !=''){
		            $query->where('cookie_name', $userCookieName);
		        }else{
		        	$query->where('ip', $ip);
		        }
                $existingData = $query->first();
                
				//$method = $this->sys->router->fetch_method();
				$segment = $request->segments();
                if(!empty($segment)){
                    $slug = end($segment);
                }else{
                    $slug = 'home';
                }

				$slug_index = preg_replace('/[^a-zA-Z0-9_.]/', '_', $slug);

				
                $data_array = array(
						'pages' => array(
							$slug_index => array(
									'count' => 1,
									'slug' => $slug,
									'current_url' => $page,
									'search_term_url' => $refferral_url,
									'search_term' => $searchTerm
							),
						),
						'user_information' => array(
							'state' => $state,
							'city' => $city,
							'country' => $country,
							'pincode' => $pincode
						),
                    'last_page_info'=>array(
                    'url'=>$page,
                    'timing'=>date("Y-m-d H:i:s"),
                    ),
                     
					);

				
            $dataJsone = json_encode($data_array);
				
//        print_r($dataJsone);
//                die;
                
           if(empty($existingData)){     
        
        $randDigi = mt_rand(1000,9999);
        
        $cookie_name = 'fenesta_web_'.time().'_'.$randDigi;
        $response = $next($request);
        $response->withCookie(cookie()->forever($cookie_name, $dataJsone));
        
        
        
        $data = array(
						'ip' => $ip,
						'cookie_name' => $cookie_name,
						'method' => $slug,
						'json_data' => $dataJsone,
		                'os' => $os_platform,
		                'user_agent' => $user_agent,
		                'browser' => $browser,
					);
        DB::table('site_visits')->insert($data);
           }else{
            
              $data = $existingData->json_data;
		      $dataArray = json_decode($data);
            if(isset($dataArray->pages->$slug_index)){

			        		$keyExist = self::findKey($dataArray->pages,$slug_index);
			        	
				        	if($keyExist){
				        		//echo $dataArray->solution_category->$solutionMostViewedSlug->count; die;

				        		$dataArray->pages->$slug_index->count =  $dataArray->pages->$slug_index->count +1;
				        	}else{
				        		$dataArray->pages->$slug_index = array(
				        			'count' => 1,
				        			'slug' => $slug,
									'current_url' => $page,
									'search_term_url' => $refferral_url,
									'search_term' => $searchTerm
				        		);
				        	}	
			        	}else{
			        		$dataArray->pages->$slug_index = array(
				        			'count' => 1,
				        			'slug' => $slug,
									'current_url' => $page,
									'search_term_url' => $refferral_url,
									'search_term' => $searchTerm
				        		);
			        	}

                    $dataArray->last_page_info->url = $page;
                    $dataArray->last_page_info->timing = date("Y-m-d H:i:s");
                    $dataArray->user_information->state = $state;
		        	$dataArray->user_information->city = $city;
		        	$dataArray->user_information->country = $country;
		        	$dataArray->user_information->pincode = $pincode;
		        	//echo '<pre>'; print_r($dataArray); die;
		        	$dataJsone = json_encode($dataArray);
		        	$data = array(
						'json_data' => $dataJsone,
		                'os' => $os_platform,
		                'user_agent' => $user_agent,
		                'browser' => $browser,
						'updated_on' => date("Y-m-d H:i:s"),
					);


		        	/*$cookie_name = 'agl_web';
					set_cookie($cookie_name,$dataJsone,time()+31556926);*/
					$cookie_name = $existingData->cookie_name;
					$response = $next($request);
                    $response->withCookie(cookie()->forever($cookie_name, $dataJsone));

		           DB::table('site_visits')->where('id', $existingData->id)->update($data);
           }
        return $response;
    }
    
        }
            }
            }
            }
            }
            }
        }
        }
   
    return $next($request);
    }
 
 function findKey($array, $keySearch)
{
    foreach ($array as $key => $item) {
    	
        if ($key == $keySearch) {
            //echo 'yes, it exists';
            return true;
        } elseif (is_array($item) && findKey($item, $keySearch)) {
            return true;
        }
    }
    return false;
}   
}