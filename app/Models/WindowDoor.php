<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class WindowDoor extends Model
{
    use HasFactory;
    protected  $fillable = ['heading','window_image','door_image','status'];
}
