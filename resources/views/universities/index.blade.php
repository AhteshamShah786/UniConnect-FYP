<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold text-gradient mb-4">Universities</h1>
                <p class="text-lg text-secondary-600">Discover universities worldwide</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Search and Filter Section -->
            <div class="card-elevated p-6 mb-8">
                <form method="GET" action="{{ route('universities.index') }}" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <!-- Search Input -->
                        <div class="md:col-span-2">
                            <input type="text" 
                                   name="search" 
                                   value="{{ request('search') }}"
                                   placeholder="Search universities..."
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
                            <!-- Sort Filter -->
                            <select name="sort" class="input-modern">
                                <option value="qs_ranking" {{ request('sort') == 'qs_ranking' ? 'selected' : '' }}>Sort by QS Ranking</option>
                                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Sort by Name</option>
                                <option value="tuition" {{ request('sort') == 'tuition' ? 'selected' : '' }}>Sort by Tuition</option>
                            </select>
                        </div>
                        
                        <div class="flex space-x-3">
                            <a href="{{ route('universities.index') }}" class="btn-secondary">
                                Clear Filters
                            </a>
                            <button type="submit" class="btn-primary">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Results Count -->
            <div class="mb-6">
                <p class="text-secondary-600">
                    Showing {{ $universities->count() }} of {{ $universities->total() }} universities
                </p>
            </div>

            <!-- Universities Grid -->
            @if($universities->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($universities as $index => $university)
                    <div class="card-elevated group animate-scale-in" style="animation-delay: {{ $index * 0.1 }}s;">
                        <div class="p-8">
                            <div class="flex items-start justify-between mb-4">
                                @if($university->logo)
                                <img src="{{ $university->logo }}" 
                                     alt="{{ $university->name }}" 
                                     class="w-12 h-12 object-contain">
                                @else
                                <div class="w-12 h-12 bg-gradient-primary rounded-xl flex items-center justify-center">
                                    <span class="text-white font-bold text-sm">
                                        {{ substr($university->name, 0, 2) }}
                                    </span>
                                </div>
                                @endif
                                @if($university->qs_ranking)
                                <span class="badge badge-primary">QS #{{ $university->qs_ranking }}</span>
                                @endif
                            </div>
                            
                            <h3 class="text-2xl font-bold mb-3 text-secondary-900">{{ $university->name }}</h3>
                            <p class="text-secondary-600 mb-3 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                {{ $university->city }}, {{ $university->country }}
                            </p>
                            
                            <p class="text-secondary-700 text-sm mb-6 leading-relaxed">{{ Str::limit($university->description, 120) }}</p>
                            
                            @if($university->tuition_fee_min)
                            <div class="mb-4">
                                <span class="text-sm text-secondary-600">Tuition: </span>
                                <span class="font-semibold text-green-600">
                                    @if($university->tuition_fee_max)
                                        {{ number_format($university->tuition_fee_min) }} - {{ number_format($university->tuition_fee_max) }} {{ $university->currency }}
                                    @else
                                        {{ number_format($university->tuition_fee_min) }} {{ $university->currency }}
                                    @endif
                                </span>
                            </div>
                            @endif

                            @if($university->programs)
                            <div class="mb-6">
                                <div class="flex flex-wrap gap-2">
                                    @foreach(array_slice($university->programs, 0, 3) as $program)
                                        <span class="badge badge-secondary text-xs">{{ $program }}</span>
                                    @endforeach
                                    @if(count($university->programs) > 3)
                                        <span class="text-secondary-500 text-xs">+{{ count($university->programs) - 3 }} more</span>
                                    @endif
                                </div>
                            </div>
                            @endif
                            
                            <div class="flex justify-between items-center">
                                <a href="{{ route('universities.show', $university) }}" 
                                   class="inline-flex items-center text-primary-600 font-semibold hover:text-primary-700 group-hover:translate-x-1 transition-transform duration-300">
                                    View Details 
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                                @if($university->website)
                                <a href="{{ $university->website }}" 
                                   target="_blank"
                                   class="text-secondary-500 hover:text-secondary-700">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                    </svg>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $universities->appends(request()->query())->links() }}
                </div>
            @else
                <div class="text-center py-16">
                    <div class="w-24 h-24 bg-secondary-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-secondary-900 mb-4">No Universities Found</h3>
                    <p class="text-secondary-600 mb-8 max-w-md mx-auto">
                        We couldn't find any universities matching your criteria. Try adjusting your filters or search terms.
                    </p>
                    <a href="{{ route('universities.index') }}" class="btn-primary">
                        View All Universities
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>