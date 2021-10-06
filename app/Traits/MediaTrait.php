<?php

namespace App\Traits;

trait MediaTrait
{
    /**
     * getModelMedia
     */
    public function getModelMedia(string $type = "image") : string
    {
        $mediaCollectionName = class_basename($this). "-{$type}-Collection";
        if (!empty($this->getMedia($mediaCollectionName)->first())) {
            return $this->getMedia($mediaCollectionName)->first()->getUrl();
        }
        return "";
    }

    /**
     * Determine if the entity has image.
     *
     * @return bool
     */
    public function getImageAttribute()
    {
        if($this->getModelMedia()){
            return $this->getModelMedia();
        }else{
            return asset('frontend/images/default.png');
        }
    }
}
