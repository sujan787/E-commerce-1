<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact_info extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable  = [
        'name',
        'email',
        'massage'
      
       
        
    ];
    protected $table="contact_info";
}
