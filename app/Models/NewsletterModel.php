<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsletterModel extends Model
{
	

	protected $primaryKey = 'id';
    protected $table = 'newsletter';
    protected $fillable = array('email','name','organisation','designation');
}//end Block
