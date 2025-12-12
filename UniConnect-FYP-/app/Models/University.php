<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class University extends Model
{
    protected $fillable = [
        'name',
        'country',
        'city',
        'description',
        'website',
        'logo',
        'qs_ranking',
        'times_ranking',
        'programs',
        'admission_requirements',
        'tuition_fee_min',
        'tuition_fee_max',
        'currency',
        'contact_info',
        'is_active'
    ];

    protected $casts = [
        'programs' => 'array',
        'admission_requirements' => 'array',
        'contact_info' => 'array',
        'is_active' => 'boolean',
        'tuition_fee_min' => 'decimal:2',
        'tuition_fee_max' => 'decimal:2',
    ];

    /**
     * Get the scholarships offered by this university.
     */
    public function scholarships(): HasMany
    {
        return $this->hasMany(Scholarship::class);
    }

    /**
     * Scope a query to only include active universities.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to filter by country.
     */
    public function scopeByCountry($query, $country)
    {
        return $query->where('country', $country);
    }

    /**
     * Scope a query to filter by program.
     */
    public function scopeByProgram($query, $program)
    {
        return $query->whereJsonContains('programs', $program);
    }
}
