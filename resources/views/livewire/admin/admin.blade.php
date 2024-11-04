<div>
    <div class="p-4 sm:ml-64">
        <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700"
            aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a wire:navigate="admin" href="/admin"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Home
                    </a>
                </li>
            </ol>
        </nav>
        <div class="rounded-lg dark:border-gray-700 mt-7">
            <div class="grid grid-cols-1 gap-4 lg:grid-cols-4 lg:gap-8">
                <div class="shadow-lg h-32 rounded-lg bg-gray-200">
                    <div
                        class="p-8w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex justify-between w-full mb-8">
                            <span class="text-gray-500 font-bold">Total Customer</span>
                        </div>
                        <span class="text-2xl font-bold">{{ $countcust }}</span>
                    </div>
                </div>
                <div class="shadow-lg h-32 rounded-lg bg-gray-200">
                    <div
                        class="p-8w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex justify-between w-full mb-8">
                            <span class="text-gray-500 font-bold">Total Product</span>
                        </div>
                        <span class="text-2xl font-bold">{{ $products }}</span>
                    </div>
                </div>
                <div class="shadow-lg h-32 rounded-lg bg-gray-200">
                    <div
                        class="p-8w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex justify-between w-full mb-8">
                            <span class="text-gray-500 font-bold">Total Order</span>
                        </div>
                        <span class="text-2xl font-bold">0</span>
                    </div>
                </div>
                <div class="shadow-lg h-32 rounded-lg bg-gray-200">
                    <div
                        class="p-8w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex justify-between w-full mb-8">
                            <span class="text-gray-500 font-bold">Total Brand</span>
                        </div>
                        <span class="text-2xl font-bold">{{ $brands }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
