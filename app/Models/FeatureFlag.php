<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FeatureFlag extends Model
{
    use HasFactory;

    protected $fillable = [
        'version',
        'is_active',
        'release_date'
    ];

    public function environment()
    {
        return $this->belongsTo(Environment::class);
    }

    public function validateUniqueness(int $minimumAccepted)
    {
        $duplicateFlags = DB::table('feature_flags')
            ->where('environment_id', $this->environment_id)
            ->where('version', $this->version)
            ->groupBy('version', 'id')
            ->havingRaw('COUNT(*) > ?', [$minimumAccepted])
            ->get();

        if (!$duplicateFlags->isEmpty()) {
            throw new \Exception('Feature flag version must be unique within the environment.');
        }
    }

    public function validateUniquenessOnStore()
    {
        $this->validateUniqueness(0);
    }

    public function validateUniquenessOnUpdate()
    {
        $this->validateUniqueness(1);
    }

    protected function isActive(): Attribute
    {
        return Attribute::make(
            set: function (string $value) {
                if ($value === 'on') {
                    return true;
                }

                return false;
            }
        );
    }
}
