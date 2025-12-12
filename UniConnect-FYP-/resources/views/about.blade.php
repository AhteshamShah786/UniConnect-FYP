<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold text-gradient mb-4">About UniConnect</h1>
                <p class="text-lg text-secondary-600">Connecting students with educational opportunities worldwide</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Mission Section -->
            <div class="card-elevated p-8 mb-8">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-gradient-to-br from-primary-100 to-primary-200 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold text-secondary-900 mb-4">Our Mission</h2>
                    <p class="text-xl text-secondary-700 max-w-3xl mx-auto">
                        To democratize access to higher education by connecting students with universities, scholarships, and educational opportunities worldwide.
                    </p>
                </div>
            </div>

            <!-- What We Do Section -->
            <div class="card-elevated p-8 mb-8">
                <h2 class="text-3xl font-bold text-secondary-900 mb-8 text-center">What We Do</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-100 to-green-200 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-secondary-900 mb-3">Scholarship Discovery</h3>
                        <p class="text-secondary-700">
                            We help students find scholarships that match their profile, country, and program of interest.
                        </p>
                    </div>
                    
                    <div class="text-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-100 to-blue-200 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-secondary-900 mb-3">University Exploration</h3>
                        <p class="text-secondary-700">
                            Discover universities worldwide with detailed information about programs, rankings, and admission requirements.
                        </p>
                    </div>
                    
                    <div class="text-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-100 to-purple-200 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-secondary-900 mb-3">Community Support</h3>
                        <p class="text-secondary-700">
                            Connect with fellow students, share experiences, and get advice from the community.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Our Values Section -->
            <div class="card-elevated p-8 mb-8">
                <h2 class="text-3xl font-bold text-secondary-900 mb-8 text-center">Our Values</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-gradient-to-br from-accent-100 to-accent-200 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                            <svg class="w-6 h-6 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-secondary-900 mb-2">Accessibility</h3>
                            <p class="text-secondary-700">We believe education should be accessible to everyone, regardless of their background or financial situation.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-100 to-green-200 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-secondary-900 mb-2">Transparency</h3>
                            <p class="text-secondary-700">We provide clear, accurate information about universities and scholarships to help you make informed decisions.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-100 to-blue-200 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-secondary-900 mb-2">Community</h3>
                            <p class="text-secondary-700">We foster a supportive community where students can share experiences and help each other succeed.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-100 to-purple-200 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-secondary-900 mb-2">Innovation</h3>
                            <p class="text-secondary-700">We continuously improve our platform to provide better tools and resources for students worldwide.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Team Section -->
            <div class="card-elevated p-8 mb-8">
                <h2 class="text-3xl font-bold text-secondary-900 mb-8 text-center">Our Team</h2>
                <div class="text-center">
                    <p class="text-xl text-secondary-700 mb-8 max-w-3xl mx-auto">
                        UniConnect is built by a passionate team of educators, developers, and former international students who understand the challenges of pursuing higher education abroad.
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="text-center">
                            <div class="w-20 h-20 bg-gradient-primary rounded-full flex items-center justify-center mx-auto mb-4">
                                <span class="text-white font-bold text-2xl">JD</span>
                            </div>
                            <h3 class="text-xl font-bold text-secondary-900 mb-2">John Doe</h3>
                            <p class="text-secondary-600 mb-2">Founder & CEO</p>
                            <p class="text-sm text-secondary-700">Former international student with 10+ years in education technology.</p>
                        </div>
                        
                        <div class="text-center">
                            <div class="w-20 h-20 bg-gradient-to-br from-accent-100 to-accent-200 rounded-full flex items-center justify-center mx-auto mb-4">
                                <span class="text-accent-600 font-bold text-2xl">SM</span>
                            </div>
                            <h3 class="text-xl font-bold text-secondary-900 mb-2">Sarah Miller</h3>
                            <p class="text-secondary-600 mb-2">Head of Product</p>
                            <p class="text-sm text-secondary-700">Education specialist focused on student success and accessibility.</p>
                        </div>
                        
                        <div class="text-center">
                            <div class="w-20 h-20 bg-gradient-to-br from-green-100 to-green-200 rounded-full flex items-center justify-center mx-auto mb-4">
                                <span class="text-green-600 font-bold text-2xl">MJ</span>
                            </div>
                            <h3 class="text-xl font-bold text-secondary-900 mb-2">Mike Johnson</h3>
                            <p class="text-secondary-600 mb-2">Lead Developer</p>
                            <p class="text-sm text-secondary-700">Full-stack developer passionate about creating user-friendly platforms.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="card-elevated p-8 bg-gradient-to-br from-primary-50 to-primary-100">
                <div class="text-center">
                    <h2 class="text-3xl font-bold text-secondary-900 mb-4">Ready to Start Your Journey?</h2>
                    <p class="text-xl text-secondary-700 mb-8 max-w-2xl mx-auto">
                        Join thousands of students who have found their perfect educational opportunities through UniConnect.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('scholarships.index') }}" class="btn-primary">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                            Find Scholarships
                        </a>
                        <a href="{{ route('universities.index') }}" class="btn-secondary">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                            Explore Universities
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
