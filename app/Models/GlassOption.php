<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class GlassOption extends Model
{
    use HasFactory;
    protected  $fillable = ['title','status','upload_type','image','description','is_delete'];
}
