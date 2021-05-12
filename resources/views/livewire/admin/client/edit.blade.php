<div>
    <div class="container px-6 mx-auto grid">

        <div class="flex items-center justify-between">
            <div class="flex flex-col flex-wrap my-6">
                <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">Clients</h2>
                <div class="flex gap-1 flex-wrap text-xs md:text-sm dark:text-gray-400">
                    <a href="{{ url('admin') }}" class="text-indigo-500 dark:text-gray-200">Dashboard / </a>
                    <a href="{{ url('admin/clients') }}" class="text-indigo-500 dark:text-gray-200">Clients / </a>
                    <span class="dark:text-gray-200">Create</span>
                </div>
            </div>
            <div>
                <button type="button" class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"  x-on:click="$dispatch('sweet-delete-modal', { model: 'Client', id: {{ $client->id }} })" aria-label="Delete">
                    <svg class="w-4 h-4 md:w-6 md:h-6 mr-2 -ml-1 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                  <span>Delete</span>
                </button>
            </div>
        </div>

        <div class="card shadow-2xl bg-white dark:bg-gray-800">

            <div class="card-body px-4">
                <h2 class="card-title text-gray-600 dark:text-gray-300">New client</h2>
                <div class="flex items-center justify-center">
                    <div class="w-full max-w-2xl">
                        <form wire:submit.prevent="update">

                            <label class="form-control" x-data>
                                <div class="avatar relative w-48 h-48 cursor-pointer">
                                    @if($photo)
                                        <div class="mb-8 rounded-full w-full h-full ring ring-indigo-300 ring-offset-default ring-offset-2">
                                            <img src="{{ $photo->temporaryUrl() }}">
                                        </div>
                                        <div class="absolute bottom-4 right-1 w-10 h-10">
                                            <div class="w-full h-full p-1 bg-indigo-300 rounded-full flex items-center justify-center">
                                                <svg class="w-full h-full text-gray-100" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                            </div>
                                        </div>
                                    @else
                                        <div class="mb-8 rounded-full w-full h-full ring ring-indigo-300 ring-offset-default ring-offset-2">
                                            <img src="{{ $client->photo() }}">
                                        </div>
                                        <div class="absolute bottom-4 right-1 w-10 h-10">
                                            <div class="w-full h-full p-1 bg-indigo-300 rounded-full flex items-center justify-center">
                                                <svg class="w-full h-full text-gray-100" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                            </div>
                                        </div>
                                    @endif
                                </div> 
                                <input type="file" class="hidden" wire:model="photo"/>
                            </label>

                            <label class="form-control">
                                <label class="label"> <span class="label-text">Title</span> </label> 
                                <select class="input input-bordered @error('client.title') input-error @enderror" wire:model.defer="client.title">
                                    <option selected hidden value="">Select</option> 
                                    <option value="Mr.">Mr. </option>
                                    <option value="Mrs.">Mrs. </option>
                                    <option value="Miss.">Miss. </option>
                                    <option value="Dr.">Dr. </option>
                                </select>
                                <x-error-message model="client.title" />
                            </label>

                            <label class="form-control">
                                <label class="label"> <span class="label-text">Name</span> </label> 
                                <input class="input input-bordered @error('client.name') input-error @enderror" wire:model.defer="client.name">
                                <x-error-message model="client.name" />
                            </label>

                            <label class="form-control">
                                <label class="label"> <span class="label-text">Gender</span> </label> 
                                <select class="input input-bordered @error('client.gender') input-error @enderror" wire:model.defer="client.gender">
                                    <option selected hidden value="">Select</option> 
                                    <option value="female">Female</option>
                                    <option value="male">Male</option>
                                </select>
                                <x-error-message model="client.gender" />
                            </label>

                            <label class="form-control">
                                <label class="label"> <span class="label-text">Phone number</span> </label> 
                                <input type="tel" class="input input-bordered @error('client.phone_number') input-error @enderror" wire:model.defer="client.phone_number">
                                <x-error-message model="client.phone_number" />
                            </label>

                            <label class="form-control">
                                <label class="label"> <span class="label-text">Whatsapp number</span> </label> 
                                <input type="tel" class="input input-bordered @error('client.whatsapp_number') input-error @enderror" wire:model.defer="client.whatsapp_number">
                                <x-error-message model="client.whatsapp_number" />
                            </label>

                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Address</span>
                                </label> 
                                <textarea class="textarea textarea-bordered h-24 @error('client.address') input-error @enderror" wire:model.defer="client.address"></textarea>
                                <x-error-message model="client.address" />
                            </div>

                            <label class="form-control">
                                <label class="label"> <span class="label-text">Level</span> </label> 
                                <select class="input input-bordered @error('client.level') input-error @enderror" wire:model.defer="client.level">
                                    <option selected hidden value="">Select</option> 
                                    <option value="1">1X Client</option>
                                    <option value="2">2X Client</option>
                                    <option value="3">3X Client</option>
                                    <option value="4">4X Client</option>
                                    <option value="5">5X Client</option>
                                    <option value="6">6X Client</option>
                                    <option value="7">7X Client</option>
                                    <option value="8">8X Client</option>
                                    <option value="9">9X Client</option>
                                    <option value="10">10X Client</option>
                                </select>
                                <x-error-message model="client.level" />
                            </label>

                            <label class="form-control">
                                <label class="label"> <span class="label-text">Group</span> </label> 
                                <select class="input input-bordered" wire:model.defer="group_id">
                                    <option selected hidden value="">Select</option> 
                                    @foreach ($groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                                <x-error-message model="group_id" />
                            </label>

                            <label class="form-control">
                                <label class="label"> <span class="label-text">Email</span> </label> 
                                <input type="email" class="input input-bordered @error('client.email') input-error @enderror" wire:model.defer="client.email">
                                <x-error-message model="client.email" />
                            </label>

                            <label class="form-control">
                                <label class="label"> <span class="label-text">Username</span> </label> 
                                <input class="input input-bordered @error('client.username') input-error @enderror" wire:model.defer="client.username">
                                <x-error-message model="client.username" />
                            </label>

                            <label class="form-control">
                                <label class="label"> <span class="label-text">Password</span> </label> 
                                <input type="password" class="input input-bordered @error('password') input-error @enderror" wire:model.defer="password">
                                <x-error-message model="password" />
                            </label>

                            <div class="block mt-4 text-sm">
                                <a href="{{ url('admin/clients') }}" class="btn btn-error normal-case">Cancel</a>
                                <button type="submit" class="btn btn-primary normal-case">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
