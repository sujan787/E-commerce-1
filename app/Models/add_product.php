<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class add_product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable  = [
        'name',
        'price',
        'pre_price',
        'description',
        'category',
        'font_image',
        'back_image',
        'offer',
        'offer_price',
        'offer_time'
        

        
    ];
    protected $table="add_product";
}
