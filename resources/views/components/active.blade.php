{{-- 
<!-- Active items have the snippet below -->
<!-- <span
class="absolute inset-y-0 left-0 w-1 bg-primary-600 rounded-tr-lg rounded-br-lg"
aria-hidden="true"
></span> -->

<!-- Add this classes to an active anchor (a tag) -->
<!-- text-gray-800 dark:text-gray-100 --> 

--}}

@isset($path)
    @if(request()->is($path))
        <span class="absolute inset-y-0 left-0 w-1 bg-primary-600 dark:bg-primary-300 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
    @endif
@endisset