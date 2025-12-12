<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold text-gradient mb-4">{{ $university->name }}</h1>
                <p class="text-lg text-secondary-600">{{ $university->city }}, {{ $university->country }}</p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('universities.index') }}" class="btn-secondary">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Universities
                </a>
                @if($university->website)
                <a href="{{ $university->website }}" target="_blank" class="btn-primary">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                    </svg>
                    Visit Website
                </a>
                @endif
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <!-- University Overview -->
                    <div class="card-elevated p-8 mb-8">
                        <div class="flex items-start justify-between mb-6">
                            @if($university->logo)
                            <img src="{{ $university->logo }}" 
                                 alt="{{ $university->name }}" 
                                 class="w-20 h-20 object-contain">
                            @else
                            <div class="w-20 h-20 bg-gradient-primary rounded-xl flex items-center justify-center">
                                <span class="text-white font-bold text-2xl">
                                    {{ substr($university->name, 0, 2) }}
                                </span>
                            </div>
                            @endif
                            <div class="flex space-x-2">
                                @if($university->qs_ranking)
                                <span class="badge badge-primary">QS #{{ $university->qs_ranking }}</span>
                                @endif
                                @if($university->times_ranking)
                                <span class="badge badge-success">THE #{{ $university->times_ranking }}</span>
                                @endif
                            </div>
                        </div>

                        <h2 class="text-2xl font-bold text-secondary-900 mb-6">About {{ $university->name }}</h2>
                        <div class="prose prose-lg max-w-none text-secondary-700">
                            {!! nl2br(e($university->description)) !!}
                        </div>
                    </div>

                    @if($university->programs)
                    <!-- Programs Offered -->
                    <div class="card-elevated p-8 mb-8">
                        <h2 class="text-2xl font-bold text-secondary-900 mb-6">Programs Offered</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($university->programs as $program)
                            <div class="flex items-center p-4 bg-secondary-50 rounded-xl">
                                <svg class="w-5 h-5 text-primary-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                                <span class="text-secondary-900 font-medium">{{ $program }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    @if($university->admission_requirements)
                    <!-- Admission Requirements -->
                    <div class="card-elevated p-8 mb-8">
                        <h2 class="text-2xl font-bold text-secondary-900 mb-6">Admission Requirements</h2>
                        <ul class="space-y-3">
                            @foreach($university->admission_requirements as $requirement)
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-600 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-secondary-700">{{ $requirement }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if($university->scholarships->count() > 0)
                    <!-- Available Scholarships -->
                    <div class="card-elevated p-8 mb-8">
                        <h2 class="text-2xl font-bold text-secondary-900 mb-6">Available Scholarships</h2>
                        <div class="space-y-4">
                            @foreach($university->scholarships->take(5) as $scholarship)
                            <div class="border border-secondary-200 rounded-xl p-4 hover:bg-secondary-50 transition-colors duration-200">
                                <div class="flex justify-between items-start mb-2">
                                    <h3 class="font-semibold text-secondary-900">{{ $scholarship->title }}</h3>
                                    @if($scholarship->amount)
                                    <span class="badge badge-success">
                                        {{ number_format($scholarship->amount) }} {{ $scholarship->currency }}
                                    </span>
                                    @endif
                                </div>
                                <p class="text-sm text-secondary-600 mb-2">{{ Str::limit($scholarship->description, 100) }}</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-xs text-secondary-500">
                                        Deadline: {{ $scholarship->application_deadline->format('M d, Y') }}
                                    </span>
                                    <a href="{{ route('scholarships.show', $scholarship) }}" 
                                       class="text-primary-600 hover:text-primary-700 text-sm font-medium">
                                        View Details →
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @if($university->scholarships->count() > 5)
                        <div class="text-center mt-6">
                            <a href="{{ route('scholarships.index', ['university' => $university->name]) }}" 
                               class="btn-secondary">
                                View All {{ $university->scholarships->count() }} Scholarships
                            </a>
                        </div>
                        @endif
                    </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- University Details -->
                    <div class="card-elevated p-6">
                        <h3 class="text-xl font-bold text-secondary-900 mb-4">University Details</h3>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center">
                                <span class="text-secondary-600">Location</span>
                                <span class="font-semibold text-secondary-900">{{ $university->city }}, {{ $university->country }}</span>
                            </div>

                            @if($university->qs_ranking)
                            <div class="flex justify-between items-center">
                                <span class="text-secondary-600">QS Ranking</span>
                                <span class="font-semibold text-secondary-900">#{{ $university->qs_ranking }}</span>
                            </div>
                            @endif

                            @if($university->times_ranking)
                            <div class="flex justify-between items-center">
                                <span class="text-secondary-600">THE Ranking</span>
                                <span class="font-semibold text-secondary-900">#{{ $university->times_ranking }}</span>
                            </div>
                            @endif

                            @if($university->tuition_fee_min)
                            <div class="flex justify-between items-center">
                                <span class="text-secondary-600">Tuition Range</span>
                                <span class="font-semibold text-green-600">
                                    @if($university->tuition_fee_max)
                                        {{ number_format($university->tuition_fee_min) }} - {{ number_format($university->tuition_fee_max) }} {{ $university->currency }}
                                    @else
                                        {{ number_format($university->tuition_fee_min) }} {{ $university->currency }}
                                    @endif
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>

                    @if($university->contact_info)
                    <!-- Contact Information -->
                    <div class="card-elevated p-6">
                        <h3 class="text-xl font-bold text-secondary-900 mb-4">Contact Information</h3>
                        <div class="space-y-3">
                            @if(isset($university->contact_info['email']))
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-secondary-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <span class="text-sm text-secondary-700">{{ $university->contact_info['email'] }}</span>
                            </div>
                            @endif

                            @if(isset($university->contact_info['phone']))
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-secondary-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                <span class="text-sm text-secondary-700">{{ $university->contact_info['phone'] }}</span>
                            </div>
                            @endif

                            @if(isset($university->contact_info['address']))
                            <div class="flex items-start">
                                <svg class="w-4 h-4 text-secondary-500 mr-3 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span class="text-sm text-secondary-700">{{ $university->contact_info['address'] }}</span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif

                    @if($university->website)
                    <!-- Quick Actions -->
                    <div class="card-elevated p-6 bg-gradient-to-br from-primary-50 to-primary-100">
                        <h3 class="text-xl font-bold text-secondary-900 mb-4">Quick Actions</h3>
                        <div class="space-y-3">
                            <a href="{{ $university->website }}" 
                               target="_blank" 
                               class="btn-primary w-full justify-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                </svg>
                                Visit Official Website
                            </a>
                            <a href="{{ route('scholarships.index', ['university' => $university->name]) }}" 
                               class="btn-secondary w-full justify-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                </svg>
                                View Scholarships
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
