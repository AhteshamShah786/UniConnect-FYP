<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NetworkingPost extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'post_type',
        'tags',
        'university_related',
        'program_related',
        'is_anonymous',
        'likes_count',
        'comments_count',
        'is_pinned',
        'is_featured'
    ];

    protected $casts = [
        'tags' => 'array',
        'is_anonymous' => 'boolean',
        'is_pinned' => 'boolean',
        'is_featured' => 'boolean',
    ];

    /**
     * Get the user that created the post.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user profile that created the post.
     */
    public function userProfile(): BelongsTo
    {
        return $this->belongsTo(UserProfile::class, 'user_id', 'user_id');
    }

    /**
     * Scope a query to filter by post type.
     */
    public function scopeByType($query, $type)
    {
        return $query->where('post_type', $type);
    }

    /**
     * Scope a query to filter by university.
     */
    public function scopeByUniversity($query, $university)
    {
        return $query->where('university_related', $university);
    }

    /**
     * Scope a query to filter by program.
     */
    public function scopeByProgram($query, $program)
    {
        return $query->where('program_related', $program);
    }

    /**
     * Scope a query to get pinned posts.
     */
    public function scopePinned($query)
    {
        return $query->where('is_pinned', true);
    }

    /**
     * Scope a query to get featured posts.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope a query to order by most liked.
     */
    public function scopeMostLiked($query)
    {
        return $query->orderBy('likes_count', 'desc');
    }

    /**
     * Scope a query to order by most recent.
     */
    public function scopeMostRecent($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
