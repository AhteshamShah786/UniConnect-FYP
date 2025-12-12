<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold text-gradient mb-4">Create Post</h1>
                <p class="text-lg text-secondary-600">Share your experience with the community</p>
            </div>
            <a href="{{ route('networking.index') }}" class="btn-secondary">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Community
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="card-elevated p-8">
                <form method="POST" action="{{ route('networking.store') }}" class="space-y-6">
                    @csrf
                    
                    <!-- Post Type -->
                    <div>
                        <label for="post_type" class="block text-sm font-medium text-secondary-700 mb-2">
                            Post Type
                        </label>
                        <select name="post_type" id="post_type" class="input-modern" required>
                            <option value="">Select post type</option>
                            <option value="question" {{ old('post_type') == 'question' ? 'selected' : '' }}>
                                Question
                            </option>
                            <option value="experience" {{ old('post_type') == 'experience' ? 'selected' : '' }}>
                                Experience
                            </option>
                            <option value="advice" {{ old('post_type') == 'advice' ? 'selected' : '' }}>
                                Advice
                            </option>
                            <option value="announcement" {{ old('post_type') == 'announcement' ? 'selected' : '' }}>
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
                               value="{{ old('title') }}"
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
                                  required>{{ old('content') }}</textarea>
                        @error('content')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Guidelines -->
                    <div class="bg-primary-50 border border-primary-200 rounded-xl p-6">
                        <h3 class="text-lg font-semibold text-primary-900 mb-3">Community Guidelines</h3>
                        <ul class="space-y-2 text-sm text-primary-800">
                            <li class="flex items-start">
                                <svg class="w-4 h-4 text-primary-600 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Be respectful and constructive in your posts
                            </li>
                            <li class="flex items-start">
                                <svg class="w-4 h-4 text-primary-600 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Share relevant experiences and helpful information
                            </li>
                            <li class="flex items-start">
                                <svg class="w-4 h-4 text-primary-600 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Use appropriate language and avoid spam
                            </li>
                            <li class="flex items-start">
                                <svg class="w-4 h-4 text-primary-600 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Help create a supportive learning community
                            </li>
                        </ul>
                    </div>

                    <!-- Actions -->
                    <div class="flex justify-end space-x-4">
                        <a href="{{ route('networking.index') }}" class="btn-secondary">
                            Cancel
                        </a>
                        <button type="submit" class="btn-primary">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                            Create Post
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
