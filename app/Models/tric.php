<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tric extends Model
{
    use HasFactory;
    protected  $fillable = ['chapterNumber', 'title', 'b1h', 'b1' , 'imageOne', 'imageTwo'];
}
