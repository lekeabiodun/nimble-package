<div>
    <div class="container px-6 mx-auto grid">
        <div class="flex items-center justify-between">
            <div class="flex flex-col flex-wrap my-6">
                <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">Theme</h2>
                <div class="flex gap-1 flex-wrap text-xs md:text-sm dark:text-gray-400">
                    <a href="{{ url('admin') }}" class="text-indigo-500 dark:text-gray-200">Dashboard / </a>
                    <a href="{{ url('admin/themes') }}" class="text-indigo-500 dark:text-gray-200">Themes / </a>
                    <span  class="dark:text-gray-200" class="dark:text-gray-200">Theme</span>
                </div>
            </div>

            <div>
                <a href="{{ url('admin/themes/create/') }}" class="flex items-center justify-between btn btn-warning normal-case dark:text-white">
                     <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                    </svg>
                  <span>Add</span>
                </a>
            </div>
        </div>
        
        <div class="pt-3">
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">Theme</h4>
        </div>

        <div class="flex items-center justify-center">
            <div class="card shadow-md bg-white divide-y-2 divide-gray-200 w-2/3">
                <figure>
                    <img src="{{ $theme->cover() }}" class="w-full h-72 object-cover">
                </figure> 
                <div class="card-body md:px-8 px-2">
                    <h2 class="card-title">{{ $theme->name }}</h2> 
                    {{-- <p>{{ $theme->description }}</p>  --}}
                    <div class="space-x-2 card-actions">
                        <button class="btn btn-outline btn-primary">More info</button>
                        <button class="btn btn-primary">Preview</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
