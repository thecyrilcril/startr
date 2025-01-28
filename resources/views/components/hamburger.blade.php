<div
    x-data="{
        menuOpen: false
    }"
    x-modelable="open" x-model="menuOpen"
    class="grid grid-rows-[1/-1] grid-cols-[1/-1]">
{{--     <button x-show="!menuOpen" @click="menuOpen = !menuOpen" aria-label="Open main menu" class="inline-flex items-center justify-center p-2 rounded-md text-gray-600 dark:text-gray-300 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
        <x-icons.hamburger class="h-6 w-6" />
    </button>
    <button x-show="menuOpen" @click="menuOpen = !menuOpen" aria-label="Close main menu" class="inline-flex items-center justify-center p-2 rounded-md text-gray-600 dark:text-gray-300 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
        <x-icons.close class="h-6 w-6" />
    </button> --}}
    <button @click="menuOpen = !menuOpen" :aria-label="(menuOpen === false) ? `Open main menu` : `Close main menu`" class="inline-flex items-center justify-center p-2 rounded-md text-gray-600 dark:text-gray-300 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
        <x-icons.hamburger x-show="!menuOpen" class="h-6 w-6" />
        <x-icons.close x-show="menuOpen" class="h-6 w-6" />
    </button>
</div>
