<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategoryModel extends Model
{
    use HasFactory;
    protected $table = 'productcategorymaster';

    protected $fillable = [
        'name',
        'image',
        'slug',
        'parentcatid',
        'categorytypeid',
        'isactive',
        'isdeleted',
    ];

     protected static function boot()
    {
        parent::boot();

        static::created(function ($ProductCategoryModel) {
            $ProductCategoryModel->slug = $ProductCategoryModel->generateSlug($ProductCategoryModel->name);
            $ProductCategoryModel->save();
        });
    }

    private function generateSlug($name)
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
    return $this->hasMany('App\Models\ProductCategoryModel', 'parentcatid');
   }    
    public function cattype()
   {
    return $this->hasMany('App\Models\ProductCategoryModel', 'categorytypeid');
   } 
 
   public static function getProductCategorylistforhome(){

        $response     = false;
        $moduleFields = ['name',
        'slug',
        'parentcatid',
        'image',
        'categorytypeid',
        'isactive',
        'isdeleted'
    ];
        ///$aliasFields  = ['id', 'varAlias', 'intFkModuleCode'];
        //$authorFilds  = ['id', 'varTitle', 'intAliasId'];
        if (empty($response)) {
            $response = Self::getFrontRecords($moduleFields, false, false)
            ->deleted()
            ->publish()
            ->take(6)
            ->get();
        }

        return $response;

   }

   public static function getProductCategorylist(){

        $response     = false;
        $moduleFields = [
        'id',
        'name',
        'slug',
        'parentcatid',
        'categorytypeid',
        'isactive',
        'isdeleted'
    ];
        if (empty($response)) {
            $response = Self::getFrontRecords($moduleFields, false, false)
            ->deleted()
            ->publish()
            ->get();
        }

        return $response;

   }

    public static function getParentProductCategorylist(){

        $response     = false;
        $moduleFields = [
        'id',
        'name',
        'slug',
        'parentcatid',
        'categorytypeid',
        'isactive',
        'isdeleted'
    ];
        if (empty($response)) {
            $response = Self::getFrontRecords($moduleFields, false, false)
            ->deleted()
            ->publish()
            ->whereNull('parentcatid')
            ->whereNull('categorytypeid')
            ->get();
        }

        return $response;

   }

       public static function getParentProductCategorylistformenu($limit = 6){

        $response     = false;
        $moduleFields = [
        'id',
        'name',
        'slug',
        'parentcatid',
        'categorytypeid',
        'isactive',
        'isdeleted'
    ];
        if (empty($response)) {
            $response = Self::getFrontRecords($moduleFields, false, false)
            ->deleted()
            ->publish()
            ->whereNull('parentcatid')
            ->whereNull('categorytypeid')
            ->take($limit)
            ->get();
        }

        return $response;

   }

   public static function getProductCategorylistByIds($catagoryArr = []){
        $response     = false;
        $moduleFields = [
        'id',
        'name',
        'slug',
        'parentcatid',
        'categorytypeid',
        'isactive',
        'isdeleted'
    ];
        if (empty($response)) {
            $response = Self::getFrontRecords($moduleFields, false, false)
            ->deleted()
            ->publish()
            ->whereIn('id',$catagoryArr)
            ->get();
        }

        return $response;
   }

  public static function getProductCategoryByIds($id){
        $response     = false;
        $moduleFields = [
        'id',
        'name',
        'slug',
        'parentcatid',
        'categorytypeid',
        'isactive',
        'isdeleted'
    ];
        if (empty($response)) {
            $response = Self::getFrontRecords($moduleFields, false, false)
            ->deleted()
            ->publish()
            ->where('id',$id)
            ->first();
        }

        return $response;
   }

    public static function getProductChildCategorylist($catagoryid=false,$typeid=false,$limit=3){
        $response     = false;
        $moduleFields = [
        'id',
        'name',
        'slug',
        'parentcatid',
        'categorytypeid',
        'isactive',
        'isdeleted'
    ];
        if (empty($response)) {
            $response = Self::getFrontRecords($moduleFields, false, false)
            ->deleted()
            ->publish()
            ->where([['parentcatid',$catagoryid],['categorytypeid',$typeid]])
            ->take($limit)
            ->get();
        }

        return $response;
   }

   public static function getProductCategoryThemebycatid($paranetcat){
    $response     = false;
        $moduleFields = [
        'id',
        'name',
        'slug',
        'parentcatid',
        'categorytypeid',
        'isactive',
        'isdeleted'
    ];
        if (empty($response)) {
            $response = Self::getFrontRecords($moduleFields, false, false)
            ->deleted()
            ->publish()
            ->where([['parentcatid',$paranetcat]])
            ->get();
        }

        return $response;
   }

   public static function getCatagoryidByslug($slug){
        $response     = false;
        $moduleFields = ['id','name','slug'
        ];
        if (empty($response)) {
            $response = Self::getFrontRecords($moduleFields, false, false)
           ->deleted()
           ->publish()
           ->where('slug',$slug)
           ->first();
        }

        return $response;
   } 

    public static function getFrontRecords($ProductCategoryFields = false, $aliasFields = false, $authorFilds = false)
    {
        $data     = [];
        $response = false;
        $response = self::select($ProductCategoryFields);
        if (count($data) > 0) {
            $response = $response->with($data);
        }
        return $response;
    }

        public function scopeDeleted($query)
    {
        return $query->where(['isdeleted' => '0']);
    }

        public function scopePublish($query)
    {
        return $query->where(['isactive' => '1']);
    }
}
