<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategoryModel extends Model
{
	

	protected $primaryKey = 'id';
    protected $table = 'blog_category';
    protected $fillable = array('id', 'name','slug','status','image','hoverimage','page_title','meta_keywords','meta_description','sorting');
}//end Block
