<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class ArtistModel extends Model
{
    use HasFactory;
    protected $table = 'artistmaster';

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'profileimage',
        'phone',
        'slug',
        'commission',
        'countryid',
        'preferred_language',
        'isfulltimeartist',
        'isrepresentedgallary',
        'onlineportfolio',
        'experience',
        'bio',
        'CoverImage',
        'BornYear',
        'updatedcvlink',
        'categoryid',
        'mediums',
        'sellingpricerange',
        'soldartworksinlastyear',
        'artworksproduceinmonth',
        'questions_ans',
        'media',
        'isverified',
        'isactive',
        'roleid',
        'isdeleted',
    ];

         protected static function boot()
    {
        parent::boot();

        static::saving(function ($ArtistModel) {
            $ArtistModel->slug = $ArtistModel->generateSlug($ArtistModel->firstname);
          
        });
    }

     public function generateSlug($name)
    {
        if (static::whereSlug($slug = Str::slug($name))->exists()) {
            $max = static::wherefirstname($name)->latest('id')->skip(1)->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }

        return $slug;
    }



    public static function getArtistForhomepage()
    {
        $response = false;
        if (empty($response)) {
            $moduleFields = ['id','firstname',
        'lastname',
        'email',
        'password',
        'profileimage',
        'phone',
        'countryid',
        'preferred_language',
        'isfulltimeartist',
        'isrepresentedgallary',
        'onlineportfolio',
        'experience',
        'bio',
        'updatedcvlink',
        'categoryid',
        'mediums',
        'sellingpricerange',
        'soldartworksinlastyear',
        'artworksproduceinmonth',
        'questions_ans',
        'media',
        'isverified',
        'isactive',
        'isdeleted'];
    $response = Self::getFrontRecords($moduleFields,false)
                ->deleted()
                ->publish()
                ->Isverified()
                ->get();
        }
        return $response;
    }

    public static function getArtistList($filterArr)
    {
        $response = false;
        if (empty($response)) {
            $moduleFields = ['id','firstname','slug',
        'lastname',
        'email',
        'password',
        'profileimage',
        'phone',
        'countryid',
        'preferred_language',
        'isfulltimeartist',
        'isrepresentedgallary',
        'onlineportfolio',
        'experience',
        'bio',
        'updatedcvlink',
        'categoryid',
        'mediums',
        'sellingpricerange',
        'soldartworksinlastyear',
        'artworksproduceinmonth',
        'questions_ans',
        'media',
        'isverified',
        'isactive',
        'isdeleted'];
    $contryFields = ['id', 'countryname'];    
    $query = Self::getFrontRecords($moduleFields,$contryFields)
                ->deleted()
                ->publish()
                ->Isverified();
                if (!empty($filterArr['latter']) && $filterArr['latter'] != 'all') {
                    $query->where('firstname', 'LIKE', $filterArr['latter'].'%');
                 }
                if (isset($filterArr['cat']) && !empty($filterArr['cat'])) {
                    $cat = $filterArr['cat'];
                    $query->whereRaw("FIND_IN_SET('$cat',mediums)");
                 } 
                 if (isset($filterArr['country']) && !empty($filterArr['country'])) {
                    $query->where('countryid',$filterArr['country']);
                 } 
                 if (isset($filterArr['artistsearch']) && !empty($filterArr['artistsearch'])) {
                    $query->where('firstname', 'LIKE', $filterArr['artistsearch'].'%')->orwhere('lastname', 'LIKE', $filterArr['artistsearch'].'%');
                 } 
                 $response = $query->paginate(20);
        }
        return $response;
    }

    public static function getArtistListbyLatter($filterArr){
       
        $response = false;
        if (empty($response)) {
            $moduleFields = ['id','firstname','slug',
        'lastname',
        'email',
        'profileimage',
        'phone',
        'countryid',
        'preferred_language',
        'isfulltimeartist',
        'isrepresentedgallary',
        'onlineportfolio',
        'experience',
        'bio',
        'updatedcvlink',
        'categoryid',
        'mediums',
        'sellingpricerange',
        'soldartworksinlastyear',
        'artworksproduceinmonth',
        'questions_ans',
        'media',
        'isverified',
        'isactive',
        'isdeleted'];
    $contryFields = ['id', 'countryname'];    
    $query = Self::getFrontRecords($moduleFields,$contryFields)
                ->deleted()
                ->publish()
                ->Isverified();
                if (!empty($filterArr['latter']) && $filterArr['latter'] != 'all') {
                    $query->where('firstname', 'LIKE', $filterArr['latter'].'%');
                 }
                if (isset($filterArr['cat']) && !empty($filterArr['cat'])) {
                    $cat = $filterArr['cat'];
                    $query->whereRaw("FIND_IN_SET('$cat',mediums)");
                 } 
                 if (isset($filterArr['country']) && !empty($filterArr['country'])) {
                    $query->where('countryid',$filterArr['country']);
                 } 
                 if (isset($filterArr['artistsearch']) && !empty($filterArr['artistsearch'])) {
                    $query->where('firstname', 'LIKE', $filterArr['artistsearch'].'%')->orwhere('lastname', 'LIKE', $filterArr['artistsearch'].'%');
                 } 

                 
                
               $response = $query->paginate(20);
        }
        return $response;
    }

    public static function getLetestArtistformenu()
    {
        $response = false;
        if (empty($response)) {
        $moduleFields = ['id','firstname',
        'lastname',
        'slug',
        'profileimage',
        'isverified',
        'isactive',
        'isdeleted'];
    $response = Self::getFrontRecords($moduleFields,false)
                ->deleted()
                ->publish()
                ->Isverified()
                ->orderBy('created_at', 'DESC')
                ->take(4)
                ->get();
        }
        return $response;
    }

    public static function getArtistdetilesbyId($id)
    {
        $response = false;
        if (empty($response)) {
        $moduleFields = ['id','slug','firstname',
        'lastname',
        'profileimage',
        'countryid',
        'mediums',
        'bio',
        'isverified',
        'isactive',
        'isdeleted'];
    $response = Self::getFrontRecords($moduleFields,false)
                ->deleted()
                ->publish()
                ->Isverified()
                ->where('id',$id)
                ->first();
        }
        return $response;
    }
        public static function getArtistDatabyslug($slug)
    {
        $response = false;
        if (empty($response)) {
        $moduleFields = ['*'];
    $response = Self::getFrontRecords($moduleFields,false)
                ->deleted()
                ->publish()
                ->Isverified()
                ->where('slug',$slug)
                ->first();
        }
        return $response;
    }
    

    public static function getArtistdetilesbyIdfororder($id)
    {
        $response = false;
        if (empty($response)) {
        $moduleFields = ['id','firstname',
        'lastname',
        'commission',
        'isverified',
        'isactive',
        'isdeleted'];
    $response = Self::getFrontRecords($moduleFields,false)
                ->deleted()
                ->publish()
                ->Isverified()
                ->where('id',$id)
                ->first();
        }
        return $response;
    }  
    

        public static function getFrontRecords($moduleFields = false,$contryFields = false)
    {
        $data     = [];
        $response = false;

        if ($contryFields != false) {
            $data['country'] = function ($query) use ($contryFields) {
                $query->select($contryFields);
            };
        }

        $response = self::select($moduleFields)->with($data);
        return $response;
    }

    public function scopePublish($query)
    {
        return $query->where(['isactive' => '1']);
    }

    public function scopeIsverified($query)
    {
        return $query->where(['isverified' => 'Verified']);
    }

    public function scopeDeleted($query)
    {
        return $query->where(['isdeleted' => '0']);
    }

    public function country() {
        return $this->belongsTo('App\Models\CountryModel', 'countryid', 'id');
    }

    
}