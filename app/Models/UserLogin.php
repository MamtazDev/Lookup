<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use DB;


class UserLogin extends Authenticatable
{
    use HasRoles;
    use HasApiTokens, HasFactory, Notifiable;
    

    protected $table = 'customermaster';
    protected $fillable = [
        'fullname',
        'email',
        'password',
        'phonecode',
        'phone',
        'VarAddToFavorites',
        'remember_token',
        'verifytokan',
        'isactive',
        'isdeleted',
    ];


    public static function checkemailisvalidornot($email){

        $response     = false;
        $moduleFields = ['id'
        ];
        if (empty($response)) {
            $response = self::select($moduleFields)->where('email',$email)->first();
        }
        return $response;

    }

    public static function Checktokan($tokandata = []){
        $response     = false;
        $moduleFields = ['id','fullname',
        'email',
        'password',
        'phonecode',
        'phone',
        'remember_token',
        'verifytokan',
        'isactive',
        'isdeleted',
        ];
        if (empty($response)) {
            $response = self::select($moduleFields)->where('id',$tokandata['1'])->deleted()->Checkvalidtokan($tokandata['0'])->first();
        }
        return $response;
    }

    public static function CheckUserActive($id){
        $response     = false;
        $moduleFields = ['id','fullname',
        'email',
        'password',
        'phonecode',
        'phone',
        'remember_token',
        'verifytokan',
        'isactive',
        'isdeleted',
        ];
        if (empty($response)) {
            $response = self::select($moduleFields)->where('id',$id)->deleted()->publish()->first();
        }
        return $response;
    }

    public static function getUserwishlistbyuserId($id){
       $response = DB::table('wishlistmaster')
            ->join('productmaster', 'wishlistmaster.productid', '=', 'productmaster.id')
            ->select('wishlistmaster.*', 'productmaster.*')
            ->where('wishlistmaster.customer_id',$id)
            ->get();
        return $response;
    }

    public static function getUserwishlistDatabyuserId($id){
       $response = DB::table('wishlistmaster')
            ->select('*')
            ->where('customer_id',$id)
            ->get();
        return $response;
    }

    public function scopeCheckvalidtokan($query, $tokan)
    {
        return $query->where(['verifytokan' => $tokan]);
    }

    public function scopePublish($query)
    {
        return $query->where(['isactive' => '1']);
    }

    public function scopeDeleted($query)
    {
        return $query->where(['isdeleted' => '0']);
    }

  
}