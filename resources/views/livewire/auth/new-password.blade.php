<div>
    <div class="p-8 rounded-2xl bg-white shadow">
        <h2 class="text-gray-800 text-center text-2xl font-bold">Set New Password</h2>
        <form wire:submit="updateNewPassword" class="mt-8 space-y-4">
            <div>
                <label class="text-gray-800 text-sm mb-2 block">New Password<span class="text-red-600">*</span></label>
                <div class="relative flex items-center">
                    <input wire:model.lazy="newPassword"
                        type="password" required
                        class="block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                        focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500"
                      placeholder="Enter Your New Password" />
                </div>
                @error('newPassword')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="text-gray-800 text-sm mb-2 block">Confirm New Password<span class="text-red-600">*</span></label>
                <div class="relative flex items-center">
                    <input wire:model.lazy="confirmPassword"
                        type="password" required
                        class="block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                        focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500"
                      placeholder="Confirm New Password" />
                </div>
                @error('confirmPassword')
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
    </div>
</div>
