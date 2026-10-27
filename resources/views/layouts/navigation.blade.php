<nav x-data="{ open: false }" class="fixed left-0 top-0 z-50 h-screen bg-navy-900 text-white sidebar-transition sidebar-expanded md:sidebar-expanded md:relative md:static md:inset-0 md:h-auto md:flex md:flex-row md:items-center">
    <!-- Sidebar -->
    <div class="flex flex-col h-full border-r border-navy-800">
        <!-- Logo / Brand -->
        <div class="flex items-center justify-between h-16 px-6 bg-navy-800 border-b border-navy-700">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                <x-application-logo class="block" />
            </a>
            <button @click="open = false" class="md:hidden p-2 text-navy-300 hover:text-white focus:outline-none">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Main Navigation -->
        <div class="flex-1 overflow-y-auto px-3 py-4 space-y-1">
            <x-nav-group :title="__('Navigation')">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>
            </x-nav-group>
        </div>

        <!-- Bottom: User Profile -->
        <div class="p-4 border-t border-navy-700">
            <div class="px-3">
                <div class="font-medium text-base text-navy-100">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-navy-300">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1 px-3">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

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
    </div>

    <!-- Hamburger (mobile only) -->
    <div class="md:hidden p-3 bg-navy-900 border-t border-navy-700">
        <button @click="open = ! open" class="p-2 text-navy-300 hover:text-white focus:outline-none">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path :class="{'hidden': open, 'inline-flex': !open}" stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{'hidden': !open, 'inline-flex': open}" stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Overlay (mobile) -->
    <div x-show="open" x-transition class="fixed inset-0 z-40 bg-black/50 md:hidden" @click="open = false"></div>
</nav>