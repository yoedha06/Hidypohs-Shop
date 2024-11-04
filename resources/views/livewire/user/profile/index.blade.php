<div>
    <div class="p-4 mt-16 sm:ml-64">
        <div class="grid grid-cols-1 gap-2 lg:grid-cols-2 lg:gap-4">
            <div class="h-auto rounded-lg border border-gray-200 shadow-md">
                <div class="p-2 md:p-4">
                    <div class="w-full px-6 mt-4 sm:max-w-xl sm:rounded-lg">
                        @if (session()->has('success'))
                            <div id="toast-success" x-data="{ show: true }" x-show="show" style="display: none"
                                x-init="setTimeout(() => show = false, 3000)"
                                class="flex items-center w-full max-w-lg p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                                role="alert">
                                <div
                                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                    </svg>
                                    <span class="sr-only">Check icon</span>
                                </div>
                                <div class="ms-3 text-sm font-normal">{{ session('success') }}</div>
                                <button type="button"
                                    class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                                    x-on:click="show = false" aria-label="Close">
                                    <span class="sr-only">Close</span>
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                </button>
                            </div>
                        @elseif (session()->has('error'))
                            <div id="toast-danger"
                                class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                                role="alert">
                                <div
                                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                                    </svg>
                                    <span class="sr-only">Error icon</span>
                                </div>
                                <div class="ms-3 text-sm font-normal">{{ session('error') }}</div>
                                <button type="button"
                                    class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                                    data-dismiss-target="#toast-danger" aria-label="Close">
                                    <span class="sr-only">Close</span>
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                </button>
                            </div>
                        @endif
                        <h1 class="text-4xl font-bold text-gray-900 underline dark:text-white decoration-red-500">
                            Profile</h3>
                            <div x-data="{ deleteimage: false }" class="grid max-w-2xl mx-auto mt-8">
                                <form wire:submit.prevent="update">
                                    <div class="relative">
                                        <div wire:loading wire:target="image"
                                            class="absolute inset-0 flex items-center justify-center bg-white bg-opacity-75 rounded-full">
                                            <svg class="w-8 h-8 text-indigo-500 animate-spin"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10"
                                                    stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z">
                                                </path>
                                            </svg>
                                        </div>
                                        @if ($image)
                                            <img src="{{ $image->temporaryUrl() }}" alt="Preview Image"
                                                class="object-cover w-40 h-40 p-1 rounded-full ring-2 ring-indigo-300 dark:ring-indigo-500">
                                        @elseif ($data->image)
                                            <img src="{{ Storage::url($data->image) }}" alt="Profile Image"
                                                class="object-cover w-40 h-40 p-1 rounded-full ring-2 ring-indigo-300 dark:ring-indigo-500">
                                        @else
                                            <img class="object-cover w-40 h-40 p-1 rounded-full ring-2 ring-indigo-300 dark:ring-indigo-500"
                                                src="{{ asset('assets/img/user.png') }}" alt="Default avatar">
                                        @endif
                                    </div>

                                    @if ($data->image)
                                        <button type="button" x-on:click="deleteimage = true"
                                            class="py-2 ml-5 px-4 mt-4 text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto">
                                            Delete Photo
                                        </button>
                                    @endif

                                    <div class="flex flex-col mt-4">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                            for="file_input">Photo</label>
                                        <input type="file" accept="image/png, image/jpeg, image/jpg"
                                            wire:model="image"
                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                            aria-describedby="file_input_help" id="file_input">
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">
                                            JPG, JPEG, PNG (MAX 5000).</p>
                                        @error('image')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="items-center mt-4 sm:mt-7 text-[#202142]">
                                        <div class="mb-1 sm:mb-6">
                                            <label for="name"
                                                class="block mb-2 text-sm font-medium text-indigo-900 dark:text-white">Your
                                                name</label>
                                            <input type="text" wire:model="name" id="name"
                                                class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5">
                                            @error('name')
                                                <div class="text-red-500">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-1 sm:mb-6">
                                            <label for="address"
                                                class="block mb-2 text-sm font-medium text-indigo-900 dark:text-white">Your
                                                address</label>
                                            <textarea id="address" wire:model="address" x-data="{
                                                resize() {
                                                    $el.style.height = '40px'
                                                    $el.style.height = $el.scrollHeight + 'px'
                                                }
                                            }" x-init="resize" x-on:input="resize"
                                                class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 "
                                                placeholder="Enter Address...">
                                                </textarea>
                                            @error('address')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-2 sm:mb-6">
                                            <label for="phone"
                                                class="block mb-2 text-sm font-medium text-indigo-900 dark:text-white">Your
                                                Phone</label>
                                            <input type="tel" id="phone" wire:model="phone"
                                                class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 "
                                                placeholder="">
                                            @error('phone')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="flex justify-end">
                                            <button type="submit"
                                                class="text-white bg-indigo-700  hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">Save</button>
                                        </div>
                                    </div>
                                </form>
                                <div x-show="deleteimage" x-cloak
                                    class="fixed inset-0 z-50 flex items-center justify-center w-full h-screen overflow-y-auto bg-black bg-opacity-50">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button x-on:click="deleteimage = false" type="button"
                                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                                <svg class="w-3 h-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="p-4 md:p-5 text-center">
                                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-20 dark:text-gray-200"
                                                    version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 330 330"
                                                    xml:space="preserve">
                                                    <g id="XMLID_6_">
                                                        <g id="XMLID_11_">
                                                            <path d="M240,121.076H30V275c0,8.284,6.716,15,15,15h60h37.596c19.246,24.348,49.031,40,82.404,40c57.897,0,105-47.103,105-105
                                                        C330,172.195,290.816,128.377,240,121.076z M225,300c-41.355,0-75-33.645-75-75s33.645-75,75-75s75,33.645,75,75
                                                        S266.355,300,225,300z" />
                                                        </g>
                                                        <g id="XMLID_18_">
                                                            <path
                                                                d="M240,90h15c8.284,0,15-6.716,15-15s-6.716-15-15-15h-30h-15V15c0-8.284-6.716-15-15-15H75c-8.284,0-15,6.716-15,15v45H45
                                                        H15C6.716,60,0,66.716,0,75s6.716,15,15,15h15H240z M90,30h90v30h-15h-60H90V30z" />
                                                        </g>
                                                        <g id="XMLID_23_">
                                                            <path
                                                                d="M256.819,193.181c-5.857-5.858-15.355-5.858-21.213,0L225,203.787l-10.606-10.606c-5.857-5.858-15.355-5.858-21.213,0
                                                        c-5.858,5.858-5.858,15.355,0,21.213L203.787,225l-10.606,10.606c-5.858,5.858-5.858,15.355,0,21.213
                                                        c2.929,2.929,6.768,4.394,10.606,4.394c3.839,0,7.678-1.465,10.607-4.394L225,246.213l10.606,10.606
                                                        c2.929,2.929,6.768,4.394,10.607,4.394c3.839,0,7.678-1.465,10.606-4.394c5.858-5.858,5.858-15.355,0-21.213L246.213,225
                                                        l10.606-10.606C262.678,208.535,262.678,199.039,256.819,193.181z" />
                                                        </g>
                                                    </g>
                                                </svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                    Are you sure you want to delete this image?
                                                </h3>
                                                <a wire:click="deleteImage"
                                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                    Yes, I'm sure
                                                </a>
                                                <button x-on:click="deleteimage = false" type="button"
                                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                    No, cancel
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

            <div class="h-3/6 rounded-lg border border-gray-200 shadow-md">
                <div class="p-2 md:p-4">
                    <div class="w-full px-6 mt-4 rounded-lg">
                        <h1 class="text-4xl font-bold text-gray-900 underline dark:text-white decoration-red-500">
                            Change Password</h3>

                            <div class="items-center sm:mt-8 text-[#202142]">
                                <div class="mb-1 sm:mb-6">
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-indigo-900 dark:text-white">Your
                                        current password</label>
                                    <input type="text" id="name"
                                        class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 "
                                        placeholder="" required>
                                </div>

                                <div class="mb-2 sm:mb-6">
                                    <label for="email"
                                        class="block mb-2 text-sm font-medium text-indigo-900 dark:text-white">
                                        new password
                                    </label>
                                    <input type="email" id="email"
                                        class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 "
                                        placeholder="" required>
                                </div>

                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="text-white bg-indigo-700  hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">Save</button>
                                </div>

                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>