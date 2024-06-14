<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BulletinModel extends Model
{
    use HasFactory;

    protected $table = 'bulletins';

    protected $fillable = [
        'title', 'content', 'author', 'media_path'
    ];

    public $timestamps = true;
}
