<?php

namespace App\Models;

use App\Models\Entity;
use App\Traits\MediaTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;

class Package extends Entity implements HasMedia
{
    use MediaTrait, InteractsWithMedia
    // , HasTranslations
    ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'name',
        'sub_name',
        'description',
        'sub_description',
        'is_enabled',
        'data',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'data' => 'array',
    ];

    // public $translatable = ['name', 'description', 'sub_description'];

}
