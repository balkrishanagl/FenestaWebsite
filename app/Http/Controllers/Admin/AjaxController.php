<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    
	public function __construct(){
    
        
    }
    
    public function bulk_delete_action(Request $request){
        $emp_id = trim($request->emp_id);

        $table = $request->t;
        
        DB::update("update  $table set is_delete = 2 where id in ($emp_id) ");

        return true;
    } 
    public function bulk_active_action(Request $request){
        $emp_id = trim($request->emp_id);	
        $table = $request->t;
        DB::update("update  $table set status = 1 where id in ($emp_id) ");

        return true;
        }
    public function bulk_inactive_action(Request $request){
        $emp_id = trim($request->emp_id);	
        $table = $request->t;
        DB::update("update  $table set status = 2 where id in ($emp_id) ");
        return true;
        }
    public function getstate() {
        
        $data = file_get_contents ("js/states.json");
        $json = json_decode($data, true);
        ?>
        <option value="">--Select state--</option>
            <?php
     foreach($json as $gg){
//         print_r($gg);
//         die;
         if($gg['country_id']=='101'){
       
?>
           <option value="<?=$gg['name']?>" data-id="<?=$gg['id']?>"><?=$gg['name']?></option>

<?php }
         
     }
    }
    
    public function index(Request $request ) {         
//print_r($request->all());
//    die;
    $id = $request->state;
        
         $data = file_get_contents ("js/cities.json");
        $json = json_decode($data, true);
        ?>
        <option value="">--Select--</option>
            <?php
     foreach($json as $gg){
//         print_r($gg);
//         die;
         if($gg['state_id']==$id){
       
?>
           <option value="<?=$gg['name']?>"><?=$gg['name']?></option>
<?php }
     }
    }
   public function editgetstate(Request $request ) {
        $rid = $request->id;
        $data = file_get_contents ("js/states.json");
        $json = json_decode($data, true);
        ?>
        <option value="">--Select state--</option>
            <?php
     foreach($json as $gg){
//         print_r($gg);
//         die;
         if($gg['country_id']=='101'){
       
?>
           <option <?php if($rid==$gg['name']){ echo "selected"; } ?>  value="<?=$gg['name']?>" data-id="<?=$gg['id']?>"><?=$gg['name']?></option>

<?php }
         
     }
    }
    
    public function editgetcity(Request $request ) {         
//print_r($request->all());
//    die;
    $id = $request->state;
    $sid = $request->id;
        
         $data = file_get_contents ("js/cities.json");
        $json = json_decode($data, true);
        ?>
        <option value="">--Select--</option>
            <?php
     foreach($json as $gg){
//         print_r($gg);
//         die;
         if($gg['state_id']==$id){
       
?>
           <option <?php if($sid==$gg['name']){ echo "selected"; } ?>  value="<?=$gg['name']?>"><?=$gg['name']?></option>
<?php }
     }
    }
}
