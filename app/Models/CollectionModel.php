<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class CollectionModel extends Model
{
    use HasFactory;
    protected $table = 'collectionmaster';

    protected $fillable = [
        'name',
        'image',
        'slug',
        'parentcolid',
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
    return $this->hasMany('App\Models\CollectionModel', 'parentcolid');
   }  


    public static function getSubCollection($id){
        $response = DB::table('collectionmaster')
            ->select('*')
            ->where('parentcolid',$id)
            ->where('isactive', '=', 1)
            ->get();

        return $response;
    }

    public static function getProductsByCollection($id){
        $response = DB::table('productmaster')
            ->select('*')
            ->where('collectionid',$id)
            ->where('isactive', '=', 1)
            ->get();

        return $response;
    }

   
    
}
