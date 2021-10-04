<?php

namespace App\Models;

use DB;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

abstract class Entity extends Model
{
    use SoftDeletes, HasFactory;

    protected $perPage = 15;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * This method for returning data with relations
     */
    public function entityFetchData(array $relations = [])
    {
        return $this->with($relations);
    }
}
