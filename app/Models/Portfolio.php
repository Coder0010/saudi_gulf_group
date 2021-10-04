<?php

namespace App\Models;

use App\Models\Entity;
use App\Traits\MediaTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Portfolio extends Entity implements HasMedia
{
    use MediaTrait, InteractsWithMedia, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];
}
