<x-base>

    <div class="flex h-screen bg-gray-200 dark:bg-gray-900" :class="{ 'overflow-hidden': $store.sidebar.menu}">

        @include('layouts.sidebar')

        <div class="flex flex-col flex-1">

            @include('layouts.navbar')

            <main class="h-full pb-16 overflow-y-auto">
                
                {{ $slot ?? '' }}
                
            </main>
        </div>      

    </div>

</x-base>