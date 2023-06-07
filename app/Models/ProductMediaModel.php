<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMediaModel extends Model
{
    use HasFactory;
    protected $table = 'productmedia';

    protected $fillable = [
        'productid',
        'mediaurl',
        'filetype',
        'mediatype',
     ];


    public static function getimagesbyProductId($id){
        
    } 
  
}
