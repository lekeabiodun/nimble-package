<div>
    <div class="container px-6 mx-auto grid">

        <div class="flex items-center justify-between">
            <div class="flex flex-col flex-wrap my-6">
                <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">Group</h2>
                <div class="flex gap-1 flex-wrap text-xs md:text-sm dark:text-gray-400">
                    <a href="{{ url('admin') }}" class="text-indigo-500 dark:text-gray-200">Dashboard / </a>
                    <a href="{{ url('admin/groups') }}" class="text-indigo-500 dark:text-gray-200">Groups / </a>
                    <span class="dark:text-gray-200">Create</span>
                </div>
            </div>b
        </div>

        <div class="card shadow-2xl bg-white dark:bg-gray-800">

            <div class="card-body px-4">
                <h2 class="card-title text-gray-600 dark:text-gray-300">Edit group</h2>
                <div class="flex items-center justify-center">
                    <div class="w-full max-w-2xl">
                        <form wire:submit.prevent="update">
                            <label class="form-control">
                                <label class="label"> <span class="label-text">Name</span> </label> 
                                <input class="input input-bordered" wire:model.defer="group.name">
                                <x-error-message model="group.name" />
                            </label>

                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Description</span>
                                </label> 
                                <textarea class="textarea textarea-bordered h-24" wire:model.defer="group.description"></textarea>
                                <x-error-message model="group.description" />
                            </div>

                            <label class="form-control">
                                <label class="label"> <span class="label-text">Group leader</span> </label> 
                                <select class="input input-bordered" wire:model.defer="group.admin_id">
                                    <option selected hidden value="">Select</option> 
                                    @foreach ($developers as $developer)
                                        <option value="{{ $developer->id }}">{{ $developer->name }}</option>
                                    @endforeach
                                </select>
                                <x-error-message model="group.admin_id" />
                            </label>
                            <div class="block mt-4 text-sm">
                                <a href="{{ url('admin/groups') }}" class="btn btn-error">Cancel</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
