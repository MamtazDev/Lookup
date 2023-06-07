<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class OrderItemsModel extends Model
{
    use HasFactory;
    protected $table = 'orderitemsmaster';

    protected $fillable = [
        'id',
        'order_id',
        'product_id',
        'product_price',
        'product_size',
        'quantity',
        'created_at',
        'updated_at'
    ];


    public static function getorderitemsbyartistid($artistid){
        $orderitems = DB::table('orderitemsmaster')->select('*')->where('artist_id',$artistid)
            ->orderBy('created_at', 'desc')
            ->get(); 

            return $orderitems;
    }


}
