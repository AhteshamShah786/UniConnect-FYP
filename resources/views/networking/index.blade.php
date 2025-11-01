<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold text-gradient mb-4">Community</h1>
                <p class="text-lg text-secondary-600">Connect with students and alumni</p>
            </div>
            @auth
            <a href="{{ route('networking.create') }}" class="btn-primary">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Create Post
            </a>
            @endauth
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Search and Filters -->
            <div class="card-elevated p-6 mb-8">
                <form method="GET" action="{{ route('networking.index') }}" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Search -->
                        <div class="md:col-span-2">
                            <input type="text" 
                                   name="search" 
                                   value="{{ request('search') }}"
                                   placeholder="Search posts..."
                                   class="input-modern">
                        </div>
                        
                        <!-- Type Filter -->
                        <div>
                            <select name="type" class="input-modern">
                                <option value="">All Types</option>
                                @foreach($postTypes as $type)
                                    <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>
                                        {{ ucfirst($type) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="flex justify-between items-center">
                        <div class="flex space-x-4">
                            <!-- Sort -->
                            <select name="sort" class="input-modern">
                                <option value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>
                                    Sort by Date
                                </option>
                                <option value="title" {{ request('sort') == 'title' ? 'selected' : '' }}>
                                    Sort by Title
                                </option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn-primary">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            Search
                        </button>
                    </div>
                </form>
            </div>

            <!-- Results Count -->
            <div class="mb-6">
                <p class="text-secondary-600">
                    Showing {{ $posts->count() }} of {{ $posts->total() }} posts
                </p>
            </div>

            <!-- Posts Grid -->
            @if($posts->count() > 0)
                <div class="space-y-6">
                    @foreach($posts as $index => $post)
                    <div class="card-elevated p-8 animate-scale-in" style="animation-delay: {{ $index * 0.1 }}s;">
                        <div class="flex items-start justify-between mb-6">
                            <div class="flex items-center">
                                @if($post->userProfile && $post->userProfile->profile_picture)
                                <img src="{{ $post->userProfile->profile_picture }}" 
                                     alt="{{ $post->userProfile->full_name }}" 
                                     class="w-12 h-12 rounded-full mr-4 object-cover">
                                @else
                                <div class="w-12 h-12 bg-gradient-primary rounded-full flex items-center justify-center mr-4">
                                    <span class="text-white font-semibold">
                                        {{ substr($post->userProfile->full_name ?? 'A', 0, 1) }}
                                    </span>
                                </div>
                                @endif
                                <div>
                                    <h3 class="font-semibold text-secondary-900">{{ $post->userProfile->full_name ?? 'Anonymous' }}</h3>
                                    <p class="text-sm text-secondary-500">{{ $post->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            <span class="badge badge-secondary">{{ ucfirst($post->post_type) }}</span>
                        </div>
                        
                        <h2 class="text-2xl font-bold mb-4 text-secondary-900">{{ $post->title }}</h2>
                        <div class="prose prose-lg max-w-none text-secondary-700 mb-6">
                            {!! nl2br(e(Str::limit($post->content, 300))) !!}
                        </div>
                        
                        <div class="flex justify-between items-center">
                            <div class="flex items-center space-x-4 text-sm text-secondary-500">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                    </svg>
                                    0 comments
                                </span>
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                    0 likes
                                </span>
                            </div>
                            <a href="{{ route('networking.show', $post) }}" 
                               class="inline-flex items-center text-primary-600 font-semibold hover:text-primary-700 transition-colors duration-200">
                                Read More 
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $posts->appends(request()->query())->links() }}
                </div>
            @else
                <div class="text-center py-16">
                    <div class="w-24 h-24 bg-secondary-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-secondary-900 mb-4">No Posts Found</h3>
                    <p class="text-secondary-600 mb-8 max-w-md mx-auto">
                        We couldn't find any posts matching your criteria. Try adjusting your filters or search terms.
                    </p>
                    @auth
                    <a href="{{ route('networking.create') }}" class="btn-primary">
                        Create First Post
                    </a>
                    @else
                    <a href="{{ route('login') }}" class="btn-primary">
                        Login to Create Posts
                    </a>
                    @endauth
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
