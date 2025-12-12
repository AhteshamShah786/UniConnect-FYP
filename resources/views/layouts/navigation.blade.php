<nav x-data="{ open: false }" class="bg-white shadow-lg border-b-2 border-blue-100 sticky top-0 z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center group">
                        <div class="w-14 h-14 bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg group-hover:shadow-xl transition-all duration-300 group-hover:scale-105">
                            <span class="text-white font-bold text-2xl">UC</span>
                        </div>
                        <div>
                            <span class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">UniConnect</span>
                            <p class="text-xs text-gray-500 hidden lg:block -mt-1">Connecting Students Worldwide</p>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-2 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link :href="route('universities.index')" :active="request()->routeIs('universities.*')">
                        {{ __('Universities') }}
                    </x-nav-link>
                    <x-nav-link :href="route('scholarships.index')" :active="request()->routeIs('scholarships.*')">
                        {{ __('Scholarships') }}
                    </x-nav-link>
                    <x-nav-link :href="route('networking.index')" :active="request()->routeIs('networking.*')">
                        {{ __('Community') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <x-dropdown align="right" width="56">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-4 py-3 border border-transparent text-sm leading-4 font-medium rounded-xl text-secondary-600 bg-white/50 hover:text-primary-600 hover:bg-primary-50 focus:outline-none transition-all duration-300 shadow-soft hover:shadow-medium">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-gradient-primary rounded-full flex items-center justify-center mr-3">
                                        <span class="text-white font-semibold text-sm">
                                            {{ substr(Auth::user()->name, 0, 1) }}
                                        </span>
                                    </div>
                                    <div>{{ Auth::user()->name }}</div>
                                </div>

                                <div class="ms-2">
                                    <svg class="fill-current h-4 w-4 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="py-2">
                                <x-dropdown-link :href="route('profile.show')" class="flex items-center px-4 py-2 text-sm text-secondary-700 hover:bg-primary-50 hover:text-primary-600 transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    {{ __('My Profile') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('profile.edit')" class="flex items-center px-4 py-2 text-sm text-secondary-700 hover:bg-primary-50 hover:text-primary-600 transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    {{ __('Settings') }}
                                </x-dropdown-link>
                            </div>

                            <!-- Authentication -->
                            <div class="border-t border-secondary-200 pt-2">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();"
                                            class="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors duration-200">
                                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                        </svg>
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </x-slot>
                    </x-dropdown>
                @else
                    <div class="flex space-x-3">
                        <a href="{{ route('login') }}" class="btn-ghost">Login</a>
                        <a href="{{ route('register') }}" class="btn-primary">Register</a>
                    </div>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-3 rounded-xl text-secondary-400 hover:text-primary-600 hover:bg-primary-50 focus:outline-none focus:bg-primary-50 focus:text-primary-600 transition-all duration-200">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white/95 backdrop-blur-md border-t border-secondary-200">
        <div class="pt-4 pb-3 space-y-2 px-4">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('universities.index')" :active="request()->routeIs('universities.*')">
                {{ __('Universities') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('scholarships.index')" :active="request()->routeIs('scholarships.*')">
                {{ __('Scholarships') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('networking.index')" :active="request()->routeIs('networking.*')">
                {{ __('Community') }}
            </x-responsive-nav-link>
        </div>

        @auth
            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-3 border-t border-secondary-200">
                <div class="px-4 mb-3">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-gradient-primary rounded-full flex items-center justify-center mr-3">
                            <span class="text-white font-semibold">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </span>
                        </div>
                        <div>
                            <div class="font-medium text-base text-secondary-900">{{ Auth::user()->name }}</div>
                            <div class="font-medium text-sm text-secondary-500">{{ Auth::user()->email }}</div>
                        </div>
                    </div>
                </div>

                <div class="space-y-1 px-4">
                    <x-responsive-nav-link :href="route('profile.show')">
                        {{ __('My Profile') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Settings') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @endauth
    </div>
</nav>
