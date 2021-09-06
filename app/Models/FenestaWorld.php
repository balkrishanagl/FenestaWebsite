<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class FenestaWorld extends Model
{
    use HasFactory;
    protected  $fillable = ['id', 'title','description', 'image','created_at','updated_at','status'];
}
