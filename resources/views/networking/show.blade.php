<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold text-gradient mb-4">{{ $post->title }}</h1>
                <div class="flex items-center space-x-4 text-secondary-600">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ $post->created_at->format('M d, Y') }}
                    </span>
                    <span class="badge badge-secondary">{{ ucfirst($post->post_type) }}</span>
                </div>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('networking.index') }}" class="btn-secondary">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Community
                </a>
                @auth
                @if($post->userProfile && $post->userProfile->user_id === auth()->id())
                <a href="{{ route('networking.edit', $post) }}" class="btn-primary">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit Post
                </a>
                @endif
                @endauth
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-3">
                    <div class="card-elevated p-8 mb-8">
                        <!-- Author Info -->
                        <div class="flex items-center mb-8">
                            @if($post->userProfile && $post->userProfile->profile_picture)
                            <img src="{{ $post->userProfile->profile_picture }}" 
                                 alt="{{ $post->userProfile->full_name }}" 
                                 class="w-16 h-16 rounded-full mr-4 object-cover">
                            @else
                            <div class="w-16 h-16 bg-gradient-primary rounded-full flex items-center justify-center mr-4">
                                <span class="text-white font-bold text-xl">
                                    {{ substr($post->userProfile->full_name ?? 'A', 0, 1) }}
                                </span>
                            </div>
                            @endif
                            <div>
                                <h3 class="text-xl font-semibold text-secondary-900">{{ $post->userProfile->full_name ?? 'Anonymous' }}</h3>
                                <p class="text-secondary-600">{{ $post->created_at->diffForHumans() }}</p>
                                @if($post->userProfile && $post->userProfile->university)
                                <p class="text-sm text-secondary-500">{{ $post->userProfile->university }}</p>
                                @endif
                            </div>
                        </div>

                        <!-- Post Content -->
                        <div class="prose prose-lg max-w-none text-secondary-700">
                            {!! nl2br(e($post->content)) !!}
                        </div>
                    </div>

                    <!-- Comments Section -->
                    <div class="card-elevated p-8">
                        <h3 class="text-2xl font-bold text-secondary-900 mb-6">Comments</h3>
                        
                        @auth
                        <!-- Comment Form -->
                        <form class="mb-8">
                            <div class="mb-4">
                                <textarea 
                                    name="comment" 
                                    rows="4" 
                                    placeholder="Share your thoughts..."
                                    class="input-modern resize-none"></textarea>
                            </div>
                            <button type="submit" class="btn-primary">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                </svg>
                                Post Comment
                            </button>
                        </form>
                        @else
                        <div class="text-center py-8 mb-8 bg-secondary-50 rounded-xl">
                            <p class="text-secondary-600 mb-4">Please login to comment on this post.</p>
                            <a href="{{ route('login') }}" class="btn-primary">Login</a>
                        </div>
                        @endauth

                        <!-- Comments List -->
                        <div class="space-y-6">
                            <!-- Sample Comment -->
                            <div class="flex items-start space-x-4">
                                <div class="w-10 h-10 bg-gradient-primary rounded-full flex items-center justify-center flex-shrink-0">
                                    <span class="text-white font-semibold text-sm">JD</span>
                                </div>
                                <div class="flex-1">
                                    <div class="bg-secondary-50 rounded-xl p-4">
                                        <div class="flex items-center justify-between mb-2">
                                            <h4 class="font-semibold text-secondary-900">John Doe</h4>
                                            <span class="text-sm text-secondary-500">2 hours ago</span>
                                        </div>
                                        <p class="text-secondary-700">This is really helpful information! Thank you for sharing your experience.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Another Sample Comment -->
                            <div class="flex items-start space-x-4">
                                <div class="w-10 h-10 bg-gradient-to-br from-accent-100 to-accent-200 rounded-full flex items-center justify-center flex-shrink-0">
                                    <span class="text-accent-600 font-semibold text-sm">SM</span>
                                </div>
                                <div class="flex-1">
                                    <div class="bg-secondary-50 rounded-xl p-4">
                                        <div class="flex items-center justify-between mb-2">
                                            <h4 class="font-semibold text-secondary-900">Sarah Miller</h4>
                                            <span class="text-sm text-secondary-500">1 day ago</span>
                                        </div>
                                        <p class="text-secondary-700">I had a similar experience. Would you mind if I reach out to you directly?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Author Profile -->
                    @if($post->userProfile)
                    <div class="card-elevated p-6">
                        <h3 class="text-xl font-bold text-secondary-900 mb-4">About the Author</h3>
                        <div class="text-center">
                            @if($post->userProfile->profile_picture)
                            <img src="{{ $post->userProfile->profile_picture }}" 
                                 alt="{{ $post->userProfile->full_name }}" 
                                 class="w-20 h-20 rounded-full mx-auto mb-4 object-cover">
                            @else
                            <div class="w-20 h-20 bg-gradient-primary rounded-full flex items-center justify-center mx-auto mb-4">
                                <span class="text-white font-bold text-2xl">
                                    {{ substr($post->userProfile->full_name ?? 'A', 0, 1) }}
                                </span>
                            </div>
                            @endif
                            <h4 class="font-semibold text-secondary-900 mb-2">{{ $post->userProfile->full_name }}</h4>
                            @if($post->userProfile->university)
                            <p class="text-sm text-secondary-600 mb-4">{{ $post->userProfile->university }}</p>
                            @endif
                            @if($post->userProfile->bio)
                            <p class="text-sm text-secondary-700">{{ Str::limit($post->userProfile->bio, 100) }}</p>
                            @endif
                        </div>
                    </div>
                    @endif

                    <!-- Related Posts -->
                    <div class="card-elevated p-6">
                        <h3 class="text-xl font-bold text-secondary-900 mb-4">Related Posts</h3>
                        <div class="space-y-4">
                            <!-- Sample Related Post -->
                            <div class="border-l-4 border-primary-200 pl-4">
                                <h4 class="font-semibold text-secondary-900 mb-1">How to Choose the Right University</h4>
                                <p class="text-sm text-secondary-600">by Jane Smith</p>
                                <p class="text-xs text-secondary-500">2 days ago</p>
                            </div>
                            
                            <div class="border-l-4 border-green-200 pl-4">
                                <h4 class="font-semibold text-secondary-900 mb-1">Scholarship Application Tips</h4>
                                <p class="text-sm text-secondary-600">by Mike Johnson</p>
                                <p class="text-xs text-secondary-500">1 week ago</p>
                            </div>
                            
                            <div class="border-l-4 border-accent-200 pl-4">
                                <h4 class="font-semibold text-secondary-900 mb-1">Study Abroad Experience</h4>
                                <p class="text-sm text-secondary-600">by Lisa Wang</p>
                                <p class="text-xs text-secondary-500">2 weeks ago</p>
                            </div>
                        </div>
                    </div>

                    <!-- Post Actions -->
                    <div class="card-elevated p-6">
                        <h3 class="text-xl font-bold text-secondary-900 mb-4">Actions</h3>
                        <div class="space-y-3">
                            <button class="w-full btn-secondary justify-start">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                                Like Post
                            </button>
                            <button class="w-full btn-secondary justify-start">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                                </svg>
                                Share Post
                            </button>
                            <button class="w-full btn-secondary justify-start">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM4.828 7l2.586 2.586a2 2 0 002.828 0L16 4l4 4V2H6a2 2 0 00-2 2v3z"></path>
                                </svg>
                                Report Post
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
