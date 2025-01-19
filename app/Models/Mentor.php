<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mentor extends Model
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
        'is_approved' => 'boolean',
        'user_id' => 'integer',
    ];

    public function scopeAvailableForCohort($query, $cohortId)
    {
        return $query->whereNotExists(function ($query) use ($cohortId) {
            $query->from('cohort_mentorships')
                ->whereColumn('cohort_mentorships.mentor_id', 'mentors.id')
                ->where('cohort_mentorships.cohort_id', $cohortId);
        });
    }

    public function scopeIsApproved($query)
    {
        return $query->where('is_approved', true);
    }

    public function cohorts(): BelongsToMany
    {
        return $this->belongsToMany(Cohort::class)->withTimestamps();
    }

    public function mentees(): BelongsToMany
    {
        return $this->belongsToMany(Mentee::class, 'cohort_mentorships')
            ->withPivot('cohort_id')
            ->using(CohortMentorship::class);
    }

    public function mentorshipPairs(): HasMany
    {
        return $this->hasMany(CohortMentorship::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
