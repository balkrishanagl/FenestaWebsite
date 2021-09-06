<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class GreatFacade extends Model
{
    use HasFactory;
    protected  $fillable = [ 'title', 'description', 'youtube_url','reference_image','is_delete','status','created_at','updated_at'];
}
