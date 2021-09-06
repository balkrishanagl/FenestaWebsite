<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Solution extends Model
{
    use HasFactory;
    protected  $fillable = ['id', 'title','description', 'image','mainimage','show_on','status','created_at','updated_at'];
}
