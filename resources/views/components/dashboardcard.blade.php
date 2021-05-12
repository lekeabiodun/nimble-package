<!-- Card -->
<a href="{{ $url ?? '#' }}">
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-2 mr-4 text-purple-600 bg-purple-100 rounded-full dark:text-purple-100 dark:bg-purple-600">
            {{ $slot ?? '' }}
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">{{ $title ?? '' }}</p>
            <p class="text-lg font-semibold text-gray-600 dark:text-gray-400">{{ $subtitle ?? '' }}</p>
        </div>
    </div>
</a>