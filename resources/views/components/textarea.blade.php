<textarea
{{ $attributes->merge(['class' => "block w-full mt-1 py-2 text-lg rounded-lg border border-gray-300 focus:border-".($color ?? 'primary')."-400 focus:outline-none focus:shadow-outline-".($color ?? 'primary')." focus:ring-2 focus:ring-primary-600 focus:ring-offset-2 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray dark:focus:ring-offset-gray-600 placeholder-gray-400 placeholder-opacity-50 ". ($class ?? '') ]) }}> {{ $slot ?? '' }} </textarea>

