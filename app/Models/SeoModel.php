<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoModel extends Model
{
    use HasFactory;
    
    protected $table = "seo";
    protected $fillable = ["id","page","title","description","keywords","author"];
}
