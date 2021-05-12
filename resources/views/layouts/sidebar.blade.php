
    <!-- Desktop sidebar -->
    <aside class="z-10 min-w-20 overflow-y-auto hidden bg-gray-100 dark:bg-gray-800 md:block flex-shrink-0 shadow-lg" x-data x-bind:class="{'w-20': !$store.sidebar.open, 'w-64': $store.sidebar.open}">
        <div class="text-gray-600 text-md font-semibold dark:text-gray-400">
            <div class="flex justify-between py-4 px-6 h-14 shadow-lg bg-gray-50 dark:bg-gray-700">
                <a class="text-md font-bold flex h-full focus:outline-none focus:ring focus:ring-purple-600 focus:ring-opacity-50 focus:ring-offset-2" x-bind:class="{'hidden': !$store.sidebar.open}" href="#">
                    <x-logo /> <span class="ml-4">{{ config('app.name') }}</span>
                </a>
            </div>
            <x-menu />
        </div>
    </aside>


    <!-- Mobile sidebar -->
    <!-- Backdrop -->
    <div x-data
        x-show="$store.sidebar.menu"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
    </div>

    <aside x-data
        class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-14 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
        x-show="$store.mobile.sidebar.open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="transform -translate-x-40"
        x-transition:enter-end="transform -translate-x-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="transform -translate-x-0"
        x-transition:leave-end="transform -translate-x-40"
        x-on:click.away="$store.mobile.sidebar.close()"
        x-on:keydown.escape="$store.mobile.sidebar.close()"
    >
        <div class="py-4 text-gray-600 dark:text-gray-400">        
            <x-menu />
        </div>
    </aside>