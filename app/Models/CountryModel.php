<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryModel extends Model
{
    use HasFactory;
    protected $table = "countrymaster";
  
    protected $fillable = [
        'id',
        'countryname',
        'flagicon',
        'phonecode',
        'isactive',
        'isdeleted',
    ];


    public static function getCountryidByflagicon($icon)
    {
        $response = false;
        if (empty($response)) {
            $moduleFields = [ 'id',
        'isactive',
        'isdeleted'];
    $response = Self::getFrontRecords($moduleFields)
                ->deleted()
                ->publish()
                ->where('flagicon',$icon)
                ->first();
        }
        return $response;
    }

    public static function getCountrybyId($id)
    {
        $response = false;
        if (empty($response)) {
            $moduleFields = [ 'id',
            'countryname',
        'isactive',
        'isdeleted'];
    $response = Self::getFrontRecords($moduleFields)
                ->deleted()
                ->publish()
                ->where('id',$id)
                ->first();
        }
        return $response;
    } 

    public static function getCountryList()
    {
        $response = false;
        if (empty($response)) {
            $moduleFields = [ 'id',
            'countryname',
        'isactive',
        'isdeleted'];
    $response = Self::getFrontRecords($moduleFields)
                ->deleted()
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
        return $query->where(['isactive' => '1']);
    }

    public function scopeDeleted($query)
    {
        return $query->where(['isdeleted' => '0']);
    }

    
}
