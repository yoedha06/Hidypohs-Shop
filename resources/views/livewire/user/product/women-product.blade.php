<div>
    <div class="p-4 mt-16 sm:ml-64">
        <div class="mb-8 grid gap-5 sm:grid-cols-2 sm:justify-items-stretch md:mb-12 md:grid-cols-5 lg:mb-16 lg:gap-6">
         @foreach($womanProducts as $product)
            <div class="flex flex-col gap-4 p-4 bg-white rounded-lg shadow-md h-full hover:shadow-lg transform transition-transform duration-300 ease-in-out hover:scale-105">
                  <a href="#" class="flex flex-col gap-4 h-full">
                     <img src="{{ Storage::url($product->image) }}" alt="" class="h-72 rounded-lg object-cover" />
                     <div class="flex flex-col h-full">
                        <div class="flex justify-between mb-4 gap-2">
                              <div class="w-auto rounded-md px-2 py-1.5">
                                 <p class="text-sm font-semibold text-gray-600 underline">{{ $product->brands->brand_name }}</p>
                              </div>
                              <div class="rounded-md bg-gradient-to-r from-violet-700 to-red-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 px-2 py-1.5">
                                 <p class="text-sm font-semibold text-white">Rp.{{ $product->price }}</p>
                              </div>
                        </div>
                        <p class="text-lg font-bold">{{ $product->product_name }}</p>
                        <p class="text-md line-clamp-3 mt-2">{{ $product->description }}</p>
                     </div>
                  </a>
                  <button class="w-full rounded-lg bg-gray-50 px-2 py-1.5 text-gray-500 shadow-md hover:text-red-700 hover:bg-gray-100 font-semibold">Buy Now</button>
                  <div class="flex items-center mb-5">
                     <svg class="w-4 h-4 ms-1 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                           <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                     </svg>
                     <svg class="w-4 h-4 ms-1 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                           <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                     </svg>
                     <svg class="w-4 h-4 ms-1 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                           <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                     </svg>
                     <svg class="w-4 h-4 ms-1 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                           <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                     </svg>
                     <svg class="w-4 h-4 ms-1 text-gray-300 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                           <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                     </svg>
                     <span class="ms-4 text-sm text-gray-500 font-bold">4,3</span>
                  </div>
            </div>
         @endforeach
         </div>
     </div>
</div>
