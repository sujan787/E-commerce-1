<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bill extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable  = [
        'userid',
        'products',
        'address',
        'number',
        'total',
        'payment'
       
       
        
    ];
    protected $table="bill";
}
