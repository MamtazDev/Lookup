<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStyleModel extends Model
{
    use HasFactory;
    protected $table = 'productstyles';

    protected $fillable = [
        'productid',
        'styleid',
    ]; 
}
