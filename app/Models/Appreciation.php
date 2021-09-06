<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Appreciation extends Model
{
    use HasFactory;
    protected  $fillable = ['name','category', 'description', 'image','state', 'city', 'created_at','updated_at','status'];
}
