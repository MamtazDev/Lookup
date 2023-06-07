<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsModel extends Model
{
    use HasFactory;
    protected $table = 'cms';

    protected $fillable = [
            "page_name",
            "title",
            "slug",
            "content",
            "status"
    ];
    public $timestamps = true;


   



}