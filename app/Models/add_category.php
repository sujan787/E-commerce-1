<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class add_category extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable  = [
        'name',
        'category_name',
        'image'
       
       
        
    ];
    protected $table="add_category";
}
