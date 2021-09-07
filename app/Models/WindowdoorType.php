<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class WindowdoorType extends Model
{
    use HasFactory;
    protected  $fillable = ['title','slug','type','image','hoverimage','status'];
    
    public function producttype()
    {
        return $this->hasMany(WindowType::class, 'product');

    }
}
