<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrientationModel extends Model
{
    use HasFactory;
    protected $table = 'orientationmaster';

    protected $fillable = [
        'name',
        'image',
        'isactive',
        'isdeleted',
    ];
}
