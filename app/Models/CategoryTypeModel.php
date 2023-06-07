<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTypeModel extends Model
{
    use HasFactory;
    protected $table = 'productcategorytype';

    protected $fillable = [
        'name',
        'slug',
        'categoryid',
        'isactive',
        'isdeleted',
    ];

         protected static function boot()
    {
        parent::boot();

        static::saving(function ($CategoryTypeModel) {
            $CategoryTypeModel->slug = $CategoryTypeModel->generateSlug($CategoryTypeModel->name);
          
        });
    }

    public function generateSlug($name)
    {
        if (static::whereSlug($slug = Str::slug($name))->exists()) {
            $max = static::whereName($name)->latest('id')->skip(1)->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }

        return $slug;
    }

    public function children()
   {
    return $this->hasMany('App\Models\CategoryTypeModel', 'categoryid');
   } 
   public function cattype()
   {
    return $this->hasMany('App\Models\CategoryTypeModel', 'id');
   } 

   public static function getCategoryTypeList($catArr = []){
     $response     = false;
        $moduleFields = ['id','name',
        'slug',
        'categoryid',
        'isactive',
        'isdeleted',
    ];
        
        if (empty($response)) {
            $response = Self::getFrontRecords($moduleFields, false, false)
            ->deleted()
            ->publish()
            ->whereIn('categoryid', $catArr)
            ->get();
        }

        return $response;
   }

 public static function getCategoryTypeBycatid($catid){
     $response     = false;
        $moduleFields = ['id','name',
        'slug',
        'categoryid',
        'isactive',
        'isdeleted',
    ];
        
        if (empty($response)) {
            $response = Self::getFrontRecords($moduleFields, false, false)
            ->deleted()
            ->publish()
            ->where('categoryid', $catid)
            ->get();
        }

        return $response;
   }

   


    public static function getFrontRecords($moduleFields = false, $aliasFields = false, $authorFilds = false)
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
