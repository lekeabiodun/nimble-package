<div>
    <div class="container px-2 md:px-4 lg:px-6 mx-auto grid">

        <div class="flex items-center justify-between">
            <div class="flex flex-col flex-wrap my-6">
                <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">Clients</h2>
                <div class="flex gap-1 flex-wrap text-xs md:text-sm dark:text-gray-400">
                    <a href="{{ url('admin') }}" class="text-indigo-500 dark:text-gray-200">Dashboard / </a>
                    <a href="{{ url('admin/clients') }}" class="text-indigo-500 dark:text-gray-200">Clients / </a>
                    <span class="dark:text-gray-200">Create</span>
                </div>
            </div>
        </div>

        <div class="px-2 md:px-4 lg:px-6 py-2 shadow-md bg-white rounded-lg dark:bg-gray-800">
            <div class="">
                <h2 class="py-2 text-bold text-2xl text-gray-600 dark:text-gray-400">New client</h2>
            </div>
            <div class="mt-2">
                <div class="w-full">
                    <form wire:submit.prevent="store">

                        <div class="block lg:flex lg:flex-row-reverse">

                            <div class="lg:w-1/4 lg:px-6">
                                <div class="relative cursor-pointer">
                                    @if($photo)
                                        <div class="rounded-full w-full h-full ring ring-indigo-300 ring-offset-default ring-offset-2">
                                            <img src="{{ $photo->temporaryUrl() }}">
                                        </div>
                                        <div class="absolute bottom-4 right-1 w-10 h-10">
                                            <div class="w-full h-full p-1 bg-indigo-300 rounded-full flex items-center justify-center">
                                                <svg class="w-full h-full text-gray-100" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                            </div>
                                        </div>
                                    @else
                                        <div class="w-full h-full">
                                            {{-- <img src="https://i.pravatar.cc/500?img=32" class="w-full h-full rounded-full"> --}}
                                            <svg class="w-full h-full rounded-full" viewBox="312.809 0 401 401">
                                                <g transform="matrix(1.223 0 0 1.223 -467.5 -843.44)">
                                                    <rect x="601.45" y="653.07" width="401" height="401" fill="#E4E6E7"/>
                                                    <path d="m802.38 908.08c-84.515 0-153.52 48.185-157.38 108.62h314.79c-3.87-60.44-72.9-108.62-157.41-108.62z" fill="#AEB4B7"/>
                                                    <path d="m881.37 818.86c0 46.746-35.106 84.641-78.41 84.641s-78.41-37.895-78.41-84.641 35.106-84.641 78.41-84.641c43.31 0 78.41 37.9 78.41 84.64z" fill="#AEB4B7"/>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="absolute bottom-4 right-1 w-10 h-10">
                                            <div class="w-full h-full p-1 bg-gray-200 rounded-full flex items-center justify-center">
                                                <svg class="w-full h-full text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            </div>
                                        </div>
                                    @endif
                                </div> 
                                <input type="file" class="hidden" wire:model="photo"/>
                            </div>

                            <div class="lg:w-3/4 lg:mr-2 lg:mt-0 mt-2 ">
                                
                                <div class="mt-2">
                                    <x-label>Title</x-label> 
                                    <x-select wire:model.defer="title">
                                        <option value="Mr.">Mr. </option>
                                        <option value="Mrs.">Mrs. </option>
                                        <option value="Miss.">Miss. </option>
                                        <option value="Dr.">Dr. </option>
                                    </x-select>
                                    <x-error-message model="title" />
                                </div>
                                
                                <div class="mt-2">
                                    <x-label>Name</x-label> 
                                    <x-input type="text" wire:model.defer="name" placeholder="Name" />
                                    <x-error-message model="name" />
                                </div>

                                <div class="mt-2">
                                    <x-label>Gender</x-label> 
                                    <x-select wire:model.defer="gender">
                                        <option value="female">Female</option>
                                        <option value="male">Male</option>
                                    </x-select>
                                    <x-error-message model="gender" />
                                </div>
    
                                <div class="mt-2">
                                    <x-label>Phone number</x-label> 
                                    <x-input type="tel" wire:model.defer="phone_number" />
                                    <x-error-message model="phone_number" />
                                </div>
    
                                <div class="mt-2">
                                    <x-label class="label">Whatsapp number</x-label> 
                                    <x-input type="tel" wire:model.defer="whatsapp_number" />
                                    <x-error-message model="whatsapp_number" />
                                </div>
    
                                <div class="mt-2">
                                    <x-label>Address</x-label> 
                                    <textarea class="w-full border-gray-600 rounded-md h-24 @error('address') input-error @enderror" wire:model.defer="address"></textarea>
                                    <x-error-message model="address" />
                                </div>
    
                                <div class="mt-2">
                                    <x-label>Email</x-label> 
                                    <x-input type="email" wire:model.defer="email" />
                                    <x-error-message model="email" />
                                </div>
    
                                <div class="mt-2">
                                    <x-label>Username</x-label> 
                                    <x-input type="text" wire:model.defer="username" />
                                    <x-error-message model="username" />
                                </div>
    
                                <div class="mt-2">
                                    <x-label>Password</x-label> 
                                    <x-input type="password" wire:model.defer="password" />
                                    <x-error-message model="password" />
                                </div>
    
                                <div class="mt-2">
                                    <x-label>Name</x-label> 
                                    <x-input type="text" wire:model.defer="password" />
                                    <x-error-message model="password" />
                                </div>
    
                                <div class="mt-4 flex gap-2">
                                    <x-a href="{{ url('admin/clients') }}" color="red">Cancel</x-a>
                                    <x-button type="submit">Submit</x-button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
