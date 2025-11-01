<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserProfile extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'profile_picture',
        'date_of_birth',
        'phone',
        'country',
        'city',
        'user_type',
        'current_university',
        'field_of_study',
        'degree_level',
        'graduation_year',
        'bio',
        'interests',
        'languages',
        'linkedin_profile',
        'github_profile',
        'is_mentor',
        'is_available_for_mentoring'
    ];

    protected $casts = [
        'interests' => 'array',
        'languages' => 'array',
        'is_mentor' => 'boolean',
        'is_available_for_mentoring' => 'boolean',
        'date_of_birth' => 'date',
    ];

    /**
     * Get the user that owns the profile.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the networking posts created by this user.
     */
    public function networkingPosts(): HasMany
    {
        return $this->hasMany(NetworkingPost::class, 'user_id', 'user_id');
    }

    /**
     * Get the chatbot conversations for this user.
     */
    public function chatbotConversations(): HasMany
    {
        return $this->hasMany(ChatbotConversation::class, 'user_id', 'user_id');
    }

    /**
     * Get the full name of the user.
     */
    public function getFullNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Get the university name.
     */
    public function getUniversityAttribute(): string
    {
        return $this->current_university ?? '';
    }

    /**
     * Scope a query to only include mentors.
     */
    public function scopeMentors($query)
    {
        return $query->where('is_mentor', true);
    }

    /**
     * Scope a query to only include available mentors.
     */
    public function scopeAvailableMentors($query)
    {
        return $query->where('is_available_for_mentoring', true);
    }

    /**
     * Scope a query to filter by user type.
     */
    public function scopeByUserType($query, $type)
    {
        return $query->where('user_type', $type);
    }

    /**
     * Scope a query to filter by country.
     */
    public function scopeByCountry($query, $country)
    {
        return $query->where('country', $country);
    }

    /**
     * Scope a query to filter by field of study.
     */
    public function scopeByFieldOfStudy($query, $field)
    {
        return $query->where('field_of_study', $field);
    }
}
