<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Office extends Model
{
    use HasFactory;
    protected  $fillable = ['contact_person','email','phone', 'city', 'address','type','is_delete','video_url','locality','created_at','updated_at','status'];
}
