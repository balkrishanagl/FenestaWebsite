<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Testimonial extends Model
{
    use HasFactory;
    protected  $fillable = ['name', 'title', 'description', 'youtube_url','state','city', 'type','category','user_image','	reference_image','is_delete','created_at','updated_at','status'];
}
