@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div>
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Dashboard</h1>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 bg-blue-100 rounded-lg">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Universities</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $stats['universities'] }}</p>
                    <p class="text-xs text-gray-500 mt-1">{{ $stats['active_universities'] }} active</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 bg-green-100 rounded-lg">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Scholarships</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $stats['scholarships'] }}</p>
                    <p class="text-xs text-gray-500 mt-1">{{ $stats['active_scholarships'] }} active</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 bg-purple-100 rounded-lg">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Community Posts</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $stats['posts'] }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 bg-yellow-100 rounded-lg">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Users</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $stats['users'] }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Recent Universities -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900">Recent Universities</h2>
            </div>
            <div class="p-6">
                @if($stats['recent_universities']->count() > 0)
                    <ul class="space-y-3">
                        @foreach($stats['recent_universities'] as $university)
                            <li class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">{{ $university->name }}</p>
                                    <p class="text-xs text-gray-500">{{ $university->city }}, {{ $university->country }}</p>
                                </div>
                                <a href="{{ route('admin.universities.show', $university) }}" class="text-blue-600 hover:text-blue-800 text-sm">View</a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-sm text-gray-500">No universities yet.</p>
                @endif
                <a href="{{ route('admin.universities.index') }}" class="mt-4 block text-center text-sm text-blue-600 hover:text-blue-800">View All →</a>
            </div>
        </div>

        <!-- Recent Scholarships -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900">Recent Scholarships</h2>
            </div>
            <div class="p-6">
                @if($stats['recent_scholarships']->count() > 0)
                    <ul class="space-y-3">
                        @foreach($stats['recent_scholarships'] as $scholarship)
                            <li class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">{{ Str::limit($scholarship->title, 30) }}</p>
                                    <p class="text-xs text-gray-500">{{ $scholarship->application_deadline->format('M d, Y') }}</p>
                                </div>
                                <a href="{{ route('admin.scholarships.show', $scholarship) }}" class="text-blue-600 hover:text-blue-800 text-sm">View</a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-sm text-gray-500">No scholarships yet.</p>
                @endif
                <a href="{{ route('admin.scholarships.index') }}" class="mt-4 block text-center text-sm text-blue-600 hover:text-blue-800">View All →</a>
            </div>
        </div>

        <!-- Recent Posts -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900">Recent Posts</h2>
            </div>
            <div class="p-6">
                @if($stats['recent_posts']->count() > 0)
                    <ul class="space-y-3">
                        @foreach($stats['recent_posts'] as $post)
                            <li class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-900">{{ Str::limit($post->title, 30) }}</p>
                                    <p class="text-xs text-gray-500">{{ $post->userProfile->full_name ?? 'Anonymous' }}</p>
                                </div>
                                <a href="{{ route('admin.posts.show', $post) }}" class="text-blue-600 hover:text-blue-800 text-sm">View</a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-sm text-gray-500">No posts yet.</p>
                @endif
                <a href="{{ route('admin.posts.index') }}" class="mt-4 block text-center text-sm text-blue-600 hover:text-blue-800">View All →</a>
            </div>
        </div>
    </div>
</div>
@endsection

