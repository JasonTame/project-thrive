<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Cohort extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'start_at' => 'date',
        'end_at' => 'date',
    ];

    public function mentors(): BelongsToMany
    {
        return $this->belongsToMany(Mentor::class);
    }

    public function mentees(): BelongsToMany
    {
        return $this->belongsToMany(Mentee::class);
    }

    public function mentorshipPairs(): HasMany
    {
        return $this->hasMany(CohortMentorship::class);
    }

    public function weeks(): HasMany
    {
        return $this->hasMany(CohortWeek::class);
    }

    public function sessions(): HasManyThrough
    {
        return $this->hasManyThrough(CohortSession::class, CohortWeek::class);
    }
}
