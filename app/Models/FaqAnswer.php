<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class FaqAnswer extends Model
{
    use HasFactory;
    protected  $fillable = ['id', 'faq_id', 'answer', '	is_delete','created_at', 'updated_at'];
}
