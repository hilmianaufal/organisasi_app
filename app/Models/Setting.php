<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'site_name',
        'site_description',
        'vision',
        'mission',
        'email',
        'phone',
        'address',
        'instagram',
        'youtube',
        'tiktok',
        'logo',
    ];
}