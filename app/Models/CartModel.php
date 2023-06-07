<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class CartModel extends Model
{
    use HasFactory;
    protected $table = 'cartmaster';

    protected $fillable = [
        'id',
        'customer_id',
        'productid',
        'quantity',
        'created_at',
        'frame_id',
        'updated_at'
    ];

    public static function getcartbyuserid($userid){
        $response     = false;
        $moduleFields = [
            'id',
            'customer_id',
            'productid',
            'frame_id',
            'quantity'
            ];
            $productFields = ['*'
            ];
            $frameFields = ['*'
            ];
            
        if (empty($response)) {
            $response = Self::getFrontRecords($moduleFields,$productFields,$frameFields)
            ->where('customer_id',$userid)
            ->orderBy('created_at', 'desc')
            ->get();
        }

        return $response;
    }

public static function getcartbyuseridformanu($userid){
        $response     = false;
        $moduleFields = [
            'id',
            'customer_id',
            'productid',
            'frame_id',
            'quantity'
            ];
            $productFields = ['*'
            ];
            
        if (empty($response)) {
            $response = Self::getFrontRecords($moduleFields,$productFields)
            ->where('customer_id',$userid)
            ->orderBy('created_at','DESC')
            ->take(2)
            ->get();
        }

        return $response;
    } 

    public static function getFrontRecords($moduleFields = false,$productFields = false,$frameFields=false)
    {

        $data     = [];
        $response = false;

        if ($productFields != false) {
            $data['products'] = function ($query) use ($productFields) {
                $query->select($productFields);
            };
        }

        if ($frameFields != false) {
            $data['frame'] = function ($query) use ($frameFields) {
                $query->select($frameFields);
            };
        }


        $response = self::select($moduleFields)->with($data);
        return $response;
    }

    public function products() {
        return $this->belongsTo('App\Models\ProductModel', 'productid', 'id');
    }
    
    public function frame() {
        return $this->belongsTo('App\Models\ProductFrameModel', 'frame_id', 'id');
    }


}
