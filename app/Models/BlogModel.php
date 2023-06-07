<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{
    use HasFactory;
    protected $table = 'blogs';

    protected $fillable = [
        'title',
        'slug',
        'category',
        'featureimage',
        'content',
        'status',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'image'
    ];

    public static function gethomebanners(){
        $response     = false;
        $moduleFields = [
            'title',
            'slug',
            'category',
            'featureimage',
            'content',
            'status',
            'meta_title',
            'meta_keyword',
            'meta_description',
            'image'

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