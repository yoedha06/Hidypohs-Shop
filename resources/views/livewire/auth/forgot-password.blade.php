<div>
    <div class="p-8 rounded-2xl bg-white shadow">
        <h2 class="text-gray-800 text-center text-2xl font-bold">Forgot Password</h2>
        <form wire:submit="sendLink" class="mt-8 space-y-4">
            <div>
                <label class="text-gray-800 text-sm mb-2 block">Phone Number <span class="text-red-600">*</span></label>
                <div class="relative flex items-center">
                    <input wire:model.lazy="phone"
                        type="phone" required
                        class="block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                        focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500"
                      placeholder="Enter Your phone" />
                </div>
                @error('phone')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
                @if (session()->has('success'))
                    <div class="text-green-500 mt-2">{{ session('success') }}</div>
                @endif
                @if (session()->has('error'))
                    <div class="text-red-500 text-sm">{{ session('error') }}</div>
                @endif
            </div>

            <div class="mt-8">
                <button type="submit"
                    class="w-full py-3 px-4 text-sm tracking-wide rounded-lg text-white bg-red-600 hover:bg-red-700 focus:outline-none" 
                    wire:loading.class="cursor-not-allowed bg-red-400" wire:loading.attr="disabled" wire:target="sendLink">
                    <span wire:loading.remove wire:target="sendLink">Send</span>
                    <span wire:loading wire:target="sendLink">Sending...</span>
                </button>
            </div>
        </form>
        <p class="text-gray-800 text-sm !mt-8 text-center">Don't have an account? 
            <a wire:navigate href="/register"
            class="text-red-800 hover:underline ml-1 whitespace-nowrap font-semibold">Register
            here</a>
        </p>
    </div>
</div>
