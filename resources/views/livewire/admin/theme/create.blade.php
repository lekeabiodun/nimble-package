<div>
    <div class="container px-6 mx-auto grid">

        <div class="flex items-center justify-between">
            <div class="flex flex-col flex-wrap my-6">
                <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">Theme</h2>
                <div class="flex gap-1 flex-wrap text-xs md:text-sm dark:text-gray-400">
                    <a href="{{ url('admin') }}" class="text-indigo-500 dark:text-gray-200">Dashboard / </a>
                    <a href="{{ url('admin/themes') }}" class="text-indigo-500 dark:text-gray-200">Themes / </a>
                    <span class="dark:text-gray-200">Create</span>
                </div>
            </div>
        </div>

        <div class="card shadow-2xl bg-white dark:bg-gray-800">

            <div class="card-body px-4">
                <h2 class="card-title text-gray-600 dark:text-gray-300">New theme</h2>
                <div class="flex items-center justify-center">
                    <div class="w-full max-w-2xl">
                        <form wire:submit.prevent="store">
                            <label class="form-control">
                                <label class="label"> <span class="label-text">Name</span> </label> 
                                <input class="input input-bordered @error('name') input-error @enderror" wire:model.defer="name">
                                <x-error-message model="name" />
                            </label>

                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Description</span>
                                </label> 
                                <textarea class="textarea textarea-bordered h-24 @error('description') input-error @enderror" wire:model.defer="description"></textarea>
                                <x-error-message model="description" />
                            </div>

                            <div class="form-control" x-data>
                                <label class="label">
                                    <span class="label-text">Cover photo</span>
                                </label> 

                                <div class="mt-2 flex justify-center border-2 border-gray-300 border-dashed rounded-md cursor-pointer" x-on:click="$refs.cover.click()">
                                    @if($cover)
                                        <img src="{{ $cover->temporaryUrl() }}" class="w-full h-96" />
                                    @endif
                                    <div class="space-y-1 text-center px-6 py-12 @if($cover) hidden @endif">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                            <label class="bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500 dark:bg-gray-800">
                                                <span>Upload a file</span>
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500">PNG, JPG, JPEG up to 1MB</p>
                                    </div>
                                    <input id="file-upload" x-ref="cover" type="file" accept=".png, .jpg, .jpeg" class="sr-only" wire:model="cover">
                                </div>
                                <x-error-message model="cover" />
                            </div>

                            <div class="block mt-4 text-sm cursor-pointer" x-on:click="$refs.file.click()">
                                <label class="block text-sm font-medium text-gray-700">
                                    Theme file
                                </label>
                                <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                            <label class="bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500 dark:bg-gray-800">
                                                <span>Upload a file</span>
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500">
                                            ZIP file up to 10MB
                                        </p>
                                    </div>
                                    <input type="file" accept=".zip" class="sr-only" x-ref="file" wire:model="file">
                                </div>
                                <x-error-message model="file" />
                            </div>

                            <div class="block mt-4 text-sm">
                                <a href="{{ url('admin/themes') }}" class="btn btn-error">Cancel</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>

{{--         

        <div class="grid grid-cols-1 divide-y divide-gray-200 bg-white rounded-lg shadow-md dark:divide-gray-800 dark:bg-gray-800">
            <div class="px-4 pt-3">
                <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">New theme</h4>
            </div>
            <div class="px-4 py-3 mb-8 flex items-center justify-center">
                <div class="w-full max-w-2xl">
                    <form wire:submit.prevent="store">
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Username</span>
                            </label> 
                            <input type="text" placeholder="username" class="input input-bordered @error('name') input-error @enderror dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray">
                            @error('name')
                            <label class="label">
                                <span class="label-text-alt">Data is incorrect</span>
                            </label>
                            
                            @enderror
                        </div>
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Name</span>
                            <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input @error('name') error @enderror" wire:model.defer="name">
                            @error('name') <span class="text-xs text-red-600 dark:text-red-400"> {{ $message }} </span> @enderror
                        </label>

                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Description</span>
                            <textarea class="input form-textarea @error('name') error @enderror" rows="5" wire:model.defer="description"></textarea>
                            @error('description') <span class="text-xs text-red-600 dark:text-red-400"> {{ $message }} </span> @enderror
                        </label>

                         <div class="block mt-4 text-sm" x-data>
                            <label class="block text-sm font-medium text-gray-700">
                                Cover photo
                            </label>
                            <div class="mt-2 flex justify-center border-2 border-gray-300 @error('cover') border-red-400 @enderror border-dashed rounded-md cursor-pointer dark:bg-gray-800" x-on:click="$refs.cover.click()">
                                @if($cover)
                                    <img src="{{ $cover->temporaryUrl() }}" class="w-full h-full max-h-screen object-cover" />
                                @endif
                                <div class="space-y-1 text-center px-6 py-12 @if($cover) hidden @endif">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500 dark:bg-gray-800">
                                            <span>Upload a file</span>
                                            <input id="file-upload" x-ref="cover" type="file" accept=".png, .jpg, .jpeg" class="sr-only" wire:model="cover">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, JPEG up to 1MB</p>
                                </div>
                                
                            </div>
                            @error('cover') <span class="text-xs text-red-600 dark:text-red-400"> {{ $message }} </span> @enderror
                        </div>

                         <div class="block mt-4 text-sm">
                            <label class="block text-sm font-medium text-gray-700">
                                Theme file
                            </label>
                            <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 @error('file') border-red-400 @enderror border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                
                                <svg class="mx-auto h-12 w-12 text-gray-400"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500 dark:bg-gray-800">
                                        <span>Upload a file</span>
                                        <input id="file-upload" type="file" accept=".zip" class="sr-only">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">
                                    ZIP file up to 10MB
                                </p>
                                </div>
                            </div>
                            @error('file') <span class="text-xs text-red-600 dark:text-red-400"> {{ $message }} </span> @enderror
                        </div>

                        <div class="block mt-4 text-sm">
                            <a href="{{ url('admin/themes') }}" class="btn btn-error">
                            Cancel
                            </a>
                            <x-button-loader type="submit"> Submit </x-button-loader>
                            <button class="btn btn-primary" wire:loading.remove>Submit</button>
                            <button class="btn btn-primary loading" wire:loading>Submit</button>
                            <button class="btn glass btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
    </div>
</div>
