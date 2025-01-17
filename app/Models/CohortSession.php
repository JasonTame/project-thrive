<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CohortSession extends Model
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
        'completed' => 'boolean',
        'cohort_week_id' => 'integer',
        'cohort_mentorship_id' => 'integer',
    ];

    public function cohort(): BelongsTo
    {
        return $this->belongsTo(Cohort::class);
    }

    public function week(): BelongsTo
    {
        return $this->belongsTo(CohortWeek::class);
    }

    public function mentorshipPair(): BelongsTo
    {
        return $this->belongsTo(CohortMentorship::class);
    }
}
