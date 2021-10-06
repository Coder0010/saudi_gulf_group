<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Entity;
use App\Models\Portfolio;
use App\Traits\MediaTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Entity implements HasMedia
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

    /**
     * clients relation.
     *
     * @return BelongsToMany
     */
    public function clients() : BelongsToMany
    {
        return $this->belongsToMany(Client::class, 'service_client', 'service_id', 'client_id')
                    ->withTimestamps()
                    ;
    }

    /**
     * portfolios relation.
     *
     * @return BelongsToMany
     */
    public function portfolios() : BelongsToMany
    {
        return $this->belongsToMany(Portfolio::class, 'service_portfolio', 'service_id', 'portfolio_id')
                    ->withTimestamps()
                    ;
    }
}
