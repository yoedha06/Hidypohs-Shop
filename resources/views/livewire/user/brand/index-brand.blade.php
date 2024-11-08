<div>
    <div class="p-4 mt-16 sm:ml-64">
        <div class="w-full relative">
            <div class="swiper progress-slide-carousel swiper-container relative">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{ asset('assets/img/nike.jpg') }}" class="h-96 rounded-2xl bg-blend-darken w-full">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('assets/img/adibas.jpg') }}"
                            class="h-96 rounded-2xl bg-blend-darken object-cover w-full">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('assets/img/gucci.jpg') }}"
                            class="h-96 rounded-2xl bg-blend-darken object-cover w-full">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('assets/img/elleseiu.jpg') }}"
                            class="h-96 rounded-2xl bg-blend-darken object-cover w-full">
                    </div>
                </div>
                <div class="swiper-pagination !bottom-2 !top-auto !w-80 right-0 mx-auto"></div>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-4 lg:grid-cols-4 lg:gap-5 mt-5">
            <div class="h-auto rounded-lg">
                <div class="space-y-2 rounded-2xl">
                    <details
                        class="overflow-hidden rounded shadow-lg border border-red-600 [&_summary::-webkit-details-marker]:hidden">
                        <summary
                            class="flex cursor-pointer items-center justify-between gap-2 bg-white p-4 text-gray-900 transition">
                            <span class="text-sm font-medium"> Available Brands </span>
    
                            <span class="transition group-open:-rotate-180">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </span>
                        </summary>
    
                        <div class="border-t border-gray-200 bg-white">
                            <header class="flex items-center justify-between p-4">
                                <span class="text-sm text-gray-700"> 0 Selected </span>
    
                                <button type="button" class="text-sm text-gray-900 underline underline-offset-4">
                                    Reset
                                </button>
                            </header>
    
                            <ul class="space-y-1 border-t border-gray-200 p-4">
                                <li>
                                    <label for="FilterInStock" class="inline-flex items-center gap-2">
                                        <input type="checkbox" id="FilterInStock" class="size-5 rounded border-gray-300" />
    
                                        <span class="text-sm font-medium text-gray-700">Nike </span>
                                    </label>
                                </li>
    
                                <li>
                                    <label for="FilterPreOrder" class="inline-flex items-center gap-2">
                                        <input type="checkbox" id="FilterPreOrder" class="size-5 rounded border-gray-300" />
    
                                        <span class="text-sm font-medium text-gray-700"> Adidas </span>
                                    </label>
                                </li>
    
                                <li>
                                    <label for="FilterOutOfStock" class="inline-flex items-center gap-2">
                                        <input type="checkbox" id="FilterOutOfStock"
                                            class="size-5 rounded border-gray-300" />
    
                                        <span class="text-sm font-medium text-gray-700"> Gucci </span>
                                    </label>
                                </li>

                                <li>
                                    <label for="FilterPreOrder" class="inline-flex items-center gap-2">
                                        <input type="checkbox" id="FilterPreOrder" class="size-5 rounded border-gray-300" />
    
                                        <span class="text-sm font-medium text-gray-700"> Ellese </span>
                                    </label>
                                </li>
    
                                <li>
                                    <label for="FilterOutOfStock" class="inline-flex items-center gap-2">
                                        <input type="checkbox" id="FilterOutOfStock"
                                            class="size-5 rounded border-gray-300" />
    
                                        <span class="text-sm font-medium text-gray-700"> Champions </span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </details>
    
                    <details
                        class="overflow-hidden shadow-lg rounded border border-red-600 [&_summary::-webkit-details-marker]:hidden">
                        <summary
                            class="flex cursor-pointer items-center justify-between gap-2 bg-white p-4 text-gray-900 transition">
                            <span class="text-sm font-medium"> Price </span>
    
                            <span class="transition group-open:-rotate-180">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </span>
                        </summary>
    
                        <div class="border-t border-gray-200 bg-white">
                            <header class="flex items-center justify-between p-4">
                                <span class="text-sm text-gray-700"> The highest price is Rp. 150.000.000 </span>
    
                                <button type="button" class="text-sm text-gray-900 underline underline-offset-4">
                                    Reset
                                </button>
                            </header>
    
                            <div class="border-t border-gray-200 p-4">
                                <div class="flex justify-between gap-4">
                                    <label for="FilterPriceFrom" class="flex items-center gap-2">
                                        <span class="text-sm text-gray-600">Rp</span>
    
                                        <input type="number" id="FilterPriceFrom" placeholder="From"
                                            class="w-full rounded-md border-gray-200 shadow-sm sm:text-sm" />
                                    </label>
    
                                    <label for="FilterPriceTo" class="flex items-center gap-2">
                                        <span class="text-sm text-gray-600">Rp</span>
    
                                        <input type="number" id="FilterPriceTo" placeholder="To"
                                            class="w-full rounded-md border-gray-200 shadow-sm sm:text-sm" />
                                    </label>
                                </div>
                            </div>
                        </div>
                    </details>
                </div>
            </div>
            <div class="h-auto rounded-lg bg-gray-200 lg:col-span-3">
                
            </div>
        </div>
    </div>
    <script>
        var swiper = new Swiper(".progress-slide-carousel", {
            loop: true,
            fraction: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: true,
            },
            pagination: {
                el: ".progress-slide-carousel .swiper-pagination",
                type: "progressbar",
            },
        });
    </script>
</div>
