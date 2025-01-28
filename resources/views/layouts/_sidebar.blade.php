<div class="space-y-6 mt-10">
    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
    <x-dash-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
        <x-icons.dashboard class="h-6 w-auto" />
        <span>Dashboard</span>
    </x-dash-link>
    <x-dash-link href="{{ route('profile.edit') }}" :active="request()->routeIs('profile.edit')">
        <x-icons.user class="h-6 w-auto" />
        <span>Profile</span>
    </x-dash-link>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <x-dash-link type="button"
            onclick="event.preventDefault();
                this.closest('form').submit();" :active="request()->routeIs('logout')"
        >
            <x-icons.logout class="h-6 w-auto" />
            <span>Sign out</span>
        </x-dash-link>
    </form>
</div>
