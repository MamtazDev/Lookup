<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizeModel extends Model
{
    use HasFactory;
    protected $table = 'sizesmaster';

    protected $fillable = [
        'name',
        'image',
        'isactive',
        'isdeleted',
    ];
}
