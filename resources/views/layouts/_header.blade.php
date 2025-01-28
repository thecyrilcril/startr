<header
    x-data="{
        open: false,
        async init() {
            await $nextTick()
        }
    }"
    class="dark:bg-gray-900"
>
    <nav aria-label="Main Navigation">
        <div class="w-full mx-auto hidden lg:flex lg:justify-between items-center gap-6 capitalize px-6">

            <a href="/" class="my-6 flex">
                <span class="font-bold uppercase">Startr 2025</span>
            </a>

            <div class="flex space-x-6">
                <x-main-link href="#">
                    {{ __('Products') }}
                </x-main-link>
                <x-main-link href="#">
                    {{ __('Services') }}
                </x-main-link>
                <x-main-link :href="route('contact')" :active="request()->routeIs('contact')">
                    {{ __('Contact') }}
                </x-main-link>
            </div>

            <div class="flex space-x-6">
                <x-toggle-darkmode />
                <a href="/login" class="ml-auto" title="Login to your account">Login</a>
                <a href="/register" title="Create a new account">Register</a>
            </div>
        </div>
        <div class="w-full lg:hidden lg:max-w-5xl mx-auto font-medium">
            <div class="flex justify-between p-4">
                <a href="/" class="flex items-center">
                    <span class="font-bold uppercase">Startr 2025</span>
                </a>
                <x-toggle-darkmode />
                <x-hamburger />
            </div>
            <div
                x-cloak
                x-show="open"
                @click.outside="open = false"
                x-on:keydown.window.escape.prevent.stop="open = false"
                x-transition.scale-y.origin.top
                class="bg-white dark:bg-gray-800 fixed inset-x-0 z-10 p-4 rounded-lg shadow-lg mx-auto md:hidden flex flex-col"
            >
                <h2 class="sr-only">Mobile Menu</h2>
                <div class="flex flex-col text-lg space-y-1">
                    <x-main-link href="#">
                        {{ __('Products') }}
                    </x-main-link>
                    <x-main-link href="#">
                        {{ __('Services') }}
                    </x-main-link>
                    <x-main-link :href="route('contact')" :active="request()->routeIs('contact')">
                        {{ __('Contact') }}
                    </x-main-link>
                </div>
                <span class="inline-flex self-center items-center text-sm py-4 divide-x space-x-2 text-gray-600 dark:text-gray-100">
                    <a href="/login" class="transition-colors hover:text-gray-400" title="Login to your account">Login</a>
                    <a href="/register" class="pl-2 transition-colors hover:text-gray-400" title="Create a new account">Register</a>
                </span>
            </div>
        </div>
    </nav>
</header>
