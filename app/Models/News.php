<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class News extends Model
{
    use HasFactory;
    protected  $fillable = ['upload_type', 'title', 'detail', 'image', 'content','is_delete','created_at','updated_at','status'];
}
