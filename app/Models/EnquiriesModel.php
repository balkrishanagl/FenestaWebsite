<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnquiriesModel extends Model
{
	

	protected $primaryKey = 'id';
    protected $table = 'enquiries';
    protected $fillable = array('email','name','contactno','state','city','address','message','type','created_at','is_delete','brochure_id','ip');
}//end Block
