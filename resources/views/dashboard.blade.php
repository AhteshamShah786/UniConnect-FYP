<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gradient mb-2">
                    {{ __('Welcome back, ') }}{{ Auth::user()->name }}!
                </h1>
                <p class="text-lg text-secondary-600">
                    {{ __('Here\'s what\'s happening with your education journey') }}
                </p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('profile.edit') }}" class="btn-secondary">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Settings
                </a>
                <a href="{{ route('profile.show') }}" class="btn-primary">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    View Profile
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
                <div class="card-elevated p-6 animate-scale-in" style="animation-delay: 0.1s;">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-primary-100 to-primary-200 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-secondary-600">Universities Saved</p>
                            <p class="text-2xl font-bold text-secondary-900">12</p>
                        </div>
                    </div>
                </div>
                
                <div class="card-elevated p-6 animate-scale-in" style="animation-delay: 0.2s;">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-100 to-green-200 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-secondary-600">Scholarships Applied</p>
                            <p class="text-2xl font-bold text-secondary-900">8</p>
                        </div>
                    </div>
                </div>
                
                <div class="card-elevated p-6 animate-scale-in" style="animation-delay: 0.3s;">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-accent-100 to-accent-200 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-secondary-600">Community Posts</p>
                            <p class="text-2xl font-bold text-secondary-900">5</p>
                        </div>
                    </div>
                </div>
                
                <div class="card-elevated p-6 animate-scale-in" style="animation-delay: 0.4s;">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-yellow-100 to-yellow-200 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-secondary-600">Profile Complete</p>
                            <p class="text-2xl font-bold text-secondary-900">85%</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Recent Activity -->
                <div class="lg:col-span-2">
                    <div class="card-elevated p-8 animate-slide-up">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-bold text-secondary-900">Recent Activity</h3>
                            <a href="#" class="text-primary-600 hover:text-primary-700 font-medium">View All</a>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-center p-4 bg-secondary-50 rounded-xl">
                                <div class="w-10 h-10 bg-primary-100 rounded-full flex items-center justify-center mr-4">
                                    <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium text-secondary-900">Saved Harvard University</p>
                                    <p class="text-sm text-secondary-500">2 hours ago</p>
                                </div>
                            </div>
                            <div class="flex items-center p-4 bg-secondary-50 rounded-xl">
                                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-4">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium text-secondary-900">Applied to MIT Scholarship</p>
                                    <p class="text-sm text-secondary-500">1 day ago</p>
                                </div>
                            </div>
                            <div class="flex items-center p-4 bg-secondary-50 rounded-xl">
                                <div class="w-10 h-10 bg-accent-100 rounded-full flex items-center justify-center mr-4">
                                    <svg class="w-5 h-5 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium text-secondary-900">Posted in Community</p>
                                    <p class="text-sm text-secondary-500">3 days ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="space-y-6">
                    <div class="card-elevated p-6 animate-scale-in" style="animation-delay: 0.5s;">
                        <h3 class="text-xl font-bold text-secondary-900 mb-4">Quick Actions</h3>
                        <div class="space-y-3">
                            <a href="{{ route('universities.index') }}" class="w-full btn-secondary justify-start">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                Browse Universities
                            </a>
                            <a href="{{ route('scholarships.index') }}" class="w-full btn-secondary justify-start">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                </svg>
                                Find Scholarships
                            </a>
                            <a href="{{ route('networking.index') }}" class="w-full btn-secondary justify-start">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                Join Community
                            </a>
                        </div>
                    </div>

                    <div class="card-elevated p-6 animate-scale-in" style="animation-delay: 0.6s;">
                        <h3 class="text-xl font-bold text-secondary-900 mb-4">Profile Completion</h3>
                        <div class="mb-4">
                            <div class="flex justify-between text-sm mb-2">
                                <span class="text-secondary-600">Progress</span>
                                <span class="text-secondary-900 font-medium">85%</span>
                            </div>
                            <div class="w-full bg-secondary-200 rounded-full h-2">
                                <div class="bg-gradient-primary h-2 rounded-full" style="width: 85%"></div>
                            </div>
                        </div>
                        <p class="text-sm text-secondary-600 mb-4">Complete your profile to get personalized recommendations</p>
                        <a href="{{ route('profile.edit') }}" class="btn-primary w-full justify-center">
                            Complete Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
