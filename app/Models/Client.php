<?php

namespace App\Models;

use Cache;
use Redis;
use App\Models\Entity;
use App\Traits\MediaTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Client extends Entity implements HasMedia
{
    use MediaTrait, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['image'];

    // /**
    //  * Bootstrap the model and its traits.
    //  *
    //  * @return void
    //  */
    // protected static function boot()
    // {
    //     parent::boot();
    //     static::saved(function ($entity) {
    //         \Artisan::call('log:clear');
    //         logger('entity:- '. $entity);
    //         logger('new Clients ');
    //         $cachedClients = Cache::store('redis')->get('clients-all');
    //         $newClients = collect($cachedClients)->toArray();
    //         array_unshift($newClients, $entity);
    //         Cache::store('redis')->put('clients-all', $newClients);
    //         logger($newClients);
    //     });
    // }

}
