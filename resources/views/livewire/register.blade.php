
<section class="bg-white dark:bg-gray-800">
    <div class="lg:flex relative">
        <div class="flex items-center justify-center w-full px-6 py-8 lg:h-full lg:w-1/2">
            <div class="px-2 md:px-24 w-full h-full">
                <div class="flex flex-col items-center justify-center">
                    <a href="{{ url('/') }}">
                        <x-logo />
                    </a>
                    <h1 class="mb-4 text-xl font-semibold text-gray-500 dark:text-gray-200 py-8">Register your account</h1>
                    
                    <div class="flex justify-between my-8">
                        <hr class="border-1 border-gray-400 w-20 md:w-28 lg:w-32 mt-4" />
                        <span class="px-2 pt-1 text-gray-600 font-semibold">Below</span>
                        <hr class="border-1 border-gray-400 w-20 md:w-28 lg:w-32 mt-4" />
                    </div>
                </div>
                <form wire:submit.prevent="register">
                    <div class="block">
                        <span class="text-gray-700 dark:text-gray-400">Name</span>
                        <div class="block mb-4 border border-gray-200 rounded-lg">
                            <input type="text" name="name" id="name" class="block w-full px-4 py-3 border-2 border-transparent rounded-lg focus:border-blue-500 focus:outline-none @error('name') border-red-700 @enderror" placeholder="Name" wire:model.defer="name">
                        </div>
                        @error('name') <span class="text-red-700 mb-4"> {{ $message }} </span> @enderror
                    </div>

                    <div class="block">
                        <span class="text-gray-700 dark:text-gray-400">Username</span>
                        <div class="block mb-4 border border-gray-200 rounded-lg">
                            <input type="text" name="username" id="username" class="block w-full px-4 py-3 border-2 border-transparent rounded-lg focus:border-blue-500 focus:outline-none @error('username') border-red-700 @enderror" placeholder="Username" wire:model.defer="username">
                        </div>
                        @error('username') <span class="text-red-700 mb-4"> {{ $message }} </span> @enderror
                    </div>

                    <div class="block">
                        <span class="text-gray-700 dark:text-gray-400">Email</span>
                        <div class="block mb-4 border border-gray-200 rounded-lg">
                            <input type="email" name="email" id="email" class="block w-full px-4 py-3 border-2 border-transparent rounded-lg focus:border-blue-500 focus:outline-none @error('email') border-red-700 @enderror" placeholder="Email" wire:model.defer="email">
                        </div>
                        @error('email') <span class="text-red-700 mb-4"> {{ $message }} </span> @enderror
                    </div>

                    <div class="block">
                        <span class="text-gray-700 dark:text-gray-400">Password</span>
                        <div class="block mb-4 border border-gray-200 rounded-lg">
                            <input type="password" name="password" id="password" class="block w-full px-4 py-3 border-2 border-transparent rounded-lg focus:border-blue-500 focus:outline-none @error('password') border-red-700 @enderror" placeholder="Password" wire:model.defer="password">
                        </div>
                        @error('password') <span class="text-red-700 mb-4"> {{ $message }} </span> @enderror
                    </div>
                    <div class="block mt-6 text-sm">
                        <label class="flex items-center dark:text-gray-400">
                            <input type="checkbox" class="text-indigo-600 form-checkbox focus:border-indigo-400 focus:outline-none focus:shadow-outline-indigo dark:focus:shadow-outline-gray" wire:model.defer="terms"/>
                            <span class="ml-2">
                                I agree to the terms and conditions
                            </span>
                        </label>
                        @error('terms') <span class="text-red-700 mb-4 ml-6"> {{ $message }} </span> @enderror
                    </div>
                    <button type="submit" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-indigo-600 border border-transparent rounded-lg active:bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:shadow-outline-indigo">
                        <span wire:loading.remove>Create account</span>
                                
                        <svg class="animate animate-spin h-5 text-gray-100" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" wire:loading>
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </button>
                </form>

                <hr class="my-4" />

                <div class="flex flex-col md:flex-row md:justify-between">
                    <a class="text-sm font-medium text-indigo-600 dark:text-indigo-400 hover:underline" href="{{ url('login') }}">Already have an account? Login</a>
                </div>
            </div>
        </div>
        
        <div class="w-full h-64 lg:w-1/2 bg-cover lg:absolute lg:bottom-0 lg:right-0 lg:top-0 lg:h-full" style="background-image: url('{{ asset('storage/bg-register.jpeg') }}')">
            <div class="w-full h-full bg-black bg-opacity-70">
                <div class="flex items-center justify-center w-full h-full px-8">
                    <div class="">
                        <h2 class="mb-8 text-xl md:text-4xl font-bold text-gray-100 leading-loose tracking-wider">Leverage CSM tools to build educational solutions and improve your skills</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


