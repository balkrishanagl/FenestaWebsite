<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class GalleryImages extends Model
{
    use HasFactory;
    protected  $fillable = ['id','showon','segtype','zonewise','type','heading','image','created_at','status'];
}
