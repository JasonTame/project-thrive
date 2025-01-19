<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CohortMentorship extends Pivot
{
    use HasFactory;

    protected $table = 'cohort_mentorships';

    public function cohort(): BelongsTo
    {
        return $this->belongsTo(Cohort::class);
    }

    public function mentor(): BelongsTo
    {
        return $this->belongsTo(Mentor::class);
    }

    public function mentee(): BelongsTo
    {
        return $this->belongsTo(Mentee::class);
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(CohortSession::class);
    }
}
