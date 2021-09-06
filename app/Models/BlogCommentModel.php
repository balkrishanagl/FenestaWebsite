<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCommentModel extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'blog_comment';
    protected $fillable = array('id','name','email','message','status','ip','blog_name','blog_id');
    //protected $fillable = array('*');


   
}
