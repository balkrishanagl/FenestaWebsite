<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class WindowType extends Model
{
    use HasFactory;
    protected  $fillable = ['title','product','product_type','image','status'];

    
}  
