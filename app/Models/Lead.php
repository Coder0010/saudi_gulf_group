<?php

namespace App\Models;

use App\Models\Entity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lead extends Entity
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'name',
        'email',
        'phone',
        'description',
    ];
}
