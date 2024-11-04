<div>
    <div class="p-8 rounded-2xl bg-white shadow">
        <h2 class="text-gray-800 text-center text-2xl font-bold">Sign in</h2>
        <form wire:submit.prevent="login" class="mt-8 space-y-4">
            <div>
                <label class="text-gray-800 text-sm mb-2 block">Phone</label>
                <div class="relative flex items-center">
                    <input wire:model.lazy="phone"
                        type="phone" required
                        class="block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                        focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500"
                      placeholder="Enter phone" />
                </div>
                @error('phone')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="text-gray-800 text-sm mb-2 block">Password</label>
                <div class="relative flex items-center">
                    <input wire:model.lazy="password" type="{{$type}}" required
                        class="block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                        focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500"
                        placeholder="Enter password"/>
                    
                    <button type="button" wire:click="tooglePassword" class="absolute inset-y-0 right-0 flex items-center px-4 py-2 mx-auto text-black rounded-tr-md rounded-br-md">
                        @if($type === 'password')
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        @endif
                    </button>
                </div>
                @error('password')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center">
                    <input id="remember-me" wire:model="remember" type="checkbox"
                        class="h-4 w-4 shrink-0 text-red-600 focus:ring-red-500 border-gray-300 rounded" />
                    <label for="remember-me" class="ml-3 block text-sm text-gray-800">
                        Remember me
                    </label>
                </div>
                <div class="text-sm">
                    <a wire:navigate href="/forgot-password" class="text-red-800 hover:underline font-semibold">
                        Forgot your password?
                    </a>
                </div>
            </div>

            <div class="!mt-8">
                <button type="submit"
                    class="w-full py-3 px-4 text-sm tracking-wide rounded-lg text-white bg-red-600 hover:bg-red-700 focus:outline-none">
                    Sign in
                </button>
            </div>
            <p class="text-gray-800 text-sm !mt-8 text-center">Don't have an account? <a
                    wire:navigate href="/register"
                    class="text-red-800 hover:underline ml-1 whitespace-nowrap font-semibold">Register
                    here</a></p>
        </form>
    </div>
</div>