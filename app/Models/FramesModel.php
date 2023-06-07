<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FramesModel extends Model
{
    use HasFactory;

    protected $table = 'framemaster';

    protected $fillable = [
        'id',
        'name',
        'image',
        'isactive',
        'isdeleted',
    ];

    public static function getProdectsFrameByid($id = false)
    {
        $response = false;
        if (empty($response)) {
            $moduleFields = ["*"];
             $response = Self::getFrontRecords($moduleFields,false)
                ->where('id',$id)
                ->first();
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



}
