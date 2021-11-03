<?php

namespace App\Models;

use App\Models\Item;
use App\Models\Entity;
use App\Traits\MediaTrait;
use Spatie\MediaLibrary\HasMedia;
use Facades\App\Libraries\MediaLibrary;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Section extends Entity implements HasMedia
{
    use MediaTrait, InteractsWithMedia;

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

    /**
     * Bootstrap the model and its traits.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::saved(function ($entity) {
            switch ($entity->type) {
                case 'slider-section':
                    $entity->attachItems('slider-section', 'services');
                    MediaLibrary::storeOrUpdate($entity, "image");
                    break;
                case 'story-section':
                    MediaLibrary::storeOrUpdate($entity, "video");
                    break;
                case 'family-section':
                    MediaLibrary::storeOrUpdate($entity, "video");
                    break;
                case 'story-page-one-section':
                    MediaLibrary::storeOrUpdate($entity, "video");
                    break;
                case 'story-page-four-section':
                    MediaLibrary::storeOrUpdate($entity, "pdf");
                break;
                case 'integrated-section':
                    for ($i=0; $i <= 2; $i++) {
                        MediaLibrary::storeOrUpdate($entity, "integrated_card_image_{$i}");
                    }
                break;
            }
        });
    }

    /**
     * Get all of the services for the Section
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function services(): HasMany
    {
        return $this->hasMany(Item::class)->where('itemable_type', 'App\Models\Service');
    }

    /**
     *
     *
     */
    public function attachItems($sectionType, $itemType)
    {
        if($sectionType === 'slider-section')
        $entity = $this;
        switch ($itemType) {
            case 'services':
                $this->services()->delete();
                collect(request("services"))->each(function($service) use ($entity){
                    $alreadyExisit = $entity->services()->where(['itemable_id' => $service,])->first();
                    if(!$alreadyExisit){
                        $entity->services()->create([
                            'section_id'    => $entity->id,
                            'itemable_type' => 'App\Models\Service',
                            'itemable_id'   => $service
                        ]);
                    }
                });
                break;
            default:
                # code...
                break;
        }
    }
}
