<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        'approved' => 'boolean',
        'user_id' => 'integer',
    ];

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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
