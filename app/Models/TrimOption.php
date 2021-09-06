<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TrimOption extends Model
{
    use HasFactory;
    protected  $fillable = ['title','status','type','image','description','is_delete'];
}
