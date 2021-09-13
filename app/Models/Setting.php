<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'site_name',
        'site_url',
        'website_logo',
		'website_fabicon',
        'website_mobilenumber',
        'website_email',
        'website_address',
        'fb_link',
        'twitter_link',
        'linkdin_link',
        'insta_link',
        'pintest_link',
        'whatsapp_number',
        'website_keywords',
        'website_descriptions',

    ];

}
