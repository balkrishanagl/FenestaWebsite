<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogTagModel extends Model
{
	

	protected $primaryKey = 'id';
    protected $table = 'blog_tag';
    protected $fillable = array('id', 'name','slug','status','page_title','meta_keywords','meta_description');
}//end Block
