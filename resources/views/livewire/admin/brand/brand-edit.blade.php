<div>
    <div class="p-4 sm:ml-64">
        <div class="w-full mb-5 max-w-lg mx-auto mt-20 float-center  bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
            <div class="py-8 px-4 mx-auto max-w-2xl lg:py-5">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit Brand</h2>
                <form wire:submit.prevent='update'>
                    <div class="mb-3">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="small_size">
                            Logo <div class="text-green-500" wire:loading wire:target="logo">Uploading...
                            </div>
                        </label>
                        <input wire:model="logo" accept="image/png, image/jpeg" id="small_size" type="file"
                            class="block w-full text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                        <p class="text-sm py-1 text-gray-500 dark:text-gray-300" id="file_input_help">JPEG, PNG or
                            JPG</p>

                        @if ($logo instanceof \Illuminate\Http\UploadedFile)
                            <img class="mb-3 h-auto max-w-full rounded-lg" src="{{ $logo->temporaryUrl() }}">
                        @else
                            <img class="mb-3 h-auto max-w-full rounded-lg" src="{{ $logoUrl }}">
                        @endif
                        @error('image')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label 
                            for="small-input"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Name of Brand <span class="text-red-600">*</span>
                        </label>
                        <input 
                            wire:model="brand_name" 
                            type="text" 
                            id="small-input"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('brand_name')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label 
                            for="small-input"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Country <span class="text-red-600">*</span></label>
                        <input 
                            wire:model="country" 
                            type="text" 
                            id="small-input"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('country')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label 
                            for="small-input"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Description <span class="text-red-600">*</span></label>
                        <textarea id="description" wire:model="description" x-data="{
                            resize() {
                                $el.style.height = '40px'
                                $el.style.height = $el.scrollHeight + 'px'
                            }
                        }" x-init="resize" x-on:input="resize"
                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </textarea>
                        @error('description')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <button 
                            type="submit"
                            class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Submit</button>
                        <a 
                            wire:navigate href="{{ route('brand.index') }}" 
                            type="button"
                            class="text-white bg-gradient-to-r from-red-600 via-red-700 to-red-800 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
