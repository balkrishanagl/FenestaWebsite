<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class HomeBannerImage extends Model
{
    use HasFactory;
    protected  $fillable = ['heading','sub_heading','hover_heading','hover_sub_heading','home_banner_small','home_banner_image','status'];
}
