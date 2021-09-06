<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PartnerShowroom extends Model
{
    use HasFactory;
    protected  $fillable = ['dealer_name','country', 'city', 'state', 'locality', 'address','contact_person','video_url','is_delete','created_at','updated_at','status'];
}
