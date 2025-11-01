<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold text-gradient mb-4">Scholarship Eligibility Check</h1>
                <p class="text-lg text-secondary-600">Find scholarships that match your profile</p>
            </div>
            <a href="{{ route('scholarships.index') }}" class="btn-secondary">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Scholarships
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="card-elevated p-8">
                <form method="GET" action="{{ route('scholarships.index') }}" class="space-y-6">
                    <div class="text-center mb-8">
                        <div class="w-16 h-16 bg-gradient-to-br from-primary-100 to-primary-200 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-secondary-900 mb-2">Check Your Eligibility</h2>
                        <p class="text-secondary-600">Fill out the form below to find scholarships that match your profile</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Country -->
                        <div>
                            <label for="country" class="block text-sm font-medium text-secondary-700 mb-2">
                                Your Country
                            </label>
                            <select name="country" id="country" class="input-modern">
                                <option value="">Select your country</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country }}">{{ $country }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Program -->
                        <div>
                            <label for="program" class="block text-sm font-medium text-secondary-700 mb-2">
                                Program of Interest
                            </label>
                            <select name="program" id="program" class="input-modern">
                                <option value="">Select program</option>
                                @foreach($programs as $program)
                                    <option value="{{ $program }}">{{ $program }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Additional Filters -->
                    <div class="border-t border-secondary-200 pt-6">
                        <h3 class="text-lg font-semibold text-secondary-900 mb-4">Additional Filters</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Coverage Type -->
                            <div>
                                <label for="coverage" class="block text-sm font-medium text-secondary-700 mb-2">
                                    Coverage Type
                                </label>
                                <select name="coverage" id="coverage" class="input-modern">
                                    <option value="">Any coverage</option>
                                    <option value="full">Full Coverage</option>
                                    <option value="partial">Partial Coverage</option>
                                    <option value="tuition">Tuition Only</option>
                                    <option value="living">Living Expenses</option>
                                </select>
                            </div>

                            <!-- Amount Range -->
                            <div>
                                <label for="amount_range" class="block text-sm font-medium text-secondary-700 mb-2">
                                    Amount Range
                                </label>
                                <select name="amount_range" id="amount_range" class="input-modern">
                                    <option value="">Any amount</option>
                                    <option value="0-5000">$0 - $5,000</option>
                                    <option value="5000-10000">$5,000 - $10,000</option>
                                    <option value="10000-25000">$10,000 - $25,000</option>
                                    <option value="25000+">$25,000+</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Search Button -->
                    <div class="text-center pt-6">
                        <button type="submit" class="btn-primary text-lg px-8 py-3">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            Find Matching Scholarships
                        </button>
                    </div>
                </form>
            </div>

            <!-- Tips Section -->
            <div class="mt-12 card-elevated p-8">
                <h3 class="text-2xl font-bold text-secondary-900 mb-6">Tips for Finding Scholarships</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="w-8 h-8 bg-gradient-to-br from-green-100 to-green-200 rounded-lg flex items-center justify-center mr-3 flex-shrink-0">
                                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-secondary-900 mb-1">Start Early</h4>
                                <p class="text-sm text-secondary-600">Begin your scholarship search at least 12 months before you plan to start your studies.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="w-8 h-8 bg-gradient-to-br from-blue-100 to-blue-200 rounded-lg flex items-center justify-center mr-3 flex-shrink-0">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-secondary-900 mb-1">Apply to Multiple</h4>
                                <p class="text-sm text-secondary-600">Don't limit yourself to just one scholarship. Apply to as many as you're eligible for.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="w-8 h-8 bg-gradient-to-br from-purple-100 to-purple-200 rounded-lg flex items-center justify-center mr-3 flex-shrink-0">
                                <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-secondary-900 mb-1">Read Requirements</h4>
                                <p class="text-sm text-secondary-600">Carefully review all eligibility criteria and required documents before applying.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="w-8 h-8 bg-gradient-to-br from-orange-100 to-orange-200 rounded-lg flex items-center justify-center mr-3 flex-shrink-0">
                                <svg class="w-4 h-4 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-secondary-900 mb-1">Meet Deadlines</h4>
                                <p class="text-sm text-secondary-600">Keep track of application deadlines and submit your applications well in advance.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
