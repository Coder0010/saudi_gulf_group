<?php

namespace App\Models;

use App\Models\Entity;
use App\Traits\MediaTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;
class Portfolio extends Entity implements HasMedia
{
    use MediaTrait, InteractsWithMedia, HasFactory, HasTranslations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'sub_name',
        'sub_description',
        'category',
        'location',
    ];

    public $translatable = ['name', 'description'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['image'];
}
