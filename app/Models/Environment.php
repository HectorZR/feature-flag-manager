<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Environment extends Model
{
    use HasFactory;

    public function featureFlags()
    {
        return $this->hasMany(FeatureFlag::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
