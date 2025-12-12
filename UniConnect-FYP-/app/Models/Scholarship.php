<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Scholarship extends Model
{
    protected $fillable = [
        'title',
        'description',
        'university_id',
        'provider',
        'amount',
        'currency',
        'coverage',
        'eligibility_criteria',
        'required_documents',
        'application_deadline',
        'announcement_date',
        'application_link',
        'programs_covered',
        'countries_eligible',
        'is_active'
    ];

    protected $casts = [
        'eligibility_criteria' => 'array',
        'required_documents' => 'array',
        'programs_covered' => 'array',
        'countries_eligible' => 'array',
        'is_active' => 'boolean',
        'amount' => 'decimal:2',
        'application_deadline' => 'date',
        'announcement_date' => 'date',
    ];

    /**
     * Get the university that offers this scholarship.
     */
    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class);
    }

    /**
     * Scope a query to only include active scholarships.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to filter by country eligibility.
     */
    public function scopeForCountry($query, $country)
    {
        return $query->whereJsonContains('countries_eligible', $country);
    }

    /**
     * Scope a query to filter by program.
     */
    public function scopeForProgram($query, $program)
    {
        return $query->whereJsonContains('programs_covered', $program);
    }

    /**
     * Scope a query to filter by coverage type.
     */
    public function scopeByCoverage($query, $coverage)
    {
        return $query->where('coverage', $coverage);
    }

    /**
     * Scope a query to filter scholarships that haven't expired.
     */
    public function scopeNotExpired($query)
    {
        return $query->where('application_deadline', '>=', now());
    }
}
