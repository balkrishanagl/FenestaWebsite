<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class FeatureBenefit extends Model
{
    use HasFactory;
    protected  $fillable = ['name','othername','slug','windowtype','doortype', 'title', 'description', 'result', 'meta_title', 'meta_keyword', 'meta_description', 'icon','onhovericon', 'image','belowimage','belowpoints','optiondata','is_delete','created_at','updated_at','status','showon'];
}
