<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
         'user_id',
         'name',
        'localization',
        'direction',
        'direction_time',
        'min_budget',
        'max_budget',
        'min_space',
        'max_space',
        'rooms'
    ];
}
