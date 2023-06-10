<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = 'productmaster';

    protected $fillable = [
        'id',
        'title',
        'slug',
        'featuredimage',
        'categoryid',
        'parentcolid',
        'collectionid',
        'themeid',
        'styleid',
        'techniqueid',
        'colorid',
        'shortdescription',
        'longdescription',
        'saleprice',
        'availability',
        'stockquantity',
        'price',
        'height',
        'width',
        'sizeid',
        'isFeatured',
        'isBestseller',
        'uploadBy',
        'brandid',
        'orientationid',
        'artistid',
        'isactive',
        'isdeleted',
    ];

     protected static function boot()
    {
        parent::boot();

        static::created(function ($ProductCategoryModel) {
            $ProductCategoryModel->slug = $ProductCategoryModel->generateSlug($ProductCategoryModel->title);
            $ProductCategoryModel->save();
        });
    }

    private function generateSlug($title)
    {
        if (static::whereSlug($slug = Str::slug($title))->exists()) {
            $max = static::whereTitle($title)->latest('id')->skip(1)->value('slug');
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

    public function artists()
   {
    return $this->belongsTo('App\Models\ArtistModel', 'artistid');
   }   

   public function category()
   {
    return $this->belongsTo('App\Models\ProductCategoryModel', 'categoryid');
   }    
   public function cattype()
   {
    return $this->hasMany('App\Models\ProductCategoryModel', 'categorytypeid');
   }    

    public static function getFeaturedList($limit = 7)
    {
        $response = false;
        if (empty($response)) {
            $moduleFields = ['id','title',
        'slug',
        'featuredimage',
        'categoryid',
        'themeid',
        'shortdescription',
        'longdescription',
        'saleprice',
        'availability',
        'price',
        'height',
        'width',
        'sizeid',
        'orientationid',
        'artistid',
        'isactive',
        'isdeleted'];
        $imagesFields = ['*'];
    $response    = Self::getFrontRecords($moduleFields, $imagesFields, false)
                ->deleted()
                ->publish()
                ->where('isFeatured','Y')
                ->take($limit)
                ->get();
        }
        return $response;
    }
  public static function getbestsellerList($limit = 7)
    {
        $response = false;
        if (empty($response)) {
            $moduleFields = ['id','title',
        'slug',
        'featuredimage',
        'categoryid',
        'themeid',
        'shortdescription',
        'longdescription',
        'saleprice',
        'availability',
        'price',
        'height',
        'width',
        'sizeid',
        'orientationid',
        'artistid',
        'isactive',
        'isdeleted'];
     $imagesFields = ['*'];
    $response    = Self::getFrontRecords($moduleFields, $imagesFields, false)
                ->deleted()
                ->publish()
                ->where('isBestseller','Y')
                ->take($limit)
                ->get();
        }
        return $response;
    } 
   public static function getSpecialProducts($limit = 10){
    $response = false;
     if (empty($response)) {
        $moduleFields = ['id','title',
        'slug',
        'featuredimage',
        'categoryid',
        'themeid',
        'shortdescription',
        'longdescription',
        'availability',
        'saleprice',
        'price',
        'height',
        'width',
        'sizeid',
        'orientationid',
        'artistid',
        'isactive',
        'isdeleted'];
     $imagesFields = ['*'];
    $response    = Self::getFrontRecords($moduleFields, $imagesFields, false)
                ->deleted()
                ->publish()
                ->orderBy('created_at', 'desc')
                ->take($limit)
                ->get();
        }
        return $response;
   }

   public static function getLatestList($limit = 7){
    $response = false;
     if (empty($response)) {
        $moduleFields = ['id','title',
        'slug',
        'featuredimage',
        'categoryid',
        'themeid',
        'shortdescription',
        'longdescription',
        'saleprice',
        'availability',
        'price',
        'height',
        'width',
        'sizeid',
        'orientationid',
        'artistid',
        'isactive',
        'isdeleted'];
        $imagesFields = ['*'];
     //       $aliasFields = ['id', 'varAlias'];
    $response    = Self::getFrontRecords($moduleFields, $imagesFields, false)
                ->deleted()
                ->publish()
                ->orderBy('created_at', 'desc')
                ->take($limit)
                ->get();
        }
        return $response;
   }

   public static function getProdectsdetailsbyId($id){
        $response     = false;
        $moduleFields = ['id','title',
        'slug',
        'featuredimage',
        'categoryid',
        'themeid',
        'shortdescription',
        'longdescription',
        'price',
        'availability',
        'saleprice',
        'height',
        'brandid',
        'width',
        'sizeid',
        'orientationid',
        'artistid',
        'isactive',
        'isdeleted',

    ];
        

        if (empty($response)) {
            $response = Self::getFrontRecords($moduleFields, false, false)
                ->deleted()
                ->publish()
            ->where('slug',$id)
            ->first();
        }

        return $response;

   }

    public static function getProdectsbyIdfororder($id){
        $response     = false;
        $moduleFields = ['id','title',
        'slug',
        'featuredimage',
        'categoryid',
        'themeid',
        'shortdescription',
        'longdescription',
        'price',
        'availability',
        'saleprice',
        'height',
        'width',
        'sizeid',
        'stockquantity',
        'orientationid',
        'artistid',
        'isactive',
        'isdeleted',
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

      public static function getProdectsPricebyId($id){
        $response     = false;
        $moduleFields = [
            'id',
            'saleprice',
            'price',
            'isactive',
            'isdeleted',
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


   public static function getProdectbyCatagoryID($catid,$filterArr = false){
         $response     = false;
        $moduleFields = ['id','title',
        'slug',
        'featuredimage',
        'categoryid',
        'themeid',
        'styleid',
        'shortdescription',
        'longdescription',
        'availability',
        'saleprice',
        'price',
        'height',
        'width',
        'sizeid',
        'orientationid',
        'artistid',
        'isactive',
        'isdeleted',
    ];
        $imagesFields = ['*'];
        if (empty($response)) {
            $response = Self::getFrontRecords($moduleFields, $imagesFields, false)
            ->where('categoryid',$catid)
            ->filter($filterArr)
            ->deleted()
            ->publish()
            ->paginate(20);
        }

        return $response;
   }

    public static function getAllProdectList($filterArr = false){
         $response     = false;
        $moduleFields = ['id','title',
        'slug',
        'featuredimage',
        'categoryid',
        'themeid',
        'shortdescription',
        'longdescription',
        'saleprice',
        'availability',
        'price',
        'height',
        'width',
        'sizeid',
        'orientationid',
        'artistid',
        'isactive',
        'isdeleted',
    ];
        $imagesFields = ['*'];
        if (empty($response)) {
            $response = Self::getFrontRecords($moduleFields, $imagesFields, false)
            ->filter($filterArr)
            ->deleted()
            ->publish()
            ->paginate(20);
        }

        return $response;
   }

    public function scopeFilter($query, $filterArr = false)
    {
        
        $response = null;
/*        if (!empty($filterArr['search']) && $filterArr['search'] != ' ') {
            $data = $query->where('txtCategories', 'like', '%' . '"' . $filterArr['catFilter'] . '"' . '%');
        }*/
        if (!empty($filterArr['search']) && $filterArr['search'] != ' ') {
            $data = $query->where('title', 'like', "%" . $filterArr['search'] . "%");
        }
        if (!empty($filterArr['Themes']) && $filterArr['Themes'] != ' ') {
            $data = $query->where('themeid',$filterArr['Themes']);
        }
        if (!empty($filterArr['Styles']) && $filterArr['Styles'] != ' ') {
            $data = $query->where('styleid',$filterArr['Styles']);
        }
        if (!empty($filterArr['Techniques']) && $filterArr['Techniques'] != ' ') {
            $data = $query->where('techniqueid',$filterArr['Techniques']);
        }
        if (isset($filterArr['minprice']) && !empty($filterArr['minprice']) && $filterArr['minprice'] != '' && $filterArr['minprice'] != '0') {
            $data = $query->where('price', '>=', $filterArr['minprice']);
        }
        if (isset($filterArr['maxprice']) && !empty($filterArr['maxprice']) && $filterArr['maxprice'] != '' && $filterArr['maxprice'] != '0') {
            $data = $query->where('price', '<=', $filterArr['maxprice']);
        }
        if (!empty($filterArr['orientation']) && $filterArr['orientation'] != ' ') {
            $data = $query->where('orientationid',$filterArr['orientation']);
        }
        if (!empty($filterArr['size']) && $filterArr['size'] != ' ') {
            $data = $query->where('sizeid',$filterArr['size']);
        }
        if (isset($filterArr['minheight']) && !empty($filterArr['minheight']) && $filterArr['minheight'] != '' && $filterArr['minheight'] != '0') {
            $data = $query->where('height', '>=', $filterArr['minheight']);
        }
        if (isset($filterArr['maxheight']) && !empty($filterArr['maxheight']) && $filterArr['maxheight'] != '' && $filterArr['maxheight'] != '0') {
            $data = $query->where('height', '<=', $filterArr['maxheight']);
        }
        if (isset($filterArr['minwidth']) && !empty($filterArr['minwidth']) && $filterArr['minwidth'] != '' && $filterArr['minwidth'] != '0') {
            $data = $query->where('width', '>=', $filterArr['minwidth']);
        }
        if (isset($filterArr['maxwidth']) && !empty($filterArr['maxwidth']) && $filterArr['maxwidth'] != '' && $filterArr['maxwidth'] != '0') {
            $data = $query->where('width', '<=', $filterArr['maxwidth']);
        }
        if (!empty($filterArr['artist_id']) && $filterArr['artist_id'] != ' ') {
            $data = $query->where('artistid',$filterArr['artist_id']);
        }
        if (!empty($filterArr['color']) && $filterArr['color'] != ' ') {
            $color = explode(",",$filterArr['color']);
            foreach($color as $colorid){
                $data = $query->whereRaw("FIND_IN_SET($colorid,colorid)");
            }
            
           //$data = $query->where('colorid',$color);
        }


        if (!empty($query)) {
            $response = $query;
        }
        return $response;
    }

   public static function getProdectsImages($proId){
        $response     = false;
        $response = DB::table('productmedia')
            ->select('*')
            ->where('productid',$proId)
            ->first();

            return $response;
   }

   public static function getrelatedProductsbyArtiest($artistid,$ignoeids = []){
    $response = false;
     if (empty($response)) {
        $moduleFields = ['id','title',
        'slug',
        'featuredimage',
        'categoryid',
        'themeid',
        'shortdescription',
        'longdescription',
        'price',
        'saleprice',
        'availability',
        'height',
        'width',
        'sizeid',
        'orientationid',
        'artistid',
        'isactive',
        'isdeleted'];
         $imagesFields = ['*'];
    $response    = Self::getFrontRecords($moduleFields, $imagesFields, false)
                ->deleted()
                ->publish()
                ->where('artistid',$artistid)
                ->whereNotIn('id',$ignoeids)
                ->orderBy('created_at', 'desc')
                ->get();
        }
        return $response;
   }

    public static function getFrontRecords($moduleFields = false, $imagesFields = false, $authorFilds = false)
    {
        $data     = [];
        $response = false;
        $response = self::select($moduleFields);
        if ($imagesFields != false) {
            $data['images'] = function ($query) use ($imagesFields) {
                $query->select($imagesFields);
            };
        }
        /*if ($authorFilds != false) {
            $data['author'] = function ($query) use ($authorFilds) {
                $query->select($authorFilds);
            };
        }*/

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

    public function images() {
        return $this->belongsTo('App\Models\ProductMediaModel', 'id', 'productid');
    }

    public static function getProdectsReview($id){
        $response = DB::table('reviewsmaster')
            ->select('*')
            ->where('productid',$id)
            ->get();

        return $response;
    }

    public static function getProdectsbrands($id){
        $response = DB::table('brandmaster')
            ->select('*')
            ->where('id',$id)
            ->first();

        return $response;
    }

}
