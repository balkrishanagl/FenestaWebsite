<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Page extends Model
{
    use HasFactory;
    protected  $fillable = ['meta_title','about', 'meta_description', 'banner_show', 'banner_image', 'sub_text','content2', 'page_title','page_description','status'];
}
