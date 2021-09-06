<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AwardAccreditation extends Model
{
    use HasFactory;
    protected  $fillable = ['description','image','type','is_delete','created_at','updated_at','status'];
}
