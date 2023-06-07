<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTechniqueModel extends Model
{
    use HasFactory;

    protected $table = 'producttechniques';

    protected $fillable = [
        'productid',
        'techniqueid',  
    ];
}
