<?php

namespace App\Libraries;

use DB;
use Log;
use Str;
use Exception;

class MediaLibrary
{
    /**
     * Upload or Move Media
     * @param  string $entity
     * @param  string $type
     * @return void
     */
    public function storeOrUpdate(object $entity, string $requestName) : void
    {
        if (is_object($entity) && request()->file($requestName)) {
            $mediaCollectionName = class_basename($entity) . "-{$requestName}-Collection";
            if(request()->isMethod("patch")){
                $entity->clearMediaCollection($mediaCollectionName);
            }
            $entity->addMediaFromRequest($requestName)->toMediaCollection($mediaCollectionName);
        }
    }

    /**
     * delete all media of current entity
     * @param  string $entity
     * @param  string $type
     * @return void
     */
    public function delete(object $entity, string $type) : void
    {
        if (is_object($entity)) {
            $mediaCollectionName = class_basename($entity) . "-{$type}-Collection";
            $entity->clearMediaCollection($mediaCollectionName);
        }
    }

}
