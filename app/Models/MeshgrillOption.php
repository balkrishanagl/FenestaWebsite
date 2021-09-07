<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class MeshgrillOption extends Model
{
    use HasFactory;
    protected  $fillable = ['title','upload_type','type','image','description','is_delete','status'];
}
