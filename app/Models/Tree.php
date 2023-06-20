<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Tree extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'name',
    //     'alias',
    //     'tree',
    //     'leaf_type',
    //     'tree_shape',
    //     'maximum_height',
    //     'drought_tolerance',
    //     'salt_tolerance',
    //     'wind_resistance',
    //     'growth',
    //     'trunk_characteristics',
    //     'common_uses',
    //     'soil_requirements',
    // ];

    protected $guarded =[];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
