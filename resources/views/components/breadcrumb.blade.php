<div class="flex flex-col flex-wrap my-6">
    <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">{{ $title ?? '' }}</h2>
    <div class="flex gap-1 flex-wrap text-xs md:text-sm dark:text-gray-400">
        {{ $slot ?? '' }}
    </div>
</div>