<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AboutFenesta extends Model
{
    use HasFactory;
    protected  $fillable = ['title', 'description', 'image', 'type', 'created_at','updated_at','status'];
}
