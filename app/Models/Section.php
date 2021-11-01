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
        'data'
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
            $entity->attachItems('welcome-section', 'services');
            switch ($entity->type) {
                case 'story-page-one-section':
                    MediaLibrary::storeOrUpdate($entity, "video");
                    break;
                case 'story-page-four-section':
                    MediaLibrary::storeOrUpdate($entity, "pdf");
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
        if($sectionType === 'welcome-section')
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
