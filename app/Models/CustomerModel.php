<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    use HasFactory;

    protected $table = 'customermaster';

    protected $fillable = [
        'fullname',
        'email',
        'password',
        'profileimage',
        'phonecode',
        'gender',
        'phone',
        'address',
        'city',
        'state',
        'country',
        'isactive',
        'isdeleted',
    ];
}
