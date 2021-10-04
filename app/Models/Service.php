<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Portfolio;
use App\Traits\MediaTrait;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Model implements HasMedia
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
