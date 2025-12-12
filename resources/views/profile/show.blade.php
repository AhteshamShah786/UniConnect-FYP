<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold text-gradient mb-4">My Profile</h1>
                <p class="text-lg text-secondary-600">View your profile information</p>
            </div>
            <a href="{{ route('profile.edit') }}" class="btn-primary">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                Edit Profile
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Profile Information -->
                    <div class="card-elevated p-8">
                        <h2 class="text-2xl font-bold text-secondary-900 mb-6">Profile Information</h2>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center py-3 border-b border-secondary-200">
                                <span class="text-secondary-600 font-medium">Name</span>
                                <span class="text-secondary-900 font-semibold">{{ $user->name }}</span>
                            </div>
                            <div class="flex justify-between items-center py-3 border-b border-secondary-200">
                                <span class="text-secondary-600 font-medium">Email</span>
                                <span class="text-secondary-900 font-semibold">{{ $user->email }}</span>
                            </div>
                            @if($user->email_verified_at)
                            <div class="flex justify-between items-center py-3 border-b border-secondary-200">
                                <span class="text-secondary-600 font-medium">Email Verified</span>
                                <span class="badge badge-success">Verified</span>
                            </div>
                            @else
                            <div class="flex justify-between items-center py-3 border-b border-secondary-200">
                                <span class="text-secondary-600 font-medium">Email Verified</span>
                                <span class="badge badge-secondary">Not Verified</span>
                            </div>
                            @endif
                            <div class="flex justify-between items-center py-3">
                                <span class="text-secondary-600 font-medium">Member Since</span>
                                <span class="text-secondary-900 font-semibold">{{ $user->created_at->format('M d, Y') }}</span>
                            </div>
                        </div>
                    </div>

                    @if($user->profile)
                    <!-- Additional Profile Details -->
                    <div class="card-elevated p-8">
                        <h2 class="text-2xl font-bold text-secondary-900 mb-6">Additional Information</h2>
                        <div class="space-y-4">
                            @if($user->profile->first_name || $user->profile->last_name)
                            <div class="flex justify-between items-center py-3 border-b border-secondary-200">
                                <span class="text-secondary-600 font-medium">Full Name</span>
                                <span class="text-secondary-900 font-semibold">
                                    {{ $user->profile->first_name }} {{ $user->profile->last_name }}
                                </span>
                            </div>
                            @endif
                            @if($user->profile->country)
                            <div class="flex justify-between items-center py-3 border-b border-secondary-200">
                                <span class="text-secondary-600 font-medium">Country</span>
                                <span class="text-secondary-900 font-semibold">{{ $user->profile->country }}</span>
                            </div>
                            @endif
                            @if($user->profile->city)
                            <div class="flex justify-between items-center py-3 border-b border-secondary-200">
                                <span class="text-secondary-600 font-medium">City</span>
                                <span class="text-secondary-900 font-semibold">{{ $user->profile->city }}</span>
                            </div>
                            @endif
                            @if($user->profile->current_university)
                            <div class="flex justify-between items-center py-3 border-b border-secondary-200">
                                <span class="text-secondary-600 font-medium">Current University</span>
                                <span class="text-secondary-900 font-semibold">{{ $user->profile->current_university }}</span>
                            </div>
                            @endif
                            @if($user->profile->field_of_study)
                            <div class="flex justify-between items-center py-3 border-b border-secondary-200">
                                <span class="text-secondary-600 font-medium">Field of Study</span>
                                <span class="text-secondary-900 font-semibold">{{ $user->profile->field_of_study }}</span>
                            </div>
                            @endif
                            @if($user->profile->degree_level)
                            <div class="flex justify-between items-center py-3">
                                <span class="text-secondary-600 font-medium">Degree Level</span>
                                <span class="text-secondary-900 font-semibold">{{ $user->profile->degree_level }}</span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Profile Picture -->
                    <div class="card-elevated p-6">
                        <div class="text-center">
                            @if($user->profile && $user->profile->profile_picture)
                            <img src="{{ asset('storage/' . $user->profile->profile_picture) }}" 
                                 alt="{{ $user->name }}" 
                                 class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                            @else
                            <div class="w-32 h-32 bg-gradient-primary rounded-full flex items-center justify-center mx-auto mb-4">
                                <span class="text-white font-bold text-4xl">
                                    {{ substr($user->name, 0, 1) }}
                                </span>
                            </div>
                            @endif
                            <h3 class="text-xl font-bold text-secondary-900 mb-2">{{ $user->name }}</h3>
                            @if($user->profile && $user->profile->bio)
                            <p class="text-sm text-secondary-700 mb-4">{{ $user->profile->bio }}</p>
                            @endif
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="card-elevated p-6">
                        <h3 class="text-xl font-bold text-secondary-900 mb-4">Quick Actions</h3>
                        <div class="space-y-3">
                            <a href="{{ route('profile.edit') }}" class="btn-primary w-full justify-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Edit Profile
                            </a>
                            <a href="{{ route('networking.index') }}" class="btn-secondary w-full justify-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                View Community
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

