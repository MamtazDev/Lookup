<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobleSeo extends Model
{
    use HasFactory;
    protected $table = "globle_seo";
    protected $fillable = ['seo', 'status', 'extra1', 'extra2', 'extra3'];
}
