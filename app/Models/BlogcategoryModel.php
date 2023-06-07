<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogcategoryModel extends Model
{
    use HasFactory;
    protected $table = 'blog_categories';

    protected $fillable = [
        'id',
        'name',
        'status',
    ];

    public static function gethomebanners(){
        $response     = false;
        $moduleFields = [
            'id',
            'name',
            'status',
            ];
        if (empty($response)) {
            $response = Self::getFrontRecords($moduleFields)
            //->deleted()
            ->publish()
            ->get();
        }

        return $response;
    }

    public static function getFrontRecords($moduleFields = false)
    {
        $data     = [];
        $response = false;
        $response = self::select($moduleFields);
        if (count($data) > 0) {
            $response = $response->with($data);
        }
        return $response;
    }

    public function scopePublish($query)
    {
        return $query->where(['status' => '1']);
    }

    public function scopeDeleted($query)
    {
        return $query->where(['isdeleted' => '0']);
    }



}