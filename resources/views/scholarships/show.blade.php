<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold text-gradient mb-4">{{ $scholarship->title }}</h1>
                <p class="text-lg text-secondary-600">{{ $scholarship->provider ?? 'Scholarship Details' }}</p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('scholarships.index') }}" class="btn-secondary">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Scholarships
                </a>
                @if($scholarship->application_link)
                <a href="{{ $scholarship->application_link }}" target="_blank" class="btn-primary">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                    </svg>
                    Apply Now
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
                    <div class="card-elevated p-8 mb-8">
                        <h2 class="text-2xl font-bold text-secondary-900 mb-6">About This Scholarship</h2>
                        <div class="prose prose-lg max-w-none text-secondary-700">
                            {!! nl2br(e($scholarship->description)) !!}
                        </div>
                    </div>

                    @if($scholarship->eligibility_criteria)
                    <div class="card-elevated p-8 mb-8">
                        <h2 class="text-2xl font-bold text-secondary-900 mb-6">Eligibility Criteria</h2>
                        <ul class="space-y-3">
                            @foreach($scholarship->eligibility_criteria as $criterion)
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-green-600 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-secondary-700">{{ $criterion }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if($scholarship->required_documents)
                    <div class="card-elevated p-8 mb-8">
                        <h2 class="text-2xl font-bold text-secondary-900 mb-6">Required Documents</h2>
                        <ul class="space-y-3">
                            @foreach($scholarship->required_documents as $document)
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-primary-600 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <span class="text-secondary-700">{{ $document }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Scholarship Details -->
                    <div class="card-elevated p-6">
                        <h3 class="text-xl font-bold text-secondary-900 mb-4">Scholarship Details</h3>
                        <div class="space-y-4">
                            @if($scholarship->amount)
                            <div class="flex justify-between items-center">
                                <span class="text-secondary-600">Amount</span>
                                <span class="font-semibold text-green-600">
                                    {{ number_format($scholarship->amount) }} {{ $scholarship->currency }}
                                </span>
                            </div>
                            @endif

                            @if($scholarship->coverage)
                            <div class="flex justify-between items-center">
                                <span class="text-secondary-600">Coverage</span>
                                <span class="font-semibold text-secondary-900">{{ ucfirst($scholarship->coverage) }}</span>
                            </div>
                            @endif

                            <div class="flex justify-between items-center">
                                <span class="text-secondary-600">Deadline</span>
                                <span class="font-semibold text-secondary-900">
                                    {{ $scholarship->application_deadline->format('M d, Y') }}
                                </span>
                            </div>

                            @if($scholarship->announcement_date)
                            <div class="flex justify-between items-center">
                                <span class="text-secondary-600">Announcement</span>
                                <span class="font-semibold text-secondary-900">
                                    {{ $scholarship->announcement_date->format('M d, Y') }}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>

                    @if($scholarship->university)
                    <!-- University Info -->
                    <div class="card-elevated p-6">
                        <h3 class="text-xl font-bold text-secondary-900 mb-4">Offered By</h3>
                        <div class="flex items-center mb-4">
                            @if($scholarship->university->logo)
                            <img src="{{ $scholarship->university->logo }}" 
                                 alt="{{ $scholarship->university->name }}" 
                                 class="w-12 h-12 object-contain mr-4">
                            @else
                            <div class="w-12 h-12 bg-gradient-primary rounded-lg flex items-center justify-center mr-4">
                                <span class="text-white font-bold text-sm">
                                    {{ substr($scholarship->university->name, 0, 2) }}
                                </span>
                            </div>
                            @endif
                            <div>
                                <h4 class="font-semibold text-secondary-900">{{ $scholarship->university->name }}</h4>
                                <p class="text-sm text-secondary-600">{{ $scholarship->university->city }}, {{ $scholarship->university->country }}</p>
                            </div>
                        </div>
                        <a href="{{ route('universities.show', $scholarship->university) }}" 
                           class="btn-secondary w-full justify-center">
                            View University
                        </a>
                    </div>
                    @endif

                    @if($scholarship->programs_covered)
                    <!-- Programs Covered -->
                    <div class="card-elevated p-6">
                        <h3 class="text-xl font-bold text-secondary-900 mb-4">Programs Covered</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($scholarship->programs_covered as $program)
                            <span class="badge badge-primary">{{ $program }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    @if($scholarship->countries_eligible)
                    <!-- Eligible Countries -->
                    <div class="card-elevated p-6">
                        <h3 class="text-xl font-bold text-secondary-900 mb-4">Eligible Countries</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($scholarship->countries_eligible as $country)
                            <span class="badge badge-secondary">{{ $country }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    @if($scholarship->application_link)
                    <!-- Apply Button -->
                    <div class="card-elevated p-6 bg-gradient-to-br from-primary-50 to-primary-100">
                        <h3 class="text-xl font-bold text-secondary-900 mb-4">Ready to Apply?</h3>
                        <p class="text-secondary-600 mb-6">
                            Click the button below to visit the official application page.
                        </p>
                        <a href="{{ $scholarship->application_link }}" 
                           target="_blank" 
                           class="btn-primary w-full justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                            Apply Now
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
