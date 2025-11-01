<x-app-layout>
    <x-slot name="header">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-gradient mb-4">
                {{ __('UniConnect') }}
            </h1>
            <p class="text-lg text-secondary-600 max-w-3xl mx-auto">
                {{ __('Connecting Students to Universities, Scholarships, and Alumni') }}
            </p>
        </div>
    </x-slot>

    <!-- Hero Section -->
    <div class="gradient-primary text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-black/10"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="text-center animate-slide-up">
                <h1 class="text-5xl md:text-7xl font-bold mb-8 leading-tight">
                    Your Gateway to<br>
                    <span class="text-yellow-300">Higher Education</span>
                </h1>
                <p class="text-xl md:text-2xl mb-12 max-w-4xl mx-auto leading-relaxed opacity-90">
                    Discover universities, find scholarships, and connect with alumni mentors all in one place. 
                    Start your journey to academic excellence today.
                </p>
                <div class="flex flex-col sm:flex-row gap-6 justify-center">
                    <a href="{{ route('universities.index') }}" 
                       class="btn-secondary bg-white text-primary-600 hover:bg-gray-50 text-lg px-10 py-4">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Explore Universities
                    </a>
                    <a href="{{ route('scholarships.index') }}" 
                       class="btn-secondary border-2 border-white text-white hover:bg-white hover:text-primary-600 text-lg px-10 py-4">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                        Find Scholarships
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Decorative elements -->
        <div class="absolute top-10 left-10 w-20 h-20 bg-white/10 rounded-full animate-bounce-subtle"></div>
        <div class="absolute top-32 right-20 w-16 h-16 bg-yellow-300/20 rounded-full animate-bounce-subtle" style="animation-delay: 0.5s;"></div>
        <div class="absolute bottom-20 left-1/4 w-12 h-12 bg-white/10 rounded-full animate-bounce-subtle" style="animation-delay: 1s;"></div>
    </div>

    <!-- Features Section -->
    <div class="py-24 bg-gradient-secondary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 animate-fade-in">
                <h2 class="text-4xl font-bold text-gradient-secondary mb-6">Why Choose UniConnect?</h2>
                <p class="text-xl text-secondary-600 max-w-3xl mx-auto leading-relaxed">
                    We provide comprehensive tools and resources to help you make informed decisions about your higher education journey.
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="card-elevated p-8 text-center group animate-scale-in" style="animation-delay: 0.1s;">
                    <div class="w-20 h-20 bg-gradient-to-br from-primary-100 to-primary-200 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-10 h-10 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-secondary-900">Smart Search & Filter</h3>
                    <p class="text-secondary-600 leading-relaxed">Find universities and scholarships based on your preferences, location, and eligibility criteria with our advanced filtering system.</p>
                </div>
                
                <div class="card-elevated p-8 text-center group animate-scale-in" style="animation-delay: 0.2s;">
                    <div class="w-20 h-20 bg-gradient-to-br from-green-100 to-green-200 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-secondary-900">Eligibility Checker</h3>
                    <p class="text-secondary-600 leading-relaxed">Quickly check if you meet the requirements for universities and scholarships with our intelligent matching system.</p>
                </div>
                
                <div class="card-elevated p-8 text-center group animate-scale-in" style="animation-delay: 0.3s;">
                    <div class="w-20 h-20 bg-gradient-to-br from-accent-100 to-accent-200 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-10 h-10 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-secondary-900">Alumni Network</h3>
                    <p class="text-secondary-600 leading-relaxed">Connect with alumni and current students for mentorship, guidance, and networking opportunities.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Universities Section -->
    @if($featuredUniversities->count() > 0)
    <div class="py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 animate-fade-in">
                <h2 class="text-4xl font-bold text-gradient-secondary mb-6">Top Universities</h2>
                <p class="text-xl text-secondary-600 max-w-2xl mx-auto">Discover world-class universities and their programs</p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredUniversities as $index => $university)
                <div class="card-elevated group animate-scale-in" style="animation-delay: {{ $index * 0.1 }}s;">
                    @if($university->logo)
                    <div class="h-56 bg-gradient-to-br from-secondary-100 to-secondary-200 flex items-center justify-center p-6">
                        <img src="{{ $university->logo }}" alt="{{ $university->name }}" class="max-h-32 max-w-full object-contain">
                    </div>
                    @else
                    <div class="h-56 gradient-primary flex items-center justify-center">
                        <span class="text-white text-3xl font-bold">{{ substr($university->name, 0, 2) }}</span>
                    </div>
                    @endif
                    
                    <div class="p-8">
                        <h3 class="text-2xl font-bold mb-3 text-secondary-900">{{ $university->name }}</h3>
                        <p class="text-secondary-600 mb-3 flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            {{ $university->city }}, {{ $university->country }}
                        </p>
                        @if($university->qs_ranking)
                        <div class="mb-4">
                            <span class="badge badge-primary">QS Ranking: #{{ $university->qs_ranking }}</span>
                        </div>
                        @endif
                        <p class="text-secondary-700 text-sm mb-6 leading-relaxed">{{ Str::limit($university->description, 120) }}</p>
                        <a href="{{ route('universities.show', $university) }}" 
                           class="inline-flex items-center text-primary-600 font-semibold hover:text-primary-700 group-hover:translate-x-1 transition-transform duration-300">
                            Learn More 
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('universities.index') }}" class="btn-primary text-lg px-8 py-4">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    View All Universities
                </a>
            </div>
        </div>
    </div>
    @endif

    <!-- Recent Scholarships Section -->
    @if($recentScholarships->count() > 0)
    <div class="py-24 bg-gradient-secondary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 animate-fade-in">
                <h2 class="text-4xl font-bold text-gradient-secondary mb-6">Latest Scholarships</h2>
                <p class="text-xl text-secondary-600 max-w-2xl mx-auto">Don't miss out on these funding opportunities</p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($recentScholarships as $index => $scholarship)
                <div class="card-elevated p-8 group animate-scale-in" style="animation-delay: {{ $index * 0.1 }}s;">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-100 to-green-200 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                        </div>
                        @if($scholarship->amount)
                        <div class="text-right">
                            <span class="badge badge-success text-sm font-semibold">
                                {{ number_format($scholarship->amount) }} {{ $scholarship->currency }}
                            </span>
                        </div>
                        @endif
                    </div>
                    
                    <h3 class="text-2xl font-bold mb-3 text-secondary-900">{{ $scholarship->title }}</h3>
                    @if($scholarship->university)
                    <p class="text-secondary-600 mb-4 flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        {{ $scholarship->university->name }}
                    </p>
                    @endif
                    <p class="text-secondary-700 text-sm mb-6 leading-relaxed">{{ Str::limit($scholarship->description, 120) }}</p>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center text-sm text-secondary-500">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Deadline: {{ $scholarship->application_deadline->format('M d, Y') }}
                        </div>
                        <a href="{{ route('scholarships.show', $scholarship) }}" 
                           class="inline-flex items-center text-primary-600 font-semibold hover:text-primary-700 group-hover:translate-x-1 transition-transform duration-300">
                            View Details 
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('scholarships.index') }}" class="btn-primary bg-green-600 hover:bg-green-700 text-lg px-8 py-4">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                    View All Scholarships
                </a>
            </div>
        </div>
    </div>
    @endif

    <!-- Featured Posts Section -->
    @if($featuredPosts->count() > 0)
    <div class="py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 animate-fade-in">
                <h2 class="text-4xl font-bold text-gradient-secondary mb-6">Community Insights</h2>
                <p class="text-xl text-secondary-600 max-w-2xl mx-auto">Learn from the experiences of students and alumni</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                @foreach($featuredPosts as $index => $post)
                <div class="card-elevated p-8 group animate-scale-in" style="animation-delay: {{ $index * 0.1 }}s;">
                    <div class="flex items-center mb-6">
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
                            <p class="font-semibold text-secondary-900">{{ $post->userProfile->full_name ?? 'Anonymous' }}</p>
                            <p class="text-sm text-secondary-500">{{ $post->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-secondary-900">{{ $post->title }}</h3>
                    <p class="text-secondary-700 text-sm mb-6 leading-relaxed">{{ Str::limit($post->content, 120) }}</p>
                    <div class="flex justify-between items-center">
                        <span class="badge badge-secondary">
                            {{ ucfirst($post->post_type) }}
                        </span>
                        <a href="{{ route('networking.show', $post) }}" 
                           class="inline-flex items-center text-primary-600 font-semibold hover:text-primary-700 group-hover:translate-x-1 transition-transform duration-300">
                            Read More 
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('networking.index') }}" class="btn-primary bg-accent-600 hover:bg-accent-700 text-lg px-8 py-4">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    Join the Community
                </a>
            </div>
        </div>
    </div>
    @endif

    <!-- CTA Section -->
    <div class="gradient-primary text-white py-24 relative overflow-hidden">
        <div class="absolute inset-0 bg-black/10"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-6 animate-slide-up">Ready to Start Your Journey?</h2>
            <p class="text-xl md:text-2xl mb-12 max-w-4xl mx-auto leading-relaxed opacity-90">
                Join thousands of students who have found their perfect university and scholarship opportunities through UniConnect.
            </p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center">
                @auth
                    <a href="{{ route('profile.show') }}" class="btn-secondary bg-white text-primary-600 hover:bg-gray-50 text-lg px-10 py-4">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Complete Your Profile
                    </a>
                @else
                    <a href="{{ route('register') }}" class="btn-secondary bg-white text-primary-600 hover:bg-gray-50 text-lg px-10 py-4">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                        Get Started Free
                    </a>
                @endauth
                <a href="{{ route('scholarships.eligibility-check') }}" 
                   class="btn-secondary border-2 border-white text-white hover:bg-white hover:text-primary-600 text-lg px-10 py-4">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Check Eligibility
                </a>
            </div>
        </div>
        
        <!-- Decorative elements -->
        <div class="absolute top-10 right-10 w-24 h-24 bg-white/10 rounded-full animate-bounce-subtle"></div>
        <div class="absolute bottom-10 left-10 w-16 h-16 bg-yellow-300/20 rounded-full animate-bounce-subtle" style="animation-delay: 0.7s;"></div>
        <div class="absolute top-1/2 right-1/4 w-20 h-20 bg-white/5 rounded-full animate-bounce-subtle" style="animation-delay: 1.2s;"></div>
    </div>
</x-app-layout>