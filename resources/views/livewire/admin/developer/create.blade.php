<div>
    <div class="container px-6 mx-auto grid">

        <div class="flex items-center justify-between">
            <div class="flex flex-col flex-wrap my-6">
                <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">Developers</h2>
                <div class="flex gap-1 flex-wrap text-xs md:text-sm dark:text-gray-400">
                    <a href="{{ url('admin') }}" class="text-indigo-500 dark:text-gray-200">Dashboard / </a>
                    <a href="{{ url('admin/developers') }}" class="text-indigo-500 dark:text-gray-200">Developers / </a>
                    <span class="dark:text-gray-200">Create</span>
                </div>
            </div>
        </div>

        <div class="card shadow-2xl bg-white dark:bg-gray-800">

            <div class="card-body px-4">
                <h2 class="card-title text-gray-600 dark:text-gray-300">New developer</h2>
                <div class="flex items-center justify-center">
                    <div class="w-full max-w-2xl">
                        <form wire:submit.prevent="store">

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
                                        <div class="mb-8 rounded-full w-full h-full">
                                            {{-- <img src="https://i.pravatar.cc/500?img=32"> --}}
                                            <svg class="w-full h-full" viewBox="312.809 0 401 401">
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
                            </label>

                            <label class="form-control">
                                <label class="label"> <span class="label-text">Title</span> </label> 
                                <select class="input input-bordered @error('title') input-error @enderror" wire:model.defer="title">
                                    <option selected hidden value="">Select</option> 
                                    <option value="Mr.">Mr. </option>
                                    <option value="Mrs.">Mrs. </option>
                                    <option value="Miss.">Miss. </option>
                                    <option value="Dr.">Dr. </option>
                                </select>
                                <x-error-message model="title" />
                            </label>

                            <label class="form-control">
                                <label class="label"> <span class="label-text">Name</span> </label> 
                                <input class="input input-bordered @error('name') input-error @enderror" wire:model.defer="name">
                                <x-error-message model="name" />
                            </label>

                            <label class="form-control">
                                <label class="label"> <span class="label-text">Gender</span> </label> 
                                <select class="input input-bordered @error('gender') input-error @enderror" wire:model.defer="gender">
                                    <option selected hidden value="">Select</option> 
                                    <option value="female">Female</option>
                                    <option value="male">Male</option>
                                </select>
                                <x-error-message model="gender" />
                            </label>

                            <label class="form-control">
                                <label class="label"> <span class="label-text">Phone number</span> </label> 
                                <input type="tel" class="input input-bordered @error('phone_number') input-error @enderror" wire:model.defer="phone_number">
                                <x-error-message model="phone_number" />
                            </label>

                            <label class="form-control">
                                <label class="label"> <span class="label-text">Whatsapp number</span> </label> 
                                <input type="tel" class="input input-bordered @error('whatsapp_number') input-error @enderror" wire:model.defer="whatsapp_number">
                                <x-error-message model="whatsapp_number" />
                            </label>

                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Address</span>
                                </label> 
                                <textarea class="textarea textarea-bordered h-24 @error('address') input-error @enderror" wire:model.defer="address"></textarea>
                                <x-error-message model="address" />
                            </div>

                            <label class="form-control">
                                <label class="label"> <span class="label-text">Level</span> </label> 
                                <select class="input input-bordered @error('level') input-error @enderror" wire:model.defer="level">
                                    <option selected hidden value="">Select</option> 
                                    <option value="1">1X Developer</option>
                                    <option value="2">2X Developer</option>
                                    <option value="3">3X Developer</option>
                                    <option value="4">4X Developer</option>
                                    <option value="5">5X Developer</option>
                                    <option value="6">6X Developer</option>
                                    <option value="7">7X Developer</option>
                                    <option value="8">8X Developer</option>
                                    <option value="9">9X Developer</option>
                                    <option value="10">10X Developer</option>
                                </select>
                                <x-error-message model="level" />
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
                                <input type="email" class="input input-bordered @error('email') input-error @enderror" wire:model.defer="email">
                                <x-error-message model="email" />
                            </label>

                            <label class="form-control">
                                <label class="label"> <span class="label-text">Username</span> </label> 
                                <input class="input input-bordered @error('username') input-error @enderror" wire:model.defer="username">
                                <x-error-message model="username" />
                            </label>

                            <label class="form-control">
                                <label class="label"> <span class="label-text">Password</span> </label> 
                                <input type="password" class="input input-bordered @error('password') input-error @enderror" wire:model.defer="password">
                                <x-error-message model="password" />
                            </label>

                            <div class="block mt-4 text-sm">
                                <a href="{{ url('admin/developers') }}" class="btn btn-error normal-case">Cancel</a>
                                <button type="submit" class="btn btn-primary normal-case">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
