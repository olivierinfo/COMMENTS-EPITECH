<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'adress',
        'postal_code',
        'city', 
        'phone', 
        'email',
        'logo',
        'cover_picture',
        'galery_pictures',
        'category_id',
    ];
}