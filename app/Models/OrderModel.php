<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class OrderModel extends Model
{
    use HasFactory;
    protected $table = 'ordermaster';

    protected $fillable = [
        'id',
        'order_id',
        'order_status',
        'order_amount',
        'order_currancy',
        'shipping_address',
        'customer_id',
        'paypal_status',
        'paypal_email',
        'paypal_transectionid',
        'paypal_respose',
        'delivery_date',
        'created_at',
        'updated_at'
    ];


    public static function getorderitemsbyorderid($orderid){
        $orderitems = DB::table('orderitemsmaster')->select('*')->where('order_id',$orderid)
            ->orderBy('created_at', 'desc')
            ->get(); 

            return $orderitems;
    }


}
