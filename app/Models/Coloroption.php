<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Coloroption extends Model
{
    use HasFactory;
    protected  $fillable = ['title','type','windowdoor','image','slider_images','status'];
}
