<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold text-gradient mb-4">Edit Post</h1>
                <p class="text-lg text-secondary-600">Update your community post</p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('networking.show', $post) }}" class="btn-secondary">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Post
                </a>
                <a href="{{ route('networking.index') }}" class="btn-secondary">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Community
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="card-elevated p-8">
                <form method="POST" action="{{ route('networking.update', $post) }}" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <!-- Post Type -->
                    <div>
                        <label for="post_type" class="block text-sm font-medium text-secondary-700 mb-2">
                            Post Type
                        </label>
                        <select name="post_type" id="post_type" class="input-modern" required>
                            <option value="">Select post type</option>
                            <option value="question" {{ old('post_type', $post->post_type) == 'question' ? 'selected' : '' }}>
                                Question
                            </option>
                            <option value="experience" {{ old('post_type', $post->post_type) == 'experience' ? 'selected' : '' }}>
                                Experience
                            </option>
                            <option value="advice" {{ old('post_type', $post->post_type) == 'advice' ? 'selected' : '' }}>
                                Advice
                            </option>
                            <option value="announcement" {{ old('post_type', $post->post_type) == 'announcement' ? 'selected' : '' }}>
                                Announcement
                            </option>
                        </select>
                        @error('post_type')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-secondary-700 mb-2">
                            Title
                        </label>
                        <input type="text" 
                               name="title" 
                               id="title" 
                               value="{{ old('title', $post->title) }}"
                               placeholder="Enter a descriptive title for your post"
                               class="input-modern" 
                               required>
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Content -->
                    <div>
                        <label for="content" class="block text-sm font-medium text-secondary-700 mb-2">
                            Content
                        </label>
                        <textarea name="content" 
                                  id="content" 
                                  rows="12" 
                                  placeholder="Share your thoughts, experiences, or ask questions..."
                                  class="input-modern resize-none" 
                                  required>{{ old('content', $post->content) }}</textarea>
                        @error('content')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Post Info -->
                    <div class="bg-secondary-50 border border-secondary-200 rounded-xl p-6">
                        <h3 class="text-lg font-semibold text-secondary-900 mb-3">Post Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-secondary-700">
                            <div>
                                <span class="font-medium">Created:</span> {{ $post->created_at->format('M d, Y \a\t g:i A') }}
                            </div>
                            <div>
                                <span class="font-medium">Last Updated:</span> {{ $post->updated_at->format('M d, Y \a\t g:i A') }}
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex justify-between">
                        <form method="POST" action="{{ route('networking.destroy', $post) }}" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="btn-secondary bg-red-600 hover:bg-red-700 text-white"
                                    onclick="return confirm('Are you sure you want to delete this post? This action cannot be undone.')">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Delete Post
                            </button>
                        </form>
                        
                        <div class="flex space-x-4">
                            <a href="{{ route('networking.show', $post) }}" class="btn-secondary">
                                Cancel
                            </a>
                            <button type="submit" class="btn-primary">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Update Post
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
