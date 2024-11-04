<div>
    <div class="p-8 rounded-2xl bg-white shadow">
        <h2 class="text-gray-800 text-center text-2xl font-bold">Verification Code</h2>
        <form wire:submit="assigned" class="mt-8 space-y-4">
            <div>
                <label class="text-gray-800 text-sm mb-2 block">Confirm OTP<span class="text-red-600">*</span></label>
                <div class="relative flex items-center">
                    <input wire:model="otp"
                        type="number" required
                        class="block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                        focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500"
                      placeholder="Enter Your OTP" />
                </div>
                @if(session()->has('successOtp'))
                    <div class="text-green-500 mt-2">{{ session('successOtp') }}</div>
                @endif
                @if(session()->has('errorOtp'))
                    <div class="text-red-500">{{ session('errorOtp') }}</div>
                @endif
                @error('otp')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-8">
                <button type="submit"
                    class="w-full py-3 px-4 text-sm tracking-wide rounded-lg text-white bg-red-600 hover:bg-red-700 focus:outline-none">
                    Submit
                </button>
            </div>
        </form>
        <p class="text-gray-800 text-sm !mt-8 text-center">didn't receive code?
            <button type="button" wire:click="resendOtp" class="text-red-800 hover:underline ml-1 whitespace-nowrap font-semibold"
                wire:loading.class="cursor-not-allowed" wire:loading.attr="disabled" wire:target="resendOtp">Resend Otp
            </button>
        </p>
    </div>
</div>
