<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'section_id',
        'itemable_type',
        'itemable_id',
    ];

    /**
     * Get all of the owning itemable models.
     */
    public function itemable()
    {
        return $this->morphTo();
    }
}
