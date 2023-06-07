<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyModel extends Model
{
    use HasFactory;
    protected $table = 'currencyrate';

    protected $fillable = [
        'Currency_code',
        'currency_rate',
    ];

  

}
