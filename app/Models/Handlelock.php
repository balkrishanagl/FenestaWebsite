<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Handlelock extends Model
{
    use HasFactory;
    protected  $fillable = ['title','type','windowdoor','image','content','status'];
}
