<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFrameModel extends Model
{
    use HasFactory;
    protected $table = 'productframes';

    protected $fillable = [
        'productid',
        'frameid',
        'frameprice',
    ]; 



   public static function getProdectsFrame($productsid = false)
    {
        $response = false;
        if (empty($response)) {
            $moduleFields = ["*"];
            $FrameFields = ["*"];
   			 $response = Self::getFrontRecords($moduleFields,$FrameFields)
                ->where('productid',$productsid)
                ->get();
        }
        return $response;
    }

    public static function getProdectsFrameByid($id = false)
    {
        $response = false;
        if (empty($response)) {
            $moduleFields = ["*"];
            //$FrameFields = ["*"];
             $response = Self::getFrontRecords($moduleFields,false)
                ->where('id',$id)
                ->first();
        }
        return $response;
    }

    public static function getProdectsFrameFororderByid($id = false)
    {
        $response = false;
        if (empty($response)) {
            $moduleFields = ["*"];
            $FrameFields = ["*"];
             $response = Self::getFrontRecords($moduleFields,$FrameFields)
                ->where('id',$id)
                ->first();
        }
        return $response;
    }

    public static function getFrontRecords($moduleFields = false,$FrameFields=false)
    {
        $data     = [];
        $response = false;
        $response = self::select($moduleFields);
        if ($FrameFields != false) {
            $data['frame'] = function ($query) use ($FrameFields) {
                $query->select($FrameFields);
            };
        }
        if (count($data) > 0) {
            $response = $response->with($data);
        }
        return $response;
    }

    public function frame() {
        return $this->belongsTo('App\Models\FramesModel', 'frameid', 'id');
    }
}
