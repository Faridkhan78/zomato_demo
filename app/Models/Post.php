<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
use HasFactory;
protected $table = 'datatables';

    protected $fillable = [
        'title',
        'description',
        'image_path',
        'published_date'
    ];
}
