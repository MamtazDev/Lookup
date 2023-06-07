<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorCodeModel extends Model
{
    use HasFactory;
    protected $table = 'colorsmaster';

    protected $fillable = [
        'name',
        'colorcode',
        'isactive',
        'isdeleted',
    ];
}
