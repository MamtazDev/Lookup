<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawRequestModel extends Model
{
    use HasFactory;
    protected $table = "withdraw_request";
  
    protected $fillable = [
        'id',
        'artistid',
        'amount',
        'purpose',
        'status',
    ];
}
