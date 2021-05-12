
<button type="{{ $type ?? 'button' }}" {{ $attributes->merge(['class' => "flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white bg-".($color ?? 'primary')."-600 border border-transparent rounded-lg active:bg-".($color ?? 'primary')."-600 hover:bg-".($color ?? 'primary')."-700 focus:outline-none focus:shadow-outline-".($color ?? 'primary')." transform transition transition-all duration-500 ease-in-out active:scale-90 ". ($class ?? '') ]) }}>
    {{ $slot ?? '' }}
</button>

