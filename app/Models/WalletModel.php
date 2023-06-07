<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletModel extends Model
{
    use HasFactory;
    protected $table = "artist_wallet";
  
    protected $fillable = [
        'id',
        'artistid',
        'amount',
        'purpose',
        'status',
    ];
}
