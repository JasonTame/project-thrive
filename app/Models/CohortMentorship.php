<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CohortMentorship extends Pivot
{
    use HasFactory;

    protected $table = 'cohort_mentorships';

    public function cohort()
    {
        return $this->belongsTo(Cohort::class);
    }

    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }

    public function mentee()
    {
        return $this->belongsTo(Mentee::class);
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(CohortSession::class);
    }
}
