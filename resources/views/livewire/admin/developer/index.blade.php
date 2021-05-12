<div>
<x-dashboard>
    <div class="container px-6 mx-auto grid">
        <div class="flex items-center justify-between">
            <div class="flex flex-col flex-wrap my-6">
                <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">Developers</h2>
                <div class="flex gap-1 flex-wrap text-xs md:text-sm dark:text-gray-400">
                    <a href="{{ url('admin') }}" class="text-indigo-500 dark:text-gray-200">Dashboard / </a>
                    <span  class="dark:text-gray-200" class="dark:text-gray-200">Developers</span>
                </div>
            </div>

            <div>
                <a href="{{ url('admin/developers/create/') }}" class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-indigo-600 border border-transparent rounded-lg active:bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:shadow-outline-indigo">
                    <svg class="w-4 h-4 md:w-6 md:h-6 mr-2 -ml-1 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                  <span>Add</span>
                </a>
            </div>
        </div>
        
        <div class="pt-3 md:flex justify-between">
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">Developers</h4>
            <label class="form-control mb-2">
                <input class="input input-bordered" wire:model="search">
            </label>
        </div>  

        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">SN</th>
                            <th class="px-4 py-3">Developer</th>
                            <th class="px-4 py-3">Themes</th>
                            <th class="px-4 py-3">Group</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach($developers as $developer)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3"> <p class="font-semibold"> {{ $developers->firstItem() + $loop->index }}</p> </p> </td>
                                <td class="px-4 py-3 text-sm">
                                    <div class="flex items-center text-sm">
                                        <!-- Avatar with inset shadow -->
                                          <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                              <img class="object-cover w-full h-full rounded-full" src="{{ $developer->photo() }}" alt="" loading="lazy">
                                              <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                          </div>
                                          <div>
                                              <p class="font-semibold">{{ $developer->name }}</p>
                                              <p class="text-xs text-gray-600 dark:text-gray-400"> {{ $developer->level }}X Developer </p>
                                          </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3"> <p class="font-semibold"> {{ $developer->themes->count() }} </p> </td>
                                <td class="px-4 py-3"> <p class="font-semibold"> {{ $developer->group->name ?? '' }} </p> </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="{{ url('admin/developers/' . $developer->username . '/edit') }}"class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-indigo-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                            </svg>
                                        </a>
                                        <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-indigo-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" x-on:click="$dispatch('sweet-delete-modal', { model: 'Developer', id: {{ $developer->id }} })" aria-label="Delete">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex justify-between px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                <span class="flex items-center col-span-3">
                    Showing {{ $developers->firstItem() .' - '. $developers->lastItem() .' of '. $developers->total() }}
                </span>
                <span class="col-span-2"></span>
                <!-- Pagination -->
                {{ $developers->links() }}
            </div>
        </div>
    </div>
</x-dashboard>
</div>
