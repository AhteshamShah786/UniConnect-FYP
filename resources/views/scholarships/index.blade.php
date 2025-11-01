<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold text-gradient mb-4">Scholarships</h1>
                <p class="text-lg text-secondary-600">Discover funding opportunities for your education</p>
            </div>
            <a href="{{ route('scholarships.eligibility-check') }}" class="btn-primary">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Check Eligibility
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Search and Filters -->
            <div class="card-elevated p-6 mb-8">
                <form method="GET" action="{{ route('scholarships.index') }}" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <!-- Search -->
                        <div class="md:col-span-2">
                            <input type="text" 
                                   name="search" 
                                   value="{{ request('search') }}"
                                   placeholder="Search scholarships..."
                                   class="input-modern">
                        </div>
                        
                        <!-- Country Filter -->
                        <div>
                            <select name="country" class="input-modern">
                                <option value="">All Countries</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country }}" {{ request('country') == $country ? 'selected' : '' }}>
                                        {{ $country }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <!-- Program Filter -->
                        <div>
                            <select name="program" class="input-modern">
                                <option value="">All Programs</option>
                                @foreach($programs as $program)
                                    <option value="{{ $program }}" {{ request('program') == $program ? 'selected' : '' }}>
                                        {{ $program }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="flex justify-between items-center">
                        <div class="flex space-x-4">
                            <!-- Coverage Filter -->
                            <select name="coverage" class="input-modern">
                                <option value="">All Coverage</option>
                                @foreach($coverageTypes as $coverage)
                                    <option value="{{ $coverage }}" {{ request('coverage') == $coverage ? 'selected' : '' }}>
                                        {{ ucfirst($coverage) }}
                                    </option>
                                @endforeach
                            </select>
                            
                            <!-- Sort -->
                            <select name="sort" class="input-modern">
                                <option value="application_deadline" {{ request('sort') == 'application_deadline' ? 'selected' : '' }}>
                                    Sort by Deadline
                                </option>
                                <option value="amount" {{ request('sort') == 'amount' ? 'selected' : '' }}>
                                    Sort by Amount
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
                    Showing {{ $scholarships->count() }} of {{ $scholarships->total() }} scholarships
                </p>
            </div>

            <!-- Scholarships Grid -->
            @if($scholarships->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($scholarships as $index => $scholarship)
                    <div class="card-elevated group animate-scale-in" style="animation-delay: {{ $index * 0.1 }}s;">
                        <div class="p-8">
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
                            <p class="text-secondary-600 mb-3 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                {{ $scholarship->university->name }}
                            </p>
                            @endif
                            
                            @if($scholarship->provider)
                            <p class="text-secondary-600 mb-3 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                {{ $scholarship->provider }}
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
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $scholarships->appends(request()->query())->links() }}
                </div>
            @else
                <div class="text-center py-16">
                    <div class="w-24 h-24 bg-secondary-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6-4h6m2 5.291A7.962 7.962 0 0112 15c-2.34 0-4.29-1.009-5.824-2.709M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-secondary-900 mb-4">No Scholarships Found</h3>
                    <p class="text-secondary-600 mb-8 max-w-md mx-auto">
                        We couldn't find any scholarships matching your criteria. Try adjusting your filters or search terms.
                    </p>
                    <a href="{{ route('scholarships.index') }}" class="btn-primary">
                        View All Scholarships
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
