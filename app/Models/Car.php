<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Car
 *
 * @property $id
 * @property $created_at
 * @property $updated_at
 * @property $brand
 * @property $model
 * @property $year
 * @property $color
 * @property $price
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Car extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['brand', 'model', 'year', 'color', 'price'];


}
